<?php
/**
 * Plugin Name: Access Gyrojob SEO
 * Plugin URI:        https://plugin.gyrojob.com/gyrojob-seo.php
 * Description:       SEO, Organic seo, Image seo, Video seo, web promotion, Google seo with META titles, descriptions tag. optimizes your blog for Search Engines (Search Engine Optimization).
 * Version:           1.3.26
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            gyrojob
 * Author URI:        https://plugin.gyrojob.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 007-gyrojob-seo
 */

// Prevent direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}










define( 'GYROJOB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GYROJOB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once GYROJOB_PLUGIN_DIR . 'inc/class/gyrojob-class-home.php';
if ( ! function_exists( 'Gyrojob_SEO_Meta_Home_Description' ) ) {
new Gyrojob_SEO_Meta_Home_Description();
}















