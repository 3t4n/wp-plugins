<?php
/**
 * AJAX Functions.
 *
 * @package Docs2Site_Importer
 * @subpackage  Docs2Site_Importer
 */

namespace Docs2Site_Importer;

defined( 'ABSPATH' ) || exit;

/**
 * Global Settings.
 */
class AjaxFunctions {

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
		
	}

}

new AjaxFunctions();
