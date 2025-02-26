<?php
/*
Plugin Name: Allow Only JPEG
Plugin URI: http://rcollier.me/software/
Description: A lightweight plugin that prevents users from uploading files that <strong>are not</strong> in JPEG format.
Author: Rich Collier
Version: 1.0
Author URI: http://rcollier.me/
*/

class rdc_allow_only_jpeg {
	
	function __construct() {
		add_filter( 'wp_handle_upload', array( $this, 'filter__wp_handle_upload' ) );
	}
	
	function filter__wp_handle_upload( $args ) {
		if ( 'image/jpeg' != $args['type'] ) {
			echo '<div style="margin:10px 0 0 15px;font-weight:bold;color:#d00;">Sorry, only JPEG files are allowed.</div>';
			die();
		}
		
		return $args;
	}
	
}

$rdc_allow_only_jpeg = new rdc_allow_only_jpeg();

// omit