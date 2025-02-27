<?php
/*
Plugin Name: Counter-Hits
Plugin URI: wpgear.xyz/counter-hits/
Description: A simple, easy, fast, adaptive, local, objective counter to visit your site.
Version: 2.9
Text Domain: counter-hits
Domain Path: /languages
Author: WPGear
Author URI: https://wpgear.xyz
License: GPLv2
*/

	include_once( __DIR__ .'/includes/functions.php' );
	include_once( __DIR__ .'/includes/shortcodes.php' );

	$CntrH_LocalePath = dirname (plugin_basename ( __FILE__ )) . '/languages/';
	__('A simple, easy, fast, adaptive, local, objective counter to visit your site.', 'counter-hits');	

	$Counter_Hits = do_Counter_Hits (0);
	
	/* Translate.
	----------------------------------------------------------------- */
	add_action ('plugins_loaded', 'CntrH_Locale');
	function CntrH_Locale() {
		global $CntrH_LocalePath;
				
		$Result = load_plugin_textdomain ('counter-hits', false, $CntrH_LocalePath);
	}
	