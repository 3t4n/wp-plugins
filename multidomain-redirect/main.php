<?php
/*
Plugin Name: Multidomain Redirect
Plugin URI: http://JoeAnzalone.com/plugins/multidomain-redirect/
Description: Redirects visitors to the the site's URL as it appears in the WordPress database in case they're not already connecting through that domain. This is handy for secondary domains that point to your WordPress site.
Author: Joe Anzalone
Version: 1.1
Author URI: http://JoeAnzalone.com
*/

class multidomain_redirect {
	function send_headers(){
		$this_host = $_SERVER['HTTP_HOST'];
		
		$wp_home_url = home_url();
		$wp_host = parse_url($wp_home_url, PHP_URL_HOST);
		$wp_port = parse_url($wp_home_url, PHP_URL_PORT);
		
		if(!empty($wp_port)){
			$wp_host .= ':' . $wp_port;
		}
		
		if(is_ssl()){
			$scheme = 'https://';
		} else {
			$scheme = 'http://';
		}
		
		$new_url = $scheme . $wp_host . $_SERVER['REQUEST_URI'];
		
		if(strtolower($wp_host) != strtolower($this_host)) {
			header("Location: $new_url");
			die();
		}
	}

	function __construct(){
		add_action('init', array($this, 'send_headers'));
	}

}

new multidomain_redirect;

?>