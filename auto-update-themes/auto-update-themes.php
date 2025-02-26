<?php

/**

 * Plugin Name: Auto Update Themes

 * Plugin URI: http://www.geenyous.com/wordpress/auto-update-themes

 * Description: This plugin turns on auto update for themes.

 * Version: 0.1.3

 * Author: Geenyous Limited

 * Author URI: http://www.geenyous.com

 * License: GPL2

 */

 

/*  Copyright 2015  Geenyous Limited  (email : plugins_wp@geenyous.com)



	This program is free software; you can redistribute it and/or modify

	it under the terms of the GNU General Public License, version 2, as 

	published by the Free Software Foundation.



	This program is distributed in the hope that it will be useful,

	but WITHOUT ANY WARRANTY; without even the implied warranty of

	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

	GNU General Public License for more details.



	You should have received a copy of the GNU General Public License

	along with this program; if not, write to the Free Software

	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Auto_Update_Themes {

	public function __construct() {
	
		add_filter( 'auto_update_theme', '__return_true' ); 
	
	}

}

$plugin_Auto_Update_Themes = new Auto_Update_Themes();
