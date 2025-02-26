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

function acfc_display_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	// 1. Media Library Settings.
	add_settings_section(
		ACFC_SETTINGS_SLUG,
		'',
		'',
		ACFC_SETTINGS_SLUG
	);

	add_settings_field(
		'acfc_types_supported',
		'<label for="acfc-types-supported">'
			. __( 'Post Types Supported', 'acf-copilot' )
			. '</label>',
		__NAMESPACE__ . '\acfc_display_types_supported',
		ACFC_SETTINGS_SLUG,
		ACFC_SETTINGS_SLUG,
	);

	add_settings_field(
		'acfc_disable_field_group_addons',
		'<label for="acfc-disable-field-group-addons">'
			. __( 'Disable Field Group Addons', 'acf-copilot' )
			. '</label>',
		__NAMESPACE__ . '\acfc_display_disable_field_group_addons',
		ACFC_SETTINGS_SLUG,
		ACFC_SETTINGS_SLUG,
	);

	add_settings_field(
		'acfc_disable_livepreview',
		'<label for="acfc-disable-livepreview">'
			. __( 'Disable LivePreview', 'acf-copilot' )
			. '</label>',
		__NAMESPACE__ . '\acfc_display_disable_livepreview',
		ACFC_SETTINGS_SLUG,
		ACFC_SETTINGS_SLUG,
	);

	add_settings_field(
		'acfc_user_access',
		'<label for="acfc-user-access">'
			. __( 'User Access', 'acf-copilot' )
			. '</label>',
		__NAMESPACE__ . '\acfc_display_user_access',
		ACFC_SETTINGS_SLUG,
		ACFC_SETTINGS_SLUG,
	);

	add_settings_field(
		'acfc_livepreview_mode',
		'<label for="acfc-livepreview-mode">'
			. __( 'LivePreview Mode', 'acf-copilot' )
			. '</label>',
		__NAMESPACE__ . '\acfc_display_livepreview_mode',
		ACFC_SETTINGS_SLUG,
		ACFC_SETTINGS_SLUG,
	);

	add_settings_field(
		'acfc_compact_mode',
		'<label for="acfc-compact-mode">'
			. __( 'Compact Mode', 'acf-copilot' )
			. '</label>',
		__NAMESPACE__ . '\acfc_display_compact_mode',
		ACFC_SETTINGS_SLUG,
		ACFC_SETTINGS_SLUG,
	);

	require_once ACFC_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-main-page.php';
}
