<?php
/*
Plugin Name: Noindex/Nofollow links
Plugin URI: http://www.johntron.com
Description: Allows you to add noindex and/or nofollow attributes to archive, tag, or category links.
Version: 2.0
Author: John Syrinek
Author URI: http://www.johntron.com

Copyright 2008  John Syrinek  (email : john.syrinek@gmail.com)

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
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
    
*/

add_filter( 'get_archives_link', 'ninfa_filter_archive_links' );
add_filter( 'wp_list_categories', 'ninfa_filter_categories_links' );
add_filter( 'wp_tag_cloud', 'ninfa_filter_tag_links' );

add_action('admin_menu', 'ninfa_menu');

function ninfa_filter_archive_links( $text ) {
	return ninfa_filter_with_options( $text, get_option( 'ninfa_archives_noindex' ), get_option( 'ninfa_archives_nofollow' ) );
}
function ninfa_filter_categories_links( $text ) {
	return ninfa_filter_with_options( $text, get_option( 'ninfa_categories_noindex' ), get_option( 'ninfa_categories_nofollow' ) );
}
function ninfa_filter_tag_links( $text ) {
	return ninfa_filter_with_options( $text, get_option( 'ninfa_tags_noindex' ), get_option( 'ninfa_tags_nofollow' ) );
	
}

function ninfa_filter_with_options( $text, $noindex, $nofollow ) {
	if ( $noindex && $nofollow ) {
		$text = preg_replace( '/<a([^>]+)>/', '<a$1 rel="noindex,nofollow">', $text );
	} else if ( $noindex ) {
		$text = preg_replace( '/<a([^>]+)>/', '<a$1 rel="noindex">', $text );
	} else if ( $nofollow ) {
		$text = preg_replace( '/<a([^>]+)>/', '<a$1 rel="nofollow">', $text );
	}
	return $text;
}

function ninfa_menu() {
	add_options_page('Noindex/Nofollow links', 'Noindex/Nofollow links', 8, __FILE__, 'ninfa_panel');
}

function ninfa_panel() {
	if ( isset( $_POST[ 'action' ] ) ) {
		echo "Saved";
	}
	
	include 'admin_panel.phtml';
}