<?php 
/**

 * Plugin Name: avk background manager

 * Plugin URI: www.avktechnology.com

 * Description:  Avk Background Manager is a powerful replacement for the default WordPress theme background. The images can be uploaded from your local computer, selected from the images available in your Media Library. 
 
 * Version: 1.0

 * Author: Ajeet singh yadav

 * Author URI: 

 * Network: Optional. Whether the plugin can only be activated network wide.  Example: true

 * License: A short license name. Example: GPL2

 */
 
 /**
 * Adds Foo_Widget widget.
 */
 
 /* global variable */
$avk_background=get_option('avk_background');
 
 /*  include files */ 
include('include/avk-background-setting.php');
//include('include/avkadminpage.php');
include('include/background-avkscript.php');
include('include/background-main.php');

