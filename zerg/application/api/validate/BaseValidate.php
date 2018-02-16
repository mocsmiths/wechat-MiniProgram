<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/16
 * Time: 23:48
 */

namespace app\api\validate;




use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        //获取http传入的参数
        //对这些参数做校验
        $request = Request::instance();
        $params = $request->param();

        $result = $this->batch()->check($params);
        if(!$result){
            $e = new ParameterException([
                'msg' => $this->error,

            ]);
            throw $e;
        }else{
            return true;
        }
    }
    //正整数的验证方法
    protected function isPositiveInteger($value,$rule='',$data='',$field=''){
        if(is_numeric($value) && is_int($value+0) && ($value+0)>0){
            return true;
        }
        else{
            //return $field.'必须是正整数';
            return false;
        }
    }
    //不为空的验证方法
    protected function isNotEmpty($value,$rulr='',$data='',$field=''){
        if(empty($value)){
            return $field.'不许为空值';
        }else{
            return true;
        }
    }
}
