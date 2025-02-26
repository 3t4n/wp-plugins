<?php

/**
 * LazyLoad Background Images 
 * Plugin Name:       LazyLoad Background Images
 * Description:       Helps deferring offscreen background images and improves website speed by reducing HTTP requests 
 * Version:           1.0.7
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Proloy Bhaduri
 * Author URI:        https://proloybhaduri.com
 * Text Domain:       lazyload-bg
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

//direct access prohibited 
defined('ABSPATH') or die('Not with us ');
define('PBLZBG_PLUGIN_FILE', __FILE__);
define('PBLZBG_PLUGIN_DIR', plugin_dir_path(PBLZBG_PLUGIN_FILE));
define('PBLZBG_PLUGIN_VERSION', '1.0.7');
require_once  PBLZBG_PLUGIN_DIR . 'init.php';
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'pblzbg_plugin_actions');
