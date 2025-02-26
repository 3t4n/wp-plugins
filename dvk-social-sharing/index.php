<?php
/*
Plugin Name: Social Sharing (by Danny)
Version: 1.3.9
Plugin URI: https://dannyvankooten.com/wordpress-plugins/
Description: Adds super lightweight (no scripts) social share buttons to your posts.
Author: ibericode
Author URI: https://dannyvankooten.com/
Text Domain: dvk-social-sharing
Domain Path: /languages/
License: GPL-3.0-or-later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Social Sharing By Danny Plugin
Copyright (C) 2013-2024 Danny van Kooten, hi@dannyvankooten.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

defined('ABSPATH') or exit;

define('DVKSS_VERSION', '1.3.9');
define('DVKSS_PLUGIN_DIR', __DIR__);

require DVKSS_PLUGIN_DIR . '/includes/functions.php';

if( ! is_admin() ) {
    // PUBLIC SECTION
    require DVKSS_PLUGIN_DIR . '/includes/template-functions.php';
    require DVKSS_PLUGIN_DIR . '/includes/class-public.php';
    $public = new DVKSS_Public(__FILE__);
    $public->hook();
} elseif( ! defined("DOING_AJAX") || ! DOING_AJAX ) {
    // ADMIN SECTION
    require DVKSS_PLUGIN_DIR . '/includes/class-admin.php';
    $admin = new DVKSS_Admin(__FILE__);
    $admin->hook();
}
