<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class MMECore
{

    public static $SERVICE_URL = "https://horizonapi.moneyme.com.au/Mobile";
    
    public static $STATELESS = true;
    protected static $USERNAME = "";
    protected static $PWD = "";
    public static $CUSTOMER = false;

    /**
     * Get access token from session or from server _requestToken
     * use stateless if you don't want to save token in session
     */
    
    protected static function __authorize($arr = [])
    {
        $key = md5(base64_encode(self::$USERNAME.":".self::$PWD)); //set this as key to check if something changed in the client credentials 
        if (self::$STATELESS){
            $token = self::_requestToken($arr);
            return self::$CUSTOMER = $token;
        }
        
        if(self::getSession($key)){
            $token = self::getSession($key);
            self::$CUSTOMER = $token;
            return $token;
        }else{
            $token = self::_requestToken($arr);
            if(isset($token->AccessToken)){
                self::$CUSTOMER = $token;
                self::setSession($key, $token, 1);
                return $token;
            }else{
                return (object) ['error' => $token->UserErrorMessage];
            }
        }
    }

    protected static function call($url, $header, $type = "get", $content = '', $basic_auth = false)
    {
        /**
         * Require the CURL and JSON PHP extensions to be installed
         */
        if(!function_exists('curl_init')){
            throw new MMEException('Curl extension is not installed.');
        }
        $curl = curl_init();
        $setopt_arr = [
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true
        ];
        
        if ($type == "post"){
            $setopt_arr[CURLOPT_POST] = true;
            $setopt_arr[CURLOPT_POSTFIELDS] = $content;
        }

        if($basic_auth){
            $setopt_arr[CURLOPT_USERPWD] = self::$USERNAME.":".self::$PWD;
        }
        curl_setopt_array($curl, $setopt_arr);
        
        $response = curl_exec($curl);

        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        $result = json_decode($response);
        return (object) $result;
    }

    protected static function isAuthorized(){
        if (self::$STATELESS){
            return false;
        }
        $key = md5(base64_encode(self::$USERNAME.":".self::$PWD));
        if(self::getSession($key)){
            self::$CUSTOMER = $_SESSION[$key];
        }
    }

    protected static function setSession($key, $value, $expire_at = 1){
        $_SESSION[$key] = $value;
        $_SESSION["{$key}_expire"] = strtotime("+ {$expire_at} minute");
    }

    protected static function getSession($key){
        if(isset($_SESSION[$key])){ 
            if(isset($_SESSION["{$key}_expire"])){
                if($_SESSION["{$key}_expire"] < strtotime("now")){
                    unset($_SESSION["{$key}_expire"]);
                    unset($_SESSION[$key]);
                    session_destroy();
                    return false;
                }
                return $_SESSION[$key];
            }
        }
        return false;
    }

    private static function _requestToken($arr){
        $header = array("Content-Type: application/json");
        $arr['BrandId'] = 1; //MoneyMe
        $arr['UserAgent'] = $_SERVER['HTTP_USER_AGENT'];
        
        $content = json_encode($arr);
        return self::call(self::$SERVICE_URL.'/api/MmePlusEcommerceAccount/Login', $header, 'post', $content, true);
    }
}
class MMEException extends \Exception{

}