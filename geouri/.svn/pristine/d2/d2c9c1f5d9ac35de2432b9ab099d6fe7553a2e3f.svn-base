<?php
/*
   Plugin Name: geoURI
   Plugin URI: http://simon.schllng.de/2013/08/14/geouri-wordpress-plugin/?lang=en
   Description: Handler for geo location URIs.
   Version: 0.3.1
   Author: Simon Schilling
   Author URI: simon.schllng.de
   License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*-------------------- Adds needed stylesheets and Js  --------------------*/

add_action( 'wp_enqueue_scripts', 'geouri_stylesheet_js' );

function geouri_stylesheet_js() {
	wp_register_style( 'geouri-css', plugins_url('geouri.css', __FILE__) );
	wp_enqueue_style( 'geouri-css' );
	wp_register_script( 'geouri-js', plugins_url('geouri.js', __FILE__), 'jquery', null, true );
	wp_enqueue_script( 'geouri-js' );
}


