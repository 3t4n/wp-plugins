<?php
/**
* Plugin Name: Social Sticky
* Plugin URI: http://wptp.net/#product
* Description: Social Sticky is Simply and Effectively to get more shares, more traffic, more fans.
* Version: 1.0
* Author: WPTP Net
* Author URI: http://wptp.net
* License: GPLv2 or Later
*/

/**
This function to get options
*/
function ss_get_options()
{
	$options = get_option( 'SS_Options' );
	return $options;
}

/**
Show effect and social box under footer
*/
function ss_box() 
{
	$options = ss_get_options();
	
	// Social Sticky only show when enable Left or Right Effect
	if ( $options[ 'EnableLeftEffect' ] == 1 || $options[ 'EnableRightEffect' ] == 1) {		
		include 'ss-box.php' ;
	}	
}

wp_register_style( 'ss-css', plugins_url( 'css/ss.css', __FILE__ ) );
wp_enqueue_style( 'ss-css' );

wp_enqueue_script( 'ss-effect', plugins_url( 'js/ss-effect.js', __FILE__), array() );
wp_enqueue_script( 'ss-js', plugins_url( 'js/ss.js', __FILE__), array( 'jquery' ) );
		
add_action( 'wp_footer', 'ss_box' );

/**
Setting Social Sticky (Settings -> Social Sticky)
*/
function ss_options_page()
{
	include 'ss-options-page.php' ;
}
 
function ss_admin_menu()
{
	if ( is_admin() ) {
		add_options_page( 'Social Sticky', 'Social Sticky', 'manage_options', 'ss', 'ss_options_page' );
	}
}

add_action( 'admin_menu', 'ss_admin_menu' );

/**
Function that will show color picker for some color option. Example: Center Color, Border Color
*/
function ss_add_color_picker( $hook )
{ 
    if ( is_admin() ) {      
        wp_enqueue_style( 'wp-color-picker' );         
        wp_enqueue_script( 'ss-custom-script-handle', plugins_url( 'js/ss-custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
    }
}

add_action( 'admin_enqueue_scripts', 'ss_add_color_picker' );
?>
