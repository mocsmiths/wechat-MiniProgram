<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/28
 * Time: 07:33
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden=['delete_time','topic_img_id','head_img_id','update_time'];

    public function topicImg(){
        return $this->belongsTo('Image','topic_img_id','id');
    }

    public function headImg(){
        return $this->belongsTo('Image','head_img_id','id');
    }

    public function products(){
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
        //注意product_id和theme_id的顺序
    }

    public static function getThemeWithProducts($id){
        $theme = self::with('products,topicImg,headImg')->find($id);
        return $theme;
    }


}