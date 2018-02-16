<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/30
 * Time: 20:29
 */

namespace app\api\validate;


class Count extends BaseValidate
{   //要求为正整数
    protected $rule = [
      'count' => 'isPositiveInteger|between:1,15'
    ];
}