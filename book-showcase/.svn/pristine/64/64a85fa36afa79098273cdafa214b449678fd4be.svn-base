<?php

/**
 * @param $atts
 * @param null $content
 *
 * @return null|string
 */
// ShortCode for OutPutting Book
function bs3d_shortcode_output($atts, $content = null) {
    // Start Output Buffer
    ob_start();
    // get shortcode atts
    $atts = shortcode_atts(
        array(
            'id' => "",
        ), $atts);
    // enqueue styles and scripts for this shortcode
    wp_enqueue_style('bs3d-component-1-style');
    wp_enqueue_style('bs3d-default-style');
    wp_enqueue_script('bs3d-book-1-js');
    wp_enqueue_script('bs3d-main-js');

    $shortcode_id = $atts['id'];
    // temp value
    $bs3d_book_query_type_tmp = get_post_meta( $shortcode_id, 'bs3d_book_query_type', true );
    $bs3d_book_by_id_tmp = get_post_meta( $shortcode_id, 'bs3d_book_by_id', true );
    $bs3d_book_by_author_tmp = get_post_meta( $shortcode_id, 'bs3d_book_by_author', true );
    $bs3d_book_from_year_tmp = get_post_meta( $shortcode_id, 'bs3d_book_from_year', true );
    $bs3d_book_from_month_tmp = get_post_meta( $shortcode_id, 'bs3d_book_from_month', true );
    $bs3d_book_from_month_year_tmp = get_post_meta( $shortcode_id, 'bs3d_book_from_month_year', true );
    $bs3d_category_terms_tmp = get_post_meta( $shortcode_id, 'bs3d_category_terms', true ); // returns array anyway. no need to use false flag.

    $bs3d_chars_per_page_tmp = get_post_meta( $shortcode_id, 'bs3d_chars_per_page', true ); // will be used in shortcode-content.php
    $bs3d_book_per_page_tmp = get_post_meta( $shortcode_id, 'bs3d_book_per_page', true ); // returns array anyway. no need to use false flag.
    $bs3d_show_pagination_tmp = get_post_meta( $shortcode_id, 'bs3d_show_pagination', true );
    $bs3d_image_crop_tmp = get_post_meta( $shortcode_id, 'bs3d_image_crop', true );
    $bs3d_image_width_tmp = get_post_meta( $shortcode_id, 'bs3d_image_width', true );
    $bs3d_image_height_tmp = get_post_meta( $shortcode_id, 'bs3d_image_height', true );
    $bs3d_book_button_color_tmp = get_post_meta( $shortcode_id, 'bs3d_book_button_color', true ) ;
    $bs3d_book_button_bg_color_tmp = get_post_meta( $shortcode_id, 'bs3d_book_button_bg_color', true );
    $bs3d_book_button_color_hover_tmp = get_post_meta( $shortcode_id, 'bs3d_book_button_color_hover', true );
    $bs3d_page_nav_bg_color_tmp = get_post_meta( $shortcode_id, 'bs3d_page_nav_bg_color', true );
    $bs3d_page_nav_hover_color_tmp = get_post_meta( $shortcode_id, 'bs3d_page_nav_hover_color', true );
    $bs3d_page_nav_color_tmp = get_post_meta( $shortcode_id, 'bs3d_page_nav_color', true );



    //sanitized value
    // get all value from db to prepare the ARGS for the query
    $bs3d_book_query_type = (!empty($bs3d_book_query_type_tmp)) ? $bs3d_book_query_type_tmp : '';
    $bs3d_book_by_id = (!empty($bs3d_book_by_id_tmp)) ? $bs3d_book_by_id_tmp: '';
    $bs3d_book_by_author = (!empty($bs3d_book_by_author_tmp)) ? $bs3d_book_by_author_tmp: '';
    $bs3d_book_from_year = (!empty($bs3d_book_from_year_tmp)) ? $bs3d_book_from_year_tmp : '' ;
    $bs3d_book_from_month = (!empty($bs3d_book_from_month_tmp)) ? $bs3d_book_from_month_tmp : '' ;
    $bs3d_book_from_month_year = (!empty($bs3d_book_from_month_year_tmp)) ? $bs3d_book_from_month_year_tmp : '' ;
    $bs3d_category_terms = (!empty($bs3d_category_terms_tmp)) ? $bs3d_category_terms_tmp : '' ; // returns array anyway. no need to use false flag.





    $bs3d_chars_per_page = (!empty($bs3d_chars_per_page_tmp)) ? $bs3d_chars_per_page_tmp : '' ; // will be used in shortcode-content.php
    $bs3d_book_per_page = (!empty($bs3d_book_per_page_tmp)) ? $bs3d_book_per_page_tmp : '' ; // returns array anyway. no need to use false flag.
    $bs3d_show_pagination = (!empty($bs3d_show_pagination_tmp)) ? $bs3d_show_pagination_tmp : '' ;
    $bs3d_image_crop = (!empty($bs3d_image_crop_tmp)) ? $bs3d_image_crop_tmp : '' ;
    $bs3d_image_width = (!empty($bs3d_image_width_tmp)) ? $bs3d_image_width_tmp : '' ;
    $bs3d_image_height = (!empty($bs3d_image_height_tmp)) ? $bs3d_image_height_tmp : '' ;
    $bs3d_book_button_color = (!empty($bs3d_book_button_color_tmp)) ? $bs3d_book_button_color_tmp : '' ;
    $bs3d_book_button_bg_color = (!empty($bs3d_book_button_bg_color_tmp)) ? $bs3d_book_button_bg_color_tmp : '' ;
    $bs3d_book_button_color_hover = (!empty($bs3d_book_button_color_hover_tmp)) ? $bs3d_book_button_color_hover_tmp : '' ;
    $bs3d_page_nav_bg_color = (!empty($bs3d_page_nav_bg_color_tmp)) ? $bs3d_page_nav_bg_color_tmp : '' ;
    $bs3d_page_nav_hover_color = (!empty($bs3d_page_nav_hover_color_tmp)) ? $bs3d_page_nav_hover_color_tmp : '' ;
    $bs3d_page_nav_color = (!empty($bs3d_page_nav_color_tmp)) ? $bs3d_page_nav_color_tmp : '' ;




//    Build the args for query.


    //for pagination
    if ( get_query_var('paged') ) {
        $paged = get_query_var('paged');
    } elseif ( get_query_var('page') ) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }
    $common_args = [
        'post_type' => 'bs3dbook',
        'posts_per_page'=> ($bs3d_book_per_page ?  (int) $bs3d_book_per_page : -1),
        'paged'         => $paged,


    ];
    if ( 'latest' == $bs3d_book_query_type ) { $args = $common_args; }
    elseif ('by_category' == $bs3d_book_query_type) {
        $categories = [
            'tax_query' => [
                [
                    'taxonomy' => 'bs3d-category',
                    'field'    => 'term_id',
                    'terms'    => $bs3d_category_terms,
                ],

            ],
        ];
        $args = array_merge($common_args, $categories);
    } elseif ('older' == $bs3d_book_query_type) {
        $older_args = [
            'orderby'   => 'date',
            'order'     => 'ASC',
        ];
        $args = array_merge($common_args, $older_args);
    } elseif ('by_id' == $bs3d_book_query_type) {
        $books_by_id = [
            'post__in' => ($bs3d_book_by_id ? explode(',', $bs3d_book_by_id) : null)
        ];
        $args = array_merge($common_args, $books_by_id);
    } elseif ('by_year' == $bs3d_book_query_type) {
        $args = array_merge($common_args, ['year' => $bs3d_book_from_year]);
    } elseif ('by_month' == $bs3d_book_query_type) {
        $books_by_month_args = [
            'monthnum'  => $bs3d_book_from_month,
            'year'      => $bs3d_book_from_month_year,
        ];
        $args = array_merge($common_args, $books_by_month_args);
    } elseif ('by_book_author' == $bs3d_book_query_type){
        $by_book_author_ars = [
            'meta_key'  => 'bs3d_author_name',
            'meta_value' => $bs3d_book_by_author,
        ];
        $args = array_merge($common_args, $by_book_author_ars);
    }




    // LOOP FOR BOOK CUSTOM POST INITIATED
    $loop = new WP_Query( $args );
    if( $loop->have_posts()):
?>
    <!--STYLES FOR BOOKS -->
    <?php include_once ('bs3d-style.php'); ?>
    <!--MIAN DIV FOR BOOK-->
    <div class="main">

    <?php

        //include shortcode content
        include ('bs3d-shortcode-content.php');
        //<!--pagination code for custom book post type-->
        if ( 'yes'== $bs3d_show_pagination ) { echo bs3d_pagination($loop, $paged); }

    ?>
     <?php else:
            _e('No books found!', BS3D_TEXTDOMAIN);
            endif; // if($loop->have_posts() ends
        ?>
    </div> <!--    ends div.main  -->


<?php
    $content = ob_get_clean();
    return $content;
}

add_shortcode('book_showcase', 'bs3d_shortcode_output');