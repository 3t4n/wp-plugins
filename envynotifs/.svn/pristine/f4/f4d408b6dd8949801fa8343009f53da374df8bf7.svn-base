<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://envytheme.com/
 * @since      1.1
 *
 * @package    Envy_Notifs
 * @subpackage Envy_Notifs/includes
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
 * @since      1.1
 * @package    Envy_Notifs
 * @subpackage Envy_Notifs/includes
 * @author     EnvyTheme <hello@EnvyTheme.com>
 */
class Envy_Notifs {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.1
	 * @access   protected
	 * @var      Envy_Notifs_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.1
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.1
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
	 * @since    1.1
	 */
	public function __construct() {
		if ( defined( 'ENVY_NOTIFS_VERSION' ) ) {
			$this->version = ENVY_NOTIFS_VERSION;
		} else {
			$this->version = '1.1';
		}
		$this->plugin_name = 'envy-notifs';

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
	 * - Envy_Notifs_Loader. Orchestrates the hooks of the plugin.
	 * - Envy_Notifs_i18n. Defines internationalization functionality.
	 * - Envy_Notifs_Admin. Defines all hooks for the admin area.
	 * - Envy_Notifs_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.1
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-envy-notifs-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-envy-notifs-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-envy-notifs-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-envy-notifs-public.php';

		$this->loader = new Envy_Notifs_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Envy_Notifs_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.1
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Envy_Notifs_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.1
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Envy_Notifs_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.1
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Envy_Notifs_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.1
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.1
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.1
	 * @return    Envy_Notifs_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.1
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

} 

// Register custom post type
function envy_notifs_custom_post() {
	register_post_type( 'envynotifs', array(
	'labels' => array(
       'name' => 'EnvyNotifs',
       'all_items' => esc_html__('All Notices', 'envy-notifs'),
       'add_new_item' => esc_html__('Add New Notice', 'envy-notifs'),
       'featured_image'        => __( 'Background image', 'envy-notifs' ),
       'set_featured_image'    => __( 'Upload Background Image', 'envy-notifs' ), 
       'remove_featured_image' => __( 'Remove Background image', 'envy-notifs' )
	),

	'public' => true,
	'menu_icon' => 'dashicons-bell',
	'supports' => array( 'title', 'editor', 'thumbnail' )

    ));
}

add_action('init', 'envy_notifs_custom_post');
