<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://100xwpdev.com
 *
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/includes
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
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/includes
 * @author     Bheru Lal Gameti  <bherulalgameti24@gmail.com>
 */
class Easy_Store_Customizer
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 
	 * @access   protected
	 * @var      Easy_Store_Customizer_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Store plugin admin class to allow public access.
	 *
	 * @var object      The admin class.
	 */
	public $admin;


	/**
	 * Store plugin public class to allow public access.
	 *
	 * @var object      The admin class.
	 */
	public $public;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 
	 */

	/**
	 * The settings of the plugin
	 *  
	 */
	public $settings;

	public function __construct()
	{
		if (defined('EASY_STORE_CUSTOMIZER_VERSION')) {
			$this->version = EASY_STORE_CUSTOMIZER_VERSION;
		} else {
			$this->version = '1.1.0';
		}
		$this->plugin_name = 'easy-store-customizer';

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
	 * - Easy_Store_Customizer_Loader. Orchestrates the hooks of the plugin.
	 * - Easy_Store_Customizer_i18n. Defines internationalization functionality.
	 * - Easy_Store_Customizer_Admin. Defines all hooks for the admin area.
	 * - Easy_Store_Customizer_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 
	 * @access   private
	 */
	private function load_dependencies()
	{

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-easy-store-customizer-loader.php';


		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-easy-store-customizer-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-easy-store-customizer-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-easy-store-customizer-public.php';

		/**
		 * The class responsible for defining settings for the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-easy-store-customizer-settings.php';

		/**
		 * This class is used to define the features of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-easy-store-customizer-features.php';

		$this->loader = new Easy_Store_Customizer_Loader();
		$this->settings = new Easy_Store_Customizer_Settings();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Easy_Store_Customizer_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 
	 * @access   private
	 */
	private function set_locale()
	{

		$plugin_i18n = new Easy_Store_Customizer_i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 
	 * @access   private
	 */
	private function define_admin_hooks()
	{

		$this->admin = new Easy_Store_Customizer_Admin($this->get_plugin_name(), $this->get_version(), $this->settings);

		$this->loader->add_action('admin_enqueue_scripts', $this->admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $this->admin, 'enqueue_scripts');

		// Add menu item
		$this->loader->add_action('admin_menu', $this->admin, 'add_plugin_admin_menu');

		// Add Settings link to the plugin
		$plugin_basename = plugin_basename(plugin_dir_path(__DIR__) . $this->plugin_name . '.php');
		$this->loader->add_filter('plugin_action_links_' . $plugin_basename, $this->admin, 'add_action_links');

		// Handle Setting form submission
		// Register Ajax actions
		$this->loader->add_action('wp_ajax_save_esc_settings', $this->admin, 'save_esc_settings');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 
	 * @access   private
	 */
	private function define_public_hooks()
	{

		$public_features = new Easy_Store_Customizer_Features($this->get_plugin_name(), $this->settings);

		$this->public = new Easy_Store_Customizer_Public($this->get_plugin_name(), $this->get_version());

		// Enqueue public styles
		$this->loader->add_action('wp_enqueue_scripts', $this->public, 'enqueue_styles');

		if ($this->settings->is_enabled('shop_add_to_cart')) {
			$this->loader->add_filter('woocommerce_product_add_to_cart_text', $public_features, 'esc_rename_add_to_cart_button_label', 9999, 2);
			$this->loader->add_filter('woocommerce_product_single_add_to_cart_text', $public_features, 'esc_rename_add_to_cart_button_label', 9999, 2);
		}

		if ($this->settings->is_enabled('product_qty_input_plus_minus')) {
			$this->loader->add_action('woocommerce_before_quantity_input_field', $public_features, 'esc_product_qty_input_display_minus_button');
			$this->loader->add_action('woocommerce_after_quantity_input_field', $public_features, 'esc_product_qty_input_display_plus_button');
			$this->loader->add_action('woocommerce_before_single_product', $public_features, 'esc_product_qty_input_button_script');
		}
		if ($this->settings->is_enabled('shop_product_per_page')) {
			$this->loader->add_filter('loop_shop_per_page', $public_features, 'esc_shop_product_per_page', 9999, 2);
		}
		if ($this->settings->is_enabled('product_qty_input_arrows')) {
			$this->loader->add_action('wp_enqueue_scripts', $public_features, 'esc_product_input_hide_number_arrows');
		}
		if ($this->settings->is_enabled('product_show_number_sold')) {
			$position = $this->settings->get('product_show_number_sold', 'position') ?? 'woocommerce_single_product_summary';
			$this->loader->add_action($position, $public_features, 'esc_product_show_number_sold');
		}
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return    Easy_Store_Customizer_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
