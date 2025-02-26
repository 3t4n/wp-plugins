<?php
/**
 * Plugin Name: Assist Me
 * Plugin URI: https://www.citymaas.io/assist-me
 * Description: Accessibilty plugin by CityMaaS
 * Version: 1.0.1
 * Author: CityMaaS 
 * Author URI: https://www.citymaas.io/
 * License: GPLv2 or later
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

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
  die;
}


define( 'AMPLUGIN_URL', plugin_dir_url( __FILE__ ) );
// Enqueue Plugin JavaScript
include( plugin_dir_path( __FILE__ ) . 'includes/am-plugin-scripts.php');
?>