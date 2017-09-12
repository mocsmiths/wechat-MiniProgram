<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/5/12
 * Time: 15:22
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeException;

class Theme
{

    /**
     * @url /theme?ids=id1,id2,id3,....
     * @return 一组theme模型
     */
    public function getSimpleList($ids=''){
        (new IDCollection())->goCheck();
        $ids = explode(',', $ids);
        $result = ThemeModel::with('topicImg,headImg')
            ->select($ids);
        if($result->isEmpty()){
            throw new ThemeException();
        }
        return $result;
    }

    /**
     * @url /theme/:id
     */
    public function getComplexOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $theme = ThemeModel::getThemeWithProducts($id);
        if(!$theme){
            throw new ThemeException();
        }
        return $theme;
    }
}