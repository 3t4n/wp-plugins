<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://kalender.digital
 * @since      1.0.0
 *
 * @package    Kalender_Digital
 * @subpackage Kalender_Digital/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Kalender_Digital
 * @subpackage Kalender_Digital/public
 * @author     Kalender.digital <info@kalender.digital>
 */
class Kalender_Digital_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $kalender_digital    The ID of this plugin.
	 */
	private $kalender_digital;

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
	 * @param      string    $kalender_digital       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $kalender_digital, $version ) {

		$this->kalender_digital = $kalender_digital;
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
		 * defined in Kalender_Digital_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kalender_Digital_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->kalender_digital, plugin_dir_url( __FILE__ ) . 'css/kalender-digital-public.css', array(), $this->version, 'all' );

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
		 * defined in Kalender_Digital_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Kalender_Digital_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->kalender_digital, plugin_dir_url( __FILE__ ) . 'js/kalender-digital-public.js', array( 'jquery' ), $this->version, false );

	}

}
