<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/11/4
 * Time: 09:31
 */

namespace app\api\controller\v1;


use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;

class Address
{
    public function createOrUpdateAddress(){
        (new AddressNew())->goCheck();
        //根据Token获取uid
        $uid = TokenService::getCurrentUid();

        //根据uid来查找用户数据，判断用户是否存在，如果不存在抛出日常
        //获取用户从客户端提交来的地址信息
        //根据用户地址信息是否存在，从而判断是新增还是更新地址
    }
}