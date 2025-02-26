<?php

namespace APG\Core;

/**
 * Class Widgets
 * @package APG\Core
 */
class Widgets {

	/**
	 * Register the APG widgets, register hook
	 */
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'apg_register_widgets' ) );
	}

	/**
	 * Register the APG widgets
	 */
	public function apg_register_widgets() {
		register_widget( 'APG_Newest_Album' );
		register_widget( 'APG_Random_Photo' );
	}

}