<?php

namespace AGA\Frontend;
use AGA\Core\Ga_Object;

/**
 * Class Init
 * @package AGA\Frontend
 */
class Init {

	/**
	 * Construct the frontend
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'add_tracking_code' ), 70 );

		$ga_object = new Ga_Object();

		if( $ga_object->autotrack_enabled() === true ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'set_autotrack_js_lib' ) );
		}
	}

	/**
	 * Add the HTML tracking code in the WP head
	 *
	 * @return null|string
	 */
	public function add_tracking_code() {
		$render = new Render();

		echo $render->get_html_tracking_code();
	}


	/**
	 * Set the Autotrack JS Library
	 */
	public function set_autotrack_js_lib() {
		wp_enqueue_script( 'aga-autotrack', plugins_url( '/assets/js/autotrack.js', AGA_ROOT_PATH ), array(), AGA_VERSION, false );
	}

}