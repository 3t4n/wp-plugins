<?php
/*
Plugin Name: Better Aria Label Support
Plugin URI: https://wordpress.org/plugins/better-aria-label-support/
Description: Better aria-label support for WordPress (including menus).
Author: audrasjb
Version: 0.1
Author URI: https://jeanbaptisteaudras.com/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://paypal.me/audrasjb
Text Domain: better-aria-label-support
*/


/**
 * Filter nav menu items label on the admin.
 */
add_filter( 'gettext', 'bals_change_text_strings_gettext', 10, 3 );
add_filter( 'gettext_with_context', 'bals_change_text_strings_gettext', 10, 4 );

function bals_change_text_strings_gettext( $translated_text, $untranslated_text, $domain ) {
	if ( 'Title Attribute' === $untranslated_text ) {
		$translated_text = esc_html__( 'Aria label attribute', 'menu-aria-label' );
	}
	return $translated_text;
}

/**
 * Filter nav menu items.
 */
function bals_aria_label_menu_items( $atts, $item, $args, $depth ) {
	if ( isset( $atts['title'] ) && ! empty( $atts['title'] ) ) {
		$atts[ 'aria-label' ] = esc_attr( $atts['title'] );
		unset( $atts['title'] );
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'bals_aria_label_menu_items', 10, 4 );
