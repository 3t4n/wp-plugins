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
 * Add settings link after plugin activation under Plugins.
 */
function elemsnr_add_action_links( $links, $file_path ) {
	$elemsnr_admin = new ELEMSNR_Admin();

	if ( ELEMSNR_PLUGIN_BASENAME === $file_path ) {
		$links['elemsnr-settings'] = '<a href="' . esc_url( $elemsnr_admin->admin_page . ELEMSNR_SETTINGS_SLUG ) . '">'
			. esc_html__( 'Settings', 'search-replace-for-elementor' )
			. '</a>';
		$links['elemsnr-upgrade']  = '<a href="https://bit.ly/3TBL90A" target="_blank">'
		. esc_html__( 'Go Pro', 'search-replace-for-elementor' )
		. '</a>';

		return array_reverse( $links );
	}

	return $links;
}
