<?php /* Slick Slider Layout */
$aigwl_default_option['aigwl_image_hover_effect'] = get_post_meta($aigwl_gallery_id,'aigwl_image_hover_effect',true);
?>
<div class="aigwl_gallery_slider container">
    <div class="SlickCarousel">
        <?php 
         $image_array = get_post_meta($aigwl_gallery_id,'aigwl_gallery',true);
         $aigwl_gallery_images = explode(',', $image_array);
         
            foreach ($aigwl_gallery_images as $attachment_id) { 
               $slick_slider_image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', TRUE);
               $slick_slider_image_title = get_the_title($attachment_id);
               ?>
               <div class="aigwl_gallery_block <?php if($aigwl_default_option['aigwl_image_hover_effect'] ==5){echo esc_attr("aigwl_grey_scale"); } elseif($aigwl_default_option['aigwl_image_hover_effect'] ==6){ echo esc_attr("wobble-vertical-effect"); } elseif($aigwl_default_option['aigwl_image_hover_effect'] ==2){ echo esc_attr("img-hover-zoom img-hover-zoom--basic"); } else if($aigwl_default_option['aigwl_image_hover_effect'] ==3){ echo esc_attr("img-hover-zoom-out img-hover-zoom-out-basic"); } ?>">
                     <div class="aigwl_slider_content">
                        <div class="aigwl-img-fill">
                           <a href="<?php echo esc_url(wp_get_attachment_url( $attachment_id ));?>"
                                 data-fancybox="aigwl_gallery">
                                 <img class="slick_slider_img"
                                    src="<?php echo esc_url(wp_get_attachment_url( $attachment_id ));?>"
                                    alt="<?php echo esc_html($slick_slider_image_alt); ?>">
                                    <?php if($aigwl_default_option['aigwl_image_hover_effect'] ==4){ ?>
                                       <div class="aigwl_slick_slider_overlay">
                                          <div class="aigwl_slick_slider_img_title"><?php echo esc_html($slick_slider_image_title); ?>
                                          </div>
                                       </div>
                                    <?php  } ?>
                           </a>
                        </div>
                     </div>
               </div>
        <?php } ?>
    </div>
</div>