<?php

defined( 'ABSPATH' ) or	die( 'Cheatin\' uh?' );

/**
 * Set posts visibility
 *
 * @since 1.0
 *
 */
function jlasp_set_featured_post( $number ) {
	$recent_posts = wp_get_recent_posts($number);
	$new_sticky = array();
	foreach( $recent_posts as $recent ){
		array_push( $new_sticky, $recent["ID"]);
	}
	update_option( 'sticky_posts', $new_sticky);
	
	return true;
}


/**
 * Update posts visibility when the actions below are triggered
 *
 * @since 1.0
 *
 */
add_action( 'trashed_post'	, 'jlasp_update_post_visibility' );
add_action( 'deleted_post'	, 'jlasp_update_post_visibility' );
add_action( 'save_post'		, 'jlasp_update_post_visibility' );

function jlasp_update_post_visibility() {
	if( (int)get_option( 'jlasp_number_post' ) > 0 ) {
		jlasp_set_featured_post( (int)get_option( 'jlasp_number_post' ) );
	}
}