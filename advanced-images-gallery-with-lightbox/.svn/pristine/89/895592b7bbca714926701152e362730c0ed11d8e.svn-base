<?php /* Hexagonal Gallery Layout */ 
$aigwl_default_option['aigwl_image_hover_effect'] = get_post_meta($aigwl_gallery_id,'aigwl_image_hover_effect',true);
?>
<div class="aigwl_hexagonal_gallery_sec">
    <div class="hexagonal_gallery_sec">
        <?php 
       $image_array = get_post_meta($aigwl_gallery_id,'aigwl_gallery',true);
	    $aigwl_gallery_images = explode(',', $image_array);
       
         foreach ($aigwl_gallery_images as $attachment_id) {
            $hexagonal_gallery_image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', TRUE); 
            $hexagonal_gallery_image_title = get_the_title($attachment_id);
            ?>
        <div
            class="aigwl_hexagonal_gallery_item <?php if($aigwl_default_option['aigwl_image_hover_effect'] ==5){echo esc_attr("aigwl_grey_scale"); } else if($aigwl_default_option['aigwl_image_hover_effect'] ==6){ echo esc_attr("wobble-vertical-effect"); } ?>">
            <div class="aigwl_hexagon aigwl_hexagon2">
                <div class="aigwl_hexagon1">
                    <a href="<?php echo esc_url(wp_get_attachment_url( $attachment_id ));?>"
                        data-fancybox="aigwl_gallery">
                        <img class="hexagon-in2" src="<?php echo esc_url(wp_get_attachment_url( $attachment_id ));?>"
                            alt="<?php echo esc_html($hexagonal_gallery_image_alt); ?>" />
                        <?php if($aigwl_default_option['aigwl_image_hover_effect'] ==1){ ?>
                        <div class="aigwl_hexagonal_gallery_overlay">
                            <div class="aigwl_hexagonal_gallery_img_title">
                                <?php echo esc_html($hexagonal_gallery_image_title); ?></div>
                        </div>
                        <?php  } ?>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>