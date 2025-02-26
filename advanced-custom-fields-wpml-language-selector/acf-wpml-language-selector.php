<?php

/*
Plugin Name: Advanced Custom Fields: WPML Language Selector
Plugin URI: https://wordpress.org/plugins/advanced-custom-fields-wpml-language-selector/
Description: Input field with list of available WPML languages used on website.
ACF and WPML plugins needs to be installed on your website also.
Version: 1.2.1
Author: Ivan Paulin
Author URI: http://ivanpaulin.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
load_plugin_textdomain( 'acf-wpml_language_selector', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );


// 2. Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
function include_field_types_wpml_language_selector( $version ) {

	include_once('acf-wpml-language-selector-v5.php');

}

// Include field type for ACF4
function register_field_wpml_language_selector() {

	include_once('acf-wpml-language-selector-v4.php');

}

// Check if WPML plugin is activated before include field
if ( in_array( 'sitepress-multilingual-cms/sitepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    add_action('acf/include_field_types', 'include_field_types_wpml_language_selector');
	add_action('acf/register_fields', 'register_field_wpml_language_selector');
}
