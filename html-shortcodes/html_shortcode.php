<?php
/*
Plugin Name:  HTML Tag Shortcodes
Description:  Easily insert specificed HTML tags into the visual editor using shortcodes.
Version:      1.1
Author:       Jared Hoylman
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  htmlsc
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// ************ A ************
// [a foo="foo-value"]
function htmlsc_a_shortcode( $atts ) {	return htmlsc_OpenTag('a',$atts); }
add_shortcode( 'a', 'htmlsc_a_shortcode' );

// [a_end]
function htmlsc_a_end_shortcode( $atts ) {	return htmlsc_CloseTag('a'); }
add_shortcode( 'a_end', 'htmlsc_a_end_shortcode' );

// ************ BR ************
// [br foo="foo-value"]
function htmlsc_br_shortcode( $atts ) {	return htmlsc_SimpleTag('br',$atts); }
add_shortcode( 'br', 'htmlsc_br_shortcode' );

// ************ BUTTON ************
// [button foo="foo-value"]
function htmlsc_button_shortcode( $atts ) {	return htmlsc_OpenTag('button',$atts); }
add_shortcode( 'button', 'htmlsc_button_shortcode' );

// [button_end]
function htmlsc_button_end_shortcode( $atts ) {	return htmlsc_CloseTag('button'); }
add_shortcode( 'button_end', 'htmlsc_button_end_shortcode' );

// ************ DIV ************
// [div foo="foo-value"]
function htmlsc_div_shortcode( $atts ) {	return htmlsc_OpenTag('div',$atts); }
add_shortcode( 'div', 'htmlsc_div_shortcode' );

// [div_end]
function htmlsc_div_end_shortcode( $atts ) {	return htmlsc_CloseTag('div'); }
add_shortcode( 'div_end', 'htmlsc_div_end_shortcode' );

// ************ HR ************
// [hr foo="foo-value"]
function htmlsc_hr_shortcode( $atts ) {	return htmlsc_SimpleTag('hr',$atts); }
add_shortcode( 'hr', 'htmlsc_hr_shortcode' );

// ************ IMG ************
// [img foo="foo-value"]
function htmlsc_img_shortcode( $atts ) {	return htmlsc_SimpleTag('img',$atts); }
add_shortcode( 'img', 'htmlsc_img_shortcode' );

// ************ P ************
// [p foo="foo-value"]
function htmlsc_p_shortcode( $atts ) {	return htmlsc_OpenTag('p',$atts); }
add_shortcode( 'p', 'htmlsc_p_shortcode' );

// [p_end]
function htmlsc_p_end_shortcode( $atts ) {	return htmlsc_CloseTag('p'); }
add_shortcode( 'p_end', 'htmlsc_p_end_shortcode' );

// ************ SPAN ************
// [span foo="foo-value"]
function htmlsc_span_shortcode( $atts ) {	return htmlsc_OpenTag('span',$atts); }
add_shortcode( 'span', 'htmlsc_span_shortcode' );

// [span_end]
function htmlsc_span_end_shortcode( $atts ) {	return htmlsc_CloseTag('span'); }
add_shortcode( 'span_end', 'htmlsc_span_end_shortcode' );

// ************ IFRAME ************
// [iframe foo="foo-value"]
function htmlsc_iframe_shortcode( $atts ) {   return htmlsc_OpenTag('iframe',$atts); }
add_shortcode( 'iframe', 'htmlsc_iframe_shortcode' );

// [iframe_end]
function htmlsc_iframe_end_shortcode( $atts ) {   return htmlsc_CloseTag('iframe'); }
add_shortcode( 'iframe_end', 'htmlsc_iframe_end_shortcode' );



// ************ FUNCTIONS ************
function htmlsc_OpenTag($tagName, $atts) {
	$output_atts = '';
    foreach($atts as $key=>$value) {
    	$output_atts .= ' ' . $key . '="' . $value . '"';
    }
    return '<' . $tagName . $output_atts . '>';
}

function htmlsc_CloseTag($tagName) {
	return '</' . $tagName . '>';
}

function htmlsc_SimpleTag($tagName, $atts) {
	$output_atts = '';
    foreach($atts as $key=>$value) {
    	$output_atts .= ' ' . $key . '="' . $value . '"';
    }
    return '<' . $tagName . $output_atts . ' \>';
}