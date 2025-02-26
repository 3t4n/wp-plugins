<?php
/*
Plugin Name: Alerter
Plugin URI: https://webkust.be/
Description: This plugin adds a simple alert or notify textbox without coding. Go to the Alerter settings page; add your text and choose colors. Fast and Easy.
Author: Christophe Hollebeke
Version: 0.5.5
Author URI: https://webkust.be/
Text Domain: alerter
Domain Path: /languages/
License: GPL2
*/
/*
Alerter is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Alerter is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Alerter. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

/* LOADING FUNCTIONS */
function alwk_load_plugin_textdomain() {
  load_plugin_textdomain( 'alerter', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'alwk_load_plugin_textdomain' );

// Menu settings
function alwk_page_create() {
	$page_title		= __( 'Alerter Settings', 'alerter ' );
  $menu_title 	= 'Alerter';
  $capability 	= 'manage_options'; // only admin acces the settings page
  $menu_slug		= 'alerter_page';
  $function 		= 'alwk_setting_page'; //build your page in the function 'alwk_setting_page'
  $icon_url 		= 'dashicons-megaphone';
  $position 		= 24;

  add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

}
add_action( 'admin_menu', 'alwk_page_create' );


/*SETTINGS PAGE*/
require_once ( dirname( __FILE__ ) .'/admin/settings.php' );

/*ADD COLOR-PICKER SCRIPTS*/
function color_picker_assets($hook_suffix) { // $hook_suffix to apply a check for admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-alpha' ,  plugins_url( '/js/color-script.js' , __FILE__ ), array( 'wp-color-picker' ), '1.2.2' , $in_footer );
}
add_action( 'admin_enqueue_scripts' , 'color_picker_assets' );

// Load options array and store it in $cgm_options
function alwk_load_options() {
	$alwk_options = get_option( 'alwk_options' );
	return $alwk_options;
}

// This just echoes the text when the checkbox is true
function alwk_show_text() {

	$alwk_options = alwk_load_options();

	$alert = $alwk_options[ 'alert' ];
	$show_alert = $alwk_options[ 'show_alert' ];

	if ( $show_alert == 1 )
		{
			$return_string ='<div class="alerter">' . $alert . '</div>';
		}
		else
		{
			$return_string = FALSE;
		}

	return $return_string;
}
add_shortcode( 'alerter' , 'alwk_show_text' );

// Add css
function alerter_css() {

	$alwk_options = alwk_load_options();

	$show_alerter 				= $alwk_options[ 'show_alert' ];
	$css_text_color 			= $alwk_options[ 'text_color' ];
	$css_background_color = $alwk_options[ 'background_color' ];
	$css_border_color			= $alwk_options[ 'border_color' ];

	if ( $show_alerter == 1 )
		{
		echo "
		<style type='text/css'>
		div.alerter {
				text-align: center;
				font-size: 1.1em;
				padding: 0.3em;
				border-radius: 5px;
				border: 1px solid $css_border_color;
				color:$css_text_color;
				background-color:$css_background_color;
			}
		</style>";
		}
}
// Add hook for front-end css <head></head>
add_action( 'wp_head' , 'alerter_css' );
?>