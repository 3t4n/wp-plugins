<?php
/**
 * Plugin Name: Force Domain Redirect
 * Plugin URI: http://nimbus.agency
 * Description: Forces the use of the main WP domain
 * Version: 0.3
 * Author: M Williams
 * Author URI: http://nimbus.agency
 * License: GPL2
 */
	 

	 function redirect_URL(){
		$uri=$_SERVER['REQUEST_URI'];
		$domain=$_SERVER['HTTP_HOST'];
		//$wpDomain=get_site_url();	//this would actually be the WP directory
		$wpDomain=get_home_url();
		if($wpDomain=="http://".$domain || $wpDomain=="https://".$domain){
			//echo "You are at the correct domain";
		} else {
			Header( "HTTP/1.1 301 Moved Permanently" );
			Header( "Location: ".$wpDomain.$uri );
			echo $domain." isn't the right domain: ".$wpDomain;
			die();
			
		}
	 }
add_action('init', 'redirect_URL');
?>