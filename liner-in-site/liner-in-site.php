<?php

/**
 * @package LINER In-Site
 */
/*
Plugin Name: LINER In-Site
Plugin URI: https://wordpress.org/plugins/liner-in-site/
Description: LINER helps you highlight sentences on the web. Highlight your favorite texts.
Version: 0.1.3
Author: LINER
Author URI: https://connect.getliner.com/api/in-site
License: GPLv2 or later
Text Domain: liner-in-site
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright (c) 2017-present, LINER Inc. All rights reserved.
*/


define('LINER_IN_SITE_VERSION', '0.1.3');
define('LINER_IN_SITE__MINIMUM_WP_VERSION', '4.0');
define('LINER_IN_SITE__PLUGIN_DIR', plugin_dir_path( __FILE__));

register_activation_hook(__FILE__, array('LinerInSite', 'do_activation'));
register_deactivation_hook(__FILE__, array('LinerInSite', 'do_deactivation'));

require_once(LINER_IN_SITE__PLUGIN_DIR . 'class.liner-in-site.php');

add_action('init', array('LinerInSite', 'init'));
