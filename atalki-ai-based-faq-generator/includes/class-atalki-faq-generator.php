<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://blackzoid.com/
 * @since      1.0.0
 *
 * @package    Atalki_Faq_Generator
 * @subpackage Atalki_Faq_Generator/includes
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
 * @package    Atalki_Faq_Generator
 * @subpackage Atalki_Faq_Generator/includes
 * @author     BlackZoid <namaste@blackzoid.com>
 */
class Atalki_Faq_Generator {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Atalki_Faq_Generator_Loader    $loader    Maintains and registers all hooks for the plugin.
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

	protected $admin;

	public function __construct() {
		if ( defined( 'ATALKI_FAQ_GENERATOR_VERSION' ) ) {
			$this->version = ATALKI_FAQ_GENERATOR_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'atalki-faq-generator';

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
	 * - Atalki_Faq_Generator_Loader. Orchestrates the hooks of the plugin.
	 * - Atalki_Faq_Generator_i18n. Defines internationalization functionality.
	 * - Atalki_Faq_Generator_Admin. Defines all hooks for the admin area.
	 * - Atalki_Faq_Generator_Public. Defines all hooks for the public side of the site.
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
		require_once ATALKI_FAQ_GENERATOR_DIR_PATH . '/includes/class-atalki-faq-generator-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once ATALKI_FAQ_GENERATOR_DIR_PATH . '/includes/class-atalki-faq-generator-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once ATALKI_FAQ_GENERATOR_DIR_PATH . '/admin/class-atalki-faq-generator-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once ATALKI_FAQ_GENERATOR_DIR_PATH . '/public/class-atalki-faq-generator-public.php';

		$this->loader = new Atalki_Faq_Generator_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Atalki_Faq_Generator_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Atalki_Faq_Generator_i18n();

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

		$plugin_admin = new Atalki_Faq_Generator_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->admin = $plugin_admin;

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		$this->loader->add_action( 'admin_menu', $plugin_admin, 'admin_menus' ); // admin menus

		// $this->loader->add_action( 'admin_init', $plugin_admin, 'afg_process_verify_token' ); // process signup
		$this->loader->add_action( 'admin_init', $plugin_admin, 'afg_process_signup' ); // process signup
		$this->loader->add_action( 'admin_init', $plugin_admin, 'afg_process_login' ); // process login
		$this->loader->add_action( 'admin_init', $plugin_admin, 'afg_process_link_page' ); // process link page
		$this->loader->add_action( 'admin_init', $plugin_admin, 'afg_process_recreate_page' ); // process recreate page

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Atalki_Faq_Generator_Public( $this->get_plugin_name(), $this->get_version() );
		
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$plugin_public->public_shortcodes();
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
	 * @return    Atalki_Faq_Generator_Loader    Orchestrates the hooks of the plugin.
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

	public function get_admin(){
		return $this->admin;
	}

}
