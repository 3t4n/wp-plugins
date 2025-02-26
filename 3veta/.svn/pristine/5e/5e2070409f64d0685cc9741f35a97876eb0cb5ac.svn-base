<?php
/**
 * Plugin Name:       3veta
 * Plugin URI:        https://wordpress.org/plugins/3veta/
 * Description:       "3veta Booking Page for WordPress" allows you to embed your 3veta booking page to your WordPress website in an easy and simple way.
 * Version:           1.0.1
 * Author:            3veta
 * Author URI:        https://3veta.com/
 * Text Domain:       3veta
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages/
 * GitHub Plugin URI: https://github.com/alordiel/3veta-wp-plugin
 */

/*  Copyright 2014-2021 Alexander Vasilev  (email : alexander.vasilev@protonmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'VETA_ABS_PATH', __DIR__ );
define( 'VETA_REL_URL', plugins_url( basename( __DIR__ ) ) );

include_once( VETA_ABS_PATH . veta_platform_slashes( '/inc/common.php' ) );
include_once( VETA_ABS_PATH . veta_platform_slashes( '/inc/admin-page.php' ) );
include_once( VETA_ABS_PATH . veta_platform_slashes( '/inc/wordpress.php' ) );
include_once( VETA_ABS_PATH . veta_platform_slashes( '/inc/shortcodes.php' ) );

/**
 * Used to replace slashes in case of different directory separator (like Windows)
 *
 * @param string $path
 *
 * @return array|string|string[]
 */
function veta_platform_slashes( string $path ) {
	return str_replace( '/', DIRECTORY_SEPARATOR, $path );
}

