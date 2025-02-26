<?php

function apijoin_scripts(){
    global $apijoin ; // This is your opt_name.

    

    wp_enqueue_script( 'apijoin-gumroad-scripts', plugin_dir_url( __DIR__ ) . 'scripts/apijoin-gumroad-main-scripts.js' );
    wp_enqueue_style( 'apijoin-gumroad-styles', plugin_dir_url( __DIR__ ) . 'styles/apijoin-gumroad-main-styles.css' );

    wp_enqueue_script( 'apijoin-sharer', plugin_dir_url( __DIR__ ) . 'scripts/sharer.min.js' );



    wp_localize_script('apijoin-gumroad-scripts', 'apijoinData', array(
        'url' => plugin_dir_url( __DIR__ ),
     
    ));

}

add_action('wp_enqueue_scripts', 'apijoin_scripts', 12);
add_action('admin_enqueue_scripts', 'apijoin_scripts', 12);

?>