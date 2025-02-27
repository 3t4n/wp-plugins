<?php

/**
* Plugin Name: Slivery Extender
* Description: To build themes quicker & more easily.
* Version: 1.0.2
* Copyright: 2022
* Text Domain: slivery-extender
* Domain Path: /languages 
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) {
	die('-1');
}


// Define plugin base name
define('SEFW_BASE_NAME', plugin_basename(__FILE__));

// Define plugin file
define('SEFW_PLUGIN_FILE', __FILE__);


// Define plugin dir
define('SEFW_PLUGIN_DIR', plugins_url('', __FILE__));

// Include Plugins File
include_once( 'inc/customizer.php' );
