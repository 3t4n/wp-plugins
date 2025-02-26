<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.lyo.one
 * @since      1.0.0
 *
 * @package    Nilly
 * @subpackage Nilly/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nilly
 * @subpackage Nilly/admin
 * @author     Lyo GmbH <support@nilly.io>
 */
class Nilly_Admin {

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
		
		add_action('admin_init', array(&$this, 'admin_init'));

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
		 * defined in Nilly_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nilly_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nilly-admin.css', array(), $this->version, 'all' );

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
		 * defined in Nilly_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nilly_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nilly-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	function admin_init() {
		
		register_setting($this->plugin_name, 'location_select');

	}
	


	
	function add_menu()
    {
        // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
        add_menu_page( "nilly Settings", "Nilly", 'manage_options', $this->plugin_name . '-settings', array( $this, 'nilly_status' ), 'dashicons-chart-bar');
    }
    
    function nilly_status() {
        include( plugin_dir_path( __FILE__ ) . 'partials/nilly-admin-display.php' );
    }
}
