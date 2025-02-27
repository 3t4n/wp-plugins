<?php 

	/*
	Plugin Name: Smooth Accordion
	Description: Easy and smooth accordion plugin. You can easily insart/include accordion in your WordPress post or page.
	Plugin URI: https://wordpress.org/plugins/smooth-accordion/
	Author: Zakir Hossain
	Author URI: http://zakirinfo.com
	Version: 2.1
	License: GPL2
	*/
	
	/*
	
	    Copyright (C) 2014  zakird46@gmail.com
	
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
	
/***********************************************************************************************/
/* Define Constant */
/***********************************************************************************************/
define('SMOOTH_ACCORDION_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );






/***********************************************************************************************/
/* Adding jQuery */
/***********************************************************************************************/
/**
 * Enqueue scripts
 *
 * @param string $handle Script name
 * @param string $src Script url
 * @param array $deps (optional) Array of script names on which this script depends
 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
 */

function smooth_accordion_jquery_include() {

	wp_enqueue_style('smooth-accordion-main-css', SMOOTH_ACCORDION_PLUGIN_PATH.'assets/css/smoothAccordion.css');

	wp_enqueue_script('jquery');

	wp_enqueue_script('smooth-accordion-orginal-jquery', SMOOTH_ACCORDION_PLUGIN_PATH.'assets/js/smoothaccordion.js', array('jquery') , 1.1, true);
	wp_enqueue_script('smooth-accordion-main-jquery', SMOOTH_ACCORDION_PLUGIN_PATH.'assets/js/smoothScript.js', array('jquery') , 1.1, true);
}

add_action('wp_enqueue_scripts', 'smooth_accordion_jquery_include');

 


/***********************************************************************************************/
/* Active Shortcode */
/***********************************************************************************************/
/* Generates Toggles Shortcode */
function smooth_accordion_warp($atts, $content = null) {

	extract(shortcode_atts(array(
        'color'      => ''
    ), $atts));


	return ('<div data-smooth="accordion" class="' . $color . '">'.do_shortcode($content).'</div>');
}
add_shortcode ("sawarp", "smooth_accordion_warp");

function smooth_accordion_warp_content($atts, $content = null) {
	extract(shortcode_atts(array(
        'title'      => ''
    ), $atts));
	
	return ('<div role="header">' . $title . '</div><div role="content">' . $content . '</div>');
}
add_shortcode ("sawcon", "smooth_accordion_warp_content");





/***********************************************************************************************/
/* Shortcode Button */
/***********************************************************************************************/

function smooth_accordion_shortcode_button() {
	add_filter ("mce_external_plugins", "smooth_accordion_shortcode_button_script");
	add_filter ("mce_buttons", "smacshortbtn");
}

function smooth_accordion_shortcode_button_script($plugin_array) {
	$plugin_array['wpSmoothAC'] = plugins_url('assets/js/smoothBTN.js', __FILE__);
	return $plugin_array;
}

function smacshortbtn($buttons) {
	array_push ($buttons, 'smabutton');
	return $buttons;
}
add_action ('init', 'smooth_accordion_shortcode_button'); 


























?>