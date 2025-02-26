<?php
/*
Plugin Name: Slug as Body Class
Version: 1.0
Author: Carlo Roosen, Elena Mukhina
Author URI: http://www.carloroosen.com/
*/

add_filter( 'body_class', 'slug_as_body_class' );

function slug_as_body_class( $classes ) {
	global $post;

	if ( isset( $post ) && is_singular() ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	return $classes;
}
