<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit; 

// CPT for Template Builders 
function flexitype_lite_template_builder()
{
    register_post_type('flexitype_builder', array(
        'labels' => array(
            'name' => esc_html__('Custom Templates', 'flexitype-lite'),
            'singular_name' => esc_html__('Cusstom Templates', 'flexitype-lite'),
        ),
        'show_in_rest' => true,
        'supports' => array('title', 'editor'),
        'show_in_menu' => false,
        'menu_icon' => esc_attr__('dashicons-index-card', 'flexitype-lite'),
        'public' => true,
        'rewrite' => array(
            'slug' => 'flexitype_builder',
            'with_front' => true
        )
    )
    );
}
add_action('init', 'flexitype_lite_template_builder');