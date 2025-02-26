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
 * Activate plugin trigger.
 */
function elemsnr_activate_plugin( $plugin_file_path ) {
	if ( ELEMSNR_PLUGIN_BASENAME === $plugin_file_path ) {
		if ( get_option( 'elemsnr_rating_notice', '' ) ) {
		}
	}
}

add_action( 'activated_plugin', __NAMESPACE__ . '\elemsnr_activate_plugin' );

/**
 * Deactivate plugin trigger.
 */
function elemsnr_deactivate_plugin( $plugin_file_path ) {
	if ( ELEMSNR_PLUGIN_BASENAME === $plugin_file_path ) {
		// delete_option( 'elemsnr_rating_notice' );
		delete_option( 'elemsnr_upgrade_notice' );
	}
}

add_action( 'deactivated_plugin', __NAMESPACE__ . '\elemsnr_deactivate_plugin' );
