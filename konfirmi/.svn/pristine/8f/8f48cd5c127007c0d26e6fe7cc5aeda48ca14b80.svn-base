<?php

/**
 * @package Konfirmi Plugin
 */

/*
Plugin Name: Konfirmi Plugin
Plugin URI: https://login.konfirmi.com/
Description: Konfirmi Plugin
Version: 2.1.3
Author: KONFIRMI LLC
License: GPLv2 or later
Text Domain: konfirmi-plugin
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
*/

// If this file is called directly, abort!!!
defined('ABSPATH') or die('ABSPATH is not defined');

// Require once composer autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code run during plugin activation
 */
function activate_konfirmi_plugin()
{
    Konfirmi\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_konfirmi_plugin' );

/**
 * The code run during plugin deactivation
 */
function deactivate_konfirmi_plugin()
{
    Konfirmi\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_konfirmi_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists('Konfirmi\\Init') ) {
    Konfirmi\Init::register_services();
    Konfirmi\Init::initScriptUrls();
}

function konfirmi_checkWidget($request){
    return new WP_REST_Response( class_exists('Konfirmi\\Base\\Forms\\AgileCRM')
    ? Konfirmi\Base\Forms\AgileCRM::check_widget($request->get_param( 'id' ))
    : array(), 200 );
}
