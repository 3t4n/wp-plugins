<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      1.0.0
 * @package    Woocommerce_NZ_Shipping_Zones
 * @subpackage Woocommerce_NZ_Shipping_Zones/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization and api-specific hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Woocommerce_NZ_Shipping_Zones
 * @subpackage Woocommerce_NZ_Shipping_Zones/includes
 */
class Woocommerce_NZ_Shipping_Zones {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    Woocommerce_NZ_Shipping_Zones_Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $woocommerce_nz_shipping_zones The string used to uniquely identify this plugin.
	 */
	protected $woocommerce_nz_shipping_zones;

	/**
	 * The current version of the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string $version The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks by the api.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		if ( defined( 'WOOCOMMERCE_NZ_SHIPPING_ZONES_VERSION' ) ) {
			$this->version = WOOCOMMERCE_NZ_SHIPPING_ZONES_VERSION;
		} else {
			$this->version = '1.0.0';
		}

		$this->woocommerce_nz_shipping_zones = 'woocommerce-nz-shipping-zones';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_api_hooks();
	}

	/**
	 * Loads the required dependencies for this plugin.
	 *
	 * Includes the following files that make up the plugin:
	 *
	 * - Woocommerce_NZ_Shipping_Zones_Loader. Orchestrates the hooks of the plugin.
	 * - Woocommerce_NZ_Shipping_Zones_Translation. Defines internationalization functionality.
	 * - Woocommerce_NZ_Shipping_Zones_Api. Defines all hooks for the api.
	 *
	 * Creates an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private function load_dependencies() {
		/**
		 * The class responsible for managing actions and filters of the core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-woocommerce-nz-shipping-zones-loader.php';

		/**
		 * The class responsible for defining internationalization functionality of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-woocommerce-nz-shipping-zones-translation.php';

		/**
		 * The class responsible for defining all api functionality.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'api/class-woocommerce-nz-shipping-zones-api.php';

		$this->loader = new Woocommerce_NZ_Shipping_Zones_Loader();
	}

	/**
	 * Defines the locale for this plugin for internationalization.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new Woocommerce_NZ_Shipping_Zones_Translation();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Registers all of the hooks related to the api functionality
	 * of the plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private function define_api_hooks() {
		$plugin_api = new Woocommerce_NZ_Shipping_Zones_Api( $this->get_woocommerce_nz_shipping_zones(), $this->get_version() );

		$this->loader->add_action( 'activated_plugin', $plugin_api, 'create_shipping_zones' );
	}

	/**
	 * Runs the loader to execute all of the hooks with WordPress.
	 *
	 * @since 1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since  1.0.0
	 * @return string The name of the plugin.
	 */
	public function get_woocommerce_nz_shipping_zones() {
		return $this->woocommerce_nz_shipping_zones;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since  1.0.0
	 * @return Woocommerce_NZ_Shipping_Zones_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieves the version number of the plugin.
	 *
	 * @since  1.0.0
	 * @return string The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
