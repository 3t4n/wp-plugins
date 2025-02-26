<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/boele/custom-dashboard-background/tree/master/includes/class-custom-dashboard-background.php
 * @since      1.0.0
 *
 * @package    Custom_Dashboard_Background
 * @subpackage Custom_Dashboard_Background/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization and admin-specific hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Custom_Dashboard_Background
 * @subpackage Custom_Dashboard_Background/includes
 * @author     Boele Boom <boele.boom@hotmail.com>
 */
class Custom_Dashboard_Background {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Custom_Dashboard_Background_Loader    $loader    Maintains and registers all hooks for the plugin.
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
	 * @since    1.0.0
	 * @access   protected
	 * @var string 		$plugin_path The path of this plugin.
	 */
	protected $plugin_path;

	/**
	 * @since    1.0.0
	 * @access   protected
	 * @var WordPressSettingsFramework $wpsf Instance of wpsf.
	 */
	protected $wpsf;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale and set the hooks for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'CUSTOM_DASHBOARD_BACKGROUND_VERSION' ) ) {
			$this->version = CUSTOM_DASHBOARD_BACKGROUND_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		
		$this->plugin_name = 'custom-dashboard-background';
		$this->plugin_path = plugin_dir_path( dirname( __FILE__ ) );

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Custom_Dashboard_Background_Loader. Orchestrates the hooks of the plugin.
	 * - Custom_Dashboard_Background_i18n. Defines internationalization functionality.
	 * - Custom_Dashboard_Background_Admin. Defines all hooks for the admin area.
	 * - Custom_Dashboard_Background_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once $this->get_plugin_path() . 'includes/class-' . $this->get_plugin_name() . '-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once $this->get_plugin_path() . 'includes/class-' . $this->get_plugin_name() . '-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once $this->get_plugin_path() . 'admin/class-' . $this->get_plugin_name() . '-admin.php';

		require_once $this->get_plugin_path() . 'includes/wp-settings-framework.php';
		$this->wpsf = new WordPressSettingsFramework($this->get_plugin_path() . 'admin/settings/settings.php', 'cdb');

		$this->loader = new Custom_Dashboard_Background_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Custom_Dashboard_Background_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Custom_Dashboard_Background_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Custom_Dashboard_Background_Admin( $this->get_plugin_name(), $this->get_version(), $this->get_wpsf() );

		// Actions
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'settings_init' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'set_background_image' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'set_wrap_color' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'set_footer_text_color' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'set_border_radius' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'set_grayscale_filter' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'set_blur_filter' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'set_blur_and_grayscale_filter' );

		// Filters
		$this->loader->add_filter( $this->wpsf->get_option_group() . '_settings_validate', $plugin_admin, 'validate_settings' );
	}

	/**	
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of this plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Get the plugin path.
	 *
	 * @since     1.0.0
	 * 
	 * @return    string    The plugin path.
	 */
	public function get_plugin_path() {
		return $this->plugin_path;
	}

	/**
	 * Get the Wordpress Settings Framework instance for this plugin.
	 *
	 * @since     1.0.0
	 * 
	 * @see 	  https://github.com/gilbitron/WordPress-Settings-Framework
	 * @return    WordPressSettingsFramework    Instance of wpsf.
	 */
	public function get_wpsf() {
		return $this->wpsf;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * 
	 * @return    Custom_Dashboard_Background_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * 
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
