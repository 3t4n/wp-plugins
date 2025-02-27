<style>
    <?php if (!esc_attr($settings['show_block_column_slide_nav'], true)) : 
	$unique_id = 'id_' . uniqid(); // Generate a unique ID
	?>
       .wps_thumb_<?php echo esc_attr($unique_id); ?> .product_block_one .hover-slider-indicator {
            display:none!important;
        }
    <?php endif; ?>

    <?php
  if ( 'product_color' === $settings['wps_product_color_dot'] ) {   
    $images = $repeater_images;
    if ($images && isset($images['pagination_button_color'])) {
        foreach ($images['pagination_button_color'] as $index => $color_value) {
            if (!empty($color_value)) {
                echo '
                .wps_thumbnail_area .swiper-pagination .swiper-pagination-bullet:nth-child(' . esc_attr($index + 1) . ') {
                    background: ' . esc_attr($color_value) . ';
                }
				.wps_thumbnail_area .product_block_one .hover-slider-indicator-dot:nth-child(' . esc_attr($index + 1) . ') {
                    background: ' . esc_attr($color_value) . ';	
                }

				';
            }
        }
    }
  }
 ;
?>
</style>

<?php

$thumbnail_bg_option = $this->get_settings('wps_thumbnial_bgcolor_select');


$thumbnail_bg_color = '';

if ($thumbnail_bg_option === 'bg_meta') {
    $thumbnail_bg_color = get_post_meta(get_the_ID(), 'thumbnail_bg_color', true);
} elseif ($thumbnail_bg_option === 'bg_elementor') {
    // Add logic to retrieve background color from Elementor settings if needed
    // Example: $thumbnail_bg_color = get_elementor_setting('thumbnail_bg_color');
}

// Get the default background color from settings if available
$default_bg_color = isset($settings['wps_thumbnail_bg']) ? $settings['wps_thumbnail_bg'] : '';

// Generate inline style based on the selected color or default
// $inlineStyle = $thumbnail_bg_color ? sprintf('style="background-color: %s;"', esc_attr($thumbnail_bg_color)) : sprintf('style="background-color: %s;"', esc_attr($default_bg_color));
// 
$bg_color = $thumbnail_bg_color ? esc_attr($thumbnail_bg_color) : ($default_bg_color ? esc_attr($default_bg_color) : '');

$inlineStyle = $bg_color ? sprintf('background-color: %s;', $bg_color) : '';

?>





<?php
//************* This aea is thumbnail Meta  Input Settings ===================================**

if ('thumbnai_meta_optins' === sanitize_text_field($settings['show_thumbnaili_view_setting'])) : ?>

    <div class="wps_thumbnail_area">

        <?php if ($thumbnail_style === 'style-2') : ?>
         
<?php if ( !empty( esc_url( wp_get_attachment_url( $meta_image['id'] ) ) ) ) : ?>	
		
            <div class="mr_product_thumb product_image">
                <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                    <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                        <img src="<?php echo esc_url(wp_get_attachment_url($meta_image['id'])); ?>" alt="">
                    </a>
                </figure>
            </div>
		
		
		
		   <?php else : ?>
                    <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                        <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                            <?php echo get_the_post_thumbnail(); ?>
                        </figure>
                    </div>
		
            <?php endif; ?>

<?php elseif ($thumbnail_style === 'style-3') : ?>
		
		
		
