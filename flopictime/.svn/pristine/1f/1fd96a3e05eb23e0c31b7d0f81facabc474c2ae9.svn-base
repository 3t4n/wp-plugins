<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://flothemes.com
 * @since      1.0.0
 *
 * @package    Pictimewp
 * @subpackage Pictimewp/includes
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
 * @package    Pictimewp
 * @subpackage Pictimewp/includes
 * @author     Flothemes <alexg@flothemes.com>
 */
if(!class_exists('Pictimewp')){
class Pictimewp {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Pictimewp_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'FLOPT_VERSION' ) ) {
			$this->version = FLOPT_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'pictimewp';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->flo_register_custom_post_type();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Pictimewp_Loader. Orchestrates the hooks of the plugin.
	 * - Pictimewp_i18n. Defines internationalization functionality.
	 * - Pictimewp_Admin. Defines all hooks for the admin area.
	 * - Pictimewp_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-pictimewp-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-pictimewp-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-pictimewp-admin.php';


		/**
		 * The class responsible for working with Pic-Time API and Pic-time saved data
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-pictime-api-integration.php';

		/**
		 * The class responsible for Pic-Time gallery post type Meta Boxes
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-pictime-meta-box.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-pictimewp-public.php';

		/**
		 * The class responsible for registering the custom post types
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-flo-pictime-custom-posts.php';


		$this->loader = new Pictimewp_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Pictimewp_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Pictimewp_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Init registration of the custom posts type
	 *
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function flo_register_custom_post_type(){
		$flo_init_c_p_type = new Flo_Pictime_custom_posts();
		$this->loader->add_action( 'init', $flo_init_c_p_type, 'flo_reg_custom_post_type' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		//NOTE: replace this with the production link
		//$api_url = 'https://testingapi.pic-time.com/apiV2/';
		$api_url = 'https://productionapi.pic-time.com/apiV2/';

		$plugin_admin = new Pictimewp_Admin( $this->get_plugin_name(), $this->get_version(), $api_url );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		$this->loader->add_action( 'admin_menu', $plugin_admin, 'flo_add_pictime_options' );

		// ajax action that logs out from current PicTime account
		$this->loader->add_action( 'wp_ajax_pt_logout', $plugin_admin, 'flo_pt_logout' );
		$this->loader->add_action( 'wp_ajax_pt_sync_data', $plugin_admin, 'flo_sync_data' );
		$this->loader->add_action( 'wp_ajax_create_pt_gallery', $plugin_admin, 'create_pt_gallery_post' );

		$pictime_api = new Flo_Pictime_Api();
		$this->loader->add_action( 'wp_ajax_get_project_photos', $pictime_api, 'flo_get_project_data' );

		// For Gutenberg block:
		$plugin_public = new Pictimewp_Public( $this->get_plugin_name(), $this->get_version() );
		add_action( 'enqueue_block_editor_assets', array( $plugin_public, 'enqueue_scripts' ), 999);
		add_action( 'enqueue_block_editor_assets', array( $plugin_public, 'enqueue_styles' ), 998);
		add_action('init', array( $plugin_admin, 'register_pt_gutenberg_block' ), 999);

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Pictimewp_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_scripts' ), 999);

		// registoer  the PT gallery shortcode
		add_shortcode( 'flo_pictime', array($plugin_public,'flo_pictime_shortcode') ); // register the  shortcode
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
	 * @return    Pictimewp_Loader    Orchestrates the hooks of the plugin.
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
}
