<?php
/**
 * Core plugin class
 *
 * @link       https://takeoff.design/
 * @since      1.0.0
 *
 * @package    Astrolabe
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The core plugin class
 *
 * @since      1.0.0
 * @package    Astrolabe
 * @author     Matt Bonacini
 */
class ASTR_Astrolabe_Dock {
	/**
	 * Initialize constructor for the core plugin class
	 */
	public function __construct() {
		$this->load_dependencies();
	}

	/**
	 * Load the required dependencies for this plugin
	 */
	private function load_dependencies() {
		// Autoloader
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'autoloader.php';

		// Helper functions
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/helpers.php';

		// Components
		require_once ASTR_PLUGIN_PATH . 'public/components/components.php';
	}

	/**
	 * Initialize the main plugin features
	 *
	 * @since 1.0.0
	 */
	public function initialize() {

		// Plugin Settings Class
		$plugin_settings_class = new ASTR\Admin\Plugin_Settings();

		// Add Menu class
		$menu_class = new ASTR\Includes\Menu();

		// Enqueue scripts and styles
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Enqueue scripts and styles
	 */
	public function enqueue_scripts() {

		if ( ! is_admin() ) {
			// Main Style File
			wp_enqueue_style( 'astrolabe-style', ASTR_PLUGIN_URL . '/public/style.css', array(), ASTR_PLUGIN_VERSION );

			// Main Script File
			wp_enqueue_script( 'astrolabe-script', ASTR_PLUGIN_URL . '/public/astrolabe.js', array(), ASTR_PLUGIN_VERSION, true );
		}
	}
}
