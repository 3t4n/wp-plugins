<?php
/**
 * WP EasyGuide Elementor Compatibility
 *
 * Functions for Elementor Compatibility.
 *
 * @package WPEG_Admin
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( is_plugin_active( 'elementor/elementor.php' ) ) {
	add_action( 'elementor/editor/before_enqueue_scripts', 'wpeg_elementor_enqueue_scripts' );
}

/**
 * WPEG Elementor enqueue scripts.
 */
function wpeg_elementor_enqueue_scripts() {
	WPEG_Admin::admin_enqueue_scripts();

	echo wp_kses_post( '<div id="wpeg-tool"></div>' );
}
