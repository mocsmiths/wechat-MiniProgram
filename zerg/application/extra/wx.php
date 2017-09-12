<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/5/22
 * Time: 9:17
 */

return [
  'app_id' => '',
  'app_secret' => '',
  'login_url'=> "https://api.weixin.qq.com/sns/jscode2session?" .
      "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
  'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" .
      "grant_type=client_credential&appid=%s&secret=%s",

];