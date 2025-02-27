<?php

if( !defined( 'ABSPATH' ) ) { exit; }

function rs_ulr_option_defaults() {
	$array = array(
		'redirect_status' => 'off',
		'login_path' => '/my-secret-login-path/',
		'secret_get_key' => strtolower( rs_ulr_random_string( 5 ) ),
		'secret_get_value' => strtolower( rs_ulr_random_string( 10 ) ),
		'redirect_url' => 'http://www.google.com/',
		'delete_option_on_deactivate' => '0',
	);
	return $array;
}

function rs_ulr_get_option() {
	return get_option( RS_ULR__OPTION );
}

function rs_ulr_update_option( $new_option ) {
	$update = update_option( RS_ULR__OPTION, $new_option );
	return $update;
}

function rs_ulr_option_exists() {
	$return = TRUE;
	if( !rs_ulr_get_option() ) { $return = FALSE; }
	return $return;
}

function rs_ulr_update_settings() {
	if( array_key_exists( '_wpnonce', $_POST ) ) {
		if( !wp_verify_nonce( $_POST['_wpnonce'], 'rs_ulr_update_settings' ) ) { return; }
		else {
			$option = rs_ulr_get_option();
			$new_option = array();
			$new_option['redirect_status'] = sanitize_text_field( $_POST['redirect_status'] );
			$new_option['login_path'] = sanitize_text_field( str_replace( '//', '/', '/'.$_POST['login_path'].'/' ) );
			$new_option['secret_get_key'] = sanitize_text_field( $_POST['secret_get_key'] );
			$new_option['secret_get_value'] = sanitize_text_field( $_POST['secret_get_value'] );
			$new_option['redirect_url'] = sanitize_text_field( $_POST['redirect_url'] );
			if( array_key_exists( 'delete_option_on_deactivate', $_POST ) ) { $new_option['delete_option_on_deactivate'] = sanitize_text_field( $_POST['delete_option_on_deactivate'] ); }
			else { $new_option['delete_option_on_deactivate'] = $option['delete_option_on_deactivate']; }
			foreach( $new_option as $key => $value ) {
				if( $value !== $option[$key] ) {
					$update_option = 1;
				}
			}
			if( isset( $update_option ) ) {
				if( $update_option == 1 ) {
					$update = rs_ulr_update_option( $new_option );
					return $update;
				}
			}
		}
	}
}