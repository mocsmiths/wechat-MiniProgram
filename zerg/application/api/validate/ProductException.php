<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/30
 * Time: 20:53
 */

namespace app\api\validate;


use app\lib\exception\BaseException;

class ProductException extends BaseException
{
    public $code = 400;
    public $msg = '指定的商品不存在，请检查参数';
    public $errorCode = 20000;
}