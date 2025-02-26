<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.ibsofts.com
 * @since      5.0.7
 *
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/public
 * @author     iB Softs <https://www.ibsofts.com>
 */
class Ghl_Gf_Extension_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    5.0.7
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    5.0.7
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    5.0.7
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
	 * @since    5.0.7
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ghl_Gf_Extension_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ghl_Gf_Extension_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ghl-gf-extension-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    5.0.7
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ghl_Gf_Extension_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ghl_Gf_Extension_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ghl-gf-extension-public.js', array( 'jquery' ), $this->version, false );

	}

}