<?php
/**
 * Settings class file.
 *
 * @package WordPress Plugin Template/Settings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Settings class.
 */
class appalify_activator{

public function check_if_appalify_is_active(){	

$appalify_key = get_option('appalify_validator_key');

// API endpoint
$url = 'https://api.appalify.com/Premium-check.php';

// Initialize cURL session
$ch = curl_init($url);

$postData = array(
    'customerlicensekey' => $appalify_key,
    'plugin_id' => 'Appalify for Woocommerce'
);
// Set the cURL options
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL session
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)){
    echo 'Curl error: ' . esc_attr(curl_error($ch));
}

// Close cURL session
curl_close($ch);
// Output the response
update_option('check_if_appalify_active', $response);

//get it like this: $response = get_option('check_if_panelhelper_active');

}

}