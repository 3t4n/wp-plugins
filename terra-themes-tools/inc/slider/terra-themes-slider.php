<?php

// Mountain Slider (header)
function terra_themes_header_slider_shortcode( $atts ) {

    // Attributes
    $args = shortcode_atts(
        array(
            'slider' => '',
            'autoplay' => '',
            'transition' => '',
            'navigation' => '',
            'pagination' => '',
            'stop_on_hover' => '',
            'overlay' => '',
            'responsive' => '',
        ), $atts
    );

    $slider         = isset( $args['slider'] ) ? esc_attr($args['slider']) : false;
    $autoplay       = isset( $args['autoplay'] ) ? esc_attr($args['autoplay']) : false;
    $transition     = isset( $args['transition'] ) ? esc_attr($args['transition']) : 'fade';
    $navigation     = isset( $args['navigation'] ) ? esc_attr($args['navigation']) : false;
    $pagination     = isset( $args['pagination'] ) ? esc_attr($args['pagination']) : false;
    $stop_on_hover  = isset( $args['stop_on_hover'] ) ? esc_attr($args['stop_on_hover']) : false;
    $overlay        = isset( $args['overlay'] ) ? esc_attr($args['overlay']) : false;
    $responsive     = isset( $args['responsive'] ) ? esc_attr($args['responsive']) : false;

    if ( ! in_array( $transition, array('fade', 'fadeUp', 'backSlide', 'goDown') ) ) {
        $transition = 'fade';
    }

    $output = ''; //Start output
  
    //Build the layout
    $output .= '<div class="terra-themes-header-slider owl-carousel carousel header-container" data-autoplay="' . $autoplay . '" data-transition="' . $transition . '" data-pagination="' . $pagination . '" data-hoverstop="' . $stop_on_hover . '" data-responsive="' . $responsive . '">';

    $s = new WP_Query( array(
        'no_found_rows'     => true,
        'post_status'       => 'publish',
        'post_type'         => 'slides',
        'posts_per_page'    => -1,
        'slides-category'   => $slider
        ) );

        if ($s->have_posts()) :
            while ( $s->have_posts() ) : $s->the_post();
                global $post;

                //Get the attributes from meta fields
                $slide_is_video     = get_post_meta( $post->ID, 'tt-slide-is-video', true );
                $title              = get_post_meta( $post->ID, 'tt-title', true );
                $title_tag          = get_post_meta( $post->ID, 'tt-title-tag', true );
                $text               = get_post_meta( $post->ID, 'tt-text', true );
                $text_tag           = get_post_meta( $post->ID, 'tt-text-tag', true );
                $button_text_one    = get_post_meta( $post->ID, 'tt-button-text-one', true );
                $button_text_two    = get_post_meta( $post->ID, 'tt-button-text-two', true );
                $button_link_one    = get_post_meta( $post->ID, 'tt-button-link-one', true );
                $button_link_two    = get_post_meta( $post->ID, 'tt-button-link-two', true );
                $arrow_button       = get_post_meta( $post->ID, 'tt-arrow-button', true );
                $content_align      = get_post_meta( $post->ID, 'tt-content-align', true );
                $image_url          = get_post_meta( $post->ID, 'tt-image-url', true );
                $image_alt          = get_post_meta( $post->ID, 'tt-image-alt', true );
                $image_zoom         = get_post_meta( $post->ID, 'tt-image-zoom', true );
                $video_poster_url   = get_post_meta( $post->ID, 'tt-video-poster-url', true );
                $video_poster_alt   = get_post_meta( $post->ID, 'tt-video-poster-alt', true );

                $arrow_button_url   = get_theme_mod( 'headerimage_page_button_url', '#content' );

                $tagOptions = array('', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');
                if ( in_array($title_tag, $tagOptions) && !empty($title_tag) ) {
                    $title_tag = $title_tag;
                } else {
                    $title_tag = 'h2';
                }
                if ( in_array($text_tag, $tagOptions) && !empty($text_tag) ) {
                    $text_tag = $text_tag;
                } else {
                    $text_tag = 'p';
                }

                $content_align_class = '';
                if ( $content_align == '' ) :
                    $content_align_class = 'tt-content-center';
                elseif ( $content_align == 'Left' ) :
                    $content_align_class = 'tt-content-left';
                elseif ( $content_align == 'Center' ) :
                    $content_align_class = 'tt-content-center';
                elseif ( $content_align == 'Right' ) :
                    $content_align_class = 'tt-content-right';
                endif;

                $image_zoom_class = '';
                if ( $image_zoom == 'Zoom In Center' ) :
                    $image_zoom_class = 'do-animate tt-image-zoom-center';
                elseif ( $image_zoom == 'Zoom In Top Left' ) : 
                    $image_zoom_class = 'do-animate tt-image-zoom-top-left';
                elseif ( $image_zoom == 'Zoom In Top Right' ) : 
                    $image_zoom_class = 'do-animate tt-image-zoom-top-right';
                elseif ( $image_zoom == 'Zoom In Bottom Left' ) : 
                    $image_zoom_class = 'do-animate tt-image-zoom-bottom-left';
                elseif ( $image_zoom == 'Zoom In Bottom Right' ) : 
                    $image_zoom_class = 'do-animate tt-image-zoom-bottom-right';
                endif;

                $append_overlay = '';
                if ( $overlay == 'true' ) :
                    $append_overlay = '<div class="overlay"></div>';
                endif;

                $navigation_output = '';
                if ( $navigation == 'true' ) :
                    $navigation_output = '<div class="terra-themes-slider-controls"><div class="prev"><i class="fa fa-angle-left"></i></div><div class="next"><i class="fa fa-angle-right"></i></div></div>';
                endif;

                if ( $slide_is_video == false && $image_url != '' ) :

                    $output .= '<div class="terra-themes-header-slider-inner">';
                        $output .= $navigation_output;
                        $output .= '<div class="header-slider-item parallax-header">';
                            $output .= '<div class="header-image ' . $image_zoom_class . '" style="background-image: url(' . esc_url($image_url) . ');">';
                            $output .= '<img class="header-image-small" src="' . esc_url($image_url) .'" alt="' . esc_attr($image_alt) . '" />';
                            $output .= $append_overlay;
                            $output .= '</div>';
                            $output .= '<div class="parallax-text container ' . $content_align_class . '">';
                                $output .= '<div class="row">';
                                    $output .= '<div class="col-xs-12 col-sm-12 col-md-12">';
                                        $output .= '<' . $title_tag . ' class="header-image-heading">' . esc_html($title) . '</' . $title_tag . '>';
                                        $output .= '<' . $text_tag . ' class="header-image-text">' . esc_html($text) . '</' . $text_tag . '>';
                                        $output .= '<div class="header-cta-buttons">';

                                            if ( ! empty($button_text_one) )
                                                $output .= '<a href="' . esc_url($button_link_one) . '" class="header-cta-one terra-button smooth-scroll">' . esc_html($button_text_one) . '</a>';

                                            if ( ! empty($button_text_two) )
                                                $output .= '<a href="' . esc_url($button_link_two) . '" class="header-cta-two terra-button border smooth-scroll">' . esc_html($button_text_two) . '</a>';

                                         $output .= '</div>'; // /.header-cta-buttons
                                    $output .= '</div>'; // /.col-xs-12-col-sm-12.col-md-12
                                $output .= '</div>'; // /.row
                            $output .= '</div>'; // /.parallax-text .container
                        $output .= '</div>';  // /.header-slider-item.parllax-header.header-image

                        if ( $arrow_button == 'Yes' )
                            $output .= '<a href="' . esc_url( $arrow_button_url ) . '" class="header-button header-button-down smooth-scroll"><i class="fa fa-angle-down"></i></a>';

                    $output .= '</div>'; // /.terra-themes-header-slider-inner

                elseif ( $slide_is_video == true ) :
                    $video_webm = get_post_meta( $post->ID, 'tt-video-webm', true );
                    $video_mp4  = get_post_meta( $post->ID, 'tt-video-mp4', true );
                    $video_ogv  = get_post_meta( $post->ID, 'tt-video-ogv', true );

                    $output .= '<div class="terra-themes-header-slider-inner">';
                        $output .= $navigation_output;
                        $output .= '<div class="header-slider-item parallax-header header-image header-video">';

                            $output .= '<div class="video-mobile-image" style="background-image: url(' . $video_poster_url . ');" >';
                                $output .= '<img src="' . esc_url($video_poster_url) . '" alt="' . esc_attr($video_poster_alt) . '" class="video-poster-small" />';
                            $output .= '</div>'; // /.video-mobile-image
                            $output .= '<div class="video-wrap">';
                                $output .= '<video class="video" poster="' . $video_poster_url . '" muted volume="0" autoplay loop preload="auto" >';
                                if ( ! empty($video_webm) ) { $output .= '<source src="' . esc_url($video_webm) . '" type="video/webm">'; }
                                if ( ! empty($video_mp4) ) { $output .= '<source src="' . esc_url($video_mp4) . '" type="video/mp4">'; }
                                if ( ! empty($video_ogv) ) { $output .= '<source src="' . esc_url($video_ogv) . '" type="video/ogv">'; }
                                $output .= esc_html__('Your browser does not support the <video> tag.', 'terra_themes_tools');
                                $output .= '</video>';
                            $output .= '</div>'; // /.video-wrap

                            $output .= $append_overlay;
                            $output .= '<div class="parallax-text container ' . $content_align_class . '">';
                                $output .= '<div class="row">';
                                    $output .= '<div class="col-xs-12 col-sm-12 col-md-12">';
                                        $output .= '<' . $title_tag . ' class="header-image-heading">' . esc_html($title) . '</' . $title_tag . '>';
                                        $output .= '<' . $text_tag . ' class="header-image-text">' . esc_html($text) . '</' . $text_tag . '>';
                                        $output .= '<div class="header-cta-buttons">';

                                            if ( ! empty($button_text_one) )
                                                $output .= '<a href="' . esc_url($button_link_one) . '" class="header-cta-one terra-button smooth-scroll">' . esc_html($button_text_one) . '</a>';

                                            if ( ! empty($button_text_two) )
                                                $output .= '<a href="' . esc_url($button_link_two) . '" class="header-cta-two terra-button border smooth-scroll">' . esc_html($button_text_two) . '</a>';

                                        $output .= '</div>'; // /.header-cta-buttons
                                    $output .= '</div>'; // /.col-xs-12.col-sm-12.col-md-12
                                $output .= '</div>'; // /.row
                            $output .= '</div>'; // /.parallax-text.container
                        $output .= '</div>'; // /.header-slider-item.parallax-header.header-image.header-video

                        if ( $arrow_button == 'Yes' )
                            $output .= '<a href="' . $arrow_button_url . '" class="header-button header-button-down smooth-scroll"><i class="fa fa-angle-down"></i></a>';

                    $output .= '</div>'; // /.terra-themes-header-slider-inner

                endif;
                
                endwhile;

        wp_reset_postdata();
        endif;

    $output .= '</div>'; // /.terra-themes-header-slider.owl-carousel.header-container

    return $output;
}
add_shortcode( 'terra-themes-header-slider', 'terra_themes_header_slider_shortcode' );