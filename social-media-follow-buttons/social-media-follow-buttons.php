<?php

/*
Plugin Name: Social Media Follow Buttons
Plugin URI: http://www.viewvox.com/socialmediafollowbuttons
Description: Easy plugin to add the main ViewVox Social Media "Follow On" buttons to any page or post or in a sidebar with included widget.
Version: 1.2
Author: ViewVox - Neil Mount
Author URI: http://www.viewvox.com
License: GPL3

ViewVox Social Media Follow Buttons is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Social Media Follow Buttons is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Social Media Follow Buttons. If not, see http://www.gnu.org/licenses.
*/


/* Disallow direct access to the plugin file */

if (basename($_SERVER['PHP_SELF']) == basename (__FILE__)) {
	die('Sorry, but you cannot access this page directly.');
}

/**********************
 * * Global Variables
 *********************/

$smfbvv_prefix = 'smfbvv_';
$smfbvv_my_plugin_name = 'Social Media Follow Buttons';

// retrive our plugin settings from the options table in database
$smfbvv_options = get_option('smfbvv_settings');
// define image directory
$images = plugin_dir_url( __FILE__ ) . 'includes/images/';

/**********************
 * * includes
 *********************/

include('includes/scripts.php'); // this controls all JS/CSS
include('includes/data-processing.php');  // this controls all saving of data
include('includes/admin-plugin.php'); // admin settings options HTML and save functions
include('includes/display-functions.php'); // display content functions
include('includes/social-media-widget.php'); // settings for sidebar widget
include('includes/content-output.php'); //settings for content area display


