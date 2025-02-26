<?php 
/* Diamond Gallery Layout */ 
$aigwl_default_option['aigwl_image_hover_effect'] = get_post_meta($aigwl_gallery_id,'aigwl_image_hover_effect',true);
?>
<div class="aigwl_diamond_gallery">
    <?php 
       $image_array = get_post_meta($aigwl_gallery_id,'aigwl_gallery',true);
	    $aigwl_gallery_images = explode(',', $image_array);
         foreach ($aigwl_gallery_images as $attachment_id) {
         $diamond_gallery_image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', TRUE); ?>
         <?php if(wp_get_attachment_url( $attachment_id ) != ''){ ?>
         <div
            class="aigwl_diamond_gallery_itemWrapper <?php if($aigwl_default_option['aigwl_image_hover_effect'] ==5){echo esc_attr("aigwl_grey_scale"); } else if($aigwl_default_option['aigwl_image_hover_effect'] ==6){ echo esc_attr("wobble-vertical-effect"); } ?>">
            <div class="aigwl_diamond_gallery_cover">
                  <div class="aigwl_diamond_gallery_item ">
                     <div class="aigwl_diamond_gallery_itemInner">
                        <a href="<?php echo esc_url(wp_get_attachment_url( $attachment_id ));?>"
                              data-fancybox="aigwl_gallery">
                              <img class="diamond_gallery_img aigwl_diamond_gallery_pic"
                                 src="<?php echo esc_url(wp_get_attachment_url( $attachment_id ));?>"
                                 alt="<?php echo esc_html($diamond_gallery_image_alt); ?>">
                        </a>
                     </div>
                  </div>
            </div>
         </div>
    <?php } } ?>
</div>