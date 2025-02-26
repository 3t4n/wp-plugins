<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://codetides.com
 * @since      1.0.0
 *
 * @package    Advanced_Floating_Sliding_Panel
 * @subpackage Advanced_Floating_Sliding_Panel/includes
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
 * @package    Advanced_Floating_Sliding_Panel
 * @subpackage Advanced_Floating_Sliding_Panel/includes
 * @author     CodeTides <contact@codetides.com>
 */
class Advanced_Floating_Sliding_Panel {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Advanced_Floating_Sliding_Panel_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'AFSP_VERSION' ) ) {
			$this->version = AFSP_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'advanced-floating-sliding-panel';

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
	 * - Advanced_Floating_Sliding_Panel_Loader. Orchestrates the hooks of the plugin.
	 * - Advanced_Floating_Sliding_Panel_i18n. Defines internationalization functionality.
	 * - Advanced_Floating_Sliding_Panel_Admin. Defines all hooks for the admin area.
	 * - Advanced_Floating_Sliding_Panel_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-advanced-floating-sliding-panel-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-advanced-floating-sliding-panel-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-advanced-floating-sliding-panel-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/function-advanced-floating-sliding-panel-admin.php';		
		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-advanced-floating-sliding-panel-public.php';

		$this->loader = new Advanced_Floating_Sliding_Panel_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Advanced_Floating_Sliding_Panel_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Advanced_Floating_Sliding_Panel_i18n();

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

		$plugin_admin = new Advanced_Floating_Sliding_Panel_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'afsp_enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'afsp_enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_admin, 'afsp_register_cpt' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin,  'afsp_add_meta_box' );
		$this->loader->add_action( 'save_post',$plugin_admin, 'afsp_save_meta_box' );
		
		$this->loader->add_action('admin_menu', $plugin_admin, 'afsp_replace_submit_meta_box');
		$this->loader->add_filter('post_updated_messages',  $plugin_admin, 'afsp_custom_messages');
		$this->loader->add_action( 'admin_head-edit.php', $plugin_admin, 'afsp_customized_quick_edit' );
		$this->loader->add_filter('manage_edit-ct_afsp_columns',  $plugin_admin, 'afsp_columns');
		$this->loader->add_action( 'manage_ct_afsp_posts_custom_column',  $plugin_admin,'afsp_columns_data', 10, 2 );		
		$this->loader->add_action( 'load-edit.php',$plugin_admin, 'afsp_allow_published_posts' );
		$this->loader->add_action( 'load-post-new.php',  $plugin_admin, 'afsp_disable_published_posts'  ); 
		$this->loader->add_filter('plugin_action_links', $plugin_admin, 'afsp_add_go_pro_link',25,2);

		
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Advanced_Floating_Sliding_Panel_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'afsp_enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'afsp_enqueue_scripts' );
		$this->loader->add_action('wp_footer', $plugin_public, 'afsp_load');
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
	 * @return    Advanced_Floating_Sliding_Panel_Loader    Orchestrates the hooks of the plugin.
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
