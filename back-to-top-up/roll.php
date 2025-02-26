<?php
/**
* Plugin Name:     Back to top-up
* Description:     This plugin is best responsive WordPress plugin.
* Version:         1.0.2
* Author:          Lusine
*/

if (!defined('ROLL_VERSION')) {
    define('ROLL_VERSION', "0.0.1");
}

if (!defined('WSTR_URL')) {
    define('WSTR_URL', plugins_url(plugin_basename(dirname(__FILE__))));
}

if(is_admin()){
    require_once('wstr_admin_class.php');
    add_action('plugin_loaded',array('WSTR_Admin', 'get_instance'));
}
if(!is_admin()){
    require_once ("wstr_class.php");
    add_action('plugins_loaded', array('WSTR', 'get_instance'));
}

require_once('includes/wstr_register_posts.php');
WSTR_register_posts::get_instance();
