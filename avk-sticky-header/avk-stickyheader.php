<?php 
/**

 * Plugin Name: avk sticky header

 * Plugin URI: www.avktechnology.com

 * Description:  The Sticky Header WordPress plugin makes your header visible at all times. It's a great feature that allows people to browse faster and consume more of your content.
 
 
 * Version: 1.0

 * Author: Ajeet singh

 * Author URI:www.avktechnology.com 

 * Network: Optional. Whether the plugin can only be activated network wide.  Example: true

 * License: A short license name. Example: GPL2

 */
 
 /**
 * Adds Foo_Widget widget.
 */
 
 /* global variable */
$avk_options_url=get_option('avk_settings');
 
 /*  include files */ 
include('include/avk-setting.php');
//include('include/avkadminpage.php');
include('include/avkscript.php');
include('include/main.php');

