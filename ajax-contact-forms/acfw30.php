<?php
/*
Plugin Name: ACF SP - Ajax Contact Forms
Text Domain: acfw30
Domain Path: /languages
Description: Simple and friendly contact form plugin with button widget.
Version: 1.0.1
Author: spoot1986
Author URI: https://web-cude.com/
Plugin URI: http://acf.web-cude.com/
*/

//require scripts and styles
require_once(plugin_dir_path(__FILE__).'acfw30-scripts-and-styles.php');
//require functions
require_once(plugin_dir_path(__FILE__).'acfw30-functions.php');
//require admin
require_once(plugin_dir_path(__FILE__).'acfw30-admin.php');
//require widgets
require_once(plugin_dir_path(__FILE__).'acfw30-widgets.php');
//require core
require_once(plugin_dir_path(__FILE__).'acfw30-core.php');
//require ajax
require_once(plugin_dir_path(__FILE__).'acfw30-ajax.php');

//require custom functions
$acfw30_custom_functions = plugin_dir_path(__FILE__).'custom-functions.php';
if (file_exists($acfw30_custom_functions)) require($acfw30_custom_functions);