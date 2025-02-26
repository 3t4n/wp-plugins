<?php

require_once "AutoShop_Order.php";
require_once "AutoShop_Product.php";

/**
 * User: AutoShop
 * Date: 1/12/16
 * Time: 5:42 PM
 */
class AutoShop
{
    const API_URL = 'http://api.autoshop.aucoz.com/gate/';
    private $API_KEY = '';

    /**
     * Send Order to AutoShop
     *
     * @param $order
     * @return mixed json
     */
    public function sendOrder($order)
    {
        if (empty($this->API_KEY))
        {
            return;
        }

        $url = sprintf(self::API_URL.'?act=sendorder');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('secretkey'=>$this->API_KEY, 'payload'=>$order->getPayloadJson()));
        $out = curl_exec($ch);
        curl_close($ch);

        return json_decode($out);
    }

    /**
     * Set API KEY - Copy from Mobile App
     *
     * @param $secretkey string
     */
    public function setSecretKey($secretkey)
    {
        $this->API_KEY = $secretkey;
    }
}