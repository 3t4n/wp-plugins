<?php
/**
 * Osom Blocks - Gutenberg Blocks Collection
 *
 * @package     osom\osom_blocks
 * @author      osompress
 * @license     GPL2+
 *
 * @wordpress-plugin
 * Plugin Name: Osom Blocks
 * Plugin URI:  https://osompress.com
 * Description: Gutenberg Block collection for OsomPress themes
 * Version:     1.2.1
 * Author:      OsomPress
 * Author URI:  https://twitter.com/osompress
 * Text Domain: osomblocks
 * Domain Path: /languages
 * License:     GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace osom\Osom_Blocks;

//  Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Gets this plugin's absolute directory path.
 *
 * @since  2.1.0
 * @ignore
 * @access private
 *
 * @return string
 */
function _get_plugin_directory() {
	return __DIR__;
}

/**
 * Gets this plugin's URL.
 *
 * @since  2.1.0
 * @ignore
 * @access private
 *
 * @return string
 */
function _get_plugin_url() {
	static $plugin_url;

	if ( empty( $plugin_url ) ) {
		$plugin_url = plugins_url( null, __FILE__ );
	}

	return $plugin_url;
}

// Enqueue JS and CSS
require __DIR__ . '/lib/enqueue-scripts.php';

// Register meta boxes
require __DIR__ . '/lib/meta-boxes.php';

// Dynamic Blocks
require __DIR__ . '/blocks/cpt-list/index.php';
