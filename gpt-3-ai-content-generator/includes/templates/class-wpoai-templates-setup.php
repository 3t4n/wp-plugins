<?php
/**
 * Setup Templates class
 *
 * @class    WPOAI_Templates_Setup
 * @package  includes
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WPOAI_Templates_Setup', false ) ) :

/**
 * Setup Templates class.
 */
class WPOAI_Templates_Setup {

	/**
	 * filter hook
	 *
	 * @var string
	 */
	private $_hook_prefix = 'WPOAI_Templates_Setup/';


	/**
	 * Constructor.
	 */
	public function __construct() {
		// register templates as custom post type
		$this->register_cpt();
	}

	/**
	 * Register custom post type for templates
	 */
	public function register_cpt() {

		// register templates as cpt
		register_post_type( 'wpoai-templates' , apply_filters( $this->_hook_prefix . 'register_cpt', array(
			'labels'             => array(
				'name'               => esc_html__( 'Templates', WPOAI_SLUG ),
				'singular_name'      => esc_html__( 'Template', WPOAI_SLUG ),
				'menu_name'          => esc_html__( 'Template', WPOAI_SLUG ),
				'all_items'          => esc_html__( 'Templates', WPOAI_SLUG ),
				'add_new'            => esc_html__( 'Add New Template', WPOAI_SLUG ),
				'add_new_item'       => esc_html__( 'Add New Template', WPOAI_SLUG ),
				'edit_item'          => esc_html__( 'Edit Template', WPOAI_SLUG ),
				'edit'               => esc_html__( 'Edit', WPOAI_SLUG ),
				'new_item'           => esc_html__( 'New Template', WPOAI_SLUG ),
				'view_item'          => esc_html__( 'View Template', WPOAI_SLUG ),
				'search_items'       => esc_html__( 'Search Templates', WPOAI_SLUG ),
				'not_found'          => esc_html__( 'No Templates Found', WPOAI_SLUG ),
				'not_found_in_trash' => esc_html__( 'No Templates found in Trash', WPOAI_SLUG ),
				'view'               => esc_html__( 'View Template', WPOAI_SLUG )
			),
			'public'             => false,
			'show_ui'            => false,
			'capability_type'    => 'post',
			'hierarchical' => false,
			'rewrite' => false,
			'supports' => array( 'title' ), 
			'query_var' => false,
			'can_export' => true,
			'show_in_nav_menus' => false
		) ) );

		// register template categories as taxonomies
		if ( ! taxonomy_exists('wpoai-template-categories') ) {

			register_taxonomy( 'wpoai-template-categories', 'wpoai-templates' , array(
				'labels' => array(
					'name' => esc_html__( 'Template Categories', WPOAI_SLUG ),  
					'singular_name'  => esc_html__( 'Template Category', WPOAI_SLUG ),  
					'search_items' => sprintf( esc_html__( 'Search %s', WPOAI_SLUG ) , esc_html__( 'Template Categories', WPOAI_SLUG ) ),  
					'popular_items' => sprintf( esc_html__( 'Popular %s', WPOAI_SLUG ) , esc_html__( 'Template Categories', WPOAI_SLUG ) ),  
					'all_items' => sprintf( esc_html__( 'All %s', WPOAI_SLUG ) , esc_html__( 'Template Categories', WPOAI_SLUG ) ),  
					'parent_item' => sprintf( esc_html__( 'Parent %s', WPOAI_SLUG ) , esc_html__( 'Template Category', WPOAI_SLUG ) ),  
					'edit_item' => sprintf( esc_html__( 'Edit %s', WPOAI_SLUG ) , esc_html__( 'Template Category', WPOAI_SLUG ) ),  
					'update_item' => sprintf( esc_html__( 'Update %s', WPOAI_SLUG ) , esc_html__( 'Template Category', WPOAI_SLUG ) ),  
					'add_new_item' => sprintf( esc_html__( 'Add New %s', WPOAI_SLUG ) , esc_html__( 'Template Category', WPOAI_SLUG ) ),  
					'new_item_name' => sprintf( esc_html__( 'New %s', WPOAI_SLUG ) , esc_html__( 'Template Category', WPOAI_SLUG ) ),  
					'separate_items_with_commas' => sprintf( esc_html__( 'Separate %s with commas', WPOAI_SLUG ) , esc_html__( 'Template Categories', WPOAI_SLUG ) ),  
					'add_or_remove_items' => sprintf( esc_html__( 'Add or remove %s', WPOAI_SLUG ) , esc_html__( 'Template Categories', WPOAI_SLUG ) ),  
					'choose_from_most_used' => sprintf( esc_html__( 'Choose from most used %s', WPOAI_SLUG ) , esc_html__( 'Template Categories', WPOAI_SLUG ) ) 
				),  
				'public'                        => false,  
				'hierarchical'                  => true,  
				'show_ui'                       => false,  
				'show_in_nav_menus'             => false,  
				'query_var'                     => true,
			) );

		} // end - taxonomy_exists('wpoai-template-categories')
	}

	/**
	 * sample func
	 */
	public function sample_func() {
		


	}
	
} // end - WPOAI_Templates_Setup

return new WPOAI_Templates_Setup();

endif; // end - class_exists

