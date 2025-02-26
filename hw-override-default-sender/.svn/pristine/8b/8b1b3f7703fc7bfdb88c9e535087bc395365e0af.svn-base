<?php
/*
Plugin Name: HW Override Default Sender
Plugin URI: http://webartisan.se/hw-override-default-sender/
Description: Overrides WordPress default e-mail sender information (WordPress <wordpress@yourdomain.com>) with information you provided. For standard WordPress installation this plugin will use the Sitename and admin e-mail address provided in the general settings. For multi-network installations it will use network name and e-mail address provided in the network admin general settings.
Version: 1.0
Author: H&aring;kan Wennerberg
Author URI: http://webartisan.se/
License: LGPLv3
*/

$hw_override_default_sender = new HW_Override_Default_Sender();


class HW_Override_Default_Sender
{
	protected static $email = false;
	
	public function __construct()
	{
		add_action('phpmailer_init', array($this, 'filter_phpmailer_init'), 99999);
		add_filter('wp_mail_from', array($this, 'filter_wp_mail_from'), 99999);
		add_filter('wp_mail_from_name', array($this, 'filter_wp_mail_from_name'), 99999);
	}
	
	public function filter_phpmailer_init($phpmailer)
	{
		// Always make sure Reply-Path is the same as From address.
		$phpmailer->Sender = $phpmailer->From;
	}
	
	public function filter_wp_mail_from($original_email)
	{
		// Only change FROM-address if WordPress default e-mail is currently used.
		if ($original_email !== $this->get_wp_default_email()) {
			return $original_email;
		}
		
		// Get preferred FROM-address.
		$email = $this->get_email();
		
		// If we got it, then return it. In other case fallback to default.
		if ($email !== false) {
			return $email;
		} else {
			return $original_email;
		}
	}
	
	public function filter_wp_mail_from_name($original_email_name)
	{
		// Only change FROM-address if WordPress default e-mail is currently used.
		if ($original_email_name !== $this->get_wp_default_email_name()) {
			return $original_email_name;
		}
		
		// Get preferred FROM-address.
		$email_name = $this->get_email_name();
		
		// If we got it, then return it. In other case fallback to default.
		if ($email_name !== false) {
			return $email_name;
		} else {
			return $original_email_name;
		}
	}
	
	protected function get_email()
	{
		if (is_multisite() === true) {
			return get_site_option('admin_email', false, true);
		} else {
			return get_option('admin_email', false);
		}
	}
	
	protected function get_email_name()
	{
		if (is_multisite() === true) {
			return get_site_option('site_name', false, true);
		} else {
			return get_option('blogname', false);
		}
	}
	
	protected function get_wp_default_email()
	{
		$sitename = strtolower( $_SERVER['SERVER_NAME'] );
		if ( substr( $sitename, 0, 4 ) == 'www.' ) {
			$sitename = substr( $sitename, 4 );
		}

		return 'wordpress@' . $sitename;
	}
	
	protected function get_wp_default_email_name()
	{
		return 'WordPress';
	}
}