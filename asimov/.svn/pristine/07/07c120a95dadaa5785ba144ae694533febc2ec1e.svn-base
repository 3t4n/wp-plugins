<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.asc27.com/
 * @since      1.0.0
 *
 * @package    Asimov
 * @subpackage Asimov/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Asimov
 * @subpackage Asimov/includes
 * @author     https://www.asc27.com/
 */
class Asimov {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Asimov_Loader	$loader    Maintains and registers all hooks for the plugin.
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
	 * The remote endpoint of asimov services.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $remote_url The remote endpoint of asimov services.
	 */
	private $remote_url;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'ASIMOV_PLUGIN_VERSION' ) ) {
			$this->version = ASIMOV_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'asimov-plugin';
		$this->remote_url = 'https://api.imasimov.com';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Asimov_Loader. Orchestrates the hooks of the plugin.
	 * - Asimov_i18n. Defines internationalization functionality.
	 * - Asimov_Admin. Defines all hooks for the admin area.
	 * - Asimov_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-asimov-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-asimov-i18n.php';

		/**
		 * The class responsible for calling to asimov APIS
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-asimov-service.php';


		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-asimov-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-asimov-public.php';

		$this->loader = new Asimov_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Settings_Page_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Asimov_i18n();

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

		$plugin_admin = new Asimov_Admin( $this->get_plugin_name(), $this->get_version(), new Asimov_Service($this->get_asimov_endpoint()) );
		
		// Normal Hooks
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'rest_api_init', $plugin_admin, 'register_endpoints');
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'add_editor_box');
		
		// Filters
		$this->loader->add_filter( 'cron_schedules', $plugin_admin, 'custom_schedules' );
		$this->loader->add_filter('plugin_locale', $plugin_admin, 'plugin_locale_filter', 10, 2);
		
		// Schedules
		$this->loader->add_schedule( 'asimov_daily_cron', 'asimov_daily' );
		$this->loader->add_schedule( 'asimov_hourly_cron', 'asimov_hourly' );
		
		// Scheduled Hooks
		$this->loader->add_action( 'asimov_daily_cron', $plugin_admin, 'asimov_daily_routine');
		$this->loader->add_action( 'asimov_hourly_cron', $plugin_admin, 'asimov_hourly_routine');
		
		// OneTime Hooks
		$this->loader->add_action( 'export_articles', $plugin_admin, 'export_articles');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Asimov_Public( $this->get_plugin_name(), $this->get_version(), new Asimov_Service($this->get_asimov_endpoint()) );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

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
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Asimov_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Retrieve the remote url of the asimov services.
	 *
	 * @since     1.0.1
	 * @return    string    The remote endpoint of asimov services.
	 */
	public function get_asimov_endpoint() {
		return $this->remote_url;
	}

}
