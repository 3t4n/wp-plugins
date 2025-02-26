<?php
/**
    Plugin Name: Ework Social Share Plugin
    Plugin URI: http://eorkgroup.com
    Description: This plugin shares your post and pages in main social site, Twitter, Facebook, Google Plus and Linkedin. If you need more than it then please contact us at eworkpassion@gmail.com we will make it for free of cost.
    Version: 0.1
    Author: Mr. Pusp Raj Joshi
    Author URI: http://eorkgroup.com
    License: GPL2 
 */
/**************************************
 * Global Variables
 *************************************/
$ewsp_prefix = "ewsp_";
$ewsp_plugin_name = 'Ework Social Share';
//retrive our plugins setting 
$ewsp_options = get_option('ewsp_settings');
/*************************************
 * Includes
 *************************************/
include('includes/scripts.php');// this controls all js and scripts
include('includes/dataprocessing.php'); // this controls php scripts
include('includes/displayfunctions.php'); // display content functions
include('includes/admin-page.php'); // The plugin options page html and save functions
?>