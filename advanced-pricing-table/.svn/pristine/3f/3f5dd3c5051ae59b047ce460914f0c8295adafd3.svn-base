<?php

class WPPT_Register_Data {

    public static function init() {
        add_action( 'init', array( __CLASS__, 'regster_post_type' ) );
    }

    public static function regster_post_type() {
        $labels = array(
            'name'               => _x( 'Pricing Tables', 'post type general name', 'wppt' ),
            'singular_name'      => _x( 'Pricing Table', 'post type singular name', 'wppt' ),
            'menu_name'          => _x( 'Pricing Tables', 'admin menu', 'wppt' ),
            'name_admin_bar'     => _x( 'Pricing Table', 'add new on admin bar', 'wppt' ),
            'add_new'            => _x( 'Add New', 'pricing table', 'wppt' ),
            'add_new_item'       => __( 'Add New Pricing Table', 'wppt' ),
            'new_item'           => __( 'New Pricing Table', 'wppt' ),
            'edit_item'          => __( 'Edit Pricing Table', 'wppt' ),
            'view_item'          => __( 'View Pricing Table', 'wppt' ),
            'all_items'          => __( 'All Pricing Tables', 'wppt' ),
            'search_items'       => __( 'Search Pricing Tables', 'wppt' ),
            'parent_item_colon'  => __( 'Parent Pricing Tables:', 'wppt' ),
            'not_found'          => __( 'No pricing tables found.', 'wppt' ),
            'not_found_in_trash' => __( 'No pricing tables found in Trash.', 'wppt' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'wppt' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'wppt-pricing-table' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title' )
        );

        register_post_type( 'wppt_pricing_table', $args );
    }
}

WPPT_Register_Data::init();