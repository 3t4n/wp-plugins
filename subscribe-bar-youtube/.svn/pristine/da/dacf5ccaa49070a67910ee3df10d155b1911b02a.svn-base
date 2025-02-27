<?php

/**
 * Plugin Name:       YouTube Subscribe Bar
 * Plugin URI:        http://www.wpbeginner.com/
 * Description:       This plugin automatically adds a Subscribe to youtube channel below every embedded YouTube video on your blog
 * Version:           1.1.0
 * Author:            Syed Balkhi
 * Author URI:        http://www.wpbeginner.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       youtube-subscribe-bar
 * Domain Path:       /languages
 * Requires at least: 3.6
 * Requires PHP:      5.6
 */

// Exit if accessed directly.
if ( ! defined( 'WPINC' ) ) {
	exit;
}

define( 'YT_SUB_BAR_PATH', plugin_dir_path( __FILE__ ) );
define( 'YT_SUB_BAR_FILE', __FILE__ );
define( 'YT_SUB_BAR_VERSION', '1.1.0' );

// Include the PHP-FIG PSR-4 Compliant class loader
require __DIR__ . '/vendor/autoload.php';

use YouTubeSubscribeBar\Plugin\YTSubscribeBarPlugin;
use YouTubeSubscribeBar\Plugin\YTSubscribeBarUninstall;

/**
 * Fired when the plugin is uninstalled.
 */
function amysb_uninstall_hook() {
	YTSubscribeBarUninstall::amysb_deactivate( 'youtube-subscribe-bar' );
}
register_uninstall_hook( YT_SUB_BAR_FILE, 'amysb_uninstall_hook' );

// Initialize the plugin
new YTSubscribeBarPlugin( 'YouTube Subscribe Bar', 'youtube-subscribe-bar' );
