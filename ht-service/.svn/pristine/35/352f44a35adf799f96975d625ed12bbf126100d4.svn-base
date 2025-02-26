<?php
    
    if( !function_exists('htservice_custom_post_register') ){

        function htservice_custom_post_register(){

            // Register Service Post Type
            $labels = array(
                'name'                  => _x( 'Services', 'Post Type General Name', 'htservice' ),
                // 'singular_name'         => _x( 'Services', 'Post Type Singular Name', 'htservice' ),
                // 'menu_name'             => __( 'Services', 'htservice' ),
                // 'name_admin_bar'        => __( 'Services', 'htservice' ),
                'archives'              => __( 'Service Archives', 'htservice' ),
                'parent_item_colon'     => __( 'Parent Service:', 'htservice' ),
                'add_new_item'          => __( 'Add New Service', 'htservice' ),
                'add_new'               => __( 'Add New', 'htservice' ),
                'new_item'              => __( 'New Service', 'htservice' ),
                'edit_item'             => __( 'Edit Service', 'htservice' ),
                'update_item'           => __( 'Update Service', 'htservice' ),
                'view_item'             => __( 'View Service', 'htservice' ),
                'search_items'          => __( 'Search Service', 'htservice' ),
                'not_found'             => __( 'Not found', 'htservice' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'htservice' ),
                'featured_image'        => __( 'Featured Image', 'htservice' ),
                'set_featured_image'    => __( 'Set featured image', 'htservice' ),
                'remove_featured_image' => __( 'Remove featured image', 'htservice' ),
                'use_featured_image'    => __( 'Use as featured image', 'htservice' ),
                'insert_into_item'      => __( 'Insert into item', 'htservice' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'htservice' ),
                'items_list'            => __( 'Services list', 'htservice' ),
                'items_list_navigation' => __( 'Services list navigation', 'htservice' ),
                'filter_items_list'     => __( 'Filter items list', 'htservice' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','editor', 'thumbnail','tag' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'htservice_menu',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'htservice', $args );

           // Service Category
           $labels = array(
            'name'              => _x( 'Services Categories', 'htservice' ),
            'singular_name'     => _x( 'Services Category', 'htservice' ),
            'search_items'      => esc_html__( 'Search Category' ),
            'all_items'         => esc_html__( 'All Category' ),
            'parent_item'       => esc_html__( 'Parent Category' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' ),
            'edit_item'         => esc_html__( 'Edit Category' ),
            'update_item'       => esc_html__( 'Update Category' ),
            'add_new_item'      => esc_html__( 'Add New Category' ),
            'new_item_name'     => esc_html__( 'New Category Name' ),
            'menu_name'         => esc_html__( 'Services Category' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'htservice_category' ),
           );

           register_taxonomy('htservice_category','htservice',$args);
       }
         add_action( 'init', 'htservice_custom_post_register', 0 );

    }
?>