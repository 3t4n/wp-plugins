<?php
/**
 * [Short description]
 *
 * @package    DEVRY\MLR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.4
 */

namespace DEVRY\MLR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Enqueue admin assets below.
 */
function mlr_enqueue_admin_assets() {
	if ( ! is_admin() ) {
		return;
	}

	// Load assets only for page page staring with prefix mlr-.
	// $screen = get_current_screen();
	// if ( strpos( $screen->id, 'mlr_' ) ) {}

	wp_enqueue_style(
		'mlr-admin',
		MLR_PLUGIN_DIR_URL . 'assets/dist/css/mlr-admin.min.css',
		array(),
		MLR_PLUGIN_VERSION,
		'all'
	);

	wp_enqueue_script(
		'mlr-admin',
		MLR_PLUGIN_DIR_URL . 'assets/dist/js/mlr-admin.min.js',
		array( 'jquery' ),
		MLR_PLUGIN_VERSION,
		true
	);

	wp_localize_script(
		'mlr-admin',
		'mlr',
		array(
			'plugin_url'    => MLR_PLUGIN_DIR_URL,
			'plugin_domain' => MLR_PLUGIN_DOMAIN,
			'ajax_url'      => esc_url( admin_url( 'admin-ajax.php' ) ),
			'ajax_nonce'    => wp_create_nonce( 'mlr_ajax_nonce' ),
		)
	);
}
