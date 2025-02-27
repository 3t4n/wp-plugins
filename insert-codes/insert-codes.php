<?php
/**
 * Plugin Name:       Insert Codes - The Code Snippets Manager for WordPress
 * Plugin URI:        https://urldev.com/plugins/insert-codes/
 * Description:       The "Insert Codes - The Code Snippets Manager for WordPress" plugin allows you to easily manage custom code snippets and add custom code to the header, body, and footer sections of your WordPress website.
 * Version:           1.4.0
 * Requires at least: 5.0
 * Requires PHP:      7.4
 * Author:            UrlDev
 * Author URI:        https://urldev.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       insert-codes
 * Domain Path:       /languages
 * Tested up to:      6.7
 *
 * @package InsertCodes
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

use InsertCodes\Plugin;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

// Autoload classes.
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Get the plugin instance.
 *
 * @since 1.0.0
 * @return Plugin plugin initialize class.
 */
function insertcodes() {
	return Plugin::create( __FILE__, '1.4.0' );
}

// Initialize the plugin.
insertcodes();
