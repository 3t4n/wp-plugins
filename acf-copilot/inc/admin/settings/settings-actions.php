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
 * [AJAX] Reset plugin settings to their default values
 * and provide a success message.
 */
function acfc_reset_settings() {
	$acfc_admin = new ACFC_Admin();

	delete_option( 'acfc_compact_mode' );
	delete_option( 'acfc_disable_field_group_addons' );
	delete_option( 'acfc_disable_livepreview' );
	delete_option( 'acfc_livepreview_mode' );
	delete_option( 'acfc_types_supported' );
	delete_option( 'acfc_user_access' );

	$acfc_admin->print_json_message(
		1,
		__( 'All options have been reset to their default values.', 'acf-copilot' )
	);
}

add_action( 'wp_ajax_acfc_reset_settings', __NAMESPACE__ . '\acfc_reset_settings' );
