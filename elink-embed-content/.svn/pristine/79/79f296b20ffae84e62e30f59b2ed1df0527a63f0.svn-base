<?php
/**
 * Plugin Name: elink - Embed Content
 * Plugin URI: http://about.elink.io/integrations/wordpress
 * Description: elink Embed WordPress Plugin. Create and Embed press pages, product pages, resource pages, news feeds. Multiple responsive layouts.
 * Version: 1.1.0
 * Author: elink
 * Author URI: https://elink.io
 * License: GPL v3
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$includes = array(
	'/inc/block.php',
	'/inc/shortcode.php',
	'/inc/class-output.php',
);
foreach ( $includes as $include ) {
	if ( 0 === validate_file( dirname( __FILE__ ) . $include ) ) {
		require_once( dirname( __FILE__ ) . $include );
	}
}
