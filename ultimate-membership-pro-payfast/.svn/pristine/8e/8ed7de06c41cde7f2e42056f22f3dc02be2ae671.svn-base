<?php
/*
Plugin Name:  Ultimate Membership Pro - PayFast
Plugin URI: https://store.wpindeed.com/
Description: For the South African market, it introduces a new payment option to Ultimate Membership Pro that enables you to take payments through PayFast.
Version: 1.3
Author: WPIndeed
Author URI: https://store.wpindeed.com

Text Domain: ultimate-membership-pro-payfast
Domain Path: /languages

@package         Ultimate Membership Pro AddOn - UmpPayFast
@author           WPIndeed Development
*/


	include plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
	if ( !defined( 'UMP_PAYFAST_PATH' ) ){
			define( 'UMP_PAYFAST_PATH', plugin_dir_path( __FILE__ ) );
	}
	if ( !defined( 'UMP_PAYFAST_URL' ) ){
			define( 'UMP_PAYFAST_URL', plugin_dir_url( __FILE__ ) );
	}

	$UmpPayFastSettings = new \UmpPayFast\Settings();
	$UmpPayFastViewObject = new \UmpPayFast\View();

	\UmpPayFast\Utilities::setSettings( $UmpPayFastSettings->get() );
	\UmpPayFast\Utilities::setLang();
	if ( !\UmpPayFast\Utilities::canRun() ){
			return;
	}

	if ( is_admin() ){
			$UmpPayFastAdmin = new \UmpPayFast\Admin\Main( $UmpPayFastSettings->get(), $UmpPayFastViewObject );
	}
	$UmpPayFast = new \UmpPayFast\Main( $UmpPayFastSettings->get(), $UmpPayFastViewObject );
