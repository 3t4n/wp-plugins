<?php
// Generate a unique identifier based on the widget instance ID
$templatePartDir = __DIR__ . '/../template_part/';


?>

<section class="mr_shop mr_products_one wps_slide_sweeper_two">
    <div class="auto-container">
        <div class="swiper-wrapper">
            <!-- While Loop Area -->
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php global $post, $product; ?>
                <!-- Product Column Start if WHILE LOOP -->
                <div class="wps_product_column">
                    <div class="mr_product_block product-block_hr_001">
                        <!-- Global Settings -->
                    
                         <?php require $templatePartDir . 'hook.php'; ?>
                        <div <?php wc_product_class(); ?>>
                            <!-- Product Style Start -->
                            <div class="mr_style_one wps_product_block_one">
                                <!-- Thumbnail Area -->
                                <!-- Product Bottom Area -->
                                <div class="wps_product_details product_bottom mr_bottom wps_order_container">
                                    <!-- Product Category -->
                                    <?php if ($settings['show_product_cat_features'] && !get_post_meta(get_the_id(), 'meta_show_catarea', true)) : ?>
                                        <div class="wps_order">
                                            <?php if ('style-2' === $settings['thumb_cat_postion_style'] && !get_post_meta(get_the_id(), 'meta_show_catimg', true)) : ?>
                                                <?php if ($thumbnail_url) : ?>
                                                    <div class="wps_cat_thumb">
                                                        <a class="wps_cat_img" href="<?php echo esc_url($category_link); ?>">
                                                            <img src="<?php echo esc_url(wp_get_attachment_url($thumbnail_id)); ?>" alt="<?php echo esc_attr($category_name); ?>" />
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <div class="wps_cat">
                                                <?php if ('style-1' === $settings['thumb_cat_postion_style'] && $thumbnail_url) : ?>
                                                    <a class="wps_cat_img" href="<?php echo esc_url($category_link); ?>">
                                                        <img src="<?php echo esc_url(wp_get_attachment_url($thumbnail_id)); ?>" alt="<?php echo esc_attr($category_name); ?>" />
                                                    </a>
                                                <?php endif; ?>
                                                <a href="<?php echo esc_url($category_link); ?>">
                                                    <?php if (!get_post_meta(get_the_id(), 'meta_show_cattitle', true)) : ?>
                                                        <p class="wps_cat_title"><?php echo esc_html($category_name); ?>
                                                            <?php if ('style-1' === $settings['cat_postion_style'] && !get_post_meta(get_the_id(), 'meta_show_catnum', true)) : ?>
                                                                <span class="wps_cat_number"><?php echo esc_html($category_count); ?> <?php echo !empty($settings['item_title']) ? wp_kses($settings['item_title'], $allowed_tags) : ''; ?></span>
                                                            <?php endif; ?>
                                                        </p>
                                                    <?php endif; ?>
                                                    <?php if ('style-2' === $settings['cat_postion_style'] && !get_post_meta(get_the_id(), 'meta_show_catnum', true)) : ?>
                                                        <h5 class="wps_cat_number"><?php echo esc_html($category_count); ?> <?php echo !empty($settings['item_title']) ? wp_kses($settings['item_title'], $allowed_tags) : ''; ?></h5>
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <!-- End Product Category -->
                                </div>
                                <!-- End Product Bottom Area -->
                            </div>
                            <!-- End Product Style One -->
                        </div>
                    </div>
                </div>
                <!-- Product Column End if WHILE LOOP -->
            <?php endwhile; ?>
        </div>
    </div>
</section>




