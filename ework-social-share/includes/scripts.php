<?php
/*****************************/
/*****************************/
function ewsp_load_scripts() {
    
        wp_enqueue_style('ewsp-styles', plugin_dir_url(__FILE__) . 'css/style.css');
        wp_enqueue_script('ewsp-scripts', plugin_dir_url(__FILE__) . 'js/twitter.js');
}
add_action('wp_enqueue_scripts', 'ewsp_load_scripts');
?>