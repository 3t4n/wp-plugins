<?php
function register_custom_akbootstrapfaq_type() {
    $labels = array(
        'name' => _x('AK Bootstrap FAQ', 'akbootstrapfaq'),
        'singular_name' => _x('AK Bootstrap FAQ', 'akbootstrapfaq'),
        'add_new' => _x('Add New', 'akbootstrapfaq'),
        'add_new_item' => _x('Add New AK Bootstrap FAQ', 'akbootstrapfaq'),
        'edit_item' => _x('Edit AK Bootstrap FAQ', 'akbootstrapfaq'),
        'new_item' => _x('New AK Bootstrap FAQ', 'akbootstrapfaq'),
        'view_item' => _x('View AK Bootstrap FAQ', 'akbootstrapfaq'),
        'search_items' => _x('Search AK Bootstrap FAQ', 'akbootstrapfaq'),
        'not_found' => _x('No AK Bootstrap FAQ found', 'akbootstrapfaq'),
        'not_found_in_trash' => _x('No AK Bootstrap FAQ found in Trash', 'akbootstrapfaq'),
        'parent_item_colon' => _x('Parent AK Bootstrap FAQ:', 'akbootstrapfaq'),
        'menu_name' => _x('AK Bootstrap FAQ', 'akbootstrapfaq'),
    );
    $args = array(
        'labels' => $labels,
		'taxonomies' => array('category'),
        'hierarchical' => false,
        'supports' => array('title', 'editor'),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'menu_icon' => 'dashicons-media-text',
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type('akbootstrapfaq', $args);
}
add_action('init', 'register_custom_akbootstrapfaq_type');