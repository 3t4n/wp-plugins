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
 * Activate plugin trigger.
 */
function mlr_activate_plugin( $plugin_file_path ) {
	if ( MLR_PLUGIN_BASENAME === $plugin_file_path ) {
		if ( get_option( 'mlr_rating_notice', '' ) ) {
		}
	}
}

add_action( 'activated_plugin', __NAMESPACE__ . '\mlr_activate_plugin' );

/**
 * Deactivate plugin trigger.
 */
function mlr_deactivate_plugin( $plugin_file_path ) {
	if ( MLR_PLUGIN_BASENAME === $plugin_file_path ) {
		// delete_option( 'mlr_rating_notice' );
		delete_option( 'mlr_upgrade_notice' );
	}
}

add_action( 'deactivated_plugin', __NAMESPACE__ . '\mlr_deactivate_plugin' );
