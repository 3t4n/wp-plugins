<?php
class wechat_JSSDK {
  private $appId;
  private $appSecret;

  public function __construct($appId, $appSecret) {
    $this->appId = $appId;
    $this->appSecret = $appSecret;
  }

  public function getSignPackage(){
    $jsapiTicket = $this->getJsApiTicket();
    // 注意 URL 一定要动态获取，不能 hardcode.
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $timestamp = time();
    $nonceStr = $this->createNonceStr();

    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

    $signature = sha1($string);

    $signPackage = array(
      "appId"     => $this->appId,
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "signature" => $signature,
      "rawString" => $string
    );
    return $signPackage; 
  }

  private function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }

  private function getJsApiTicket() {
      $accessToken = $this->Wechatacc();
      $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
      
      $res = json_decode($this->httpGet($url));
      
      if(isset($res->ticket)){
          $ticket = $res->ticket;
        //   if ($ticket) {
        //     $data->expire_time = time() + 7000;
        //     $data->jsapi_ticket = $ticket;
        //     $this->set_php_file("jsapi_ticket.php", json_encode($data));
        //   }
      }else{
          $ticket ='';
      }
    return $ticket;
  }
  public function Wechatacc(){
      $WechatReplay_access_token = get_option('WechatReplay_access_token');
      return $WechatReplay_access_token;
  }
  public static   function getAccessToken() {
        $wechat_replay1 = get_option('wechat_replay');
           
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$wechat_replay1['appid']}&secret={$wechat_replay1['secret']}"; 
          
        $res = json_decode(self::httpGet1($url));
         
        if(isset($res->access_token)){
        $access_token = $res->access_token;
        $WechatReplay_access_token = get_option('WechatReplay_access_token');
        if($WechatReplay_access_token!==false){
            update_option('WechatReplay_access_token',$access_token);
        }else{
            add_option('WechatReplay_access_token',$access_token);
        }
        }
  }
    public static  function httpGet1($url) {
    $defaults = array(
        'timeout' => 120,
        'connecttimeout'=>120,
        'redirection' => 3,
        'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
        'sslverify' => FALSE,
    );
	$result = wp_remote_get($url,$defaults);
    $result = wp_remote_retrieve_body($result);
    return $result;
  }

  private function httpGet($url) {
    $defaults = array(
        'timeout' => 120,
        'connecttimeout'=>120,
        'redirection' => 3,
        'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
        'sslverify' => FALSE,
    );
	$result = wp_remote_get($url,$defaults);
    $result = wp_remote_retrieve_body($result);
    return $result;
  }

  private function get_php_file($filename) {
    return @trim(substr(file_get_contents($filename), 15));
  }
  private function set_php_file($filename, $content) {
    $fp = fopen($filename, "w");
    fwrite($fp, "<?php exit();?>" . $content);
    fclose($fp);
  }
}

