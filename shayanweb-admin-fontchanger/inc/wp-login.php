<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
// ShayanWeb.com Admin FontChanger
function shayanweb_wp_login_font_changer() {
	$custom_font_css = shayanweb_fontchanger_option('custom_font_css');
	//
	wp_enqueue_style( 'shayanweb_custom_admin_wp_login_style',
	SHAYANWEB_FONT_CHANGER_URL . 'css/shayanweb-wp-login.css',
	array(),
	SHAYANWEB_FONT_CHANGER_VERSION);
	//
	if (shayanweb_fontchanger_option('choose_font') == 'custom' and !empty($custom_font_css)) {
		$adding_front_font_css = $custom_font_css;
		wp_add_inline_style( 'shayanweb_custom_admin_wp_login_style', $adding_front_font_css );
	}else{
		wp_enqueue_style( 'shayanweb_fontchanger_font',
		SHAYANWEB_FONT_CHANGER_URL . 'css/'.shayanweb_fontchanger_option('choose_font').'.css',
		array(),
		SHAYANWEB_FONT_CHANGER_VERSION);
	}
}
add_action( 'login_enqueue_scripts', 'shayanweb_wp_login_font_changer',99999999 );
