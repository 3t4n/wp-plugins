<?php
/*
Plugin Name: Admin renamer extended
Plugin URI: https://www.mijnpress.nl
Description: Lets you rename all admin usernames with GUI.
Version: 3.2.1
Author: Ramon Fincken
Author URI: https://www.mijnpress.nl
*/
if ( !defined('ABSPATH' )) die("Aren't you supposed to come here via WP-Admin?");

if (!defined('PLUGIN_ADMIN_RENAMER_DIR')) {
   define('PLUGIN_ADMIN_RENAMER_DIR', WP_PLUGIN_DIR . '/' . plugin_basename(dirname(__FILE__)));
}

if (!defined('PLUGIN_ADMIN_RENAMER_BASENAME')) {
   define('PLUGIN_ADMIN_RENAMER_BASENAME', plugin_basename(__FILE__));
}

// Admin only :)
if (is_admin()) {
   require_once PLUGIN_ADMIN_RENAMER_DIR . '/admin.php';
}
