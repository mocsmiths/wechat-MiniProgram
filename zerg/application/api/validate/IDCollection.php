<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/28
 * Time: 08:14
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        //自定义了IDs的验证规则，就要实现这个IDs
      'ids' => 'require|checkIDs'
    ];
    //定义ids检测不通过的信息提示
    protected $message = [
        'ids' => 'ids参数必须是以逗号分割的多个正整数'
    ];
    //$value就是客户端传过来的id1、id2.。。。
    protected function checkIds($value){
        $value = explode(',',$value);
        //如果为空返回false
        if(empty($value)){
            return false;
        }
        //保证每一个id1传入的都是正整数,foreach遍历每一个ID号
        foreach ($value as $id){
        if(!$this->isPositiveInteger($id)){
            return false;
        }
        }
        return true;
    }
}