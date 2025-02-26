<?php
// temp value.
$bs3d_book_query_type_tmp = get_post_meta( $post->ID, 'bs3d_book_query_type', true );
$bs3d_book_by_id_tmp = get_post_meta( $post->ID, 'bs3d_book_by_id', true );
$bs3d_book_by_author_tmp = get_post_meta( $post->ID, 'bs3d_book_by_author', true );
$bs3d_book_from_year_tmp = get_post_meta( $post->ID, 'bs3d_book_from_year', true );
$bs3d_book_from_month_tmp = get_post_meta( $post->ID, 'bs3d_book_from_month', true );
$bs3d_book_from_month_year_tmp = get_post_meta( $post->ID, 'bs3d_book_from_month_year', true );
$bs3d_category_terms_tmp = get_post_meta( $post->ID, 'bs3d_category_terms', true ); // returns array anyway. no need to use false flag.

// sanitized value
$bs3d_book_query_type = (!empty($bs3d_book_query_type_tmp)) ? $bs3d_book_query_type_tmp : '';
$bs3d_book_by_id = (!empty($bs3d_book_by_id_tmp)) ? $bs3d_book_by_id_tmp: '';
$bs3d_book_by_author = (!empty($bs3d_book_by_author_tmp)) ? $bs3d_book_by_author_tmp: '';
$bs3d_book_from_year = (!empty($bs3d_book_from_year_tmp)) ? $bs3d_book_from_year_tmp : '' ;
$bs3d_book_from_month = (!empty($bs3d_book_from_month_tmp)) ? $bs3d_book_from_month_tmp : '' ;
$bs3d_book_from_month_year = (!empty($bs3d_book_from_month_year_tmp)) ? $bs3d_book_from_month_year_tmp : '' ;
$bs3d_category_terms = (!empty($bs3d_category_terms_tmp)) ? $bs3d_category_terms_tmp : '' ; // returns array anyway. no need to use false flag.


// all of the following vars have been used after checking use !empty() so no need to check them twice at the moment.
$bs3d_chars_per_page = get_post_meta( $post->ID, 'bs3d_chars_per_page', true );
$bs3d_book_per_page = get_post_meta( $post->ID, 'bs3d_book_per_page', true );
$bs3d_show_pagination = get_post_meta( $post->ID, 'bs3d_show_pagination', true );
$bs3d_image_crop = get_post_meta( $post->ID, 'bs3d_image_crop', true );
$bs3d_image_width = get_post_meta( $post->ID, 'bs3d_image_width', true );
$bs3d_image_height = get_post_meta( $post->ID, 'bs3d_image_height', true );
$bs3d_book_bg_color = get_post_meta( $post->ID, 'bs3d_book_bg_color', true );
$bs3d_book_cover_bg_color = get_post_meta( $post->ID, 'bs3d_book_cover_bg_color', true );
$bs3d_book_title_color = get_post_meta( $post->ID, 'bs3d_book_title_color', true );
$bs3d_book_title_font_size = get_post_meta( $post->ID, 'bs3d_book_title_font_size', true );
$bs3d_book_button_color = get_post_meta( $post->ID, 'bs3d_book_button_color', true );
$bs3d_book_button_bg_color = get_post_meta( $post->ID, 'bs3d_book_button_bg_color', true );
$bs3d_book_button_color_hover = get_post_meta( $post->ID, 'bs3d_book_button_color_hover', true );
$bs3d_page_nav_bg_color = get_post_meta( $post->ID, 'bs3d_page_nav_bg_color', true );
$bs3d_page_nav_hover_color = get_post_meta( $post->ID, 'bs3d_page_nav_hover_color', true );
$bs3d_page_nav_color = get_post_meta( $post->ID, 'bs3d_page_nav_color', true );


/**
 * Display book category markup for shortcode generator
 */
