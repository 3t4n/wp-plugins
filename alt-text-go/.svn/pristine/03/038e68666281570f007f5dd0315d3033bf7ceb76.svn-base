<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://alttextgo.com
 * @since      1.0.0
 *
 * @package    ALTGOO
 * @subpackage ALTGOO/includes
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
 * @package    ALTGOO
 * @subpackage ALTGOO/includes
 * @author     AltTextGo <support@alttextgo.com>
 */
class ALTGOO {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      ALTGOO_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'ALTGOO_VERSION' ) ) {
			$this->version = ALTGOO_VERSION;
		} else {
			$this->version = '1.0.1';
		}
		$this->plugin_name = 'ALTGOO';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - ALTGOO_Loader. Orchestrates the hooks of the plugin.
	 * - ALTGOO_i18n. Defines internationalization functionality.
	 * - ALTGOO_Admin. Defines all hooks for the admin area.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-altgoo-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-altgoo-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-altgoo-admin.php';

		/**
		 * The class responsible for managing settings.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-altgoo-settings.php';


		/**
		 * The class responsible for managing api.
		 */

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-altgoo-api.php';

		/**
		 * The class responsible for generating alt text for the image editor block.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-altgoo-image-editor.php';


		$this->loader = new ALTGOO_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the ALTGOO_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new ALTGOO_i18n();

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

		$plugin_admin = new ALTGOO_Admin( $this->get_plugin_name(), $this->get_version() );
		$settings = new ALTGOO_Settings();
		$image_editor = new ALTGOO_Image_Editor();


		// Admin
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// Settings
		$this->loader->add_action( 'admin_menu', $settings, 'register_settings_page' );
		$this->loader->add_action( 'admin_init', $settings, 'register_settings' );

		$this->loader->add_filter( 'pre_update_option_altgoo_api_key', $settings, 'handle_submit_api_key', 10, 2 );

		// Image Editor
		$this->loader->add_action( 'enqueue_block_editor_assets', $plugin_admin, 'enqueue_script_for_image_block_editor' );
		$this->loader->add_action( 'wp_ajax_altgoo_generate_alt_text_single', $image_editor, 'generate_alt_text_single' );

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
	 * @return    ALTGOO_Loader    Orchestrates the hooks of the plugin.
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
