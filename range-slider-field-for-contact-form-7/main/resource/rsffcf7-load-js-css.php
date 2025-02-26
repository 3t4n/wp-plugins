<?php 

add_action( 'admin_enqueue_scripts','RSFFCF7_load_admin');
function RSFFCF7_load_admin() {
 	wp_enqueue_style( 'RSFFCF7-style-css', RSFFCF7_PLUGIN_DIR . '/assets/css/admin_style.css', false, '2.0.0' );
}

add_action( 'wp_enqueue_scripts','RSFFCF7_load_script_style');
function RSFFCF7_load_script_style() {

    wp_enqueue_style( 'RSFFCF7-style-css', RSFFCF7_PLUGIN_DIR . '/assets/css/style.css', false, '2.0.0' );
    wp_enqueue_style( 'RSFFCF7-jquery-ui-css', RSFFCF7_PLUGIN_DIR . '/assets/js/range-jquery-ui.min.css', false, '2.0.0' );
    wp_enqueue_style( 'RSFFCF7-jquery-ui-slider-pips-css', RSFFCF7_PLUGIN_DIR .'/assets/js/jquery-ui-slider-pips.css', false, '2.0.0' );
  	wp_enqueue_script('jquery');
    wp_deregister_script('jquery-ui-core');
    wp_enqueue_script( 'RSFFCF7-range-jquery-ui-js', RSFFCF7_PLUGIN_DIR .'/assets/js/range-jquery-range.min.js', false, '1.12.1' );
    wp_enqueue_script( 'RSFFCF7-front-js', RSFFCF7_PLUGIN_DIR . '/assets/js/front.js', false, '2.0.0' ); 
  	wp_enqueue_script( 'RSFFCF7-jquery-ui-slider-pips-js', RSFFCF7_PLUGIN_DIR .'/assets/js/jquery-ui-slider-pips.js', false, '2.0.0' );
    wp_enqueue_script( 'RSFFCF7-jquery-ui-touch-punch-min-js', RSFFCF7_PLUGIN_DIR .'/assets/js/jquery.ui.touch-punch.min.js', false, '2.0.0' );
}
