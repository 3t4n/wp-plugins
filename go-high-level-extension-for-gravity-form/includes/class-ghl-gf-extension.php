<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.ibsofts.com
 * @since      5.0.7
 *
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/includes
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
 * @since      5.0.7
 * @package    Ghl_Gf_Extension
 * @subpackage Ghl_Gf_Extension/includes
 * @author     iB Softs <https://www.ibsofts.com>
 */
class Ghl_Gf_Extension {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    5.0.7
	 * @access   protected
	 * @var      Ghl_Gf_Extension_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    5.0.7
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    5.0.7
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
	 * @since    5.0.7
	 */
	public function __construct() {
		if ( defined( 'GHL_GF_EXTENSION_VERSION' ) ) {
			$this->version = GHL_GF_EXTENSION_VERSION;
		} else {
			$this->version = '5.0.7';
		}
		$this->plugin_name = 'ghl-gf-extension';

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
	 * - Ghl_Gf_Extension_Loader. Orchestrates the hooks of the plugin.
	 * - Ghl_Gf_Extension_i18n. Defines internationalization functionality.
	 * - Ghl_Gf_Extension_Admin. Defines all hooks for the admin area.
	 * - Ghl_Gf_Extension_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    5.0.7
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ghl-gf-extension-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ghl-gf-extension-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ghl-gf-extension-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-ghl-gf-extension-public.php';
		//add all api.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'ghl_api/ghl-all-apis.php';

		$this->loader = new Ghl_Gf_Extension_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Ghl_Gf_Extension_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    5.0.7
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Ghl_Gf_Extension_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    5.0.7
	 * @access   private
	 */
	
	 

private function define_admin_hooks() {

	$plugin_admin = new Ghl_Gf_Extension_Admin( $this->get_plugin_name(), $this->get_version() );

	$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
	$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	$this->loader->add_filter( 'gform_form_settings_menu',  $plugin_admin,'ibs_ghlgfe_menu_item' );
	$this->loader->add_filter( 'gform_form_settings_page_my_custom_form_settings_page', $plugin_admin, 'ibs_ghlgfe_display' );
	// $this->loader->add_filter( 'gform_addon_navigation', $plugin_admin, 'create_menu' );
	$this->loader->add_action( 'admin_menu', $plugin_admin, 'ghlgf_create_menu_page' ); 

	// $this->loader->add_action( 'gform_after_submission', $plugin_admin, 'ibs_ghlgfe_send_to_gohighlevel', 10, 3 );
	$this->loader->add_action( 'gform_after_submission', $plugin_admin, 'ibs_ghlgfe_send_to_gohighlevel', 10, 4 );
	$this->loader->add_filter( 'plugin_action_links', $plugin_admin, 'ghlplugin_settings', 10, 2 );
	$this->loader->add_action( 'wp_ajax_ghl_check_form_data', $plugin_admin, 'ghl_check_form_data' );
	$this->loader->add_action( 'admin_menu', $plugin_admin, 'remove_footer_version' ); 
	$this->loader->add_filter('admin_footer_text', $plugin_admin, 'remove_footer_admin');
	$this->loader->add_action( 'in_plugin_update_message-go-high-level-extension-for-gravity-form/ghl-gf-extension.php', $plugin_admin, 'ghl_plugin_update_msg', 10, 2 );

}
	
	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    5.0.7
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Ghl_Gf_Extension_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    5.0.7
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     5.0.7
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     5.0.7
	 * @return    Ghl_Gf_Extension_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     5.0.7
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}