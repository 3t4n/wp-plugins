<?php

/**
 * WP-SpruceJoy Uninstall
 *
 * Removes all settings WP-SpruceJoy added to the WP options table
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
if (!defined('ABSPATH')) {
	exit();
}

// If uninstall is not called from WordPress, kill the uninstall.
if (!defined('WP_UNINSTALL_PLUGIN')) {
	die('invalid uninstall');
}

// Uninstall process removes WP-SpruceJoy settings from the WordPress database (_options table).
if (WP_UNINSTALL_PLUGIN) {
	wpsprucejoy_uninstall_options();
}


/**
 * Compartmentalizes uninstall
 *
 */
function wpsprucejoy_uninstall_options()
{
	delete_option('wpsprucejoy_settings');
	delete_option('wpsprucejoy_enable_cookie_bar');
	// delete_option('wpsprucejoy_compliance_status_notice');
	// delete_option('wpsprucejoy_compliance_status_autoblocking');
	delete_option('wpsprucejoy_success_add_scripts');
	delete_option('wpsprucejoy_bar_color');
	delete_option('wpsprucejoy_text_color');
	delete_option('wpsprucejoy_button_color');
	delete_option('wpsprucejoy_buttontext_color');
	delete_option('wpsprucejoy_message');
	delete_option('wpsprucejoy_accept_button_text');
	delete_option('wpsprucejoy_reject_button_text');
}

// End of file.