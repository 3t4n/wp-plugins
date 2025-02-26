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
 * Add the media library recovery page to the admin menu.
 */
function mlr_add_menu() {
	$mlr = new Media_Library_Recovery();

	if ( '' === $mlr->compact_mode ) {
		add_menu_page(
			esc_html__( 'Media Library Recovery', 'wp-media-recovery' ),
			esc_html__( 'Media Recovery', 'wp-media-recovery' ),
			'manage_options',
			MLR_SETTINGS_SLUG,
			__NAMESPACE__ . '\mlr_display_settings_page',
			'dashicons-image-rotate',
			9.999
		);
	} else {
		add_submenu_page(
			'upload.php',
			esc_html__( 'Media Library Recovery', 'wp-media-recovery' ),
			esc_html__( 'Media Recovery', 'wp-media-recovery' ),
			'manage_options',
			MLR_SETTINGS_SLUG,
			__NAMESPACE__ . '\mlr_display_settings_page'
		);
	}
}

add_action( 'admin_menu', __NAMESPACE__ . '\mlr_add_menu', 1000 );
