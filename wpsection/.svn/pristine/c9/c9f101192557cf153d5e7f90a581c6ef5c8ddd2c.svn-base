<?php
$templatePartDir = esc_attr( __DIR__ . '/../template_part/' );
$unique_id = 'wps_slider_path_' . uniqid();

echo '<script>
    window["hoverSliderOptions"] = { preloadImages: true };
    jQuery(document).ready(function($) {
        // Owl Carousel Initialization
        if ($(".' . esc_js( $unique_id ) . ' .wps_owls_slide").length) {
            $(".' . esc_js( $unique_id ) . ' .wps_owls_slide").owlCarousel({
                loop: false,
                margin: 0,
                nav: true,
                smartSpeed: 500,
                autoplay: ' . wp_json_encode( $settings['slide_auto_loop'] === '1' ) . ',
                navText: [ \'<span class="' . esc_js( $unique_id ) . ' wps_slider_path wps_slider_left eicon-angle-left"></span>\', \'<span class="' . esc_js( $unique_id ) . ' wps_slider_path wps_slider_right eicon-angle-right"></span>\' ],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:1
                    },
                    600:{
                        items: ' . wp_json_encode( $settings['wps_columns_tab'] ) . '
                    },
                    900:{
                        items: ' . wp_json_encode( $settings['wps_columns_tab'] ) . '
                    },
                    1024:{
                        items:' . wp_json_encode( $settings['wps_columns'] ) . '
                    },
                }
            });
        }
        
        // Swiper Slider Initialization
        var swiper = new Swiper(".' . esc_js( $unique_id ) . ' .mySwiper", {
            pagination: {
                el: ".' . esc_js( $unique_id ) . ' .swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".' . esc_js( $unique_id ) . ' .swiper-button-next",
                prevEl: ".' . esc_js( $unique_id ) . ' .swiper-button-prev",
            },
            autoplay: {
                delay: 3000, // Set the delay (in milliseconds) between slides
            },
        });
    });
</script>';

// Place the style tag inside the if condition
if ( 'none' === $settings['slider_path_hide_mobile'] ) {
    echo '<style>
        @media screen and (max-width: 1200px){ 
            .slider_path .owl-theme .owl-dots {
                display: none!important;
            } 
        }
    </style>';
}


       
   
$wps_arrow_show_on_hover = $settings['wps_arrow_show_on_hover'];
$hover_class = ($wps_arrow_show_on_hover === 'show') ? 'wps_arrow_show_on_hover' : '';
?>

<section class="mr_shop mr_products_one produt_section slider_path wps_slider_path <?php echo esc_attr( $unique_id ); ?>  <?php echo esc_attr($hover_class); ?>">
    <div class="auto-container">
        <?php
        $sliderClass = esc_attr( $settings['show_slider'] ) ? 'mr_shop_slide wps_owls_slide owl-theme owl-carousel owl-nav-style-one owl-dot-style-one' : 'row row-5';
        ?>
        <div class="<?php echo esc_attr( $sliderClass ); ?>" id="myCarousel">

            <!-- While Loop Area -->
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php global $post, $product; ?>
                <!-- Product Column Start if WHILE LOOP -->
                <?php
                $sliderColumnClass = esc_attr( $settings['show_slider'] )
                    ? 'col-lg-12 col-md-12'
                    : 'wps_product_column ' . esc_attr( $columns_markup_print ) . ' ';
                ?>
                <div class="<?php echo esc_attr( $sliderColumnClass ); ?>">
                    <div class="mr_product_block product-block_hr_001">
                        <!-- Global Settings -->
                        <?php require esc_attr( $templatePartDir . 'hook.php' ); ?>

                        <div <?php wc_product_class(); ?>>
                            <!-- Product Style Start -->
                            <div class="mr_style_one wps_product_block_one">
                                <!-- Thumbnail Area -->
                                <?php if ( $settings['show_product_x_thumbnail'] && ! empty( get_the_post_thumbnail() ) ) : ?>
                                    <div class="wps_thumbnail_area wps_slide_thumb">
                                        <?php
                                        require esc_attr( $templatePartDir . 'hot_offer.php' );
                                        require esc_attr( $templatePartDir . 'special_offer.php' );
                                        require esc_attr( $templatePartDir . 'thumbnail.php' );
                                        ?>
                                    </div><!-- Thumbnail area div -->
                                    <?php require esc_attr( $templatePartDir . 'product_overlay.php' ); ?>
                                <?php endif; ?>

                                <?php if ( 'top' === $settings['wps_columns_expand'] ) : ?>
                                    <div class="wps_hide_two_block">
                                <?php endif; ?>
                                <!-- Product Details Area -->
                                <div class="wps_product_details product_bottom mr_bottom wps_order_container">
                                    <?php
                                    // Include various template parts
                                    require esc_attr( $templatePartDir . 'title.php' );
                                    require esc_attr( $templatePartDir . 'rating.php' );
                                    require esc_attr( $templatePartDir . 'price.php' );
                                    require esc_attr( $templatePartDir . 'progress.php' );
                                    require esc_attr( $templatePartDir . 'instock.php' );
                                    require esc_attr( $templatePartDir . 'offer_countdown.php' );
                                    require esc_attr( $templatePartDir . 'offer_text.php' );
                                    require esc_attr( $templatePartDir . 'category.php' );
                                    require esc_attr( $templatePartDir . 'feature_addtocart.php' );
                                    ?>
                                </div>
                                <!-- End Product Details Area -->
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
		<?php require $templatePartDir . 'pagination.php'; ?>
    </div>
</section>

