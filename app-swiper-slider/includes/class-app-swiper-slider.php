<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://profiles.wordpress.org/nababurbd/
 * @since      1.0.0
 *
 * @package    Appswiperslider_App_Swiper_Slider
 * @subpackage Appswiperslider_App_Swiper_Slider/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Appswiperslider_App_Swiper_Slider
 * @subpackage Appswiperslider_App_Swiper_Slider/includes
 * @author     Nababur <nababurbd@gmail.com>
 */
class Appswiperslider_App_Swiper_Slider
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Appswiperslider_app_Swiper_Slider_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		if (defined('APPSWIPERSLIDER_APP_SWIPER_SLIDER_VERSION')) {
			$this->version = APPSWIPERSLIDER_APP_SWIPER_SLIDER_VERSION;
		} else {
			$this->version = '1.0.3';
		}
		$this->plugin_name = 'app-swiper-slider';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - appswiperslider_App_Swiper_Slider_Loader. Orchestrates the hooks of the plugin.
	 * - appswiperslider_App_Swiper_Slider_i18n. Defines internationalization functionality.
	 * - appswiperslider_App_Swiper_Slider_Admin. Defines all hooks for the admin area.
	 * - appswiperslider_App_Swiper_Slider_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies()
	{

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-app-swiper-slider-loader.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-app-swiper-slider-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-app-swiper-slider-public.php';

		$this->loader = new Appswiperslider_App_Swiper_Slider_Loader();
	}


	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{
		// Load admin Enqueue files
		$plugin_admin = new Appswiperslider_App_Swiper_Slider_Admin($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

		// Load Custom Post Type
		$plugin_post_type = new Appswiperslider_App_Swiper_Slider_Custom_Post_Type($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('init', $plugin_post_type, 'register');


		// Load Metabox 
		$plugin_metabox = new Appswiperslider_App_Swiper_Slider_MetaBox($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('add_meta_boxes', $plugin_metabox, 'appswiperslider_change_logo_meta_box_position');
		$this->loader->add_action('save_post', $plugin_metabox, 'save_meta_box_data');
		$this->loader->add_action('add_meta_boxes', $plugin_metabox, 'add_meta_boxes_callback');
		$this->loader->add_action('add_meta_boxes', $plugin_metabox, 'add_pro_meta_box');
		$this->loader->add_action('add_meta_boxes', $plugin_metabox, 'add_tutorial_meta_box');
		$this->loader->add_action('init', $plugin_post_type, 'register');

		// Load Columns Manage 
		$plugin_column = new Appswiperslider_App_Swiper_Slider_Columns_Manage($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('manage_edit-appswiperslider_columns', $plugin_column, 'add_new_appswiperslider_columns_callback');
		$this->loader->add_action('manage_appswiperslider_posts_custom_column', $plugin_column, 'manage_appswiperslider_posts_custom_column_callback', 10, 2);
		$this->loader->add_action('manage_edit-appswiperslider_sortable_columns', $plugin_column, 'appswiperslider_sortable_columns');

		// Load Main Settings class
		$plugin_settings = new Appswiperslider_App_Screen_Slider_Settings($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('admin_init', $plugin_settings, 'settings_admin_init');
		$this->loader->add_action('admin_menu', $plugin_settings, 'settings_admin_submenu_callback');

		$plugin_settings_api = new Appswiperslider_App_Screen_Slider_Settings_API($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_settings_api, 'admin_enqueue_scripts');

		// Load Helper and upgrade class
		$plugin_helper_upgrade = new Appswiperslider_App_Swiper_Slider_Help_Upgrade($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('admin_menu', $plugin_helper_upgrade, 'app_swiper_slider_admin_menu_callback_init');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks()
	{

		$plugin_public = new Appswiperslider_App_Swiper_Slider_Public($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function appswiperslider_swiper_slider_run()
	{
		$this->loader->appswiperslider_main_hooks_run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Appswiperslider_App_Swiper_Slider_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
