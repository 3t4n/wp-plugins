<?php
/*
Plugin Name: Range Slider Addon For Gravity Forms
Plugin Url: https://pluginscafe.com/plugin/range-slider-for-gravity-forms-pro/
Version: 1.1.3
Description: A simple and nice plugin to add range slider to pick data easily in gravity forms.
Author: Pluginscafe
Author URI: https://pluginscafe.com
License: GPLv2 or later
Text Domain: gravityforms
*/
if (!defined('ABSPATH')) {
    exit;
}

define('GF_NU_RANGE_SLIDER_ADDON_VERSION', '1.1.3');

add_action('gform_loaded', array('GF_NU_Range_Slider_AddOn_Bootstrap', 'load'), 5);

class GF_NU_Range_Slider_AddOn_Bootstrap {

    public static function load() {

        if (! method_exists('GFForms', 'include_addon_framework')) {
            return;
        }
        // are we on GF 2.5+
        define('GFRS_GF_MIN_2_5', version_compare(GFCommon::$version, '2.5-dev-1', '>='));

        require_once('class-nu-range-slider.php');
        require_once('class-nu-range-slider-field.php');

        GFAddOn::register('GFRangeSliderAddOn');
    }
}

function gf_nu_range_slider() {
    return GFRangeSliderAddOn::get_instance();
}
