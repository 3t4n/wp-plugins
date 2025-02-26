<?php
/**
 * Plugin Name: Smart Copyright Year
 * Plugin URI: https://wordpress.org/plugins/smart-copyright-year
 * Description: Auto-update to current year with [year] shortcode. No manual updates needed!
 * Version: 1.0.1
 * Author: Nisarul
 * Author URI: https://www.nisarul.com
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: smart-copyright-year
 */

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This program. If not, see https://www.gnu.org/licenses/gpl-3.0.html.
*/

defined( 'ABSPATH' ) || exit; // Prevent direct access

/**
 * The [year] shortcode.
 *
 * Displays the current year.
 *
 * @param array  $atts    Shortcode attributes. Default empty.
 * @param string $content Shortcode content. Default null.
 * @param string $tag     Shortcode tag (name). Default empty.
 * @return string Shortcode output.
 */
function scy_year_shortcode( $atts = [], $content = null, $tag = '' ) {
	$output = esc_html( date( 'Y' ) );

	return $output;
}

/**
 * Central location to create all shortcodes.
 */
function scy_shortcodes_init() {
	if ( ! shortcode_exists( 'year' ) ) {
		add_shortcode( 'year', 'scy_year_shortcode' );
	}
}

add_action( 'init', 'scy_shortcodes_init' );