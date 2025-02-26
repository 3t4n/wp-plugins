<?php

/**
 * The core plugin class.
 *
 * This is used to define admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/includes
 * @author     Reacho <support@reacho.com>
 */

class Reacho_WooCommerce {
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Reacho_WooCommerce_Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $plugin_name The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	protected $version;

	private static $instance;

	/**
	 * Class for fetching options and handling options backwards compatibility.
	 *
	 * @var Reacho_WooCommerce_Options
	 */
	public $options;

	public $rest_api;

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
		if ( defined( 'REACHO_WOOCOMMERCE_VERSION' ) ) {
			$this->version = REACHO_WOOCOMMERCE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'reacho-woocommerce';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Reacho_WooCommerce_Loader. Orchestrates the hooks of the plugin.
	 * - Reacho_WooCommerce_Admin. Defines all hooks for the admin area.
	 * - Reacho_WooCommerce_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-reacho-woocommerce-loader.php';

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-reacho-woocommerce-options.php';

		/**
		 * The class responsible for Reacho API
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-reacho-woocommerce-api-wrapper.php';

		/**
		 * The class responsible for defining all settings of the plugin
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-reacho-woocommerce-settings.php';

		/**
		 * The class responsible for Cart Rebuild
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/services/class-reacho-woocommerce-cart-rebuild.php';

		/**
		 * The class responsible for Reacho WooCommerce Rest API
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/services/class-reacho-woocommerce-rest-api.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-reacho-woocommerce-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-reacho-woocommerce-public.php';

		/**
		 * The class responsible for customer actions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-reacho-woocommerce-customer.php';

		/**
		 * The class responsible for order actions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-reacho-woocommerce-order.php';

		/**
		 * The class responsible for cart actions
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-reacho-woocommerce-add-to-cart.php';

		$this->loader   = new Reacho_WooCommerce_Loader();
		$this->options  = new Reacho_WooCommerce_Options();
		$this->rest_api = new Reacho_WooCommerce_Rest_Api();
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Reacho_WooCommerce_Admin( $this->get_plugin_name(), $this->get_version() );

		// Scripts and styles
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// Settings & Ajax
		$plugin_settings = new Reacho_WooCommerce_Settings();
		$this->loader->add_action( 'admin_init', $plugin_settings, 'reachowc_register_settings' );
		$this->loader->add_action( 'wp_ajax_reachowc_validate_private_api_key', $plugin_settings, 'reachowc_validate_private_api_key' );
		$this->loader->add_action( 'wp_ajax_reachowc_validate_private_api_key', $plugin_settings, 'reachowc_validate_private_api_key' );
	}


	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Reacho_WooCommerce_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		// Customer
		$customer = new Reacho_WooCommerce_Customer();
		$this->loader->add_action( 'woocommerce_created_customer', $customer, 'reachowc_on_customer_created', 10, 2 );
		$this->loader->add_action( 'woocommerce_customer_object_updated_props', $customer, 'reachowc_on_customer_updated', 10, 2 );

		// Order
		$order = new Reacho_WooCommerce_Order();
		$this->loader->add_action( 'woocommerce_checkout_order_created', $order, 'reachowc_on_order_created', 10, 1 );
		$this->loader->add_action( 'woocommerce_order_status_changed', $order, 'reachowc_on_order_status_changed', 10, 3 );

		// Cart
		$cart = new Reacho_WooCommerce_Add_To_Cart();
		$this->loader->add_action( 'woocommerce_add_to_cart', $cart, 'reachowc_add_to_cart', 26, 3 );

	}

	/**
	 * Main WooCommerceReacho Instance
	 *
	 * Ensures only one instance of WooCommerceReacho is loaded or can be loaded.
	 *
	 * @return Reacho_WooCommerce - Main instance
	 * @see ReachoWC()
	 * @since 2.0.0
	 * @static
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
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
	 * @return    string    The name of the plugin.
	 * @since     1.0.0
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return    Reacho_WooCommerce_Loader    Orchestrates the hooks of the plugin.
	 * @since     1.0.0
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return    string    The version number of the plugin.
	 * @since     1.0.0
	 */
	public function get_version() {
		return $this->version;
	}

}