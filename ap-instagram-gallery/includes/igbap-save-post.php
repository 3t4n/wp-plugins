<?php
add_action( 'save_post', 'igbap_save_form' );

function igbap_save_form( $post_id ) {

	$post_type = get_post_type($post_id);
// If this isn't a 'sfba_subscribe_form' post, don't update it.
	if ( "arrow_insta_gallery" != $post_type ) {
		return;
	}

// Stop WP from clearing custom fields on autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

// Prevent quick edit from clearing custom fields
	if (defined('DOING_AJAX') && DOING_AJAX){
		return;
	}
// - Update the post's metadata.
	if ( isset( $_POST['igbap_private_access_token'] ) ) {
		update_post_meta( $post_id, '_igbap_private_access_token', sanitize_text_field( $_POST['igbap_private_access_token'] ) );
	}
	if ( isset( $_POST['igbap_bg_overlay'] ) ) {
		update_post_meta( $post_id, '_igbap_bg_overlay', sanitize_text_field( $_POST['igbap_bg_overlay'] ) );
	}
	if ( isset( $_POST['igbap_container_bg'] ) ) {
		update_post_meta( $post_id, '_igbap_container_bg', sanitize_text_field( $_POST['igbap_container_bg'] ) );
	}
	if ( isset( $_POST['igbap_username_color'] ) ) {
		update_post_meta( $post_id, '_igbap_username_color', sanitize_text_field( $_POST['igbap_username_color'] ) );
	}
	if ( isset( $_POST['igbap_date_time_color'] ) ) {
		update_post_meta( $post_id, '_igbap_date_time_color', sanitize_text_field( $_POST['igbap_date_time_color'] ) );
	}
	if ( isset( $_POST['igbap_caption_color'] ) ) {
		update_post_meta( $post_id, '_igbap_caption_color', sanitize_text_field( $_POST['igbap_caption_color'] ) );
	}
	if ( isset( $_POST['igbap_link_color'] ) ) {
		update_post_meta( $post_id, '_igbap_link_color', sanitize_text_field( $_POST['igbap_link_color'] ) );
	}
	
	if ( isset( $_POST['igbap_shortcode_value'] ) ) {
		update_post_meta( $post_id, '_igbap_shortcode_value', sanitize_text_field( $_POST['igbap_shortcode_value'] ) );
	}
	if ( isset( $_POST['igbap_color_scheme'] ) ) {
		update_post_meta( $post_id, '_igbap_color_scheme', sanitize_text_field( $_POST['igbap_color_scheme'] ) );
	}

	if ( isset( $_POST['igbap_show_photos_from'] ) ) {
		update_post_meta( $post_id, '_igbap_show_photos_from', sanitize_text_field( $_POST['igbap_show_photos_from'] ) );
	}
	if ( isset( $_POST['igbap_user_id'] ) ) {
		update_post_meta( $post_id, '_igbap_user_id', sanitize_text_field( $_POST['igbap_user_id'] ) );
	}
	if ( isset( $_POST['igbap_user_hashtag'] ) ) {
		update_post_meta( $post_id, '_igbap_user_hashtag', sanitize_text_field( $_POST['igbap_user_hashtag'] ) );
	}
	if ( isset( $_POST['igbap_multiuser_id'] ) ) {
		update_post_meta( $post_id, '_igbap_multiuser_id', sanitize_text_field( $_POST['igbap_multiuser_id'] ) );
	}
	if ( isset( $_POST['igbap_multitag_id'] ) ) {
		update_post_meta( $post_id, '_igbap_multitag_id', sanitize_text_field( $_POST['igbap_multitag_id'] ) );
	}
	if ( isset( $_POST['igbap_column_count'] ) ) {
		update_post_meta( $post_id, '_igbap_column_count', sanitize_text_field( $_POST['igbap_column_count'] ) );
	}
	if ( isset( $_POST['igbap_liked_id'] ) ) {
		update_post_meta( $post_id, '_igbap_liked_id', sanitize_text_field( $_POST['igbap_liked_id'] ) );
	}
	if ( isset( $_POST['igbap_number_of_photos'] ) ) {
		update_post_meta( $post_id, '_igbap_number_of_photos', sanitize_text_field( $_POST['igbap_number_of_photos'] ) );
	}
	if ( isset( $_POST['ifba_number_of_columns'] ) ) {
		update_post_meta( $post_id, '_ifba_number_of_columns', sanitize_text_field( $_POST['ifba_number_of_columns'] ) );
	}
	if ( isset( $_POST['ifba_images_margin'] ) ) {
		update_post_meta( $post_id, '_ifba_images_margin', sanitize_text_field( $_POST['ifba_images_margin'] ) );
	}
	if ( isset( $_POST['igbap_lightbox_speed'] ) ) {
		update_post_meta( $post_id, '_igbap_lightbox_speed', sanitize_text_field( $_POST['igbap_lightbox_speed'] ) );
	}
	if ( isset( $_POST['igbap_lightbox_delay'] ) ) {
		update_post_meta( $post_id, '_igbap_lightbox_delay', sanitize_text_field( $_POST['igbap_lightbox_delay'] ) );
	}

	if ( isset( $_REQUEST['utbap_enable_videos'] ) ) {
		update_post_meta($post_id, '_utbap_enable_videos', TRUE);
	} else {
		update_post_meta($post_id, '_utbap_enable_videos', FALSE);
	}
	if ( isset( $_REQUEST['utbap_enable_load_more_button'] ) ) {
		update_post_meta($post_id, '_utbap_enable_load_more_button', TRUE);
	} else {
		update_post_meta($post_id, '_utbap_enable_load_more_button', FALSE);
	}
	if ( isset( $_REQUEST['utbap_enable_videos_controls'] ) ) {
		update_post_meta($post_id, '_utbap_enable_videos_controls', TRUE);
	} else {
		update_post_meta($post_id, '_utbap_enable_videos_controls', FALSE);
	}
	if ( isset( $_REQUEST['igbap_lightbox_username'] ) ) {
		update_post_meta($post_id, '_igbap_lightbox_username', TRUE);
	} else {
		update_post_meta($post_id, '_igbap_lightbox_username', FALSE);
	}
	if ( isset( $_REQUEST['igbap_lightbox_description'] ) ) {
		update_post_meta($post_id, '_igbap_lightbox_description', TRUE);
	} else {
		update_post_meta($post_id, '_igbap_lightbox_description', FALSE);
	}
	if ( isset( $_REQUEST['igbap_lightbox_likes'] ) ) {
		update_post_meta($post_id, '_igbap_lightbox_likes', TRUE);
	} else {
		update_post_meta($post_id, '_igbap_lightbox_likes', FALSE);
	}
	if ( isset( $_REQUEST['igbap_lightbox_comments'] ) ) {
		update_post_meta($post_id, '_igbap_lightbox_comments', TRUE);
	} else {
		update_post_meta($post_id, '_igbap_lightbox_comments', FALSE);
	}
	if ( isset( $_REQUEST['igbap_lightbox_location'] ) ) {
		update_post_meta($post_id, '_igbap_lightbox_location', TRUE);
	} else {
		update_post_meta($post_id, '_igbap_lightbox_location', FALSE);
	}
	if ( isset( $_REQUEST['igbap_lightbox_date'] ) ) {
		update_post_meta($post_id, '_igbap_lightbox_date', TRUE);
	} else {
		update_post_meta($post_id, '_igbap_lightbox_date', FALSE);
	}
	if ( isset( $_REQUEST['igbap_lightbox_link'] ) ) {
		update_post_meta($post_id, '_igbap_lightbox_link', TRUE);
	} else {
		update_post_meta($post_id, '_igbap_lightbox_link', FALSE);
	}

}