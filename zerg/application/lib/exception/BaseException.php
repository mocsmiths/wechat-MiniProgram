<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/19
 * Time: 20:12
 */

namespace app\lib\exception;


use think\Exception;
use Throwable;

class BaseException extends Exception
{
    //HTTP的状态码：如404等
    public $code = 400;

    //错误具体信息
    public $msg = '参数错误';

    //自定义的错误码
    public $errorCode = 10000;

    //写一个构建函数
    public function __construct($params = []){
        //写一个防御函数
        if(!is_array($params)){
            return;
            //throw new Exception('参数必须是数组');
        }
        //接下来是正式的函数,读取code的值和赋值
        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if(array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }
        if(array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}