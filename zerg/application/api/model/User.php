<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/31
 * Time: 15:33
 */

namespace app\api\model;


class User extends BaseModel
{
    public static function getByOpenID($openid){
        $user = self::where('openid','=',$openid)->find();
        return $user;
    }
}