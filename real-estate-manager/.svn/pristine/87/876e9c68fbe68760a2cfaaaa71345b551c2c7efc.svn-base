<?php
/**
 * Plugin Name: Properties and Agents - Real Estate Manager
 * Plugin URI: http://webcodingplace.com/wordpress-free-plugins/properties-and-agents-real-estate-manager/
 * Description: A complete solution for real estate management
 * Version: 1.0.0
 * Author: Rameez
 * Author URI: http://webcodingplace.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wcp-rem
 * Domain Path: /languages
 */

/*

  Copyright (C) 2015  WebCodingPlace  help@webcodingplace.com

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
*/

require_once('plugin.class.php');
require_once('shortcodes.class.php');
require_once('hooks.class.php');

if( class_exists('WCP_Real_Estate_Management')){
    $rem_ob = new WCP_Real_Estate_Management;
    register_activation_hook( __FILE__, array( 'WCP_Real_Estate_Management', 'rem_activated' ) );
}
if( class_exists('REM_Shortcodes')){
    $rem_sc_ob = new REM_Shortcodes;
}
if( class_exists('REM_Hooks')){
    $rem_hk_ob = new REM_Hooks;
}


?>