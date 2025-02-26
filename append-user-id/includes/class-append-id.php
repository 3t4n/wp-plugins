<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across the
 * plugin.
 *
 * @link       mardell.me
 * @since      1.0.0
 *
 * @package    append_id
 * @subpackage append_id/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.8 Remove loader in favour of native WP add_action/add_filter
 * @since      1.0.0
 * @package    append_id
 * @subpackage append_id/includes
 * @author     Andy Mardell <mardell.me>
 */
class Append_ID {

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
	 * The current instance of the admin class
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var object|Append_ID_Admin
	 */
	protected static $admin_instance;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the
	 * plugin and load dependencies.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->version     = defined( 'APPEND_ID_VERSION' ) ? APPEND_ID_VERSION : '1.0.0';
		$this->plugin_name = 'append-id';

		$this->load_dependencies();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		// General dependencies.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-append-id-i18n.php';

		// Admin class.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-append-id-admin.php';

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the append_id_I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Append_ID_I18n();

		add_action( 'plugins_loaded', array( $plugin_i18n, 'load_plugin_textdomain' ) );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Append_ID_Admin( $this->get_plugin_name(), $this->get_version() );

		add_action( 'admin_enqueue_scripts', array( $plugin_admin, 'enqueue_files' ) );
		add_action( 'init', array( $plugin_admin, 'add_shortcode' ) );

		self::$admin_instance = $plugin_admin;

	}

	/**
	 * Execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		$this->set_locale();
		$this->define_admin_hooks();

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

	/**
	 * Get an instance of the admin class
	 *
	 * @since 1.0.1
	 * @return object|Append_ID_Admin
	 */
	public static function get_admin_instance() {

		return self::$admin_instance;

	}

}
