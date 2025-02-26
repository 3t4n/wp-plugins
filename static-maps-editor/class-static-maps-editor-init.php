<?php
/**
 * The Static Maps Editor initialisation class
 *
 * @since   1.0.0
 * @package Static Maps Editor
 * @author  Printmaps
 */

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
class Static_Maps_Editor_Init {

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
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 *
	 * @param    string $version      The current version of this plugin.
	 * @param    string $plugin_name  The name of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $version, $plugin_name ) {
		$this->version     = $version;
		$this->plugin_name = $plugin_name;
	}

	/**
	 * Load the dependencies, define the locale, and set the hooks for the admin area
	 *
	 * @since    1.0.0
	 */
	public function init() {
		$this->load_dependencies();
		$this->set_locale();
		$this->define_hooks();
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
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Static_Maps_Editor_I18n. Defines internationalization functionality.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-static-maps-editor-i18n.php';

		/**
		 * The class responsible for defining all actions that occur.
		 */
		require_once plugin_dir_path( __FILE__ ) . 'class-static-maps-editor.php';
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Static_Maps_Editor_I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Static_Maps_Editor_I18n();

		add_action( 'plugins_loaded', array( $plugin_i18n, 'load_plugin_textdomain' ) );
	}

	/**
	 * Register the hooks, actions & filters of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_hooks() {
		$plugin = new Static_Maps_Editor( $this->get_plugin_name(), $this->get_version() );

		register_activation_hook( plugin_dir_path( __FILE__ ) . 'static-maps-editor.php', array( $plugin, 'static_maps_editor_activate_plugin' ) );

		add_action( 'admin_notices', array( $plugin, 'static_maps_editor_uid_admin_notice' ) );
		add_action( 'admin_menu', array( $plugin, 'static_maps_editor_add_pages' ) );

		add_action( 'wp_enqueue_media', array( $plugin, 'static_maps_editor_add_media_filter' ) );
		add_action( 'wp_ajax_static_maps_editor_add_media', array( $plugin, 'static_maps_editor_add_media_ajax' ) );
		add_filter( 'ajax_query_attachments_args', array( $plugin, 'static_maps_editor_ajax_query_attachments_args' ) );

		add_action( 'admin_init', array( $plugin, 'static_maps_editor_admin_init' ) );

		add_filter( 'plugin_action_links', array( $plugin, 'static_maps_editor_plugin_action_links' ), 10, 2 );
		add_action( 'update_option_static_maps_editor_privacy_policy_accepted', array( $plugin, 'static_maps_editor_after_privacy_policy_accepted_updated' ), 10, 3 );
		add_action( 'add_option_static_maps_editor_privacy_policy_accepted', array( $plugin, 'static_maps_editor_after_privacy_policy_accepted_added' ), 10, 2 );
	}
}
