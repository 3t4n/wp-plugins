<?php

add_action( 'admin_enqueue_scripts', 'fpfbip_admin_enqueue_styles', 10);
add_action('wp_enqueue_scripts', 'fpfbip_enqueue_scripts', 10);


function fpfbip_admin_enqueue_styles(){



	wp_enqueue_script( 'wp-color-picker-script',  plugin_dir_url(__FILE__) .'/js/fpfbip_colorpicker.js', array( 'wp-color-picker' ), false, true );	

	wp_register_script( 'googlefonts', plugin_dir_url(__FILE__) . '/js/fpfbip_fontselect.js', array('jquery'), '1.0', true );

	wp_register_style( 'font_select_css', plugin_dir_url( __FILE__ )  . '/css/fpfbip_fontselect.css', false, '1.0.0' );


	wp_enqueue_script('googlefonts');
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_style('font_select_css');


}


function fpfbip_enqueue_scripts(){


	wp_enqueue_script( 'fpfbip_jquery',  plugin_dir_url(__FILE__) .'/jquery/jquery-1.9.1.min.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'fpfbip_famax_pro',  plugin_dir_url(__FILE__) .'/js/famax-pro.min.js', array( 'jquery' ), false, true );


	wp_enqueue_script('fpfbip_jquery');

	wp_enqueue_script('fpfbip_famax_pro');

}