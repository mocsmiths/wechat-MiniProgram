<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/16
 * Time: 21:47
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'name'=> 'require|max:10',
        'email'=>'email'
    ];
}