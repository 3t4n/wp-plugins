<?php
/**
 * Plugin Name: Astro Hide Unpublished Post Types From Menu
 * Description: Hides from menus all post_types that have a status other than published.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            AstroThemes
 * Author URI:        https://www.astrothemes.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       astro-hide-unpublished-post-types
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevents direct access to the file.
}

add_filter( 'parse_query', 'astro_hupt_parse_query' );
add_filter( 'views_edit-post', 'astro_hupt_filter_views' );
add_filter( 'views_edit-page', 'astro_hupt_filter_views' );

function astro_hupt_parse_query( $query ) {
	if ( is_admin() && $query->is_main_query() && !current_user_can('administrator') ) {
		if ( $query->get('post_type') && !is_array( $query->get('post_type') ) ) {
			$query->set( 'post_status', 'publish' );
		}
	}
}

function astro_hupt_filter_views($views) {
	if(!current_user_can('administrator')) {
		unset($views['draft']);
		unset($views['pending']);
		unset($views['future']);
		unset($views['private']);
		unset($views['trash']);
	}
	return $views;
}
