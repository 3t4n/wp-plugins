<?php
/*
Plugin Name: AJAXify FAQ-Tastic
Plugin URI: http://sivel.net/wordpress/
Description: Used to add open close effects to the FAQ-Tastic WordPress plugin.
Version: 1.5
Author: Matt Martz
Author URI: http://sivel.net

	Copyright (c) 2008 Matt Martz (http://sivel.net)
	AJAXify FAQ-Tastic is released under the GNU General Public License (GPL)
	http://www.gnu.org/licenses/gpl-2.0.txt
*/

/* No Need To Modify Anything Below This Line */
// Pre-2.6 compatibility
if ( !defined('WP_CONTENT_URL') )
	define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
// Guess the location
$aftPluginUrl = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));

function ajaxify_faqtastic_styles() {
	global $aftPluginUrl;
	wp_enqueue_style('ajaxify-faqtastic-css', $aftPluginUrl . '/css/ajaxify-faqtastic.css', false, '1.5', 'screen');

}

function ajaxify_faqtastic_scripts() {
	global $aftPluginUrl;
	wp_enqueue_script('ajaxify-faqtastic', $aftPluginUrl  . '/js/ajaxify-faqtastic.js', array('jquery'), '1.5', true);
	if ( ! did_action ( 'wp_print_styles' ) )
		wp_print_styles ();
}

add_action('wp_head', 'ajaxify_faqtastic_styles', 7);
add_action('wp_head', 'ajaxify_faqtastic_scripts', 8);
?>
