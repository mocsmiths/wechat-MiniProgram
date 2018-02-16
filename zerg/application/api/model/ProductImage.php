<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/11/3
 * Time: 20:59
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden=['img_id','delete_time','product_id'];
    public function imgUrl(){
        return $this->belongsTo('Image','img_id','id');
    }
}