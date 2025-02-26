<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ACFC
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ACFC;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Handle actions upon activation of the plugin, such as
 * displaying notices or performing specific tasks.
 */
function acfc_activate_plugin( $plugin_file_path ) {
	if ( ACFC_PLUGIN_BASENAME === $plugin_file_path ) {
		if ( get_option( 'acfc_rating_notice' ) ) {
		}
	}
}

add_action( 'activated_plugin', __NAMESPACE__ . '\acfc_activate_plugin' );

/**
 * Handle actions upon deactivation of the plugin,
 * such as removing stored notices or performing cleanup tasks.
 */
function acfc_deactivate_plugin( $plugin_file_path ) {
	if ( ACFC_PLUGIN_BASENAME === $plugin_file_path ) {
		if ( get_option( 'acfc_rating_notice' ) ) {
			delete_option( 'acfc_rating_notice' );
		}
	}
}

add_action( 'deactivated_plugin', __NAMESPACE__ . '\acfc_deactivate_plugin' );
