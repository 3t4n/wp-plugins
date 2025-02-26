<?php
/**
 * Plugin Name: Media Library Recovery
 * Plugin URI: https://mediarecoveryplugin.com/
 * Description: A tool to restore and recover images from your `wp-content/uploads` folder after database resets or failures, ensuring your media library is rebuilt quickly.
 * Version: 1.6.3
 * Author: Krasen Slavov
 * Author URI: https://developry.com/
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: wp-media-recovery
 * Domain Path: /lang
 *
 * Copyright (c) 2018 - 2024 Developry Ltd. (email: contact@developry.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
 */

namespace DEVRY\MLR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

define( __NAMESPACE__ . '\MLR_ENV', 'prod' ); // Use prod, dev options.

define( __NAMESPACE__ . '\MLR_MIN_PHP_VERSION', '7.2' );
define( __NAMESPACE__ . '\MLR_MIN_WP_VERSION', '5.0' );

define( __NAMESPACE__ . '\MLR_PLUGIN_UUID', 'mlr' );
define( __NAMESPACE__ . '\MLR_PLUGIN_TEXTDOMAIN', 'wp-media-recovery' );
define( __NAMESPACE__ . '\MLR_PLUGIN_NAME', esc_html__( 'Media Library Recovery', 'wp-media-recovery' ) );
define( __NAMESPACE__ . '\MLR_PLUGIN_VERSION', '1.6.3' );
define( __NAMESPACE__ . '\MLR_PLUGIN_DOMAIN', 'mediarecoveryplugin.com' );
define( __NAMESPACE__ . '\MLR_PLUGIN_DOCS', 'https://mediarecoveryplugin.com/help' );

define( __NAMESPACE__ . '\MLR_PLUGIN_WPORG_SUPPORT', 'https://wordpress.org/support/plugin/wp-media-recovery/#new-topic' );
define( __NAMESPACE__ . '\MLR_PLUGIN_WPORG_RATE', 'https://wordpress.org/support/plugin/wp-media-recovery/reviews/#new-post' );

define( __NAMESPACE__ . '\MLR_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( __NAMESPACE__ . '\MLR_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( __NAMESPACE__ . '\MLR_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

define(
	__NAMESPACE__ . '\MLR_PLUGIN_ALLOWED_HTML_ARR',
	wp_json_encode(
		array(
			'br'     => array(),
			'strong' => array(),
			'em'     => array(),
			'a'      => array(
				'href'   => array(),
				'target' => array(),
				'name'   => array(),
			),
			'option' => array(
				'value'    => array(),
				'selected' => array(),
			),
		)
	)
);

// URL for dev/prod for image folder.
if ( 'dev' === MLR_ENV ) {
	define( __NAMESPACE__ . '\MLR_PLUGIN_IMG_URL', MLR_PLUGIN_DIR_URL . 'assets/dev/images/' );
} else {
	define( __NAMESPACE__ . '\MLR_PLUGIN_IMG_URL', MLR_PLUGIN_DIR_URL . 'assets/dist/img/' );
}

require_once MLR_PLUGIN_DIR_PATH . 'inc/admin/admin.php';
require_once MLR_PLUGIN_DIR_PATH . 'inc/library/class-mlr-admin.php';
require_once MLR_PLUGIN_DIR_PATH . 'inc/library/class-media-library-recovery.php';
