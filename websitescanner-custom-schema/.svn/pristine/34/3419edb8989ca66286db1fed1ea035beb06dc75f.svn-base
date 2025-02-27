<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://plugin.nl/en/
 * @since      1.0.0
 *
 * @package    Websitescanner_Custom_Schema
 * @subpackage Websitescanner_Custom_Schema/includes
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
 * @package    Websitescanner_Custom_Schema
 * @subpackage Websitescanner_Custom_Schema/includes
 * @author     Tim van Iersel <tim@plugin.nl>
 */
class Websitescanner_Custom_Schema {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Websitescanner_Custom_Schema_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'WEBSITESCANNER_CUSTOM_SCHEMA_VERSION' ) ) {
			$this->version = WEBSITESCANNER_CUSTOM_SCHEMA_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'websitescanner-custom-schema';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-websitescanner-custom-schema-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-websitescanner-custom-schema-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-websitescanner-custom-schema-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-websitescanner-custom-schema-public.php';

		$this->loader = new Websitescanner_Custom_Schema_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Websitescanner_Custom_Schema_i18n();

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

		$plugin_post_editor = new Websitescanner_Custom_Schema_Post_Editor( $this->get_plugin_name(), $this->get_version() );
		// actions
		$this->loader->add_action( 'admin_init', $plugin_post_editor, 'add_metabox' );
		$this->loader->add_action( 'save_post', $plugin_post_editor, 'options_update');
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_post_editor, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_post_editor, 'enqueue_scripts' );

		$this->loader->add_filter( 'manage_pages_columns', $plugin_post_editor, 'websitescanner_custom_schema_modify_post_table' );
		$this->loader->add_action( 'manage_pages_custom_column', $plugin_post_editor, 'websitescanner_custom_schema_modify_post_table_row' );

		$this->loader->add_filter( 'manage_posts_columns', $plugin_post_editor, 'websitescanner_custom_schema_modify_post_table' );
		$this->loader->add_action( 'manage_posts_custom_column', $plugin_post_editor, 'websitescanner_custom_schema_modify_post_table_row' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Websitescanner_Custom_Schema_Public( $this->get_plugin_name(), $this->get_version() );

		// actions
		$this->loader->add_action( 'wp_head', $plugin_public, 'get_page_json_ld' );
		$this->loader->add_action( 'amp_post_template_head', $plugin_public, 'get_page_json_ld' );

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
	 * @return    Websitescanner_Custom_Schema_Loader    Orchestrates the hooks of the plugin.
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
