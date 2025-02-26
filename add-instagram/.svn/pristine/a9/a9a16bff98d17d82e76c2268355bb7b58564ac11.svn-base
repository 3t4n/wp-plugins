<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('save_post','smuzisf_save_metabox_data');

function smuzisf_save_metabox_data($post_id){


  	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    if( !isset( $_POST['wssf_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wssf_meta_box_nonce'], 'wssf_ui_meta_box_nonce' ) ) return;
     
    if ( ! current_user_can( 'manage_options' ) )
        return;

    if( isset( $_POST['wssf_insta_username'] ) )
        update_post_meta( $post_id, 'wssf_insta_username', sanitize_text_field( $_POST['wssf_insta_username'] ) );

    if( isset( $_POST['wssf_enable_feed'] ) )
        update_post_meta( $post_id, 'wssf_enable_feed', sanitize_text_field( $_POST['wssf_enable_feed'] ) );
    else
        update_post_meta( $post_id, 'wssf_enable_feed', false );

    if( isset( $_POST['wssf_results_per_feed'] ) )
        update_post_meta( $post_id, 'wssf_results_per_feed', sanitize_text_field( $_POST['wssf_results_per_feed'] ) );

    if( isset( $_POST['wssf_link_in_new_tab'] ) )
        update_post_meta( $post_id, 'wssf_link_in_new_tab', sanitize_text_field( $_POST['wssf_link_in_new_tab'] ) );

    if( isset( $_POST['wssf_enable_links_to_post'] ) )
        update_post_meta( $post_id, 'wssf_enable_links_to_post', sanitize_text_field( $_POST['wssf_enable_links_to_post'] ) );
    else
        update_post_meta( $post_id, 'wssf_enable_links_to_post', false );

    if( isset( $_POST['wssf_hide_text_content'] ) )
        update_post_meta( $post_id, 'wssf_hide_text_content', sanitize_text_field( $_POST['wssf_hide_text_content'] ) );
    else
        update_post_meta( $post_id, 'wssf_hide_text_content', false );

    if( isset( $_POST['wssf_bg_color'] ) )
        update_post_meta( $post_id, 'wssf_bg_color', sanitize_text_field( $_POST['wssf_bg_color'] ) );

    if( isset( $_POST['wssf_text_color'] ) )
        update_post_meta( $post_id, 'wssf_text_color', sanitize_text_field( $_POST['wssf_text_color'] ) );

    if( isset( $_POST['wssf_enable_post_date'] ) )
        update_post_meta( $post_id, 'wssf_enable_post_date', sanitize_text_field( $_POST['wssf_enable_post_date'] ) );
    else
        update_post_meta( $post_id, 'wssf_enable_post_date', false );


    if( isset( $_POST['wssf_enable_social_icon'] ) )
        update_post_meta( $post_id, 'wssf_enable_social_icon', sanitize_text_field( $_POST['wssf_enable_social_icon'] ) );
    else
        update_post_meta( $post_id, 'wssf_enable_social_icon', false );

    if( isset( $_POST['wssf_enable_display_picture'] ) )
        update_post_meta( $post_id, 'wssf_enable_display_picture', sanitize_text_field( $_POST['wssf_enable_display_picture'] ) );
    else
        update_post_meta( $post_id, 'wssf_enable_display_picture', false );

    if( isset( $_POST['wssf_feed_width'] ) )
        update_post_meta( $post_id, 'wssf_feed_width', sanitize_text_field( $_POST['wssf_feed_width'] ) );

    if( isset( $_POST['wssf_social_insta_enable'] ) )
        update_post_meta( $post_id, 'wssf_social_insta_enable', sanitize_text_field( $_POST['wssf_social_insta_enable'] ) );
    else
        update_post_meta( $post_id, 'wssf_social_insta_enable', false );

if( isset( $_POST['wssf_results_per_feed_insta'] ) )
        update_post_meta( $post_id, 'wssf_results_per_feed_insta', sanitize_text_field( $_POST['wssf_results_per_feed_insta'] ) );

    if( isset( $_POST['wssf_words_limit_insta'] ) )
        update_post_meta( $post_id, 'wssf_words_limit_insta', sanitize_text_field( $_POST['wssf_words_limit_insta'] ) );

    if( isset( $_POST['wssf_select_layout'] ) )
        update_post_meta( $post_id, 'wssf_select_layout', sanitize_text_field( $_POST['wssf_select_layout'] ) );

    if( isset( $_POST['wssf_select_gfont'] ) )
        update_post_meta( $post_id, 'wssf_select_gfont', sanitize_text_field( $_POST['wssf_select_gfont'] ) );

    if ( isseT( $_POST['wssf_instagram_token'] ) )
        update_post_meta( $post_id, 'wssf_instagram_token', sanitize_text_field( $_POST['wssf_instagram_token'] ) );



  }