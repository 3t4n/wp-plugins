<?php
if ( ! defined( 'ABSPATH' ) ) exit;


add_action('init', function() {

    $ghlcf7_locationId = get_option( 'ghlcf7_locationId' );
    $ghlcf7_access_token_valid = get_transient('ghlcf7_access_token_valid');

    if ( ! empty( $ghlcf7_locationId ) && ! $ghlcf7_access_token_valid ) {
        
        // renew the access token
        ghlcf7_get_new_access_token();
    }

});

function ghlcf7_get_new_access_token()
{
	$key = 'ghlcf7_access_token_valid';
    $expiry = 59  * 60 * 24; // almost 1 day

	$ghlcf7_client_id 		= get_option( 'ghlcf7_client_id' );
	$ghlcf7_client_secret 	= get_option( 'ghlcf7_client_secret' );
	$refreshToken 			= get_option( 'ghlcf7_refresh_token' );
	
	$endpoint = GHLCF7_GET_TOKEN_API;
	$body = array(
		'client_id' 	=> $ghlcf7_client_id,
		'client_secret' => $ghlcf7_client_secret,
		'grant_type' 	=> 'refresh_token',
		'refresh_token' => $refreshToken
	);

	$request_args = array(
		'body' 		=> $body,
		'headers' 	=> array(
			'Content-Type' => 'application/x-www-form-urlencoded',
		),
	);

	$response = wp_remote_post( $endpoint, $request_args );
	$http_code = wp_remote_retrieve_response_code( $response );

	if ( 200 === $http_code ) {

		$body = json_decode( wp_remote_retrieve_body( $response ) );
		$new_ghlcf7_access_token = $body->access_token;
		$new_ghlcf7_refresh_token = $body->refresh_token;

		update_option( 'ghlcf7_access_token', $new_ghlcf7_access_token );
		update_option( 'ghlcf7_refresh_token', $new_ghlcf7_refresh_token );

	
		set_transient( $key, true, $expiry );
	}

	return null;
}