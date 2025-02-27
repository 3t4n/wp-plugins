<?php
/*
Plugin Name:  RCD-Right Click Disabler for WordPress
Plugin URI:   https://profiles.wordpress.org/paramsheoran
Description:  Disable Right Click,Control+C,Control+V to protect your content in wordpress website.
Version:      1.0
Author:       Param Sheoran
Author URI:   https://paramsheoran.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  rcdparam
Domain Path:  /languages
*/

 
// Exit if accessed directly.
if( !defined( 'ABSPATH' ) ) exit;

// Function to define script for right click disable.

function rcd_scripts_basic()
{ 
if ( ! current_user_can( 'activate_plugins' ) && ! current_user_can( 'update_core' ) ) {
	// Register the script like this for a plugin: 
 wp_register_script( 'custom-script', plugins_url( 'js/rcd-disabler.js', __FILE__ ) );
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'custom-script' ); 
}
}
add_action( 'wp_enqueue_scripts', 'rcd_scripts_basic' ); 

function rcd_styles_basic()
{
if ( ! current_user_can( 'activate_plugins' ) && ! current_user_can( 'update_core' ) ) {
    // Register the style like this for a plugin:
    wp_register_style( 'custom-style', plugins_url( 'css/rcd-style.css', __FILE__ ));
     
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'custom-style' );
}
}
add_action( 'wp_enqueue_scripts', 'rcd_styles_basic' );

