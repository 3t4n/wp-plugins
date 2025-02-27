<?php
/**
 * sample class
 *
 * @class    WPOAI_Sample
 * @package  includes
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'WPOAI_Sample', false ) ) :

/**
 * Admin sample class.
 */
class WPOAI_Sample {

	/**
	 * filter hook
	 *
	 * @var string
	 */
	private $_hook_prefix = 'WPOAI_Sample/';

	/**
	 * sample func
	 */
	public function sample_func() {
		// include_once __DIR__ . '/wc-admin-functions.php';


	}
	
} // end - WPOAI_Sample

endif; // end - class_exists

