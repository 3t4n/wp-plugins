<?php

/**
 * When the bs3dbook post is saved, saves our custom data.
 */


/**
 * Save Author Name Meta
 *
 * @param int $post_id The ID of the post being saved.
 */
function bs3d_author_meta_save( $post_id ) {

    // Verify that the nonce is set and valid.
    if ( (! isset( $_POST['bs3d_author_meta_nounce'] )) || (! wp_verify_nonce( $_POST['bs3d_author_meta_nounce'], 'bs3d_author_meta_save' )) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post_id )) return;
    $bs3d_author_name_value = (isset($_POST["bs3d_author_name"])) ? sanitize_text_field( $_POST["bs3d_author_name"]) : '';

    update_post_meta($post_id, "bs3d_author_name", $bs3d_author_name_value);
}
// save meta data only when book show case custom post type is saved.
add_action( 'save_post_bs3dbook', 'bs3d_author_meta_save' );

/**
 * Save Front Cover image Meta
 *
 * @param int $post_id The ID of the post being saved.
 */
function bs3d_front_cover_meta_save( $post_id ) {

    // Verify that the nonce is set and valid.
    if ( (! isset( $_POST['bs3d_front_cover_meta_nounce'] )) || (! wp_verify_nonce( $_POST['bs3d_front_cover_meta_nounce'], 'bs3d_front_cover_meta_save' )) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post_id )) return;
    $bs3d_front_cover_value = (isset($_POST["bs3d_front_cover"])) ? esc_url_raw( $_POST["bs3d_front_cover"] ) : '';

    update_post_meta($post_id, "bs3d_front_cover", $bs3d_front_cover_value);
}
// save meta data only when book show case custom post type is saved.
add_action( 'save_post_bs3dbook', 'bs3d_front_cover_meta_save' );

/**
 * Save Back Cover image Meta
 *
 * @param int $post_id The ID of the post being saved.
 */
function bs3d_back_cover_meta_save( $post_id ) {

    // Verify that the nonce is set and valid.
    if ( (! isset( $_POST['bs3d_back_cover_meta_nounce'] )) || (! wp_verify_nonce( $_POST['bs3d_back_cover_meta_nounce'], 'bs3d_back_cover_meta_save' )) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post_id )) return;
    $bs3d_back_cover_value = (isset($_POST["bs3d_back_cover"])) ? esc_url_raw( $_POST["bs3d_back_cover"] ) : '';

    update_post_meta($post_id, "bs3d_back_cover", $bs3d_back_cover_value);
}
// save meta data only when book show case custom post type is saved.
add_action( 'save_post_bs3dbook', 'bs3d_back_cover_meta_save' );


/* Save Book Main Content meta */
function bs3d_main_content_meta_save( $post_id ) {

    // Verify that the nonce is set and valid.
    if ( (! isset( $_POST['bs3d_main_content_meta_nounce'] )) || (! wp_verify_nonce( $_POST['bs3d_main_content_meta_nounce'], 'bs3d_main_content_meta_save' )) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post_id )) return;
    $bs3d_back_cover_text_value = (isset($_POST["bs3dmaincontent"])) ?$_POST["bs3dmaincontent"] : '';

    update_post_meta($post_id, "bs3dmaincontent", $bs3d_back_cover_text_value);
}
// save meta data only when book show case custom post type is saved.
add_action( 'save_post_bs3dbook', 'bs3d_main_content_meta_save' );

/* Save back cover text meta */
function bs3d_back_cover_text_save( $post_id ) {

    // Verify that the nonce is set and valid.
    if ( (! isset( $_POST['bs3d_back_cover_text_nounce'] )) || (! wp_verify_nonce( $_POST['bs3d_back_cover_text_nounce'], 'bs3d_back_cover_text_save' )) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post_id )) return;
    $bs3d_back_cover_text_value = (isset($_POST["bs3dbackcovertext"])) ?$_POST["bs3dbackcovertext"] : '';

    update_post_meta($post_id, "bs3dbackcovertext", $bs3d_back_cover_text_value);
}
// save meta data only when book show case custom post type is saved.
add_action( 'save_post_bs3dbook', 'bs3d_back_cover_text_save' );


/**
 * Save all unique options and style for each book
 * @param $post_id The current post id
 */
