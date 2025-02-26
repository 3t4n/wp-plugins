<?php
/**
 * Plugin Name: ACF Ajax Grid Gallery
 * Plugin URI: https://wordpress.org/plugins/acf-ajax-grid-gallery/
 * Description: An extension for Advance Custom Fields Pro which lets you add multiple grid gallery with lightbox and ajax loadmore setting.
 * Version: 1.3.6
 * Author: Jayson Garcia (Github - hallowichig0)
 * Author URI: http://jegson.herokuapp.com
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

define( 'AAGG__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AAGG__PLUGIN_URL', plugin_dir_url( __FILE__ ) );

function acf_ajax_grid_gallery(){

    require_once (AAGG__PLUGIN_DIR . '/inc/custom_fields.php');
    require_once (AAGG__PLUGIN_DIR . '/inc/shortcode.php');

}
add_action('init', 'acf_ajax_grid_gallery');

function acf_ajax_grid_gallery_enqueue() {

    // styles
    wp_enqueue_style( 'venobox-style', AAGG__PLUGIN_URL . 'assets/venobox/venobox.css' );
    wp_enqueue_style( 'aagg-style', AAGG__PLUGIN_URL . 'acf_ajax_grid_gallery.css' );

    // scripts
    wp_enqueue_script( 'venobox-script', AAGG__PLUGIN_URL . 'assets/venobox/venobox.min.js','','',true  );
    wp_enqueue_script( 'infinite-scroll-js', AAGG__PLUGIN_URL . 'assets/infinite-scroll/infinite-scroll.pkgd.min.js','','',true );
    wp_enqueue_script( 'aagg-js', AAGG__PLUGIN_URL . 'js/acf_ajax_grid_gallery.js','','',true );

}
add_action( 'wp_enqueue_scripts', 'acf_ajax_grid_gallery_enqueue' );