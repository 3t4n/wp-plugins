<?php
/**
 * Plugin Name: Disable Author Archives
 * Plugin URI: https://wordpress.org/plugins/disable-author-archives
 * Description: Disables author archives and makes the web server return status code 404 ('Not Found') instead.
 * Version: 1.3.5
 * Author: freemp
 * Author URI: https://profiles.wordpress.org/freemp
 * Text Domain: disable-author-archives
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* Return status code 404 for existing and non-existing author archives. */
add_action( 'template_redirect',
	function() {
		if ( isset( $_GET['author'] ) || is_author() ) {
			global $wp_query;
			$wp_query->set_404();
			status_header( 404 );
			nocache_headers();
		}
	}, 1 );

/* Remove author links. */
add_filter( 'user_row_actions',
	function( $actions ) {
		if ( isset( $actions['view'] ) )
			unset( $actions['view'] );
		return $actions;
	}, PHP_INT_MAX );
add_filter( 'author_link', function() { return '#'; }, PHP_INT_MAX );
add_filter( 'the_author_posts_link', 'get_the_author', PHP_INT_MAX );

/* Remove users from default sitemap. */
if ( class_exists( 'WP_Sitemaps' ) )
	add_filter( 'wp_sitemaps_add_provider',
		function( $provider, $name ) {
			if ( $name === 'users' )
				return false;
			return $provider;
		}, PHP_INT_MAX, 2 );