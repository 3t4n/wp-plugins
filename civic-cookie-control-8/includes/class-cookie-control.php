<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.civicuk.com/
 * @since      1.0.0
 *
 * @package    Cookie_Control
 * @subpackage Cookie_Control/includes
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
 * @package    Civic_Cookie_Control_8
 * @subpackage Civic_Cookie_Control_8/includes
 * @author     Civic Uk <info@civicuk.com>
 */
class CCC_Cookie_Control {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      CCC_Cookie_Control_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'CIVIC_COOKIE_CONTROL_VERSION' ) ) {
			$this->version = CIVIC_COOKIE_CONTROL_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'civic_cookiecontrol_settings';

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
	 * - CCC_Cookie_Control_Loader. Orchestrates the hooks of the plugin.
	 * - CCC_Cookie_Control_i18n. Defines internationalization functionality.
	 * - CCC_Cookie_Control_Admin. Defines all hooks for the admin area.
	 * - CCC_Cookie_Control_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cookie-control-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cookie-control-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-cookie-control-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-cookie-control-public.php';

		$this->loader = new CCC_Cookie_Control_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the CCC_Cookie_Control_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new CCC_Cookie_Control_i18n();

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

		$plugin_admin = new CCC_Cookie_Control_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'ccc_enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'ccc_enqueue_scripts' );

		// Add menu item
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'ccc_add_plugin_admin_menu' );

		// Add Settings link to the plugin
		$plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . 'cookiecontrol-settings.php' );
		$this->loader->add_filter( 'plugin_action_links_' . $plugin_basename, $plugin_admin, 'ccc_add_action_links' );

		// Save/Update our plugin options
		$this->loader->add_action( 'admin_init', $plugin_admin, 'ccc_options_update' );

        $this->loader->add_action( 'wp_footer', $plugin_admin, 'ccc_cookiecontrol_args', 1500 );

		// Declare Civic Cookie Control with consent level API
		$this->loader->add_filter( 'wp_consent_api_registered_' . $plugin_basename, $plugin_admin, 'ccc_return_true' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */


	private function define_public_hooks() {

	    if(get_option( 'civic_cookiecontrol_apikey_version' )=='v9'){
            $ccc_cookiecontrol_settings = get_option( 'civic_cookiecontrol_settings_v9' );
        }else{
            $ccc_cookiecontrol_settings = get_option( 'civic_cookiecontrol_settings' );
        }

        $ccc_seetings_iabCMP = (isset( $ccc_cookiecontrol_settings['iabCMP'])) ? $ccc_cookiecontrol_settings['iabCMP'] : $ccc_seetings_iabCMP ="";

        $plugin_public = new CCC_Cookie_Control_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'ccc_enqueue_styles' );

        if( isset( $ccc_seetings_iabCMP ) && $ccc_seetings_iabCMP == 'true' ) {
            $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'ccc_cookie_head_script' );

        }else{
            $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'ccc_enqueue_scripts' );
        }
		
		add_shortcode( 'ccc_gov_uk_block', array( $plugin_public, 'ccc_gov_uk_details' ));


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
	 * @return    CCC_Cookie_Control_Loader    Orchestrates the hooks of the plugin.
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
