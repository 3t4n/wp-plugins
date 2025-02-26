<?php


if ( ! isset( $slider_number ) ) {
    $slider_number = get_option( "plslider_num", 3 );
}


if ( ! isset( $plslider_auto ) ) {
    $plslider_auto = get_option( "plslider_auto_slider", "yes" );
}


if ( ! isset( $plslider_i_seconds ) ) {
    $plslider_i_seconds = get_option( "plslider_i_seconds", 3000 );
}


if ( ! isset( $plslider_products_ids ) ) {
    $plslider_products_ids = get_option( "plslider_products_ids" );
}


if ( ! isset( $plslider_img_size ) ) {
    $plslider_img_size = get_option( "plslider_img_size", "shop_catalog" );
}


if ( ! isset( $plslider_show_arrows ) ) {
    $plslider_show_arrows = get_option( "plslider_show_arrows", "yes" );
}


if ( ! isset( $plslider_show_dots ) ) {
    $plslider_show_dots = get_option( "plslider_show_dots", "yes" );
}


if ( ! isset( $plslider_dots_style ) ) {
    $plslider_dots_style = get_option( "plslider_dots_style", "bar" );
}


if( ! function_exists( 'plslider_enqueue_scripts' ) ) {
    function plslider_enqueue_scripts() {

        /* Bootstrap 4 CSS */
        wp_enqueue_style('plslider_devtarik_min_css', PLSLIDER_PLUGIN_DIR . 'assets/css/devtarik.min.css');

        /* CSS stylesheet */
        wp_enqueue_style('plslider_css', PLSLIDER_PLUGIN_DIR . 'assets/css/style.css');

        /* JavaScript File */
        wp_enqueue_script( 'plslider_js', PLSLIDER_PLUGIN_DIR . 'assets/js/main.js', array('jquery'), '1.0', true );

    }
    add_action( 'wp_enqueue_scripts', 'plslider_enqueue_scripts' );
}


if ( ! function_exists ( "plslider_checked" ) ) {
    function plslider_checked( $var, $value ) {
        if ( $var === $value ) {
            echo esc_html__( "checked" );
        }
    }
}