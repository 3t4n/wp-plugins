<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Enqueue CSS and JS library files
 * 
 * @since 1.0.0
 * @return array
 */
add_action( 'wp_enqueue_scripts', 'azoads_enqueues', 100 );
function azoads_enqueues() {
    global $azoads_options, $azoads_active;
    
    // css
    if ( ! empty( $azoads_active ) ) { // only load css if got any activated ad
        wp_register_style( AZOADS_SLUG . '-frontend', AZOADS_BASE_URL . 'assets/css/frontend.css', false, AZOADS_VERSION, null );
        wp_enqueue_style( AZOADS_SLUG . '-frontend' );
    }

    // javascript
    // check if jquery library existed
    if ( ! wp_script_is( 'jquery', 'enqueued' ) ) {
        wp_enqueue_script( 'jquery' );
    }
    // enable ad blocker detector
    if ( azoads_get_setting( 'ab_detector' ) == 1 ) {
        wp_register_script( AZOADS_SLUG . '-ab-detector', AZOADS_BASE_URL . 'assets/js/ab-detector.min.js', false, AZOADS_VERSION, null );
        wp_enqueue_script( AZOADS_SLUG . '-ab-detector' );
    }

    wp_register_script( AZOADS_SLUG . '-apps', AZOADS_BASE_URL . 'assets/js/apps.min.js', false, AZOADS_VERSION, true );
    wp_enqueue_script( AZOADS_SLUG . '-apps' );

    wp_register_script( AZOADS_SLUG . '-frontend', AZOADS_BASE_URL . 'assets/js/frontend.js', false, AZOADS_VERSION, true );
    wp_enqueue_script( AZOADS_SLUG . '-frontend' );

	wp_localize_script( AZOADS_SLUG . '-frontend', 'azoads_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}