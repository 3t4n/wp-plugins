<?php
/**
 * Plugin Name: Better 404 Redirect To Homepage
 * Description: Auto redirects all 404 error links to homepage.
 * Plugin URI: https://github.com/rilwis/better-404-redirect-to-homepage
 * Author: Anh Tran
 * Author URI: https://metabox.io
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: better-404-redirect-to-homepage
 * Domain Path: languages
 */

class B4RTH {
	public function init() {
		add_action( 'wp', [ $this, 'redirect' ] );
	}

	public function redirect() {
		if ( $this->is_404() ) {
			wp_redirect( home_url(), 301 );
			die;
		}
	}

	public function is_404() {
		if ( is_admin() ) {
			return false;
		}
		if ( ( defined( 'DOING_CRON' ) && DOING_CRON ) || ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) ) {
			return false;
		}
		if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
			return false;
		}
		if ( function_exists( 'bp_is_user_profile' ) && bp_is_user_profile() ) {
			return false;
		}
		if ( ! is_404() ) {
			return false;
		}
		return true;
	}
}

$b4rth = new B4rth();
$b4rth->init();