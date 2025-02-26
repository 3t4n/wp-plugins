<?php
/*
Plugin Name:	WPDevDesign - Oxygen - Essentials
Plugin URI:		https://wpdevdesign.com/oxygen-essentials/
Description:	Essential changes for sites running Oxygen, a visual site builder for WordPress.
Version:		1.0.1
Author:			Sridhar Katakam
Author URI:		https://wpdevdesign.com
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt

This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This plugin. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

// Enable HTML5 Support.
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

// 1000000 priority so it is executed after all Oxygen's styles
add_action( 'wp_head', 'wpdd_oxygen_essentials_enqueue_files', 1000000 );
/**
 * Load assets.
 */
function wpdd_oxygen_essentials_enqueue_files() {
	if ( ! class_exists( 'CT_Component' ) ) {
		return;
	}

	$styles = new WP_Styles;
	$styles->add( 'oxygen-essentials', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
	$styles->enqueue( array( 'oxygen-essentials' ) );
	$styles->do_items();
}