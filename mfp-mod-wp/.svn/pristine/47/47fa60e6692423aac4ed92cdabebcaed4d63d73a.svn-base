<?php /*

Plugin Name: MFP mod WP
Description: Plugin MFP mod WP does two main functions:  clean your source code from links, which can to slow down your blog and hides some articles such as version of the engine, links to wordpress.org etc. from the admintool.
Version: 0.3.8
Author: Sergey Voloshin
Author URI: https://varrcan.me/
Plugin URI: https://varrcan.me/
Copyright 2016  Varrcan  (email: mfp@varrcan.me)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

if(!defined('ABSPATH')) exit;

define('MFP_MOD_WP_DIR', plugin_dir_path(__FILE__));
define('MFP_MOD_WP_URL', plugin_dir_url(__FILE__));
define('MFP_VERSION', '0.3.8');

if(function_exists('load_plugin_textdomain')) load_plugin_textdomain('mfp-languages', PLUGINDIR.'/'.dirname(plugin_basename
		(__FILE__)).'/languages', dirname(plugin_basename(__FILE__)).'/languages');

include_once 'class/option.class.php';

/**
 * Действия при активации плагина
 */
register_uninstall_hook( __FILE__, array( 'mainMfp', 'mfp_activation' ) );

/**
 * Действия при деактивации плагина
 */
//register_uninstall_hook( __FILE__, array( 'mainMfp', 'mfp_deactivation' ) );

new mainMfp();

?>