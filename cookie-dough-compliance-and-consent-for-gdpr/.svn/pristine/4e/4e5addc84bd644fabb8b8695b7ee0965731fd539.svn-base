<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/includes
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
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/includes
 * @author     Webdeclic <WDC_AUTHOR_EMAIL>
 */
class Cookie_Dough_Consent {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Cookie_Dough_Consent_Loader    $loader    Maintains and registers all hooks for the plugin.
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
	public function __construct() {
		if ( defined( 'COOKIE_DOUGH_CONSENT_VERSION' ) ) {
			$this->version = COOKIE_DOUGH_CONSENT_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'cookie-dough-consent';

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
	 * - Cookie_Dough_Consent_Loader. Orchestrates the hooks of the plugin.
	 * - Cookie_Dough_Consent_i18n. Defines internationalization functionality.
	 * - Cookie_Dough_Consent_Admin. Defines all hooks for the admin area.
	 * - Cookie_Dough_Consent_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cookie-dough-consent-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cookie-dough-consent-i18n.php';

		/**
		 * Container of global functions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/global-functions.php';

		/**
		 * The class responsible of settings.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-settings.php';
		
		/**
		 * The class responsible for rendring the popup cookie in the admin area
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-render.php';

		/**
		 * The class responsible for blocking the scripts in the admin area
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-blocker.php';
		

		$this->loader = new Cookie_Dough_Consent_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Cookie_Dough_Consent_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Cookie_Dough_Consent_i18n();

		$this->loader->add_action( 'init', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$cookie_dough_consent_settings = new Cookie_Dough_Consent_Settings( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $cookie_dough_consent_settings, 'enqueue_scripts_styles' );
		$this->loader->add_action( 'admin_menu', $cookie_dough_consent_settings, 'add_settings_menu' );
		$this->loader->add_action( 'init', $cookie_dough_consent_settings, 'save_custom_settigs_page' );
		$this->loader->add_filter( 'cdc-cookie-default-main-important-links', $cookie_dough_consent_settings, 'get_privacy_policy_link' );
		$this->loader->add_action( 'admin_init', $cookie_dough_consent_settings, 'create_new_settings_structer' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		// The class responsible for rendring the popup cookie in the admin area
		$cookie_dough_consent_render = new Cookie_Dough_Consent_Render( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $cookie_dough_consent_render, 'enqueue_scripts_styles', PHP_INT_MAX );
		$this->loader->add_action( 'wp_footer', $cookie_dough_consent_render, 'render_the_popup' );
		$this->loader->add_action( 'wp_head', $cookie_dough_consent_render, 'add_scripts_in_head' );
		$this->loader->add_action( 'wp_body_open', $cookie_dough_consent_render, 'add_scripts_in_body' );
		$this->loader->add_action( 'wp_footer', $cookie_dough_consent_render, 'add_scripts_in_footer' );

		// The class responsible for blocking the scripts in the admin area
		$cookie_dough_consent_blocker = new Cookie_Dough_Consent_Blocker( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp', $cookie_dough_consent_blocker, 'init_scripts_blocker' );
		$this->loader->add_action( 'wp_head', $cookie_dough_consent_blocker, 'enqueue_deblocker_script', 1 );
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
	 * @return    Cookie_Dough_Consent_Loader    Orchestrates the hooks of the plugin.
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

}
