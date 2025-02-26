<?php
/*
Plugin Name: Annoying Hello World
Plugin URI: http://boolex.com
Description: Annoyingly adds "Hello World" every post created!
Author: Boolex
Version: 1.0
Author URI: http://boolex.com
*/

function annoying_hello_world( $post_id ) {
	if ( ! wp_is_post_revision( $post_id ) ) {
		remove_action('save_post', 'annoying_hello_world');

		$post = get_post( $post_id );

		$my_post = [
				'ID' => $post_id,
				'post_content' => $post->post_content . '<br> Hello World!'
		];

		wp_update_post( $my_post );

		// re-hook this function
		add_action('save_post', 'annoying_hello_world');
	}
}
add_action('save_post', 'annoying_hello_world');