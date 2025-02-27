<?php

/*
Plugin Name: Blue Login Themes
Plugin URI: http://wordpress.org/plugins/blue-login-style/
Description: Blue Login Themes is a tiny WordPress plugin that allows you to customize your login page with beautiful themes. Its features: ability to add message, change the login logo, ability to set login, logout and register redirect links and many more...
Version: 1.4.0
Author: Ali Mirzaei
Author URI: http://about.alimir.ir
Text Domain: alimir
Domain Path: /lang/
License: GPL2
*/

	load_plugin_textdomain( 'alimir', false, dirname( plugin_basename( __FILE__ ) ) .'/lang/' );
	
	//plugin update hook
	add_action( 'plugins_loaded', 'blue_login_update_hook' );		
	function blue_login_update_hook() {
		blue_login_options();
	}
	
	//register activation hook
	register_activation_hook(__FILE__, 'blue_login_options');
	function blue_login_options() {
		add_option('blue_upload_logo', '', '', 'yes');
		add_option('blue_custom_style', '', '', 'yes');
		add_option('blue_upload_background', '', '', 'yes');
		add_option('blue_upload_repeat', 'no-repeat', '', 'yes');
		add_option('blue_upload_position', 'center', '', 'yes');
		add_option('blue_login_redirect', '', '', 'yes');
		add_option('blue_logout_redirect', '', '', 'yes');
		add_option('blue_register_redirect', '', '', 'yes');
		add_option('blue_login_message', '', '', 'yes');
		add_option('blue_default_theme', 'BlueWorld', '', 'yes');
	}
	
	//register uninstall hook
	register_uninstall_hook(__FILE__, 'blue_login_unset_options');
	function blue_login_unset_options() {
		delete_option('blue_upload_logo');
		delete_option('blue_custom_style');
		delete_option('blue_upload_background');
		delete_option('blue_upload_repeat');
		delete_option('blue_upload_position');
		delete_option('blue_login_redirect');
		delete_option('blue_logout_redirect');
		delete_option('blue_register_redirect');
		delete_option('blue_login_message');
		delete_option('blue_default_theme');
	}

	//get the plugin version
	function blue_login_get_version() {
		$plugin_data = get_plugin_data( __FILE__ );
		$plugin_version = $plugin_data['Version'];
		return $plugin_version;
	}

	//include plugin functions
	include( plugin_dir_path( __FILE__ ) . 'inc/blue-functions.php');
	
	//include plugin functions
	include( plugin_dir_path( __FILE__ ) . 'inc/blue-login-themes.php');
	
?>