<?php

/*
Plugin Name: All-in-one Internet Search (True SSL, TLS, & PFS) - The #1 Internet Search Plugin on WordPress
Description: The #1 Internet Search Plugin - Download Now - Free & Unlimited - "A must have plugin for WordPress sites." https://binaryappdev.com/
Version: 1.1.1.1-12-01-14
Author: Binary App Dev
Author URI: https://binaryappdev.com/
*/

add_action("wp_head","news_add_scripts");		

function news_add_scripts(){

	?><script type="text/javascript" src="https://www.google.com/jsapi"></script> 
	<link rel="stylesheet" href="<?PHP echo plugins_url("/css/news_widget.css" , __FILE__ ); ?>" />
	<script type="text/javascript" language="javascript" src="<?PHP echo plugins_url("/js/news_widget.js" , __FILE__ ); ?>"></script>

	<?PHP

}

function internet_search() {
	require_once( 'news_class.php' );
	register_widget( 'internet_search_display' );
}
add_action( 'widgets_init', 'internet_search', 1 );

?>