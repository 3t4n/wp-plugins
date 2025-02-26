<?php
/**
 * Plugin Name: Section Collection
 * Description: A call to action block collection plugin, newer section will come near future soon.
 * Version: 1.0.0
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: section-collection
 */
 
// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'BPSC_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.0.0' );
define( 'BPSC_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'BPSC_DIR_PATH', plugin_dir_path( __FILE__ ) );

require_once BPSC_DIR_PATH . 'inc/block.php';