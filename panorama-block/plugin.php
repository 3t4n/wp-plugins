<?php
/**
 * Plugin Name: Panorama Block - Lightweight 360 Degree panorama viewer
 * Description: Show your story or Memories on the web.
 * Version: 1.0.5
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: panorama-block
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'BPGB_VERSION', 'localhost' === $_SERVER[ 'HTTP_HOST' ] ? time() : '1.0.5' );
define( 'BPGB_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'BPGB_DIR_PATH', plugin_dir_path( __FILE__ ) );

require_once BPGB_DIR_PATH . 'inc/block.php';