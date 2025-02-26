<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://#
 * @since      1.0.0
 *
 * @package    ALPRT_testimonials
 * @subpackage ALPRT_testimonials/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ALPRT_testimonials
 * @subpackage ALPRT_testimonials/admin
 * @author     Alpha Rages <alpha@hotmail.com>
 */
class ALPRT_testimonials_Admin {

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
	public function alprt_admin_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ALPRT_testimonials_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ALPRT_testimonials_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		     wp_enqueue_style( 'alprt-admin-css', plugin_dir_url( __FILE__ ) . 'css/alpharage-testimonials-admin.css', array(), $this->version, 'all' );

	}

	public 	function alprt_testimonial_seetings_scripts()
		{
			
			wp_enqueue_style( 'alprt-testi-bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'alprt-boostrapext', plugin_dir_url( __FILE__ ) . 'css/bootstrap-extended.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'alprt-tabs', plugin_dir_url( __FILE__ ) . 'css/testimonial-tab.css', array(), $this->version, 'all' );
			 wp_enqueue_script( 'alprt-bootstrap', plugin_dir_url( __FILE__ ) . 'js/bootstrap.js', array( 'jquery' ), $this->version, false );
			
		}
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function alprt_admin_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ALPRT_testimonials_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ALPRT_testimonials_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */ 


		  wp_enqueue_script( 'alprt-testimonial-js', plugin_dir_url( __FILE__ ) . 'js/alpharage-testimonials-admin.js', array( 'jquery' ), $this->version, true );
		  

	}
	public function alprt_admin_func() {

		/**
		 * This function is provided for Testimonial Functions.
		 */


		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/alpharage-testimonials-menu-page.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/alpharage-testimonials-shortcode-builder.php';


	}

}
