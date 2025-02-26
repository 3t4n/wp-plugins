<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://100xwpdev.com
 *
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/public
 * @author     Bheru Lal Gameti  <bherulalgameti24@gmail.com>
 */
class Easy_Store_Customizer_Public
{

	/**
	 * The ID of this plugin.
	 *
	 
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Store_Customizer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Store_Customizer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if (!is_admin()) {
			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/easy-store-customizer-public.css', array(), $this->version, 'all');
		}
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Easy_Store_Customizer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Store_Customizer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/easy-store-customizer-public.js', array('jquery'), $this->version, false);
	}
}
