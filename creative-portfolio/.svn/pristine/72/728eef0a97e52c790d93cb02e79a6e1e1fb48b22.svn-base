<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Portfolio: Custom Post Types
 *
 *
 */
class PGFLIO_portfolio_Post_Types {
	
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{
		$args = array();	

		// Portfolio
		$args['post-type-portfolio'] = array(
			'labels' => array(
				'name' => __( 'Portfolio', 'pgflio' ),
				'singular_name' => __( 'Item', 'pgflio' ),
				'add_new' => __( 'Add New Item', 'pgflio' ),
				'add_new_item' => __( 'Add New Item', 'pgflio' ),
				'edit_item' => __( 'Edit Item', 'pgflio' ),
				'new_item' => __( 'New Item', 'pgflio' ),
				'view_item' => __( 'View Item', 'pgflio' ),
				'search_items' => __( 'Search Through portfolio', 'pgflio' ),
				'not_found' => __( 'No items found', 'pgflio' ),
				'not_found_in_trash' => __( 'No items found in Trash', 'pgflio' ),
				'parent_item_colon' => __( 'Parent Item:', 'pgflio' ),
				'menu_name' => __( 'Portfolio', 'pgflio' ),				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a Portfolio Item', 'pgflio' ),
	        'supports' => array( 'title', 'editor', 'thumbnail'),
	        'menu_icon' =>  'dashicons-images-alt',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'query_var' => true,
	        'rewrite' => array( 'slug' => 'projects' ),
	        // This is where we add taxonomies to our CPT
        	//'taxonomies'          => array( 'category' ),
		);	

		// Register post type: name, arguments
		register_post_type('pugfolio', $args['post-type-portfolio']);
	}
}

function pgflio_portfolio_types() { new PGFLIO_portfolio_Post_Types(); }

add_action( 'init', 'pgflio_portfolio_types' );

/*-----------------------------------------------------------------------------------*/
/*	Creating Custom Taxonomy 
/*-----------------------------------------------------------------------------------*/
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'pgflio_create_portfolio_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function pgflio_create_portfolio_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'pgflio' ),
		'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'pgflio' ),
		'search_items'      => __( 'Search Portfolio Categories', 'pgflio' ),
		'all_items'         => __( 'All Portfolio Categories', 'pgflio' ),
		'parent_item'       => __( 'Parent Portfolio Category', 'pgflio' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'pgflio' ),
		'edit_item'         => __( 'Edit Portfolio Category', 'pgflio' ),
		'update_item'       => __( 'Update Portfolio Category', 'pgflio' ),
		'add_new_item'      => __( 'Add New Portfolio Category', 'pgflio' ),
		'new_item_name'     => __( 'New Portfolio Category', 'pgflio' ),
		'menu_name'         => __( 'Portfolio Categories', 'pgflio' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfoliocategory' ),
	);

	register_taxonomy( 'pugfoliocategory', array( 'pugfolio' ), $args );
}