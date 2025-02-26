<?php
/*Plugin Name: Username
Plugin URI: https://profiles.wordpress.org/pranavpathakjaora/
Description: The Username plugin helps to change username, if username is not exist and without effecting others user's username.
Author: Pranav Pathak
Version: 1.3
Author URI: https://profiles.wordpress.org/pranavpathakjaora/
*/

/**  Copyright 2013  Pranav Pathak  (email : pranavpathak125@gmail.com)
 *
 *    This program is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License, version 2, as 
 *    published by the Free Software Foundation.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
 // Not a WordPress context? Stop.
! defined( 'ABSPATH' ) and exit;

//Require the code to the rest of the plugin
require_once(trailingslashit(WP_PLUGIN_DIR) . 'username/functions/username-class.php');

//Create object of class 
$objppl = new user_name();

// call function 
add_action( 'admin_enqueue_scripts', array($objppl,'call_username' )); 


//ajax function
add_action('wp_ajax_check_username_already_exist', array($objppl,'custom_ajax_function'));


?>
