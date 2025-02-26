<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.youtube.com/channel/UCtfzwnao4xpOg8d9vnZSSpw
 * @since      1.0.0
 *
 * @package    Syt_Widgets
 * @subpackage Syt_Widgets/includes
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
 * @package    Syt_Widgets
 * @subpackage Syt_Widgets/includes
 * @author     WP Plugin Boss <dev.bcdestiller@gmail.com>
 */
class Syt_Widgets {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Syt_Widgets_Loader    $loader    Maintains and registers all hooks for the plugin.
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
	 * Load the dependencies and defines the locale.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'SYT_WIDGETS_VERSION' ) ) {
			$this->version = SYT_WIDGETS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'syt-widgets';

		$this->load_dependencies();
		$this->set_locale();
		$this->add_syt_widgets();
		$this->add_syt_style_scripts();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Syt_Widgets_Loader. Orchestrates the hooks of the plugin.
	 * - Syt_Widgets_i18n. Defines internationalization functionality.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-syt-widgets-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-syt-widgets-i18n.php';

		$this->loader = new Syt_Widgets_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Syt_Widgets_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Syt_Widgets_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Add custom widgets.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function add_syt_widgets() {
		add_action( 'widgets_init', 'register_syt_widget' );	
	}

	/**
	 * Add css and js files.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function add_syt_style_scripts() {
		add_action( 'wp_enqueue_scripts', 'load_syt_style_scripts' );	
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
	 * @return    Syt_Widgets_Loader    Orchestrates the hooks of the plugin.
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

/**
 * The class responsible for generating widgets of the
 * plugin.
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/widgets/class-syt-widgets-youtube.php';

/**
 * Register custom widgets.
 *
 * @since    1.0.0
 * @access   private
 */

 
function register_syt_widget() {
	register_widget( 'Syt_Widget_Youtube' );
}


/**
 * Enqueue css and js files.
 *
 * @since    1.0.0
 * @access   private
 */
function load_syt_style_scripts() {
	wp_enqueue_style( 'syt-main-style', SYT_WIDGETS_PLUGIN_URL. 'assets/css/syt-widgets-style.css' );
	wp_enqueue_script( 'syt-main-script', SYT_WIDGETS_PLUGIN_URL. 'assets/js/syt-widgets-script.js' );

	//Register google script to properly display youtube widget.
	wp_register_script( 'google-yt-script', 'https://apis.google.com/js/platform.js' );
	wp_enqueue_script( 'google-yt-script' );
}