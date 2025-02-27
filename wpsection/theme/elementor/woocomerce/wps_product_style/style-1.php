<?php
/*
wps_product_basic Style-1
*/
$templatePartDir = __DIR__ . '/../template_part/';
$unique_id = 'product_basic_one_' . uniqid(); // Generate a unique ID

echo '
<script>

    window["hoverSliderOptions"] = { preloadImages: true };

    jQuery(document).ready(function($) { 
        //put the js code under this line 
        
		var swiper = new Swiper(".' .  esc_js( $unique_id )  . ' .mySwiper", {
            pagination: {
                el: ".' . esc_js( $unique_id )  . ' .swiper-pagination",
                clickable: true,
            },
        
            autoplay: {
                delay: 3000, // Set the delay (in milliseconds) between slides
            },
        });
		
        //put the code above the line 
    });
</script>

';

?>
<section class="mr_shop mr_products_one produt_section product_basic_one <?php echo esc_attr($unique_id); ?>">
    <div class="auto-container">
        <div class="row row-5">
            <!-- While Loop Area -->
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php global $post, $product; ?>
                <!-- Product Column Start if WHILE LOOP -->
                <div class="wps_product_column <?php echo esc_attr($columns_markup_print); ?>">
                    <div class="mr_product_block product-block_hr_001">
                        <?php require esc_attr($templatePartDir . 'hook.php'); ?>
                        <div <?php wc_product_class(); ?>>
                            <!-- Product Style Start -->
                            <div class="mr_style_one wps_product_block_one">
                                <!-- Thumbnail Area -->
                                <?php if ($settings['show_product_x_thumbnail'] && !empty(get_the_post_thumbnail())) : ?>
                                    <div class="wps_thumbnail_area wps_slide_thumb">
                                        <?php
                                        require esc_attr($templatePartDir . 'hot_offer.php');
                                        require esc_attr($templatePartDir . 'special_offer.php');
                                        require esc_attr($templatePartDir . 'thumbnail.php');
                                        ?>
                                    </div><!-- End Thumbnail Area -->
                                    <?php require esc_attr($templatePartDir . 'product_overlay.php'); ?>
                                <?php endif; ?>
                                
                                <!-- Check if Columns Expand to Top -->
                                <?php if ('top' === $settings['wps_columns_expand']) : ?>
                                    <div class="wps_hide_two_block">
                                <?php endif; ?>
                                
                                <!-- Product Bottom Area -->
                                <div class="wps_product_details product_bottom mr_bottom wps_order_container">
                                    <?php
                                    // Include various template parts
                                    require esc_attr($templatePartDir . 'title.php');
                                    require esc_attr($templatePartDir . 'rating.php');
                                    require esc_attr($templatePartDir . 'price.php');
                                    require esc_attr($templatePartDir . 'progress.php');
                                    require esc_attr($templatePartDir . 'instock.php');
                                    require esc_attr($templatePartDir . 'offer_countdown.php');
                                    require esc_attr($templatePartDir . 'offer_text.php');
                                    require esc_attr($templatePartDir . 'category.php');
                                    require esc_attr($templatePartDir . 'feature_addtocart.php');
                                    ?>
                                </div>
                                
                                <!-- End Product Bottom Area -->
                                <?php if ('top' === $settings['wps_columns_expand']) : ?>
                                    </div><!-- End wps_hide_two_block -->
                                <?php endif; ?>
                            </div>
                            <!-- End Product Style One -->
                        </div>
                    </div>
                </div>
                <!-- End Product Column -->
            <?php endwhile; ?>
            <!-- End While Loop Area -->
		      </div>
		
<?php require $templatePartDir . 'pagination.php'; ?>
              


        


			
			
  

    </div>
</section>
