<?php
/**
 * templates class
 *
 * @class    WPOAI_Templates
 * @package  includes
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WPOAI_Templates', false ) ) :

/**
 * templates class.
 */
class WPOAI_Templates {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ), 0 );
	}
	/**
	 * sample func
	 */
	public function includes() {
		// classes
		include_once __DIR__ . '/class-wpoai-templates-setup.php';
		include_once __DIR__ . '/class-wpoai-templates-data.php';
		// include_once __DIR__ . '/class-wpoai-template-categories.php';
	}
	
} // end - WPOAI_Templates

return new WPOAI_Templates();

endif; // end - class_exists

