<?php
/*
Plugin Name:	F70 Simple Table of Contents
Plugin URI:	https://factory70.com/simple-table-of-contents/
Description:	Display a table of contents in your posts by automatically generated from the headings. No Javascript code, simple to use.
Version:	1.2.3
Author:	Nao Matsuo
Author URI:	https://factory70.com
License:	GPL v2 or later
License URI:	https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:	f70-simple-table-of-contents
*/


if ( !function_exists( 'add_action' ) ) {
	//echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'F70_STOC__PLUGIN_NAME', plugin_basename( plugin_dir_path( __FILE__ ) ));
define( 'F70_STOC__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'F70_STOC__PLUGIN_URL', plugins_url( '/', __FILE__) );

require_once( F70_STOC__PLUGIN_DIR . 'includes/meta_box.php' );
require_once( F70_STOC__PLUGIN_DIR . 'includes/display.php' );

function f70stoc_call_metabox() {
	new f70StocMetaBox();
}

if ( is_admin() ) {
	add_action( 'load-post.php', 'f70stoc_call_metabox' );
	add_action( 'load-post-new.php', 'f70stoc_call_metabox' );
}

function f70stoc_display_toc( $content ) {
	if ( is_singular() && in_the_loop() && is_main_query() ) {
		$disp = new f70StocDisplay( $content );
		return $disp->content();
	}
	return $content;
}
add_filter( 'the_content', 'f70stoc_display_toc' );



function f70stoc_enqueue_style() {
	wp_enqueue_style( 'f70stoc', F70_STOC__PLUGIN_URL . 'css/style.css' );
}

add_action( 'wp_enqueue_scripts', 'f70stoc_enqueue_style' );


function f70stoc_admin_styles() {
	wp_enqueue_style( 'f70stoc-admin', F70_STOC__PLUGIN_URL . 'css/admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'f70stoc_admin_styles' );
