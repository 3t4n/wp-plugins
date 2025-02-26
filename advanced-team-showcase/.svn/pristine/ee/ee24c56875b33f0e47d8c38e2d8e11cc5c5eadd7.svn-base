<?php
/*
Plugin Name: Advanced Team Showcase 
Plugin URI: https://github.com/beyond88/advanced-team-showcase
Description: Advanced Team Showcase is a WordPress plugin that allows you to easily create and manage teams. You can display single teams as multiple responsive columns, you can also showcase all teams in various styles.
Version: 1.0.0
Author: Mohiuddin Abdul Kader
Author URI: https://profiles.wordpress.org/hossain88/
TextDomain: atmswc
License: copyright@domain.com
*/

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	define( 'ATMSWC_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define( 'ATMSWC_PLUGIN_DIR', plugin_dir_path(__FILE__) );

	function atmswc_init(){

		wp_enqueue_style( 'atmswc-fontawesome', ATMSWC_PLUGIN_PATH.'assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'atmswc-animate', ATMSWC_PLUGIN_PATH.'assets/css/animate.css' );
		wp_enqueue_style( 'atmswc-featherlight', ATMSWC_PLUGIN_PATH.'assets/css/featherlight.css' );
		wp_enqueue_style( 'atmswc-app', ATMSWC_PLUGIN_PATH.'assets/css/atmswc-app.css' );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( "jquery-ui-sortable" );
		wp_enqueue_script( "jquery-ui-draggable" );
		wp_enqueue_script( "jquery-ui-droppable" );

		wp_enqueue_script( 'advanced_team_showcase_js', plugins_url( 'assets/js/atmswc-script.js', __FILE__), array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'advanced_team_showcase_ajax_js', plugins_url( 'assets/js/atmswc-script.js', __FILE__), array( 'jquery' ), '1.0.0', true );	
		wp_localize_script( 'advanced_team_showcase_ajax_js', 'advanced_team_showcase_ajax', array( 'advanced_team_showcase_ajaxurl' => admin_url( 'admin-ajax.php')) );				
		wp_enqueue_script( 'atmswc_picker_js', plugins_url( '/assets/js/jscolor.js' , __FILE__ ) , array( 'jquery' ) );
		wp_enqueue_script( 'atmswc_featherlight_js', plugins_url( '/assets/js/featherlight.js' , __FILE__ ) , array( 'jquery' ) );

	}
	add_action( 'init', 'atmswc_init' );	

	# Load plugin Translations
	function atmswc_load_textdomain(){
		
		load_plugin_textdomain( 'atmswc', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
	}
	add_action( 'plugins_loaded', 'atmswc_load_textdomain' );

	# Post Type
	require_once( 'lib/post-types/atmswc-post-type.php' );

	# Metabox
	require_once( 'lib/metaboxes/atmswc-metaboxes.php' );	

	# Metabox
	require_once( 'lib/core/atmswc-core.php' );		

	#Shortcode
	require_once( 'lib/shortcodes/atmswc-shortcode.php' );