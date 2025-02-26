<?php

if(!defined('ABSPATH')){
    die;
}

class Minutos_jsonBody
{   

    private function insertOrder99Data($reason, $counter99, $tracking99, $orderid, $sellerid)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . '99minutos_ordersnsettings';
        $wpdb->get_results("UPDATE $table_name SET reason = '$reason', counter99 = '$counter99', tracking99 = '$tracking99' WHERE orderid = '$orderid' AND sellerid ='$sellerid'");
    }

    public function sellerData($orderId, $sellerId, $sellerName)
    {
        return $this->insertSellerData($orderId, $sellerId, $sellerName);
    }

    private function insertSellerData($orderId, $sellerId, $sellerName)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . '99minutos_ordersnsettings';
        $sql = "INSERT INTO $table_name (orderid, sellerid, sellerName) VALUES ('$orderId', '$sellerId', '$sellerName')";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    public function body($apikey, $deliveryType, $packageSize, $sender, $emailSender, $phoneSender, $addressOrigin, $postalCode, $receiver, $emailReceiver, $phoneReceiver, $addressDestination, $postalCodeDestination, $orderid, $sellerid, $originNumber)
    {
        return $this->createBody($apikey, $deliveryType, $packageSize, $sender, $emailSender, $phoneSender, $addressOrigin, $postalCode, $receiver, $emailReceiver, $phoneReceiver, $addressDestination, $postalCodeDestination, $orderid, $sellerid, $originNumber);
    }

    private function createBody($apikey, $deliveryType, $packageSize, $sender, $emailSender, $phoneSender, $addressOrigin, $postalCode, $receiver, $emailReceiver, $phoneReceiver, $addressDestination, $postalCodeDestination, $orderid, $sellerid, $originNumber)
    {
        $url = "https://prd-dot-precise-line-76299minutos.appspot.com/api/v1/autorization/order";

        $dummy = "";

        $payload = array(
            "apikey" => $apikey,
            "deliveryType" => $deliveryType,
            "packageSize" => $packageSize,
            "notes" => $dummy,
            "cahsOnDelivery" => false,
            "amountCash" => 0,
            "SecurePackage" => false,
            "amountSecure" => 0,
            "receivedId" => $dummy,
            "origin" => array(
                "sender" => $sender,
                "nameSender" => $dummy,
                "lastNameSender" => $dummy,
                "emailSender" => $emailSender,
                "phoneSender" => $phoneSender,
                "addressOrigin" => $addressOrigin,
                "numberOrigin" => $originNumber,
                "codePostalOrigin" => $postalCode,
                "country" => "MEX"
            ),
            "destination" => array(
                "receiver" => $receiver,
                "nameReceiver" => $dummy,
                "lastNameReceiver" => $dummy,
                "emailReceiver" => $emailReceiver,
                "phoneReceiver" => $phoneReceiver,
                "addressDestination" => $addressDestination,
                "numberDestination" => $dummy,
                "codePostalDestination" => $postalCodeDestination,
                "country" => "MEX"
            )
        );

        $body = json_encode($payload);

        $options = [
            'body' => $body,
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ];

        $response = wp_remote_retrieve_body(wp_remote_post($url, $options));

        $jsonResponse = json_decode($response, true);

        $trackingId = $jsonResponse['message'][0]['reason']['trackingid'];
        $counter = $jsonResponse['message'][0]['reason']['counter'];
        $message = $jsonResponse['message'][0]['message'];

        $this->insertOrder99Data($message, $counter, $trackingId, $orderid, $sellerid);

        return $response;
    }
}