<?php
	/*
	Plugin Name: Accordion Simply
	Plugin URI: https://github.com/beyond88/accordion-simply
	Description: Accordion Simply is a WordPress plugin aims to provide a quick way to create a responsive and clean accordion interface. When click on the header of a section, the section will be expanded and the others will be collapsed to present current section's content in a limited amount of space.
	Version: 1.0.0
	Author: Mohiuddin Abdul Kader
	Author URI: https://profiles.wordpress.org/hossain88/
	TextDomain: accordion-simply
	License: copyright@domain.com
	*/

	define('ACRDS_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('ACRDS_PLUGIN_DIR', plugin_dir_path(__FILE__) );	

	function acrds_load_init() {

		wp_enqueue_style( 'acrds-app', ACRDS_PLUGIN_PATH.'assets/css/app.css' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'acrds_colorpicker_js', plugins_url( '/assets/js/jscolor.js' , __FILE__ ) , array( 'jquery' ) );
		wp_enqueue_script( 'acrds_js', plugins_url( '/assets/js/app.js' , __FILE__ ) , array( 'jquery' ) ); 

	}
	add_action( 'init', 'acrds_load_init' );

	function acrds_admin() {
		//acrds_admin
		wp_enqueue_style( 'acrds-admin', ACRDS_PLUGIN_PATH.'assets/acrds-admin/css/admin.css' );		
		wp_enqueue_script( 'acrds-admin-js', plugins_url( '/assets/acrds-admin/js/admin.js' , __FILE__ ) , array( 'jquery' ) );	
	}
	add_action( 'admin_enqueue_scripts', 'acrds_admin' );	

	# Post Type
	require_once( 'lib/post-types/acrds-post-type.php' );

	# Metabox
	require_once( 'lib/metaboxes/acrds-metaboxes.php' );

	#Shortcode
	require_once( 'lib/shortcodes/acrds-shortcode.php' );	