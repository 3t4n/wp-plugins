<?php

use TRS\AR\Action_Runner;
use TRS\AR\Filter_Runner;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * The core plugin class.
 *
 * This is used to define admin-specific hooks, and public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    TRS\AR
 * @subpackage TRS\AR\includes
 * @author     TheRiteSites <contact@theritesites.com>
 */
final class Action_Runner_By_TRS {

	/**
	 * Action_Runner_By_TRS Instance.
	 * 
	 * @access private
	 * @since  1.0
	 * @var	   Action_Runner_By_TRS The one true Action_Runner_By_TRS
	 */
	private static $instance;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Action_Runner_By_TRS_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name = 'action-runner-by-trs';

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version = '1.0.0';

	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Action_Runner_By_TRS ) ) {
			self::$instance = new Action_Runner_By_TRS;

			self::$instance->setup_constants();
			self::$instance->load_dependencies();
			self::$instance->set_locale();
			self::$instance->setup_objects();
			self::$instance->define_hooks();
		}
		return self::$instance;
	}

	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'action-runner-by-trs' ) );
	}

	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'action-runner-by-trs' ) );
	}

	private function setup_constants() {

		if ( ! defined( 'AR_TRS_VERSION' ) ) {
			define( 'AR_TRS_VERSION', $this->version );
		}

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Action_Runner_By_TRS_Loader. Orchestrates the hooks of the plugin.
	 * - Action_Runner_By_TRS_i18n. Defines internationalization functionality.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ar-trs-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-action-runner.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-filter-runner.php';

	}

	public function setup_objects() {

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Action_Runner_By_TRS_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Action_Runner_By_TRS_i18n();

		add_action( 'plugins_loaded', array( $plugin_i18n, 'load_plugin_textdomain' ) );

	}

	/**
	 * Register all of the hooks related to the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_hooks() {
		$action_runner = new Action_Runner();
		$filter_runner = new Filter_Runner();

		add_shortcode( 'action_runner_trs', array( $action_runner, 'shortcode' ) );
		add_shortcode( 'filter_runner_trs', array( $filter_runner, 'shortcode' ) );

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

}


