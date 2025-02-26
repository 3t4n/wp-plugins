<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*	Plugin Name: Ampsy
	Plugin URI: http://www.ampsy.com
	Description: To manage simple ampsy <iframe></iframe> via shortcode and widget
	Version: 1.0.0
	Author: Ampsy
	Author URI: http://www.ampsy.com
*/

/*	Copyright 2013/Ampsy

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	gERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, gA  02110-1301  USA

	No animals were harmed in the making of this plugin.
*/

if ( ! class_exists( 'WP_Plugin_Ampsy' ) ) {
	include_once 'lib/class-wp-plugin-ampsy.php';
}

if ( class_exists( 'WP_Plugin_Ampsy' ) ) {
	$plugin = new WP_Plugin_Ampsy;
	register_activation_hook( __FILE__, array( $plugin, 'activate' ) );
	register_uninstall_hook( __FILE__, array( 'WP_Plugin_Ampsy', 'uninstall' ) );
}

?>
