<?php

/*
Plugin Name: Go to Post ID
Plugin URI: https://wp.kravjar.sk/?plugin=go-to-post-id
Description: Αdds little search box into admin bar that redirects you to edit page of post of given ID. Enter the post ID and hit return to go to post edit screen—if the post exists. If it doesn't, you get a standard WordPress error page—just hit back and try again.
Author: Matej Kravjar
Author URI: https://matej.kravjar.sk
Version: 0.2
License: GPLv2+
*/

// protect against direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_bar_menu', function( $wp_admin_bar ) {
	if ( current_user_can( 'edit_posts' ) ) {
		$wp_admin_bar->add_node( [
			'id' => 'go-to-post-id',
			'title' => '<form action="' . esc_attr( admin_url( 'post.php' ) ) . '">'
				. '<input type="text" name="post" placeholder="Go to Post ID" style="width: 100px; height: 20px; padding: 0 4px" />'
				. '<input type="hidden" name="action" value="edit" />'
				. '</form>',
		] );
	}
}, PHP_INT_MAX );
