<?php
/*
  Plugin Name: Add Device Type to Body Class
  Description: This plugin is used to add type of device (mobile, tablet or desktop) in body class of wordpress website. This class is used to add device specific CSS. 
  Author: Aftab Muni
  Version: 1.0
  Author URI: https://aftabmuni.com/
 */

/*
  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope tDEVICE_TYPE it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
 */

define('AMM_DEVICE_TYPE_VERSION', '1.0');
define('AMM_DEVICE_TYPE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AMM_DEVICE_TYPE_DONATE_LINK', 'https://www.paypal.me/aftabmuni');

function amm_device_type_activate_plugin(){
	
}
register_activation_hook(__FILE__, 'amm_device_type_activate_plugin');

function amm_device_type_deactivate_plugin(){
	
}
register_deactivation_hook(__FILE__, 'amm_device_type_deactivate_plugin');

function amm_add_device_in_body_class( $classes ) {
	if (!class_exists('Mobile_Detect')) {
		include_once ( AMM_DEVICE_TYPE_PLUGIN_DIR . '/Mobile_Detect.php'); 
	}	
	$detect = new Mobile_Detect;
	if ( $detect->isMobile() && !$detect->isTablet()) {
		$classes[] = 'device-mobile';
	} else if ( $detect->isMobile() && $detect->isTablet() ) {
		$classes[] = 'device-tablet';
	} else {
		$classes[] = 'device-desktop';
	}
	return $classes;
}
add_filter( 'body_class', 'amm_add_device_in_body_class' );

add_filter('plugin_row_meta', 'amm_device_type_plugin_row_meta', 10, 2);
function amm_device_type_plugin_row_meta($meta, $file) {
	if ( strpos( $file, basename(__FILE__) ) !== false ) {
		$meta[] = '<a href="'.AMM_DEVICE_TYPE_DONATE_LINK.'" target="_blank">' . esc_html__('Donate', 'amm_device_type') . '</a>';
	}
	return $meta;
}
?>