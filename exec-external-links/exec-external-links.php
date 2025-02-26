<?php
/*
Plugin Name: Exec External Links
Plugin URI: http://executionists.com
Description: Opens external links in a new tab
Author: Executionists
Author URI: http://executionists.com/
Version: 1.0.0
Text Domain: eel
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

function eel_scripts() {
	// Core style
	wp_enqueue_script( 'eel-script',plugin_dir_url( __FILE__ ) . '/exec-external-links.js' ,array('jquery'),'',true );
}
add_action( 'wp_enqueue_scripts', 'eel_scripts' );