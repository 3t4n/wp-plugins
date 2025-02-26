<?php

global $current_user;

$key = sanitize_text_field($_POST['key']);
$value = $_POST['value'];
$post_id = absint($_POST['post_id']);

if ($value != 'hide' && $value != 'show') {
	
	wp_send_json_error();
}

if ( $post_id ) {
	
	$post_author_id = get_post($post_id)->post_author;
	
	if ( current_user_can( 'edit_others_posts', $post_id ) || ($post_author_id == $current_user->ID) )  {
		
		update_post_meta($post_id, $key, $value);
		wp_send_json_success();
		
	} else {
		
		wp_send_json_error();
		
	}
	
} else {
	
	wp_send_json_error();
	
}
