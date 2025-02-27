<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
function shayanweb_classiceditor_font_changer($mce_css){
	$mce_css .= ', ' . plugins_url('../css/shayanweb-classicfont.css',__FILE__);
	if(shayanweb_fontchanger_option('choose_font') == 'custom'){
		$mce_css .= ', ' . plugins_url('../css/vazir.css',__FILE__);
	}else{
		$mce_css .= ', ' . plugins_url('../css/'.shayanweb_fontchanger_option('choose_font').'.css',__FILE__);
	}
	return $mce_css;
}
add_filter( 'mce_css', 'shayanweb_classiceditor_font_changer' );