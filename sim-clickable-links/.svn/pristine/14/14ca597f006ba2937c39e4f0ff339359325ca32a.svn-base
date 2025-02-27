<?php

/**
 * Plugin Name:       Clickable Links
 * Plugin URI:        https://github.com/devuri/wp-clickable-links
 * Description:       Convert Plain text WordPress Post URLs and email addresses to Hyperlinks.
 * Version:           1.8.1
 * Requires at least: 5.3.0
 * Requires PHP:      7.3.5
 * Author:            uriel
 * Author URI:        https://github.com/devuri
 * Text Domain:       sim-clickable-links
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Network: true.
 */

if ( ! \defined( 'ABSPATH' ) ) {
    exit;
}

\define( 'SWCLINKS_VERSION', '1.8.1' );

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

ClickableLinks\Plugin::make()->clickable();
