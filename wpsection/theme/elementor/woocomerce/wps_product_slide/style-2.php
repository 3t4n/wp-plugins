<?php
// Generate a unique identifier based on the widget instance ID
$templatePartDir = esc_attr( __DIR__ . '/../template_part/' );

$unique_id_sweeper_two = 'wps_slide_sweeper_two_' . uniqid();

// Output the unique identifier and the script
echo '<script>
    window["hoverSliderOptions"] = { preloadImages: true };
    jQuery(document).ready(function($) {
        var swiper = new Swiper(".' . esc_js( $unique_id_sweeper_two ) . ' .mySwiper", {
            pagination: {
                el: ".' . esc_js( $unique_id_sweeper_two ) . ' .swiper-pagination",
                clickable: true,
            },
            spaceBetween: 0,
            breakpoints: {
                600: {
                    slidesPerView: ' . wp_json_encode( $settings['wps_columns_tab'] ) . ',
                },
                1024: {
                    slidesPerView: ' . wp_json_encode( $settings['wps_columns'] ) . ',
                },
            },
            autoplay: ' . wp_json_encode( $settings['slide_auto_loop'] === '1' ) . ',
        });
    });
</script>';

// Place the style tag inside the if condition
if ( 'none' === $settings['slider_path_hide_sweep_mobile'] ) {
    echo '<style>
        @media screen and (max-width: 1200px){ 
            .wps_slider_two_dot {
                display: none!important;
            } 
        }
    </style>';
}
?>

<section class="mr_shop mr_products_one wps_slide_sweeper_two <?php echo esc_attr( $unique_id_sweeper_two ); ?>">
    <div class="auto-container swiper mySwiper">
        <div class="swiper-wrapper">
            <!-- While Loop Area -->
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php global $post, $product; ?>
                <div class="wps_product_column swiper-slide">
                    <div class="mr_product_block product-block_hr_001">
                        <!-- Global Settings -->
                        <?php require esc_attr( $templatePartDir . 'hook.php' ); ?>
                        <div <?php wc_product_class(); ?>>
                            <!-- Product Style Start -->
                            <div class="mr_style_one wps_product_block_one">
                                <!-- Thumbnail Area -->
                                <?php if ( isset( $settings['show_product_x_thumbnail'] ) && $settings['show_product_x_thumbnail'] && ! empty( get_the_post_thumbnail() ) ) : ?>
                                    <div class="wps_thumbnail_area wps_slide_thumb">
                                        <?php
                                        require esc_attr( $templatePartDir . 'hot_offer.php' );
                                        require esc_attr( $templatePartDir . 'special_offer.php' );
                                        require esc_attr( $templatePartDir . 'thumbnail_two.php' );
                                        ?>
                                    </div><!-- Thumbnail area div -->
                                    <?php require esc_attr( $templatePartDir . 'product_overlay.php' ); ?>
                                <?php endif; ?>
                                <?php if ( 'top' === $settings['wps_columns_expand'] ) : ?>
                                    <div class="wps_hide_two_block">
                                <?php endif; ?>
                                <!-- Product Bottom Area -->
                                <div class="wps_product_details product_bottom mr_bottom wps_order_container">
                                    <?php
                                    // Include various template parts
                                    require esc_attr( $templatePartDir . 'title.php' );
                                    require esc_attr( $templatePartDir . 'rating.php' );
                                    require esc_attr( $templatePartDir . 'price.php' );
                                    require esc_attr( $templatePartDir . 'progress.php' );
                                    require esc_attr( $templatePartDir . 'instock.php' );
                                    require esc_attr( $templatePartDir . 'offer_countdown.php' );
                                    require esc_attr( $templatePartDir . 'category.php' );
                                    require esc_attr( $templatePartDir . 'feature_addtocart.php' );
                                    ?>
                                </div>
                                <!-- End Product Bottom Area -->
                                <?php if ( 'top' === $settings['wps_columns_expand'] ) : ?>
                                    </div>
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
        <div class="wps_slider_two_dot swiper-pagination"></div>
		<?php require $templatePartDir . 'pagination.php'; ?>
    </div>
</section>
