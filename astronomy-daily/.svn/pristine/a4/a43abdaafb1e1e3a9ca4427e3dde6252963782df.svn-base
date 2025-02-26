<?php
/**
* Create Astro post type
*/
class ASTRO_post_type{
	public function __construct() {
    	add_action( 'init', array( $this, 'astro_custom_post_type' ), 0 );
	}
	public function astro_custom_post_type() {
		$labels = array(
			'name'                => _x( 'Astronomy Image', 'Post Type General Name', 'twentythirteen' ),
			'singular_name'       => _x( 'Astronomy Image', 'Post Type Singular Name', 'twentythirteen' ),
			'menu_name'           => __( 'Astronomy Image', 'twentythirteen' ),
			'parent_item_colon'   => __( 'Parent Astronomy Image', 'twentythirteen' ),
			'all_items'           => __( 'All Images', 'twentythirteen' ),
			'view_item'           => __( 'View Astronomy Image', 'twentythirteen' ),
			'add_new_item'        => __( 'Add New Astronomy Image', 'twentythirteen' ),
			'add_new'             => __( 'Add New Image', 'twentythirteen' ),
			'edit_item'           => __( 'Edit Astronomy Image', 'twentythirteen' ),
			'update_item'         => __( 'Update Astronomy Image', 'twentythirteen' ),
			'search_items'        => __( 'Search Astronomy Image', 'twentythirteen' ),
			'not_found'           => __( 'Not Found', 'twentythirteen' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
		);	
		$args = array(
			'label'               => __( 'Astronomy Image', 'twentythirteen' ),
			'description'         => __( 'Astronomy Image news and reviews', 'twentythirteen' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions' ),
			'taxonomies'          => array( 'genres' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'menu_icon'           => 'dashicons-star-filled',
		);
		register_post_type( 'astro', $args );
	}
}