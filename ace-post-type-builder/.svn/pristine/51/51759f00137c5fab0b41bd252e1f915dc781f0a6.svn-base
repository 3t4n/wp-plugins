<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class CPTB_Post_Types {

    // Register custom post types dynamically
    public static function register_dynamic( $post_type ) {
        $labels = array(
            'name'                  => isset($post_type['labels']['name']) ? $post_type['labels']['name'] : '',
            'singular_name'         => isset($post_type['labels']['singular_name']) ? $post_type['labels']['singular_name'] : '',
            'menu_name'             => isset($post_type['labels']['name']) ? $post_type['labels']['name'] : '',
            'name_admin_bar'        => isset($post_type['labels']['singular_name']) ? $post_type['labels']['singular_name'] : '',
            'add_new'               => __( 'Add New', 'ace-post-type-builder' ),
            // Translators: %s is the singular name of the post type
            'add_new_item'          => sprintf( __( 'Add New %s', 'ace-post-type-builder' ), isset($post_type['labels']['singular_name']) ? $post_type['labels']['singular_name'] : 'Post' ),
            // Translators: %s is the singular name of the post type
            'edit_item'             => sprintf( __( 'Edit %s', 'ace-post-type-builder' ), isset($post_type['labels']['singular_name']) ? $post_type['labels']['singular_name'] : 'Post' ),
            // Translators: %s is the singular name of the post type
            'new_item'              => sprintf( __( 'New %s', 'ace-post-type-builder' ), isset($post_type['labels']['singular_name']) ? $post_type['labels']['singular_name'] : 'Post' ),
            // Translators: %s is the singular name of the post type
            'view_item'             => sprintf( __( 'View %s', 'ace-post-type-builder' ), isset($post_type['labels']['singular_name']) ? $post_type['labels']['singular_name'] : 'Post' ),
            // Translators: %s is the plural name of the post type
            'all_items'             => sprintf( __( 'All %s', 'ace-post-type-builder' ), isset($post_type['labels']['name']) ? $post_type['labels']['name'] : 'Posts' ),
            // Translators: %s is the plural name of the post type
            'search_items'          => sprintf( __( 'Search %s', 'ace-post-type-builder' ), isset($post_type['labels']['name']) ? $post_type['labels']['name'] : 'Posts' ),
            // Translators: %s is the plural name of the post type
            'not_found'             => sprintf( __( 'No %s found', 'ace-post-type-builder' ), isset($post_type['labels']['name']) ? $post_type['labels']['name'] : 'Posts' ),
            // Translators: %s is the plural name of the post type
            'not_found_in_trash'    => sprintf( __( 'No %s found in Trash', 'ace-post-type-builder' ), isset($post_type['labels']['name']) ? $post_type['labels']['name'] : 'Posts' ),
        );

        $args = array(
            'label'                 => isset($post_type['labels']['singular_name']) ? $post_type['labels']['singular_name'] : 'Post',
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields' ),
            'public'                => true,
            'has_archive'           => true,
            'menu_position'         => isset($post_type['menu_position']) ? $post_type['menu_position'] : 5, 
            'rewrite'               => array( 
                'slug' => isset($post_type['slug']) ? $post_type['slug'] : 'post', 
                'with_front' => false 
            ),
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_rest'          => true,
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'query_var'             => true,
        );

        register_post_type( $post_type['slug'], $args );
    }
}
