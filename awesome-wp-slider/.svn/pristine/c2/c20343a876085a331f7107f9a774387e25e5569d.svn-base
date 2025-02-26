<?php 
if(!defined('ABSPATH')) die ('-1');
function aws_slide_shortcode($atts){
    extract( shortcode_atts( array(
        'count' => 3,
        'loop' => true,
        'dots' => true,
        'nav' => true,
        'autoplay' => true,
        'autoplayTimeout' => 5000,
        'order' => 'ASC',
        'animation' => 'fadeIn',
    ), $atts) );
    
    $args = array(
        'posts_per_page' => esc_attr( $count ), 
        'post_type' => 'slide',
        'order' => esc_attr($order)
    );

    $get_post = new WP_Query($args);   
    $slider_random_number = rand(6982887, 74634636); 
    $aws_slide_markup = '
    	<script>
    		jQuery(window).load(function(){
    			jQuery(".slide-main-'.esc_attr( $slider_random_number ).'").owlCarousel({
    				items:1,
    				loop:'.esc_attr($loop).',
    				dots:'.esc_attr($dots).',
    				nav:'.esc_attr($nav).',
    				autoplay:'.esc_attr($autoplay).',
    				autoplayTimeout:'.esc_attr($autoplayTimeout).',
    				navText:["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
    				smartSpeed: 700,
                    center:false,
    			});
                var owl = jQuery(".slide-main-'.esc_attr( $slider_random_number ).'");
                owl.owlCarousel();
                owl.on("translated.owl.carousel", function (event) {
                    jQuery(".slide-text h1").addClass("'.esc_attr($animation).' animated").show();
                    jQuery(".slide-text p").addClass("'.esc_attr($animation).' animated").show();
                    jQuery(".slide-text .button").addClass("'.esc_attr($animation).' animated").show();
                });
                owl.on("translate.owl.carousel", function (event) {
                    jQuery(".slide-text h1").removeClass("'.esc_attr($animation).' animated").hide();
                    jQuery(".slide-text p").removeClass("'.esc_attr($animation).' animated").hide();
                    jQuery(".slide-text .button").removeClass("'.esc_attr($animation).' animated").hide();
                })
    		});
    	</script>
    ';  


    $aws_slide_markup .= '
        <section id="j-slider" class="clearfix">
            <div id="particles-js"></div>
            <div class="slide-main-'.esc_attr( $slider_random_number ).'">
    ';

    while($get_post->have_posts()) : $get_post->the_post();
        $post_id = get_the_ID();

        if(get_post_meta( $post_id, 'aws_slide_options', true )){
            $slide_meta = get_post_meta( $post_id, 'aws_slide_options', true );
        }else{
            $slide_meta = array();
        }
        

        if(array_key_exists('slide_sub_title', $slide_meta)){
            $slide_sub_title = $slide_meta['slide_sub_title'];
        }else{
            $slide_sub_title = esc_html__( 'Lorem ipsum dolor', 'aws-toolkit' );
        }
        

        if(array_key_exists('slide_text_width', $slide_meta)){
            $slide_text_width = $slide_meta['slide_text_width'];
        }else{
            $slide_text_width = 'col-md-12';
        }

        if(array_key_exists('slide_text_offset', $slide_meta)){
            $slide_text_offset = $slide_meta['slide_text_offset'];
        }else{
            $slide_text_offset = 'no-offset';
        }

        if(array_key_exists('slide_text_align', $slide_meta)){
            $slide_text_align = $slide_meta['slide_text_align'];
        }else{
            $slide_text_align = 'left';
        }

        if(array_key_exists('slide_text_color', $slide_meta)){
            $slide_text_color = $slide_meta['slide_text_color'];
        }else{
            $slide_text_color = '#fff';
        }

        if(array_key_exists('slider_enable_overlay', $slide_meta)){
            $slider_enable_overlay = $slide_meta['slider_enable_overlay'];
        }else{
            $slider_enable_overlay = false;
        }

        if(array_key_exists('slide_overlay_percentage', $slide_meta)){
            $slide_overlay_percentage = $slide_meta['slide_overlay_percentage'];
        }else{
            $slide_overlay_percentage = 0.6;
        }

        if(array_key_exists('slide_overlay_color', $slide_meta)){
            $slide_overlay_color = $slide_meta['slide_overlay_color'];
        }else{
            $slide_overlay_color = '#000';
        }


        $aws_slide_markup .= ' <div class="single-slider" style="background-image:url('.esc_url(get_the_post_thumbnail_url($post_id, 'large')).');" >';

        if( $slider_enable_overlay == true ){
            $aws_slide_markup .= '<div style="opacity:'.esc_attr( $slide_overlay_percentage ).';background-color:'.esc_attr($slide_overlay_color).'" class="aws-slide-overlay"></div>';
        }

       $aws_slide_markup .= ' 
            <div class="container">
                <div class="row">
                    <div class="'.esc_attr($slide_text_width).' '.esc_attr($slide_text_offset).'">
                        <div class="slide-text '.esc_attr($slide_text_align).'" style="color:'.esc_attr($slide_text_color).'">
                            <h1><span>'.esc_html($slide_sub_title).'</span>'.esc_html(get_the_title( $post_id )).'</h1>
                            '.wpautop( esc_html( get_the_content($post_id) ) ).'';

                            if(!empty($slide_meta['slider_buttons'])){
                                $aws_slide_markup .= '<div class="slide-button">';

                                    foreach ($slide_meta['slider_buttons'] as $button) {

                                        if($button['link_type'] ==1){
                                            $btn_link = get_page_link($button['link_to_page']);
                                        }else{
                                            $btn_link = $button['link_to_external'];
                                        }

                                        $aws_slide_markup .= '<a href="'.esc_url( $btn_link ).'" class="button '.esc_attr( $button['type']  ).'">'.esc_html( $button['button_text'] ).'</a>';
                                    } 
                                $aws_slide_markup .= '</div>';
                            }
$aws_slide_markup .= ' 
                        </div>
                    </div>
                </div>
            </div>
        '; 
     $aws_slide_markup.= '</div>'; 

    endwhile;
     
    $aws_slide_markup.= '</div></section>';
    wp_reset_query();
    return $aws_slide_markup;
}
add_shortcode('aws_slides', 'aws_slide_shortcode');