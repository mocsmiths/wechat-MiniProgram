<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/30
 * Time: 22:45
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code = 400;
    public $msg = '指定的类目不存在，请检查参数';
    public $errorCode = 50000;
}