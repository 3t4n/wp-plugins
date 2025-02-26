<?php
/*
Plugin Name: Published Revisions Only
Plugin URI: http://www.kingrat.us/plugins/published-revisions-only/
Description: Only stores a post revision if the post is in a published state
Author: Philip Weiss
Version: 1.0
Author URI: http://www.kingrat.us/
*/

@remove_action ( 'pre_post_update', 'wp_save_post_revision' );


/**
* Saves an already existing post as a post revision.
*
* Typically used immediately prior to post updates.
*
* @package WordPress
* @subpackage Post_Revisions
* @since 2.6.0
*
* @uses wp_save_post_revision()
*
* @param int $post_id The ID of the post to save as a revision.
* @return mixed Null or 0 if error, new revision ID, if success.
*/
function pubrevon_save_published_post_revision( $post_id ) {
	

	if ( !$post = get_post( $post_id, ARRAY_A ) )
		return;

	
	if ( !in_array( $post['post_status'], array( 'publish', 'static' ) ) )
	{
		return;
	}
	
	$return = wp_save_post_revision( $post_id );   
	
	return $return;
}

function pubrevon_init() {
	add_action ( 'pre_post_update', 'pubrevon_save_published_post_revision', 10 );

}

add_action('init', 'pubrevon_init', 1);


?>