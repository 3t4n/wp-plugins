<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://themesawesome.com/
 * @since      1.0.0
 *
 * @package    Accordion_Awesome
 * @subpackage Accordion_Awesome/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Accordion_Awesome
 * @subpackage Accordion_Awesome/public
 * @author     Themes Awesome <admin@themesawesome>
 */
class Accordion_Awesome_Public {

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
		$this->version = $version;

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
		 * defined in Accordion_Awesome_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Accordion_Awesome_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

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
		 * defined in Accordion_Awesome_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Accordion_Awesome_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script('jquery');

		if(class_exists('Elementor\Plugin')) {
			if( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
				wp_enqueue_script( 'ta-accordion-awesome-ele', plugin_dir_url( __DIR__ ) . 'public/js/jquery.accordion.js', array( 'jquery' ), '', false );

				wp_enqueue_script( 'ta-easing-awesome-ele', plugin_dir_url( __DIR__ ) . 'public/js/jquery.easing.1.3.js', array( 'jquery' ), '', false );

				wp_enqueue_script( 'ta-easing-awesome-ele', plugin_dir_url( __DIR__ ) . 'public/js/jquery.easing.1.3.js', array( 'jquery' ), '', false ); 
				wp_enqueue_script( 'ta-mousewheel-awesome-ele', plugin_dir_url( __DIR__ ) . 'public/js/jquery.mousewheel.js', array( 'jquery' ), '', false );
				wp_enqueue_script( 'ta-vaccordion-awesome-ele', plugin_dir_url( __DIR__ ) . 'public/js/jquery.vaccordion.js', array( 'jquery' ), '', false );
			}
		}
	}

}
