<?php
/** 
* @desc Function to get options array
* @param none
* @return filters of options
*/
function get_advance_login_style_options_arr() {
	$optarr = array( 'advance_login_style','advance_login_style_form', 'advance_login_style_logo');
	
	return apply_filters( 'advance_login_style_options', $optarr );
}

/** 
* @desc Function to get options array
* @param none
* @return options array
*/
function get_advance_login_style_options() {
	static $options;
   
	if ( !isset( $options ) ) {
		$options = array();
		foreach ( get_advance_login_style_options_arr() as $opt ) {
			$options = array_merge( $options, (array) get_option( $opt ) );
		}
	}
	return $options;
}
