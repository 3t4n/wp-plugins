<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
// ShayanWeb.com Admin FontChanger
function shayanweb_front_font_changer() {
    $custom_font_css = shayanweb_fontchanger_option('custom_font_css');
	if (shayanweb_fontchanger_option('choose_font') !== 'custom' or empty($custom_font_css)) {
		$custom_font_css='';
	}
    //
    wp_enqueue_style( 'shayanweb_fontchanger_font',
    SHAYANWEB_FONT_CHANGER_URL . 'css/'.shayanweb_fontchanger_option('choose_font').'.css',
    array(),
    SHAYANWEB_FONT_CHANGER_VERSION);
    //
    $adding_front_font_css = $custom_font_css . "*:not(i),html,body, a, p, div, input, span, h1, h2, h3, h4, h5, h6, textarea, ul, li, button, .woocommerce, font
    {font-family:ShayanWeb-Font!important;letter-spacing: normal;}
    .dashicons, .dashicons-before:before, #wpadminbar .ab-icon, #wpadminbar>#wp-toolbar>#wp-admin-bar-root-default .ab-icon
    {font-family:dashicons!important;}";
    wp_add_inline_style( 'shayanweb_fontchanger_font', $adding_front_font_css );
}
add_action( 'wp_enqueue_scripts', 'shayanweb_front_font_changer',99999999 );
