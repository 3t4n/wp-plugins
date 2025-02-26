<?php
/*
Plugin Name: Disable Right Click RB
Plugin URI: https://www.rbplugins.com/disable-right-click-rb
Description: This wp plugin protects the content of the post from being copied by any other website author content copy protection
Version: 1.0.9
Author: rbPlugins
Author URI: https://profiles.wordpress.org/rbplugins/
License: GPL2
Text Domain: disable-right-click-rb
Domain Path: /languages/
*/

if (!defined('WPINC') || !defined("ABSPATH")) {
    die();
}
define("RB_DISABLE_RIGHT_CLICK_VERSION", '1.0.9' );
define("RB_DISABLE_RIGHT_CLICK_PATH", plugin_dir_path(__FILE__));
define("RB_DISABLE_RIGHT_CLICK_URL", plugin_dir_url(__FILE__));

include_once(RB_DISABLE_RIGHT_CLICK_PATH .'class_rb_disable_right_click.php');
rbDisableRightClick::getInstance();
