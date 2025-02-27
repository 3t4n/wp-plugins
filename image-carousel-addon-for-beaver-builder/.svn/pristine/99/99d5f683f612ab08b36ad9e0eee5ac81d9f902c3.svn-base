<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://deryckoe.com/image-carousel-addon-for-beaver-builder
 * @since             1.0.0
 * @package           Image_Carousel_Addon_For_Beaver_Builder
 *
 * @wordpress-plugin
 * Plugin Name:       Image Carousel Addon for Beaver Builder
 * Plugin URI:        http://deryckoe.com/image-carousel-addon-for-beaver-builder
 * Description:       A quick and easy responsive image carousel module for Beaver Builder.
 * Version:           1.0.1
 * Author:            Deryck Oñate
 * Author URI:        http://deryckoe.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bb-image-carousel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'BB_IMAGE_CAROUSEL_VERSION', '1.0.1' );


/**
 * Plugin paths
 */
define( 'BB_IMAGE_CAROUSEL_DIR', plugin_dir_path( __FILE__ ) );
define( 'BB_IMAGE_CAROUSEL_URL', plugins_url( '/', __FILE__ ) );
define( 'BB_IMAGE_CAROUSEL_LANGUAGES_DIR', basename( dirname( __FILE__ ) ) );

/**
 * Require loader file
 */
require_once BB_IMAGE_CAROUSEL_DIR . 'classes/class-bb-image-carousel-loader.php';