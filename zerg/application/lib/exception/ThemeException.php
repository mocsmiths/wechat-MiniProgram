<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/28
 * Time: 10:17
 */

namespace app\lib\exception;




class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定的主题不存在，请检查ID';
    public $errorCode = 30000;
}