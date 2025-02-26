<?php
/**
 * Plugin Name: App Mockups Carousel
 * Plugin URI:
 * Description: Plugin create custom post type – App Mock-ups Carousel, add multiple images and settings. Show your work in high resolution, responsive device mock-up using only shortcodes. Also work with Gutenberg shortcode block.   
 * Author: Anoop Ranawat
 * Text Domain: app-mockups-carousel
 * Domain Path: /languages/
 * Version: 1.2.1
 * Author URI: 
 *
 * @package WordPress
 * @author Anoop Ranawat
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if( !defined( 'WP_AMC_VERSION' ) ) {
	define( 'WP_AMC_VERSION', '1.2.1' ); // Version of plugin
}
if( !defined( 'WP_AMC_DIR' ) ) {
    define( 'WP_AMC_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'WP_AMC_URL' ) ) {
    define( 'WP_AMC_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'WP_AMC_POST_TYPE' ) ) {
    define( 'WP_AMC_POST_TYPE', 'wp_amc_gallery' ); // Plugin post type
}
if( !defined( 'WP_AMC_META_PREFIX' ) ) {
    define( 'WP_AMC_META_PREFIX', '_wp_amc_' ); // Plugin metabox prefix
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */
function wp_amc_load_textdomain() {
	load_plugin_textdomain( 'app-mockups-carousel', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('plugins_loaded', 'wp_amc_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wp_amc_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wp_amc_uninstall');

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * set default values for the plugin options.
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */
function wp_amc_install() {
    
    // Register post type function
    wp_amc_register_post_type();

    // IMP need to flush rules for custom registered post type
    flush_rewrite_rules();
}

/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @package App Mockups Carousel
 * @since 1.0.0
 */
function wp_amc_uninstall() {
    
    // IMP need to flush rules for custom registered post type
    flush_rewrite_rules();
}

// Functions File
require_once( WP_AMC_DIR . '/includes/wp-amc-functions.php' );

// Plugin Post Type File
require_once( WP_AMC_DIR . '/includes/wp-amc-post-types.php' );

// Script File
require_once( WP_AMC_DIR . '/includes/class-wp-amc-script.php' );

// Admin Class File
require_once( WP_AMC_DIR . '/includes/admin/class-wp-amc-admin.php' );

// Shortcode File
require_once( WP_AMC_DIR . '/includes/shortcode/wp-amc-gallery-carousel.php' );