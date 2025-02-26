<?php
/*
 * Plugin Name:       Astro Sticky Buttons
 * Plugin URI:        https://wordpress.org/plugins/astro-sticky-buttons
 * Description:       Display your favourite sticky buttons to get in touch with your visitors and share your social channels.
 * Version:           1.2.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            AstroThemes
 * Author URI:        https://www.astrothemes.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       astro-sticky-buttons
 * Domain Path:       /languages
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class file inclusions.
 */
require_once(dirname(__FILE__) . '/includes/classes/class-astro-plugin-panel.php');

/**
 * File inclusions.
 */
require_once(dirname(__FILE__) . '/astro-sticky-buttons-common.php');

if ( is_admin() ) {
	require_once(dirname(__FILE__) . '/astro-sticky-buttons-admin.php');
}

/**
 * Plugin constants.
 */
define('ASTRO_SB_PREFIX', 'astro_sb_');
define('ASTRO_SB_TEXTDOMAIN', astro_sb_plugin_data('TextDomain'));

/**
 * Loading Text Domain.F
 */
add_action( 'init', 'astro_sb_load_textdomain' );
function astro_sb_load_textdomain() {
	load_plugin_textdomain( 'astro-sticky-buttons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Enqueue plugin files.
 */
add_action('init', 'astro_sb_enqueue_files');
function astro_sb_enqueue_files() {

	$plugin_version = astro_sb_plugin_data('Version');

	// Enqueue Font Awesome
	$fontawesome_css_url = plugin_dir_url( __FILE__ ) . 'vendors/fontawesome/css/fontawesome.min.css';
	wp_enqueue_style('astro-fontawesome', $fontawesome_css_url, array(), '6.4.0');
	$fontawesome_css_url = plugin_dir_url( __FILE__ ) . 'vendors/fontawesome/css/brands.css';
	wp_enqueue_style('astro-fontawesome-brands', $fontawesome_css_url, array(), '6.4.0');
	$fontawesome_css_url = plugin_dir_url( __FILE__ ) . 'vendors/fontawesome/css/solid.css';
	wp_enqueue_style('astro-fontawesome-solid', $fontawesome_css_url, array(), '6.4.0');

	// Enqueue main files
	wp_register_style( 'astro-sticky-buttons', plugin_dir_url( __FILE__ ) . 'css/astro-sticky-buttons.css', array(), $plugin_version );
	wp_enqueue_style( 'astro-sticky-buttons' );
	wp_enqueue_script( 'astro-sticky-buttons', plugin_dir_url( __FILE__ ) . 'js/astro-sticky-buttons.js', array( 'jquery', 'jquery-ui-datepicker' ), $plugin_version );

	// Add custom CSS
	$custom_css = astro_sb_get_custom_layout();
	if (!empty($custom_css)) {
		wp_add_inline_style('astro-sticky-buttons', $custom_css);
	}

}

/**
 * Add Settings Link.
 */
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'astro_sb_add_plugin_page_settings_link');
function astro_sb_add_plugin_page_settings_link( $links ) {
	array_unshift(
		$links,
		'<a href="' .
		admin_url('admin.php?page=' . ASTRO_SB_TEXTDOMAIN ) .
		'">' . __('Settings', 'astro-sticky-buttons' ) . '</a>'
	);
	return $links;
}

/**
 * Activation check.
 */
register_activation_hook( __FILE__, 'astro_sb_check_plugin_version' );
function astro_sb_check_plugin_version() {
	$plugin_version = astro_sb_plugin_data('Version');
	if ($plugin_version < '1.0.2') {
		if (!isset($astro_sb_enable_all)) {
			add_option('astro_sb_enable_post', 1);
			add_option('astro_sb_enable_page', 1);
			add_option('astro_sb_enable_attachment', 1);
			return true;
		}
	}
}