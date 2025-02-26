<?php
/*
Plugin Name: Mint Bird Feeder
Plugin URI: http://forgecode.net/
Description: A plugin that adds Mint Bird Feeder functionality to your WordPress feeds. You must have Mint and Bird Feeder installed and setup for this plugin to work.
Author: Nick Forge
Author URI: http://forgecode.net/
Version: 1.0
*/ 

function nf_mint_bird_feeder_feed_rss() {
	
	global $wpdb, $Mint;
	
	define('BIRDFEED', 'Posts (RSS)');
	include($_SERVER['DOCUMENT_ROOT'] . '/feeder/index.php');
	$wpdb->select(DB_NAME);
	
	// Export $BirdFeeder to the global namespace
	$GLOBALS['BirdFeeder'] = $BirdFeeder;
		
}

function nf_mint_bird_feeder_feed_rss2() {
	
	global $wpdb, $Mint;
	
	define('BIRDFEED', 'Posts (RSS2)');
	include($_SERVER['DOCUMENT_ROOT'] . '/feeder/index.php');
	$wpdb->select(DB_NAME);
	
	// Export $BirdFeeder to the global namespace
	$GLOBALS['BirdFeeder'] = $BirdFeeder;
		
}

function nf_mint_bird_feeder_feed_atom() {
	
	global $wpdb, $Mint;
	
	define('BIRDFEED', 'Posts (Atom)');
	include($_SERVER['DOCUMENT_ROOT'] . '/feeder/index.php');
	$wpdb->select(DB_NAME);
	
	// Export $BirdFeeder to the global namespace
	$GLOBALS['BirdFeeder'] = $BirdFeeder;
		
}


function nf_mint_bird_feeder_seed($info) {
	
	global $BirdFeeder;
	
	return $BirdFeeder->seed(get_the_title_rss(), get_permalink(), true);
	
}



if (function_exists('add_action') && function_exists('add_filter')) {
	
	add_action('rss_head','nf_mint_bird_feeder_feed_rss');
	add_action('rss2_head','nf_mint_bird_feeder_feed_rss2');
	add_action('atom_head','nf_mint_bird_feeder_feed_atom');
	
	add_filter('the_permalink_rss', 'nf_mint_bird_feeder_seed', 1000);
	
}
else {
	
	echo "Mint Bird Feeder for Wordpress is Operational!";
	
}

?>
