<?php
/**
 * Plugin Name: Shortcode in Title
 * Plugin URI: http://amitmoreno.com
 * Description: Simple plugin which allows you to add shortcodes to the Title field
 * Version: 1.0
 * Author: Amit Moreno
 * Author http://www.amitmoreno.com/
 * License: GPLv2 or later
 */
if( !is_admin() ) {
	add_filter( 'the_title', function( $title ) {
		return do_shortcode($title);
	} );
}