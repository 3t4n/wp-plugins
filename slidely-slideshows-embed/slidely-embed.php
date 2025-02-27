<?php
/*
Plugin Name: Slidely Slideshows Embed
Plugin URI:  http://slide.ly/
Description: Easily embed photos and music slideshows from Slide.ly into your WordPress site.
Version:     3.1
Author:      Slidely
Author URI:  https://profiles.wordpress.org/slidely/
Text Domain: slidely-slideshows-embed
*/



/**
 * Security check
 * Prevent direct access to the file.
 *
 * @since 2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Include plugin files
 */
include_once ( plugin_dir_path( __FILE__ ) . 'includes/i18n.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'includes/oembed.php' );
include_once ( plugin_dir_path( __FILE__ ) . 'includes/shortcode.php' );