function bs3d_book_categories(){
    global $post;
    $bs3d_category_terms = get_post_meta( $post->ID, 'bs3d_category_terms', true );

    if(empty($bs3d_category_terms)) {
    $bs3d_category_terms =[];
    }


    $terms = get_terms('bs3d-category');

    echo '<div class="bs3d-checkbox-wrapper">';

        if(empty($terms)) {
        echo "No categories found!";
        }

        echo '<ul class="cmb2-list">';
            foreach ( $terms as $term ) {

            if(in_array( $term->term_id, $bs3d_category_terms )) {

            echo '<li class='.$term->term_id.'> <input class="bs3d_category_terms" id="bs3d_category_terms_'.$term->name.'" type="checkbox" checked name="bs3d_category_terms['.$term->term_id.']"
                                                       value ="'.$term->term_id.'" /><label for="bs3d_category_terms_'.$term->name.'">'.$term->name.'</label ></li>';
            } else {

            echo '<li class='.$term->term_id.'> <input class="bs3d_category_terms" id="bs3d_category_terms_'.$term->name.'" type="checkbox" name="bs3d_category_terms['.$term->term_id.']"
                                                       value ="'.$term->term_id.'" /><label for="bs3d_category_terms_'.$term->name.'">'.$term->name.'</label ></li>';
            }
            }
            echo '</ul></div>';
    }

