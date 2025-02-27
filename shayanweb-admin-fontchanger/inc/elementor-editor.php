<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
function shayanweb_elementoreditor_font_changer() {
	if (defined('ELEMENTOR_VERSION')) {
	//
	$custom_font_css = shayanweb_fontchanger_option('custom_font_css');
	if (shayanweb_fontchanger_option('choose_font') !== 'custom' or empty($custom_font_css)) {
		$custom_font_css='';
	}
    //
    wp_enqueue_style( 'shayanweb_custom_elementoreditor_style',
  	SHAYANWEB_FONT_CHANGER_URL . 'css/shayanweb-elementorfont.css',
  	array(),
  	SHAYANWEB_FONT_CHANGER_VERSION);
	//
	if (shayanweb_fontchanger_option('choose_font') !== 'custom'){
		wp_enqueue_style( 'shayanweb_fontchanger_font',
		SHAYANWEB_FONT_CHANGER_URL . 'css/'.shayanweb_fontchanger_option('choose_font').'.css',
		array(),
		SHAYANWEB_FONT_CHANGER_VERSION);
	}
    //
    wp_add_inline_style('shayanweb_custom_elementoreditor_style', $custom_font_css . ':root{--e-a-font-family:ShayanWeb-Font!important}body,button,input,.elementor-panel-heading-title,.elementor-panel,.elementor-panel .elementor-element{font-family:ShayanWeb-Font!important}.ace_editor{font-family: Monaco, Menlo, "Ubuntu Mono", Consolas, source-code-pro, monospace!important}');
  }
}
add_action( 'elementor/editor/before_enqueue_scripts', 'shayanweb_elementoreditor_font_changer',99999999 );
