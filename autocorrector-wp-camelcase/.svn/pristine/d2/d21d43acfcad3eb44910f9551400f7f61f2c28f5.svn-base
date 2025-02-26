<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://vishalparit.com/
 * @since      1.0.0
 *
 * @package    Autocorrector_Wp_Camelcase
 * @subpackage Autocorrector_Wp_Camelcase/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Autocorrector_Wp_Camelcase
 * @subpackage Autocorrector_Wp_Camelcase/public
 * @author     Vishal Parit <vishalparit10@gmail.com>
 */
class Autocorrector_Wp_Camelcase_Public {

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
		 * defined in Autocorrector_Wp_Camelcase_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Autocorrector_Wp_Camelcase_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/autocorrector-wp-camelcase-public.css', array(), $this->version, 'all' );

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
		 * defined in Autocorrector_Wp_Camelcase_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Autocorrector_Wp_Camelcase_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/autocorrector-wp-camelcase-public.js', array( 'jquery' ), $this->version, false );

	}

}
