<?php
/*
Plugin Name:	Admin Bar in Fullscreen Mode
Plugin URI:		https://webnolo.com/admin-bar-fullscreen-mode/
Description:	Adds the missing WordPress admin bar in WordPress Gutenberg editor when it is fullscreen.
Version:		1.0.0
Author:			Sridhar Katakam
Author URI:		https://webnolo.com/
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

define( 'WEBNOLO_ADMIN_BAR_FULLSCREEN_MODE', '1.0.0' );

add_action( 'enqueue_block_editor_assets', 'wbnl_admin_css' );
/**
 * Loads custom CSS in the backend on WP editor pages.
 */
function wbnl_admin_css() {
	if ( ! is_admin_bar_showing() ) {
		return;
	}

	wp_enqueue_style( 'wbnl_admin_bar_fullscreen', plugin_dir_url( __FILE__ ) . 'assets/css/block-editor.css', array(), WEBNOLO_ADMIN_BAR_FULLSCREEN_MODE );
}