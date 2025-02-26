<?php
/*
Plugin Name: Awesome MW WP Form Styles
Plugin URI: https://github.com/Olein-jp/awesome-mwwpform-styles
Description: This plugin will choice css classes for making style in input form with MW WP Form.
Version: 1.0.6
Author: olein
Author URI: https://olein-design.com
License: GPLv2 or later

Copyright 2019 Koji Kuno (email : info@olein-design.com)

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

/**
 * Enqueue style
 */
function ams_enqueue_style() {
	wp_enqueue_style( 'ams-css', plugins_url( 'style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'ams_enqueue_style' );

/**
 * Delete function of AutoP in MW Wp Form
 */
function ams_delete_autop() {
	if ( class_exists( 'MW_WP_Form_Admin' ) ) {
		$mw_wp_form_admin = new MW_WP_Form_Admin();
		$forms            = $mw_wp_form_admin->get_forms();
		foreach ( $forms as $form ) {
			add_filter( 'mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false' );
		}
	}
}
ams_delete_autop();