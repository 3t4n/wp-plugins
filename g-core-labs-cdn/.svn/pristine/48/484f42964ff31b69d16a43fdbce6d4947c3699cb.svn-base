<?php
/**
Plugin Name: Gcore CDN
Plugin URI: http://wordpress.org/plugins/g-core-labs-cdn/
Description: CDN plugin
Author URI: https://gcore.com/
Version: 1.1.10
Author: Gcore

@package Gcore
 */

$plugin_dir = dirname( __FILE__ );

require $plugin_dir . '/includes/function.php';

add_action( 'admin_menu', 'g_core_labs_admin_menu' );

/**
 * Function g_core_labs_admin_menu
 *
 * @return void
 */
function g_core_labs_admin_menu() {
	add_menu_page( 'Gcore', 'Gcore', 'manage_options', 'gcore_labs', 'g_core_labs_cdn_page', plugin_dir_url( __FILE__ ) . 'plugin-icon.png' );
	add_submenu_page( 'gcore_labs', '' . esc_html( __( 'CDN settings', 'gcore_translate' ) ) . '', '' . esc_html( __( 'CDN settings', 'gcore_translate' ) ) . '', 'manage_options', 'gcore_labs', 'g_core_labs_cdn_page' );
	add_submenu_page( 'gcore_labs', '' . esc_html( __( 'Help', 'gcore_translate' ) ) . '', '' . esc_html( __( 'Help', 'gcore_translate' ) ) . '', 'manage_options', 'gcore_labs_help', 'g_core_labs_help_page' );
	add_submenu_page( 'gcore_labs', '' . esc_html( __( 'About', 'gcore_translate' ) ) . '', '' . esc_html( __( 'About', 'gcore_translate' ) ) . '', 'manage_options', 'gcore_labs_about', 'g_core_labs_about_page' );
}

/**
 * Function g_core_labs_cdn_page
 *
 * @return void
 */
function g_core_labs_cdn_page() {
	$plugin_dir = dirname( __FILE__ );
	wp_enqueue_style( 'g_core_css-amaran', plugins_url( 'css/amaran.min.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'g_core_css-animate', plugins_url( 'css/animate.min.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'g_core_css-checkbox', plugins_url( 'css/checkbox.min.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_style( 'g_core_css-custom', plugins_url( 'css/custom.css', __FILE__ ), array(), '1.0' );
	wp_enqueue_script( 'g_core_script-amaran', plugin_dir_url( __FILE__ ) . 'js/jquery.amaran.min.js', array(), '1.0' );
	wp_enqueue_script( 'g_core_script', plugin_dir_url( __FILE__ ) . 'js/scripts.js', array(), time() );

	require $plugin_dir . '/includes/admin.php';
}

/**
 * Function g_core_labs_stream_page
 *
 * @return void
 */
function g_core_labs_stream_page() {
	$plugin_dir = dirname( __FILE__ );
	require $plugin_dir . '/includes/stream.php';
}

/**
 * Function g_core_labs_help_page
 *
 * @return void
 */
function g_core_labs_help_page() {
	$plugin_dir = dirname( __FILE__ );
	require $plugin_dir . '/includes/help.php';
}

/**
 * Function g_core_labs_about_page
 *
 * @return void
 */
function g_core_labs_about_page() {
	 $plugin_dir = dirname( __FILE__ );
	require $plugin_dir . '/includes/about.php';
}

/**
 * Function g_core_labs_activate
 */
function g_core_labs_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/front-cdn.php';
	g_core_start_buffering();
}

/**
 * Function g_core_labs_init_action
 *
 * @return void
 */
function g_core_labs_init_action() {
	load_plugin_textdomain( 'gcore_translate', false, basename( dirname( __FILE__ ) ) . '/languages' );

}

add_action( 'init', 'g_core_labs_init_action' );

add_filter( 'setup_theme', 'g_core_labs_activate' );

register_activation_hook( __FILE__, 'g_core_labs' );

/**
 * Function g_core_labs
 *
 * @return void
 */
function g_core_labs() {
	update_option( 'gcore_type_image', 1 );
	update_option( 'gcore_type_video', 1 );
	update_option( 'gcore_type_audio', 1 );
	update_option( 'gcore_type_js', 1 );
	update_option( 'gcore_type_css', 1 );
	update_option( 'gcore_type_archive', 1 );
	update_option( 'gcore_folder_templates', 1 );
	update_option( 'gcore_folder_plugins', 1 );
	update_option( 'gcore_folder_content', 1 );
	update_option( 'gcore_folder_wp', 1 );
	update_option( 'gcore_type_advanced', 0 );
	update_option( 'gcore_folder_advanced', 0 );
}
