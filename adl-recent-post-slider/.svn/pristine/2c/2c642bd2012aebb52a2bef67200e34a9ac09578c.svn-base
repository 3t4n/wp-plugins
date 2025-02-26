<?php


/**
 * Prints the limited excerpts of the post
 * @param int $limit | Limit excerpt by a number of word. Default is 50.
 *
 * @return array|mixed|string
 */
function adl_rec_post_get_limited_excerpts($limit = 50) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $moreText = sprintf( '<a class="read_more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( 'Read More <span class="fa fa-long-arrow-right"></span> ', A_RCP_TEXTDOMAIN )
        );
        $excerpt = implode(" ",$excerpt).$moreText;

    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return '<p>'.$excerpt.'</p>';
}

/**
 * Prints the shortcode for the posts slider
 * @param $atts
 * @param null $content
 *
 * @return null|string
 */
function adl_rec_post_shortcode_output($atts, $content = null) {
    ob_start();
    // get shortcode atts
    $atts = shortcode_atts(
        array(
            'id' => "",
        ), $atts);
    // enqueue styles and scripts for this shortcode
    wp_enqueue_style('google-fonts-custom');
    wp_enqueue_style('venobox');
    wp_enqueue_style('fonts-awesome');
    wp_enqueue_style('fontello-style');
    wp_enqueue_style('owl-carousel-min-style');
    wp_enqueue_style('owl-theme-default-min-style');
    wp_enqueue_style('a-rcp-frontend_style');

    wp_enqueue_script('owl-carousel-min-script');
    wp_enqueue_script('venobox-min');

    $shorcode_id = $atts['id'];
    $random_adl_rec_post_wrapper_id = 'id_'.rand(1, 10).$shorcode_id;


// temp vars
    $adl_rec_post_display_header = get_post_meta( $shorcode_id, 'adl_rec_post_display_header', true );
    $adl_rec_post_select_theme = get_post_meta( $shorcode_id, 'adl_rec_post_select_theme', true );
    $adl_rec_post_display_navigation_arrows = get_post_meta( $shorcode_id, 'adl_rec_post_display_navigation_arrows', true );
    $adl_rec_post_title = get_post_meta( $shorcode_id, 'adl_rec_post_title', true );
    $adl_rec_post_total_posts = get_post_meta( $shorcode_id, 'adl_rec_post_total_posts', true );
    //query type
    $adl_rec_post_posts_type = get_post_meta( $shorcode_id, 'adl_rec_post_posts_type', true );

    $adl_rec_post_display_placeholder_img = get_post_meta( $shorcode_id, 'adl_rec_post_display_placeholder_img', true );
    $adl_rec_post_default_feat_img = get_post_meta( $shorcode_id, 'adl_rec_post_default_feat_img', true );
    $adl_rec_post_display_img = get_post_meta( $shorcode_id, 'adl_rec_post_display_img', true );


    $adl_rec_post_image_crop = get_post_meta( $shorcode_id, 'adl_rec_post_image_crop', true );
    $adl_rec_post_crop_image_width = get_post_meta( $shorcode_id, 'adl_rec_post_crop_image_width', true );
    $adl_rec_post_crop_image_height = get_post_meta( $shorcode_id, 'adl_rec_post_crop_image_height', true );
    $adl_rec_post_display_post_title = get_post_meta( $shorcode_id, 'adl_rec_post_display_post_title', true );
    $adl_rec_post_display_post_date = get_post_meta( $shorcode_id, 'adl_rec_post_display_post_date', true );
    $adl_rec_post_display_excerpt = get_post_meta( $shorcode_id, 'adl_rec_post_display_excerpt', true );
    $adl_rec_post_excerpt_length = get_post_meta( $shorcode_id, 'adl_rec_post_excerpt_length', true );

    $adl_rec_post_auto_play = get_post_meta( $shorcode_id, 'adl_rec_post_auto_play', true );
    $adl_rec_post_stop_on_hover = get_post_meta( $shorcode_id, 'adl_rec_post_stop_on_hover', true );
    $adl_rec_post_slide_speed = get_post_meta( $shorcode_id, 'adl_rec_post_slide_speed', true );
    $adl_rec_post_item_on_desktop = get_post_meta( $shorcode_id, 'adl_rec_post_item_on_desktop', true );
    $adl_rec_post_item_on_tablet = get_post_meta( $shorcode_id, 'adl_rec_post_item_on_tablet', true );
    $adl_rec_post_item_on_mobile = get_post_meta( $shorcode_id, 'adl_rec_post_item_on_mobile', true );
    $adl_rec_post_pagination = get_post_meta( $shorcode_id, 'adl_rec_post_pagination', true );

    $adl_rec_post_header_title_font_size = get_post_meta( $shorcode_id, 'adl_rec_post_header_title_font_size', true );
    $adl_rec_post_header_title_font_color = get_post_meta( $shorcode_id, 'adl_rec_post_header_title_font_color', true );
    $adl_rec_post_nav_arrow_color = get_post_meta( $shorcode_id, 'adl_rec_post_nav_arrow_color', true );
    $adl_rec_post_nav_arrow_bg_color = get_post_meta( $shorcode_id, 'adl_rec_post_nav_arrow_bg_color', true );
    $adl_rec_post_nav_arrow_hover_color = get_post_meta( $shorcode_id, 'adl_rec_post_nav_arrow_hover_color', true );
    $adl_rec_post_nav_arrow_bg_hover_color = get_post_meta( $shorcode_id, 'adl_rec_post_nav_arrow_bg_hover_color', true );

    $adl_rec_post_border_color = get_post_meta( $shorcode_id, 'adl_rec_post_border_color', true );
    $adl_rec_post_border_hover_color = get_post_meta( $shorcode_id, 'adl_rec_post_border_hover_color', true );

    $adl_rec_post_title_font_size = get_post_meta( $shorcode_id, 'adl_rec_post_title_font_size', true );
    $adl_rec_post_title_font_color = get_post_meta( $shorcode_id, 'adl_rec_post_title_font_color', true );
    $adl_rec_post_title_hover_font_color = get_post_meta( $shorcode_id, 'adl_rec_post_title_hover_font_color', true );


    // sanitaized vars
    $adl_rec_post_display_header = (!empty($adl_rec_post_display_header)) ? esc_attr($adl_rec_post_display_header) : '';
    $adl_rec_post_select_theme = (!empty($adl_rec_post_select_theme)) ? esc_attr($adl_rec_post_select_theme) : '';
    $adl_rec_post_display_navigation_arrows = (!empty($adl_rec_post_display_navigation_arrows)) ? esc_attr($adl_rec_post_display_navigation_arrows) : '';
    $adl_rec_post_title = (!empty($adl_rec_post_title)) ? esc_attr($adl_rec_post_title) : '';
    $adl_rec_post_total_posts = (!empty($adl_rec_post_total_posts)) ? esc_attr($adl_rec_post_total_posts) : 5 ;
    $adl_rec_post_posts_type = (!empty($adl_rec_post_posts_type)) ? esc_attr($adl_rec_post_posts_type) : '';
    $adl_rec_post_display_placeholder_img = (!empty($adl_rec_post_display_placeholder_img)) ? esc_attr($adl_rec_post_display_placeholder_img) : '';
    $adl_rec_post_default_feat_img = (!empty($adl_rec_post_default_feat_img)) ? esc_attr($adl_rec_post_default_feat_img) : '';
    $adl_rec_post_display_img = (!empty($adl_rec_post_display_img)) ? esc_attr($adl_rec_post_display_img) : '';
    $adl_rec_post_image_crop = (!empty($adl_rec_post_image_crop)) ? esc_attr($adl_rec_post_image_crop) : '';
    $adl_rec_post_crop_image_width = (!empty($adl_rec_post_crop_image_width)) ? absint(esc_attr($adl_rec_post_crop_image_width)) : '';
    $adl_rec_post_crop_image_height = (!empty($adl_rec_post_crop_image_height)) ? absint(esc_attr($adl_rec_post_crop_image_height)) : '';
    $adl_rec_post_display_post_title = (!empty($adl_rec_post_display_post_title)) ? esc_attr($adl_rec_post_display_post_title) : '';
    $adl_rec_post_display_post_date = (!empty($adl_rec_post_display_post_date)) ? esc_attr($adl_rec_post_display_post_date) : '';
    $adl_rec_post_display_excerpt = (!empty($adl_rec_post_display_excerpt)) ? esc_attr($adl_rec_post_display_excerpt) : '';
    $adl_rec_post_excerpt_length = (!empty($adl_rec_post_excerpt_length)) ? absint(esc_attr($adl_rec_post_excerpt_length)) : '';
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


var_dump($adl_rec_post_display_post_date);

//    Build the args for query.
    $args = [
        'post_type' => 'post',
        'posts_per_page'=> (!empty($adl_rec_post_total_posts) ?  absint($adl_rec_post_total_posts) : 10),
        'status' => 'published',
        'no_found_rows'=> true, // remove if pagination needed

    ];



    // LOOP FOR POSTS CUSTOM POST INITIATED
    $loop = new WP_Query( $args );
    // fix repeat post problem if post count is less than post to display by slider
    $post_found_count = $loop->post_count;
    $adl_rec_post_item_on_desktop = ($post_found_count >= $adl_rec_post_item_on_desktop) ? $adl_rec_post_item_on_desktop : $post_found_count;
    $adl_rec_post_item_on_tablet = ($post_found_count >= $adl_rec_post_item_on_tablet) ? $adl_rec_post_item_on_tablet : $post_found_count;
    $adl_rec_post_item_on_mobile = ($post_found_count >= $adl_rec_post_item_on_mobile) ? $adl_rec_post_item_on_mobile : $post_found_count;

    if( $loop->have_posts()):
        ?>


        <!--STYLES FOR posts : general style for the slider -->
        <?php //include ('a-rcp-style.php');
        include A_RCP_PLUGIN_DIR .'/themes/standard_theme.php';
        ?>



        <?php

            //include shortcode content
            //include ('a-rcp-shortcode-content.php');
            wp_reset_postdata();
        ?>

            <!--INITIALIZE THE SLIDER-->
            <script>
                jQuery(document).ready(function($){
                    $('.venobox').venobox();
                    // popular_1
                    //var $standard = $('.standard');
                    //$standard.owlCarousel({
                    //    items: 2,
                    //    loop: true,
                    //    autoplay: false,
                    //    margin: 30
                    //})
                    ////
                    /////* custom trigger */
                    //$('.standard_nav .prev').on('click', function() {
                    //    $standard.trigger('prev.owl.carousel');
                    //});
                    //$('.standard_nav .next').on('click', function() {
                    //    $standard.trigger('next.owl.carousel');
                    //});
                var postSlider = $("#<?= $random_adl_rec_post_wrapper_id;?>");
                //var postSlider = $(".popular_1");
                    postSlider.owlCarousel({
                        margin:20,
                        loop:true,
                        autoWidth:false,
                        responsiveClass:true,
                        dots:<?php echo (!empty($adl_rec_post_pagination) && ($adl_rec_post_pagination == 'yes')) ? 'true' : 'false';?>,
                        autoplay:<?php echo (!empty($adl_rec_post_auto_play) && ($adl_rec_post_auto_play == 'yes')) ? 'true' : 'false';?>,

                        autoplayTimeout: <?php echo $adl_rec_post_slide_speed; ?>,
                        autoplayHoverPause: false,
                        //dotData:true,
                        //dotsEach:true,
                        slideBy:1,

                        responsive:{
                            0 : {
                                items:1,
                            },
                            500: {
                                items:<?php echo $adl_rec_post_item_on_mobile;?>,
                            },
                            600 : {

                                items:<?php echo ($adl_rec_post_item_on_tablet > 1) ? $adl_rec_post_item_on_tablet- 1 : $adl_rec_post_item_on_tablet  ;?>,

                            },
                            768:{
                                items:<?php echo $adl_rec_post_item_on_tablet;?>,

                            },
                            1199:{
                                items:<?php echo $adl_rec_post_item_on_desktop;?>,

                            }
                        }
                    });

                    // custom navigation button for slider
                    // Go to the next item
                    $('#adl_rcp_wrap_<?= $random_adl_rec_post_wrapper_id;?> .next').click(function() {
                        postSlider.trigger('next.owl.carousel');
                    });
                        // Go to the previous item
                    $('#adl_rcp_wrap_<?= $random_adl_rec_post_wrapper_id;?> .prev').click(function() {
                        // With optional speed parameter
                        // Parameters has to be in square bracket '[]'
                        postSlider.trigger('prev.owl.carousel');
                    });

                    // stop on hover but play after hover out
                    <?php if(!empty($adl_rec_post_stop_on_hover)){ ?>
                        postSlider.hover(
                            function(){
                                postSlider.trigger('stop.owl.autoplay');
                            },
                            function(){
                                postSlider.trigger('play.owl.autoplay');
                            }
                        );
                    <?php } ?>


                });
            </script>
        </div> <!--    ends div.outer_wrap
    <?php else:
        _e('No Post Found.', A_RCP_TEXTDOMAIN);
    endif; // if($loop->have_posts() ends
    ?>



    <?php
    $content = ob_get_clean();
    return $content;
}

add_shortcode('adl-recent-post', 'adl_rec_post_shortcode_output');