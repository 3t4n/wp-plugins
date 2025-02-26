<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://mockupplugin.com
 * @since      1.5.0
 *
 * @package    MockUp
 * @subpackage MockUp/includes
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
 * @since      1.5.0
 * @package    MockUp
 * @subpackage MockUp/includes
 * @author     Eelco Tjallema <mail@estjallema.nl>
 */
class MockUp {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.6.3
	 * @access   protected
	 * @var      MockUp_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.6.3
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.6.3
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
	 * @since    1.6.3
	 */
	public function __construct() {

		$this->plugin_name = 'MockUp';
		$this->version = '1.6.3';

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
	 * - MockUp_Loader. Orchestrates the hooks of the plugin.
	 * - MockUp_i18n. Defines internationalization functionality.
	 * - Plugin_Name_Admin. Defines all hooks for the admin area.
	 * - Plugin_Name_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.6.3
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-mockup-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-mockup-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-mockup-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-mockup-public.php';

		$this->loader = new MockUp_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the MockUp_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.6.3
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new MockUp_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}


	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.6.3
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new MockUp_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_cpt', 5 );
		$this->loader->add_action( 'init', $plugin_admin, 'register_taxonomy', 5 );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'options_page' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );
		$this->loader->add_action( 'new_to_publish', $plugin_admin, 'meta_data' );
		$this->loader->add_action( 'draft_to_publish', $plugin_admin, 'meta_data' );
		$this->loader->add_action( 'pending_to_publish', $plugin_admin, 'meta_data' );
		$this->loader->add_action( 'restrict_manage_posts', $plugin_admin, 'taxonomy_filter' );
		$this->loader->add_action( 'manage_'. MOCKUP_POSTTYPE .'_posts_custom_column', $plugin_admin, 'admincolumn_comments', 1, 2 );
		$this->loader->add_action( 'manage_'. MOCKUP_POSTTYPE .'_posts_custom_column', $plugin_admin, 'admincolumn_status', 1, 2 );
		$this->loader->add_action( 'edit_form_after_title', $plugin_admin, 'metabox_after_title' );
		$this->loader->add_action( 'edit_form_after_title', $plugin_admin, 'content' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'metabox' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'metabox_save' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'remove_useless_metabox', 11 );
		$this->loader->add_action( 'wp_ajax_mockup_delete_image', $plugin_admin, 'mockup_delete_image' );
		$this->loader->add_action( 'wp_ajax_mockup_set_image', $plugin_admin, 'mockup_set_image' );
		$this->loader->add_action( 'wp_ajax_mockup_unapprove', $plugin_admin, 'mockup_unapprove' );
		$this->loader->add_action( 'wp_ajax_mockup_delete_comment', $plugin_admin, 'mockup_delete_comment' );

		$this->loader->add_filter( 'plugin_action_links_mockup/mockup.php', $plugin_admin, 'add_link' );
		$this->loader->add_filter( 'manage_'. MOCKUP_POSTTYPE .'_posts_columns', $plugin_admin, 'admincolumn_comments_title' );
		$this->loader->add_filter( 'manage_'. MOCKUP_POSTTYPE .'_posts_columns', $plugin_admin, 'admincolumn_status_title' );
		$this->loader->add_filter( 'dashboard_glance_items', $plugin_admin, 'dashboard', 10, 1 );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.6.3
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new MockUp_Public( $this->get_version() );

		$this->loader->add_action( 'template_redirect', $plugin_public, 'template_single' );
		$this->loader->add_action( 'wp_ajax_mockup_single_hide_intro', $plugin_public, 'mockup_single_hide_intro' );
		$this->loader->add_action( 'wp_ajax_nopriv_mockup_single_hide_intro', $plugin_public, 'mockup_single_hide_intro' );
		$this->loader->add_action( 'wp_ajax_mockup_single_description', $plugin_public, 'mockup_single_description' );
		$this->loader->add_action( 'wp_ajax_nopriv_mockup_single_description', $plugin_public, 'mockup_single_description' );
		$this->loader->add_action( 'wp_ajax_mockup_single_comment', $plugin_public, 'mockup_single_comment' );
		$this->loader->add_action( 'wp_ajax_nopriv_mockup_single_comment', $plugin_public, 'mockup_single_comment' );
		$this->loader->add_action( 'wp_ajax_mockup_single_related', $plugin_public, 'mockup_single_related' );
		$this->loader->add_action( 'wp_ajax_nopriv_mockup_single_related', $plugin_public, 'mockup_single_related' );
		$this->loader->add_action( 'wp_ajax_mockup_single_approve', $plugin_public, 'mockup_single_approve' );
		$this->loader->add_action( 'wp_ajax_nopriv_mockup_single_approve', $plugin_public, 'mockup_single_approve' );
		$this->loader->add_action( 'wp_ajax_mockup_process_comment', $plugin_public, 'mockup_process_comment' );
		$this->loader->add_action( 'wp_ajax_nopriv_mockup_process_comment', $plugin_public, 'mockup_process_comment' );
		$this->loader->add_action( 'wp_ajax_mockup_process_approve', $plugin_public, 'mockup_process_approve' );
		$this->loader->add_action( 'wp_ajax_nopriv_mockup_process_approve', $plugin_public, 'mockup_process_approve' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.6.3
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.6.3
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.6.3
	 * @return    MockUp_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.6.3
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}