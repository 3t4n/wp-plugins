<?php
/**
 * Wizard Core Class
 *
 * @class    WPOAI_WIZARD
 * @package  includes
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WPOAI_WIZARD', false ) ) :

/**
 * Wizard class.
 */
class WPOAI_WIZARD {

	/**
	 * filter hook
	 *
	 * @var string
	 */
	private $_hook_prefix = 'WPOAI_WIZARD/';

	/**
	 * Constructor.
	 */
	public function __construct() {
		// include all related files
		add_action( 'init', array( $this, 'includes' ), 0 );
	}

	/**
	 * includes all api files
	 */
	public function includes() {
		// classes
		include_once __DIR__ . '/class-wizard-setup.php';
		include_once __DIR__ . '/class-wizard-data.php';

	}
	
} // end - WPOAI_WIZARD

return new WPOAI_WIZARD();

endif; // end - class_exists

