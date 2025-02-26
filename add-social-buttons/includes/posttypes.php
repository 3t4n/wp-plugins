<?php
if (!defined('ABSPATH')) exit;

/**
 * Add post type addsocialbuttons
*/
function addsocialbuttons_post_type() {
    $labels = array(
        'name'                  => _x( 'Add Social Buttons', 'Post type general name', 'addsocialbuttons' ),
        'singular_name'         => _x( 'Add Social Buttons', 'Post type singular name', 'addsocialbuttons' ),
        'menu_name'             => _x( 'Add Social Buttons', 'Admin Menu text', 'addsocialbuttons' ),
        'name_admin_bar'        => _x( 'Add Social Buttons', 'Add New on Toolbar', 'addsocialbuttons' ),
        'add_new'               => __( 'Add New', 'addsocialbuttons' ),
        'add_new_item'          => __( 'Add New Social Buttons', 'addsocialbuttons' ),
        'new_item'              => __( 'New Social Buttons', 'addsocialbuttons' ),
        'edit_item'             => __( 'Edit Social Buttons', 'addsocialbuttons' ),
        'view_item'             => __( 'See Social Buttons', 'addsocialbuttons' ),
        'all_items'             => __( 'All Social Buttonss', 'addsocialbuttons' ),
        'search_items'          => __( 'Search Social Buttonss', 'addsocialbuttons' ),
        'parent_item_colon'     => __( 'Parent Social Buttonss:', 'addsocialbuttons' ),
        'not_found'             => __( 'Not Found.', 'addsocialbuttons' ),
        'not_found_in_trash'    => __( 'Not Found.', 'addsocialbuttons' ),
        'items_list'            => _x( 'List of Social Buttonss', '', 'addsocialbuttons' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'addsocialbuttons' ),
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-networking',
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array( 'title'),
        'map_meta_cap'       => true,
    );

    register_post_type( 'addsocialbuttons', $args );
}
add_action( 'init', 'addsocialbuttons_post_type' );


/**
 * Flush Rewrite
*/
function addsocialbuttons_rewrite_flush(){
    addsocialbuttons_post_type();
    flush_rewrite_rules();
}



