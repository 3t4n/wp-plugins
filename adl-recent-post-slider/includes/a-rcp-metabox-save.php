<?php

/**
 * Save meta values of the adl post slider when adl_rec_post type is saved
 * @param object $post_id Current post being saved
 */
function adl_rec_post_meta_save( $post_id, $post ) {
    // the following line is needed because we will hook into edit_post hook, so that we can set default value of checkbox.
    if ($post->post_type != 'adl_rec_post') {return;}
    // Perform checking for before saving
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['adl_rec_post_meta_save_nounce']) && wp_verify_nonce( $_POST['adl_rec_post_meta_save_nounce'], 'adl_rec_post_meta_save' )? 'true': 'false');

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post_id )) return;


    // get all data to save
    // General Settings
    $adl_rec_post_display_header = (isset($_POST['adl_rec_post_display_header']))? sanitize_text_field( $_POST["adl_rec_post_display_header"] ): 'no';
    $adl_rec_post_display_navigation_arrows = (isset($_POST['adl_rec_post_display_navigation_arrows']))? sanitize_text_field( $_POST["adl_rec_post_display_navigation_arrows"] ): 'no';
    $adl_rec_post_title = (isset($_POST['adl_rec_post_title']))? sanitize_text_field( $_POST["adl_rec_post_title"] ): '';
    $adl_rec_post_total_posts = (isset($_POST['adl_rec_post_total_posts']))? sanitize_text_field( $_POST["adl_rec_post_total_posts"] ): 0 ;
    $adl_rec_post_select_theme = (isset($_POST['adl_rec_post_select_theme']))? sanitize_text_field( $_POST["adl_rec_post_select_theme"] ): 0 ;
    $adl_rec_post_posts_type = (isset($_POST['adl_rec_post_posts_type']))? sanitize_text_field( $_POST["adl_rec_post_posts_type"] ): 0 ;
    
    $adl_rec_post_display_placeholder_img = (isset($_POST['adl_rec_post_display_placeholder_img']))? sanitize_text_field( $_POST["adl_rec_post_display_placeholder_img"] ): 'no' ;
    $adl_rec_post_default_feat_img = (isset($_POST['adl_rec_post_default_feat_img']))? esc_url_raw( $_POST["adl_rec_post_default_feat_img"] ): '' ;
    $adl_rec_post_display_img = (isset($_POST['adl_rec_post_display_img']))? sanitize_text_field( $_POST["adl_rec_post_display_img"] ): 'no' ;
    $adl_rec_post_image_crop = (isset($_POST['adl_rec_post_image_crop']))? sanitize_text_field( $_POST["adl_rec_post_image_crop"] ): 'no' ;
    $adl_rec_post_crop_image_width = (isset($_POST['adl_rec_post_crop_image_width']))? sanitize_text_field( $_POST["adl_rec_post_crop_image_width"] ): 0 ;
    $adl_rec_post_crop_image_height = (isset($_POST['adl_rec_post_crop_image_height']))? sanitize_text_field( $_POST["adl_rec_post_crop_image_height"] ): 0 ;
    $adl_rec_post_display_post_title = (isset($_POST['adl_rec_post_display_post_title']))? sanitize_text_field( $_POST["adl_rec_post_display_post_title"] ): 'no' ;
    $adl_rec_post_display_post_date = (isset($_POST['adl_rec_post_display_post_date']))? sanitize_text_field( $_POST["adl_rec_post_display_post_date"] ): 'no' ;
    $adl_rec_post_display_excerpt = (isset($_POST['adl_rec_post_display_excerpt']))? sanitize_text_field( $_POST["adl_rec_post_display_excerpt"] ): 'no' ;
    $adl_rec_post_excerpt_length = (isset($_POST['adl_rec_post_excerpt_length']))? sanitize_text_field( $_POST["adl_rec_post_excerpt_length"] ): 0 ;
    // Slider Settings

    $adl_rec_post_auto_play = (isset($_POST['adl_rec_post_auto_play']))? sanitize_text_field( $_POST["adl_rec_post_auto_play"] ): 'no' ;
    $adl_rec_post_stop_on_hover = (isset($_POST['adl_rec_post_stop_on_hover']))? sanitize_text_field( $_POST["adl_rec_post_stop_on_hover"] ): 'no' ;
    $adl_rec_post_slide_speed = (isset($_POST['adl_rec_post_slide_speed']))? sanitize_text_field( $_POST["adl_rec_post_slide_speed"] ): 0 ;
    $adl_rec_post_item_on_desktop = (isset($_POST['adl_rec_post_item_on_desktop']))? sanitize_text_field( $_POST["adl_rec_post_item_on_desktop"] ): 0 ;
    $adl_rec_post_item_on_tablet = (isset($_POST['adl_rec_post_item_on_tablet']))? sanitize_text_field( $_POST["adl_rec_post_item_on_tablet"] ): 0 ;
    $adl_rec_post_item_on_mobile = (isset($_POST['adl_rec_post_item_on_mobile']))? sanitize_text_field( $_POST["adl_rec_post_item_on_mobile"] ): 0 ;
    $adl_rec_post_pagination = (isset($_POST['adl_rec_post_pagination']))? sanitize_text_field( $_POST["adl_rec_post_pagination"] ): 'no' ;

    $adl_rec_post_header_title_font_size = (isset($_POST['adl_rec_post_header_title_font_size']))? sanitize_text_field( $_POST["adl_rec_post_header_title_font_size"] ): '' ;
    $adl_rec_post_header_title_font_color = (isset($_POST['adl_rec_post_header_title_font_color']))? sanitize_text_field( $_POST["adl_rec_post_header_title_font_color"] ): '' ;
    $adl_rec_post_nav_arrow_color = (isset($_POST['adl_rec_post_nav_arrow_color']))? sanitize_text_field( $_POST["adl_rec_post_nav_arrow_color"] ): '' ;
    $adl_rec_post_nav_arrow_bg_color = (isset($_POST['adl_rec_post_nav_arrow_bg_color']))? sanitize_text_field( $_POST["adl_rec_post_nav_arrow_bg_color"] ): '' ;
    $adl_rec_post_nav_arrow_hover_color = (isset($_POST['adl_rec_post_nav_arrow_hover_color']))? sanitize_text_field( $_POST["adl_rec_post_nav_arrow_hover_color"] ): '' ;
    $adl_rec_post_nav_arrow_bg_hover_color = (isset($_POST['adl_rec_post_nav_arrow_bg_hover_color']))? sanitize_text_field( $_POST["adl_rec_post_nav_arrow_bg_hover_color"] ): '' ;
    $adl_rec_post_border_color = (isset($_POST['adl_rec_post_border_color']))? sanitize_text_field( $_POST["adl_rec_post_border_color"] ): '' ;
    $adl_rec_post_border_hover_color = (isset($_POST['adl_rec_post_border_hover_color']))? sanitize_text_field( $_POST["adl_rec_post_border_hover_color"] ): '' ;
    $adl_rec_post_title_font_size = (isset($_POST['adl_rec_post_title_font_size']))? sanitize_text_field( $_POST["adl_rec_post_title_font_size"] ): '' ;
    $adl_rec_post_title_font_color = (isset($_POST['adl_rec_post_title_font_color']))? sanitize_text_field( $_POST["adl_rec_post_title_font_color"] ): '' ;
    $adl_rec_post_title_hover_font_color = (isset($_POST['adl_rec_post_title_hover_font_color']))? sanitize_text_field( $_POST["adl_rec_post_title_hover_font_color"] ): '' ;






    // Save Meta data to the db
    //General Settings
    update_post_meta($post_id, "adl_rec_post_display_header", $adl_rec_post_display_header);
    update_post_meta($post_id, "adl_rec_post_display_navigation_arrows", $adl_rec_post_display_navigation_arrows);
    update_post_meta($post_id, "adl_rec_post_title", $adl_rec_post_title);
    update_post_meta($post_id, "adl_rec_post_total_posts", $adl_rec_post_total_posts);

    update_post_meta($post_id, "adl_rec_post_select_theme", $adl_rec_post_select_theme);
    update_post_meta($post_id, "adl_rec_post_posts_type", $adl_rec_post_posts_type);



    update_post_meta($post_id, "adl_rec_post_image_crop", $adl_rec_post_image_crop);
    update_post_meta($post_id, "adl_rec_post_crop_image_width", $adl_rec_post_crop_image_width);
    update_post_meta($post_id, "adl_rec_post_crop_image_height", $adl_rec_post_crop_image_height);
    update_post_meta($post_id, "adl_rec_post_display_post_title", $adl_rec_post_display_post_title);
    update_post_meta($post_id, "adl_rec_post_display_post_date", $adl_rec_post_display_post_date);
    update_post_meta($post_id, "adl_rec_post_display_excerpt", $adl_rec_post_display_excerpt);
    update_post_meta($post_id, "adl_rec_post_excerpt_length", $adl_rec_post_excerpt_length);

    // Slider Settings
    //update_post_meta($post_id, "adl_rec_post_auto_play", $adl_rec_post_auto_play);
    //update_post_meta($post_id, "adl_rec_post_stop_on_hover", $adl_rec_post_stop_on_hover);
    //update_post_meta($post_id, "adl_rec_post_slide_speed", $adl_rec_post_slide_speed);
    //update_post_meta($post_id, "adl_rec_post_item_on_desktop", $adl_rec_post_item_on_desktop);
    //update_post_meta($post_id, "adl_rec_post_item_on_tablet", $adl_rec_post_item_on_tablet);
    //update_post_meta($post_id, "adl_rec_post_item_on_mobile", $adl_rec_post_item_on_mobile);
    //update_post_meta($post_id, "adl_rec_post_pagination", $adl_rec_post_pagination);

    update_post_meta($post_id, "adl_rec_post_display_placeholder_img", $adl_rec_post_display_placeholder_img);
    update_post_meta($post_id, "adl_rec_post_default_feat_img", $adl_rec_post_default_feat_img);
    update_post_meta($post_id, "adl_rec_post_display_img", $adl_rec_post_display_img);
    update_post_meta($post_id, "adl_rec_post_header_title_font_size", $adl_rec_post_header_title_font_size);
    //update_post_meta($post_id, "adl_rec_post_header_title_font_color", $adl_rec_post_header_title_font_color);
    //update_post_meta($post_id, "adl_rec_post_nav_arrow_color", $adl_rec_post_nav_arrow_color);
    //update_post_meta($post_id, "adl_rec_post_nav_arrow_bg_color", $adl_rec_post_nav_arrow_bg_color);
    //update_post_meta($post_id, "adl_rec_post_nav_arrow_hover_color", $adl_rec_post_nav_arrow_hover_color);
    //update_post_meta($post_id, "adl_rec_post_nav_arrow_bg_hover_color", $adl_rec_post_nav_arrow_bg_hover_color);
    //update_post_meta($post_id, "adl_rec_post_border_color", $adl_rec_post_border_color);
    //update_post_meta($post_id, "adl_rec_post_border_hover_color", $adl_rec_post_border_hover_color);
    //update_post_meta($post_id, "adl_rec_post_title_font_size", $adl_rec_post_title_font_size);
    //update_post_meta($post_id, "adl_rec_post_title_font_color", $adl_rec_post_title_font_color);
    //update_post_meta($post_id, "adl_rec_post_title_hover_font_color", $adl_rec_post_title_hover_font_color);




}

// save only when adl post slider post is saved
//add_action( 'save_post_adl_rec_post', 'adl_rec_post_meta_save');
// using edit_post hook so that update function does not run when post is created. so that we can set default value of checkbox easily.
add_action( 'edit_post', 'adl_rec_post_meta_save', 10, 2);