<?php
/*
Plugin Name: WordPress Which Template
Plugin URI: http://www.afzalmultani.com
Description: This is a debugging plugin that displays the current php file that is loading on the front end of the website.
Version: 1.0
Author: Afzal Multani
Author URI: http://www.afzalmultani.com
License: GPLv2 or later

*/

function amwpwt_admin_bar_init() {
	// If not an admin or if admin bar isn't showing, do nothing
	if ( ! is_super_admin() || ! is_admin_bar_showing() ) {
		return;
	}

	add_action( 'admin_bar_menu', 'amwpwt_admin_bar_links', 500 );
}

add_action( 'admin_bar_init', 'amwpwt_admin_bar_init' );

function amwpwt_admin_bar_links() {
	global $wp_admin_bar, $template;

	// clean up path
	$url           = content_url();
	$template_name = substr( $template, ( strpos( $template, $url ) ) );

	// Add as a parent menu
	$wp_admin_bar->add_menu( array(
		'title' => $template_name,
		'href'  => false,
		'id'    => 'amwpwt_links',
		'href'  => false
	) );
}