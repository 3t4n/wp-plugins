<?php

// Performs an IP check on the current user when the page is loaded and redirect user if not in the array
function cmm_restrict_access() {
	global $cmm_options;

	if( current_user_can( 'manage_options' ) ) {
		return;
	}

	if( isset( $cmm_options['enable'] ) ) {

		$ips = array_map('cmm_sanitize_ip', explode( "\n", $cmm_options['ips'] ) );
		$ips = array_map('trim', $ips );

		if( ! empty( $cmm_options['page_or_url'] ) && $cmm_options['page_or_url'] == 'page' ) {
			if( cmm_ip_test( $ips ) == false && ! is_page( intval( $cmm_options['page'] ) ) ) {
				wp_redirect( get_permalink( $cmm_options['page'] ) ); exit;
			}
		} elseif( $cmm_options['page_or_url'] == 'url' ) {
			if( cmm_ip_test( $ips ) == false && $cmm_options['redirect_url'] != '' ) {
				wp_redirect( $cmm_options['redirect_url'] ); exit;
			}
		}
	}
}
add_action( 'template_redirect', 'cmm_restrict_access', 0 );

// checks the current user's IP address
// @return - true if the user's IP is in the array, false otherwise
function cmm_ip_test( $ips ){

	$ip = cgc_get_ip();

	if( in_array( $ip, $ips ) || $ip == '127.0.0.1' ) {

		return true;
	}
	return false;
}

function cmm_sanitize_ip( $ip = '' ) {

	$position = strpos( $ip, '//' );

	if( false !== $position ) {
		$ip = substr( $ip, 0, $position );
	}

	$position = strpos( $ip, '#' );

	if( false !== $position ) {
		$ip = substr( $ip, 0, $position );
	}

	return sanitize_text_field( $ip );
}

function cgc_get_ip() {
	if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
	  $ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
	  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	  $ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}