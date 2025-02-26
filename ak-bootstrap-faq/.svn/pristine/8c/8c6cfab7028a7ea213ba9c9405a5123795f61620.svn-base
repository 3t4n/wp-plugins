<?php
/*
Plugin Name: AK Bootstrap FAQ
Description: Bootstrap FAQ plugin integrated with Custom Post Type. Shortcode [ak_bootstrap_faq].
Version: 1.0
Author: KrishnA Paul
Author URI: https://in.linkedin.com/in/krrishtheprogrammer
*/

//Admin style & scripts
function load_akbootstrapfaq_wp_admin_scripts( $hook ) {
    if( is_admin() ) { 
     
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
         
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', plugins_url( 'custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
    }
}
add_action( 'admin_enqueue_scripts', 'load_akbootstrapfaq_wp_admin_scripts');

//Frontend styles & scripts
function load_akbootstrapfaq_wp_style() {
	wp_enqueue_script('jquery');
		
    wp_register_style( 'bootstrap_min_css', plugins_url('ak-bootstrap-faq/bootstrap/css/bootstrap.min.css') );
    wp_enqueue_style( 'bootstrap_min_css' );
	wp_register_style( 'font-awesome_min_css', plugins_url('ak-bootstrap-faq/font-awesome/css/font-awesome.min.css') );
    wp_enqueue_style( 'font-awesome_min_css' );
	wp_register_style( 'plugin-style', plugins_url('ak-bootstrap-faq/css/plugin-style.css') );
    wp_enqueue_style( 'plugin-style' );
}
add_action( 'wp_enqueue_scripts', 'load_akbootstrapfaq_wp_style' );

function load_akbootstrapfaq_wp_scripts() {
	wp_register_script( 'bootstrap_min_js', plugins_url('ak-bootstrap-faq/bootstrap/js/bootstrap.min.js'), array('jquery'), '', true );
    wp_enqueue_script( 'bootstrap_min_js');
}
add_action( 'wp_enqueue_scripts', 'load_akbootstrapfaq_wp_scripts');



require_once('include/api/post-type.php');


add_action('admin_menu', 'register_akbootstrapfaq_setting_page');
function register_akbootstrapfaq_setting_page() {
	add_submenu_page( 'edit.php?post_type=akbootstrapfaq', 'AK Bootstrap FAQ setting page', 'AK Bootstrap FAQ setting page', 'manage_options', 'akbootstrapfaq-setting-page', 'akbootstrapfaq_setting_page_callback' );
	add_action( 'admin_init', 'register_akbootstrapfaq_settings' );
}
function register_akbootstrapfaq_settings() {
	//register our settings
	register_setting( 'akbootstrapfaq-settings-group', 'faq_display_mode' );
	register_setting( 'akbootstrapfaq-settings-group', 'cat_h_color' );
	register_setting( 'akbootstrapfaq-settings-group', 'ques_bg_color' );
	register_setting( 'akbootstrapfaq-settings-group', 'ques_txt_color' );
	register_setting( 'akbootstrapfaq-settings-group', 'ques_bdr_color' );
	register_setting( 'akbootstrapfaq-settings-group', 'ans_bg_color' );
	register_setting( 'akbootstrapfaq-settings-group', 'ans_txt_color' );
	register_setting( 'akbootstrapfaq-settings-group', 'ans_bdr_color' );
	register_setting( 'akbootstrapfaq-settings-group', 'faq_icon_color' );
	register_setting( 'akbootstrapfaq-settings-group', 'act_icon_color' );
}
function akbootstrapfaq_setting_page_callback() {
	
	require_once('include/pages/settings.php');

}


require_once('include/api/add-to-head.php');
require_once('include/api/loop-shortcode.php');