<?php
// cpt-restaurant-reviews.php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function ptenm_restaurant_reviews_register_custom_post_type() {
    $labels = array(
        'name' => __('Reviews', 'restaurant-reviews'),
        'singular_name' => __('Review', 'restaurant-reviews'),
        'menu_name' => __('Reviews', 'restaurant-reviews'),
        'name_admin_bar' => __('Review', 'restaurant-reviews'),
        'add_new' => __('Add New', 'restaurant-reviews'),
        'add_new_item' => __('Add New Review', 'restaurant-reviews'),
        'new_item' => __('New Review', 'restaurant-reviews'),
        'edit_item' => __('Edit Review', 'restaurant-reviews'),
        'view_item' => __('View Review', 'restaurant-reviews'),
        'all_items' => __('All Reviews', 'restaurant-reviews'),
    );

    $args = array(
        'labels' => $labels,
        'public' => false,
        'has_archive' => false,
        'show_ui' => true, // Explicitly enable admin UI
        'show_in_menu' => true, // Show in admin menu
        // 'menu_position'      => 5,    // Position in admin menu
        'menu_icon'          => 'dashicons-carrot', // Unique Dashicon
        'supports' => array('title', 'editor', 'comments'),
        'capability_type'    => 'post', // Default capabilities
        'show_in_rest' => true,
        'rest_base'          => 'restaurant-reviews', // REST API base
        'rewrite' => array(
            'slug' => 'restaurant-reviews', // Slug for both archive and single
            'with_front' => false,          // Disable the prefix (like `/blog/`)
        ),
    );

    // Use a unique identifier with a proper prefix for the post type
    register_post_type('ptenmrr_reviews_cpt', $args);
}