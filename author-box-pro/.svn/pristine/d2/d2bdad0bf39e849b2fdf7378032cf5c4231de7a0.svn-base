<?php
/*
  Plugin Name: Melabu WP Author Box Pro
  Plugin URI:  https://www.tnado.com/wordpress-plugins-by-tnado/
  Description: The utimative tool for Authors. Must have plugin for all powerfull blogs with Authors. This powerfull Author Box has more than a Pro plugin.
  Version:     1.0.1.1
  Author:      Samet Tarim aka prod3v3loper
  Author URI:  https://www.tnado.com/author/prod3v3loper/
  Text Domain: author-box-pro
  Domain Path: /languages/
  License:     GPLv2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html

  Melabu WP Author Box Pro is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.

  Melabu WP Author Box Pro is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with Melabu WP Author Box Pro. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

define('MAA_SSS_PLUGIN_14_DEV', 'Samet Tarim');
define('MAA_SSS_PLUGIN_14_DEV_URL', 'https://www.tnado.com/author/prod3v3loper/');
define('MAA_SSS_PLUGIN_14_MB_URL', 'https://profiles.wordpress.org/prodeveloper/');
define('MAA_SSS_PLUGIN_14_WP_URL', 'https://wordpress.org/plugins/author-box-pro/');

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('MB_AUTHOR_BOX_PATH')) {
    define('MB_AUTHOR_BOX_PATH', plugin_dir_path(__FILE__)); // Full Path
}

if (!defined('MB_AUTHOR_BOX_URL')) {
    define('MB_AUTHOR_BOX_URL', plugin_dir_url(__FILE__)); // Full URL
}

// Require Classes
foreach (glob(MB_AUTHOR_BOX_PATH . "classes/*.php") as $mb_plugin_sss_classes) {
    require_once $mb_plugin_sss_classes;
}

// Is admin bar showing
if (is_admin()) {

//    require_once MB_AUTHOR_BOX_PATH . 'classes/class.MelibuBackend.php';
    if (class_exists('MB_AUTHOR_BOX_BACKEND')) {
        register_activation_hook(__FILE__, array('MB_AUTHOR_BOX_BACKEND', 'activate'));
        register_deactivation_hook(__FILE__, array('MB_AUTHOR_BOX_BACKEND', 'deactivate'));
        register_uninstall_hook(__FILE__, array('MB_AUTHOR_BOX_BACKEND', 'uninstall'));
    }
//    require_once MB_AUTHOR_BOX_PATH . 'classes/class.MelibuMetaBox.php';
}
//
//require_once MB_AUTHOR_BOX_PATH . 'classes/class.MelibuFrontend.php';
//require_once MB_AUTHOR_BOX_PATH . 'classes/class.MelibuOptions.php';
//require_once MB_AUTHOR_BOX_PATH . 'classes/class.MelibuHelper.php';
//require_once MB_AUTHOR_BOX_PATH . 'classes/class.MelibuAuthor.php';
