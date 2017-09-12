<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/5/19
 * Time: 18:01
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code'=> 'require|isNotEmpty'
    ];

    protected $message = [
        'code'=> '没有code还想获取Token，做梦哦'
    ];

}