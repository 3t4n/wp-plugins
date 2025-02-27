<?php
/*
Plugin Name: Fix Email Return-Path
Description: This plugin updates the Return-Path header of all outgoing emails to the FROM email address.
Author: Mishal Patel
Author URI: https://www.mishalpatel.com/
Version: 1.0.5
License: GPLv2
*/
class fix_email_return_path {
  	function __construct() {
		add_action( 'phpmailer_init', array( $this, 'fix_from' ) );
  	}

	function fix_from( $phpmailer ) {
	  	$phpmailer->Sender = $phpmailer->From;
	}
}

new fix_email_return_path();