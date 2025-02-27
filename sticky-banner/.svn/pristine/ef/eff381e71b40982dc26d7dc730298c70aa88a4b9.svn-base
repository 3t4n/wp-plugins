<?php

/**
 * Plugin Name: Sticky Banner
 * Plugin URI: https://github.com/hiddendepth/hdsb-stickybanner
 * Description: Display a sticky banner at the top or bottom of your website.
 * Version: 1.3.1
 * Author: Hidden Depth
 * Author URI: https://hiddendepth.ie
 * License: GPL3
 *
 * @package Sticky banner
 * @version 1.3.1
 * @author Hidden Depth <info@hd.ie>
 */

// Block direct access to the plugin PHP files.
defined('ABSPATH') or die('No script kiddies please!');

// Plugin version and paths.
define('HDSB_VERSION', '1.3.1');
define('HDSB_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('HDSB_PLUGIN_URL', plugin_dir_url(__FILE__));

// Enqueue scripts and styles.
include_once(HDSB_PLUGIN_PATH . 'inc/enqueues.php');

// Include color adjustments.
include_once(HDSB_PLUGIN_PATH . 'inc/admin/colours.php');

// Include settings page functionality.
include_once(HDSB_PLUGIN_PATH . 'inc/admin/settings.php');

// Output the sticky banner by hooking into the footer.
add_action('wp_footer', 'hdsb_stickybanner_output');
function hdsb_stickybanner_output()
{
    include_once(HDSB_PLUGIN_PATH . 'inc/stickybanner.php');
}
