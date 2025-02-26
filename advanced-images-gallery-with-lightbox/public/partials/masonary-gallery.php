<?php /* Masonary Gallery Layout */ 
$aigwl_default_option['aigwl_image_hover_effect'] = get_post_meta($aigwl_gallery_id,'aigwl_image_hover_effect',true);
?>
<div class="aigwl_masonary_gallery gallery">
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>
    <?php 
       $image_array = get_post_meta($aigwl_gallery_id,'aigwl_gallery',true);
	    $aigwl_gallery_images = explode(',', $image_array);
      
         foreach ($aigwl_gallery_images as $attachment_id) {
         $masonary_gallery_image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', TRUE); 
         $masonary_gallery_image_title = get_the_title($attachment_id);
         if(wp_get_attachment_url( $attachment_id ) != ''){ ?>
            <div class="grid-item <?php if($aigwl_default_option['aigwl_image_hover_effect'] ==5){echo esc_attr("aigwl_grey_scale"); } else if($aigwl_default_option['aigwl_image_hover_effect'] ==6){ echo esc_attr("wobble-vertical-effect"); } else if($aigwl_default_option['aigwl_image_hover_effect'] ==2){ echo esc_attr("img-hover-zoom img-hover-zoom--basic"); } else if($aigwl_default_option['aigwl_image_hover_effect'] ==3){ echo esc_attr("img-hover-zoom-out img-hover-zoom-out-basic"); } ?>">
                <a href="<?php echo esc_url(wp_get_attachment_url( $attachment_id ));?>" data-fancybox="aigwl_gallery">
                    <img class="masonary_gallery_img" src="<?php echo esc_url(wp_get_attachment_url( $attachment_id ));?>"
                        alt="<?php echo esc_html($masonary_gallery_image_alt); ?>">
                    <?php if($aigwl_default_option['aigwl_image_hover_effect'] ==4){ ?>
                    <div class="aigwl_masonary_gallery_overlay">
                        <div class="aigwl_masonary_gallery_img_title"><?php echo esc_html($masonary_gallery_image_title); ?>
                        </div>
                    </div>
                    <?php  } ?>
                </a>
            </div>
    <?php } } ?>
</div>