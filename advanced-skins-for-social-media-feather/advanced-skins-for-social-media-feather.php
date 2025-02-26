<?php
/*
Plugin Name: Advanced Skins for Social Media Feather
Plugin URI: https://susanwrotethis.com/plugins/advanced-skins-for-social-media-feather/
Description: Advanced Skins for Social Media Feather extends Social Media Feather's styling options by adding skins with transparent backgrounds. Backgrounds, hover effects and other styling may be applied with custom CSS. The skins were created with the help of the Socicon generator.
Version: 1.0
Author: Susan Walker
Author URI: https://susanwrotethis.com
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: swt-asmf
Domain Path: /lang/
*/

// Exit if loaded from outside of WP
if ( !defined( 'ABSPATH' ) ) exit;

// SCRIPT LOADING AND LANGUAGE SUPPORT SETUP BEGINS HERE /////////////////////////////////
define( 'SWT_ASMF_IMG_PATH', plugin_dir_path( __FILE__ ) );
define( 'SWT_ASMF_IMG_URL', plugin_dir_url( __FILE__ ) );

// Load plugin textdomain
function swt_asmf_load_textdomain()
{
	load_plugin_textdomain( 'swt-asmf', false, dirname( plugin_basename( __FILE__ ) ).'/lang/' );
}
add_action( 'init', 'swt_asmf_load_textdomain' );

// SOCIAL MEDIA FEATHER FILTER FUNCTION BEGINS HERE //////////////////////////////////////
function swt_asmf_add_icon_skins( $icons )
{
	$add_ons = array(
		'blue-transparent' => array(
			'label' => esc_html__('Blue Icons on Transparency', 'swt-asmf' ),
			'image' => SWT_ASMF_IMG_URL.'/img/blue-transparent/preview.png',
			'folder' => '/img/blue-transparent/', 
			'path' => SWT_ASMF_IMG_PATH.'/img/blue-transparent/',
			'uri' => SWT_ASMF_IMG_URL.'/img/blue-transparent/'
		),
		'color-transparent' => array(
			'label' => esc_html__('Color Icons on Transparency', 'swt-asmf' ),
			'image' => SWT_ASMF_IMG_URL.'/img/color-transparent/preview.png',
			'folder' => '/img/color-transparent/', 
			'path' => SWT_ASMF_IMG_PATH.'/img/color-transparent/',
			'uri' => SWT_ASMF_IMG_URL.'/img/color-transparent/'
		),
		'black-transparent' => array(
			'label' => esc_html__('Black Icons on Transparency', 'swt-asmf' ),
			'image' => SWT_ASMF_IMG_URL.'/img/black-transparent/preview.png',
			'folder' => '/img/black-transparent/', 
			'path' => SWT_ASMF_IMG_PATH.'/img/black-transparent/',
			'uri' => SWT_ASMF_IMG_URL.'/img/black-transparent/'
		),
		'gray-transparent' => array(
			'label' => esc_html__('Gray Icons on Transparency', 'swt-asmf' ),
			'image' => SWT_ASMF_IMG_URL.'/img/gray-transparent/preview.png',
			'folder' => '/img/gray-transparent/', 
			'path' => SWT_ASMF_IMG_PATH.'/img/gray-transparent/',
			'uri' => SWT_ASMF_IMG_URL.'/img/gray-transparent/'
		),
		'silver-transparent' => array(
			'label' => esc_html__('Silver Icons on Transparency', 'swt-asmf' ),
			'image' => SWT_ASMF_IMG_URL.'/img/silver-transparent/preview.png',
			'folder' => '/img/silver-transparent/', 
			'path' => SWT_ASMF_IMG_PATH.'/img/silver-transparent/',
			'uri' => SWT_ASMF_IMG_URL.'/img/silver-transparent/'
		),
		'white-transparent' => array(
			'label' => esc_html__('White Icons on Transparency', 'swt-asmf' ),
			'image' => SWT_ASMF_IMG_URL.'/img/white-transparent/preview.png',
			'folder' => '/img/white-transparent/', 
			'path' => SWT_ASMF_IMG_PATH.'/img/white-transparent/',
			'uri' => SWT_ASMF_IMG_URL.'/img/white-transparent/'
		),
	);
	return array_merge( $icons, $add_ons );
}
 add_filter( 'synved_social_icon_skin_list', 'swt_asmf_add_icon_skins' );