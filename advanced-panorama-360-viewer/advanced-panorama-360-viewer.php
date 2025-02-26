<?php
/**
 * Plugin Name: Advanced Panorama 360 Viewer
 * Plugin URI: https://wpshopifyexpert.com/advanced-panorama-360-viewer
 * Description: A powerful 360 panorama viewer with Gutenberg block and Elementor addon support.
 * Version: 1.0.0
 * Author: WP Shopify Expert
 * Author URI: https://wpshopifyexpert.com
 * Text Domain: advanced-panorama-360-viewer
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Composer autoloader
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('AP360V_VERSION', '1.0.0');
define('AP360V_PATH', plugin_dir_path(__FILE__));
define('AP360V_URL', plugin_dir_url(__FILE__));

// Begins execution of the plugin
function ap360v_run() {
    $plugin = new AP360V\AP360V();
    $plugin->run();
}
ap360v_run();