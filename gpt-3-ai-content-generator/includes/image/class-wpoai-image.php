<?php
/**
 * Image class
 *
 * @class    WPOAI_IMAGE
 * @package  includes
 * @version  0.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WPOAI_IMAGE', false ) ) :

/**
 * Image class.
 */
class WPOAI_IMAGE {

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
		include_once __DIR__ . '/class-wpoai-image-data.php';
	}
	
} // end - WPOAI_IMAGE

return new WPOAI_IMAGE();

endif; // end - class_exists

