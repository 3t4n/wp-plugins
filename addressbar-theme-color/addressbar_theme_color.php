<?php
/**
 * @package Addressbar Theme Color
 * @version 0.3
 */
/*
Plugin Name: Addressbar Theme Color
Plugin URI: https://wordpress.org/plugins/html5-adressbar-theme-color
Description: Change addressbar theme color for mobile browsers
Version: 0.3
Author: Gonzalo Diaz <devel@gon.cl>
Author URI: https://gon.cl/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: addressbar_theme_color
*/

include( dirname(__FILE__) . '/options.php' );

function addressbar_theme_color_mobile_address_bar() {
    $options = get_option( 'addressbar_theme_color_settings' );



    //this is for Chrome, Firefox OS, Opera and Vivaldi
    echo '<meta name="theme-color" content="'.$options['addressbar_theme_color'].'" />';
    //Windows Phone **
    echo '<meta name="msapplication-navbutton-color" content="'.$options['addressbar_theme_color'].'" />';
    // iOS Safari
    echo '<meta name="apple-mobile-web-app-capable" content="yes" />';
    echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />';
}
add_action( 'wp_head', 'addressbar_theme_color_mobile_address_bar' );

function addressbar_theme_color_add_settings_link( $links ) {
    $settings_link = '<a href="themes.php?page=addressbar-theme-color">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}

$plugin = plugin_basename( __FILE__ );

add_filter( "plugin_action_links_$plugin", 'addressbar_theme_color_add_settings_link' );

