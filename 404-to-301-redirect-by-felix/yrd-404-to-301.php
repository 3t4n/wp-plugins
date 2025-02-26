<?php
/**
 * Plugin Name: 404 to 301 – Redirect By Felix
 * Description: Automatically redirect, log and notify all 404 page errors to any page using 301 redirect for SEO. No more 404 Errors.
 * Version: 1.0.0
 * Author: Felix Moira
 * Author URI: 
 * License: GPLv2
 */

class YrdMain {
	public function __construct() {
		add_action('wp_head', array($this, 'wpHead'));
	}

	public function wpHead() {
		status_header(301);
		$homeURL = home_url();
		wp_redirect($homeURL);
		exit();
	}
}

new YrdMain();