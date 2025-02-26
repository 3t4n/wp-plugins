<?php
/*
   Plugin Name: Kill ZippyKid Never Email Passwords
   Plugin URI: http://wordpress.org/extend/plugins/kill-zippykid-never-email-passwords/
   Version: 0.1
   Author: Hotchkiss Consulting Group
   Description: This plugin has no interface, it just prevents ZippyKid's "Never Email Passwords" function from working.
   Text Domain: kill-zippykid-never-email-passwords
   License: GPLv3
  */

function kill_stupid_zippykid_never_email_passwords_bs() {
	if(!class_exists('NeverEmailPasswords'))	{
		return;
	}
	global $nep;
	$removed = remove_action( 'user_register', array( $nep, 'handleActivationRequest' ) );
	$removed = remove_action( 'admin_print_scripts', array( $nep, 'registerUIHooks' ) );

}
add_action('after_setup_theme', 'kill_stupid_zippykid_never_email_passwords_bs');