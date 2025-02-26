<?php

if(!defined('ABSPATH')){
    die;
}

class Minutos_orderInsert
{
    public function orderData($nameReceiver, $lastNameReceiver, $emailReceiver, $phoneReceiver, $addressDestination, $postalCodeDestination, $orderid, $deliveryType)
    {
        return $this->insertOrderData($nameReceiver, $lastNameReceiver, $emailReceiver, $phoneReceiver, $addressDestination, $postalCodeDestination, $orderid, $deliveryType);
    }

    private function insertOrderData($nameReceiver, $lastNameReceiver, $emailReceiver, $phoneReceiver, $addressDestination, $postalCodeDestination, $orderid, $deliveryType)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . '99minutos_orders';
        $wpdb->get_results("INSERT INTO $table_name (nameReceiver, lastNameReceiver, emailReceiver, phoneReceiver, addressDestination, postalCodeDestination, orderid, deliveryType) VALUES ('$nameReceiver', '$lastNameReceiver', '$emailReceiver', '$phoneReceiver', '$addressDestination', '$postalCodeDestination', '$orderid', '$deliveryType')");
    }
}