?>
<div id="bs3d-tabs-container">
    <!--Tabs Menu-->
    <ul class="bs3d-tabs-menu">
        <li class="current"><a href="#bs3d-tab-1"><?php _e('General Settings', BS3D_TEXTDOMAIN); ?></a></li>
        <li><a href="#bs3d-tab-2"><?php _e('Style Settings', BS3D_TEXTDOMAIN); ?></a></li>
        <li><a href="#bs3d-tab-3"><?php _e('Support', BS3D_TEXTDOMAIN); ?></a></li>
    </ul>
    <!--TABS Container-->
    <div class="bs3d-tab">
        <!--TABS LISTS-->
        <div id="bs3d-tab-1" class="bs3d-tab-content">
            <div class="cmb2-wrap form-table">
                <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">

                    <!--Book Display Type-->
                    <div class="cmb-row cmb-type-multicheck">
                        <div class="cmb-th">
                            <label for="bs3d_book_query"><?php _e('Book Display Type', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <ul class="cmb2-radio-list cmb2-list">
                                <li><input type="radio" class="cmb2-option" name="bs3d_book_query_type" id="bs3d_book_query_type1" value="latest" <?php echo ($bs3d_book_query_type == "latest") ? "checked" : "checked"; ?>> <label for="bs3d_book_query_type1"><?php _e('Display Latest Published Books', BS3D_TEXTDOMAIN); ?></label></li>
                                <li><input type="radio" class="cmb2-option" name="bs3d_book_query_type" id="bs3d_book_query_type2" value="older" <?php  echo ($bs3d_book_query_type == "older") ? "checked" : '';  ?>> <label for="bs3d_book_query_type2"><?php _e('Display Oldest Published Books', BS3D_TEXTDOMAIN); ?></label></li>

                                 <!-- Upgrade to PRO Notice -->

                                <p style="font-size: 14px; margin: 13px 0 5px 0; font-style: italic;"> The Following Options are available in <a href="http://adlplugins.com/plugin/book-showcase-pro" target="_blank" title="Upgrade to pro">Pro Version</a>:</p>

                                <li><input disabled type="radio" class="cmb2-option" name="bs3d_book_query_type" id="bs3d_book_query_type_author" value="by_book_author" <?php echo ($bs3d_book_query_type == "by_book_author") ? "checked" : ''; ?>> <label for="bs3d_book_query_type_author"><?php _e('Display Books by Author', BS3D_TEXTDOMAIN); ?></label></li>
                                <input disabled type="text" class="cmb2-text-medium" name="bs3d_book_by_author" id="bs3d_book_by_author" value="<?php if(!empty($bs3d_book_by_author)) { echo $bs3d_book_by_author; } else { echo ''; } ?>" placeholder="e.g. Taylor Otwel">
                                <li><input disabled type="radio" class="cmb2-option" name="bs3d_book_query_type" id="bs3d_book_query_type3" value="by_category" <?php if($bs3d_book_query_type == "by_category") {echo "checked"; } else { echo ''; } ?>> <label for="bs3d_book_query_type3"><?php _e('Display Books from Category', BS3D_TEXTDOMAIN); ?></label></li><?php //bs3d_book_categories(); ?>
                                <li><input disabled type="radio" class="cmb2-option" name="bs3d_book_query_type" id="bs3d_book_query_type4" value="by_id" <?php if($bs3d_book_query_type == "by_id") {echo "checked"; } else { echo ''; } ?>> <label for="bs3d_book_query_type4"><?php _e('Display Books by ID ', BS3D_TEXTDOMAIN); ?></label></li>
                                <input disabled type="text" class="cmb2-text-medium" name="bs3d_book_by_id" id="bs3d_book_by_id" value="<?php if(!empty($bs3d_book_by_id)) { echo $bs3d_book_by_id; } else { echo ''; } ?>" placeholder="e.g. 10, 11, 18">
                                <li><input disabled type="radio" class="cmb2-option" name="bs3d_book_query_type" id="bs3d_book_query_type5" value="by_year" <?php if($bs3d_book_query_type == "by_year") {echo "checked"; } else { echo ''; } ?>> <label for="bs3d_book_query_type5"><?php _e('Display Books by Year', BS3D_TEXTDOMAIN); ?></label></li>
                                <input disabled type="text" class="cmb2-text-small" name="bs3d_book_from_year" id="bs3d_book_from_year" value="<?php if(!empty($bs3d_book_from_year)) { echo $bs3d_book_from_year; } else { echo ''; } ?>" placeholder="e.g. 2016">
                                <li><input disabled type="radio" class="cmb2-option" name="bs3d_book_query_type" id="bs3d_book_query_type6" value="by_month" <?php if($bs3d_book_query_type == "by_month") {echo "checked"; } else { echo ''; } ?>> <label for="bs3d_book_query_type6"><?php _e('Display Books by Month', BS3D_TEXTDOMAIN); ?></label></li>
                                <input disabled type="text" class="cmb2-text-small lfm" name="bs3d_book_from_month" id="bs3d_book_from_month" value="<?php if(!empty($bs3d_book_from_month)) { echo $bs3d_book_from_month; } else { echo ''; } ?>" placeholder="e.g. 11">
                                <input disabled type="text" class="cmb2-text-small lfm" name="bs3d_book_from_month_year" id="bs3d_book_from_month_year" value="<?php if(!empty($bs3d_book_from_month_year)) { echo $bs3d_book_from_month_year; } else { echo ''; } ?>"placeholder="2016">
                            </ul>
                            <p class="cmb2-metabox-description"><?php _e('You can choose your favorite option to display book', BS3D_TEXTDOMAIN); ?></p>
                        </div>
                    </div>



                    <!--Show Pagination ????-->
                    <div class="cmb-row cmb-type-radio">
                        <div class="cmb-th">
                            <label for="bs3d_ic"><?php _e('Show Pagination', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <ul class="cmb2-radio-list cmb2-list">
                                <li><input type="radio" class="cmb2-option" name="bs3d_show_pagination" id="bs3d_show_pagination1" value="yes" <?php echo ( "yes" == $bs3d_show_pagination ) ? 'checked' : 'checked'; ?>> <label for="bs3d_show_pagination1"><?php _e('Yes', BS3D_TEXTDOMAIN); ?></label></li>
                                <li><input type="radio" class="cmb2-option" name="bs3d_show_pagination" id="bs3d_show_pagination2" value="no" <?php echo ( "no" == $bs3d_show_pagination ) ? 'checked' : ''; ?>> <label for="bs3d_show_pagination2"><?php _e('No', BS3D_TEXTDOMAIN); ?></label></li>
                            </ul>
                            <p class="cmb2-metabox-description"><?php _e('Show or Hide Pagination', BS3D_TEXTDOMAIN); ?></p>
                        </div>
                    </div>







                    <!--Image crop????-->
                    <div class="cmb-row cmb-type-radio">
                        <div class="cmb-th">
                            <label for="bs3d_ic"><?php _e('Image Crop', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <ul class="cmb2-radio-list cmb2-list">
                                <li><input type="radio" class="cmb2-option" name="bs3d_image_crop" id="bs3d_image_crop1" value="yes" <?php echo ( "yes" == $bs3d_image_crop ) ? 'checked' : 'checked'; ?>> <label for="bs3d_image_crop1"><?php _e('Yes', BS3D_TEXTDOMAIN); ?></label></li>
                                <li><input type="radio" class="cmb2-option" name="bs3d_image_crop" id="bs3d_image_crop2" value="no" <?php echo ( "no" == $bs3d_image_crop ) ? 'checked' : '' ; ?>> <label for="bs3d_image_crop2"><?php _e('No', BS3D_TEXTDOMAIN); ?></label></li>
                            </ul>
                            <p class="cmb2-metabox-description"><?php _e('If cover images are very large in size, It automatically re-sizes and crops if you select this option.', BS3D_TEXTDOMAIN); ?></p>
                        </div>
                    </div>

                    <!--Image crop Width-->
                    <div class="cmb-row cmb-type-text-medium">
                        <div class="cmb-th">
                            <label for="bs3d_image_width"><?php _e('Image Width', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input type="text" class="cmb2-text-small" name="bs3d_image_width" id="bs3d_image_width" value="<?php echo (!empty($bs3d_image_width)) ? $bs3d_image_width : '300' ; ?>">
                            <p class="cmb2-metabox-description"><?php _e('Image cropping width', BS3D_TEXTDOMAIN); ?></p>
                        </div>
                    </div>

                    <!--Image crop Height-->
                    <div class="cmb-row cmb-type-text-medium">
                        <div class="cmb-th">
                            <label for="bs3d_image_height"><?php _e('Image Height', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input type="text" class="cmb2-text-small" name="bs3d_image_height" id="bs3d_image_height" value="<?php echo (!empty($bs3d_image_height)) ? $bs3d_image_height : '400' ; ?>">
                            <p class="cmb2-metabox-description"><?php _e('Image cropping height', BS3D_TEXTDOMAIN); ?></p>
                        </div>
                    </div>

                    <!--Text Content per page-->
                    <div class="cmb-row cmb-type-text-medium">
                        <div class="cmb-th">
                            <label for="bs3d_chars_per_page"><?php _e('Display Text Content per page', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input type="text" class="cmb2-text-small" name="bs3d_chars_per_page" id="bs3d_chars_per_page" value="<?php echo (!empty($bs3d_chars_per_page)) ? $bs3d_chars_per_page : '500' ; ?>">
                            <p class="cmb2-metabox-description"><?php _e('Number of characters should be displayed per page. Default is 500 character.', BS3D_TEXTDOMAIN); ?></p>
                        </div>
                    </div>








                    <!--Books per page-->
                    <div class="cmb-row cmb-type-text-medium">
                        <div class="cmb-th">
                            <label for="bs3d_book_per_page"><?php _e('Display Book per page', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input type="text" class="cmb2-text-small" name="bs3d_book_per_page" id="bs3d_book_per_page" value="<?php echo (!empty($bs3d_book_per_page)) ? $bs3d_book_per_page : 6 ; ?>">
                            <p class="cmb2-metabox-description"><?php _e('Number of books should be displayed per page. Default is 6 books. Use 0 or -1 for all posts', BS3D_TEXTDOMAIN); ?></p>
                        </div>
                    </div>





                </div> <!-- end cmb2-metabox -->
            </div> <!-- end cmb2-wrap -->
        </div> <!-- end bs3d-tab-1 -->



        <!-- TABS 2 STYLE SETTINGS-->


        <div id="bs3d-tab-2" class="bs3d-tab-content">
            <!-- Upgrade to PRO Notice -->

            <div class="cmb-row cmb-type-text-medium bs3d-edit-text">
                <div class="bs3d-upgrade-notice"> The Following Options are available in <a href="http://adlplugins.com/plugin/book-showcase-pro" target="_blank" title="Upgrade to pro">Pro Version</a> only. Upgrade to <a href="http://adlplugins.com/plugin/book-showcase-pro" target="_blank" title="Upgrade to pro">Pro Version</a>  for more features and for supporting us.</div>
            </div>

            <div class="cmb2-wrap form-table bs3d-disabled">
                <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">


                    <!-- button text color-->
                    <div class="cmb-row cmb-type-colorpicker">
                        <div class="cmb-th">
                            <label for="bs3d_book_button_color"><?php _e('Button Text Color', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input disabled type="text" class="cmb2-text-small" name="bs3d_book_button_color" id="bs3d_book_button_color" value="<?php echo (!empty($bs3d_book_button_color)) ? $bs3d_book_button_color : '#fff' ; ?>">
                        </div>
                    </div>

                    <!-- button background color-->
                    <div class="cmb-row cmb-type-colorpicker">
                        <div class="cmb-th">
                            <label for="bs3d_book_button_bg_color"><?php _e('Button Background Color', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input disabled type="text" class="cmb2-text-small" name="bs3d_book_button_bg_color" id="bs3d_book_button_bg_color" value="<?php echo (!empty($bs3d_book_button_bg_color)) ? $bs3d_book_button_bg_color : '#bbbbbb' ; ?>">
                        </div>
                    </div>

                    <!-- button hover color-->
                    <div class="cmb-row cmb-type-colorpicker">
                        <div class="cmb-th">
                            <label for="bs3d_book_button_color_hover"><?php _e('Button Hover Color', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input disabled type="text" class="cmb2-text-small" name="bs3d_book_button_color_hover" id="bs3d_book_button_color_hover" value="<?php echo (!empty($bs3d_book_button_color_hover)) ? $bs3d_book_button_color_hover : '#9A9A9A' ; ?>">
                        </div>
                    </div>


                    <!-- Book page Navigation BG color-->
                    <div class="cmb-row cmb-type-colorpicker">
                        <div class="cmb-th">
                            <label for="bs3d_page_nav_bg_color"><?php _e('Pagination Background Color', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input disabled type="text" class="cmb2-text-small" name="bs3d_page_nav_bg_color" id="bs3d_page_nav_bg_color" value="<?php echo (!empty($bs3d_page_nav_bg_color)) ? $bs3d_page_nav_bg_color : '#bbbbbb' ; ?>">
                        </div>
                    </div>

                    <!-- Book page Page Nav HOVER color-->
                    <div class="cmb-row cmb-type-colorpicker">
                        <div class="cmb-th">
                            <label for="bs3d_page_nav_hover_color"><?php _e('Pagination Active & Hover Color', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input disabled type="text" class="cmb2-text-small" name="bs3d_page_nav_hover_color" id="bs3d_page_nav_hover_color" value="<?php echo (!empty($bs3d_page_nav_hover_color)) ? $bs3d_page_nav_hover_color : '#9A9A9A' ; ?>">
                        </div>
                    </div>

                    <!-- Book page Page Nav ARRAY color-->
                    <div class="cmb-row cmb-type-colorpicker">
                        <div class="cmb-th">
                            <label for="bs3d_page_nav_color"><?php _e('Pagination Text Color', BS3D_TEXTDOMAIN); ?></label>
                        </div>
                        <div class="cmb-td">
                            <input disabled type="text" class="cmb2-text-small" name="bs3d_page_nav_color" id="bs3d_page_nav_color" value="<?php echo (!empty($bs3d_page_nav_color)) ? $bs3d_page_nav_color : '#fff' ; ?>">
                        </div>
                    </div>





                </div> <!-- end cmb2-metabox -->
            </div> <!-- end cmb2-wrap -->
        </div> <!-- end bs3d-tab-2 -->


        <!-- TAB 3 SUPPORT-->

        <div id="bs3d-tab-3" class="bs3d-tab-content">
            <div class="cmb2-wrap form-table">
                <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">

                    <h2>Usage</h2>
                    <p>After successfully installing and activating the plugin, you will find "Book Showcase" menu on left column of WordPress dashboard. Go to Book Showcase >> Add New to add a book and add as many books as you want. Then, Shortcode Generator >> Generate New Shortcode and configure any options as desired. Finally, copy the shortcode which is at the bottom of the Settings panel on the "Shortcode" section and paste it wherever you want to display the book showcase.</p><br /><br />

                    <h2>Support Forum</h2>
                    <p>If you need any helps, please don't hesitate to post it on <a href="https://wordpress.org/support/plugin/book-showcase" target="_blank">WordPress.org Support Forum</a> or <a href="http://adlplugins.com/support" target="_blank">AdlPlugins.com Support Forum</a>.</p><br /><br />

                    <h2>More Features</h2>
                    <p>Upgrading to the <a href="http://adlplugins.com/plugin/book-showcase-pro" target="_blank">Pro Version</a> would unlock more amazing features of the plugin.</p>

                </div> <!-- end cmb2-metabox -->
            </div> <!-- end cmb2-wrap -->
        </div> <!-- end bs3d-tab-3 -->


    </div> <!-- end bs3d-tab -->
</div> <!-- end bs3d-tabs-container -->





<div class="bs3d_shortcode">
    <h2><?php _e('Shortcode', BS3D_TEXTDOMAIN); ?> </h2>
    <p><?php _e('Use following shortcode to display the Book Showcase anywhere:', BS3D_TEXTDOMAIN); ?></p>
    <textarea cols="40" rows="1" onClick="this.select();" >[book_showcase <?php echo 'id="'.$post->ID.'"';?>]</textarea> <br />

    <p><?php _e('If you need to put the shortcode in code/theme file, use this:', BS3D_TEXTDOMAIN); ?></p>
    <textarea cols="65" rows="1" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[book_showcase id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea> </p>
</div>

