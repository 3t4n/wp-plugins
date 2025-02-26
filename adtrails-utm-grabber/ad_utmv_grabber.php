<?php

/**
 * Plugin Name: AdTrails UTM Grabber
 * Plugin URI: https://www.adtrails.com/
 * Description:  AdTrails UTM Grabber Free pushes UTM/GCLID info CF7.
 * Version: 1.0.0
 * Author: Actuate Media
 * Author URI: https://www.actuatemedia.com/
 * Text Domain: ad_utmv_grabber
 * Domain Path: /i18n/languages/
 *
 * @package utmv_grabber
 
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define UTMV_PLUGIN_FILE.
if (!defined('UTMV_GRABBER_PLUGIN_FILE')) {
    define('UTMV_GRABBER_PLUGIN_FILE', __FILE__);
}

// Include the main ClassUtmvGrabber class.
if (!class_exists('ClassUtmvGrabber')) {
    include_once dirname(__FILE__) . '/inc/ClassUtmvGrabber.php';
}

/**
 * Main instance of UtmvGrabber.
 *
 * Returns the main instance of UtmvGrabber.
 *
 * @since  1.0.0
 * @return UtmvGrabber
 */
function UtmvGrabber() {
    return UtmvGrabber::instance();
}

// Global for backwards compatibility.
$GLOBALS['utmv_grabber'] = UtmvGrabber();
