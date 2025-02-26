<?php

if(!defined('ABSPATH')){
    die;
}

class Minutos_getVendorData
{
    public $business;
    public $sellerName;
    public $sellerLastName;
    public $Phone;
    public $Email;
    public $originAddress;
    public $originNumber;
    public $zipCode;
    public $Country;
    public $apikey;
    public $apikeyPDF;
    public $active99;
    public $xs_99;
    public $s_99;
    public $m_99;
    public $l_99;
    public $activeSameDay;
    public $xs_same;
    public $s_same;
    public $m_same;
    public $l_same;
    public $xl_same;
    public $activeNextDay;
    public $xs_next;
    public $s_next;
    public $m_next;
    public $l_next;
    public $xl_next;
    public $activeCO2;
    public $xs_CO2;
    public $s_CO2;
    public $m_CO2;
    public $l_CO2;
    public $xl_CO2;
    public $name_99;
    public $name_same;
    public $name_next;
    public $name_CO2;

    public function vendorData($email)
    {
        return $this->privateVendorData($email);
    }

    private function privateVendorData($email)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . '99minutos_vendors';
        $fulfillment = $wpdb->get_results("SELECT * FROM $table_name WHERE Email = '$email'");
        foreach($fulfillment as $row)
        {
            $this->business = $row->business;
            $this->sellerName = $row->sellerName;
            $this->sellerLastName = $row->sellerLastName;
            $this->Phone = $row->Phone;
            $this->Email = $row->Email;
            $this->originAddress = $row->originAddress;
            $this->originNumber = $row->originNumber;
            $this->zipCode = $row->zipCode;
            $this->Country = $row->Country;
            $this->apikey = $row->apikey;
        }
    }

    public function orderPDF()
    {
        return $this->privateOrderPDF();
    }

    private function privateOrderPDF()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . '99minutos_vendors';
        $fulfillment = $wpdb->get_results("SELECT * FROM $table_name");
        foreach($fulfillment as $row)
        {
            $this->apikeyPDF = $row->apikey;
        }
    }

    public function getShippingData()
    {
        return $this->privateGetShippingData();
    }

    private function privateGetShippingData(){

        global $wpdb;
        $table_name = $wpdb->prefix . '99minutos_shippingmethods';
        $shippingCosts = $wpdb->get_results( "SELECT * FROM $table_name");
        foreach($shippingCosts as $row)
        {
            $this->active99 = $row->active99;
            $this->xs_99 = $row->xs_99;
            $this->s_99 = $row->s_99;
            $this->m_99 = $row->m_99;
            $this->l_99 = $row->l_99;
            $this->activeSameDay = $row->activeSameDay;
            $this->xs_same = $row->xs_same;
            $this->s_same = $row->s_same;
            $this->m_same = $row->m_same;
            $this->l_same = $row->l_same;
            $this->xl_same = $row->xl_same;
            $this->activeNextDay = $row->activeNextDay;
            $this->xs_next = $row->xs_next;
            $this->s_next = $row->s_next;
            $this->m_next = $row->m_next;
            $this->l_next = $row->l_next;
            $this->xl_next = $row->xl_next;
            $this->activeCO2 = $row->activeCO2;
            $this->xs_CO2 = $row->xs_CO2;
            $this->s_CO2 = $row->s_CO2;
            $this->m_CO2 = $row->m_CO2;
            $this->l_CO2 = $row->l_CO2;
            $this->xl_CO2 = $row->xl_CO2;
            $this->name_99 = $row->name_99;
            $this->name_same = $row->name_same;
            $this->name_next = $row->name_next;
            $this->name_CO2 = $row->name_CO2;
        }
    }
}
