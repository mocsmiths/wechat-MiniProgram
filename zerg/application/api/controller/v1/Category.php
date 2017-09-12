<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/5/17
 * Time: 15:16
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;


class Category
{

    public function getAllCategories(){
        $categories = CategoryModel::all([],'img');
        if($categories->isEmpty()){
            throw new CategoryException();
        }
        return $categories;
    }
}