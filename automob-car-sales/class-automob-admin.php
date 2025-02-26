<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       automob.co.za
 * @since      1.0.0
 *
 * @package    Automob
 * @subpackage Automob/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Automob
 * @subpackage Automob/admin
 * @author     Luke Madzedze <lukemadzedze@gmail.com>
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Automob_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Automob_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Automob_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/automob-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Automob_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Automob_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/automob-admin.js', array( 'jquery' ), $this->version, false );

	}

	// Register Custom Post Type
	public function register_car() {

		$labels = array(
			'name'                  => _x( 'Cars', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Car', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Cars', 'text_domain' ),
			'name_admin_bar'        => __( 'Car', 'text_domain' ),
			'archives'              => __( 'Car Archives', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Cars', 'text_domain' ),
			'add_new_item'          => __( 'Add New Car', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Car', 'text_domain' ),
			'edit_item'             => __( 'Edit Car', 'text_domain' ),
			'update_item'           => __( 'Update Car', 'text_domain' ),
			'view_item'             => __( 'View Car', 'text_domain' ),
			'search_items'          => __( 'Search Car', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Hero Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set hero image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove hero image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as hero image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into car', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this car', 'text_domain' ),
			'items_list'            => __( 'Car list', 'text_domain' ),
			'items_list_navigation' => __( 'Car list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Car list', 'text_domain' ),
		);
		   
		$args = array(
			'label'                 => __( 'Car', 'text_domain' ),
			'description'           => __( 'Vehicle in stock for sale', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor','thumbnail'  ),
			'taxonomies'            => array(false),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'         => plugin_dir_url( __FILE__).'img/car-icon.png',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type(AUTOMOB_CPT_CAR, $args );

	}

	public function menu()
	{
		add_submenu_page( 'edit.php?post_type='.AUTOMOB_CPT_CAR, 'Automob Settings', 'Automob Settings', 'edit_pages', 'plugin_options', 'plugin_options_do_page' );
	}


	public function test()
	{
		//$table = new Automob_Car_Table();
		 //print_r($table->async_car_list());die();
	}



}
