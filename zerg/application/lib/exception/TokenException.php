<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/11/2
 * Time: 19:56
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'token已过期或无效token';
    public $errorCode = 10001;
}