<?php
/*
Plugin Name: GT Push Menu Lite
Plugin URI: http://griffinthemes.com/plugins/gt-push-menu/
Description: Advanced push menu plugin
Version: 1.2.1
Author: Alex Ladyga - Griffin Themes
Author URI: http://www.griffinthemes.com
*/
/*  Copyright 2013  Alex Ladyga (email : alex@griffinthemes.com)
	Copyright 2013  Griffin Themes

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// litte helper function to bring some windows love 
function gtpm_ensure_correct_path($path) {
	return preg_replace('/[\\\\\/]+/', DIRECTORY_SEPARATOR, $path);
}

define('GTPM', 'GtPushMenu');
define('GTPM_VERSION', '1.2.1');

if ( preg_match('/.*?\.dev$/i', $_SERVER['HTTP_HOST']) ) {
	define('GTPM_DEV_HOST', true);
}

define('GTPM_PLUGIN_URL', plugins_url( '', __FILE__ ));
define('GTPM_PLUGIN_PATH', gtpm_ensure_correct_path(WP_PLUGIN_DIR.'/'.basename(dirname(__FILE__))) );
define('GTPM_PLUGIN_MAINFILE', __FILE__);
define('GTPM_BLOG_ADMIN_URL', get_bloginfo('wpurl').'/wp-admin/');

define('GTPM_PLUGIN_DIRNAME', basename(dirname(__FILE__))); // plugin-dir
define('GTPM_PLUGIN_PATHNAME', basename(dirname(__FILE__)).'/'.basename(__FILE__)); // plugin-dir/plugin-name.php

function gtpmIsOnWindows() {
	return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
}

function gtpmActivationHook() {
	require_once(__DIR__.DIRECTORY_SEPARATOR."core.php");
	$n = GTPM::getInstance();
	$n->onActivate();
}

function gtpmDeactivationHook() {
	require_once(__DIR__.DIRECTORY_SEPARATOR."core.php");
	$n = GTPM::getInstance();
	$n->onDeactivate();
}

require_once(__DIR__.DIRECTORY_SEPARATOR."core.php");	
$n = GTPM::getInstance();

register_activation_hook( GTPM_PLUGIN_MAINFILE, 'gtpmActivationHook');
register_deactivation_hook( GTPM_PLUGIN_MAINFILE, 'gtpmDeactivationHook' );

