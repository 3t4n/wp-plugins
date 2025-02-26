<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action( 'save_post', 'fpfbip_save_form' );

function fpfbip_save_form( $post_id) {

$post_type = get_post_type($post_id);

if ( "fpfbip_facebook_feed" != $post_type ) {
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


if ( isset( $_POST['fpfbip_page_url'] ) ) {
		update_post_meta( $post_id, '_fpfbip_page_url', sanitize_text_field( $_POST['fpfbip_page_url'] ) );
	}

if ( isset( $_POST['fpfbip_album_pics_url'] ) ) {
		update_post_meta( $post_id, '_fpfbip_album_pics_url', sanitize_text_field( $_POST['fpfbip_album_pics_url'] ) );
	}


if ( isset( $_POST['fpfbip_no_of_post'] ) ) {
		update_post_meta( $post_id, '_fpfbip_no_of_post', sanitize_text_field( $_POST['fpfbip_no_of_post'] ) );
	}


if ( isset( $_POST['fpfbip_display_style'] ) ) {
		update_post_meta( $post_id, '_fpfbip_display_style', sanitize_text_field( $_POST['fpfbip_display_style'] ) );
	}


if ( isset( $_POST['fpfbip_default_tab'] ) ) {
		update_post_meta( $post_id, '_fpfbip_default_tab', sanitize_text_field( $_POST['fpfbip_default_tab'] ) );
	}

if ( isset( $_POST['fpfbip_date_format'] ) ) {
		update_post_meta( $post_id, '_fpfbip_date_format', sanitize_text_field( $_POST['fpfbip_date_format'] ) );
	}

if ( isset( $_POST['fpfbip_container_background_color'] ) ) {
		update_post_meta( $post_id, '_fpfbip_container_background_color', sanitize_text_field( $_POST['fpfbip_container_background_color'] ) );
	}


if ( isset( $_POST['fpfbip_post_background_color'] ) ) {
		update_post_meta( $post_id, '_fpfbip_post_background_color', sanitize_text_field( $_POST['fpfbip_post_background_color'] ) );
	}

if ( isset( $_POST['fpfbip_header_background_color'] ) ) {
		update_post_meta( $post_id, '_fpfbip_header_background_color', sanitize_text_field( $_POST['fpfbip_header_background_color'] ) );
	}

if ( isset( $_POST['fpfbip_header_text_color'] ) ) {
		update_post_meta( $post_id, '_fpfbip_header_text_color', sanitize_text_field( $_POST['fpfbip_header_text_color'] ) );
	}

if ( isset( $_POST['fpfbip_title_color'] ) ) {
		update_post_meta( $post_id, '_fpfbip_title_color', sanitize_text_field( $_POST['fpfbip_title_color'] ) );
	}

if ( isset( $_POST['fpfbip_likes_color'] ) ) {
		update_post_meta( $post_id, '_fpfbip_likes_color', sanitize_text_field( $_POST['fpfbip_likes_color'] ) );
	}			

if ( isset( $_POST['fpfbip_controls_text_color'] ) ) {
		update_post_meta( $post_id, '_fpfbip_controls_text_color', sanitize_text_field( $_POST['fpfbip_controls_text_color'] ) );
	}			

if ( isset( $_POST['fpfbip_title_font_size'] ) ) {
		update_post_meta( $post_id, '_fpfbip_title_font_size', sanitize_text_field( $_POST['fpfbip_title_font_size'] ) );
	}

if ( isset( $_POST['fpfbip_title_font_weight'] ) ) {
		update_post_meta( $post_id, '_fpfbip_title_font_weight', sanitize_text_field( $_POST['fpfbip_title_font_weight'] ) );
	}	

if ( isset( $_POST['fpfbip_likes_font_fize'] ) ) {
		update_post_meta( $post_id, '_fpfbip_likes_font_fize', sanitize_text_field( $_POST['fpfbip_likes_font_fize'] ) );
	}	

if ( isset( $_POST['fpfbip_base_font_size'] ) ) {
		update_post_meta( $post_id, '_fpfbip_base_font_size', sanitize_text_field( $_POST['fpfbip_base_font_size'] ) );
	}	
	
if ( isset( $_POST['fpfbip_load_more_text'] ) ) {
		update_post_meta( $post_id, '_fpfbip_load_more_text', sanitize_text_field( $_POST['fpfbip_load_more_text'] ) );
	}	

if ( isset( $_POST['fpfbip_cta_text'] ) ) {
		update_post_meta( $post_id, '_fpfbip_cta_text', sanitize_text_field( $_POST['fpfbip_cta_text'] ) );
	}	

if ( isset( $_POST['fpfbip_cta_link'] ) ) {
		update_post_meta( $post_id, '_fpfbip_cta_link', sanitize_text_field( $_POST['fpfbip_cta_link'] ) );
	}	

if ( isset( $_POST['fpfbip_title_font_family'] ) ) {
		update_post_meta( $post_id, '_fpfbip_title_font_family', sanitize_text_field( $_POST['fpfbip_title_font_family'] ) );
	}	


if ( isset( $_POST['fpfbip_general_font_family'] ) ) {
		update_post_meta( $post_id, '_fpfbip_general_font_family', sanitize_text_field( $_POST['fpfbip_general_font_family'] ) );
	}	


if ( isset( $_POST['fpfbip_shortcode_value'] ) ) {
		update_post_meta( $post_id, '_fpfbip_shortcode_value', sanitize_text_field( $_POST['fpfbip_shortcode_value'] ) );
	}

if ( isset( $_POST['fpfbip_show_hide_cover_image'] ) ) {
		update_post_meta( $post_id, '_fpfbip_show_hide_cover_image', sanitize_text_field( $_POST['fpfbip_show_hide_cover_image'] ) );
	}

if ( isset( $_POST['fpfbip_show_hide_header'] ) ) {
		update_post_meta( $post_id, '_fpfbip_show_hide_header', sanitize_text_field( $_POST['fpfbip_show_hide_header'] ) );
	}

if ( isset( $_POST['fpfbip_show_hide_tabs'] ) ) {
		update_post_meta( $post_id, '_fpfbip_show_hide_tabs', sanitize_text_field( $_POST['fpfbip_show_hide_tabs'] ) );
	}

if ( isset( $_POST['fpfbip_show_hide_sorting'] ) ) {
		update_post_meta( $post_id, '_fpfbip_show_hide_sorting', sanitize_text_field( $_POST['fpfbip_show_hide_sorting'] ) );
	}

if ( isset( $_POST['fpfbip_show_hide_loading_mechanism'] ) ) {
		update_post_meta( $post_id, '_fpfbip_show_hide_loading_mechanism', sanitize_text_field( $_POST['fpfbip_show_hide_loading_mechanism'] ) );
	}

if ( isset( $_POST['fpfbip_show_hide_cta_button'] ) ) {
		update_post_meta( $post_id, '_fpfbip_show_hide_cta_button', sanitize_text_field( $_POST['fpfbip_show_hide_cta_button'] ) );
	}

if ( isset( $_POST['fpfbip_show_hide_popup_details'] ) ) {
		update_post_meta( $post_id, '_fpfbip_show_hide_popup_details', sanitize_text_field( $_POST['fpfbip_show_hide_popup_details'] ) );
	}

if ( isset( $_POST['fpfbip_show_hide_thumbnail_likes_comments'] ) ) {
		update_post_meta( $post_id, '_fpfbip_show_hide_thumbnail_likes_comments', sanitize_text_field( $_POST['fpfbip_show_hide_thumbnail_likes_comments'] ) );
	}

if ( isset( $_POST['fpfbip_show_hide_page_about_info'] ) ) {
		update_post_meta( $post_id, '_fpfbip_show_hide_page_about_info', sanitize_text_field( $_POST['fpfbip_show_hide_page_about_info'] ) );
	}

if ( isset( $_POST['fpfbip_item_display_mode'] ) ) {
		update_post_meta( $post_id, '_fpfbip_item_display_mode', sanitize_text_field( $_POST['fpfbip_item_display_mode'] ) );
	}


}