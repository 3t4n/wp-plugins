<?php
/**
 * Plugin Name:       Disable Browser Telephone Format Detection
 * Plugin URI:        https://wordpress.org/plugins/disable-telephone-format-detection-meta-tag/
 * Description:       Adds a meta tag to your site head which prevents certain browsers from auto detecting phone numbers and adding links and styling to them.
 * Version:           1.1
 * Requires at least: 6.3
 * Requires PHP:      7.0
 * Author:            WPExplorer
 * Author URI:        https://www.wpexplorer.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       disable-browser-telephone-format-dection
 * Domain Path:       /languages/
 */

/*
Disable Browser Telephone Format Detection is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Disable Browser Telephone Format Detection is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Disable Browser Telephone Format Detection. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function _disable_browser_telephone_format_detection() {
	echo '<meta name="format-detection" content="telephone=no">';
}
add_action( 'wp_head', '_disable_browser_telephone_format_detection' );
