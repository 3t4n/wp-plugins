<?php

/*
Plugin Name: Cyber Slider 
Plugin URI: http://cybersourcepk.com/
Description: Cyber Slider is the most advanced and All In One WordPress slider plugin.
Version: 1.1
Author: CyberSourcepk
Author URI: http://cybersourcepk.com/
Text Domain: CyberSlider
*/


if(defined('CS_PLUGIN_VERSION')) {
	die('ERROR: It looks like you already have one instance of CyberSlider installed. You need to remove the old version first. WordPress cannot activate and handle two instanced at the same time.');
}

if(!defined('ABSPATH')) {
	header('HTTP/1.0 403 Forbidden');
	exit;
}



// Let the Constants be
define('CS_ROOT_FILE', __FILE__);
define('CS_ROOT_PATH', dirname(__FILE__));
define('CS_ROOT_URL', plugins_url('', __FILE__));
define('CS_PLUGIN_VERSION', '1.1');
define('CS_PLUGIN_SLUG', basename(dirname(__FILE__)));
define('CS_PLUGIN_BASE', plugin_basename(__FILE__));
define('CS_DB_TABLE', 'cybersliders');
define('CS_DB_TABLE_SLIDES', 'cybersliders_slides');
define('CS_TEXTDOMAIN', 'CyberSlider');


include CS_ROOT_PATH.'/includes/inc_php/activation.php';
include CS_ROOT_PATH.'/includes/inc_php/scripts.php';
include CS_ROOT_PATH.'/includes/inc_php/shortcode.php';
include CS_ROOT_PATH.'/includes/inc_php/menus.php';
include CS_ROOT_PATH.'/includes/inc_php/dynamic-functions.php';
include CS_ROOT_PATH.'/includes/inc_php/ajax-backend-functions.php';
include CS_ROOT_PATH.'/classes/class.cs.tiny.mce.php';
include CS_ROOT_PATH.'/classes/class.cs.widget.php';