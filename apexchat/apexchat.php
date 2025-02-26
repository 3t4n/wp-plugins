<?php

/*
 * Plugin Name:			Blazeo
 * Plugin URI: 			https://www.blazeo.com/
 * Description: 		Plugin for use with Blazeo LiveChat
 * Version: 			2.0.1
 * Requires at least: 	4.1
 * Requires PHP:		5.2.4
 * Author:				Blazeo
 * Author URI:			https://www.blazeo.com/
 * License:				GPL v2
 */

define( 'APEXCHAT_CURRENT_VERSION', '2.0.1' );
define( 'APEXCHAT_PLUGIN_SETTING_NAME', 'apexchat_settings_group' );
define( 'APEXCHAT_VERSION_SETTING_NAME', 'apexchat_version' );
define( 'APEXCHAT_OPTIONS_PAGE_SLUG', 'apexchat_options_page' );

require_once( plugin_dir_path( __FILE__ ) . 'functions.php' );

// The following four lines encapsulate the entire plugin; Add menu option, configure settings, add chat script, and add async to script
add_action( 'admin_menu', 'apexchat_admin_menu' );
add_action( 'admin_init', 'apexchat_settings_api_init' );
add_action( 'wp_enqueue_scripts', 'apexchat_insert_function' );
add_filter( 'script_loader_tag', 'apexchat_add_async_to_invitation', 10, 2 );


/*** Creates an options page under the Settings Menu ***/ 
function apexchat_admin_menu() {
	add_options_page( 'Blazeo Options', 'Blazeo', 'manage_options', 'apexchat_plugin', 'apexchat_options_page' );
}

/*** Configuring the settings on WordPress' backend ***/
function apexchat_settings_api_init() {
	apexchat_check_for_old_settings();
	apexchat_register_settings();
	apexchat_add_options_to_settings();
}

/*** Inserting the chat invitaion script into WordPress ***/
function apexchat_insert_function() {
	$options = get_option( APEXCHAT_PLUGIN_SETTING_NAME );
	
	if (empty($options)){
		return;
	}
	
	if (!array_key_exists('apexchat_setting_enabled', $options)) {
		$options[ 'apexchat_setting_enabled' ] = 0;
	}

	if (!array_key_exists('apexchat_admin_disbled', $options)) {
		$options[ 'apexchat_admin_disbled' ] = 0;
	}

	if ( $options[ 'apexchat_setting_enabled' ] ) {
		if ( ( $options[ 'apexchat_admin_disbled' ] ) && ( !is_user_logged_in() ) ) {
			wp_enqueue_script( 'apexchat', "//blazeo.com/scripts/invitation.ashx?company=" . $options['apexchat_setting_companykey'], array(), null );
		}
		if ( !$options[ 'apexchat_admin_disbled' ] ) {
			wp_enqueue_script( 'apexchat', "//blazeo.com/scripts/invitation.ashx?company=" . $options['apexchat_setting_companykey'], array(), null );
		}
	}
}

/*** Adding async to the invitation script ***/
function apexchat_add_async_to_invitation($tag, $handle) {
	if ( 'apexchat' == $handle ) {
		return str_replace( ' src', ' async src', $tag );
	}
	return $tag;
}
