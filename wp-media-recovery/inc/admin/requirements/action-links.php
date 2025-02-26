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
 * Add settings link after plugin activation under Plugins.
 */
function mlr_add_action_links( $links, $file_path ) {
	$mlr_admin = new MLR_Admin();

	if ( MLR_PLUGIN_BASENAME === $file_path ) {
		$links['mlr-settings'] = '<a href="' . esc_url( admin_url( $mlr_admin->admin_page . MLR_SETTINGS_SLUG ) ) . '">'
			. esc_html__( 'Settings', 'wp-media-recovery' )
			. '</a>';
		$links['mlr-upgrade']  = '<a href="https://bit.ly/3wMEF6c" target="_blank">'
		. esc_html__( 'Go Pro', 'wp-media-recovery' )
		. '</a>';

		return array_reverse( $links );
	}

	return $links;
}
