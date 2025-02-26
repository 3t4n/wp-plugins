<?php
/**
 * Plugin Name: 42videobricks
 * Plugin URI: https://42videobricks.com
 * Description: <a target="_blank" href="https://42videobricks.com">42videobricks</a> handles the complexity of video for you: no infrastructure required, no CapEx, no complexity! Simply add our embed code to your WordPress site or service to add video. This plugin integrates the external use of service of the 42videobricks in order to use it into your own WordPress project.
 * Author: 42videobricks
 * Version: 1.0.0
 * Author URI: https://42videobricks.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Requires at least: 5
 * Requires PHP: 7.4
 *
 * @package 42videobricks
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'VIDEOBRICKS42_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require_once VIDEOBRICKS42_PLUGIN_DIR . 'includes/42videobricks-pages.php';
require_once VIDEOBRICKS42_PLUGIN_DIR . 'includes/42videobricks-functions.php';
require_once VIDEOBRICKS42_PLUGIN_DIR . 'includes/42videobricks-add-new-video.php';
require_once VIDEOBRICKS42_PLUGIN_DIR . 'includes/42videobricks-settings.php';
require_once VIDEOBRICKS42_PLUGIN_DIR . 'includes/class-videobricks42-list-table.php';
