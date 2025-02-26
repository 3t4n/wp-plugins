<?php



if( ! function_exists('plslider_main_product_slider') ){
    function plslider_main_product_slider() {

        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

            global $post; // Calling Global $post variable

            // Calling variables from function file
            global $slider_number;
            global $plslider_products_ids;
            global $pro_img_width;
            global $plslider_i_seconds;
            global $plslider_show_arrows;
            global $plslider_show_dots;
            global $plslider_dots_style;
            global $plslider_img_size;

            if ( ! isset( $plslider_slider ) ) {
                if ( $plslider_products_ids == null ) {
                    $plslider_slider = new WP_Query(array(
                        'posts_per_page' => $slider_number,
                        'post_type' => 'product'
                    ));
                } else {
                    $plslider_slider = new WP_Query(array(
                        'post_type' => 'product',
                        'post__in' => explode( ',', $plslider_products_ids )
                    ));
                }
            }
            
            ?>


            <div class="dt9-container dt9-container-sm">
                

                <!-- Start Sliders Section -->
                <div class="row sliders">


                    <!-- Prev Arrow -->
                    <?php require plugin_dir_path( __FILE__ ) . 'slider-assets/prev_arrow.php'; ?>


                    <!-- Main Slider Codes (div.col-8) -->
                    <?php require plugin_dir_path( __FILE__ ) . 'slider-assets/main_slider.php'; ?>


                    <!-- Next Arrow -->
                    <?php require plugin_dir_path( __FILE__ ) . 'slider-assets/next_arrow.php'; ?>


                </div>
                <!-- End Sliders Section -->
                

                <!-- Slider Dots -->
                <?php require plugin_dir_path( __FILE__ ) . 'slider-assets/dots.php'; ?>


                <?php wp_reset_postdata(); ?> <!-- Restoring Original Post Data -->
                

            </div> <!-- Ends Container Section -->
            

            <!-- Slider JS Codes -->
            <?php require plugin_dir_path( __FILE__ ) . 'slider-assets/javascripts.php'; ?>
            

            <?php

        } else {
            ?>
            
            <div class="dt9-container dt9-container-sm">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h2>Oops! Woocommerce plugin is not active yet.</h2>
                            <p>You must install active <strong>Woocommerce</strong> plugin to use <strong>Woo Product Slider</strong>.</p>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }

    }

    add_shortcode( 'show_devtarik_product_slider', 'plslider_main_product_slider' );
}