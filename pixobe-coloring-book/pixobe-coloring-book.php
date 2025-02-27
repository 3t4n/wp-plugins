<?php

/**
 * Plugin Name:     	Pixobe Coloring Book
 * Plugin URI:      	https://wordpress.org/plugins/pixobe-coloring-book/
 * Description:     	Online coloring plugin for WordPress.
 * Version:         	7.0.18
 * Author:          	Pixobe
 * Author URI:      	https://pixobe.com/
 * Text Domain:     	pixobe-coloring-book
 * Domain Path: 		/languages/
 * Requires at least: 	5.6
 * Tested up to: 		6.6
 * License:         	GNU AGPL v3.0 (http://www.gnu.org/licenses/agpl.txt)
 *
 * @package         	PixobeColoringBook
 * @author          	Pixobe <email@pixobe.com>
 * @copyright       	Copyright (c) Pixobe
 */

// if this file is called directly, abort.
if (!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly

define('PIXOBE_COLORING_BOOK_VERSION', '7.0.18');
define('PIXOBE_COLORING_BOOK_PLUGIN_PATH', __FILE__);

require_once trailingslashit(dirname(__FILE__)) . 'plugin/constants.php';

$config = trailingslashit(dirname(__FILE__)) . 'config.php';
// if exists include
if (file_exists($config)) {
	include_once $config;
}

require_once trailingslashit(dirname(__FILE__)) . 'plugin/backend-utils.php';
require_once trailingslashit(dirname(__FILE__)) . 'plugin/admin.php';
require_once trailingslashit(dirname(__FILE__)) . 'plugin/shortcode.php';
require_once trailingslashit(dirname(__FILE__)) . 'plugin/gallery.php';

// Hook the activation function into the plugin activation hook
register_activation_hook(__FILE__, 'pixobe_colorgizer_activate');
register_deactivation_hook(__FILE__, 'pixobe_colorgizer_deactivation');
