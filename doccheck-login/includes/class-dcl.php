<?php

namespace DCL\Includes;

use DCL\Admin\DCL_Columns;
use DCL\Admin\DCL_Metaboxes;
use DCL\Admin\DCL_Settings;
use DCL\Client\DCL_Client;
use DCL\Client\DCL_Shortcodes;
use DCL\Client\DCL_Cache_Helper;

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
 * @package    DCL\Includes
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      DCL_Loader $loader Maintains and registers all hooks for the plugin.
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
	 * @since   1.0.0
	 * @access  public
	 */
	public function __construct() {

        $this->plugin_name = 'dc-login';
		$this->version     = '1.1.5';

		$this->set_loader();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Setting up the loader.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_loader() {
		$this->loader = new DCL_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new DCL_I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the admin area 
	 * functionality of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		// Settings
		$plugin_admin_settings = new DCL_Settings(
			$this->get_plugin_name(),
			$this->get_version()
		);

		$this->loader->add_action( 'admin_init', $plugin_admin_settings, 'dcl_register_settings' );
		$this->loader->add_action( 'admin_menu', $plugin_admin_settings, 'dcl_register_settings_page' );
		$this->loader->add_action( "load-settings_page_{$this->plugin_name}", $plugin_admin_settings, 'dcl_settings_page_help' );
		$this->loader->add_filter( "plugin_action_links_{$this->plugin_name}/{$this->plugin_name}.php", $plugin_admin_settings, 'dcl_add_action_links' );

		// Meta boxes
		$plugin_admin_meta_boxes = new DCL_Metaboxes(
			$this->get_plugin_name(),
			$this->get_version()
		);

		$this->loader->add_action( 'add_meta_boxes', $plugin_admin_meta_boxes, 'dcl_register_meta_boxes' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin_meta_boxes, 'dcl_register_meta_boxes_custom_post_type' );
		$this->loader->add_action( 'save_post', $plugin_admin_meta_boxes, 'dcl_save_meta_boxes' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_meta_boxes, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin_meta_boxes, 'enqueue_scripts' );

		// Columns
		$plugin_admin = new DCL_Columns(
			$this->get_plugin_name(),
			$this->get_version()
		);

		$this->loader->add_filter( 'manage_posts_columns', $plugin_admin, 'dcl_add_admin_column', 10 );
		$this->loader->add_filter( 'manage_pages_columns', $plugin_admin, 'dcl_add_admin_column', 10 );
		$this->loader->add_action( 'manage_posts_custom_column', $plugin_admin, 'dcl_manage_admin_columns', 10 );
		$this->loader->add_action( 'manage_pages_custom_column', $plugin_admin, 'dcl_manage_admin_columns', 10 );
		$this->loader->add_action( 'admin_head', $plugin_admin, 'dcl_admin_columns_width' );
	}

	/**
	 * Register all of the hooks related to the public-facing
	 * functionality of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		
		// Basic functionality
		$plugin_public = new DCL_Client(
			$this->get_plugin_name(),
			$this->get_version()
		);

		$this->loader->add_action( 'init', $plugin_public, 'dcl_start_session' );
		$this->loader->add_action( 'pre_get_posts', $plugin_public, 'dcl_filter_search_results' );
		$this->loader->add_filter( 'wp_get_nav_menu_items', $plugin_public, 'dcl_filter_menus' );
		$this->loader->add_action( 'template_redirect', $plugin_public, 'dcl_access_redirect' );
		$this->loader->add_action( 'admin_post_dcl_logout', $plugin_public, 'dcl_do_logout' );
		$this->loader->add_action( 'admin_post_nopriv_dcl_logout', $plugin_public, 'dcl_do_logout' );

		// Shortcodes
		$plugin_public_shortcodes = new DCL_Shortcodes(
			$this->get_plugin_name(),
			$this->get_version()
		);

		$this->loader->add_action( 'init', $plugin_public_shortcodes, 'dcl_register_shortcodes' );

		// Cache Helper
		$plugin_public_cachehelper = new DCL_Cache_Helper(
			$this->get_plugin_name(),
			$this->get_version()
		);

		$this->loader->add_filter( 'nocache_headers', $plugin_public_cachehelper, 'dcl_additional_nocache_headers', 10 );
		$this->loader->add_action( 'wp', $plugin_public_cachehelper, 'dcl_prevent_caching' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @access    public
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @access    public
	 * @return    DCL_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @access    public
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
