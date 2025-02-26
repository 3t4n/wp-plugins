<?php
/**
 * Statistics Functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get views count for an item.
 */
function acb_get_views() {
	global $post;

	$count = get_post_meta( $post->ID, '_acb_views', true );

	return absint( $count );
}

/**
 * Get likes count for an item.
 */
function acb_get_likes() {
	global $post;

	$count = get_post_meta( $post->ID, '_acb_likes', true );

	return absint( $count );
}

/**
 * Returns a class based on like status.
 */
function acb_get_like_class() {
	global $post;
	if ( ! isset( $post->ID ) ) {
		return 'acb-like';
	}
	if ( acb_user_has_liked( $post->ID ) ) {
		$class = 'acb-like acb-liked';
	} else {
		$class = 'acb-like';
	}
	return $class;
}

/**
 * Checks if user has liked an item.
 */
function acb_user_has_liked( $post_id ) {
	return isset( $_COOKIE[ 'acb-voted-' . $post_id ] );
}

/**
 * Update an item view count.
 */
add_action( 'template_redirect', 'acb_add_view' );
function acb_add_view() {
	global $post;

	if ( isset( $post->ID ) ) {
		$count = get_post_meta( $post->ID, '_acb_views', true );
		if ( ! $count ) {
			$count = 1;
		} else {
			$count = $count + 1;
		}
		update_post_meta( $post->ID, '_acb_views', $count );
	}
}

/**
 * Add default meta for new posts.
 */
add_action('wp_insert_post', 'acb_insert_post_default_meta', 50 );
function acb_insert_post_default_meta( $post_id ){
	if ( ! wp_is_post_revision( $post_id ) ){
		add_post_meta( $post_id,'_acb_views', 0, true );
		add_post_meta( $post_id,'_acb_likes', 0, true );
	}
	return $post_id;
}