<?php
/*
Plugin Name: Remove Broken Images
Plugin URI: https://room34.com
Description: Very simply, uses JavaScript to remove broken images from page display.
Version: 1.5.0-beta-1
Author: Room 34 Creative Services, LLC
Author URI: http://room34.com
License: GPLv2
Text Domain: r34rbi
Domain Path: /i18n/languages/
*/

/*  Copyright 2024 Room 34 Creative Services, LLC (email: info@room34.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Load required files
//require_once(plugin_dir_path(__FILE__) . 'functions.php');
require_once(plugin_dir_path(__FILE__) . 'class-r34rbi.php');


// Initialize plugin functionality
function r34rbi_plugins_loaded() {

	// Instantiate class
	global $r34rbi;
	$r34rbi = new R34RBI();
	
	// Conditionally run update function
	if (is_admin() && version_compare(get_option('r34rbi_version'), $r34rbi->version, '<')) { r34rbi_update(); }
	
}
add_action('plugins_loaded', 'r34rbi_plugins_loaded');


// Install
function r34rbi_install() {
	global $r34rbi;

	// Flush rewrite rules
	flush_rewrite_rules();
	
	// Remember previous version
	$previous_version = get_option('r34rbi_version');
	update_option('r34rbi_previous_version', $previous_version);
	
	// Set version
	if (isset($r34rbi->version)) {
		update_option('r34rbi_version', $r34rbi->version);
	}

	// Admin notice with link to settings
	$notices = get_option('r34rbi_deferred_admin_notices', array());
	$notices[] = array(
		'content' => '<p>' . sprintf(__('Thank you for installing %1$sRemove Broken Images%2$s. To get started, please visit the %3$sSettings%4$s page.'), '<strong>', '</strong>', '<a href="' . admin_url('options-general.php?page=remove-broken-images') . '"><strong>', '</strong></a>') . '</p>',
		'status' => 'info'
	);
	update_option('r34rbi_deferred_admin_notices', $notices);
	
}
register_activation_hook(__FILE__, 'r34rbi_install');


// Updates
function r34rbi_update() {
	global $r34rbi;
	
	// Remember previous version
	$previous_version = get_option('r34rbi_version');
	update_option('r34rbi_previous_version', $previous_version);
	
	// Update version
	if (isset($r34rbi->version)) {
		update_option('r34rbi_version', $r34rbi->version);
	}
	
	// Version-specific updates
	
}


// Deferred install/update admin notices
function r34rbi_deferred_admin_notices() {
	if ($notices = get_option('r34rbi_deferred_admin_notices', array())) {
		foreach ((array)$notices as $notice) {
			echo '<div class="notice notice-' . esc_attr($notice['status']) . ' is-dismissible r34rbi-admin-notice">' . wp_kses_post($notice['content']) . '</div>';
		}
	}
	delete_option('r34rbi_deferred_admin_notices');
}
add_action('admin_notices', 'r34rbi_deferred_admin_notices');
