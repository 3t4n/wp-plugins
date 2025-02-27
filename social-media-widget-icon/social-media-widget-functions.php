<?php 

function social_share_icons_widget_scripts(){
	wp_enqueue_style("font-awesome", plugins_url("assets/css/font-awesome.min.css", __FILE__), FALSE);	
	wp_enqueue_style("hover", plugins_url("assets/css/hover.css", __FILE__), FALSE);	
	wp_enqueue_style("main-style", plugins_url("assets/css/style.css", __FILE__), FALSE);
	
	wp_enqueue_script('jQuery');
	wp_register_script( 'main-script', plugin_dir_url(__FILE__) . 'assets/js/wpssiw-script.js', array('jquery'), '1.0', true );
 	wp_enqueue_script('main-script' );
}
add_action('wp_enqueue_scripts', 'social_share_icons_widget_scripts');
add_action('admin_enqueue_scripts', 'social_share_icons_widget_scripts');