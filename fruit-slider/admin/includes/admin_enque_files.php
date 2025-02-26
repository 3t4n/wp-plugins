<?php

function fruit_slider_admin_enqueue() {

    wp_enqueue_script('slider_all_add_file');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_media();

    wp_register_script('colorbox-slider-js', plugin_dir_url(__FILE__) . 'assets/js/colorbox.js', array('jquery'));
    wp_enqueue_script('colorbox-slider-js');

    wp_register_script('default-js', plugin_dir_url(__FILE__) . 'assets/js/default.js', array('jquery', 'wp-color-picker'));
    wp_enqueue_script('default-js');
    wp_localize_script('default-js', 'fruit_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_register_script('drag-drop-js', plugin_dir_url(__FILE__) . 'assets/js/jquery-ui.js', array('jquery'));
    wp_enqueue_script('drag-drop-js');

    wp_register_style('colorbox_css', plugin_dir_url(__FILE__) . 'assets/css/colorbox.css');
    wp_enqueue_style('colorbox_css');

    wp_register_style('default_css', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_style('default_css');

    wp_register_style('animate_css', plugin_dir_url(__FILE__) . 'assets/css/animate.css');
    wp_enqueue_style('animate_css');
}

add_action('admin_enqueue_scripts', 'fruit_slider_admin_enqueue');
?>
