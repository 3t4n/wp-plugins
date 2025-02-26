<?php
/*
Plugin Name: Add Image to RSS Feed
Plugin URI:
Description: Automatically adds the featured image to RSS feed posts
Author: Hors Hipsrectors
Author URI:
Version: 2017.08.13
*/


function horshipsrectors_rss_thumbnail ( $content ) {

	global $post;

	if ( isset( $post  ) ) {
		if ( has_post_thumbnail( $post->ID ) )
			$content = get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'alt' => get_the_title(), 'title' => get_the_title(), 'style' => 'float:right;' ) ) . '' . $content;
	}

	return $content;
}

add_filter( 'the_excerpt_rss', 'horshipsrectors_rss_thumbnail' );
add_filter( 'the_content_feed', 'horshipsrectors_rss_thumbnail' );
