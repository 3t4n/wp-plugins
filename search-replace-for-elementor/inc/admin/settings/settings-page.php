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
 * Display the search & replace for Elementor page layout.
 */
function elemsnr_display_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	add_settings_section(
		ELEMSNR_SETTINGS_SLUG,
		'Settings',
		'',
		ELEMSNR_SETTINGS_SLUG
	);

	add_settings_field(
		'elemsnr_compact_mode',
		'<label for="elemsnr-compact-mode">'
			. __( 'Compact Mode', 'search-replace-for-elementor' )
			. '</label>',
		__NAMESPACE__ . '\elemsnr_display_compact_mode',
		ELEMSNR_SETTINGS_SLUG,
		ELEMSNR_SETTINGS_SLUG,
	);

	require_once ELEMSNR_PLUGIN_DIR_PATH . 'inc/admin/settings/settings-main-page.php';
}
