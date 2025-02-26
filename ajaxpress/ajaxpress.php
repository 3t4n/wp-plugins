<?php

/**
 * Plugin Name:       AjaxPress
 * Plugin URI:        https://github.com/imjafran/AjaxPress
 * Description:       Transform your WordPress site into a single-page application. Dive into content without reloading. Enjoy seamless navigation, real-time searches, comments, and more.
 * Version:           1.3.1
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Author:            Jafran Hasan
 * Author URI:        https://github.com/iamjafran
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ajaxpress
 *
 * @package           AjaxPress
 **/


// Defining root of the plugin.
defined('ABSPATH') || die('Direct Script not Allowed');

if ( defined('AJAXPRESS_VERSION') ) {
	return;
}

define( 'AJAXPRESS_VERSION', '1.3.1' );

define('AJAXPRESS_FILE', __FILE__);

require_once __DIR__ . '/includes/class-boot.php';