function bs3d_options_metas( $post_id ) {
    // Verify that the nonce is set and valid.
    if ( (! isset( $_POST['bs3d_show_book_author_meta_nounce'] )) || (! wp_verify_nonce( $_POST['bs3d_show_book_author_meta_nounce'], 'bs3d_show_book_author_meta_save' )) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // get the value for book options
    $bs3d_show_author_book_on_cover = (isset($_POST["bs3d_show_author_book_on_cover"])) ? sanitize_text_field($_POST["bs3d_show_author_book_on_cover"]) : '';
    $bs3d_show_text_on_back_cover = (isset($_POST["bs3d_show_text_on_back_cover"])) ? sanitize_text_field($_POST["bs3d_show_text_on_back_cover"]) : '';
    $bs3d_author_book_title_color = (isset($_POST["bs3d_author_book_title_color"])) ? sanitize_text_field($_POST["bs3d_author_book_title_color"]) : '';
    $bs3d_book_author_font_size = (isset($_POST["bs3d_book_author_font_size"])) ? sanitize_text_field($_POST["bs3d_book_author_font_size"]) : '';
    $bs3d_book_title_font_size = (isset($_POST["bs3d_book_title_font_size"])) ? sanitize_text_field($_POST["bs3d_book_title_font_size"]) : '';
    $bs3d_download_btn_link = (isset($_POST["bs3d_download_btn_link"])) ? esc_url_raw($_POST["bs3d_download_btn_link"]) : '';
    $bs3d_book_bg_color = (isset($_POST["bs3d_book_bg_color"])) ? sanitize_text_field($_POST["bs3d_book_bg_color"]) : '';
    $bs3d_book_cover_bg_color = (isset($_POST["bs3d_book_cover_bg_color"])) ? sanitize_text_field($_POST["bs3d_book_cover_bg_color"]) : '';
    $bs3d_book_nav_bg_color = (isset($_POST['bs3d_book_nav_bg_color']))? sanitize_text_field( $_POST["bs3d_book_nav_bg_color"] ): '';
    $bs3d_book_nav_hover_color = (isset($_POST['bs3d_book_nav_hover_color'])) ? sanitize_text_field( $_POST["bs3d_book_nav_hover_color"] ): '';
    $bs3d_book_nav_color = (isset($_POST['bs3d_book_nav_color'])) ? sanitize_text_field( $_POST["bs3d_book_nav_color"] ): '';
    $bs3d_download_btn_bg_color = (isset($_POST['bs3d_download_btn_bg_color'])) ? sanitize_text_field( $_POST["bs3d_download_btn_bg_color"] ): '';
    $bs3d_download_btn_hover_color = (isset($_POST['bs3d_download_btn_hover_color'])) ? sanitize_text_field( $_POST["bs3d_download_btn_hover_color"] ): '';
    $bs3d_download_btn_text_color = (isset($_POST['bs3d_download_btn_text_color'])) ? sanitize_text_field( $_POST["bs3d_download_btn_text_color"] ): '';


    // save the value for book options
    update_post_meta($post_id, "bs3d_show_author_book_on_cover", $bs3d_show_author_book_on_cover);
    update_post_meta($post_id, "bs3d_show_text_on_back_cover", $bs3d_show_text_on_back_cover);
    update_post_meta($post_id, "bs3d_author_book_title_color", $bs3d_author_book_title_color);
    update_post_meta($post_id, "bs3d_book_author_font_size", $bs3d_book_author_font_size);
    update_post_meta($post_id, "bs3d_book_title_font_size", $bs3d_book_title_font_size);
    update_post_meta($post_id, "bs3d_download_btn_link", $bs3d_download_btn_link);
    update_post_meta($post_id, "bs3d_book_bg_color", $bs3d_book_bg_color);
    update_post_meta($post_id, "bs3d_book_cover_bg_color", $bs3d_book_cover_bg_color);
    update_post_meta($post_id, "bs3d_book_nav_bg_color", $bs3d_book_nav_bg_color);
    update_post_meta($post_id, "bs3d_book_nav_hover_color", $bs3d_book_nav_hover_color);
    update_post_meta($post_id, "bs3d_book_nav_color", $bs3d_book_nav_color);
    update_post_meta($post_id, "bs3d_download_btn_bg_color", $bs3d_download_btn_bg_color);
    update_post_meta($post_id, "bs3d_download_btn_hover_color", $bs3d_download_btn_hover_color);
    update_post_meta($post_id, "bs3d_download_btn_text_color", $bs3d_download_btn_text_color);

}

add_action( 'save_post_bs3dbook', 'bs3d_options_metas' );









/**
 * Save All meta for shortcodes
 * @param int $post_id The id of current post being saved
 */
function bs3d_sg_metabox_save( $post_id ){

    // Verify that the nonce is set and valid.
    if ( (! isset( $_POST['bs3d_sg_metabox_nounce'] )) || (! wp_verify_nonce( $_POST['bs3d_sg_metabox_nounce'], 'bs3d_sg_metabox_save' )) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post_id )) return;

    // save all meta data for shortcode generator here.
    // prepare all values

    // GENERAL SETTINGS
    $bs3d_book_query_type = (isset($_POST['bs3d_book_query_type']))? sanitize_text_field( $_POST["bs3d_book_query_type"] ): '';
    $bs3d_category_terms = (isset($_POST['bs3d_category_terms']))? stripslashes_deep( $_POST["bs3d_category_terms"]): '';
    $bs3d_book_by_id = (isset($_POST['bs3d_book_by_id']))? sanitize_text_field( $_POST["bs3d_book_by_id"] ): '';
    $bs3d_book_by_author = (isset($_POST['bs3d_book_by_author']))? sanitize_text_field( $_POST["bs3d_book_by_author"] ): '';
    $bs3d_book_from_year = (isset($_POST['bs3d_book_from_year']))? sanitize_text_field( $_POST["bs3d_book_from_year"] ): '';
    $bs3d_book_from_month = (isset($_POST['bs3d_book_from_month']))? sanitize_text_field( $_POST["bs3d_book_from_month"] ): '';
    $bs3d_book_from_month_year = (isset($_POST['bs3d_book_from_month_year']))? sanitize_text_field( $_POST["bs3d_book_from_month_year"] ): '';
    $bs3d_chars_per_page = (isset($_POST['bs3d_chars_per_page']))? sanitize_text_field( $_POST["bs3d_chars_per_page"] ): '';
    $bs3d_book_per_page = (isset($_POST['bs3d_book_per_page']))? sanitize_text_field( $_POST["bs3d_book_per_page"] ): '';
    $bs3d_show_pagination = (isset($_POST['bs3d_show_pagination']))? sanitize_text_field( $_POST["bs3d_show_pagination"] ): '';
    $bs3d_image_crop = (isset($_POST['bs3d_image_crop']))? sanitize_text_field( $_POST["bs3d_image_crop"] ): '';
    $bs3d_image_width = (isset($_POST['bs3d_image_width']))? sanitize_text_field( $_POST["bs3d_image_width"] ): '';
    $bs3d_image_height = (isset($_POST['bs3d_image_height']))? sanitize_text_field( $_POST["bs3d_image_height"] ): '';
   // STYLE SETTINGS
    $bs3d_book_button_color = (isset($_POST['bs3d_book_button_color']))? sanitize_text_field( $_POST["bs3d_book_button_color"] ): '';
    $bs3d_book_button_bg_color = (isset($_POST['bs3d_book_button_bg_color']))? sanitize_text_field( $_POST["bs3d_book_button_bg_color"] ): '';
    $bs3d_book_button_color_hover = (isset($_POST['bs3d_book_button_color_hover']))? sanitize_text_field( $_POST["bs3d_book_button_color_hover"] ): '';
    $bs3d_page_nav_bg_color = (isset($_POST['bs3d_page_nav_bg_color']))? sanitize_text_field( $_POST["bs3d_page_nav_bg_color"] ): '';
    $bs3d_page_nav_hover_color = (isset($_POST['bs3d_page_nav_hover_color']))? sanitize_text_field( $_POST["bs3d_page_nav_hover_color"] ): '';
    $bs3d_page_nav_color = (isset($_POST['bs3d_page_nav_color']))? sanitize_text_field( $_POST["bs3d_page_nav_color"] ): '';

    // save or update the meta data
    update_post_meta($post_id, "bs3d_book_query_type", $bs3d_book_query_type);
    update_post_meta($post_id, "bs3d_category_terms", $bs3d_category_terms);
    update_post_meta($post_id, "bs3d_book_by_id", $bs3d_book_by_id);
    update_post_meta($post_id, "bs3d_book_by_author", $bs3d_book_by_author);
    update_post_meta($post_id, "bs3d_book_from_year", $bs3d_book_from_year);
    update_post_meta($post_id, "bs3d_book_from_month", $bs3d_book_from_month);
    update_post_meta($post_id, "bs3d_book_from_month_year", $bs3d_book_from_month_year);
    update_post_meta($post_id, "bs3d_chars_per_page", $bs3d_chars_per_page);
    update_post_meta($post_id, "bs3d_book_per_page", $bs3d_book_per_page);
    update_post_meta($post_id, "bs3d_show_pagination", $bs3d_show_pagination);
    update_post_meta($post_id, "bs3d_image_crop", $bs3d_image_crop);
    update_post_meta($post_id, "bs3d_image_width", $bs3d_image_width);
    update_post_meta($post_id, "bs3d_image_height", $bs3d_image_height);
    update_post_meta($post_id, "bs3d_book_button_color", $bs3d_book_button_color);
    update_post_meta($post_id, "bs3d_book_button_bg_color", $bs3d_book_button_bg_color);
    update_post_meta($post_id, "bs3d_book_button_color_hover", $bs3d_book_button_color_hover);
    update_post_meta($post_id, "bs3d_page_nav_bg_color", $bs3d_page_nav_bg_color);
    update_post_meta($post_id, "bs3d_page_nav_hover_color", $bs3d_page_nav_hover_color);
    update_post_meta($post_id, "bs3d_page_nav_color", $bs3d_page_nav_color);





}

// save meta data only when Books Shortcode Generator custom post type is saved.
add_action( 'save_post_bs3d_sgenerator', 'bs3d_sg_metabox_save' );





