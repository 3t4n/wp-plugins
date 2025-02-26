<?php

/*
 Creates custom post type.
*/

add_action( 'init', 'acfl_register_answers' );

function acfl_register_answers() {
	 $labels = array(
            'name' => _x( 'Answers', 'answer' ),
            'singular_name' => _x( 'answer', 'answer' ),
            'add_new' => _x( 'Add New Answer', 'answer' ),
            'add_new_item' => _x( 'Add New Answer', 'answer' ),
            'edit_item' => _x( 'Edit Answer', 'answer' ),
            'new_item' => _x( 'New Answer', 'answer' ),
            'view_item' => _x( 'View Answers', 'answer' ),
            'search_items' => _x( 'Search Answer', 'answer' ),
            'not_found' => _x( 'No answer found', 'answer' ),
            'not_found_in_trash' => _x( 'No answer was found in trash', 'answer' ),
            'parent_item_colon' => _x( 'Parent Album:', 'answer' ),
            'menu_name' => _x( 'Answers', 'answer' ),
    ); 
     $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'Answers for Answering Contact Form',
            'supports' => array( 'title', 'editor'),
            'taxonomies' => array( 'answers' ),
            'show_ui' => true,
            'show_in_menu' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-images-alt',
            'show_in_nav_menus' => false,
            'exclude_from_search' => true,
            'has_archive' => false,
            'can_export' => true,
            'capability_type' => 'post',
			'show_in_menu' => 'afcl_settings',
     ); 
    register_post_type( 'answer', $args );
}
?>