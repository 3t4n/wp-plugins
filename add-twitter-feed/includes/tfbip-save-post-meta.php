<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action( 'save_post', 'tfbip_save_form' );

function tfbip_save_form( $post_id) {

$post_type = get_post_type($post_id);

if ( "tfbip_twitter_feed" != $post_type ) {
  return;
}

// if our nonce isn't there, or we can't verify it, bail
/*if( !isset( $_POST['tfbip_nonce'] ) || !wp_verify_nonce( $_POST['tfbip_nonce'], 'tfbip_meta_box_nonce' ) ) return;
*/
// Stop WP from clearing custom fields on autosave
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
  return;
}

// Prevent quick edit from clearing custom fields
if (defined('DOING_AJAX') && DOING_AJAX){
  return;
}

 if ( !current_user_can( 'manage_options' ))
  return;


if ( isset( $_POST['tfbip_username'] ) ) {
		update_post_meta( $post_id, '_tfbip_username', sanitize_text_field( $_POST['tfbip_username'] ) );
	}


if ( isset( $_POST['tfbip_hashtag'] ) ) {
		update_post_meta( $post_id, '_tfbip_hashtag', sanitize_text_field( $_POST['tfbip_hashtag'] ) );
	}

if ( isset( $_POST['tfbip_select_feed_from'] ) ) {
		update_post_meta( $post_id, '_tfbip_select_feed_from', sanitize_text_field( $_POST['tfbip_select_feed_from'] ) );
	}

if ( isset( $_POST['tfbip_number_of_tweets'] ) ) {
		update_post_meta( $post_id, '_tfbip_number_of_tweets', sanitize_text_field( $_POST['tfbip_number_of_tweets'] ) );
	}

if ( isset( $_POST['tfbip_date_posted_lang'] ) ) {
        update_post_meta( $post_id, '_tfbip_date_posted_lang', sanitize_text_field( $_POST['tfbip_date_posted_lang'] ) );
    }

if ( isset( $_POST['tfbip_select_style'] ) ) {
		update_post_meta( $post_id, '_tfbip_select_style', sanitize_text_field( $_POST['tfbip_select_style'] ) );
	}

if ( isset( $_POST['tfbip_caption_text_limit_vertical'] ) ) {
		update_post_meta( $post_id, '_tfbip_caption_text_limit_vertical', sanitize_text_field( $_POST['tfbip_caption_text_limit_vertical'] ) );
	}

if ( isset( $_REQUEST['tfbip_display_photos_only'] ) ) {
		update_post_meta($post_id, '_tfbip_display_photos_only', TRUE);
	} else {
		update_post_meta($post_id, '_tfbip_display_photos_only', FALSE);
	}


if ( isset( $_REQUEST['tfbip_vertical_show_hide_date'] ) ) {
		update_post_meta($post_id, '_tfbip_vertical_show_hide_date', TRUE);
	} else {
		update_post_meta($post_id, '_tfbip_vertical_show_hide_date', FALSE);
	}


if ( isset( $_REQUEST['tfbip_vertical_show_hide_dp'] ) ) {
		update_post_meta($post_id, '_tfbip_vertical_show_hide_dp', TRUE);
	} else {
		update_post_meta($post_id, '_tfbip_vertical_show_hide_dp', FALSE);
	}

if ( isset( $_REQUEST['tfbip_vertical_show_hide_caption'] ) ) {
		update_post_meta($post_id, '_tfbip_vertical_show_hide_caption', TRUE);
	} else {
		update_post_meta($post_id, '_tfbip_vertical_show_hide_caption', FALSE);
	}

if ( isset( $_POST['tfbip_caption_text_limit_blog'] ) ) {
		update_post_meta( $post_id, '_tfbip_caption_text_limit_blog', sanitize_text_field( $_POST['tfbip_caption_text_limit_blog'] ) );
	}


if ( isset( $_REQUEST['tfbip_blog_show_hide_date'] ) ) {
		update_post_meta($post_id, '_tfbip_blog_show_hide_date', TRUE);
	} else {
		update_post_meta($post_id, '_tfbip_blog_show_hide_date', FALSE);
	}


if ( isset( $_REQUEST['tfbip_blog_show_hide_dp'] ) ) {
		update_post_meta($post_id, '_tfbip_blog_show_hide_dp', TRUE);
	} else {
		update_post_meta($post_id, '_tfbip_blog_show_hide_dp', FALSE);
	}

if ( isset( $_REQUEST['tfbip_blog_show_hide_caption'] ) ) {
		update_post_meta($post_id, '_tfbip_blog_show_hide_caption', TRUE);
	} else {
		update_post_meta($post_id, '_tfbip_blog_show_hide_caption', FALSE);
	}

if ( isset( $_POST['tfbip_no_of_columns_masonry'] ) ) {
		update_post_meta( $post_id, '_tfbip_no_of_columns_masonry', sanitize_text_field( $_POST['tfbip_no_of_columns_masonry'] ) );
	}

if ( isset( $_POST['tfbip_caption_text_limit_masonry'] ) ) {
		update_post_meta( $post_id, '_tfbip_caption_text_limit_masonry', sanitize_text_field( $_POST['tfbip_caption_text_limit_masonry'] ) );
	}	


if ( isset( $_REQUEST['tfbip_masonry_show_hide_date'] ) ) {
		update_post_meta($post_id, '_tfbip_masonry_show_hide_date', TRUE);
	} else {
		update_post_meta($post_id, '_tfbip_masonry_show_hide_date', FALSE);
	}


if ( isset( $_REQUEST['tfbip_masonry_show_hide_dp'] ) ) {
		update_post_meta($post_id, '_tfbip_masonry_show_hide_dp', TRUE);
	} else {
		update_post_meta($post_id, '_tfbip_masonry_show_hide_dp', FALSE);
	}

if ( isset( $_REQUEST['tfbip_masonry_show_hide_caption'] ) ) {
		update_post_meta($post_id, '_tfbip_masonry_show_hide_caption', TRUE);
	} else {
		update_post_meta($post_id, '_tfbip_masonry_show_hide_caption', FALSE);
	}



if ( isset( $_POST['tfbip_select_template'] ) ) {
		update_post_meta( $post_id, '_tfbip_select_template', sanitize_text_field( $_POST['tfbip_select_template'] ) );
	}

if ( isset( $_POST['tfbip_shortcode_value'] ) ) {
		update_post_meta( $post_id, '_tfbip_shortcode_value', sanitize_text_field( $_POST['tfbip_shortcode_value'] ) );
	}



}