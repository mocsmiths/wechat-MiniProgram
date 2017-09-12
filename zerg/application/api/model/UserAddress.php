<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/5/25
 * Time: 15:44
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden =['id', 'delete_time', 'user_id'];
}