<?php
namespace Feexpay;

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use function GuzzleHttp\json_encode;
require_once(plugin_dir_path(__DIR__) . 'src/Constants.php');
require_once(plugin_dir_path(__DIR__) . 'src/Status.php');
use Constants;
use Status;


class FeexpayClass{

    //Token API Key
    private $token;

    //Shop's id
    private $shop;

    private $curl;

    private $sandbox;

    /**
     * Feexpay constructor.
     */
    public function __construct($shop, $token, $sandbox = false)
    {
        $this->token = $token;
        $this->shop = $shop;
        $this->sandbox = $sandbox;
        $this->curl = new \GuzzleHttp\Client();
    }


    public function hash($str){
        if($this->getToken() == null) throw new \Exception("Secret key is not set");
        if($this->getShop() == null) throw new \Exception("Shop's id is not set");
        return urlencode(  base64_encode( hash_hmac('SHA256', $str, $this->getToken(),TRUE)));
    }

    public function verifyTransaction($transactionId){
        $response = null;
//      try{

        $const = $this->sandbox ? Constants\Constants::BASE_URL : Constants\Constants::BASE_URL;

        $response = $this->curl->get($const. "/api/transactions/getrequesttopay/integration/$transactionId");

        $response = $response->getBody();

//      }catch (\Exception $e){
//          echo "<script type='text/javascript'>alert('error');</script>";

//        $response = json_encode(array( "status" => Status\STATUS::TRANSACTION_NOT_FOUND));
//      }
        return json_decode((string) $response);
    }
    
    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }


    /**
     * @return null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return null
     */
    public function getShop()
    {
        return $this->shop;
    }
}
