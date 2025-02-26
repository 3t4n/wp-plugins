<?php

/**
 * METABOXES FOR BOOK SHOWCASE POST TYPE and SHORTCODES GENERATOR
 * Adds two boxes to the main column on the Book post type and a box to shortcode generator post type edit screens.
 */
function bs3d_add_meta_box() {
    // METABOXES FOR BOOK SHOWCASE
    add_meta_box( 'bs3d_main_content_meta', __( 'Book Content', BS3D_TEXTDOMAIN ), 'bs3d_main_content_meta_cb', 'bs3dbook', 'normal', 'high' );
    add_meta_box( 'bs3d_author_meta', __( 'Book Author', BS3D_TEXTDOMAIN ), 'bs3d_author_meta_cb', 'bs3dbook', 'normal' );
    add_meta_box( 'bs3d_front_cover_meta', __( 'Book Front Cover', BS3D_TEXTDOMAIN ), 'bs3d_front_cover_meta_cb', 'bs3dbook', 'normal' );
    add_meta_box( 'bs3d_back_cover_meta', __( 'Book Back Cover', BS3D_TEXTDOMAIN ), 'bs3d_back_cover_meta_cb', 'bs3dbook', 'normal' );
    add_meta_box( 'bs3d_back_cover_text', __( 'Text For Back Cover', BS3D_TEXTDOMAIN ), 'bs3d_back_cover_text_cb', 'bs3dbook', 'normal', 'high');
    add_meta_box( 'bs3d_show_book_author_meta', __( 'Options for the Current Book', BS3D_TEXTDOMAIN ), 'bs3d_show_book_author_meta_cb', 'bs3dbook' );
    // METABOXES FOR SHORTCODES
    add_meta_box( 'bs3d_sg_metabox', __( 'Shortcode Generator and Settings', BS3D_TEXTDOMAIN ), 'bs3d_sg_metabox_cb', 'bs3d_sgenerator', 'normal' );
}
add_action( 'add_meta_boxes', 'bs3d_add_meta_box' );


/**
 * Display main content on Book Showcase 3d book (bs3dbook) post type
 * @param $post
 */
function bs3d_main_content_meta_cb( $post ){

    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'bs3d_main_content_meta_save', 'bs3d_main_content_meta_nounce' );

    $bs3d_main_content = get_post_meta( $post->ID, 'bs3dmaincontent', true );



    //playing with media button and wp_editor
    $bs3d_editor_settings = [
        'media_buttons' => false,
        'textarea_rows' => 10,

    ];

    wp_editor($bs3d_main_content, "bs3dmaincontent", $bs3d_editor_settings);

    ?>




<?php }

/**
 * Display author meta on Book Showcase 3d book (bs3dbook) post type
 * @param $post
 */
function bs3d_author_meta_cb( $post ){

    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'bs3d_author_meta_save', 'bs3d_author_meta_nounce' );

    $bs3d_author_name = get_post_meta( $post->ID, 'bs3d_author_name', true );
    ?>

    <div class="bs3d-row">
        <div class="bs3d-th">
            <label for="bs3d_author_name"><?php _e('Book Author Name', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="bs3d-td">
            <input type="text" class="bs3d-text-input" name="bs3d_author_name" placeholder="eg. Bill Gates" id="bs3d_author_name" value="<?php echo (@$bs3d_author_name) ? $bs3d_author_name : ''; ?>">
        </div>
    </div>


<?php }


/**
 * Display metabox for uploading book front cover
 * @param $post
 */
