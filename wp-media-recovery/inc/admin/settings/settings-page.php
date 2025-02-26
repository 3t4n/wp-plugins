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
 * Display the media library recovery page layout.
 */
function mlr_display_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	add_settings_section(
		MLR_SETTINGS_SLUG,
		'Settings',
		'',
		MLR_SETTINGS_SLUG
	);

	add_settings_field(
		'mlr_compact_mode',
		'<label for="mlr-compact-mode">'
			. __( 'Compact Mode', 'wp-media-recovery' )
			. '</label>',
		__NAMESPACE__ . '\mlr_display_compact_mode',
		MLR_SETTINGS_SLUG,
		MLR_SETTINGS_SLUG,
	);

	require_once MLR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-main-page.php';
}
