<?php
/**
 * Plugin Name: MetaText for Web Accessibility
 * Author: Sabastine Udeh
 * Author URI: https://sommysab.com
 * Version: 1.0.4
 * Description: Free WordPress Implementation of Bionic Reading for the Web.
 * Text-Domain: wp-meta-text
 */

if( ! defined( 'ABSPATH' ) ) : exit(); endif; // No direct access allowed

/**
* Define Plugins Constants
*/
require_once 'classes/class-defaults.php';
$MetaText_WP = new WP_MetaText_Default_Properties();
/**
* Core implementations
*/
require_once $MetaText_WP->PATH . 'classes/class-create-admin-menu.php';
require_once $MetaText_WP->PATH . 'classes/class-load-default-scripts.php';
require_once $MetaText_WP->PATH . 'classes/class-create-settings-routes.php';
require_once $MetaText_WP->PATH . 'classes/class-frontend-manipulation.php';