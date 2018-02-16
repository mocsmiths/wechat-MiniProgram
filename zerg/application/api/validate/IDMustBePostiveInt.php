<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/16
 * Time: 22:43
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule =[
      'id'=> 'require|isPositiveInteger',
    ];
    protected $message = [
        'id' => 'id必须是正整数'
    ];

}