<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/nababurbd/
 * @since      1.0.0
 *
 * @package    Appswiperslider_App_Swiper_Slider
 * @subpackage Appswiperslider_App_Swiper_Slider/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Appswiperslider_App_Swiper_Slider
 * @subpackage Appswiperslider_App_Swiper_Slider/admin
 * @author     Nababur <nababurbd@gmail.com>
 */
class Appswiperslider_App_Swiper_Slider_Admin
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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->load_admin_dependencies();
	}




	/**
	 * Load admin part
	 */
	private function load_admin_dependencies()
	{
		/**
		 * Load the admin end part.
		 * 
		 */
		require_once APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH . 'admin/partials/custom-post-type/class-app-swiper-slider-custom-post-type.php';
		require_once APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH . 'admin/partials/metabox/class-app-swiper-slider-metabox.php';
		require_once APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH . 'admin/partials/metabox/class-app-swiper-slider-column.php';
		require_once APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH . 'admin/partials/settings/class-app-swiper-slider-settings.php';
		require_once APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH . 'admin/partials/settings/class-app-swiper-slider-settings-api.php';
		require_once APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH . 'admin/partials/resizer/class-app-swiper-slider-resizer.php';
		require_once APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_PATH . 'admin/partials/templates/class-app-swiper-slider-help-upgrade.php';
	}


	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style(
			$this->plugin_name,
			APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_URL . 'admin/assets/css/app-swiper-slider-admin.css',
			array(),
			$this->version,
			'all'
		);
	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script($this->plugin_name, APPSWIPERSLIDER_APP_SWIPER_SLIDER_DIR_URL . 'admin/assets/js/app-swiper-slider-admin.js', array('jquery'), $this->version, false);
	}
}
