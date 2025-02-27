<?php
	/*
	Plugin Name: Service Boxs
	Plugin URI: https://themepoints.com/servicebox
	Description: Service Box WordPress Plugin allows you to effortlessly create stunning content boxes with icons and engaging hover effects, perfect for showcasing services, features, or any content in a visually appealing way.
	Version: 2.0
	Author: Themepoints
	Author URI: https://themepoints.com/
	TextDomain: service-boxs
	License: GPLv2
	*/

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	// Init Admin Script & Style
	function rsbbox_admin_load_init(){
		wp_enqueue_script( 'jquery' );
		wp_register_style( 'rsbbox_fontawesome', plugins_url( '/assets/css/font-awesome.min.css' , __FILE__ ) );
		wp_register_style( 'rsbbox_main-css', plugins_url( '/assets/css/rsbbox.css' , __FILE__ ) );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'rsbbox-picker', plugins_url('/assets/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}
	add_action( 'init', 'rsbbox_admin_load_init' );

	// Enqueue Admin Scripts
	function rsbbox_admin_script_init (){
		global $post_type;
		if( is_admin() ){
			if( 'tpwp_serviceboxs' == $post_type ){
				wp_enqueue_style('rsbbox_fontawesome');
				wp_enqueue_style( 'rsbbox_iconpicker-css', plugins_url( 'assets/css/ftw-iconpicker.min.css' , __FILE__ ) );
				wp_enqueue_script( 'rsbbox_iconpicker-js', plugins_url( '/assets/js/ftw-iconpicker.min.js' , __FILE__ ) , array( 'jquery' ));
			}
			if( 'generateservices' == $post_type ){
				wp_enqueue_style( 'rsbbox-admin-css', plugins_url( 'assets/css/admin.css' , __FILE__ ) );
				wp_enqueue_script( 'rsbbox_adminscripts_js', plugins_url( '/assets/js/admin-scripts.js' , __FILE__ ) , array( 'jquery' ) );
			}
		}
	}
	add_action('admin_enqueue_scripts', 'rsbbox_admin_script_init');

	# load admin style & scripts
	function rsbbox_admin_load_free_admin_scripts(){
		global $typenow;
		if(($typenow == 'tpwp_serviceboxs')){
			wp_enqueue_style( 'rsbbox-admin-style', plugins_url( 'admin/css/admin-style.css' , __FILE__ ) );
		}
	}
	add_action('admin_enqueue_scripts', 'rsbbox_admin_load_free_admin_scripts');

	# Load plugin Translations
	function rsbbox_admin_load_textdomain(){
		load_plugin_textdomain('service-boxs', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
	}
	add_action('plugins_loaded', 'rsbbox_admin_load_textdomain');

	// Activation hook actions for the frontend
	function rsbbox_activation_actions_for_frontend(){

        $installed = get_option( 'rsbbox_free_activation_time' );

	    // Check if this is the first activation
	    if (! $installed ) {
	        // If so, set the installation time
	        update_option('rsbbox_free_activation_time', time() );
	    }
	}
	register_activation_hook( __FILE__, 'rsbbox_activation_actions_for_frontend' );

	# Post Type
	require_once( 'lib/post-type/rsbbox-post-type.php' );

	# Metabox
	require_once( 'lib/metabox/rsbbox-metabox.php' );

	#Shortcode
	require_once( 'lib/shortcode/rsbbox-shortcode.php' );