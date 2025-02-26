<?php
if (!defined('ABSPATH')) {
    exit;
}
function ambikly_get_available_payment_gateways()
{
    return apply_filters('ambikly_payment_gateways', array(
        \Ambikly\Gateways\PayPal\PayPal::class,
        \Ambikly\Gateways\CashOnDelivery\CashOnDelivery::class,
    ));

}

function ambikly_get_available_gateways_list()
{
    $gateways = ambikly_get_available_payment_gateways();

    $active_gateways = ambikly_get_active_payment_gateways();

    foreach ($gateways as $gateway) {

        $instance = $gateway::getInstance();

        $id = $instance->getID();

        if (in_array($id, $active_gateways)) {

            $instance->preview();
        }
    }

}

function ambikly_get_active_payment_gateways()
{

    return ambikly_get_option('active_payment_gateways', []);
}

function ambikly_is_guest_checkout()
{

    return (boolean)ambikly_get_option('enable_guest_checkout', true);
}

function ambikly_order_response($response_data)
{
    $response = wp_parse_args($response_data, [
        "order_status" => "success",
        "order_action" => "redirect",
        "redirect_url" => "",
        'message' => '',
    ]);
    wp_send_json($response);
    exit;

}

