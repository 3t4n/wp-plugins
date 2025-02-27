<?php
/**
 * API related functions
 *
 * @package  includes
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* ------------------------------------------------------------------------------- */

if ( ! function_exists('wpoai_rest_api_external_trigger') ) :
/**
 * Trigger external api
 *
 * @return string
 */
function wpoai_rest_api_external_trigger( $api_url = '', $formData = null, $method = 'POST', $headers = array() ) {
	$option = wpoai_admin_settings()->get_option();
	$postfields = json_encode($formData);

	$reqArgs = array(
		'timeout'     => '60',
		'redirection' => '10',
		'httpversion' => '1.0',
		'blocking'    => true,
	);

	if ( isset( $formData ) && !empty( $formData ) ) {
		$reqArgs["body"] = $postfields;
	}
	
	if ( !empty( $headers ) ) {
		foreach ($headers as $value) {
			$value = explode(":", $value);
			$reqArgs["headers"][$value[0]] = trim($value[1]);
		}
	}

	if($method == 'POST'){
		$response = wp_remote_post( $api_url, $reqArgs );
	} else {
		$response = wp_remote_get( $api_url, $reqArgs );
	}

	$http_code = wp_remote_retrieve_response_code( $response );
	$response     = wp_remote_retrieve_body( $response );
	$err = null;
	if($http_code !== 200){
		$err = strval($response);
	}

	if ($err) {
		return array( 'code' => 'api_error', 'message' => esc_html__( "Error #:" , WPOAI_SLUG ) . $err );
	} else {
		return json_decode( $response, true );
	}
}
endif;

/* ------------------------------------------------------------------------------- */

if ( ! function_exists('wpoai_rest_api_to_verify_ssl') ) :
/**
 * check if need to verify SSL when trigger external API
 *
 * @return string
 */
function wpoai_rest_api_to_verify_ssl() {
	$verify = false;
	if ( is_ssl() ) {
		$verify = true;
		$option = wpoai_admin_settings()->get_option();
		if ( isset( $option['settings_disable_ssl_verifypeer'] ) && !empty( $option['settings_disable_ssl_verifypeer'] ) && $option['settings_disable_ssl_verifypeer'] === 'yes' ) {
			$verify = false;
		} // end -$option['settings_disable_ssl_verifypeer']
	} // end - is_ssl
	return apply_filters( 'wpoai_rest_api_to_verify_ssl', $verify );
}
endif;