<?php

if(!defined('ABSPATH')){
    die;
}

class Minutos_getClientData
{ 
    public $receiver;

    public $nameReceiver;

    public $lastNameReceiver;

    public $phoneReceiver;

    public $emailReceiver;

    public $addressDestination;

    public $numberDestination;

    public $postalCodeDestination;

    public $country;

    public function clientData($order_id)
    {
        return $this->privateClientData($order_id);
    }

    private function privateClientData($order_id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . '99minutos_orders';
        $fulfillment = $wpdb->get_results("SELECT * FROM $table_name WHERE orderid = '$order_id'");
        foreach($fulfillment as $row)
        {
            $this->receiver = $row->receiver;
            $this->nameReceiver = $row->nameReceiver;
            $this->lastNameReceiver = $row->lastNameReceiver;
            $this->phoneReceiver = $row->phoneReceiver;
            $this->emailReceiver = $row->emailReceiver;
            $this->addressDestination = $row->addressDestination;
            $this->numberDestination = $row->numberDestination;
            $this->postalCodeDestination = $row->postalCodeDestination;
            $this->country = $row->country;
        }
    }
}