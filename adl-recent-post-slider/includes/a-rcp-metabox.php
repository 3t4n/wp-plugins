<?php

/**
 * Adds a box to the ADL Post Slider post type edit screens.
 */
function adl_rec_post_add_meta_box() {
    add_meta_box(
        'adl_rec_post_metabox',
        __( 'Slider Settings & Shortcode Generator', A_RCP_TEXTDOMAIN ),
        'adl_rec_post_metabox_cb',
        'adl_rec_post',
        'normal'
    );
}
add_action( 'add_meta_boxes', 'adl_rec_post_add_meta_box' );


/**
 * Display metabox content
 * @param Object $post | The current post object.
 */
function adl_rec_post_metabox_cb( $post ) {


    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'adl_rec_post_meta_save', 'adl_rec_post_meta_save_nounce' );

    // temp vars
    $adl_rec_post_display_header = get_post_meta( $post->ID, 'adl_rec_post_display_header', true );
    $adl_rec_post_select_theme = get_post_meta( $post->ID, 'adl_rec_post_select_theme', true );
    $adl_rec_post_display_navigation_arrows = get_post_meta( $post->ID, 'adl_rec_post_display_navigation_arrows', true );
    $adl_rec_post_title = get_post_meta( $post->ID, 'adl_rec_post_title', true );
    $adl_rec_post_total_posts = get_post_meta( $post->ID, 'adl_rec_post_total_posts', true );
    //query type
    $adl_rec_post_posts_type = get_post_meta( $post->ID, 'adl_rec_post_posts_type', true );


    $adl_rec_post_display_placeholder_img = get_post_meta( $post->ID, 'adl_rec_post_display_placeholder_img', true );
    $adl_rec_post_default_feat_img = get_post_meta( $post->ID, 'adl_rec_post_default_feat_img', true );
    $adl_rec_post_display_img = get_post_meta( $post->ID, 'adl_rec_post_display_img', true );


    $adl_rec_post_image_crop = get_post_meta( $post->ID, 'adl_rec_post_image_crop', true );
    $adl_rec_post_crop_image_width = get_post_meta( $post->ID, 'adl_rec_post_crop_image_width', true );
    $adl_rec_post_crop_image_height = get_post_meta( $post->ID, 'adl_rec_post_crop_image_height', true );
    $adl_rec_post_display_post_title = get_post_meta( $post->ID, 'adl_rec_post_display_post_title', true );
    $adl_rec_post_display_post_date = get_post_meta( $post->ID, 'adl_rec_post_display_post_date', true );

    $adl_rec_post_display_excerpt = get_post_meta( $post->ID, 'adl_rec_post_display_excerpt', true );
    $adl_rec_post_excerpt_length = get_post_meta( $post->ID, 'adl_rec_post_excerpt_length', true );

    $adl_rec_post_auto_play = get_post_meta( $post->ID, 'adl_rec_post_auto_play', true );
    $adl_rec_post_stop_on_hover = get_post_meta( $post->ID, 'adl_rec_post_stop_on_hover', true );
    $adl_rec_post_slide_speed = get_post_meta( $post->ID, 'adl_rec_post_slide_speed', true );
    $adl_rec_post_item_on_desktop = get_post_meta( $post->ID, 'adl_rec_post_item_on_desktop', true );
    $adl_rec_post_item_on_tablet = get_post_meta( $post->ID, 'adl_rec_post_item_on_tablet', true );
    $adl_rec_post_item_on_mobile = get_post_meta( $post->ID, 'adl_rec_post_item_on_mobile', true );
    $adl_rec_post_pagination = get_post_meta( $post->ID, 'adl_rec_post_pagination', true );

    $adl_rec_post_header_title_font_size = get_post_meta( $post->ID, 'adl_rec_post_header_title_font_size', true );
    $adl_rec_post_header_title_font_color = get_post_meta( $post->ID, 'adl_rec_post_header_title_font_color', true );
    $adl_rec_post_nav_arrow_color = get_post_meta( $post->ID, 'adl_rec_post_nav_arrow_color', true );
    $adl_rec_post_nav_arrow_bg_color = get_post_meta( $post->ID, 'adl_rec_post_nav_arrow_bg_color', true );
    $adl_rec_post_nav_arrow_hover_color = get_post_meta( $post->ID, 'adl_rec_post_nav_arrow_hover_color', true );
    $adl_rec_post_nav_arrow_bg_hover_color = get_post_meta( $post->ID, 'adl_rec_post_nav_arrow_bg_hover_color', true );

    $adl_rec_post_border_color = get_post_meta( $post->ID, 'adl_rec_post_border_color', true );
    $adl_rec_post_border_hover_color = get_post_meta( $post->ID, 'adl_rec_post_border_hover_color', true );

    $adl_rec_post_title_font_size = get_post_meta( $post->ID, 'adl_rec_post_title_font_size', true );
    $adl_rec_post_title_font_color = get_post_meta( $post->ID, 'adl_rec_post_title_font_color', true );
    $adl_rec_post_title_hover_font_color = get_post_meta( $post->ID, 'adl_rec_post_title_hover_font_color', true );


    // sanitaized vars

    $adl_rec_post_display_header = (!empty($adl_rec_post_display_header)) ? esc_attr($adl_rec_post_display_header) : '';
    $adl_rec_post_select_theme = (!empty($adl_rec_post_select_theme)) ? esc_attr($adl_rec_post_select_theme) : '';
    $adl_rec_post_display_navigation_arrows = (!empty($adl_rec_post_display_navigation_arrows)) ? esc_attr($adl_rec_post_display_navigation_arrows) : '';
    $adl_rec_post_title = (!empty($adl_rec_post_title)) ? esc_attr($adl_rec_post_title) : '';
    $adl_rec_post_total_posts = (!empty($adl_rec_post_total_posts)) ? esc_attr($adl_rec_post_total_posts) : 0 ;
    //query type
    $adl_rec_post_posts_type = (!empty($adl_rec_post_posts_type)) ? esc_attr($adl_rec_post_posts_type) : '';

    $adl_rec_post_display_placeholder_img = (!empty($adl_rec_post_display_placeholder_img)) ? esc_attr($adl_rec_post_display_placeholder_img) : '';
    $adl_rec_post_default_feat_img = (!empty($adl_rec_post_default_feat_img)) ? esc_attr($adl_rec_post_default_feat_img) : '';
    $adl_rec_post_display_img = (!empty($adl_rec_post_display_img)) ? esc_attr($adl_rec_post_display_img) : '';
    $adl_rec_post_image_crop = (!empty($adl_rec_post_image_crop)) ? esc_attr($adl_rec_post_image_crop) : '';
    $adl_rec_post_crop_image_width = (!empty($adl_rec_post_crop_image_width)) ? esc_attr($adl_rec_post_crop_image_width) : '';
    $adl_rec_post_crop_image_height = (!empty($adl_rec_post_crop_image_height)) ? esc_attr($adl_rec_post_crop_image_height) : '';
    $adl_rec_post_auto_play = (!empty($adl_rec_post_auto_play)) ? esc_attr($adl_rec_post_auto_play) : '';
    $adl_rec_post_stop_on_hover = (!empty($adl_rec_post_stop_on_hover)) ? esc_attr($adl_rec_post_stop_on_hover) : '';
    $adl_rec_post_slide_speed = (!empty($adl_rec_post_slide_speed)) ? esc_attr($adl_rec_post_slide_speed) : 5000;
    $adl_rec_post_item_on_desktop = (!empty($adl_rec_post_item_on_desktop)) ? absint(esc_attr($adl_rec_post_item_on_desktop)) : 4;
    $adl_rec_post_item_on_tablet = (!empty($adl_rec_post_item_on_tablet)) ? absint(esc_attr($adl_rec_post_item_on_tablet)) : 3;
    $adl_rec_post_item_on_mobile = (!empty($adl_rec_post_item_on_mobile)) ? absint(esc_attr($adl_rec_post_item_on_mobile)) : 2;
    $adl_rec_post_pagination = (!empty($adl_rec_post_pagination)) ? esc_attr($adl_rec_post_pagination) : '';


    $adl_rec_post_header_title_font_size = (!empty($adl_rec_post_header_title_font_size)) ? esc_attr($adl_rec_post_header_title_font_size) : '';
    $adl_rec_post_header_title_font_color = (!empty($adl_rec_post_header_title_font_color)) ? esc_attr($adl_rec_post_header_title_font_color) : '';
    $adl_rec_post_nav_arrow_color = (!empty($adl_rec_post_nav_arrow_color)) ? esc_attr($adl_rec_post_nav_arrow_color) : '';
    $adl_rec_post_nav_arrow_bg_color = (!empty($adl_rec_post_nav_arrow_bg_color)) ? esc_attr($adl_rec_post_nav_arrow_bg_color) : '';
    $adl_rec_post_nav_arrow_hover_color = (!empty($adl_rec_post_nav_arrow_hover_color)) ? esc_attr($adl_rec_post_nav_arrow_hover_color) : '';
    $adl_rec_post_nav_arrow_bg_hover_color = (!empty($adl_rec_post_nav_arrow_bg_hover_color)) ? esc_attr($adl_rec_post_nav_arrow_bg_hover_color) : '';
    $adl_rec_post_border_color = (!empty($adl_rec_post_border_color)) ? esc_attr($adl_rec_post_border_color) : '';
    $adl_rec_post_border_hover_color = (!empty($adl_rec_post_border_hover_color)) ? esc_attr($adl_rec_post_border_hover_color) : '';
    $adl_rec_post_title_font_size = (!empty($adl_rec_post_title_font_size)) ? esc_attr($adl_rec_post_title_font_size) : '';
    $adl_rec_post_title_font_color = (!empty($adl_rec_post_title_font_color)) ? esc_attr($adl_rec_post_title_font_color) : '';
    $adl_rec_post_title_hover_font_color = (!empty($adl_rec_post_title_hover_font_color)) ? esc_attr($adl_rec_post_title_hover_font_color) : '';
    

    ?>
    <div id="tabs-container">

        <ul class="tabs-menu">
            <li class="current"><a href="#tab-1"><?php _e('General Settings', A_RCP_TEXTDOMAIN); ?></a></li>
            <li><a href="#tab-2"><?php _e('Slider Settings', A_RCP_TEXTDOMAIN); ?></a></li>
            <li><a href="#tab-3"><?php _e('Style Settings', A_RCP_TEXTDOMAIN); ?></a></li>
        </ul>

        <div class="tab">

            <div id="tab-1" class="tab-content">
                <div class="cmb2-wrap form-table">
                    <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">

                        <!--Display Header ? -->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_display_header"><?php _e('Display Header', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input type="checkbox" name="adl_rec_post_display_header" id="adl_rec_post_display_header"  value="yes" <?php if ($adl_rec_post_display_header != 'no') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>

                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Display carousel slider header or not', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-select">
                            <div class="cmb-th">
                                <label for="adl_rec_post_select_theme"><?php _e('Select a Theme', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <select class="cmb2_select" name="adl_rec_post_select_theme" id="adl_rec_post_select_theme">    
                                    <option value="standard_theme" <?php selected('standard_theme', $adl_rec_post_select_theme); ?>><?php _e('Modern Minimal', A_RCP_TEXTDOMAIN); ?></option>
                                    <option disabled value="material_theme" <?php selected('material_theme', $adl_rec_post_select_theme); ?>><?php _e('Material Theme (Available in Pro)', A_RCP_TEXTDOMAIN); ?></option>
                                    <option disabled value="flat_theme" <?php selected('flat_theme', $adl_rec_post_select_theme); ?>><?php _e('Flat Theme  (Available in Pro)', A_RCP_TEXTDOMAIN); ?></option>
                                </select>
                            </div>
                        </div>

                        <!--Title Above Slider-->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_title"><?php _e('Title Above Slider', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input type="text" class="cmb2-text-medium" name="adl_rec_post_title" id="adl_rec_post_title" value="<?php if(empty($adl_rec_post_title)) { _e('Latest Posts', A_RCP_TEXTDOMAIN); } else { echo $adl_rec_post_title; } ?>">
                                <p class="cmb2-metabox-description"><?php _e('Carousel slider title', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>


                        <!--Total posts to display -->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_total_posts"><?php _e('Total Posts', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input type="text" class="cmb2-text-small" name="adl_rec_post_total_posts" id="adl_rec_post_total_posts" value="<?php if(empty($adl_rec_post_total_posts)) { echo 12; } else { echo $adl_rec_post_total_posts; } ?>">
                                <p class="cmb2-metabox-description"><?php _e('How many posts to display in the carousel slider', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-multicheck" style="display: none;">
                            <div class="cmb-th">
                                <label for="adl_rec_post_posts_type"><?php _e('Posts Query Type', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><input type="radio" class="cmb2-option" name="adl_rec_post_posts_type" id="adl_rec_post_posts_type1" value="latest" <?php if($adl_rec_post_posts_type == "latest") {echo "checked"; } else { echo "checked"; } ?>> <label for="adl_rec_post_posts_type1"><?php _e('Recent Posts', A_RCP_TEXTDOMAIN); ?></label></li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Select how you like to display post', A_RCP_TEXTDOMAIN); ?></p>

                            </div>
                        </div>


                        <!--Show featured image -->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_display_img"><?php _e('Show featured image', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input type="checkbox" name="adl_rec_post_display_img" id="adl_rec_post_display_img"  value="yes" <?php if ($adl_rec_post_display_img != 'no') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Display featured image of the post. If featured image is not found then the first image from the post content will be used.', A_RCP_TEXTDOMAIN); ?></p>

                            </div>
                        </div>

                        <!--Show featured image placeholder-->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_display_placeholder_img"><?php _e('Use Placeholder image', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input type="checkbox" name="adl_rec_post_display_placeholder_img" id="adl_rec_post_display_placeholder_img"  value="yes" <?php if ($adl_rec_post_display_placeholder_img != 'no') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Display a featured image placeholder if a post has no featured image ?', A_RCP_TEXTDOMAIN); ?></p>

                            </div>
                        </div>

                        <!--Upload featured image placeholder-->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_default_feat_img"><?php _e('Upload Placeholder image', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li>
                                        <input type="text" name="adl_rec_post_default_feat_img" id="adl_rec_post_default_feat_img" class="regular-text" value="<?php echo (!empty($adl_rec_post_default_feat_img))? $adl_rec_post_default_feat_img : A_RCP_DEFAULT_IMG; ?>">
                                        <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Upload a featured image placeholder. Otherwise, plugin\'s default image will be used', A_RCP_TEXTDOMAIN); ?></p>

                            </div>
                        </div>





                        <!--Crop image ? -->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_image_crop"><?php _e('Auto Crop and Resize Image', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input type="checkbox" name="adl_rec_post_image_crop" id="adl_rec_post_image_crop"  value="yes" <?php if ($adl_rec_post_image_crop != 'no') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Enable cropping and resizing image automatically. If you use this feature, then you can not use default placeholder that comes with this plugin. You need to upload your own default placeholder image if you want to use.', A_RCP_TEXTDOMAIN); ?></p>

                            </div>
                        </div>

                        <!--Image Widht-->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_crop_image_width"><?php _e('Image Width', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input type="text" class="cmb2-text-small" name="adl_rec_post_crop_image_width" id="adl_rec_post_crop_image_width" placeholder="eg. 360" value="<?php echo (!empty($adl_rec_post_crop_image_width)) ? $adl_rec_post_crop_image_width : 300;  ?>">
                                <p class="cmb2-metabox-description"><?php _e('Image width value in pixel.', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>

                        <!--Image Height-->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_crop_image_height"><?php _e('Image Height', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input type="text" class="cmb2-text-small" name="adl_rec_post_crop_image_height" id="adl_rec_post_crop_image_height" placeholder="eg. 240" value="<?php echo (!empty($adl_rec_post_crop_image_height)) ? $adl_rec_post_crop_image_height : 250;  ?>">
                                <p class="cmb2-metabox-description"><?php _e('Image height value in pixel.', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>


                        <!--Display Post Title ? -->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_display_post_title"><?php _e('Display Post Title', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input type="checkbox" name="adl_rec_post_display_post_title" id="adl_rec_post_display_post_title"  value="yes" <?php if ($adl_rec_post_display_post_title != 'no') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Enable it to show the Post Title.', A_RCP_TEXTDOMAIN); ?></p>

                            </div>
                        </div>



                        <!--Display Date ? -->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_display_post_date"><?php _e('Display Post Date', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input type="checkbox" name="adl_rec_post_display_post_date" id="adl_rec_post_display_post_date"  value="yes" <?php if ($adl_rec_post_display_post_date != 'no') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Enable it to show the Post Date under the title.', A_RCP_TEXTDOMAIN); ?></p>

                            </div>
                        </div>



                        <!--Show Excerpt ? -->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_display_excerpt"><?php _e('Display Excerpt', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input type="checkbox" name="adl_rec_post_display_excerpt" id="adl_rec_post_display_excerpt"  value="yes" <?php if ($adl_rec_post_display_excerpt != 'no') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Enable it to show the Post Excerpt.', A_RCP_TEXTDOMAIN); ?></p>

                            </div>
                        </div>


                        <!--Excerpt Length-->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_excerpt_length"><?php _e('Excerpt Length', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input type="text" class="cmb2-text-small" name="adl_rec_post_excerpt_length" id="adl_rec_post_excerpt_length" placeholder="eg. 50" value="<?php echo (!empty($adl_rec_post_excerpt_length)) ? $adl_rec_post_excerpt_length : 50;  ?>">
                                <p class="cmb2-metabox-description"><?php _e('Insert the number of words you would like to show as Excerpt.', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>







                    </div>
                </div>
            </div>


            <div id="tab-2" class="tab-content">
                <!-- Upgrade to PRO Notice -->
                <div class="cmb-row cmb-type-text-medium">
                    <div class="a-rcp-upgrade-notice"> The Following Options are available in <a href="http://adlplugins.com/plugin/adl-recent-post-slider-pro" target="_blank" title="Upgrade to pro">Pro Version</a> only. Upgrade to <a href="http://adlplugins.com/plugin/adl-recent-post-slider-pro" target="_blank" title="Upgrade to pro">Pro Version</a>  for more features and for supporting us. Thank you.</div>
                </div>

                <div class="cmb2-wrap form-table a-rcp-disabled">
                    <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">
                    
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_auto_play"><?php _e('Auto Play', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input disabled type="checkbox" name="adl_rec_post_auto_play" id="adl_rec_post_auto_play"  value="yes" <?php if ($adl_rec_post_auto_play != 'no') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Play slider\'s slide automatically ? ', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>


                        <!--Stop on Hover-->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_stop_on_hover"><?php _e('Stop on Hover', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input disabled type="checkbox" name="adl_rec_post_stop_on_hover" id="adl_rec_post_stop_on_hover"  value="yes" <?php if ($adl_rec_post_stop_on_hover != 'no') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Stop slider\'s slide autoplay on mouse hover ?', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>


                        <!--Display Navigation Arrows-->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_display_header"><?php _e('Display Navigation Arrows', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input disabled type="checkbox" name="adl_rec_post_display_navigation_arrows" id="adl_rec_post_display_navigation_arrows"  value="yes" <?php if ($adl_rec_post_display_navigation_arrows != 'no') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Display slider Navigation Arrow or not', A_RCP_TEXTDOMAIN); ?></p>

                            </div>
                        </div>

                        <!--Show Dots Pagination-->
                        <div class="cmb-row cmb-type-radio">
                            <div class="cmb-th">
                                <label for="adl_rec_post_pagination"><?php _e('Show Dots Pagination', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <ul class="cmb2-radio-list cmb2-list">
                                    <li><label class="checkbox">
                                            <input disabled type="checkbox" name="adl_rec_post_pagination" id="adl_rec_post_pagination"  value="yes" <?php if ($adl_rec_post_pagination == 'yes') { echo 'checked'; }?> class="checkbox__input" />
                                            <div class="checkbox__switch"></div>
                                        </label>
                                    </li>
                                </ul>
                                <p class="cmb2-metabox-description"><?php _e('Show dots pagination below the slider?', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_slide_speed"><?php _e('Slide Speed', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_slide_speed" id="adl_rec_post_slide_speed" placeholder="1000 =1 Sec" value="<?php if(!empty($adl_rec_post_slide_speed)) { echo $adl_rec_post_slide_speed; } else { echo 5000; } ?>">
                                <p class="cmb2-metabox-description"><?php _e('1000 means 1 second.', A_RCP_TEXTDOMAIN); ?></p>

                            </div>
                        </div>

                        <!--Posts on Desktop-->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_item_on_desktop"><?php _e('Show Posts on Desktop', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_item_on_desktop" id="adl_rec_post_item_on_desktop" value="<?php if(!empty($adl_rec_post_item_on_desktop)) { echo $adl_rec_post_item_on_desktop; } else { echo 4; } ?>">
                                <p class="cmb2-metabox-description"><?php _e('Maximum amount of posts to display at a time on Desktop or Large Screen Devices.', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>


                        <!--Posts on Tablet-->

                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_item_on_tablet"><?php _e('Show Posts on Tablet', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_item_on_tablet" id="adl_rec_post_item_on_tablet" value="<?php if(!empty($adl_rec_post_item_on_tablet)) { echo $adl_rec_post_item_on_tablet; } else { echo 2; } ?>">
                                <p class="cmb2-metabox-description"><?php _e('Maximum amount of posts to display at a time on Tablet Screen.', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>

                        <!--Posts on Mobile-->

                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_item_on_mobile"><?php _e('Show Posts on Mobile', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_item_on_mobile" id="adl_rec_post_item_on_mobile" value="<?php if(!empty($adl_rec_post_item_on_mobile)) { echo $adl_rec_post_item_on_mobile; } else { echo 2; } ?>">
                                <p class="cmb2-metabox-description"><?php _e('Maximum amount of posts to display at a time on Mobile Screen.', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>




            <div id="tab-3" class="tab-content">
                <!-- Upgrade to PRO Notice -->
                <div class="cmb-row cmb-type-text-medium">
                    <div class="a-rcp-upgrade-notice"> The Following Options are available in <a href="http://adlplugins.com/plugin/adl-recent-post-slider-pro" target="_blank" title="Upgrade to pro">Pro Version</a> only. Upgrade to <a href="http://adlplugins.com/plugin/adl-recent-post-slider-pro" target="_blank" title="Upgrade to pro">Pro Version</a>  for more features and for supporting us. Thank you.</div>
                </div>
                <div class="cmb2-wrap form-table a-rcp-disabled">
                    <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">

                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_header_title_font_size"><?php _e('Slider Title Font Size', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_header_title_font_size" id="adl_rec_post_header_title_font_size" value="<?php if(!empty($adl_rec_post_header_title_font_size)) { echo $adl_rec_post_header_title_font_size; } else { echo "20px"; } ?>" placeholder="e.g. 20px">
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="adl_rec_post_header_title_font_color"><?php _e('Slider Title Font Color', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_header_title_font_color" id="adl_rec_post_header_title_font_color" value="<?php if(!empty($adl_rec_post_header_title_font_color)) { echo $adl_rec_post_header_title_font_color; } else { echo "#303030"; } ?>">
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="adl_rec_post_nav_arrow_color"><?php _e('Navigational Arrow Color', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_nav_arrow_color" id="adl_rec_post_nav_arrow_color" value="<?php if(!empty($adl_rec_post_nav_arrow_color)) { echo $adl_rec_post_nav_arrow_color; } else { echo "#FFFFFF"; } ?>">
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="adl_rec_post_nav_arrow_bg_color"><?php _e('Navigational Arrow Background Color', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_nav_arrow_bg_color" id="adl_rec_post_nav_arrow_bg_color" value="<?php echo (!empty($adl_rec_post_nav_arrow_bg_color)) ? $adl_rec_post_nav_arrow_bg_color : "#686868"; ?>">
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="adl_rec_post_nav_arrow_hover_color"><?php _e('Navigational Arrow Hover Color', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_nav_arrow_hover_color" id="adl_rec_post_nav_arrow_hover_color" value="<?php if(!empty($adl_rec_post_nav_arrow_hover_color)) { echo $adl_rec_post_nav_arrow_hover_color; } else { echo "#FFFFFF"; } ?>">
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="adl_rec_post_nav_arrow_bg_hover_color"><?php _e('Navigational Arrow Background Hover Color', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_nav_arrow_bg_hover_color" id="adl_rec_post_nav_arrow_bg_hover_color" value="<?php if(!empty($adl_rec_post_nav_arrow_bg_hover_color)) { echo $adl_rec_post_nav_arrow_bg_hover_color; } else { echo "#474747"; } ?>">
                            </div>
                        </div>

                        <!--Border color for theme B and D-->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="adl_rec_post_border_color"><?php _e('Slider Border Color', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_border_color" id="adl_rec_post_border_color" value="<?php if(!empty($adl_rec_post_border_color)) { echo $adl_rec_post_border_color; } else { echo "#f7f7f7"; } ?>">
                                <p class="cmb2-metabox-description"><?php _e('Border Color if you use "THEME B" or "THEME D" ', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>

                        <!--Border Hover color for theme B and D-->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="adl_rec_post_border_hover_color"><?php _e('Slider Border Hover Color', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_border_hover_color" id="adl_rec_post_border_hover_color" value="<?php if(!empty($adl_rec_post_border_hover_color)) { echo $adl_rec_post_border_hover_color; } else { echo "#ececec"; } ?>">
                                <p class="cmb2-metabox-description"><?php _e('Border Hover Color if you use "THEME B" or "THEME D" ', A_RCP_TEXTDOMAIN); ?></p>
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label for="adl_rec_post_title_font_size"><?php _e('Post Title Font Size', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_title_font_size"
                                       placeholder="eg. 16px"
                                       id="adl_rec_post_title_font_size"
                                       value="<?php if(!empty($adl_rec_post_title_font_size)) { echo $adl_rec_post_title_font_size; } else { echo "16px"; } ?>">
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="adl_rec_post_title_font_color"><?php _e('Post Title Font Color', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_title_font_color" id="adl_rec_post_title_font_color" value="<?php if(!empty($adl_rec_post_title_font_color)) { echo $adl_rec_post_title_font_color; } else { echo "#199bd3"; } ?>">
                            </div>
                        </div>


                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="adl_rec_post_title_hover_font_color"><?php _e('Post Title Hover Font Color', A_RCP_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input disabled type="text" class="cmb2-text-small" name="adl_rec_post_title_hover_font_color" id="adl_rec_post_title_hover_font_color" value="<?php if(!empty($adl_rec_post_title_hover_font_color)) { echo $adl_rec_post_title_hover_font_color; } else { echo "#000"; } ?>">
                            </div>
                        </div>





                    </div>
                </div>
            </div>


        </div> <!-- end tab -->
    </div> <!-- end tabs-container -->

    <div class="adl_rec_post_shortcode">
        <h2><?php _e('Shortcode', A_RCP_TEXTDOMAIN); ?> </h2>
        <p><?php _e('Use following shortcode to display the Post Slider anywhere:', A_RCP_TEXTDOMAIN); ?></p>
        <textarea cols="30" rows="1" onClick="this.select();" >[adl-recent-post <?php echo 'id="'.$post->ID.'"';?>]</textarea> <br />

        <p><?php _e('If you need to put the shortcode inside php code/template file, use this:', A_RCP_TEXTDOMAIN); ?></p>
        <textarea cols="65" rows="1" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[adl-recent-post id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea> </p>
    </div>
<?php }
