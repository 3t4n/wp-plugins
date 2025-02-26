<?php

/*
Plugin Name: ADL Team
Plugin URI: https://wpwax.com/product/team-pro/
Description: A beautiful plugin that helps you display team members on your website very easily and you can also show details of your each team member on a separate member page with this plugin. You can see the <a href="https://aazztech.com/demos/plugins/adl-team-demo-1/m" target="_blank"> LIVE DEMO here</a>.
Version: 1.2.6
Author: wpWax
Author URI: https://wpwax.com
License: GPLv2 or later
Text Domain: adl-team
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

Copyright 2016 adlplugins.
*/

// Make sure we don't expose any info if called directly

if ( !defined('ABSPATH') ) die( 'Cheating? Direct access is not allowed. ' );
if ( !defined('ADL_TEAM_BASE') ) { define('ADL_TEAM_BASE', plugin_basename( __FILE__ )); }

// Load plugin config
require_once 'config.php';
// main plugin class
require_once 'Main.php';


if ( class_exists( 'Adl_Team' ) ) { // Instantiate the plugin class
    global $ADL_team;
    $ADL_team = new Adl_Team();
    $ADL_team->check_req_php_version();
    $ADL_team->warn_if_unsupported_wp();
    $ADL_team->init();
}
