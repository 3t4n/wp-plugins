<?php

if( !defined( 'ABSPATH' ) ) { exit; }

function rs_ulr_redirect_out() {
	$path = rs_ulr_get_current_path();
	if( ( strpos( $path['full_uri'], 'wp-login.php' ) ) || ( ( !is_user_logged_in() ) && ( strpos( $path['full_uri'], 'wp-admin' ) ) ) && ( !strpos( $path['full_uri'], 'wp-admin/admin-ajax.php' ) ) ) {
		$option = rs_ulr_get_option();
		if( $option['redirect_status'] === 'on' ) {
			$get_key = $option['secret_get_key'];
			$get_value = $option['secret_get_value'];
			$redirect_url = $option['redirect_url'];
			$home_url = str_replace( array( 'http:', 'https:' ), '', home_url() );
			if( isset( $_GET[$get_key] ) ) {
				if( sanitize_text_field( $_GET[$get_key] ) === $get_value ) { $continue = 1; }
			}
			if( isset( $_GET['action'] ) ) {
				if( ( isset( $_POST ) && ( $_GET['action'] === 'confirm_admin_email' ) ) ) { $continue = 1; }
				if( ( strpos( wp_get_referer(), $home_url ) !== FALSE ) && ( $_GET['action'] === 'confirm_admin_email' ) && ( isset( $_GET['remind_me_later'] ) ) ) { $continue = 1; }
				if( ( strpos( wp_get_referer(), $home_url ) !== FALSE ) && ( $_GET['action'] === 'logout' ) ) { $continue = 1; }
				if( ( strpos( wp_get_referer(), $home_url ) !== FALSE ) && ( $_GET['action'] === 'lostpassword' ) ) { $continue = 1; }
			}
			if( isset( $_GET['checkemail'] ) ) {
				if( ( strpos( wp_get_referer(), $home_url ) !== FALSE ) && ( $_GET['checkemail'] === 'confirm' ) ) { $continue = 1; }
			}
			if( isset( $_GET['loggedout'] ) ) {
				if( ( strpos( wp_get_referer(), $home_url ) !== FALSE ) && ( $_GET['loggedout'] === 'true' ) ) { $continue = 1; }
			}
			if( ( strpos( wp_get_referer(), $home_url ) !== FALSE ) && ( strpos( wp_get_referer(), '/wp-login.php' ) !== FALSE ) ) { $continue = 1; }
			if( !isset( $continue ) ) {
				wp_redirect( $redirect_url, 302 );
				exit;
			}
		}
	}
}

function rs_ulr_redirect_login() {
	$path = rs_ulr_get_current_path();
	$option = rs_ulr_get_option();
	if( $path['full_uri'] === home_url( $option['login_path'] ) ) {
		$get_key = $option['secret_get_key'];
		$get_value = $option['secret_get_value'];
		$redirect_url = wp_login_url().'?'.$get_key.'='.$get_value;
		wp_redirect( $redirect_url, 302 );
		exit;
	}
}