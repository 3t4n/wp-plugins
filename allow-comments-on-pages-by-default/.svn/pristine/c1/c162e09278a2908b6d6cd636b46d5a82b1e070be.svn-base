<?php
/*
Plugin Name: Allow Comments on Pages by Default
Plugin URI: http://wordpress.org/plugins/allow-comments-on-pages-by-default/
Description: Turns on comments on pages in WordPress 4.3+ by default.
Author: Sergey Biryukov
Author URI: http://profiles.wordpress.org/sergeybiryukov/
Version: 1.1
*/ 

function wp33516_open_comments_for_pages( $status, $post_type, $comment_type ) {
	if ( 'page' === $post_type ) {
		if ( in_array( $comment_type, array( 'pingback', 'trackback' ) ) ) {
			$status = get_option( 'default_ping_status' );
		} else {
			$status = get_option( 'default_comment_status' );
		}
	}

	return $status;
}
add_filter( 'get_default_comment_status', 'wp33516_open_comments_for_pages', 10, 3 );
?>