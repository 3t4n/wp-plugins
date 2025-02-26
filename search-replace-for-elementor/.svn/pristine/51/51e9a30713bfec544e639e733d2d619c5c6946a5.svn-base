<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.3
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Enqueue admin assets below.
 */
function elemsnr_enqueue_admin_assets() {
	if ( ! is_admin() ) {
		return;
	}

	// Load assets only for page page staring with prefix elemsnr-.
	// $screen = get_current_screen();
	// if ( strpos( $screen->id, 'elemsnr_' ) ) {}

	$elemsnr = new Elementor_Search_Replace();

	wp_enqueue_style(
		'elemsnr-admin',
		ELEMSNR_PLUGIN_DIR_URL . 'assets/dist/css/elemsnr-admin.min.css',
		array(),
		ELEMSNR_PLUGIN_VERSION,
		'all'
	);

	wp_enqueue_script(
		'elemsnr-admin',
		ELEMSNR_PLUGIN_DIR_URL . 'assets/dist/js/elemsnr-admin.min.js',
		array( 'jquery' ),
		ELEMSNR_PLUGIN_VERSION,
		true
	);

	wp_localize_script(
		'elemsnr-admin',
		'elemsnr',
		array(
			'plugin_url'    => ELEMSNR_PLUGIN_DIR_URL,
			'plugin_domain' => ELEMSNR_PLUGIN_DOMAIN,
			'ajax_url'      => esc_url( admin_url( 'admin-ajax.php' ) ),
			'ajax_nonce'    => wp_create_nonce( 'elemsnr_ajax_nonce' ),
		)
	);
}

/**
 * Enqueue Elementor assets below.
 */
function elemsnr_enqueue_elementor_assets() {
	wp_enqueue_script(
		'elemsnr-elementor',
		ELEMSNR_PLUGIN_DIR_URL . 'assets/dist/js/elemsnr-elementor.min.js',
		array( 'jquery' ),
		ELEMSNR_PLUGIN_VERSION,
		true
	);

	wp_enqueue_style(
		'elemsnr-elementor',
		ELEMSNR_PLUGIN_DIR_URL . 'assets/dist/css/elemsnr-elementor.min.css',
		array(),
		ELEMSNR_PLUGIN_VERSION,
		'all'
	);

	wp_localize_script(
		'elemsnr-elementor',
		'elemsnr',
		array(
			'plugin_url'    => ELEMSNR_PLUGIN_DIR_URL,
			'plugin_domain' => ELEMSNR_PLUGIN_DOMAIN,
			'ajax_url'      => admin_url( 'admin-ajax.php' ),
			'ajax_nonce'    => wp_create_nonce( 'elemsnr_ajax_nonce' ),
		)
	);
}
