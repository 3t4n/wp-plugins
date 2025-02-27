<?php
/**
 * Plugin Name: Chart Block
 * Description: Represent your data by symbols, such as bars, lines, or pie charts.
 * Version: 1.1.6
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: chart-block
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'BCHART_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.1.6' );
define( 'BCHART_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'BCHART_DIR_PATH', plugin_dir_path( __FILE__ ) );

require_once BCHART_DIR_PATH . 'inc/block.php';