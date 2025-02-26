<?php
/*
Plugin Name: Auto Sticky Post
Version: 1.1.2
Plugin URI: http://www.lije-creative.com/#utm_source=wpadmin&utm_medium=plugin&utm_campaign=stickyplugin
Description: Automatically stick the last 'n' post to the homepage
Author: LIJE
Author URI: http://www.lije-creative.com
Text Domain: stickyposts
Domain Path: /languages/
License: GPL v3

Auto Sticky Post Plugin
Copyright (C) 2008-2014, LIJE Creative - info@lije-creative.com

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
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

// Defines
define( 'jlasp_VERSION'		, '1.1.2');
define( 'jlasp_FILE'		, __FILE__ );
define( 'jlasp_PATH'		, realpath( plugin_dir_path( jlasp_FILE ) ). '/' );
define( 'jlasp_INC_PATH'	, realpath( jlasp_PATH . 'inc' ) . '/' );
define( 'jlasp_ADMIN_PATH'	, realpath( jlasp_INC_PATH . 'admin' ) . '/' );


/*
 * Tell WP what to do when plugin is loaded
 *
 * @since 1.0
 *
 */

add_action( 'plugins_loaded', 'jlasp_plugins_loaded' );
function jlasp_plugins_loaded()
{
	load_plugin_textdomain( 'stickyposts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	
	require jlasp_INC_PATH . 'functions.php';
	
    if( is_admin() )
    {
		require jlasp_ADMIN_PATH . 'admin.php';
		require jlasp_ADMIN_PATH . 'options.php';
	}
}


/*
 * Tell WP what to do when plugin is activated
 *
 * @since 1.0.0
 *
 */
register_activation_hook( __FILE__, 'jlasp_activation' );
function jlasp_activation()
{
	if( (int)!get_option( 'jlasp_number_post' ) )
	{
		add_option( 'jlasp_number_post', 3 );
	}
	require jlasp_INC_PATH . 'functions.php';
	jlasp_update_post_visibility();
}


/*
 * Tell WP what to do when plugin is uninstalled
 *
 * @since 1.1.0
 *
 */
register_uninstall_hook( __FILE__, 'jlasp_uninstall' );
function jlasp_uninstall()
{
    delete_option( 'jlasp_number_post' );
}