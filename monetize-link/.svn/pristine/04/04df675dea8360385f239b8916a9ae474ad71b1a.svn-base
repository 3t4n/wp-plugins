<?php
/**
* Plugin Name: Takeads
* Description: The Takeads WordPress plugin is an excellent tool for publishers looking to monetize their platforms quickly and easily.
* Plugin URI:  https://monetize.admitad.com/en/monetizelink/
* Author URI:  https://takeads.com/
* Author:      TakeAds
* Version:     1.0.13
* Text Domain: monetize-link
* Domain Path: /languages
*/

namespace MonetizeLinkPlugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Path to the plugin dir.
 */
define( 'MLP_PLUGIN_PATH', __DIR__ );

/**
 * Plugin dir url.
 */
define( 'MLP_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Plugin file
 */
define( 'MLP_PLUGIN_FILE', basename( __DIR__ ) . '/' . basename( __FILE__ ) );

/**
 * Plugin file
 */
define( 'MLP_PLUGIN_FOLDER', untrailingslashit( basename( __DIR__ ) ) );

/**
 * Init plugin on plugin load.
 */
require_once constant( 'MLP_PLUGIN_PATH' ) . '/vendor/autoload.php';
require_once constant( 'MLP_PLUGIN_PATH' ) . '/utils.php';

__( 'Admitad plugins Title', 'monetize-link' );
__( 'Admitad plugins Description', 'monetize-link' );

MLP_Base::plugin_init();
