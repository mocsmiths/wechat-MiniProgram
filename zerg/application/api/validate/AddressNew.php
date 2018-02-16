<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/11/4
 * Time: 09:35
 */

namespace app\api\validate;


class AddressNew extends BaseValidate
{
    protected $rule = [
      'name' => 'require|isNotEmpty',
        'mobile' => 'require|isMobile',
        'province' => 'require|isNotEmpty',
        'city' => 'require|isNotEmpty',
        'country' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty',
    ];
}