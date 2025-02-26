<?php
/**
 * Admin.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ACB_Admin class.
 */
class ACB_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ) );
		add_action( 'admin_init', array( $this, 'buffer' ), 1 );
	}

	/**
	 * Include any classes we need within admin.
	 */
	public function includes() {
		include_once dirname( __FILE__ ) . '/menus.php';
		include_once dirname( __FILE__ ) . '/assets.php';
	}

	/**
	 * Output buffering allows admin screens to make redirects later on.
	 */
	public function buffer() {
		ob_start();
	}

}

return new ACB_Admin();