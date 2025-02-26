<?php
/**
 * Plugin Name: HT Blocks
 * Plugin URI: https:demo.wphash.com/htblocks
 * Description: Custom Blocks for gutenberg
 * Version: 1.0.0
 * Author:   HT Plugins
 * Author URI:  https://htplugins.com/
 * Text Domain: htblocks
 * License:  GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define ('HTBLOCKS_PLG_DIR', plugin_dir_path(__FILE__ ), '');
define ('HTBLOCKS_PLG_URI', plugins_url( '/', __FILE__ ));

/**
 * Block Initializer.
 */
require_once HTBLOCKS_PLG_DIR . 'src/init.php';
