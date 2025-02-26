<?php
/**
 * Settings page under Settings for global settings.
 *
 * @package Docs2Site_Importer
 * @subpackage  Docs2Site_Importer
 */

namespace Docs2Site_Importer;

defined( 'ABSPATH' ) || exit;

/**
 * Global Settings.
 */
class GlobalSettings {

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

		// Allow 3rd party to remove hooks.
		do_action( 'docs2site_importer_options_unhook', $this );
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
		
	}

	/**
	 * Add Global settings tab in the Global Settings page.
	 *
	 * @param [type] $setting_tabs
	 * @return void
	 */
	public function add_global_settings_page( $setting_tabs ) {
		
	}

	/**
	 * Enqueue Admin Scripts for global settings.
	 * 
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function enqueue_admin_scripts() {

		$min    = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$screen = get_current_screen();

		
	}

}
