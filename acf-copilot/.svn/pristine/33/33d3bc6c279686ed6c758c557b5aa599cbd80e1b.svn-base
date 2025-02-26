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
 * Add custom action links to the plugin on the Plugins page.
 */
function acfc_add_action_links( $links, $file_path ) {
	$acfc_admin = new ACFC_Admin();

	if ( ACFC_PLUGIN_BASENAME === $file_path ) {
		$links['acfc-settings'] = '<a href="' . esc_url( admin_url( $acfc_admin->admin_page . ACFC_SETTINGS_SLUG ) ) . '">'
			. esc_html__( 'Settings', 'acf-copilot' )
			. '</a>';
		$links['acfc-upgrade']  = '<a href="https://bit.ly/3WcX322" target="_blank">'
		. esc_html__( 'Go Pro', 'acf-copilot' )
		. '</a>';

		return array_reverse( $links );
	}

	return $links;
}
