<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/nababurbd/
 * @since      1.0.0
 *
 * @package    Appswiperslider_App_Swiper_Slider
 * @subpackage Appswiperslider_App_Swiper_Slider/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Appswiperslider_App_Swiper_Slider
 * @subpackage Appswiperslider_App_Swiper_Slider/public
 * @author     Nababur <nababurbd@gmail.com>
 */
class Appswiperslider_App_Swiper_Slider_Public
{

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
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->load_dependancies();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in App_Swiper_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The App_Swiper_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name . "-bundle", APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_URL . 'public/assets/vendors/css/swiper-bundle.min.css', array(), $this->version, 'all');
		wp_enqueue_style($this->plugin_name . "-main", APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_URL . 'public/assets/css/app-swiper-slider-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in App_Swiper_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The App_Swiper_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script("swiper-bundle.min-bundle", APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_URL . 'public/assets/vendors/js/swiper-bundle.min.js', array('jquery'), $this->version, true);
	}


	/**
	 * Load Dependancies
	 */
	private function load_dependancies()
	{
		require_once APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH . 'public/partials/app-swiper-slider-public-display.php';
		new Appswiperslider_Swiper_Slider_Public_Display();
	}
}
