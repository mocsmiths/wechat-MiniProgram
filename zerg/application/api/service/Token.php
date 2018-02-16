<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/11/1
 * Time: 22:18
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token
{
    public static function generateToken(){
        //32个字符组成一组随机字符串
        $randChars = getRandChar(32);
        //用三组字符串，进行md5加密;
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        // 盐 salt，即特殊的加密信息
        $salt = config('secure.token_salt');
        return md5($randChars.$timestamp.$salt);
    }

    public static function getCurrentTokenVar($key){
        $token = Request::instance()->header('token');
        $vars = Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }else{
            if(!is_array($vars)){
                $vars = json_decode($vars,true);
            }
            if(array_key_exists($key,$vars)){
                return $vars[$key];
            }else{
                throw new Exception('尝试获取的token并不存在');
            }

        }
    }
    public static function getCurrentUid(){
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
}