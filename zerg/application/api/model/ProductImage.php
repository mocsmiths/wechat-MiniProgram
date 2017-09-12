<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/5/23
 * Time: 15:40
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['img_id', 'delete_time', 'product_id'];

    public function imgUrl()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}