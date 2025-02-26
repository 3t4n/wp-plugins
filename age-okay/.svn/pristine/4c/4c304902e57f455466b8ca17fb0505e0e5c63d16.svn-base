<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/includes
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
 * @package    Age_Okay
 * @subpackage Age_Okay/includes
 * @author     Code Alt Del <info@codealtdel.com>
 */
class Age_Okay {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Age_Okay_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;
	
	/**
	 * The shared methods and properties that are used in both the admin and public areas of
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Age_Okay_Shared    $shared    Class for shared admin and public functionality.
	 */
	protected $shared;

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
		
		if ( ! defined( 'AGE_OKAY_DEBUG' ) ) {
			define( 'AGE_OKAY_DEBUG', false );
		}
		if ( defined( 'AGE_OKAY_VERSION' ) ) {
			$this->version = AGE_OKAY_VERSION;
		} else {
			$this->version = '1.0.3-F';
		}
		$this->plugin_name = 'age-okay';

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
	 * - Age_Okay_Loader. Orchestrates the hooks of the plugin.
	 * - Age_Okay_i18n. Defines internationalization functionality.
	 * - Age_Okay_Admin. Defines all hooks for the admin area.
	 * - Age_Okay_Public. Defines all hooks for the public side of the site.
	 * - Age_Okay_Shared. Defines shared functions for admin and public.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-age-okay-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-age-okay-i18n.php';
		
		/**
		 * The class responsible for defining all actions that occur in both the admin and public area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-age-okay-shared.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-age-okay-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-age-okay-public.php';

		$this->loader = new Age_Okay_Loader();
		
		$this->shared = new Age_Okay_Shared();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Age_Okay_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Age_Okay_i18n();

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

		$plugin_admin = new Age_Okay_Admin( $this->get_plugin_name(), $this->get_version(), $this->shared );
		
		$this->check_ajax_post_admin( $plugin_admin );
		
		if ( ! empty( $_GET['page'] ) && ( $_GET['page'] == 'age-okay' || $_GET['page'] == 'age-okay-settings' || $_GET['page'] == 'age-okay-trans' || $_GET['page'] == 'age-okay-docs' || $_GET['page'] == 'age-okay-pro' ) ) {
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		}
		
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'admin_age_okay_menu' );

	}
	
	/**
	 * Check if ajax action occuring and add hooks for it
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    class   $plugin_admin   Admin class variable
	 */
	private function check_ajax_post_admin( $plugin_admin ) { 
	
		if ( is_admin() && defined( 'DOING_AJAX' ) && DOING_AJAX && !empty( $_POST ) ) {
			if ( $_POST['action'] == 'age_okay_preview' ) {
				// save preview data in editor
				$this->loader->add_action( 'wp_ajax_age_okay_preview', $plugin_admin, 'ajax_age_okay_preview' );
			} elseif ( $_POST['action'] == 'age_okay_save' ) {
				// save data to live version in editor
				$this->loader->add_action( 'wp_ajax_age_okay_save', $plugin_admin, 'ajax_age_okay_save' );
			} elseif ( $_POST['action'] == 'age_okay_discard' ) {
				// revert to last saved version of verification screen or back to default values
				$this->loader->add_action( 'wp_ajax_age_okay_discard', $plugin_admin, 'ajax_age_okay_discard' );
			} elseif ( $_POST['action'] == 'age_okay_settings_save' ) {
				// save data in settings page, if age okay is enabled and where to display
				$this->loader->add_action( 'wp_ajax_age_okay_settings_save', $plugin_admin, 'ajax_age_okay_settings_save' );
			}
			return false;
		}
		
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Age_Okay_Public( $this->get_plugin_name(), $this->get_version(), $this->shared );

		$this->check_ajax_post_public( $plugin_public );
		
		// set dynamically in __construct of Age_Okay_Public class
		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}
	
	/**
	 * Check if ajax action occuring and add hooks for it
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    class   $plugin_public   Public class variable
	 */
	private function check_ajax_post_public( $plugin_public ) { 
	
		if ( is_admin() && ! empty( $_POST['action'] ) ) {
			if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
				if ( $_POST['action'] == 'age_okay_init' ) {
					// create the verification screen if using the cache or cache_preload load types
					$this->loader->add_action( 'wp_ajax_age_okay_init', $plugin_public, 'ajax_age_okay_init' );
					$this->loader->add_action( 'wp_ajax_nopriv_age_okay_init', $plugin_public, 'ajax_age_okay_init' );
				} elseif ( $_POST['action'] == 'age_okay_verify' ) {
					// verify if user has submitted the right data
					$this->loader->add_action( 'wp_ajax_age_okay_verify', $plugin_public, 'ajax_age_okay_verify' );
					$this->loader->add_action( 'wp_ajax_nopriv_age_okay_verify', $plugin_public, 'ajax_age_okay_verify' );
				}
			} elseif ( $_POST['action'] == 'age_okay_verify' ) {
				$this->loader->add_action( 'admin_post_age_okay_verify', $plugin_public, 'post_age_okay_verify' );
				$this->loader->add_action( 'admin_post_nopriv_age_okay_verify', $plugin_public, 'post_age_okay_verify' );
			}
		}
		
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
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		
		return $this->version;
		
	}

}
