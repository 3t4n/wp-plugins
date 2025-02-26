<?php 
/*
*
*	***** Addresser *****
*
*	Shortcodes
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
/*
*
*  Build The Custom Plugin Form
*
*  Display Anywhere Using Shortcode: [addresser_custom_plugin_form]
*
*/
function addresser_custom_plugin_form_display($atts, $content = NULL){
		$out = '<div class="addresser-serach">';
        $out .= '<div class="addresser-content">';
        $out .= '<img src="'.ADDRESSER_CORE_IMG.'location.png" />';
        $out .= '<form id="addresser-form" class="addresser-form" method="POST">';
        $out .= '<input type="text" id="addresser-search" autocomplete="on">';
        $out .= '<input type="submit" value="submit" class="input-submit">';
        $out .= '</form>';
        $out .= '</div>';
        $out .= '</div>';
        $out .= '<div id="addresser-autocomplate-section"></div>';
        $out .= '<div id="addresser-details"></div>';
        return $out;
}
/*
Register All Shorcodes At Once
*/
add_action( 'init', 'addresser_register_shortcodes');
function addresser_register_shortcodes(){
	// Registered Shortcodes
	add_shortcode ('addresser_custom_plugin_form', 'addresser_custom_plugin_form_display' );
};