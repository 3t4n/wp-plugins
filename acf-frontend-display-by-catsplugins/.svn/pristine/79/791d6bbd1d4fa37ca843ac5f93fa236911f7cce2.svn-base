<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://catsplugins.com
 * @since      1.0.0
 *
 * @package    Acf_Frontend_Display
 * @subpackage Acf_Frontend_Display/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Acf_Frontend_Display
 * @subpackage Acf_Frontend_Display/public
 * @author     catsplugins <admin@catsplugins>
 */

class Acf_Frontend_Display_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		// load file to start shortcode
		require_once plugin_dir_path( __DIR__ ) . '/includes/fields/class-acf-frontend-display-fields.php';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Acf_Frontend_Display_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Acf_Frontend_Display_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/acf-frontend-display-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Acf_Frontend_Display_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Acf_Frontend_Display_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/acf-frontend-display-public.js', array( 'jquery' ), $this->version, false );

	}

/*	public function get_field_groups() 
	{	
		$field_groups = apply_filters('acf/get_field_groups', array());
		return $field_groups;
	}*/

/*	public function get_fields( $group_id ) 
	{	
		$fields = apply_filters('acf/field_group/get_fields', array(), $group_id);
		return $fields;
	}*/

	//protected $atts = array();
}
