<?php

// Create Shortcode
function awesome_service_shortcode($atts) {
    global $awesome_service_options; $setting = get_option( 'awesome_service_options',$awesome_service_options);$zxcv;

    extract( shortcode_atts(
        array(
            'title_color'       => $setting['title_color'],
            'content_color'     => $setting['content_color'],
            'dots'              => $setting['awesome_service_dots'],
            'slidesToShow'      => $setting['slidesToShow'],
            'padding_top'       => $setting['padding_top'],
            'padding_bottom'    => $setting['padding_bottom'],
            'speed'             => $setting['speed'],
            'autoplay'          => $setting['awesome_service_autoplay'],
            'dis_none'          => $setting['awesome_service_number'],
            'number_color'      => $setting['awesome_service_number_color'],
        ),
        $attss
    ) );

    
    $loop = new WP_Query( array(
        'post_type'       => 'awesome_service_',
        'posts_per_page'  => -1,));
     
   
    $_news_list ='<script type="text/javascript">
    jQuery(document).ready(function(){
       
        jQuery(".service_slide").slick({
            autoplay: '.$autoplay.',
            autoplaySpeed: 2000,
            speed: '.$speed.',
            arrows: false,
            dots:'.$dots.',
            slidesToShow: '.$slidesToShow.',
            slidesToScroll: 2,
            responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: true,
                arrow: false,
                
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                arrow: false,
                
              }
            },
            {
              breakpoint: 575,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                arrow: false,
                
              }
            },
        ]

        });
 
   });
   
   </script>
   <section style="padding-top:'.esc_attr__( $padding_top ).'px; padding-bottom:'.esc_attr__( $padding_bottom ).'px" class="service">
        <div class="container">
            <div class="row">
                <div class="service_slide">'.
                    $x=1;
                     while($loop->have_posts()) : $loop->the_post();
                     $_news_list .= '
                    <div class="service_box text-center">
                        <div style="background:'.get_post_meta( get_the_ID(), 'awesome_service_pl_ser_color', true ).'" class="service_box_icon" >
                            <i style="'.esc_attr__( $iconcolor ).'" class="'.get_post_meta( get_the_ID(), 'awesome_service_pl_icon', true ).'"></i>
                            <h4 style="color:'.esc_attr__( $title_color ).'"  >'.get_the_title().'</h4>
                            <p style="color:'.esc_attr__( $content_color ).'">'.wp_trim_words( get_the_content(),  15, $more = null ).'</p>
                            <span style="display:'.esc_html__( $dis_none ).'; color:'.esc_attr__( $number_color ).'">'.$x++.'</span>
                        </div>
                    </div>';
                  endwhile;
                $_news_list .='</div></div></div></section>';

    wp_reset_query();
    return $_news_list;

 }

 add_shortcode('awesome_service','awesome_service_shortcode');