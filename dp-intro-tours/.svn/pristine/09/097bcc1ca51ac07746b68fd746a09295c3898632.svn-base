<?php

if ( ! class_exists( 'ACF' ) ) {
	// Define path and URL to the ACF plugin.
	define( 'DPIT_ACF_PATH', plugin_dir_path( __FILE__ ) . '../vendor/acf/' );
	define( 'DPIT_ACF_URL', plugin_dir_url( __FILE__ ) . '../vendor/acf/' );

	// Include the ACF plugin.
	include_once DPIT_ACF_PATH . 'acf.php';

	// Customize the url setting to fix incorrect asset URLs.
	add_filter( 'acf/settings/url', 'dpit_acf_settings_url' );
	function dpit_acf_settings_url() {
		return DPIT_ACF_URL;
	}

	// (Optional) Hide the ACF admin menu item.
	if ( ! Dp_Intro_Tours_Helper::is_debug_console_en() ) {
		add_filter( 'acf/settings/show_admin', 'my_acf_settings_show_admin' );
	}
	function my_acf_settings_show_admin() {
		return false;
	}
}

?>
