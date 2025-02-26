<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://webdeclic.com
 * @since      1.0.0
 *
 * @package    Lexilink
 * @subpackage Lexilink/includes
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
 * @package    Lexilink
 * @subpackage Lexilink/includes
 * @author     Webdeclic <contact@webdeclic.com>
 */
class Lexilink {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Lexilink_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

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
	 * - Lexilink_Loader. Orchestrates the hooks of the plugin.
	 * - Lexilink_i18n. Defines internationalization functionality.
	 * - Lexilink_Admin. Defines all hooks for the admin area.
	 * - Lexilink_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for loading composer dependencies.
		 */
		require_once LEXILINK_PLUGIN_PATH . 'includes/vendor/autoload.php';

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once LEXILINK_PLUGIN_PATH . 'includes/class-lexilink-loader.php';
		
		/**
		 * The global functions for this plugin
		 */
		require_once LEXILINK_PLUGIN_PATH . 'includes/global-functions.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once LEXILINK_PLUGIN_PATH . 'includes/class-lexilink-i18n.php';

		/**
		 * The class responsible of settings.
		 */
		require_once LEXILINK_PLUGIN_PATH . 'admin/class-settings.php';

		/**
		 * Importer class for managing the import process of a WXR file
		 */
		require_once LEXILINK_PLUGIN_PATH . 'admin/class-import.php';

		/**
		 * The class responsible of glossary CPT.
		 */
		require_once LEXILINK_PLUGIN_PATH . 'admin/class-cpt.php';

		/**
		 * Class for managing the export process of a WXR file
		 */
		require_once LEXILINK_PLUGIN_PATH . 'admin/class-export.php';

		/**
		 * The class responsible of shortcodes.
		 */
		require_once LEXILINK_PLUGIN_PATH . 'public/class-shortcodes.php';

		$this->loader = new Lexilink_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Lexilink_i18n();
		$this->loader->add_action( 'init', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$lexilink_settings = new Lexilink_Settings();
		$this->loader->add_action( 'admin_enqueue_scripts', $lexilink_settings, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $lexilink_settings, 'add_settings_menu' );
		$this->loader->add_action( 'admin_init', $lexilink_settings, 'save_settings_page' );

		$lexilink_cpt = new Lexilink_CPT();
		$this->loader->add_action( 'init', $lexilink_cpt, 'register_post_type' );
		$this->loader->add_action( 'add_meta_boxes', $lexilink_cpt, 'add_meta_boxes', 10, 2 );
		$this->loader->add_action( 'save_post_lexilink', $lexilink_cpt, 'save_meta_boxes', 10, 3 );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$lexilink_shortcodes = new Lexilink_Shortcodes();
		$this->loader->add_action( 'init', $lexilink_shortcodes, 'add_shortcodes' );

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
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Lexilink_Loader    Orchestrates the hooks of the plugin.
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
		return defined( 'LEXILINK_VERSION' ) ? LEXILINK_VERSION : '1.0.0';
	}

}
