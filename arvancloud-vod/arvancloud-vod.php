<?php

/**
 * @package   ArvanCloud_VOD
 * @author    Khorshid, ArvanCloud <info@khorshidlab.com>
 * @license   GPL-3.0+
 * @link      https://www.arvancloud.ir/en/products/video-platform
 *
 * Plugin Name:     ArvanCloud VOD
 * Plugin URI:      https://www.arvancloud.ir/fa/products/video-platform
 * Description:     ArvanCloud Video Platform allows users to publish, store and convert their video content without worrying about the required infrastructure.
 * Version:         1.0.1
 * Author:          ArvanCloud
 * Author URI:      https://www.arvancloud.ir/en/products/video-platform
 * Text Domain:     arvancloud-vod
 * License:         GPL-3.0+
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:     /languages
 * Requires PHP:    7.0
 */
use WP_Arvan\Engine\Setup;
// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	die( 'We\'re sorry, but you can not directly access this file.' );
}

define( 'ACVOD_VERSION', '1.0.1' );
define( 'ACVOD_TEXTDOMAIN', 'arvancloud-vod' );
define( 'ACVOD_NAME', 'ArvanCloud VOD' );
define( 'ACVOD_PLUGIN_ROOT', plugin_dir_path( __FILE__ ) );
define( 'ACVOD_PLUGIN_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'ACVOD_PLUGIN_ABSOLUTE', __FILE__ );
define( 'ACVOD_MIN_PHP_VERSION', '7.0' );
define( 'ACVOD_WP_VERSION', '5.3' );

add_action(
	'init',
	static function () {
		load_plugin_textdomain( ACVOD_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	);

if ( version_compare( PHP_VERSION, ACVOD_MIN_PHP_VERSION, '<=' ) ) {
	add_action(
		'admin_init',
		static function() {
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}
	);
	add_action(
		'admin_notices',
		static function() {
			echo wp_kses_post(
				sprintf(
					'<div class="notice notice-error"><p>%s</p></div>',
					__( '"ArvanCloud VOD" requires PHP 5.6 or newer.', 'arvancloud-vod' )
				)
			);
		}
	);

	// Return early to prevent loading the plugin.
	return;
}

require_once(ACVOD_PLUGIN_ROOT . 'vendor/autoload.php');
require_once(ACVOD_PLUGIN_ROOT . 'inc/API/VOD/video_tags.php');
require_once(ACVOD_PLUGIN_ROOT . 'inc/VOD/Assets/Video_Hooks.php');
require_once(ACVOD_PLUGIN_ROOT . 'inc/ajax.php');
require_once(ACVOD_PLUGIN_ROOT . 'inc/short_stream.php');
require_once(ACVOD_PLUGIN_ROOT . 'inc/short_vid_list.php');
require ACVOD_PLUGIN_ROOT . 'vendor/woocommerce/action-scheduler/action-scheduler.php';
define( 'ACVOD_PLUGIN_STATUS', Setup::is_plugin_has_selected_channel() );
(new Setup())->run();
new Video_Hooks();

