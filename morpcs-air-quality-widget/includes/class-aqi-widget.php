<?php

/**
 * The core plugin class.
 *
 * This is used to define admin-specific and public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Aqi_Widget
 * @subpackage Aqi_Widget/includes
 * @author     Mid-Ohio Regional Planning Commission <gohio@morpc.org>
 */
class Aqi_Widget {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Aqi_Widget_Loader    $loader    Maintains and registers all hooks for the plugin.
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
	 * Defines the core functionality of the plugin.
	 *
	 * Sets the plugin name and the plugin version that can be used throughout the plugin.
	 * Loads the dependencies, defines the locale, and sets the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'AQI_WIDGET_VERSION' ) ) {
			$this->version = AQI_WIDGET_VERSION;
		} else {
			$this->version = '1.0.0';
		}

		if ( defined( 'AQI_WIDGET_NAME' ) ) {
			$this->plugin_name = AQI_WIDGET_VERSION;
		} else {
			$this->plugin_name = 'aqi-widget';
		}

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Loads the required dependencies. Creates an instance of the loader which
	 * will be used to register the hooks with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-aqi-widget-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-aqi-widget-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/aqi-widget-public-display.php';

		$this->load_admin_dependancies();

		$this->loader = new Aqi_Widget_Loader();
	}

	/**
	 * Loads the required Admin dependencies.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_admin_dependancies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-aqi-widget-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/includes/class-aqi-admin-fields.php';
	}

	/**
	 * Registers all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Aqi_Widget_Admin( $this->get_plugin_name(), $this->get_version() );

		//Hooks the settings
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_aqi_settings' );

		//Hooks the settings page
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'register_aqi_settings_pages' );

		//Hooks the scripts and styles
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'aqi_admin_enqueue_styles' );
	}

	/**
	 * Registers all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new Aqi_Widget_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'aqi_register_scripts' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'aqi_register_styles' );
		$this->loader->add_shortcode( 'aqi-widget', $plugin_public, 'aqi_add_shortcode', 10, 2 );
	}

	/**
	 * Runs the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * Returns the reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Aqi_Widget_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Returns the name of the plugin used to uniquely identify it within the
	 * context of WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieves the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
