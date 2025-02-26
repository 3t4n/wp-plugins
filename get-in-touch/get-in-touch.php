<?php
/*
Plugin Name: Get In Touch
Plugin URI: http://labs.think201.com/plugins/get-in-touch/
Description: Get In Touch plug-in allows you to generate form by adding input controls to it dynamically. This plug-in allows you to integrate map along with your form and have a track of mails received.
Author: Think201
Version: 1.0.7
Author URI: http://www.think201.com
License: GPL v1

Contact Form Plugin
Copyright (C) 2015, Think201 - hello@think201.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
/**
 * @package Main
 */

if ( !defined( 'DB_NAME' ) ) {
	header( 'HTTP/1.0 403 Forbidden' );
	die;
}

if(version_compare(PHP_VERSION, '5.2', '<' ))
{
	if (is_admin() && (!defined( 'DOING_AJAX' ) || !DOING_AJAX ))
	{
		require_once(ABSPATH . 'wp-admin/includes/plugin.php');
		deactivate_plugins( __FILE__ );
		wp_die( sprintf( __( 'Get In Touch requires PHP 5.2 or higher, as does WordPress 3.2 and higher. The plugin has now disabled itself.', 'Get In Touch' ), '<a href="http://wordpress.org/">', '</a>' ));
	}
	else
	{
		return;
	}
}

if ( !defined( 'GIT_PATH' ) )
	define( 'GIT_PATH', plugin_dir_path( __FILE__ ) );

if ( !defined( 'GIT_BASENAME' ) )
	define( 'GIT_BASENAME', plugin_basename( __FILE__ ) );

if ( !defined( 'GIT_VERSION' ) )
	define('GIT_VERSION', '1.0.7' );

if ( !defined( 'GIT_PLUGIN_DIR' ) )
	define('GIT_PLUGIN_DIR', dirname(__FILE__) );

if ( ! defined( 'GIT_LOAD_JS' ) )
	define( 'GIT_LOAD_JS', true );

if ( ! defined( 'GIT_LOAD_CSS' ) )
	define( 'GIT_LOAD_CSS', true );

require_once GIT_PLUGIN_DIR .'/includes/git-install.php';

require_once GIT_PLUGIN_DIR .'/includes/git-admin.php';
require_once GIT_PLUGIN_DIR .'/includes/git.php';

register_activation_hook( __FILE__, array('GIT_Install', 'activate') );
register_deactivation_hook( __FILE__, array('GIT_Install', 'deactivate') );
register_uninstall_hook(    __FILE__, array('GIT_Install', 'delete') );

add_action( 'plugins_loaded', 'GetInTouchStart' );

function GetInTouchStart()
{
	$initObj = git\GITAdmin::get_instance();
	$initObj->init();
}
