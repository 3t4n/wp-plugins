<?php

class Hello_Phil_Loader {
	function __construct() {
		if ( is_admin() ) {
			$hello_phil = new Hello_Phil;
			add_action( 'admin_notices', array( $hello_phil, 'print_random_line' ) );
			add_action( 'admin_head', array( $hello_phil, 'phil_css' ) );
		}
	}
}
