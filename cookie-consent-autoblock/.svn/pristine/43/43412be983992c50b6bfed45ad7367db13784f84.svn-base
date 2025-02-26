<?php
/**
 * WP-SpruceJoy Installation Functions
 *
 * Functions to install and upgrade WP-SpruceJoy.
 * 
 * This file is part of the WP-SpruceJoy plugin by SpruceJoy
 * You can find out more about this plugin at https://sprucejoy.com
 * Copyright (c) 2020-2021  SpruceJoy
 * WP-SpruceJoy(tm) is a trademark of sprucejoy.com
 *
 * @package WP-SpruceJoy
 * @author SpruceJoy
 * @copyright 2020-2021
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * Installs or upgrades the plugin.
 *
 *
 * @return array $wpsprucejoy_settings
 */
function wpsprucejoy_do_install() {

	/*
	 * If you need to force an install, set $chk_force = true.
	 *
	 * Important notes:
	 *
	 * 1. This will override any settings you already have for any of the plugin settings.
	 * 2. This will not effect any WP settings or registered users.
	 */

	$chk_force = false;

	$existing_settings = get_option( 'wpsprucejoy_settings' );
	
	if ( false === $existing_settings || $chk_force == true ) {
		// New install.
		update_option('wpsprucejoy_settings', 1 );
		update_option('wpsprucejoy_enable_cookie_bar', 1 );
		// update_option('wpsprucejoy_compliance_status_notice', 1);
		// update_option('wpsprucejoy_compliance_status_autoblocking', 1);
		update_option('wpsprucejoy_success_add_scripts', '');
		update_option('wpsprucejoy_bar_color', '#000000');
		update_option('wpsprucejoy_text_color', '#ffffff');
		update_option('wpsprucejoy_button_color', '#ffffff');
		update_option('wpsprucejoy_buttontext_color', '#000000');
		update_option('wpsprucejoy_message', 'We uses cookies to provide necessary site functionality and improve your experience. By browsing our website, you consent to our use of cookies.');
		update_option('wpsprucejoy_accept_button_text', 'Accept');
		update_option('wpsprucejoy_reject_button_text', 'Reject');	
	} 
}


// End of file.