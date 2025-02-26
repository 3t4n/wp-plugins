<?php
/**
 * This file handles 42videobricks pages.
 *
 * @package 42videobricks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'admin_menu', 'videobricks42_register_library_subpage' );
/**
 * Register main menu and main page.
 */
function videobricks42_register_library_subpage() {
	add_menu_page(
		__( '42videobricks', '42videobricks' ),
		__( '42videobricks', '42videobricks' ),
		'manage_options',
		'videobricks42-main',
		'videobricks42_list_init',
		'dashicons-format-video',
		10
	);
}
add_action( 'admin_menu', 'videobricks42_library_submenu_page' );
/**
 * Register library menu and library page.
 */
function videobricks42_library_submenu_page() {
	add_submenu_page(
		'videobricks42-main',
		'',
		'Library',
		'manage_options',
		'videobricks42-main',
		'videobricks42_list_init'
	);
}

add_action( 'admin_menu', 'videobricks42_register_addnew_subpage' );
/**
 * Register add new menu and add new page.
 */
function videobricks42_register_addnew_subpage() {
	add_submenu_page(
		'videobricks42-main',
		'Add New',
		'Add New',
		'manage_options',
		'videobricks42-add-new-video',
		'videobricks42_add_new_video'
	);
}
add_action( 'admin_menu', 'videobricks42_register_settings_subpage' );
/**
 * Register settings menu and settings page.
 */
function videobricks42_register_settings_subpage() {
	add_submenu_page(
		'videobricks42-main',
		'Settings',
		'Settings',
		'manage_options',
		'videobricks42-settings',
		'videobricks42_api_render_settings_page'
	);
}
