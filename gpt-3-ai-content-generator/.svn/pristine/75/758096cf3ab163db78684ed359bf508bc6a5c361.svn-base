<?php
/**
 * Admin Class
 *
 * @class    WPOAI_Admin
 * @package  includes/admin
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Admin core class.
 */
class WPOAI_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ), 0 );
	}

	/**
	 * includes all admin files
	 */
	public function includes() {
		// functions
		include_once __DIR__ . '/wpoai-admin-functions.php';
		
		// classes
		include_once __DIR__ . '/class-wpoai-admin-settings.php';
		
		if ( is_admin() ) {
			include_once __DIR__ . '/class-wpoai-admin-settings-page.php';
		} // end - is_admin

	}
}

return new WPOAI_Admin();