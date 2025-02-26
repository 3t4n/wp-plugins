<?php
//   ===============================ACTIVATE SCRIPTS=================================================
function mgm_enqueue_styles() {
    wp_enqueue_style('mgm_google_map_style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', array(), '1.0.0', 'all' );
}
add_action('wp_enqueue_scripts', 'mgm_enqueue_styles');

function mgm_enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'mgm_google_map_script', plugin_dir_url( __FILE__ ) . 'assets/js/functions.js', array(), false, true );
    wp_enqueue_script( 'mgm_markerclusterer_script', plugin_dir_url( __FILE__ ) . 'assets/js/markerclusterer.js', array(), false, true );
    wp_enqueue_script( 'mgm_markerclusterer_v2_script', plugin_dir_url( __FILE__ ) . 'assets/js/markerclusterer_v2.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'mgm_enqueue_scripts' );