function bs3d_front_cover_meta_cb($post) {
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'bs3d_front_cover_meta_save', 'bs3d_front_cover_meta_nounce' );

    $bs3d_front_cover = get_post_meta( $post->ID, 'bs3d_front_cover', true );

    ?>

    <div class="bs3d-row">
        <div class="bs3d-th">
            <label for="bs3d_front_cover"><?php _e('Book Front Cover Image', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="bs3d-td">
            <input type="text" class="bs3d-text-input" name="bs3d_front_cover" id="bs3d_front_cover" placeholder="You can paste an image URL here or click upload" value="<?php echo (@$bs3d_front_cover) ? $bs3d_front_cover : ''; ?>">
            <button type="button" class="button button-primary" id="bs3d_front_cover_upload"><?php _e('Upload Image', BS3D_TEXTDOMAIN); ?></button>
            <p>Best size : At least 307px width and at least 407px height.</p>
        </div>
    </div>

<?php }

/**
 * Display metabox for uploading book back cover
 * @param $post
 */
function bs3d_back_cover_meta_cb($post){
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'bs3d_back_cover_meta_save', 'bs3d_back_cover_meta_nounce' );

    $bs3d_back_cover = get_post_meta( $post->ID, 'bs3d_back_cover', true );

    ?>

    <div class="bs3d-row">
        <div class="bs3d-th">
            <label for="bs3d_back_cover"><?php _e('Book Back Cover Image', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="bs3d-td">
            <input type="text" class="bs3d-text-input" name="bs3d_back_cover" id="bs3d_back_cover" placeholder="You can paste an image URL here or click upload" value="<?php echo (@$bs3d_back_cover) ? $bs3d_back_cover : ''; ?>">
            <button type="button" class="button button-primary" id="bs3d_back_cover_upload"><?php _e('Upload Image', BS3D_TEXTDOMAIN); ?></button>
            <p>Best size : At least 307px width and at least 407px height. Small image will be repeated</p>
        </div>
    </div>

<?php }


/**
 * Display metabox for back cover text
 * @param $post
 */
function bs3d_back_cover_text_cb( $post ){

    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'bs3d_back_cover_text_save', 'bs3d_back_cover_text_nounce' );

    $bs3d_back_cover_text = get_post_meta( $post->ID, 'bs3dbackcovertext', true );

    //playing with media button and wp_editor
    $bs3d_editor_settings = [
        'media_buttons' => false,
        'textarea_rows' => 5,

        ];

    wp_editor($bs3d_back_cover_text, "bs3dbackcovertext", $bs3d_editor_settings);
    ?>


<?php }



/**
 * Display author meta and book name on cover
 * @param $post
 */
