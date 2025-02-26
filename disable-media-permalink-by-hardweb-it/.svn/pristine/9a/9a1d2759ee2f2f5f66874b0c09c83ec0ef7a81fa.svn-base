<?php
/*
Plugin Name: Disable Media Permalink by Hardweb.it
Plugin URI:  https://www.hardweb.it
Description: Completely disable the Media Permalink created by WP during media loading. It's easy to use, no options, just activate the plugin and regenerate the WP Permalink from Settings.
Version:     1.0
Author:      Hardweb.it
Author URI:  https://www.hardweb.it/wp-plugins/
Donate link: https://www.paypal.com/donate?hosted_button_id=DEFQGNU2RNQ4Y
Copyright: © 2017 Hardweb.it
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html

Disable Media Permalink by Hardweb.it is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Disable Media Permalink by Hardweb.it is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Disable Media Permalink by Hardweb.it. If not, see https://www.hardweb.it.
*/

if(!defined('ABSPATH')) exit; // Exit if accessed directly

if ( !function_exists( 'hw_cleanup_attachment_permalink' ) ) {
	function hw_cleanup_attachment_permalink( $rules ) {
		foreach ( $rules as $regex => $query ) {
			if ( strpos( $regex, 'attachment' ) || strpos( $query, 'attachment' ) ) {
				unset( $rules[ $regex ] );
			}
		}

		return $rules;
	}
	add_filter( 'rewrite_rules_array', 'hw_cleanup_attachment_permalink' );
}

if ( !function_exists( 'hw_cleanup_attachment_link' ) ) {
	function hw_cleanup_attachment_link( $link ) {
		return;
	}
	add_filter( 'attachment_link', 'hw_cleanup_attachment_link' );
}