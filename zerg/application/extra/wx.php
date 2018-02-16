<?php
/**
 * Created by ${johnsmiths}.
 * User: ${johnsmiths}
 * Date: 2017/10/31
 * Time: 16:42
 */

return [
    'app_id' => '',
    'app_secret' => '',
    'login_url'=> "https://api.weixin.qq.com/sns/jscode2session?" .
        "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code"
];