<?php if ( !empty( esc_url( wp_get_attachment_url( $meta_image_two['id'] ) ) ) ) : ?>
	
		
            <!-- Style 3: Flip Box -->
            <div class="flip-box mr_product_thumb product_image">
                <div class="flip-box-inner" style="<?php echo esc_attr($inlineStyle); ?>">
                    <div class="flip-box-front">
                        <img src="<?php echo esc_url(wp_get_attachment_url($meta_image['id'])); ?>" alt="" style="width:100%;height:100%">
                    </div>
                    <div class="flip-box-back">
                        <img src="<?php echo esc_url(wp_get_attachment_url($meta_image_two['id'])); ?>" alt="" style="width:100%;height:100%">
                    </div>
                </div>
            </div>
		
		
		
   <?php else : ?>
                    <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                        <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                            <?php echo get_the_post_thumbnail(); ?>
                        </figure>
                    </div>
		
            <?php endif; ?>
		
		
		
		
	 <!-- Slide Number Style -->
		  <?php elseif ($thumbnail_style === 'style-4') : ?>

		
           <!-- Slide Number Style -->
            <?php if (!empty($repeater_images['select_image_media']) && is_array($repeater_images['select_image_media'])) : ?>
               
		       <?php
                $has_images = false;

                foreach ($repeater_images['select_image_media'] as $image_set) {
                    $image_id = isset($image_set['id']) ? $image_set['id'] : '';
                    $image_url = isset($image_set['url']) ? $image_set['url'] : '';

                    if (!empty($image_id) && !empty($image_url)) {
                        $has_images = true;
                        break; // Found at least one valid image, no need to continue checking
                    }
                }
                ?>

                <?php if ($has_images) : ?>
                    <div class="mr_product_thumb product_image">
                        <div class="swiper mySwiper" style="<?php echo esc_attr($inlineStyle); ?>">
                            <div class="swiper-wrapper">
                                <?php foreach ($repeater_images['select_image_media'] as $image_set) : ?>
                                    <?php
                                    $image_id = isset($image_set['id']) ? $image_set['id'] : '';
                                    $image_url = isset($image_set['url']) ? $image_set['url'] : '';

                                    if (!empty($image_id) && !empty($image_url)) :
                                    ?>
                                        <div class="swiper-slide">
                                            <?php echo wp_get_attachment_image($image_id, 'full', false, array('alt' => '')); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php if (esc_attr($settings['show_block_column_slide_nav'], true)) : ?>
                                <div class="swiper-pagination"></div>
                            <?php endif; ?>
                        </div>
                    </div>  
		
		
                <?php endif; ?>

        
		
		    <?php else : ?>
                    <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                        <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                            <?php echo get_the_post_thumbnail(); ?>
                        </figure>
                    </div>
		
		
		 <?php endif; ?>		


		
        <?php elseif ($thumbnail_style === 'style-5') : ?>
		
  <?php if (!empty($repeater_images['select_image_media']) && is_array($repeater_images['select_image_media'])) : ?>
		
            <!-- Style 5: Hover Slide -->
            <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                <div class="product-inner">
                    <div class="product_image" style="<?php echo esc_attr($inlineStyle); ?>">

			<?php
            $images = isset($repeater_images['select_image_media']) && is_array($repeater_images['select_image_media']) ? $repeater_images['select_image_media'] : array();
            $image_urls = array();
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');

            // Process images only if $images is not empty
            if (!empty($images)) {
                foreach ($images as $key => $image_set) {
                    $image_url = isset($image_set['url']) ? $image_set['url'] : '';
                    $first_image_url = isset($images[0]['url']) ? $images[0]['url'] : '';

                    if ($image_url && $key !== 0) {
                        $image_urls[] = esc_url($image_url);
                    }
                }
            }

            $image_hover_slides = implode(',', $image_urls);

            if (!empty($image_hover_slides)) : ?>
						
                            <img src="<?php echo esc_url($first_image_url); ?>" data-hover-slides="<?php echo esc_attr($image_hover_slides); ?>" data-options="{&quot;touch&quot;: &quot;end&quot; }">
                        <?php else : ?>
                            <figure class="image-box">
                                <?php echo get_the_post_thumbnail(); ?>
                            </figure>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
		
		   <?php else : ?>
                    <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                        <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                            <?php echo get_the_post_thumbnail(); ?>
                        </figure>
                    </div>
		
            <?php endif; ?>
		
		
		

        <?php else : ?>
            <!-- Default Thumbnail -->
            <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                    <?php echo get_the_post_thumbnail(); ?>
                </figure>
            </div>

        <?php endif; ?>

    </div>

<?php endif; ?>




<?php
//************* This aea is thumbnail Elemntor Input Settings ===================================***/

