<?php
/**
*Plugin Name: 			Affiliate Rating for Amazon
*Plugin URI: 			http://www.pxlz.eu
*Description:			Create your own Amazon product reviews, link your review with an Amazon Affiliate Link, and earn money to finance your blog.
*Version:				1.0
*Author:				Dennis Teichert	
*Author URI: 			http://www.pxlz.eu/about
*Text Domain:			affiliate-rating-for-amazon
*Domain Path: 			/languages
WP Requires at least:	5.0
*/

//kein zugriff bei direktem Aufruf
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

//Übersetzung aufrufen
add_action ( 'plugins_loaded', 'amazon_affiliate_rating_text_domain' );

function amazon_affiliate_rating_text_domain() {
	load_plugin_textdomain( 'affiliate-rating-for-amazon', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

//Einbinden notwendiger PHP Dateien
include_once( 'inc/scripts.php' );
include_once( 'inc/meta-box.php' ); 
include_once( 'inc/shortcodes.php' );

define( 'AMAZONAFFILIATERATINGVERSION', '1.0' );
