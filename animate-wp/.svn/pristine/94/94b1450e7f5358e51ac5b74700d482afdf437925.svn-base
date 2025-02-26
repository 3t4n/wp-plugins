<?php
/*
Plugin Name:  Animate WP
Description: Easily animate your elements by just adding a class! We use animate.css. 104 unique animations just using Pure CSS!
Author: Softcarewebs
Version: 0.0.1
Author URI: https://softcarewebs.com/
License: GPLv2 or later
Text Domain: Animate-WP
*/


require_once plugin_dir_path(__FILE__) . 'includes/awp-functions.php';


// wp_register_style() 
wp_register_style(
    'animate-wp', // handle name
	plugins_url( 'includes/animate-wp.css', __FILE__), // the URL of the stylesheet
    '4.1.1', // version number
    'screen' // CSS media type
);


// load css into the website's front-end
function animate_wp_theme_enqueue_style() {
    wp_enqueue_style( 'animate-wp', get_stylesheet_uri() ); 
}

add_action( 'wp_enqueue_scripts', 'animate_wp_theme_enqueue_style' );