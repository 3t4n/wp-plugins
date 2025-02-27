<?php
/*
Plugin Name: ShayanWeb Admin FontChanger | افزونه‌ی تغییر فونت پیشخوان وردپرس شایان وب
Plugin URI:  https://ShayanWeb.com/blog/change-wp-admin-font/
Author:      ShayanWeb
Author URI:  https://ShayanWeb.com/
Version: 	 1.8.1
Tags: fonts, admin, wp-admin
Requires at least: 5.2
Tested up to: 6.6.1
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: shayanweb-admin-fontchanger
Description: The easiest way to change the WordPress admin font for Farsi websites is by using this lightweight plugin!
*/
//
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
define( 'SHAYANWEB_FONT_CHANGER_VERSION' , '1.8.1' );
define( 'SHAYANWEB_FONT_CHANGER_URL' , trailingslashit(plugin_dir_url( __FILE__ )) );
define( 'SHAYANWEB_FONT_CHANGER_DIR' , trailingslashit(plugin_dir_path(__FILE__)) );
define( 'SHAYANWEB_FONT_CHANGER_INC_DIR' , trailingslashit(SHAYANWEB_FONT_CHANGER_DIR.'inc' ));
//
//
require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'options.php';
//
//
if (!function_exists( 'shayanweb_font_changer' )) {
	if (shayanweb_fontchanger_option('wp_font_changer') !== 'off') {
		require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'font-changer.php';
	}
}
//
if (defined('ELEMENTOR_VERSION')) {
	if (!function_exists( 'shayanweb_elementoreditor_font_changer' )) {
		if (shayanweb_fontchanger_option('elementor_font_changer') !== 'off') {
	  	require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'elementor-editor.php';
		}
	}
}
//
//
if (!function_exists( 'shayanweb_classiceditor_font_changer' )) {
	if (shayanweb_fontchanger_option('classic_font_changer') !== 'off') {
		require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'classic-editor.php';
	}
}
//
if (!function_exists( 'shayanweb_wp_login_font_changer' )) {
	if (shayanweb_fontchanger_option('wp_login_font_changer') !== 'off') {
		require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'wp-login.php';
	}
}
//
if (shayanweb_fontchanger_option('front_font_changer') !== 'off') {
	if (!function_exists( 'shayanweb_front_font_changer' )) {
		require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'front-font.php';
	}
}elseif(shayanweb_fontchanger_option('front_wpadminbar_font_changer') !== 'off'){
	if (!function_exists( 'shayanweb_front_wpadminbar_font_changer' )) {
		require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'front-wpadminbar.php';
	}
}
//
// load notices
require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'notices.php';
//
//
// Plugin By: ShayanWeb.com - Shayan Farhang Pazhooh
