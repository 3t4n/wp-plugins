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

function acfc_add_settings_menu() {
	$acf_copilot = new ACF_Copilot();

	if ( '' === $acf_copilot->compact_mode ) {
		add_menu_page(
			esc_html__( 'ACF Copilot', 'acf-copilot' ),
			esc_html__( 'ACF Copilot', 'acf-copilot' ),
			'manage_options',
			ACFC_SETTINGS_SLUG,
			__NAMESPACE__ . '\acfc_display_settings_page',
			'dashicons-airplane',
			85.5555
		);
	} else {
		add_submenu_page(
			'edit.php?post_type=acf-field-group',
			esc_html__( 'AI + Copilot Options', 'acf-copilot' ),
			esc_html__( 'AI + Copilot Options', 'acf-copilot' ),
			'manage_options',
			ACFC_SETTINGS_SLUG,
			__NAMESPACE__ . '\acfc_display_settings_page'
		);
	}
}

add_action( 'admin_menu', __NAMESPACE__ . '\acfc_add_settings_menu', 1000 );
