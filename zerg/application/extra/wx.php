<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/5/22
 * Time: 9:17
 */

return [
  'app_id' => 'wx410bf90c3f9b5cc7',
  'app_secret' => '1eb47d348edafbd9d9b049bd6bd62045',
  'login_url'=> "https://api.weixin.qq.com/sns/jscode2session?" .
      "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
  'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" .
      "grant_type=client_credential&appid=%s&secret=%s",

];