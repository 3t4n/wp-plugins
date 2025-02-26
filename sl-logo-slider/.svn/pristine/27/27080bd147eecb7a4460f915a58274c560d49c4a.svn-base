<?php
/**
Plugin Name: SL Logo Slider
Plugin URI: https://wordpress.org/plugins/sl-logo-slider/
Description: SL Logo Slider is a wordPress plugin to include image logo on slider.
Version: 2.0.2
Author: Iwan Prasetiyo
Author URI: https://tukarpengetahuan.com/
License: GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  sl-logo-slider
Domain Path:  /languages


SL Logo Slider is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
SL Logo Slider is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with SL Logo Slider. If not, see {License URI}.
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

define( 'SLS_SLIDER', plugin_dir_url( __FILE__ ) );
define( 'SLS_SLIDER_PROCESS', plugin_dir_url( __FILE__ ) . 'include/' );
define( 'SLS_SITE_URL', site_url() );

###  Registered Admin Script / Style SL logo slider
function sls_admin_script() {
	if ( is_admin() ) {
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'thickbox' );
		
		wp_enqueue_media();

		wp_register_style( 'sls_admin_css',  SLS_SLIDER . 'admin/css/sls-admin-style.css' );
		wp_enqueue_style( 'sls_admin_css' );
		
		wp_enqueue_style( 'thickbox' );

		wp_register_script( 'sls_media_box', SLS_SLIDER . 'admin/js/sls-media-box.js' );

		if ( isset( $_REQUEST["page"] ) ) {
			if ( $_REQUEST["page"] === "manage_sls_logo" ) {
				wp_enqueue_script( 'sls_media_box' );
			}
			else {
				return;
			}
		}
		
	}
}
add_action( 'admin_enqueue_scripts', 'sls_admin_script' );

### Call Ajax Post Data
function sls_ajax_enqueue() {
	if ( is_admin() ) {
		
		if ( isset( $_REQUEST["page"] ) ) {
			if ( $_REQUEST["page"] === "manage_sls_logo" || $_REQUEST["page"] === "setting_sls_logo" ) {
				wp_enqueue_script( 'sls-ajax-script', plugins_url( '/admin/js/sls-ajax-call.js', __FILE__ ), array('jquery') );
				wp_localize_script( 'sls-ajax-script', 'ajax_object', array( 'sls_ajax_url' => admin_url( 'admin-ajax.php' ) ) );
			}
			else {
				return;
			}
		}
	
	}
}
add_action( 'admin_enqueue_scripts', 'sls_ajax_enqueue' );


function sls_frontend_script() {
	
	// Registering Style
	wp_register_style( 'sls_slider_css',  SLS_SLIDER . 'public/css/sl-slider.css' );
	wp_enqueue_style( 'sls_slider_css' );
	wp_register_style( 'sls_slick_css',  SLS_SLIDER . 'public/slick/slick.css' );
	wp_enqueue_style( 'sls_slick_css' );
	wp_register_style( 'sls_slick_theme',  SLS_SLIDER . 'public/slick/slick-theme.css' );
	wp_enqueue_style( 'sls_slick_theme' );
	
	//Registering Script
	wp_enqueue_script( 'jquery' );
	wp_register_script('sls_slick_js', SLS_SLIDER . 'public/slick/slick.js', array('jquery'));  
	wp_enqueue_script('sls_slick_js');
}
add_action( 'wp_enqueue_scripts', 'sls_frontend_script');


###  plugin activation
register_activation_hook( __FILE__, 'sls_plugin_activate' );
function sls_plugin_activate() {
	
	$options_data = array( 
				'sls_slides_to_show' => (int) 6, 
				'sls_slides_to_scroll' => (int) 1, 
				'sls_autoplay' => (int) 1, 
				'sls_autoplay_speed' => (int) 1500, 
				'sls_arrows' => (int) 0, 
				'sls_dots' => (int) 0, 
				'sls_pause_on_hover' => (int) 0
			);

	// Add default options value to serilaize
	if( is_array($options_data) ) {
		$sls_serialize_options = maybe_serialize( $options_data );
	}
	
	if ( get_option( 'sls_settings' ) !== false ) {
		update_option( 'sls_settings', $sls_serialize_options);
	}
	else {
		add_option( 'sls_settings', $sls_serialize_options);
	}
}

###  plugin deactivation
register_deactivation_hook( __FILE__, 'sls_plugin_deactivate' );
function sls_plugin_deactivate() {
	delete_option( 'sls_settings' );
}

###  plugin uninstallation
register_uninstall_hook( __FILE__, 'sls_plugin_uninstall' );
function sls_plugin_uninstall() {
    // Uninstall
	require "uninstall.php";
}

###  Unserialize option value
if ( get_option( 'sls_settings' ) !== false ) {
	$my_sls_options = maybe_unserialize( get_option( 'sls_settings' ) );

define( 'SLS_SLIDES_TO_SHOW', $my_sls_options['sls_slides_to_show'] );
define( 'SLS_SLIDES_TO_SCROLL', $my_sls_options['sls_slides_to_scroll'] );
define( 'SLS_AUTOPLAY', $my_sls_options['sls_autoplay'] );
define( 'SLS_AUTOPLAY_SPEED', $my_sls_options['sls_autoplay_speed'] );
define( 'SLS_ARROWS', $my_sls_options['sls_arrows'] );
define( 'SLS_DOTS', $my_sls_options['sls_dots'] );
define( 'SLS_PAUSE_ON_HOVER', $my_sls_options['sls_pause_on_hover'] );
}

###  Add Plugin to Menu Admin
function sls_slider_options() {
	add_menu_page('SL Logo Slider', 'SL Logo Slider', 'manage_options', 'sls_logo', 'sls_logo_manage', 'dashicons-format-gallery');
	add_submenu_page( 'sls_logo', 'Manage SL Logo', 'Manage SL Logo', 'manage_options', 'manage_sls_logo', 'sls_logo_manage');
	add_submenu_page( 'sls_logo', 'Settings', 'Settings', 'manage_options', 'setting_sls_logo', 'sls_logo_settings');
	remove_submenu_page('sls_logo', 'sls_logo');
}
add_action('admin_menu', 'sls_slider_options');


### Create Table
require "include/sls-logo-database.php";

### Manage Logo
function sls_logo_manage() {	
	require "include/sls-logo-manage.php";
}

### Settings
function sls_logo_settings() {	
	require "include/sls-logo-settings.php";
}

require_once('include/sls-logo-process.php');
require_once('include/sls-logo-front-view.php');