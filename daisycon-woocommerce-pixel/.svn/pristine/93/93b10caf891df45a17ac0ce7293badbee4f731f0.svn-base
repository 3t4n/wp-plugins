<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.daisycon.com
 * @since      1.0.0
 *
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/includes
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
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/includes
 * @author     daisycon
 */
class Daisycon_Woocommerce
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Daisycon_Woocommerce_Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
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

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		$this->version = true === defined('DAISYCON_PLUGIN_VERSION')
			? DAISYCON_PLUGIN_VERSION
			: '2.2.1';

		$this->plugin_name = 'daisycon-woocommerce';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_rest_apis();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Daisycon_Woocommerce_Loader. Orchestrates the hooks of the plugin.
	 * - Daisycon_Woocommerce_i18n. Defines internationalization functionality.
	 * - Daisycon_Woocommerce_Admin. Defines all hooks for the admin area.
	 * - Daisycon_Woocommerce_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies()
	{
		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		$this->loader = new Daisycon_Woocommerce_Loader();
	}

	/**
	 * Register all the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{
		/**
		 * Admin
		 */
		$plugin_admin = new Daisycon_Woocommerce_Admin($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles'); /* Admin_enqueue_scripts instead of admin_enqueue_styles is correct (yes!)*/
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
		$this->loader->add_action('woocommerce_product_options_general_product_data', $plugin_admin, 'daisycon_add_custom_cc_option');
		$this->loader->add_action('woocommerce_process_product_meta', $plugin_admin, 'daisycon_save_custom_cc_option');
		$this->loader->add_action('woocommerce_product_quick_edit_end', $plugin_admin, 'daisycon_cc_quick_edit');
		$this->loader->add_action('woocommerce_product_quick_edit_save', $plugin_admin, 'daisycon_cc_quick_edit_save', 10, 1);
		$this->loader->add_action('manage_product_posts_custom_column', $plugin_admin, 'daisycon_cc_quick_edit_value', 10, 2);

		/**
		 * Settings
		 */
		$plugin_settings = new Daisycon_Woocommerce_Settings($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('admin_init', $plugin_settings, 'daisycon_register_settings');
		$this->loader->add_action('admin_menu', $plugin_settings, 'daisycon_add_options_page');
		$this->loader->add_action('admin_notices', $plugin_settings, 'daisycon_check_required_settings');
		$this->loader->add_action('update_option', $plugin_settings,  'daisyconSaveAutomaticValidationSettings', 10, 3);
	}

	/**
	 * Register all the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks()
	{
		$plugin_public = new Daisycon_Woocommerce_Public($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('wp_head', $plugin_public, 'daisycon_lcc_script');

		$this->loader->add_action('woocommerce_thankyou', $plugin_public, 'daisycon_add_pixel');
	}

	/**
	 * Register all the hooks related to the ajax APIs of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_rest_apis()
	{
		$campaignService = new Daisycon_Campaign_Service();
		$this->loader->add_action('wp_ajax_load_matching_domains', $campaignService, 'loadMatchingDomains');

		$commonService = new Daisycon_Common_Service();
		$this->loader->add_action('wp_ajax_daisycon_get_setting_value', $commonService, 'getSettingsValue');
	}

	/**
	 * Run the loader to execute all the hooks with WordPress.
	 *
	 * @since    1.0.0
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
	 * @since     1.0.0
	 */
	public function get_plugin_name(): string
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return    Daisycon_Woocommerce_Loader    Orchestrates the hooks of the plugin.
	 * @since     1.0.0
	 */
	public function get_loader(): Daisycon_Woocommerce_Loader
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return    string    The version number of the plugin.
	 * @since     1.0.0
	 */
	public function get_version(): string
	{
		return $this->version;
	}

}
