<?php
/*
Plugin Name: Custom 2012 Header
Description: Defines and implements a custom header within your Twenty Twelve Child Theme
Version: 0.1
License: GPLv2 or later
Author: paulwp (code) & leejosepho (plugin)
Author URI: http://wordpress.org/support/topic/setting-default-header-image-in-child-theme?replies=12
Note: "custom-head1000.png" must first actually reside within an "images" folder inside your Twenty Twelve Child Theme folder */
// action: first remove a default action from Twenty Twelve
remove_action( 'after_setup_theme', 'twentytwelve_custom_header_setup' );
// action: next define new $args
function nny_custom_header_setup() {
	$args = array(
	// Change color for site name and tagline below (or empty to use none)
	// change "custom-head1000.png" to any name of your own choosing (as long as a file with your new name is in your "iamges" folder)
	// Change header image height and width to match your own custom header image
'default-text-color'     => '444',
		'default-image'          => get_stylesheet_directory_uri() . '/images/custom-head1000.png',
	// Set height and width, with a maximum value for the width.
		'height'                 => 250, // enter your own desired height here
		'width'                  => 1000, // enter your own desired width here
		'max-width'              => 2000,
	// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,
	// Random image rotation off by default.
		'random-default'         => false,
	// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'twentytwelve_header_style',
		'admin-head-callback'    => 'twentytwelve_admin_header_style',
		'admin-preview-callback' => 'twentytwelve_admin_header_image',
	);
	add_theme_support( 'custom-header', $args );
}
// action: now add it the same way Twenty Twelve does
	add_action( 'after_setup_theme', 'nny_custom_header_setup' );
//
?>