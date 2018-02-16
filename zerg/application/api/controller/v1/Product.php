<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/30
 * Time: 20:22
 */

namespace app\api\controller\v1;

use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IDMustBePostiveInt;
use app\api\validate\ProductException;

class Product
{   //获取最近的商品
    public function getRecent($count=15){
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
        if(!$products->isEmpty()){
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }
    public function getAllInCategory($id){
        (new IDMustBePostiveInt())->goCheck();
        $products = ProductModel::getProductByCategoryID($id);
        if($products->isEmpty()){
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }
    public function getOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if(!$product){
            throw new ProductException();
        }
        return $product;
    }
}