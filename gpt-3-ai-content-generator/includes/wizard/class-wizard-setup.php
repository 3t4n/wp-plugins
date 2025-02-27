<?php
/**
 * Setup Wizard class
 *
 * @class    WPOAI_Wizard_Setup
 * @package  includes
 * @version  0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WPOAI_Wizard_Setup', false ) ) :

/**
 * Setup Templates class.
 */
class WPOAI_Wizard_Setup {

	/**
	 * filter hook
	 *
	 * @var string
	 */
	private $_hook_prefix = 'WPOAI_Wizard_Setup/';


	/**
	 * Constructor.
	 */
	public function __construct() {
		// register templates as custom post type
		$this->register_cpt();
	}

	/**
	 * Register custom post type for wizard
	 */
	public function register_cpt() {

		// register wizard as cpt
		register_post_type( 'wpoai-wizard' , apply_filters( $this->_hook_prefix . 'register_cpt', array(
			'labels'             => array(
				'name'               => esc_html__( 'Wizards', WPOAI_SLUG ),
				'singular_name'      => esc_html__( 'Wizard', WPOAI_SLUG ),
				'menu_name'          => esc_html__( 'Wizard', WPOAI_SLUG ),
				'all_items'          => esc_html__( 'Wizards', WPOAI_SLUG ),
				'add_new'            => esc_html__( 'Add New Wizard', WPOAI_SLUG ),
				'add_new_item'       => esc_html__( 'Add New Wizard', WPOAI_SLUG ),
				'edit_item'          => esc_html__( 'Edit Wizard', WPOAI_SLUG ),
				'edit'               => esc_html__( 'Edit', WPOAI_SLUG ),
				'new_item'           => esc_html__( 'New Wizard', WPOAI_SLUG ),
				'view_item'          => esc_html__( 'View Wizard', WPOAI_SLUG ),
				'search_items'       => esc_html__( 'Search Wizards', WPOAI_SLUG ),
				'not_found'          => esc_html__( 'No Wizards Found', WPOAI_SLUG ),
				'not_found_in_trash' => esc_html__( 'No Wizards found in Trash', WPOAI_SLUG ),
				'view'               => esc_html__( 'View Wizard', WPOAI_SLUG )
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

		// setup post meta
		register_post_meta( 'post', wpopenai()->plugin_meta_prefix() . 'wizard_id', array(
			'show_in_rest' => true,
			'single' => true,
			'type' => 'string'
		) );

	}
	
} // end - WPOAI_Wizard_Setup

return new WPOAI_Wizard_Setup();

endif; // end - class_exists

