<?php
/**
 * WP EasyGuide Gutenberg Compatibility
 *
 * @package WPEG_Admin
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( is_plugin_active( 'gutenberg/gutenberg.php' ) || function_exists( 'the_gutenberg_project' ) ) {
	add_action( 'admin_enqueue_scripts', 'wpeg_gutenberg_admin_enqueue_scripts' );
}

/**
 * Load scripts in gutenberg.
 */
function wpeg_gutenberg_admin_enqueue_scripts() {
	$screen = get_current_screen();
	if ( 'add' === $screen->action && 'post' === $screen->base ) {
		$js_file = WPEG_PLUGIN_URL . 'compatibility/assets/js/gutenberg.js';
		wp_enqueue_script( 'wpeg-gutenberg-compat', $js_file, array(), null );
	}
}
