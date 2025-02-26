<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       dcgws.com
 * @since      1.0.0
 *
 * @package    EDD_Google_Customer_Reviews
 * @subpackage EDD_Google_Customer_Reviews/includes
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
 * @package    EDD_Google_Customer_Reviews
 * @subpackage EDD_Google_Customer_Reviews/includes
 * @author     David Davis <david.davis@dcgws.com>
 */
class EDD_Google_Customer_Reviews {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      EDD_Google_Customer_Reviews_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'EDD_GOOGLE_CUSTOMER_REVIEWS_VERSION' ) ) {
			$this->version = EDD_GOOGLE_CUSTOMER_REVIEWS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'edd-google-customer-reviews';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		add_filter( 'plugin_action_links_' .plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' ), array($this,'gcr_plugin_action_links'),10 );
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - EDD_Google_Customer_Reviews_Loader. Orchestrates the hooks of the plugin.
	 * - EDD_Google_Customer_Reviews_i18n. Defines internationalization functionality.
	 * - EDD_Google_Customer_Reviews_Admin. Defines all hooks for the admin area.
	 * - EDD_Google_Customer_Reviews_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-edd-google-customer-reviews-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-edd-google-customer-reviews-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-edd-google-customer-reviews-admin.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-edd-google-customer-reviews-settings.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-edd-google-customer-reviews-public.php';
		$this->loader = new EDD_Google_Customer_Reviews_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the  EDD_Google_Customer_Reviews_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new EDD_Google_Customer_Reviews_i18n();

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

		$plugin_admin = new EDD_Google_Customer_Reviews_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'display_admin_page' );
		$this->loader->add_action("admin_menu", $plugin_admin, "add_new_menu");
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new EDD_Google_Customer_Reviews_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action("wp_head", $plugin_public, "edd_confirmation");
        //Advanced Store data Tracking
		//add version details in footer
        $this->loader->add_action("wp_footer", $plugin_public, "add_plugin_details");
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		if ( in_array( 'easy-digital-downloads/easy-digital-downloads.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			$edd = EDD();
			$this->loader->run();
		}
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
	 * @return     EDD_Google_Customer_Reviews_Loader    Orchestrates the hooks of the plugin.
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
	
	public function gcr_plugin_action_links($links) {
		$setting_url = 'admin.php?page=edd-google-customer-reviews-admin-display&tab=general_settings';
		$links[] = '<a href="' . get_admin_url(null, $setting_url) . '">Settings</a>';
		$links[] = '<a href="https://wordpress.org/plugins/edd-google-customer-reviews/#faq" target="_blank">FAQ</a>';
		$links[] = '<a href="https://wordpress.org/plugins/edd-google-customer-reviews/#installation" target="_blank">Documentation</a>';
		return $links;
	}
	

}
