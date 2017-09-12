<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/5/17
 * Time: 15:17
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time', 'update_time', 'create_time'];

    public function img(){
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }
}