<?php

function mgm_register_locations_post_type() {
    //Add a filter to our $singular variable.
    $singular = apply_filters( 'mgm_label_single', 'location' );
    //Add a filter to our $plural variable.
    $plural = apply_filters( 'mgm_label_plural', 'Locations' );
    $labels = array(
        'name' 			=> $plural,
        'singular_name' 	=> $singular,
        'add_new' 		=> 'Add New',
        'add_new_item'  	=> 'Add New ' . $singular,
        'edit'		        => 'Edit',
        'edit_item'	        => 'Edit ' . $singular,
        'new_item'	        => 'New ' . $singular,
        'view' 			=> 'View ' . $singular,
        'view_item' 		=> 'View ' . $singular,
        'search_term'   	=> 'Search ' . $plural,
        'parent' 		=> 'Parent ' . $singular,
        'not_found' 		=> 'No ' . $plural .' found',
        'not_found_in_trash' 	=> 'No ' . $plural .' in Trash'
    );
    //Add a filter to our cpt's $args variable.
    $args = apply_filters( 'mgm_post_type_args',array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-admin-site',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => $plural ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 10,
        'supports'           => array( 'title')
    ) );
    register_post_type( $singular, $args );
}
add_action("init", "mgm_register_locations_post_type");
