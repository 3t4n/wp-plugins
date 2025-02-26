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

function acfc_register_setting_fields() {
	register_setting( ACFC_SETTINGS_SLUG, 'acfc_compact_mode', __NAMESPACE__ . '\acfc_sanitize_compact_mode' );
	register_setting( ACFC_SETTINGS_SLUG, 'acfc_disable_field_group_addons', __NAMESPACE__ . '\acfc_sanitize_disable_field_group_addons' );
	register_setting( ACFC_SETTINGS_SLUG, 'acfc_disable_livepreview', __NAMESPACE__ . '\acfc_sanitize_disable_livepreview' );
	register_setting( ACFC_SETTINGS_SLUG, 'acfc_livepreview_mode', __NAMESPACE__ . '\acfc_sanitize_livepreview_mode' );
	register_setting( ACFC_SETTINGS_SLUG, 'acfc_types_supported', __NAMESPACE__ . '\acfc_sanitize_types_supported' );
	register_setting( ACFC_SETTINGS_SLUG, 'acfc_user_access', __NAMESPACE__ . '\acfc_sanitize_user_access' );
}

add_action( 'admin_init', __NAMESPACE__ . '\acfc_register_setting_fields' );
