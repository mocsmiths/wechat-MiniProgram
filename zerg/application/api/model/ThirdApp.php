<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/6/16
 * Time: 10:07
 */

namespace app\api\model;


use think\Model;

class ThirdApp extends BaseModel
{
    public static function check($ac, $se)
    {
        $app = self::where('app_id','=',$ac)
            ->where('app_secret', '=',$se)
            ->find();
        return $app;

    }
}