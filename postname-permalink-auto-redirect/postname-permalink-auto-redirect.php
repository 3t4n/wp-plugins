<?php
/**
 * Plugin Name: Postname Permalink Auto Redirect
 * Description: Automatically redirects (301) when you change permalinks from 'postname' format.
 * Plugin URI: https://www.frontkom.no/
 * Author: Frontkom
 * Author URI: https://www.frontkom.no/
 * Version: 1.1
 * License: GPLv2 or later
 */

// Check for a possible redirect if we find a 404.
// This is the earliest we can check for the redirect.
add_action( 'template_redirect', 'postname_redirect' );
function postname_redirect() {

	// If this is not a 404 page, do nothing.
	if ( ! is_404() ) {
		return FALSE;
	}

	// If the current permalink structure is '/%postname%/'.
	// Don't do anything, even if we find a 404.
	global $wp_rewrite;
	if ( $wp_rewrite->permalink_structure === '/%postname%/' ) {
		return FALSE;
	}

	// Request slug.
	global $wp;
	$request_slug = sanitize_text_field( $wp->request );

	// WPML Support.
	// Strip language prefix from request slug, if present, like 'en/', 'es/', etc.
	if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
		$request_slug = str_replace( ICL_LANGUAGE_CODE . '/', '', $request_slug );
	}

	// AMP Support.
	// Remove '/amp' from the request slug if found.
	$amp_enabled = FALSE;
	if ( strpos( $request_slug, '/amp' ) !== FALSE ) {
		$request_slug = str_replace( '/amp', '', $request_slug );
		$amp_enabled  = TRUE;
	}

	// At this point our request slug should contain only 'our-coolz-post-slugz'.
	// So... look for '/', skip if found since WordPress doesn't allow '/' in slugz.
	if ( strpos( $request_slug, '/' ) !== FALSE ) {
		return FALSE;
	}

	// Get posts based on slug.
	$posts = get_posts( array( 'name' => $request_slug, 'post_type' => 'post', 'post_status' => 'publish' ) );

	// Get the permalink from the first post we find.
	// If we're using WPML, get the translated post ID permalink.
	if ( ! empty( $posts[0] ) ) {

		// WPML Support.
		if ( function_exists( 'icl_object_id' ) ) {
			$permalink = get_permalink( icl_object_id( $posts[0]->ID ) );
		} else {
			$permalink = get_permalink( $posts[0]->ID );
		}

		// Redirects to post permalink.
		if ( ! empty( $permalink ) ) {
			// AMP Support.
			if ( $amp_enabled ) {
				$permalink .= '/amp';
			}
			// 301 Redirect.
			wp_redirect( $permalink, 301 );
			exit; // We're done here.
		}
	}

}
