<?php
/**
 * Enqueue plugin styles
 * 
 * @since 1.0
 */

function KBTAM_front_styles() {
    if ( !wp_style_is( 'fontawesome', 'enqueued' ) ) {
        wp_enqueue_style( 'fontawesome', KBTAM_PLUGIN_URL . 'front/icons/css/all.min.css', null, 5.13, 'all' );
    }
    wp_enqueue_style( 'KBTAM-front', KBTAM_PLUGIN_URL . 'front/css/style.css', null, KBTAM_VERSION, 'all' );
}
add_action( 'wp_enqueue_scripts', 'KBTAM_front_styles' );