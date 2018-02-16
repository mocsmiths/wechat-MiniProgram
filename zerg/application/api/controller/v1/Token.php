<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/31
 * Time: 15:12
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    public function getToken($code=''){
        (new TokenGet())->goCheck();
        //测试伪代码
        $ut = new UserToken($code);
        $token = $ut->get($code);
        return [
          'token'=>$token
        ];
    }
}