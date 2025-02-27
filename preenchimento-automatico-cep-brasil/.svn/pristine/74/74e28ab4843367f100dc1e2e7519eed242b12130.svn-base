<?php
add_filter('um_dequeue_select2_scripts','__return_true');
add_action( 'wp_enqueue_scripts', 'pacepbr_dequeue_stylesandscripts', 100 );

function pacepbr_dequeue_stylesandscripts() {
    if ( class_exists( 'woocommerce' ) ) {
        wp_dequeue_style( 'select2' );
        wp_deregister_style( 'select2' );

        wp_dequeue_script( 'select2');
        wp_deregister_script('select2');

    } 
} 