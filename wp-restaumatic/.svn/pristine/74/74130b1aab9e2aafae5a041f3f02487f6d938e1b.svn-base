<?php
/**
 * The file that defines the core plugin class.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.restaumatic.com
 * @since      1.0.0
 *
 * @package    WP_Restaumatic
 * @subpackage WP_Restaumatic/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin and the Active Menu demo slug.
 *
 * @since      1.0.0
 * @package    WP_Restaumatic
 * @subpackage WP_Restaumatic/includes
 */
class WP_Restaumatic {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      WP_Restaumatic_Loader    $loader    Maintains and registers all hooks for the plugin.
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
	 * The Active Menu demo slug.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $demo_slug    The Active Menu demo slug.
	 */
	protected $demo_slug;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name, the plugin version and the Active Menu demo slug that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'WP_RESTAUMATIC_VERSION' ) ) {
			$this->version = WP_RESTAUMATIC_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wp-restaumatic';
		$this->demo_slug   = 'active-menu';

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
	 * - WP_Restaumatic_Loader. Orchestrates the hooks of the plugin.
	 * - WP_Restaumatic_I18n. Defines internationalization functionality.
	 * - WP_Restaumatic_Admin. Defines all hooks for the admin area.
	 * - WP_Restaumatic_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-restaumatic-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-restaumatic-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-restaumatic-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-restaumatic-public.php';

		$this->loader = new WP_Restaumatic_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the WP_Restaumatic_I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new WP_Restaumatic_I18n();

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

		$plugin_admin    = new WP_Restaumatic_Admin( $this->get_plugin_name(), $this->get_version() );
		$plugin_settings = new WP_Restaumatic_Settings( $this->get_plugin_name(), $this->get_version(), $this->get_demo_slug() );

		$this->loader->add_action( 'admin_menu', $plugin_settings, 'add_plugin_page' );
		$this->loader->add_action( 'admin_init', $plugin_settings, 'page_init' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new WP_Restaumatic_Public( $this->get_plugin_name(), $this->get_version(), $this->get_demo_slug() );

		$this->loader->add_shortcode( 'restaumatic_active_menu', $plugin_public, 'active_menu_shortcode' );

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
	 * @return    WP_Restaumatic_Loader    Orchestrates the hooks of the plugin.
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
	 * Retrieve the Active Menu demo slug.
	 *
	 * @since     1.0.0
	 * @return    string    Demo slug.
	 */
	public function get_demo_slug() {
		return $this->demo_slug;
	}

}
