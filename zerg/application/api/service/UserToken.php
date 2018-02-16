<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/31
 * Time: 15:36
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;
use app\api\model\user as UserModel;

class UserToken extends Token
{   protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);
    }

    public function get(){
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result,true);
        if(empty($wxResult)){
            throw new Exception('获取session_key及openID时异常，微信内部错误');
    }else{
        $loginFail = array_key_exists('errcode',$wxResult);
        if($loginFail){
            $this->processLoginError($wxResult);
        }else{
          return $this->grantToken($wxResult);
        }
    }
    }
    private function grantToken($wxResult){
        //拿到openid
        $openid = $wxResult['openid'];
        //数据库里看一下，这个openid是不是已经存在
        $user = UserModel::getByOpenID($openid);
        //如果存在则不处理，不存在则新增一条user记录
        if(user){
            $uid = $user->id;
        }else{
            $uid = $this->newUser($openid);
        }
        //生成令牌，准备缓存数据，写入缓存
        $cachedValue = $this->prepareChedValue($wxResult,$uid);
        //把令牌返回到客户端去
        $token = $this->saveToCache($cachedValue);
        return $token;
        //key:令牌
        //value：wxResult，uid，scope
    }
    private function newUser($openid){
        //如何用模型写入一条数据
        $user = UserModel::create([
          'openid'=>$openid
        ]);
            return $user->id;
        }
    //写入缓存
    private function saveToCache($cachedValue){
        $key = self::generateToken();
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');

        $request = cache($key,$value,$expire_in);
        if(!$request){
            throw new TokenException([
               'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;
    }
    //一个准备wxResult，uid，scope等数据的方法
    private function prepareChedValue($wxResult,$uid){
        //定义一个变量用于存储
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        //scope是用一串数字表示的
        $cachedValue['scope']=16;
        return $cachedValue;
    }

    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode'],
        ]);
    }
}