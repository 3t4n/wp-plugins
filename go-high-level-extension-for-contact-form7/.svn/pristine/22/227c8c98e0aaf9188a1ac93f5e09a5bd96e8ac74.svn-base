<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://https://www.ibsofts.com
 * @since      1.0.2
 *
 * @package    GHLCF7
 * @subpackage GHLCF7/includes
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
 * @since      1.0.2
 * @package    GHLCF7
 * @subpackage GHLCF7/includes
 * @author     iB Softs <ibsofts@gmail.com>
 */
class GHLCF7 {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.2
	 * @access   protected
	 * @var      GHLCF7_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.2
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.2
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
	 * @since    1.0.2
	 */
	public function __construct() {
		if ( defined( 'GHLCF7_VERSION' ) ) {
			$this->version = GHLCF7_VERSION;
		} else {
			$this->version = '1.0.2';
		}
		$this->plugin_name = 'ghl-cf7';

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
	 * - GHLCF7_Loader. Orchestrates the hooks of the plugin.
	 * - GHLCF7_i18n. Defines internationalization functionality.
	 * - GHLCF7_Admin. Defines all hooks for the admin area.
	 * - GHLCF7_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.2
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ghl-cf7-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ghl-cf7-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ghl-cf7-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-ghl-cf7-public.php';

		//Include Required Files for plugins.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/settings-page.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'ghl_cf7_api/ghl-cf7-all-apis.php';
		
		$this->loader = new GHLCF7_Loader();


	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the GHLCF7_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.2
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new GHLCF7_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new GHLCF7_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		
	     
		//send data to contact form.
		$this->loader->add_action('wpcf7_submit',$plugin_admin, 'ghlcf7_send_form_data_to_api');

		$this->loader->add_filter('wpcf7_editor_panels', $plugin_admin, 'ghlcf7_form_settings_tab');
		$this->loader->add_action('wpcf7_save_contact_form', $plugin_admin, 'ghlcf7_save_form_settings');
	
	
	
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new GHLCF7_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.2
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.2
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.2
	 * @return    GHLCF7_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.2
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}