<?php

/*
Plugin Name: Advanced Date Time Field
Plugin URI: https://pluginscafe.com/plugin/advanced-date-time-field/
Author: Pluginscafe
Author URI: https://pluginscafe.com
Version: 1.0.0
Description: This plugin is a lightweight yet powerful date and time picker designed for popular form builder plugins.
Text Domain: advanced-date-time-field
License: GPLv2 or later
Domain Path: /languages
*/
if (!defined('ABSPATH')) {
    exit;
}

define('ADTF_VERSION', '1.0.0');

add_action('gform_loaded', array('ADTF_Bootstrap', 'load'), 5);
class ADTF_Bootstrap {
    public static function load() {
        if (!method_exists('GFForms', 'include_addon_framework')) {
            return;
        }
        // are we on GF 2.8+
        require_once 'includes/class-adtf-addon.php';
        require_once 'includes/class-adtf-field.php';
        require_once 'includes/class-adtf-editor.php';
        GFAddOn::register('ADTF_Addon');
    }
}

/**
 * Initializes the PCAFE_GFDT_Addon instance.
 *
 * @return ADTF_Addon The initialized instance of the add-on.
 */
function ADTF_Instance() {
    return ADTF_Addon::get_instance();
}
