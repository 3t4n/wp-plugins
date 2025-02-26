<?php

/**
 * Plugin Name: 	  Accordion Gallery by Widgetic
 * Contributors: 	  Widgetic
 * Plugin URI:		  https://wordpress.org/plugins/accordion-gallery-by-widgetic/
 * Description: 	  Answer questions proactively to improve customer conversion
 * Version: 		  1.0.0
 * Requires at least: 5.4
 * Requires PHP:      7.0
 * Author: 			  Widgetic
 * Author URI: 		  https://profiles.wordpress.org/widgetic/#content-plugins
 * License: 		  GPL v2
 */


defined("ABSPATH") || exit;

// IMPORT DASHBOARD
require_once(plugin_dir_path(__FILE__) . "dashboard.php");

// IMPORT BLOCK
require_once(plugin_dir_path(__FILE__) . "block.php");