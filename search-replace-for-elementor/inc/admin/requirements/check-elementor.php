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

! defined( ABSPATH ) || exit; // Exit if accessed directly

/**
 * Display message if Elemetor or Elementor PRO aren't active.
 */
function elemsnr_elementor_missing() {
	if ( isset( $_REQUEST['activate'] ) ) {
		unset( $_REQUEST['activate'] );
	}

	$message = sprintf(
		/* translators: %1$s is replaced with "Search & Replace for Elementor" */
		/* translators: %2$s is replaced with "Elementor" */
		esc_html__( '%1$s requires %2$s to be installed and activated.', 'search-replace-for-elementor' ),
		'<strong>' . esc_html__( 'Search & Replace for Elementor', 'search-replace-for-elementor' ) . '</strong>',
		'<strong>' . esc_html__( 'Elementor', 'search-replace-for-elementor' ) . '</strong>'
	);

	printf(
		/* translators: %1$s is replaced with PHP and WordPress message check */
		'<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',
		wp_kses( $message, json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true ) )
	);
}

/**
 * Display message if Elemetor or Elementor PRO don't meet minimum required version.
 */
function elemsnr_elementor_min_version() {
	if ( isset( $_REQUEST['activate'] ) ) {
		unset( $_REQUEST['activate'] );
	}

	$message = sprintf(
		/* translators: %1$s is replaced with "Search & Replace for Elementor" */
		/* translators: %2$s is replaced with "Elementor" */
		/* translators: %3$s is replaced with "Min Elementor Version" */
		esc_html__( '%1$s requires %2$s version %3$s or greater.', 'search-replace-for-elementor' ),
		'<strong>' . esc_html__( 'Search & Replace for Elementor', 'search-replace-for-elementor' ) . '</strong>',
		'<strong>' . esc_html__( 'Elementor', 'search-replace-for-elementor' ) . '</strong>',
		ELEMSNR_MIN_ELEMENTOR_VERSION
	);

	printf(
		/* translators: %1$s is replaced with "PHP and WordPress message check" */
		'<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',
		wp_kses( $message, json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true ) )
	);
}
