<?php

if(!defined('ABSPATH')){
    die;
}

require_once plugin_dir_path( __DIR__ ) . 'model/classes/orderInsert.php';

function minutos_insertOrderintoDB($order_id)
{
    $class = new Minutos_orderInsert;

    $order = wc_get_order( $order_id );
    $nameReceiver = $order->get_billing_first_name();
    $lastNameReceiver = $order->get_billing_last_name();
    $emailReceiver = $order->get_billing_email();
    $phoneReceiver = $order->get_billing_phone();
    $addressDestination = $order->get_shipping_address_1();
    $postalCodeDestination = $order->get_shipping_postcode();
    $orderid = $order_id;
    $deliveryType = $order->get_shipping_method();

    return $class->orderData($nameReceiver, $lastNameReceiver, $emailReceiver, $phoneReceiver, $addressDestination, $postalCodeDestination, $orderid, $deliveryType);

    var_dump($nameReceiver);

}

add_action( 'woocommerce_thankyou', 'minutos_insertOrderintoDB' );