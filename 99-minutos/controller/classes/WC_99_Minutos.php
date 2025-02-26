<?php

if (!defined('ABSPATH')) {
    die;
}

function init99Minutos()
{
    if (!class_exists('WC_99_Minutos')) {
        class WC_99_Minutos extends WC_Shipping_Method
        {

            public function __construct()
            {
                $this->id = '99minutos'; // Id for your shipping method. Should be uunique.
                $this->method_title = __('99 minutos');  // Title shown in admin
                $this->method_description = __('Envíos con 99minutos.com'); // Description shown in admin

                $this->enabled = "yes"; // This can be added as an setting but for this example its forced enabled
                $this->title = "99 minutos"; // This can be added as an setting but for this example its forced.

                $this->init();
            }

            function init()
            {
                // Load the settings API
                $this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
                $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

                // Save settings in admin if you have any defined
                add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
            }

            private function weight()
            {
                $totalWeight = WC()->cart->get_cart_contents_weight();
                return $totalWeight;
            }

            public function validateZipCode()
            {

                add_action('woocommerce_after_checkout_billing_form ', 'zipCode');

                $path = plugin_dir_path(__DIR__);

                $path2Main = substr($path, 0, -11);

                require_once($path2Main . 'model/classes/getVendorData.php');

                $getVendorData = new Minutos_getVendorData;

                $getVendorData->orderPDF();

                $apikey = $getVendorData->apikeyPDF;

                $totalWeight = $this->weight();

                $finalWeight = $totalWeight * 1000;

                $url = "https://prd-dot-precise-line-76299minutos.appspot.com/api/v1/shipping/rates";

                $payload = array(
                    "weight" => $finalWeight,
                    "width" => 1,
                    "depth" => 1,
                    "height" => 1,
                    "origin" => array(
                        "codePostal" => "57000",
                        "country" => "MEX",
                    ),
                    "destination" => array(
                        "codePostal" => WC()->customer->get_shipping_postcode(),
                        "country" => "MEX",
                    ),
                );

                $body = json_encode($payload);

                $options = [
                    'body' => $body,
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . $apikey
                    ]
                ];

                return wp_remote_retrieve_body(wp_remote_post($url, $options));
            }

            public function calculate_shipping($package = array())
            {

                $path = plugin_dir_path(__DIR__);

                $path2Main = substr($path, 0, -11);

                require_once($path2Main . 'model/classes/getVendorData.php');

                $getVendorData = new Minutos_getVendorData;

                $getVendorData->getShippingData();

                $active99 = $getVendorData->active99;
                $xs_99 = $getVendorData->xs_99;
                $s_99 = $getVendorData->s_99;
                $m_99 = $getVendorData->m_99;
                $l_99 = $getVendorData->l_99;
                $activeSameDay = $getVendorData->activeSameDay;
                $xs_same = $getVendorData->xs_same;
                $s_same = $getVendorData->s_same;
                $m_same = $getVendorData->m_same;
                $l_same = $getVendorData->l_same;
                $xl_same = $getVendorData->xl_same;
                $activeNextDay = $getVendorData->activeNextDay;
                $xs_next = $getVendorData->xs_next;
                $s_next = $getVendorData->s_next;
                $m_next = $getVendorData->m_next;
                $l_next = $getVendorData->l_next;
                $xl_next = $getVendorData->xl_next;
                $activeCO2 = $getVendorData->activeCO2;
                $xs_CO2 = $getVendorData->xs_CO2;
                $s_CO2 = $getVendorData->s_CO2;
                $m_CO2 = $getVendorData->m_CO2;
                $l_CO2 = $getVendorData->l_CO2;
                $xl_CO2 = $getVendorData->xl_CO2;
                $name_99 = $getVendorData->name_99;
                $name_same = $getVendorData->name_same;
                $name_next = $getVendorData->name_next;
                $name_CO2 = $getVendorData->name_CO2;

                $weight = WC()->cart->get_cart_contents_weight();

                $cost99;
                $costSame;
                $costNext;
                $costCO2;

                if ($weight < 1) {
                    $cost99 = $xs_99;
                    $costSame = $xs_same;
                    $costNext = $xs_next;
                    $costCO2 = $xs_CO2;
                } elseif (1 <= $weight && $weight < 2) {
                    $cost99 = $s_99;
                    $costSame = $s_same;
                    $costNext = $s_next;
                    $costCO2 = $s_CO2;
                } elseif (2 <= $weight && $weight < 3) {
                    $cost99 = $m_99;
                    $costSame = $m_same;
                    $costNext = $m_next;
                    $costCO2 = $m_CO2;
                } elseif (3 <= $weight && $weight < 5) {
                    $cost99 = $l_99;
                    $costSame = $l_same;
                    $costNext = $l_next;
                    $costCO2 = $l_CO2;
                } elseif (5 <= $weight && $weight <= 25) {
                    $cost99 = null;
                    $costSame = $xl_same;
                    $costNext = $xl_next;
                    $costCO2 = $xl_CO2;
                }

                add_action('woocommerce_checkout_shipping', 'validateZipCode');

                $response = $this->validateZipCode();

                $jsonResponse = json_decode($response, true);

                $niceMessage = isset($jsonResponse["message"]) ?
                    (
                    isset($jsonResponse["message"]["title"])
                        ? $jsonResponse["message"]["title"] : $jsonResponse["message"]
                    ) : "";


                $rateNextDay = array(
                    'label' => $name_next,
                    'cost' => $costNext,
                    'id' => 'ND'
                );

                $rateSameDay = array(
                    'label' => $name_same,
                    'cost' => $costSame,
                    'id' => 'SD'
                );

                $rate99minutos = array(
                    'label' => $name_99,
                    'cost' => $cost99,
                    'id' => '99'
                );

                $rateCO2 = array(
                    'label' => $name_CO2,
                    'cost' => $costCO2,
                    'id' => 'CO2'
                );

                $errors = array(
                    "Wrong APIKEY",
                    "Package box is too big",
                    "Impossible size for package box",
                    "Package size not allowed",
                    "International shipping is not allowed",
                    "Country not allowed",
                    "Sin cobertura",
                    ""
                );

                $arrayHelper = [];
                $arrayCodes = [];

                if(isset($jsonResponse["message"]))
                {
                    if(is_array($jsonResponse["message"]))
                    {
                        for($i = 0; $i < count($jsonResponse["message"]); $i++)
                        {
                            if(is_array($jsonResponse["message"][$i]))
                            {
                                array_push($arrayHelper, $jsonResponse["message"][$i]);
                            }
                        }

                        foreach($arrayHelper as $methodCode)
                        {
                            if(isset($methodCode["deliveryType"]["code"]))
                            {
                                $code = $methodCode["deliveryType"]["code"];

                                array_push($arrayCodes, $code);
                            }
                        }
                    }
                }

                if (!in_array($niceMessage, $errors)) {
                    if ($active99 == 1 && in_array(3, $arrayCodes)) {
                        $this->add_rate($rate99minutos);
                    }

                    if ($activeSameDay == 1 && in_array(1, $arrayCodes)) {
                        $this->add_rate($rateSameDay);
                    }

                    if ($activeNextDay == 1 && in_array(2, $arrayCodes)) {
                        $this->add_rate($rateNextDay);
                    }

                    if ($activeCO2 == 1 && in_array(4, $arrayCodes)) {
                        $this->add_rate($rateCO2);
                    }
                }
            }
        }
    }
}