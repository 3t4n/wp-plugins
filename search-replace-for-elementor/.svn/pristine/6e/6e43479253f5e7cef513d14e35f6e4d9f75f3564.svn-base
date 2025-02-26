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
 * Add the search & replace for Elementor page to the admin menu.
 */
function elemsnr_add_menu() {
	$elemsnr = new Elementor_Search_Replace();

	if ( '' === $elemsnr->compact_mode ) {
		add_menu_page(
			esc_html__( 'Search & Replace for Elementor', 'search-replace-for-elementor' ),
			esc_html__( 'Elementor S/R', 'search-replace-for-elementor' ),
			'manage_options',
			ELEMSNR_SETTINGS_SLUG,
			__NAMESPACE__ . '\elemsnr_display_settings_page',
			'dashicons-search',
			57.999
		);
	} else {
		add_submenu_page(
			'elementor',
			esc_html__( 'Search & Replace for Elementor', 'search-replace-for-elementor' ),
			esc_html__( 'Search & Replace', 'search-replace-for-elementor' ),
			'manage_options',
			ELEMSNR_SETTINGS_SLUG,
			__NAMESPACE__ . '\elemsnr_display_settings_page'
		);
	}
}

add_action( 'admin_menu', __NAMESPACE__ . '\elemsnr_add_menu', 1000 );
