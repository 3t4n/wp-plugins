<?php
/*
Addon Name: Debug Autoblog
Description: Sets the feed blog and site ids to the main ids.
Author: Barry (Incsub)
Author URI: http://caffeinatedb.com
*/

class autoblog_debug {

	var $build = 1;

	function autoblog_debug() {
		$this->__construct();
	}

	function __construct() {
		add_action( 'autoblog_admin_message', array(&$this, 'show_debug_message') );
	}

	function show_debug_message() {

		if($this->_get_first_available_transport() === false) {

		}

		echo '<div id="message" class="error fade"><p>' . $errors[(int) $_GET['err']] . '</p></div>';
		$_SERVER['REQUEST_URI'] = remove_query_arg(array('message'), $_SERVER['REQUEST_URI']);

	}

	/* Function from WP http class */
	function _get_first_available_transport( $args, $url = null ) {
		$request_order = array( 'curl', 'streams', 'fsockopen' );

		// Loop over each transport on each HTTP request looking for one which will serve this request's needs
		foreach ( $request_order as $transport ) {
			$class = 'WP_HTTP_' . $transport;

			// Check to see if this transport is a possibility, calls the transport statically
			if ( !call_user_func( array( $class, 'test' ), $args, $url ) )
				continue;

			return $class;
		}

		return false;
	}

}

$AB_debug = new autoblog_debug();

?>