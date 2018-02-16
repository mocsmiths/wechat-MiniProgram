<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/18
 * Time: 21:30
 */

namespace app\api\model;


use think\Db;
use think\Exception;
use think\Model;

class Banner extends BaseModel
{
    protected $hidden =['update_time','delete_time'];

    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerByID ($id){
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;


}
}