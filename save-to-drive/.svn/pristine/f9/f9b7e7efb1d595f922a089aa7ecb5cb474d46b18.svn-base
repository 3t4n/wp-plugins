<?php
/*
Plugin Name: Save to Drive
Plugin URI: http://wordpress.org/extend/plugins/save-to-drive/
Description: Add a Google Drive save button to your site
Version: 1.1
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

/**
* Save to Drive
*
* Add a Google Drive save button to your site
*
* @package	Save-to-Drive
*/

define( 'save_to_drive_version', '1.1' );

/**
* Plugin initialisation
*
* Loads the plugin's translated strings
*
* @since	1.1
*/

function s2d_plugin_init() {

	$language_dir = plugin_basename( dirname( __FILE__ ) ) . '/languages/';

	load_plugin_textdomain( 'save-to-drive', false, $language_dir );

}

add_action( 'init', 's2d_plugin_init' );

/**
* Add meta to plugin details
*
* Add options to plugin meta line
*
* @since	1.1
*
* @param	string  $links	Current links
* @param	string  $file	File in use
* @return   string			Links, now with settings added
*/

function s2d_set_plugin_meta( $links, $file ) {

	if ( strpos( $file, 'save-to-drive.php' ) !== false ) {

		$links = array_merge( $links, array( '<a href="http://wordpress.org/support/plugin/save-to-drive">' . __( 'Support', 'save-to-drive' ) . '</a>' ) );

		$links = array_merge( $links, array( '<a href="http://www.artiss.co.uk/donate">' . __( 'Donate', 'save-to-drive' ) . '</a>' ) );

	}
	return $links;
}

add_filter( 'plugin_row_meta', 's2d_set_plugin_meta', 10, 2 );

/**
* Save to Drive Function
*
* Function call for generating button
*
* @since	1.0
*
* @uses     generate_save_to_drive_button	Generate button code
*
* @param	string		$url				URL to download file
* @param	string		$filename			Name to save file as (optional)
* @return	string							Code to generate button
*/

function save_to_drive( $url = '', $filename = '' ) {

	return generate_save_to_drive_button( $url, $filename );

}

/**
* Save to Drive Shortcode
*
* Shortcode for generating button
*
* @since	1.0
*
* @uses     generate_save_to_drive_button	Generate button code
*
* @param	string		$paras				Shortcode parameters
* @param	string		$content			Passed content
* @return	string							Code to generate button
*/

function save_to_drive_sc( $paras = '', $content = '' ) {

	// Extract shortcode parameters

	extract( shortcode_atts( array( filename => '', url => '' ), $paras ) );

	// If URL is not specified as a parameter attempt to use the content instead

	if ( $url == '' ) {
		if ( $content == '' ) {
			return '<p style="color: #f00; font-weight: bold;">Save to Drive: ' . __( 'No filename was supplied', 'save-to-drive' ) . "</p>\n";
		} else {
			$url = $content;
		}
	}

	return generate_save_to_drive_button( $url, $filename );
}

add_shortcode( 'savetodrive', 'save_to_drive_sc' );

/**
* Generate Save to Drive button
*
* Generate the code to produce the Save to Drive button
*
* @since	1.0
*
* @param	string		$url				URL to download file
* @param	string		$filename			Name to save file as (optional)
* @return	string							Code to generate button
*/

function generate_save_to_drive_button( $url = '', $filename = '' ) {

	// If no filename attempt to extract it from the URL

	if ( $filename == '' ) {
		$slash_pos = strrpos( $url, '/' );
		if ( !$slash_pos ) {
			$filename = $url;
		} else {
			$filename = substr( $url, $slash_pos + 1 );
		}
	}

	// Once a URL is available, add the appropriate Add to Drive button

	$sitename = get_bloginfo( 'name' );

	$content = "\n" . '<!-- Save to Drive v' . save_to_drive_version . ' -->' . "\n";
	$content .= '<script src="https://apis.google.com/js/plusone.js"></script>' . "\n";
	$content .= '<div class="g-savetodrive" data-filename="' . $filename . '" data-sitename="' . $sitename . '" data-src="' . $url . '"></div>' . "\n";
	$content .= '<!-- ' . __( 'End of Save to Drive code', 'save-to-drive' ) . ' -->' . "\n";

	// Return the content

	return $content;
}
?>