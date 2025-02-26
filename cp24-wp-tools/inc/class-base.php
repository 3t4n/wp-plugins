<?php
/**
 * Initialize required resources.
 *
 * @since 1.2.0
 * @version 1.2.0
 */

namespace CP24\Tools\Inc;

defined( 'ABSPATH' ) || exit;

use CP24\Tools\Inc\Init;

/**
 * Base class for all sections main file.
 *
 * @since 1.2.0
 * @version 1.2.0
 */
class Base {
	/**
	 * Section required files.
	 *
	 * @since 1.2.0
	 * @version 1.2.0
	 * @var array $files
	 */
	protected $files = [];

	/**
	 * Constructor.
	 *
	 * @since 1.2.0
	 * @version 1.2.0
	 */
	public function __construct() {
		$this->load_required_files();
		$this->initialize();
	}

	/**
	 * Initialize loaded files.
	 *
	 * @since 1.2.0
	 * @version 1.2.0
	 * @return void
	 */
	protected function initialize() {}

	/**
	 * Load required files.
	 *
	 * @since 1.2.0
	 * @version 1.2.0
	 */
	public function load_required_files() {
		$files = $this->files;

		Init::load_files( $files );
	}
}
