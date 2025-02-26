<?php

if(class_exists('ACF') && class_exists('acf_field_flexible_content')){
    function acf_ajax_grid_gallery_shortcode($atts){
        ob_start();
        $args = shortcode_atts(array(
            'id' => '',
        ), $atts);

        $id = $args['id'];
        $count = 0;

        if(!empty($id)){
            // Check value exists.
            if( have_rows('optionAAGGallery_main_flexible_field1', 'option') ){
                // Loop through rows.
                while ( have_rows('optionAAGGallery_main_flexible_field1', 'option') ){
                    the_row();

                    $count++;

                    if( get_row_layout() == 'optionAAGGallery_main_flexible_layout1' ){
                        if($count == $id){

                            // Pagination Variables
                            $grid_gallery_ajaxload = get_sub_field('optionAAGGallery_grid_subfield3_tab2', 'option');

                            if($grid_gallery_ajaxload){

                                if( get_query_var('page') ) {
                                    $grid_gallery_page = get_query_var( 'page' );
                                }else {
                                    $grid_gallery_page = 1;
                                }
                                
                                $grid_gallery_row = 0;
                                $grid_gallery_image_per_page = get_sub_field('optionAAGGallery_grid_subfield4_tab2', 'option'); // How many images to display on each page
                                $gridGallery_flexible_field = get_sub_field('optionAAGGallery_grid_flexible_field1', 'option');
                                $grid_gallery_total_items = count( $gridGallery_flexible_field );
                                $grid_gallery_total_pages = ceil( $grid_gallery_total_items / $grid_gallery_image_per_page );
                                $grid_gallery_min = ( ( $grid_gallery_page * $grid_gallery_image_per_page ) - $grid_gallery_image_per_page ) + 1;
                                $grid_gallery_max = ( $grid_gallery_min + $grid_gallery_image_per_page ) - 1;
                                
                            }

                            // Lightbox
                            $grid_gallery_lightBox = get_sub_field('optionAAGGallery_grid_subfield1_tab2', 'option');
                            $grid_gallery_uniqueName = get_sub_field('optionAAGGallery_grid_subfield2_tab2', 'option');
                            $grid_gallery_lightboxTitle = get_sub_field('optionAAGGallery_grid_lightbox_title_tab2', 'option');
                            $grid_gallery_lightboxSpinner = get_sub_field_object('optionAAGGallery_grid_lightbox_spinner_tab2', 'option');

                            // Class
                            $grid_gallery_class = get_sub_field('optionAAGGallery_grid_subfield5_tab2', 'option');

                            // Ajax Loadmore
                            $ajax_buttonLabel = get_sub_field('optionAAGGallery_grid_ajax_buttonLabel_tab2', 'option');
                            $ajax_buttonColor = get_sub_field('optionAAGGallery_grid_ajax_buttonColor_tab2', 'option');
                            $ajax_spinner = get_sub_field('optionAAGGallery_grid_ajax_spinner_tab2', 'option');

                            // Number of column per row
                            $grid_gallery_column = get_sub_field('optionAAGGallery_grid_ajax_column_tab2', 'option');
                            ?>
                            <div data-index="aa-grid-gallery-count-<?php echo $count; ?>" data-loadspinner="<?php echo esc_attr($grid_gallery_lightboxSpinner['value']); ?>"
                            class="aa-grid-gallery aa-grid-gallery-count-<?php echo $count; ?>">
                                <div class="row aa-grid-gallery-row<?php 
                                if(!empty($grid_gallery_class)){
                                    echo ' ' . $grid_gallery_class;
                                }
                                ?>">
                                <?php
                                if( have_rows('optionAAGGallery_grid_flexible_field1', 'option') ){
                                    while ( have_rows('optionAAGGallery_grid_flexible_field1', 'option') ){
                                        the_row();

                                        if($grid_gallery_ajaxload){
                                            $grid_gallery_row++;
                                            // Ignore this image if $row is lower than $min
                                            if($grid_gallery_row < $grid_gallery_min) { 
                                                continue; 
                                            }

                                            // Stop loop completely if $row is higher than $max
                                            if($grid_gallery_row > $grid_gallery_max) { 
                                                break; 
                                            }
                                        }

                                        if( get_row_layout() == 'optionAAGGallery_grid_flexible_layout1' ){
                                            $grid_image = get_sub_field('optionGallery_grid_layout1_subfield1', 'option');
                                            ?>
                                            <div class="aa-grid-gallery-list <?php
                                            if($grid_gallery_column == 'column3'){
                                                echo 'aa-grid-gallery-column-3';
                                            }else{
                                                echo 'aa-grid-gallery-column-2';
                                            }
                                            ?>">
                                                <?php
                                                if($grid_gallery_lightBox){
                                                ?>
                                                    <a class="aa-grid-gallery-lightbox" <?php echo ($grid_gallery_lightboxTitle) ? 'data-title='.$grid_image['title'] : ''; ?> data-gall="<?php echo $grid_gallery_uniqueName; ?>" href="<?php echo $grid_image['url']; ?>">
                                                        <img src="<?php echo $grid_image['url']; ?>" alt="<?php echo $grid_image['alt']; ?>" width="100%" height="100%"/>
                                                    </a>
                                                <?php
                                                }else{
                                                    ?>
                                                        <img src="<?php echo $grid_image['url']; ?>" alt="<?php echo $grid_image['alt']; ?>" width="100%" height="100%"/>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                </div>
                                <?php
                                if($grid_gallery_ajaxload){
                                    // Paginate links base format
                                    $base_format = '';
                                    if(is_front_page()){
                                        $base_format = get_permalink() . 'page/' . '%#%' . '/';
                                    }else{
                                        $base_format = get_permalink() . '%#%' . '/';
                                    }
                                    // Pagination
                                    $grid_links = paginate_links( array(
                                        'base' => $base_format,
                                        'format' => '?page=%#%',
                                        'current' => $grid_gallery_page,
                                        'total' => $grid_gallery_total_pages,
                                        'type' => 'array',
                                    ) );
                                    echo '<div class="aa-grid-gallery-pagination" style="display:none;">';
                                    foreach( $grid_links as $grid_link ){
                                        echo $grid_link;
                                    }
                                    echo '</div>';
                                ?>
                                    <div class="aa-grid-gallery-load-status">
                                        <?php if($ajax_spinner == 'spinner1'){ ?>
                                        <div class="loader-ellips infinite-scroll-request">
                                            <span class="loader-ellips__dot"></span>
                                            <span class="loader-ellips__dot"></span>
                                            <span class="loader-ellips__dot"></span>
                                            <span class="loader-ellips__dot"></span>
                                        </div>
                                        <?php }else{ ?>
                                        <div class="loader-wheel infinite-scroll-request">
                                            <i><i><i><i><i><i><i><i><i><i><i><i>
                                            </i></i></i></i></i></i></i></i></i></i></i></i>
                                        </div>
                                        <?php } ?>
                                        <p class="infinite-scroll-last">No more images to show</p>
                                        <p class="infinite-scroll-error">No more pages to load</p>
                                    </div>

                                <?php 
                                    if($grid_gallery_total_items > $grid_gallery_image_per_page){
                                        
                                ?>
                                        <div class="aa-grid-gallery-viewmore-wrapper mt-3">
                                            <button class="aa-grid-gallery-viewmore" data-index="aa-grid-gallery-count-<?php echo $count; ?>" style="background-color: <?php
                                            if(!empty($ajax_buttonColor)){
                                                echo $ajax_buttonColor.';';
                                            }else{
                                                echo '#23282d;';
                                            }
                                            ?>"><?php
                                            if(!empty($ajax_buttonLabel)){
                                                echo $ajax_buttonLabel;
                                            }else{
                                                echo 'View More';
                                            }
                                            ?></button>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <?php
                        }
                    }
                }
            }
        }
        return ob_get_clean();
    }
    add_shortcode('acf_ajax_grid_gallery', 'acf_ajax_grid_gallery_shortcode');
}