<?php
/*
Plugin Name: Alligator Menu Popup
Plugin URI: http://cubecolour.co.uk/alligator-menu-popup/
Description: Add the 'mpopup' class to a menu item in a custom menu to open the target in a popup Window.
Author: cubecolour
Version: 2.0.0
Author URI: http://cubecolour.co.uk/
License: GPLv2

	  Copyright 2014-2023 Michael Atkins

  Licenced under the GNU GPL:

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if this file is accessed directly


/**
 * Add admin
 *
 */
require_once(plugin_dir_path( __FILE__ ) . "admin.php");


/**
 * Add links to the plugins table
 *
 */
add_filter( 'plugin_row_meta', 'cc_mpopup_meta_links', 10, 2 );
function cc_mpopup_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);

	/**
	 * Create the links
	 */
	if ( $file == $plugin ) {

		$supportlink = 'http://wordpress.org/support/plugin/alligator-menu-popup';
		$donatelink = 'http://cubecolour.co.uk/wp';
		$twitterlink = 'http://twitter.com/cubecolour';
		$iconstyle = 'style="-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;"';
		$adminlink = admin_url( 'options-general.php?page=mpopup-settings' );

		return array_merge( $links, array(
			'<a href="' . $adminlink . '"><span class="dashicons dashicons-admin-generic" ' . $iconstyle . ' title="Alligator Menu Popup Admin"></span></a>',
			'<a href="' . $supportlink . '"> <span class="dashicons dashicons-lightbulb" ' . $iconstyle . ' title="Alligator Menu Popup Support"></span></a>',
			'<a href="' . $twitterlink . '"><span class="dashicons dashicons-twitter" ' . $iconstyle . ' title="Cubecolour on Twitter"></span></a>',
			'<a href="' . $donatelink . '"><span class="dashicons dashicons-heart"' . $iconstyle . ' title="Donate"></span></a>'
		) );
	}
	return $links;
}


/**
* Register and Enqueue menu popup script
*
*/
function cc_menupopup_script() {

	$mPopupParams = array(
		'mpWidth'	=> esc_attr( get_option('cc_mpopup_width') ),
		'mpHeight'	=> esc_attr( get_option('cc_mpopup_height') ),
		'mpScroll'	=> esc_attr( get_option('cc_mpopup_scroll') ),
	);

	wp_register_script( 'mpopup', plugins_url() . "/" . basename(dirname(__FILE__)) . '/js/mpopup.js', '', '2.0.0', false );
	wp_enqueue_script( 'mpopup' );
	wp_add_inline_script( 'mpopup', 'var mPopupParams = ' . wp_json_encode( $mPopupParams ), 'before' );
}

add_action('wp_enqueue_scripts', 'cc_menupopup_script');