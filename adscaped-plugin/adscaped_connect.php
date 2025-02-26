<?php
	/*
		Plugin Name: adscaped plugin 1.0
		Plugin URI: http://www.adscaped.com
		Description: The adscaped Wordpress plugin is a way to easily advertise on your Blog using http://adscaped.com.
		Author: binaerwelt
		Version: 1.0
		Author URI: http://www.binaerwelt.com
	*/

	// + settings
	define("ASC_PLUGINDIR", "/adscaped-plugin/");
	define("ASC_TITLE", "");
	
	define("ASC_PAGEID", get_option("asc_opt_pageid")); //adscaped pageid
	if(get_option("asc_opt_spad")=="on") { define("ASC_SHOWPAGEAD", true); } else { define("ASC_SHOWPAGEAD", false);} //show ad ontop of posts
	
	// + includes
	require("adscaped_delivery.php");
	require("adscaped_widget.php");
	// - javascript
	
	
	// + action hooks
	// - admin
	add_action('admin_menu', 'asc_adminmenu');
	
	// - global
	add_action('wp_print_styles', 'asc_init_styles');
	add_action('init', 'asc_init_js');
	
	// - pages
	if(ASC_SHOWPAGEAD==true)
	{
		add_action('the_post', 'asc_posthook');
	}
	
	// - widget
	// register adscaped widget
	add_action('widgets_init', create_function('', 'return register_widget("AscWidget");'));
	
	// globals
	$asc_adnum = 0;
	
	
	// admin & menu functions
	function asc_adminmenu() {
		add_options_page('adscaped options', 'adscaped', 'manage_options', 'adsmen_main', 'asc_options');
	}
	
	function asc_options() {
		include("adscaped_admin.php");
	}
	
	// page hookup functions
	function asc_posthook() {
		asc_dl_postad();
	}
	
	// init functions
	function asc_init_styles() {
        $StyleUrl = WP_PLUGIN_URL.ASC_PLUGINDIR.'css/asc_style1.css';
        $StyleFile = WP_PLUGIN_DIR.ASC_PLUGINDIR.'css/asc_style1.css';
        if ( file_exists($StyleFile) ) {
            wp_register_style('ascStyleSheets', $StyleUrl);
            wp_enqueue_style( 'ascStyleSheets');
        } 
    }
    
    function asc_init_js() {
    	// TODO: to be optimized
    	wp_register_script("jquery", WP_PLUGIN_URL.ASC_PLUGINDIR.'js/jquery.js');
    	wp_register_script("asc_inc_js", WP_PLUGIN_URL.ASC_PLUGINDIR.'js/asc_inc.js');
    	wp_enqueue_script("jquery");
    	wp_enqueue_script("asc_inc_js");
    	//echo "scripts loaded";
    }
	
?>
