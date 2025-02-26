<?php

/**
 * The core plugin class.
 *
 * This handles the plugin initialization, dependencies, and hooks for both
 * admin and public functionalities.
 *
 * @link       https://alessioruggieri.com
 * @since      1.0.0
 * @package    Arpcso_Page_Cpt_Style_Organizer
 */

class Arpcso_Page_Cpt_Style_Organizer
{

	/**
	 * The loader for managing and registering hooks.
	 *
	 * @since    1.0.0
	 * @var      Arpcso_Page_Cpt_Style_Organizer_Loader
	 */
	protected $loader;

	/**
	 * The unique identifier of the plugin.
	 *
	 * @since    1.0.0
	 * @var      string
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @var      string
	 */
	protected $version;

	/**
	 * The admin class instance.
	 *
	 * @since    1.0.0
	 * @var      Arpcso_Page_Cpt_Style_Organizer_Admin
	 */
	protected $plugin_admin;

	/**
	 * Initialize the plugin and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		$this->version = defined('ARPCSO_PAGE_CPT_STYLE_ORGANIZER_VERSION')
			? ARPCSO_PAGE_CPT_STYLE_ORGANIZER_VERSION
			: '1.0.0';
		$this->plugin_name = 'arpcso-page-cpt-style-organizer';

		$this->load_dependencies();
		$this->define_admin_hooks();
	}

	/**
	 * Load the dependencies for the plugin.
	 *
	 * This includes the loader class for registering hooks,
	 * and the admin-specific class for managing admin functionality.
	 *
	 * @since    1.0.0
	 */
	private function load_dependencies()
	{
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-arpcso-page-cpt-style-organizer-loader.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-arpcso-page-cpt-style-organizer-admin.php';

		$this->loader = new Arpcso_Page_Cpt_Style_Organizer_Loader();
	}

	/**
	 * Define all hooks for the admin area functionality.
	 *
	 * This sets up the admin-specific functionality and registers it
	 * with the loader to integrate with WordPress.
	 *
	 * @since    1.0.0
	 */
	private function define_admin_hooks()
	{
		$this->plugin_admin = new Arpcso_Page_Cpt_Style_Organizer_Admin($this->plugin_name);
		$this->loader->add_action('admin_menu', $this->plugin_admin, 'add_menu');
		$this->loader->add_action('admin_enqueue_scripts', $this->plugin_admin, 'enqueue_scripts');
		$this->loader->add_action('admin_enqueue_scripts', $this->plugin_admin, 'enqueue_styles');
		$this->loader->add_action('add_meta_boxes', $this->plugin_admin, 'add_metabox');
		$this->loader->add_action('save_post', $this->plugin_admin, 'save_metabox_data');
		$this->loader->add_action('restrict_manage_posts', $this->plugin_admin, 'add_custom_filter');
		$this->loader->add_action('pre_get_posts', $this->plugin_admin, 'filter_pages_by_custom_type');
	}

	/**
	 * Retrieve the instance of the admin class.
	 *
	 * This method returns the instance of the admin class, which handles
	 * admin-specific functionality such as rendering the admin page and
	 * managing settings.
	 *
	 * @since    1.0.0
	 * @return   Arpcso_Page_Cpt_Style_Organizer_Admin
	 */
	public function get_admin_instance()
	{
		return $this->plugin_admin;
	}

	/**
	 * Run the loader to execute all hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * Retrieve the plugin name.
	 *
	 * @since    1.0.0
	 * @return   string    The unique identifier of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * Retrieve the loader instance.
	 *
	 * This loader manages and executes all the hooks for the plugin.
	 *
	 * @since    1.0.0
	 * @return   Arpcso_Page_Cpt_Style_Organizer_Loader
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version of the plugin.
	 *
	 * @since    1.0.0
	 * @return   string    The current version of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
