<?php
/**
 * Plugin Name: AceBlocks
 * Plugin URI: https://wordpress.org/plugins/aceblocks
 * Description: Essential Blocks for WordPress 5
 * Author: Dave Kiss, Bradley Elliott
 * Author URI: https://davekiss.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package AceBlocks
 */

define( 'ACEBLOCKS_URL',  plugin_dir_url( __FILE__ ) );
define( 'ACEBLOCKS_PATH', plugin_dir_path( __FILE__ ) );
define( 'ACEBLOCKS_BASENAME', plugin_basename( __FILE__ ) );
define( 'ACEBLOCKS_VERSION', '1.0.0');
define( 'ACEBLOCKS_CURRENT_PAGE', basename($_SERVER['PHP_SELF']));

/**
 * Block Initializer.
 */
require_once ACEBLOCKS_PATH . 'lib/scripts.php';
new AceBlocks\Scripts;
