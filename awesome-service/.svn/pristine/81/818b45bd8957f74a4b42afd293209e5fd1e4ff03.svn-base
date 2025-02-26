<?php
	/**
	 * Plugin Name: Awesome Service box
	 * Plugin uri: http://awesomeplugins.epizy.com/awesome-service/
	 * Description: Awesome Service WordPress Plugin For Your Website Theme. You Can Embed Awesome Service Via Shortcode In Anywhere You Want, Even in Theme Files.
	 * Version: 1.0
	 * Author: Amzad Hossain
	 * Author uri: http://awesomeplugins.epizy.com
	 * Text Domain: awesome_service
	 */
	if ( !defined( 'ABSPATH' ) ) exit;
	define( 'AWESOME_SERVICE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


	//Awesome service cs js
	function awesome_service_cs_js() {

	    wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_style( 'awesome_service_flaticon', plugins_url('/flaticon/awesome_service_flaticon.css',__FILE__), array()); 
	    wp_enqueue_style( 'awesome_service_slick', plugins_url('/css/awesome_service_slick.css',__FILE__), array() ); 
	    wp_enqueue_style( 'awesome_service_style', plugins_url('/css/awesome_service_style.css',__FILE__), array() ); 
	    wp_enqueue_style( 'awesome_service_admin-style', plugins_url('/admin/awesome_service_admin.css',__FILE__), array() ); 

	    
	    wp_enqueue_script('jQuery');
	    wp_enqueue_script( 'awesome_service_slick', plugins_url('/js/awesome_service_slick.min.js',__FILE__), array( 'jquery' ), '',false);
	    wp_enqueue_script( 'awesome_service_script-js', plugins_url('/js/awesome_service_script.js',__FILE__), array( 'wp-color-picker', 'jquery' ), '', true );

	}

	add_action('init','awesome_service_cs_js');

	//Register awesome_servic post type
	function awesome_service_posts(){
		
		register_post_type('awesome_service_',array(
			'labels'  	=> array(
				'name'			=> esc_html__('Awesome Service','awesome_service'),
				'add_new_item' 	=> esc_html__('Add New Service','awesome_service'),
				'add_new' 		=> esc_html__('Add Service','awesome_service'),
				'edit_item'		=> esc_html__('Edit Service','awesome_service'),
				'search_items'	=> esc_html__('Search Services','awesome_service')
			),
			'public'    => false,
			'show_ui'    => true,
			'supports'	=> array('title','editor',)
		));
		
	}
	add_action('init','awesome_service_posts');

	//Include ohter file
	require_once( AWESOME_SERVICE_PLUGIN_DIR .'/shortcode/awesome-shortcode.php' );
	require_once( AWESOME_SERVICE_PLUGIN_DIR .'/admin/awesome-option.php' );
	require_once( AWESOME_SERVICE_PLUGIN_DIR .'/admin/cmb2/init.php' );
	require_once( AWESOME_SERVICE_PLUGIN_DIR .'/admin/cmb2/metabox.php' );