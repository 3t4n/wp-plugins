<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @package    A11y_Kit
 * @subpackage A11y_Kit/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    A11y_Kit
 * @subpackage A11y_Kit/public
 * @author     WP inclusion <clients@wpinclusion.com>
 */
class A11y_Kit_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @access   private
	 * @var      string    $a11ykit    The ID of this plugin.
	 */
	private $a11ykit;

	/**
	 * The version of this plugin.
	 *
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param      string    $a11ykit       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $a11ykit, $version ) {

		$this->a11ykit = $a11ykit;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.s
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in A11y_Kit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The A11y_Kit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->a11ykit, plugin_dir_url( __FILE__ ) . 'css/a11y-kit-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in A11y_Kit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The A11y_Kit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->a11ykit, plugin_dir_url( __FILE__ ) . 'js/a11y-kit-public.min.js', array( 'jquery' ), null, true );

	}

}
