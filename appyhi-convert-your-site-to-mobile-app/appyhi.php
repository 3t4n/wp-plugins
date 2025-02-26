<?php
/*
 
Plugin Name: AppyHi - Convert your site to mobile app
Plugin URI: https://appyhi.com
Description: Convert to mobile app, have it hosted on Playstore
Version: 1.0
Author: Loopwi
Author URI: https://appyhi.com/
License: GPLv2 or later
Text Domain: appyhi_apps
 
*/
//Declare
define( 'appyhi_apps', 'appyhi' );


// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

//Load jQuery
function appyhi_apps_load_jquery() {
    if ( ! wp_script_is( 'jquery', 'enqueued' )) {

        //Enqueue
        wp_enqueue_script( 'jquery' );

    }
}
add_action( 'wp_enqueue_scripts', 'appyhi_apps_load_jquery' );

//Enqueue styles
function appyhi_apps_styles() {

    wp_enqueue_style( 'appyhi_apps_bootstrap',  plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css');
    wp_enqueue_style( 'appyhi_apps_styles',  plugin_dir_url( __FILE__ ) . 'css/appyhi.css');
    wp_enqueue_style( 'appyhi_apps_phone',  plugin_dir_url( __FILE__ ) . 'css/phone.css');
    wp_enqueue_style( 'appyhi_apps_font_awesome',  plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css');
    wp_enqueue_style( 'appyhi_apps_pricing',  plugin_dir_url( __FILE__ ) . 'css/pricing.css');             
}
add_action( 'wp_enqueue_scripts', 'appyhi_apps_styles' );

//Enqueue Scripts
function appyhi_apps_add_theme_scripts() { 
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/jquery.min.js', array ( 'jquery' ), '3.6.0', 'true');
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/popper.min.js', array ( 'popper' ), '2.9.3', 'true');
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/bootstrap.min.js', array ( 'bootstrap' ), '5.1.3', 'true');
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/app.js');
}
add_action( 'wp_enqueue_scripts', 'appyhi_apps_add_theme_scripts' );


//Create menu item  
add_action('admin_menu', 'appyhi_apps_plugin_setup_menu'); 

function appyhi_apps_plugin_setup_menu(){
    add_menu_page('AppyHi App', 'AppyHi App', 'manage_options', 'appyhi_apps', 'appyhi_apps_init', 'dashicons-smartphone', 29 ); 
}

//Acton links
function appyhi_apps_action_links( $links ) {

    $links = array_merge( array(
        '<a href="' . esc_url( admin_url( '/admin.php?page=appyhi_apps' ) ) . '">' . __( 'Dashboard', 'textdomain' ) . '</a>' 
    ), $links );

    return $links;

}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'appyhi_apps_action_links' );

  
//Print main page 
function appyhi_apps_init(){
    include( plugin_dir_path( __FILE__ ) . 'includes/dashboard.php');
}