function bs3d_show_book_author_meta_cb( $post ) {
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'bs3d_show_book_author_meta_save', 'bs3d_show_book_author_meta_nounce' );
    //temp value
    $bs3d_show_author_book_on_cover_tmp = get_post_meta( $post->ID, 'bs3d_show_author_book_on_cover', true );
    $bs3d_show_text_on_back_cover_tmp = get_post_meta( $post->ID, 'bs3d_show_text_on_back_cover', true ) ;
    $bs3d_author_book_title_color_tmp = get_post_meta( $post->ID, 'bs3d_author_book_title_color', true ) ;
    $bs3d_book_author_font_size_tmp = get_post_meta( $post->ID, 'bs3d_book_author_font_size', true ) ;
    $bs3d_book_title_font_size_tmp = get_post_meta( $post->ID, 'bs3d_book_title_font_size', true ) ;
    $bs3d_download_btn_link_tmp = get_post_meta( $post->ID, 'bs3d_download_btn_link', true ) ;
    $bs3d_book_bg_color_tmp = get_post_meta( $post->ID, 'bs3d_book_bg_color', true ) ;
    $bs3d_book_cover_bg_color_tmp = get_post_meta( $post->ID, 'bs3d_book_cover_bg_color', true ) ;
    $bs3d_book_nav_bg_color_tmp = get_post_meta( $post->ID, 'bs3d_book_nav_bg_color', true ) ;
    $bs3d_book_nav_hover_color_tmp = get_post_meta( $post->ID, 'bs3d_book_nav_hover_color', true ) ;
    $bs3d_book_nav_color_tmp = get_post_meta( $post->ID, 'bs3d_book_nav_color', true ) ;
    $bs3d_download_btn_bg_color_tmp = get_post_meta( $post->ID, 'bs3d_download_btn_bg_color', true ) ;
    $bs3d_download_btn_hover_color_tmp = get_post_meta( $post->ID, 'bs3d_download_btn_hover_color', true ) ;
    $bs3d_download_btn_text_color_tmp = get_post_meta( $post->ID, 'bs3d_download_btn_text_color', true ) ;
    // sanitized value
    $bs3d_show_author_book_on_cover = (!empty($bs3d_show_author_book_on_cover_tmp)) ? $bs3d_show_author_book_on_cover_tmp : '';
    $bs3d_show_text_on_back_cover = (!empty($bs3d_show_text_on_back_cover_tmp)) ? $bs3d_show_text_on_back_cover_tmp : '';
    $bs3d_author_book_title_color = (!empty($bs3d_author_book_title_color_tmp)) ? $bs3d_author_book_title_color_tmp : '';
    $bs3d_book_author_font_size = (!empty($bs3d_book_author_font_size_tmp)) ? $bs3d_book_author_font_size_tmp : '';
    $bs3d_book_title_font_size = (!empty($bs3d_book_title_font_size_tmp)) ? $bs3d_book_title_font_size_tmp : '';
    $bs3d_download_btn_link = (!empty($bs3d_download_btn_link_tmp)) ? $bs3d_download_btn_link_tmp : '';
    $bs3d_book_bg_color = (!empty($bs3d_book_bg_color_tmp)) ? $bs3d_book_bg_color_tmp : '';
    $bs3d_book_cover_bg_color = (!empty($bs3d_book_cover_bg_color_tmp)) ? $bs3d_book_cover_bg_color_tmp : '';
    $bs3d_book_nav_bg_color = (!empty($bs3d_book_nav_bg_color_tmp)) ? $bs3d_book_nav_bg_color_tmp : '';
    $bs3d_book_nav_hover_color = (!empty($bs3d_book_nav_hover_color_tmp)) ? $bs3d_book_nav_hover_color_tmp : '';
    $bs3d_book_nav_color = (!empty($bs3d_book_nav_color_tmp)) ? $bs3d_book_nav_color_tmp : '';
    $bs3d_download_btn_bg_color = (!empty($bs3d_download_btn_bg_color_tmp)) ? $bs3d_download_btn_bg_color_tmp : '';
    $bs3d_download_btn_hover_color = (!empty($bs3d_download_btn_hover_color_tmp)) ? $bs3d_download_btn_hover_color_tmp : '';
    $bs3d_download_btn_text_color = (!empty($bs3d_download_btn_text_color_tmp)) ? $bs3d_download_btn_text_color_tmp : '';

    ?>

    <!--  UNIQUE OPTIONS for each book BIGINS. Later try to use tabs to separate options and styles into two tabs  -->



    <!-- Show author name and book tile on cover ??-->
    <div class="cmb-row cmb-type-radio">
        <div class="cmb-th">
            <label for="bs3d_ic"><?php _e('Show Author & Book Name on Front Cover ', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <ul class="cmb2-radio-list cmb2-list">
                <li><input type="radio" class="cmb2-option" name="bs3d_show_author_book_on_cover" id="bs3d_show_author_book_on_cover2" value="no" <?php if("no" == $bs3d_show_author_book_on_cover) {echo "checked"; } else { echo "checked" ; } ?>> <label for="bs3d_show_author_book_on_cover2"><?php _e('No', BS3D_TEXTDOMAIN); ?></label></li>
                <li><input type="radio" class="cmb2-option" name="bs3d_show_author_book_on_cover" id="bs3d_show_author_book_on_cover1" value="yes" <?php if("yes" == $bs3d_show_author_book_on_cover) {echo "checked"; } else { echo "" ; } ?>> <label for="bs3d_show_author_book_on_cover1"><?php _e('Yes', BS3D_TEXTDOMAIN); ?></label></li>
            </ul>
            <p class="bs3d-metabox-description"><?php _e('Set this option to "YES" if you do not upload picture for front cover', BS3D_TEXTDOMAIN); ?></p>
        </div>
    </div>




    <!--   show back cover text ? -->
    <div class="cmb-row cmb-type-radio">
        <div class="cmb-th">
            <label for="bs3d_ic"><?php _e('Show Back Cover Text ', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <ul class="cmb2-radio-list cmb2-list">
                <li><input type="radio" class="cmb2-option" name="bs3d_show_text_on_back_cover" id="bs3d_show_text_on_back_cover2" value="no" <?php if("no" == $bs3d_show_text_on_back_cover) {echo "checked"; } else { echo "checked" ; } ?>> <label for="bs3d_show_text_on_back_cover2"><?php _e('No', BS3D_TEXTDOMAIN); ?></label></li>
                <li><input type="radio" class="cmb2-option" name="bs3d_show_text_on_back_cover" id="bs3d_show_text_on_back_cover1" value="yes" <?php if("yes" == $bs3d_show_text_on_back_cover) {echo "checked"; } else { echo "" ; } ?>> <label for="bs3d_show_text_on_back_cover1"><?php _e('Yes', BS3D_TEXTDOMAIN); ?></label></li>
            </ul>
            <p class="bs3d-metabox-description"><?php _e('Set this option to "YES" if you do not upload picture for back cover', BS3D_TEXTDOMAIN); ?></p>
        </div>
    </div>





    <!-- Upgrade to PRO Notice -->

    <div class="cmb-row cmb-type-text-medium bs3d-edit-text">
        <div class="bs3d-upgrade-notice"> The Following Options are available in <a href="http://adlplugins.com/plugin/book-showcase-pro" target="_blank" title="Upgrade to pro">Pro Version</a> only. Upgrade to <a href="http://adlplugins.com/plugin/book-showcase-pro" target="_blank" title="Upgrade to pro">Pro Version</a> for more features and for supporting us.</div>
    </div>

    <!-- book Author Font size-->
    <div class="cmb-row cmb-type-text-medium bs3d-edit-text bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_book_author_font_size"><?php _e('Author Name Font Size on Front Cover', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-medium" placeholder="eg. 14px" name="bs3d_book_author_font_size" id="bs3d_book_author_font_size" value="<?php if(!empty($bs3d_book_author_font_size)) { echo $bs3d_book_author_font_size; } else { echo "13px"; } ?>">
        </div>
    </div>
    <!-- book title Font size-->
    <div class="cmb-row cmb-type-text-medium bs3d-edit-text bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_book_title_font_size"><?php _e('Book Title Font Size on Front Cover', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-medium" placeholder="eg. 14px" name="bs3d_book_title_font_size" id="bs3d_book_title_font_size" value="<?php if(!empty($bs3d_book_title_font_size)) { echo $bs3d_book_title_font_size; } else { echo "20px"; } ?>">
        </div>
    </div>

    <!-- book Download Link-->
    <div class="cmb-row cmb-type-text-medium bs3d-edit-text bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_download_btn_link"><?php _e('Book Download Link', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-medium" name="bs3d_download_btn_link" placeholder="eg. http://www.example.com" id="bs3d_download_btn_link" value="<?php if(!empty($bs3d_download_btn_link)) { echo $bs3d_download_btn_link; } else { echo ""; } ?>">
        </div>
    </div>



    <!-- STYLE FOR UNIQUE BOOK BIGINS -->

    <!--book Author info color-->
    <div class="cmb-row cmb-type-colorpicker bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_author_book_title_color"><?php _e('Author and Book Title Color', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-small" name="bs3d_author_book_title_color" id="bs3d_author_book_title_color" value="<?php if(!empty($bs3d_author_book_title_color)) { echo $bs3d_author_book_title_color; } else { echo "#fff"; } ?>">
        </div>

    </div>


    <!--book content/text background color-->
    <div class="cmb-row cmb-type-colorpicker bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_book_bg_color"><?php _e('Book Inside Content Background Color', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-small" name="bs3d_book_bg_color" id="bs3d_book_bg_color" value="<?php if(!empty($bs3d_book_bg_color)) { echo $bs3d_book_bg_color; } else { echo "#fff"; } ?>">
        </div>
    </div>
    <!--book cover background color-->
    <div class="cmb-row cmb-type-colorpicker bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_book_cover_bg_color"><?php _e('Book Cover Background Color', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-small" name="bs3d_book_cover_bg_color" id="bs3d_book_cover_bg_color" value="<?php if(!empty($bs3d_book_cover_bg_color)) { echo $bs3d_book_cover_bg_color; } else { echo "#bbbbbb"; } ?>">
        </div>
    </div>




    <!-- Book content Navigation BG color-->
    <div class="cmb-row cmb-type-colorpicker bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_book_nav_bg_color"><?php _e('Content Navigation Background Color', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-small" name="bs3d_book_nav_bg_color" id="bs3d_book_nav_bg_color" value="<?php if(!empty($bs3d_book_nav_bg_color)) { echo $bs3d_book_nav_bg_color; } else { echo "#bbbbbb"; } ?>">
        </div>
    </div>
    <!-- Book content Navigation Hover color-->
    <div class="cmb-row cmb-type-colorpicker bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_book_nav_hover_color"><?php _e('Content Navigation Hover Color', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-small" name="bs3d_book_nav_hover_color" id="bs3d_book_nav_hover_color" value="<?php if(!empty($bs3d_book_nav_hover_color)) { echo $bs3d_book_nav_hover_color; } else { echo "#9A9A9A"; } ?>">
        </div>
    </div>

    <!-- Book content Navigation ARRAY color-->
    <div class="cmb-row cmb-type-colorpicker bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_book_nav_color"><?php _e('Content Navigation Arrows Color', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-small" name="bs3d_book_nav_color" id="bs3d_book_nav_color" value="<?php if(!empty($bs3d_book_nav_color)) { echo $bs3d_book_nav_color; } else { echo "#fff"; } ?>">
        </div>
    </div>

    <!-- Book Download button BG-->
    <div class="cmb-row cmb-type-colorpicker bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_download_btn_bg_color"><?php _e('Download Button Background Color', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-small" name="bs3d_download_btn_bg_color" id="bs3d_download_btn_bg_color" value="<?php if(!empty($bs3d_download_btn_bg_color)) { echo $bs3d_download_btn_bg_color; } else { echo "#bbbbbb"; } ?>">
        </div>
    </div>

    <!-- Book Download button BG HOVER -->
    <div class="cmb-row cmb-type-colorpicker bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_download_btn_hover_color"><?php _e('Download Button Hover Color', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-small" name="bs3d_download_btn_hover_color" id="bs3d_download_btn_hover_color" value="<?php if(!empty($bs3d_download_btn_hover_color)) { echo $bs3d_download_btn_hover_color; } else { echo "#9A9A9A"; } ?>">
        </div>
    </div>

    <!-- Book Download button text color-->
    <div class="cmb-row cmb-type-colorpicker bs3d-disabled">
        <div class="cmb-th">
            <label for="bs3d_download_btn_text_color"><?php _e('Download Button Text Color', BS3D_TEXTDOMAIN); ?></label>
        </div>
        <div class="cmb-td">
            <input disabled type="text" class="cmb2-text-small" name="bs3d_download_btn_text_color" id="bs3d_download_btn_text_color" value="<?php if(!empty($bs3d_download_btn_text_color)) { echo $bs3d_download_btn_text_color; } else { echo "#fff"; } ?>">
        </div>
    </div>





<?php }










/**
 * Display metabox for shortcode generator post type
 * @param $post
 */
function bs3d_sg_metabox_cb( $post ){
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'bs3d_sg_metabox_save', 'bs3d_sg_metabox_nounce' );
    // markup
    include_once('bs3d-shortcode-metabox.php');
    ?>


<?php }


