<?php
/**
 * Test connection | ODFL test connection
 * @package     Woocommerce ODFL Edition
 * @author      <https://eniture.com/>
 * @copyright   Copyright (c) 2017, Eniture
 */
if (!defined('ABSPATH')) {
    exit;
}
add_action('wp_ajax_nopriv_odfl_action', 'odfl_test_submit');
add_action('wp_ajax_odfl_action', 'odfl_test_submit');

/**
 * ODFL test connection ajax request
 * @return array
 */
function odfl_test_submit()
{
    $domain = odfl_quotes_get_domain();

    $sRequestData = array(
        'licence_key' => (isset($_POST['odfl_plugin_license'])) ? sanitize_text_field($_POST['odfl_plugin_license']) : "",
        'sever_name' => $domain,
        'carrierName' => 'odfl4me',
        'plateform' => 'WordPress',
        'carrier_mode' => 'test',
        'odflUserName' => (isset($_POST['odfl_username'])) ? sanitize_text_field($_POST['odfl_username']) : "",
        'odflPassword' => (isset($_POST['odfl_password'])) ? sanitize_text_field($_POST['odfl_password']) : "",
        'odflCustomerAccount' => (isset($_POST['odfl_accountno'])) ? sanitize_text_field($_POST['odfl_accountno']) : "",
        'senderZip' => (isset($_POST['billing_zip_code'])) ? sanitize_text_field($_POST['billing_zip_code']) : "",
    );


    $url = ODFL_FREIGHT_DOMAIN_HITTING_URL . '/index.php';

    $field_string = http_build_query($sRequestData);
    $response = wp_remote_post($url,
        array(
            'method' => 'POST',
            'timeout' => 60,
            'redirection' => 5,
            'blocking' => true,
            'body' => $field_string,
        )
    );

    $Response = wp_remote_retrieve_body($response);
    $sResponseData = json_decode($Response);

    if (isset($sResponseData->soapenvBody->ns2getLTLRateEstimateResponse->return->success) && $sResponseData->soapenvBody->ns2getLTLRateEstimateResponse->return->success === "true") {
        $sResult = array('message' => "success");
    } elseif (isset($sResponseData->error) || $sResponseData->soapenvBody->ns2getLTLRateEstimateResponse->return->success === "false") {
        $sResult = (isset($sResponseData->error) && !empty($sResponseData->error)) ? $sResponseData->error : str_replace('Odfl4me', "", $sResponseData->soapenvBody->ns2getLTLRateEstimateResponse->return->errorMessages);
        $sResult = str_replace('User', "Username", $sResult);
        $sResult = array('message' => $sResult);
    } else {
        $sResult = array('message' => "failure");
    }

    echo json_encode($sResult);
    exit();
}