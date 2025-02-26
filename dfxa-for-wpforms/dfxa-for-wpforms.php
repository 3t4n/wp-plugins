<?php
/*
Plugin Name: Dynamic Input For WPForms
Plugin URI: https://wpdebuglog.com/
Description: Easily add dynamic text, dynamic hidden fields, and advanced customization to WPForms.
Author: Arshid
Author URI: http://wpdebuglog.com/
Text Domain: dfxa-for-wpforms
Version: 1.0.0
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.htm
*/



add_action('init', 'dfxa_fields_init', 99);

function dfxa_fields_init(){

    require plugin_dir_path(__FILE__) . '/text.php';
    require plugin_dir_path(__FILE__) . '/input.php';
    require plugin_dir_path(__FILE__) . '/hidden.php';

    new DFXA_Field_Text;
    new DFXA_Field_Hidden();

    add_shortcode('dfxa_get_url', ['DFXA_Input', 'get_url']);
    add_shortcode('dfxa_bloginfo', ['DFXA_Input', 'get_bloginfo']);
    add_shortcode('dfxa_referrer', ['DFXA_Input', 'get_referrer']);
    add_shortcode('dfxa_post_var', ['DFXA_Input', 'get_post_var']);
    add_shortcode('dfxa_post_meta', ['DFXA_Input', 'get_custom_field']);
    add_shortcode('dfxa_GET', ['DFXA_Input', 'get_param']);

}