<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/16
 * Time: 20:28
 */

namespace app\api\controller\v2;

use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;
use think\Exception;


class Banner
{
    public function getBanner($id)

    {
       return '这是V2版本';
    }
}