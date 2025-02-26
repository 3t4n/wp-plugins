<?php
/**
 * Plugin
 *
 * @package Aithenticate
 */

/**
 * Plugin class
 */
final class Aithenticate {

	/**
	 * Version
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * Instance
	 *
	 * @var null|Aithenticate
	 */
	private static $instance = null;

	/**
	 * License.
	 *
	 * @var object
	 */
	public $license = null;

	/**
	 * Get the instance.
	 *
	 * @return Aithenticate
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		// Empty.
	}

	/**
	 * Initialize.
	 *
	 * @return void
	 */
	private function init() {
		Aithenticate_Post_Types::init();
		Aithenticate_Frontend_Assets::init();
		Aithenticate_Installer::init();
		Aithenticate_Template_Loader::init();

		require_once $this->plugin_path() . 'includes/aithenticate-core-functions.php';

		// Hooks.
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		add_filter( 'plugin_action_links_aithenticate/aithenticate.php', array( $this, 'add_settings_link' ) );

		if ( is_admin() ) {
			Aithenticate_Admin::init();
		}
	}

	/**
	 * Add settings link to plugin list.
	 *
	 * @param array $links Links.
	 * @return array $links
	 */
	public function add_settings_link( $links ) {
		$url = menu_page_url( 'aithenticate', false );

		$links[] = sprintf( '<a href="%s">%s</a>', esc_url( $url ), __( 'Settings', 'ar-productviewer' ) );

		return $links;
	}

	/**
	 * Load the plugin textdomain.
	 *
	 * @return void
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'aithenticate', false, plugin_basename( $this->plugin_path() ) . '/languages' );
	}

	/**
	 * Get the AJAX URL.
	 *
	 * @return string
	 */
	public function ajax_url() {
		return admin_url( 'admin-ajax.php' );
	}

	/**
	 * Get the plugin URL.
	 *
	 * @return string
	 */
	public function plugin_url() {
		return plugin_dir_url( AITHENTICATE_PLUGIN_FILE );
	}

	/**
	 * Get the plugin PATH.
	 *
	 * @return string
	 */
	public function plugin_path() {
		return plugin_dir_path( AITHENTICATE_PLUGIN_FILE );
	}

}
