<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.ausmed.com
 * @since      2.2.0
 *
 * @package    Ausmed_Document_Button
 * @subpackage Ausmed_Document_Button/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ausmed_Document_Button
 * @subpackage Ausmed_Document_Button/admin
 * @author     Tianlong Song <tianlong@ausmed.com.au>
 */
class Ausmed_Document_Button_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.2.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.2.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.2.0
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
	 * @since    2.2.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ausmed_Document_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ausmed_Document_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ausmed-document-button-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    2.2.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ausmed_Document_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ausmed_Document_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ausmed-document-button-admin.js', array( 'jquery' ), $this->version, false );

	}

}
