<?php
    
    $menu_name = __( 'Real Estate Manager', 'wcp-rem' );

    if (current_user_can('edit_rem_property') && !current_user_can('edit_others_rem_properties')) {
        $menu_name = __( 'Properties', 'wcp-rem' );
    }

    $custom_labels = array(
        'name'                => __( 'Properties', 'wcp-rem' ),
        'singular_name'       => __( 'Property', 'wcp-rem' ),
        'add_new'             => _x( 'Add New Property', 'wcp-rem', 'wcp-rem' ),
        'add_new_item'        => __( 'Add New Property', 'wcp-rem' ),
        'edit_item'           => __( 'Edit Property', 'wcp-rem' ),
        'new_item'            => __( 'New Property', 'wcp-rem' ),
        'view_item'           => __( 'View Property', 'wcp-rem' ),
        'search_items'        => __( 'Search Property', 'wcp-rem' ),
        'not_found'           => __( 'No Property found', 'wcp-rem' ),
        'not_found_in_trash'  => __( 'No Property found in Trash', 'wcp-rem' ),
        'parent_item_colon'   => __( 'Parent Property:', 'wcp-rem' ),
        'menu_name'           => $menu_name,
        'all_items'           => __( 'Properties', 'wcp-rem' ),
    );

    $anim_args = array(
        'labels'              => $custom_labels,
        'hierarchical'        => false,
        'description'         => 'Landz Properties',
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-admin-home',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => array(
                            'slug'          => 'property',
                            'with_front'    => false
        ),
        'capability_type'     => array('rem_property', 'rem_properties'),
        'map_meta_cap'        => true,
        'supports'            => array(
            'title', 'editor', 'author', 'thumbnail', 'excerpt'
            )
    );

    register_post_type( 'rem_property', $anim_args );

    /**
     * Create a property_tag
     *
     * @uses  Inserts new taxonomy object into the list
     * @uses  Adds query vars
     *
     * @param string  Name of taxonomy object
     * @param array|string  Name of the object type for the taxonomy object.
     * @param array|string  Taxonomy arguments
     * @return null|WP_Error WP_Error if errors, otherwise null.
     */
    
    $tax_labels = array(
        'name'                    => _x( 'Property Tags', 'Property Tags', 'wcp-rem' ),
        'singular_name'            => _x( 'Tag', 'Tags', 'wcp-rem' ),
        'search_items'            => __( 'Search Property Tags', 'wcp-rem' ),
        'popular_items'            => __( 'Popular Tags', 'wcp-rem' ),
        'all_items'                => __( 'All Tags', 'wcp-rem' ),
        'parent_item'            => __( 'Parent Tag', 'wcp-rem' ),
        'parent_item_colon'        => __( 'Parent Tag', 'wcp-rem' ),
        'edit_item'                => __( 'Edit Tag', 'wcp-rem' ),
        'update_item'            => __( 'Update Tag', 'wcp-rem' ),
        'add_new_item'            => __( 'Add New Tag', 'wcp-rem' ),
        'new_item_name'            => __( 'New Tag Name', 'wcp-rem' ),
        'add_or_remove_items'    => __( 'Add or remove Tags', 'wcp-rem' ),
        'choose_from_most_used'    => __( 'Choose from most used tags', 'wcp-rem' ),
        'menu_name'                => __( ' Tags', 'wcp-rem' ),
    );

    $tax_args = array(
        'labels'            => $tax_labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical'      => false,
        'show_tagcloud'     => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'             => array(
                            'slug'          => 'property_tag',
                            'with_front'    => false
        ),            
        'query_var'         => true,
    );

    register_taxonomy( 'rem_property_tag', array( 'rem_property' ), $tax_args );
?>