<?php defined('ABSPATH') or die("No script kiddies please!");

$labels = array(
    'name' => _x('Everest Counters Lite', 'post type general name', 'everest-counter-lite'),
    'singular_name' => _x('Everest Counter Lite', 'post type singular name', 'everest-counter-lite'),
    'menu_name' => _x('Everest Counters Lite', 'admin menu', 'everest-counter-lite'),
    'name_admin_bar' => _x('Everest Counter Lite', 'add new on admin bar', 'everest-counter-lite'),
    'add_new' => _x('Add New Everest Counter', 'Everest Counter', 'everest-counter-lite'),
    'add_new_item' => __('Add New Everest Counter', 'everest-counter-lite'),
    'new_item' => __('New Everest Counter', 'everest-counter-lite'),
    'edit_item' => __('Edit Everest Counter', 'everest-counter-lite'),
    'view_item' => __('View Everest Counter', 'everest-counter-lite'),
    'all_items' => __('All Everest Counter', 'everest-counter-lite'),
    'search_items' => __('Search Everest Counter', 'everest-counter-lite'),
    'parent_item_colon' => __('Parent Everest Counter:', 'everest-counter-lite'),
    'not_found' => __('No Everest Counter found.', 'everest-counter-lite'),
    'not_found_in_trash' => __('No Everest Counter found in Trash.', 'everest-counter-lite')
);

$args = array(
    'labels' => $labels,
    'description' => __('Description.', 'everest-counter-lite'),
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-layout',
    'query_var' => true,
    'rewrite' => array('slug' => 'everest-counter'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title')
);

register_post_type('everest-counter', $args);