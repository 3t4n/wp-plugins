<?php
/**
 *
 * @package			disable-all-updates
 * @author  		Expertwolf
 * @license 		GPL-2.0
 *
 * Plugin Name: 	Disable All Updates & Notifications
 * Description:     Disable all auto updates and notifications of wordpress core, themes & plugins.
 * Plugin URI:  	http://github.com/sakthiwebdev/disable-all-updates
 * Version:     	1.0
 * Author:      	Expertwolf
 * Author URI:  	https://expertwolf.com
 * License:     	GNU General Public License v2 or later
 * License URI: 	http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 	disable-all-updates
 *
 */
/*
This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see <https://www.gnu.org/licenses/>.
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class disable_all_updates
{
	function __construct()
	{ 
    	add_filter('pre_site_transient_update_core',array( $this,'remove_core_updates'));
		add_filter('pre_site_transient_update_plugins',array( $this,'remove_core_updates'));
		add_filter('pre_site_transient_update_themes',array( $this,'remove_core_updates'));
	}	
	//Disable All Notify Update
	function remove_core_updates()
	{
		global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
	}

}	
new disable_all_updates();

//Disable Auto Updates
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );
add_filter( 'automatic_updater_disabled', '__return_true' );	