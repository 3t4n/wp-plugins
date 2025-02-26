<?php
/*
Plugin Name: Age Verification - simple
Description: With this module you will know that each user is an adult and uses the site with his consent.
Version: 1.3.0
Text Domain: age_verification__simple
Author: SYMPLAX s.r.o.
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined('ABSPATH') or die();

$tmp__plugin_dir_path = plugin_dir_path( __FILE__ );

if ((isset($_SERVER['REQUEST_URI']) && stripos(sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])),'/admin-ajax.php')!==false) || !is_admin()) {
	require_once $tmp__plugin_dir_path . '/classes/lib.php';
	require_once $tmp__plugin_dir_path . '/classes/controller.php';
	add_action('init', array(new AgeVerificationSimpleController(), 'init'));
}
