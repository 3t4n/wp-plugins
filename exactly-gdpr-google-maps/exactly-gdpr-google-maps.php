<?php
/**
 *
 *
 * Plugin Name: exovia GDPR Google Maps
 * Plugin URI:  https://wordpress.org/plugins/exactly-gdpr-google-maps/
 * Description: The easy way to integrate Google Maps GDPR in compliance with data protection. The Google Maps only load when the user has agreed with a click. Just use the shortcut after setup: [exactly-gdpr-map]
 * Version:     1.0.15
 * Author:      exovia
 * Author URI:  https://www.exovia.de/
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: exactly-gdpr-google-maps
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */


/**
 * Definitions
 */
define( 'EXGGMAP_VERSION', '1.0.15' );

define( 'EXGGMAP_PLUGIN', __FILE__ );

define( 'EXGGMAP_PLUGIN_BASENAME', plugin_basename( EXGGMAP_PLUGIN ) );

define( 'EXGGMAP_PLUGIN_NAME', trim( dirname( EXGGMAP_PLUGIN_BASENAME ), '/' ) );

define( 'EXGGMAP_PLUGIN_DIR', untrailingslashit( dirname( EXGGMAP_PLUGIN ) ) );


/**
 * Load plugin textdomain.
 */
// require EXGGMAP_PLUGIN_DIR . '/includes/exggmap-i18n.php';

/**
 *  Enqueue public styles and scripts
 */
require EXGGMAP_PLUGIN_DIR . '/public/exggmap-public.php';

/**
 *  Adds Settingpage with options
 */
require EXGGMAP_PLUGIN_DIR . '/admin/exggmap-admin.php';

/**
 *  Adds the Shortcode and Frontend Output
 */
require  EXGGMAP_PLUGIN_DIR . '/includes/exggmap-shortcode.php';

?>
