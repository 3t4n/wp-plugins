<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Get ne the newest public key from the backend
function emplibot_get_newest_public_key() {
    $backend_url = "https://backend.emplibot.com/wp-plugin";   

    // Make a GET request to the REST API
    $response = wp_remote_get($backend_url . '/public-key');

    // Check if the request was successful
    if (is_wp_error($response)) {
        return false;
    }

    // Decode the JSON response
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    // Check if JSON decoding was successful
    if (is_null($data)) {
        return false;
    }

    // Check if 'public_key' exists in the response
    if (isset($data['public_key'])) {
        $public_key = $data['public_key'];
        $public_key = emplibot_public_key_sanitize($public_key);

        update_option('emplibot_public_key', $public_key);
        return true;
    }
    return false;
    
}

function emplibot_public_key_sanitize($input) {
    return sanitize_textarea_field($input);
}

// Middleware function
function emplibot_middleware($result, WP_REST_Server $server, WP_REST_Request $request) {
    
    $route = $request->get_route();
    if (false === strpos($route, '/emplibot')) {
        return $result;
    }

    $public_key_pem = sanitize_textarea_field(get_option('emplibot_public_key'));
    if(empty($public_key_pem))
        return emplibot_raise_public_key_error_response();

    $received_plugin_key = $request->get_header('X-EMPLIBOT-KEY');
    $emplibot_options = get_option('emplibot_options');
    
    $plugin_key = sanitize_text_field($emplibot_options['plugin_key']);

    if(empty($plugin_key))
        return emplibot_raise_plugin_key_error_response();
 
    if ($received_plugin_key != $plugin_key)
        return emplibot_raise_plugin_key_error_response();
    
    return $result;
}
add_filter('rest_pre_dispatch', 'emplibot_middleware', 10, 3);

// Function to verify RSA signature
function emplibot_verify_rsa_signature($data) {
    $public_key_pem = sanitize_textarea_field(get_option('emplibot_public_key'));

    if ($data === null || !isset($data->signature) || !isset($data->content) || !$public_key_pem) {
        return false;
    }

    $received_signature = $data->signature;
    $signature = base64_decode($received_signature);
    return openssl_verify($data->content, $signature, $public_key_pem, OPENSSL_ALGO_SHA256);
}


/**
 * 
 * Plugin Error Codes
 * 
 * Plugin Key Error         = PL0KE0
 * Public Key Error         = PU0KE0
 * Hash Already Exists      = HA0EX0
 * Image Upload Failed      = IU0FA0
 * Blogpost Upload Failed   = BU0FA0
 * Public Key Update Failed = PU1KE0
 * 
 */


function emplibot_raise_plugin_key_error_response() {

    $res_body = array(
        "error_code" => "PL0KE0",
        "detail" => "Please check if your plugin key is correct."
    );
    return new WP_REST_Response($res_body, 400);
}


function emplibot_raise_public_key_error_response() {

    $res_body = array(
        "error_code" => "PU0KE0",
        "detail" => "Please reinstall your plugin to receive the newest public key."
    );
    return new WP_REST_Response($res_body, 403);
}


function emplibot_raise_hash_already_exists_error_response() {

    $res_body = array(
        "error_code" => "HA0EX0",
        "detail" => "Your request limit is reached. Too many requests."
    );
    return new WP_REST_Response($res_body, 403);
}


function emplibot_raise_image_upload_failed_error_response() {

    $res_body = array(
        "error_code" => "IU0FA0",
        "detail" => "The image upload was not successful. Please try again later."
    );
    return new WP_REST_Response($res_body, 500);
}


function emplibot_raise_blogpost_upload_failed_error_response() {

    $res_body = array(
        "error_code" => "BU0FA0",
        "detail" => "The blogpost upload was not successful. Please try again later."
    );
    return new WP_REST_Response($res_body, 500);
}


function emplibot_raise_public_key_update_error_response() {

    $res_body = array(
        "error_code" => "PU1KE0",
        "detail" => "The public key could not be updated. Please try again later."
    );
    return new WP_REST_Response($res_body, 500);
}