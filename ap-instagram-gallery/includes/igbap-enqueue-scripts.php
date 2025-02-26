<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'wp_enqueue_scripts', 'igbap_enqueue_styles', 10);
add_action( 'admin_enqueue_scripts', 'igbap_admin_enqueue_styles', 10);
add_action( 'admin_enqueue_scripts', 'igbapload_wp_media_files' );

function igbap_enqueue_styles() {
	
		if ( ! wp_script_is( 'jquery', 'enqueued' )) {
        wp_enqueue_script( 'jquery' );
    }

		wp_register_script( 'igbap_mediaelement_js', plugin_dir_url( __FILE__ ) . '../lib/videoplayer/js/mediaelement-and-player.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'igbap_mediaelement_js');
		
		wp_register_script( 'igbap_fancybox_js', plugin_dir_url( __FILE__ ) . '../lib/fancybox/source/jquery.fancybox.pack.js', array( 'jquery' ) );
		wp_enqueue_script( 'igbap_fancybox_js');
		
		wp_register_script( 'igbap_dateFormat_js', plugin_dir_url( __FILE__ ) . '../lib/dateFormat.js', array( 'jquery' ) );
		wp_enqueue_script( 'igbap_dateFormat_js');
		
		wp_register_script( 'igbap_easing_js', plugin_dir_url( __FILE__ ) . '../lib/easing.js', array( 'jquery' ) );
		wp_enqueue_script( 'igbap_easing_js');
		
		wp_register_script( 'igbap_instagramGallery_js', plugin_dir_url( __FILE__ ) . '../js/instagramGallery.js', array( 'jquery' ) );
		wp_enqueue_script( 'igbap_instagramGallery_js');
		
		wp_register_style( 'igbap_style_css', plugin_dir_url( __FILE__ )  . '../lib/videoplayer/css/style.css', false, '1.0.0' );
		wp_enqueue_style( 'igbap_style_css');
		
		wp_register_style( 'igbap_fancybox_css', plugin_dir_url( __FILE__ )  . '../lib/fancybox/source/jquery.fancybox.css', false, '1.0.0' );
		wp_enqueue_style( 'igbap_fancybox_css');
		
		wp_register_style( 'igbap_instagramGallery_css', plugin_dir_url( __FILE__ )  . '../css/instagramGallery.css', false, '1.0.0' );
		wp_enqueue_style( 'igbap_instagramGallery_css');

    	

		

}


function igbap_admin_enqueue_styles() {
	
		wp_enqueue_script('jquery');
    	wp_register_script( 'wp-color-picker-script',  plugin_dir_url(__FILE__) .'../js/script.js', array( 'wp-color-picker' ), false, true );
		wp_enqueue_script( 'wp-color-picker-script');

		wp_register_script( 'igbap_script', plugin_dir_url(__FILE__) . '../js/script.js', array('jquery'), '1.0', true );
    	wp_localize_script( 'igbap_script', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));

    	wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_script( 'wp-color-picker-script',  plugin_dir_url(__FILE__) .'../js/script.js', array( 'wp-color-picker' ), false, true );
	    wp_enqueue_script( 'wp-color-picker-script');
}

function igbapload_wp_media_files() {
    wp_enqueue_media();
}