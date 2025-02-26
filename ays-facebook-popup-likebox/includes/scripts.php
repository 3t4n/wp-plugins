<?php

/**********************************************************
*SCRIPTS(CSS&JS) CONTROLS
***********************************************************/

function ays_nk_load_scripts(){
    wp_enqueue_style('ays_nk-styles',plugin_dir_url(__FILE__).'css/ays_nk_style.css');
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts','ays_nk_load_scripts');

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('js/ays_nk_script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    wp_enqueue_style('ays_nk-styles',plugin_dir_url(__FILE__).'css/ays_nk_admin_style.css');
    wp_enqueue_script('ays_nk-styles',plugin_dir_url(__FILE__).'js/ays_nk_admin_script.js');
    wp_enqueue_script('jquery');
}

?>