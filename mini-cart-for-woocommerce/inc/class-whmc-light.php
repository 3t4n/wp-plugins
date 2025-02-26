<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that inc attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      2.0.7
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/inc
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
 * @since      2.0.7
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/inc
 */
 class WHMC_LIGHT_H {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    2.0.7
	 * @access   protected
	 * @var      mini-cart-for-woocommerce_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    2.0.7
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    2.0.7
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
	 * @since    2.0.7
	 */
	public function __construct() {
		if ( defined( 'WHMC_LIGHT_VERSION' ) ) {
			$this->version = WHMC_LIGHT_VERSION;
		} else {
			$this->version = '2.0.7';
		}
		$this->plugin_name = 'mini-cart-for-woocommerce';

		$this->load_dependencies();
	
		$this->define_admin_hooks();

		$this->define_public_hooks();


	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - mini-cart-for-woocommerce_Loader. Orchestrates the hooks of the plugin.
	 * - mini-cart-for-woocommerce_i18n. Defines internationalization functionality.
	 * - mini-cart-for-woocommerce_Admin. Defines all hooks for the admin area.
	 * - mini-cart-for-woocommerce_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    2.0.7
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/frontend/class-whmc-fragments.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/frontend/class-whmc-frontend.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-whmc-light-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-whmc_cart.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-whmc-light-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-whmc-men-settings.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-whmc-notofication.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-whmc-light-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-whmc-shortcode.php';

		$this->loader = new WHMC_Loader_Light();
		

	}


	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    2.0.7
	 * @access   private
	 */
	private function define_admin_hooks() {
	if(class_exists('mini-cart-for-woocommerce')){ 
		return;
	}else{
		$plugin_admin = new WHMC_Admin_Light( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		$this->loader->add_action( 'admin_menu', $plugin_admin, 'mcfwc__admin_menu' );

		$this->loader->add_action( 'admin_notices', $plugin_admin, 'woo_admin_notices' );

		
		$this->loader->add_filter( 'plugin_action_links_' .plugin_basename( dirname( __DIR__ ).'/mini_cart_fwc.php' ), $plugin_admin, 'plugin_settings_link');		
		$this->loader->add_filter( 'admin_footer_text', $plugin_admin, 'adminFooterText', 1, 1);


	}
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    2.0.7
	 * @access   private
	 */
	private function define_public_hooks() {


		$plugin_public = new WHMC_Public_Light( $this->get_plugin_name(), $this->get_version() );

			

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$this->loader->add_action( 'wp_footer', $plugin_public, 'whmc_fotter_content' ,10 );

		$this->loader->add_filter('wp_nav_menu_items', $plugin_public, 'add_admin_link', 10, 2);

		$this->loader->add_action( 'wp_print_scripts', $plugin_public, 'enqueue_cart_fragment_script', 99999999 );

	}



	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    2.0.7
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     2.0.7
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     2.0.7
	 * @return    mini-cart-for-woocommerce_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     2.0.7
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
