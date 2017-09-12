<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/6/16
 * Time: 10:00
 */

namespace app\api\validate;


class AppTokenGet extends BaseValidate
{
    protected $rule = [
        'ac' => 'require|isNotEmpty',
        'se' => 'require|isNotEmpty'
    ];
}