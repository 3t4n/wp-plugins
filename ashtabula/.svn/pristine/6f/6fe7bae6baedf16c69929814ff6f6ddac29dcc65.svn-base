<?php

/**
 * Ashtabula - A Swiper Slider Plugin for WordPress
 *
 * @link              https://github.com/marklchaves/ashtabula
 * @since             0.0.1
 * @package           Ashtabula_Swiper_Slider_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Ashtabula
 * Plugin URI:        https://github.com/marklchaves/ashtabula
 * Description:       Allows Swiper.js to work in WordPress.
 * Version:           1.0.0
 * Author:            caught my eye
 * Author URI:        https://www.caughtmyeye.cc
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ashtabula
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'ASHTABULA_PLUGIN_NAME', 'ashtabula' );
define( 'ASHTABULA_PLUGIN_VERSION', '1.0.0' );

/**
 * Enqueue Swiper Stuff
 */

function enqueue_ashtabula_styles()
{
    wp_register_style( ASHTABULA_PLUGIN_NAME . '-swiper', plugin_dir_url( __FILE__ ) . 'includes/css/swiper-bundle.min.css', array(), '6.1.1', 'all' );
 
    wp_enqueue_style( ASHTABULA_PLUGIN_NAME . '-swiper');

    wp_enqueue_style( ASHTABULA_PLUGIN_NAME . '-plugin', plugin_dir_url( __FILE__ ) . 'public/css/' . ASHTABULA_PLUGIN_NAME . '.css', array(), ASHTABULA_PLUGIN_VERSION, 'all' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_ashtabula_styles' );

function enqueue_ashtabula_javascript()
{	
	// Add to footer section.
    wp_register_script( ASHTABULA_PLUGIN_NAME . '-swiper', plugin_dir_url( __FILE__ ) . 'includes/js/swiper-bundle.min.js', array(), '6.1.1', true );
 
    wp_enqueue_script( ASHTABULA_PLUGIN_NAME . '-swiper' );

    wp_register_script( ASHTABULA_PLUGIN_NAME, plugin_dir_url( __FILE__ ) . 'public/js/' . ASHTABULA_PLUGIN_NAME . '.js', '', ASHTABULA_PLUGIN_VERSION, true ); // Put in the footer ~mlc

    wp_enqueue_script( ASHTABULA_PLUGIN_NAME );
}
add_action( 'wp_enqueue_scripts', 'enqueue_ashtabula_javascript' );
