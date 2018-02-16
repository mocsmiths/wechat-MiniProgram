<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/19
 * Time: 20:04
 */

namespace app\lib\exception;


use think\Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    //定义几个私有变量
    private $code;
    private $msg;
    private $errorCode;
    //还需要返回客户端当前请求的url路径

    public function render(\Exception $e){
        if($e instanceof BaseException){
//  如果是自定义的异常,就返回具体的消息（第一种异常处理方法）
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;;
        }else{
            //设置一个开关变量

            if(config('app_debug')){
                //返回默认错误页面
                return parent::render($e);
            }else{
                //第二种异常处理方法
                $this->code = 500;
                $this->msg = '服务器错误，不提供';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }

        }
        $request = Request::instance();
        //定义一个返回结果
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url'=>$request->url()

        ];
        return json($result,$this->code);
    }
    //设定日志记录开关
    private function recordErrorLog(\Exception $e){
        //初始化日志
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);

        Log::record($e->getMessage(),'error');
    }
}