if ('thumbnai_elementor_optins' === sanitize_text_field($settings['show_thumbnaili_view_setting'])) : ?>

    <div class="wps_thumbnail_area">

         	<?php
		// Elemntor Thumbnail
		
		if ('thumbnail' === sanitize_text_field($settings['wps_thumbnial_select'])) : ?>
                <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                    <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                        <?php echo get_the_post_thumbnail(); ?>
                    </figure>
                </div>
          <?php endif; ?>
		
		
		
		
		<?php
		// Elemntor Thumb Meta
		
		if ('meta' === sanitize_text_field($settings['wps_thumbnial_select'])) : ?>
            <!-- Meta Style -->
            <?php if (!empty($meta_image['id']) && $meta_image['id'] > 0) : ?>
                <div class="mr_product_thumb product_image">
                    <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                        <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                            <?php echo wp_get_attachment_image($meta_image['id'], 'full', false, array('alt' => '')); ?>
                        </a>
                    </figure>
                </div>
            <?php else : ?>
                <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                    <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                        <?php echo get_the_post_thumbnail(); ?>
                    </figure>
                </div>
            <?php endif; ?>

        <?php endif; ?>
		
		
		
		<?php
		// Elemntor Meta Flip
		
		if ('meta_flip' === sanitize_text_field($settings['wps_thumbnial_select'])) : ?>
            <!-- Meta Flip Style -->
            <?php if (!empty($meta_image['id']) && !empty($meta_image_two['id']) && $meta_image['id'] && $meta_image_two['id']) : ?>
                <div class="flip-box mr_product_thumb product_image">
                    <div class="flip-box-inner" style="<?php echo esc_attr($inlineStyle); ?>">
                        <div class="flip-box-front">
                            <?php echo wp_get_attachment_image($meta_image['id'], 'full', false, array('style' => 'width:100%;height:100%')); ?>
                        </div>
                        <div class="flip-box-back">
                            <?php echo wp_get_attachment_image($meta_image_two['id'], 'full', false, array('style' => 'width:100%;height:100%')); ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                    <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                        <?php echo get_the_post_thumbnail(); ?>
                    </figure>
                </div>
            <?php endif; ?>

        <?php endif; ?>

		
		
 

        <?php
		
		// This is Elemnt Thumb Slide
		if ('slide_number' === sanitize_text_field($settings['wps_thumbnial_select'])) : ?>
		
            <!-- Slide Number Style -->
            <?php if (!empty($repeater_images['select_image_media']) && is_array($repeater_images['select_image_media'])) : ?>
               
		       <?php
                $has_images = false;

                foreach ($repeater_images['select_image_media'] as $image_set) {
                    $image_id = isset($image_set['id']) ? $image_set['id'] : '';
                    $image_url = isset($image_set['url']) ? $image_set['url'] : '';

                    if (!empty($image_id) && !empty($image_url)) {
                        $has_images = true;
                        break; // Found at least one valid image, no need to continue checking
                    }
                }
                ?>

                <?php if ($has_images) : ?>
                    <div class="mr_product_thumb product_image">
                        <div class="swiper mySwiper" style="<?php echo esc_attr($inlineStyle); ?>">
                            <div class="swiper-wrapper">
                                <?php foreach ($repeater_images['select_image_media'] as $image_set) : ?>
                                    <?php
                                    $image_id = isset($image_set['id']) ? $image_set['id'] : '';
                                    $image_url = isset($image_set['url']) ? $image_set['url'] : '';

                                    if (!empty($image_id) && !empty($image_url)) :
                                    ?>
                                        <div class="swiper-slide">
                                            <?php echo wp_get_attachment_image($image_id, 'full', false, array('alt' => '')); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php if (esc_attr($settings['show_block_column_slide_nav'], true)) : ?>
                                <div class="swiper-pagination"></div>
                            <?php endif; ?>
                        </div>
                    </div>  
		
		
                <?php endif; ?>

        
		
		    <?php else : ?>
                    <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                        <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                            <?php echo get_the_post_thumbnail(); ?>
                        </figure>
                    </div>
		
		
		 <?php endif; ?>
		
        <?php endif; ?>

        <?php
		
		// **** This is Elemnt Hove Slide 
		
		if ('hover_slide' === sanitize_text_field($settings['wps_thumbnial_select'])) : ?>
            <!-- Hover Slide Style -->
            <?php if (isset($repeater_images['select_image_media']) && !empty($repeater_images['select_image_media'])) : ?>
                <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                    <div class="product-inner">
                        <div class="product_image" style="<?php echo esc_attr($inlineStyle); ?>">
                            <?php
                            $images = $repeater_images['select_image_media'];
                            $image_urls = array();
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');

                            foreach ($images as $key => $image_set) {
                                $image_url = isset($image_set['url']) ? $image_set['url'] : '';
                                $first_image_url = isset($images[0]['url']) ? $images[0]['url'] : '';

                                if ($image_url && $key !== 0) {
                                    $image_urls[] = esc_url($image_url);
                                }
                            }

                            $image_hover_slides = implode(',', $image_urls);

                            if (!empty($image_hover_slides)) : ?>
                                <img src="<?php echo esc_url($first_image_url); ?>" data-hover-slides="<?php echo esc_attr($image_hover_slides); ?>" data-options="{&quot;touch&quot;: &quot;end&quot; }">
                            <?php else : ?>
                                <figure class="image-box">
                                    <?php echo get_the_post_thumbnail(); ?>
                                </figure>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
		
		    <?php else : ?>
                    <div class="wps_thumb_<?php echo esc_attr($unique_id); ?> product_block_one mr_product_thumb product_image">
                        <figure class="image-box" style="<?php echo esc_attr($inlineStyle); ?>">
                            <?php echo get_the_post_thumbnail(); ?>
                        </figure>
                    </div>
		
            <?php endif; ?>
        <?php endif; ?>


    </div>

<?php endif; ?>
