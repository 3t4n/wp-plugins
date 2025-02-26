<?php
defined('ABSPATH') or die("No script kiddies please!");
/*
Plugin Name: mcjh annotation
Plugin URI: https://www.mcjh-medien.de/annotation-plugin/
Description: [info]...[/info] || [pin]...[/pin] || [note]...[/note] || [quote]...[/quote]
Version: 1.0
Author: Marcus C. J. Hartmann
Author URI: http://www.mcjh-medien.de/
License: GPLv2

Copyright 2017  Marcus C. J. Hartmann  (email : info@mcjh-medien.de)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*--------------------------------- Add CSS to head section ----------------------------------*/
function mcjh_annotation_enqueue_scripts()
{
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'mcjh-annotation', plugins_url('mcjh-annotation.css',__FILE__));
}	
add_action( 'wp_enqueue_scripts', 'mcjh_annotation_enqueue_scripts' );
/*--------------------------------- Add CSS to admin ----------------------------------*/

/*
 * @since 1.0.0
 */
/*--------------------------------- Remove p br filter ----------------------------------*/
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );

/*--------------------------------- Shortcode----------------------------------*/
function mcjh_infobox_shortcode( $atts, $content = null ) {
	
	$atts = array_change_key_case((array)$atts, CASE_LOWER);
 
	extract(shortcode_atts(array(
      'showicon' => 'true'
   ), $atts));
	
	$padding="";
	$output="";
	$output.='<div class="mcjh-annotation-box mcjh-annotation-info-box">'.PHP_EOL;
	if($showicon=="true"){
	$padding="mcjh-annotation-icon-space";
	$output.='<span class="mcjh-annotation-icon mcjh-annotation-icon-info"></span>'.PHP_EOL;
	}
	$output.='<div class="mcjh-annotation-content '.$padding.'">' .  do_shortcode($content) . '</div>';
	$output.='</div>';
    return $output;
		
}
add_shortcode( 'info', 'mcjh_infobox_shortcode' );

function mcjh_pinbox_shortcode( $atts, $content = null ) {
		
	$atts = array_change_key_case((array)$atts, CASE_LOWER);
 
	extract(shortcode_atts(array(
      'showicon' => 'true'
   ), $atts));
	
	$padding="";
	$output="";
	$output.='<div class="mcjh-annotation-box mcjh-annotation-pin-box">'.PHP_EOL;
	if($showicon=="true"){
	$padding="mcjh-annotation-icon-space";
	$output.='<span class="mcjh-annotation-icon mcjh-annotation-icon-pin"></span>'.PHP_EOL;
	}
	$output.='<div class="mcjh-annotation-content '.$padding.'">' .  do_shortcode($content) . '</div>';
	$output.='</div>';
    return $output;
}
add_shortcode( 'pin', 'mcjh_pinbox_shortcode' );

function mcjh_notebox_shortcode( $atts, $content = null ) {
		
	$atts = array_change_key_case((array)$atts, CASE_LOWER);
 
	extract(shortcode_atts(array(
      'showicon' => 'true'
   ), $atts));
	
	$padding="";
	$output="";
	$output.='<div class="mcjh-annotation-box mcjh-annotation-note-box">'.PHP_EOL;
	if($showicon=="true"){
	$padding="mcjh-annotation-icon-space";
	$output.='<span class="mcjh-annotation-icon mcjh-annotation-icon-note"></span>'.PHP_EOL;
	}
	$output.='<div class="mcjh-annotation-content '.$padding.'">' .  do_shortcode($content) . '</div>';
	$output.='</div>';
    return $output;
}
add_shortcode( 'note', 'mcjh_notebox_shortcode' );

function mcjh_quotebox_shortcode( $atts, $content = null ) {
		
	$atts = array_change_key_case((array)$atts, CASE_LOWER);
 
	extract(shortcode_atts(array(
      'showicon' => 'true'
   ), $atts));
	
	$padding="";
	$output="";
	$output.='<div class="mcjh-annotation-box mcjh-annotation-quote-box">'.PHP_EOL;
	if($showicon=="true"){
	$padding="mcjh-annotation-icon-space";
	$output.='<span class="mcjh-annotation-icon mcjh-annotation-icon-quote"></span>'.PHP_EOL;
	}
	$output.='<div class="mcjh-annotation-content '.$padding.'">' .  do_shortcode($content) . '</div>';
	$output.='</div>';
    return $output;
}
add_shortcode( 'quote', 'mcjh_quotebox_shortcode' );


function mcjh_dangerbox_shortcode( $atts, $content = null ) {
		
	$atts = array_change_key_case((array)$atts, CASE_LOWER);
 
	extract(shortcode_atts(array(
      'showicon' => 'true'
   ), $atts));
	
	$padding="";
	$output="";
	$output.='<div class="mcjh-annotation-box mcjh-annotation-danger-box">'.PHP_EOL;
	if($showicon=="true"){
	$padding="mcjh-annotation-icon-space";
	$output.='<span class="mcjh-annotation-icon mcjh-annotation-icon-danger"></span>'.PHP_EOL;
	}
	$output.='<div class="mcjh-annotation-content '.$padding.'">' .  do_shortcode($content) . '</div>';
	$output.='</div>';
    return $output;
}
add_shortcode( 'danger', 'mcjh_dangerbox_shortcode' );