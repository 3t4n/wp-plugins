<?php
/**
 * Admin area settings and hooks.
 *
 * @package Docs2Site_Importer
 * @subpackage  Docs2Site_Importer
 */

namespace Docs2Site_Importer;

defined( 'ABSPATH' ) || exit;

/**
 * Global Settings.
 */
class ImporterAdmin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialization.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init() {
		
		// Initialize hooks.
		$this->init_hooks();
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init_hooks() {
		add_action( 'admin_menu', array( $this, 'add_settings_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_backend_scripts' ) );
	}

	/**
	 * Register a new settings sub-menu for our settings.
	 *
	 * @return void
	 */
	public function add_settings_menu() {
		
		// Define variables for the page.
		$page_title = __('Docs2Site Settings', 'docs2site' );
		$menu_title = __('Docs2Site', 'docs2site' );
		$capability = 'manage_options';
		$slug       = 'docs2site';
		$callback   = array( $this, 'importer_settings_content' );
		$ico_url    = plugin_dir_url( DOCS2SITE_IMPORTER_PLUGIN_FILE ) . '/assets/images/icon-new.png';
		$position   = 70;

		// Add options palge to admin menu.
		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $ico_url, $position );
	}

	/**
	 * Content for the importer settins page.
	 *
	 * @return void
	 */
	public function importer_settings_content() {
		require plugin_dir_path( __FILE__ ) . '/admin/global-settings.php';
	}

	/**
	 * Load backend scripts.
	 *
	 * @return void
	 */
	public function load_backend_scripts() {
		$screen = get_current_screen();

		if ( 'toplevel_page_docs2site' === $screen->id ) {
			wp_enqueue_style( 'docs2site-importer-admin', DOCS2SITE_IMPORTER_PLUGIN_URL . '/assets/css/admin.css' );
			wp_enqueue_style( 'google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500;1,600;1,700&display=swap' );
			wp_enqueue_script( 'docs2site-importer-admin', DOCS2SITE_IMPORTER_PLUGIN_URL . '/assets/js/admin.js', array( 'jquery' ), DOCS2SITE_IMPORTER_VERSION, true );
		}

	}

}
