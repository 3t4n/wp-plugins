<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://plugwpress.com
 * @since      1.0.0
 *
 * @package    Ant_admin_notices_team
 * @subpackage Ant_admin_notices_team/includes
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
 * @package    Ant_admin_notices_team
 * @subpackage Ant_admin_notices_team/includes
 * @author     PlugWPress <info@plugwpress.com>
 */
class Ant_admin_notices_team {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Ant_admin_notices_team_Loader    $loader    Maintains and registers all hooks for the plugin.
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

		$this->plugin_name = 'ant_admin_notices_team';
		$this->version = '1.0.4';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Ant_admin_notices_team_Loader. Orchestrates the hooks of the plugin.
	 * - Ant_admin_notices_team_i18n. Defines internationalization functionality.
	 * - Ant_admin_notices_team_Admin. Defines all hooks for the admin area.
	 * - Ant_admin_notices_team_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ant_admin_notices_team-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ant_admin_notices_team-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ant_admin_notices_team-admin.php';


		$this->loader = new Ant_admin_notices_team_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Ant_admin_notices_team_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Ant_admin_notices_team_i18n();

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

		$plugin_admin = new Ant_admin_notices_team_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		//Action -> Register the Settings Page on Notices CPT Submenu
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_settings_page' );


		//Action -> Register all Settings
		$this->loader->add_action('admin_init', $plugin_admin, 'register_settings');

		//Action -> Enqueue Google Fonts
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'google_fonts' );
		//Action -> Enqueue Custom Css Setting
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'custom_css' );

		//Action -> Register Custom Post Type
		$this->loader->add_action( 'init', $plugin_admin, 'register_notices_custom_post_type' );
		//Action -> Force Notices to Private Status
		$this->loader->add_action( 'transition_post_status', $plugin_admin, 'post_status_to_private', 10, 3 );
		//Action -> Register Custom Post Type
		$this->loader->add_action( 'admin_init', $plugin_admin, 'add_users_caps' );

		//Action -> Add and Save Meta Box
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'add_author_meta_box' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'save_meta_box' );

		//Action -> Show Notices
		$this->loader->add_action('admin_notices', $plugin_admin, 'notices_showing');

		//Action -> Add Ajax Dismiss Notice
		$this->loader->add_action( 'wp_ajax_ant_dismiss', $plugin_admin, 'ant_process_ajax' );

		//Action -> Check if Notice is Expired
		$this->loader->add_action('admin_init', $plugin_admin, 'ant_notice_is_expired');

		//Filter -> Add Settings link on Installed Plugins Page
		$plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' );
		$this->loader->add_filter( 'plugin_action_links_' . $plugin_basename, $plugin_admin, 'add_action_links' );


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
	 * @return    Ant_admin_notices_team_Loader    Orchestrates the hooks of the plugin.
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
