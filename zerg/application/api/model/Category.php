<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/30
 * Time: 22:10
 */

namespace app\api\model;


class Category extends BaseModel
{   protected $hidden = ['delete_time','update_time','create_time'];
    public function img(){
        return $this->belongsTo('Image','topic_img_id','id');

    }
}