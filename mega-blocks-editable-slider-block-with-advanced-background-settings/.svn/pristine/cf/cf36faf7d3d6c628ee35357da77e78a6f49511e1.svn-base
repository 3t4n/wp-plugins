<?php
/**
 * Register the Slider Custom Post Type
 */
 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;


function mega_register_slider_post_type() {
    $labels = array(
        'name'               => __('Mega Slider', 'mega-blocks'),
        'singular_name'      => __('Mega Slider', 'mega-blocks'),
        'menu_name'          => __('Mega Slider', 'mega-blocks'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true, // Enables the Gutenberg editor for this post type
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions'),
        'has_archive'        => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-images-alt2',
        'capability_type'    => 'post',
    );

    register_post_type('mega_slider', $args);
}
add_action('init', 'mega_register_slider_post_type');
