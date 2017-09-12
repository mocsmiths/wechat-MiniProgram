<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/5/12
 * Time: 15:26
 */

namespace app\api\model;


use think\Model;

class Theme extends BaseModel
{
    protected $hidden = [
        'delete_time', 'update_time',
        'topic_img_id', 'head_img_id'];

    public function topicImg()
    {
        //        $this->hasOne()
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }

    public function headImg()
    {
        return $this->belongsTo('Image', 'head_img_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(
            'Product', 'theme_product', 'product_id',
            'theme_id');
    }

    public static function getThemeWithProducts($id)
    {
        $theme = self::with('products,topicImg,headImg')
            ->find($id);
        return $theme;
    }
}