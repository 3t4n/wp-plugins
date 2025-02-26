<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.demotic.co.uk/
 * @since      1.0.0
 *
 * @package    Advanced_Forms_Paypal_Payment_Buttons
 * @subpackage Advanced_Forms_Paypal_Payment_Buttons/includes
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
 * @package    Advanced_Forms_Paypal_Payment_Buttons
 * @subpackage Advanced_Forms_Paypal_Payment_Buttons/includes
 * @author     Demotic Limited <benfleming@demotic.co.uk>
 */
class Advanced_Forms_Paypal_Payment_Buttons {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Advanced_Forms_Paypal_Payment_Buttons_Loader    $loader    Maintains and registers all hooks for the plugin.
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

		$this->plugin_name = 'advanced-forms-paypal-payment-buttons';
		$this->version = '1.0.0';

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
	 * - Advanced_Forms_Paypal_Payment_Buttons_Loader. Orchestrates the hooks of the plugin.
	 * - Advanced_Forms_Paypal_Payment_Buttons_i18n. Defines internationalization functionality.
	 * - Advanced_Forms_Paypal_Payment_Buttons_Admin. Defines all hooks for the admin area.
	 * - Advanced_Forms_Paypal_Payment_Buttons_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-advanced-forms-paypal-payment-buttons-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-advanced-forms-paypal-payment-buttons-i18n.php';

		/**
		 * Helper functions.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/functions-advanced-forms-paypal-payment-buttons.php';
		
		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-advanced-forms-paypal-payment-buttons-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-advanced-forms-paypal-payment-buttons-public.php';

		$this->loader = new Advanced_Forms_Paypal_Payment_Buttons_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Advanced_Forms_Paypal_Payment_Buttons_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Advanced_Forms_Paypal_Payment_Buttons_i18n();

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

		$plugin_admin = new Advanced_Forms_Paypal_Payment_Buttons_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_notices', $plugin_admin, 'af_ppb_check_dependencies', 10, 0 );
		$this->loader->add_action( 'acf/init', $plugin_admin, 'af_ppb_add_options_page' );
		$this->loader->add_filter( 'af/form/settings_fields', $plugin_admin, 'af_ppb_add_form_settings_fields', 20, 1 );
		$this->loader->add_action( 'acf/render_field/type=text', $plugin_admin, 'af_ppb_add_form_field_inserter', 20, 1 );
	
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Advanced_Forms_Paypal_Payment_Buttons_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'af/form/attributes', $plugin_public, 'af_ppb_form_attributes', 10, 3 );
		$this->loader->add_action( 'af/form/args', $plugin_public, 'af_ppb_form_args', 10, 2 );
		$this->loader->add_action( 'af/form/submission', $plugin_public, 'af_ppb_form_submission', 20, 3 );

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
	 * @return    Advanced_Forms_Paypal_Payment_Buttons_Loader    Orchestrates the hooks of the plugin.
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
