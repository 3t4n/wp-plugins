<?php
/*
Plugin Name: ACF Repeater
Plugin URI: https://wordpress.org/plugins/acf-repeater
Description: The repeater field for Advanced Custom Fields
Author: MoiVui
Author URI: http://photoboxone.com/donate/?developer=moivui
Version: 5.10.2
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

function acf_repeater_dir()
{
    return __DIR__;
}

function acf_repeater_ver()
{
    return '5.10.2';
}

function acf_repeater_url( $path )
{
    return plugins_url( $path, __FILE__);
}

/** 
 * If WP has acf plugin, the acf reprepeater will used
 */
add_action('acf/include_field_types', function(){
    require acf_repeater_dir() . '/includes/class-acf-field-repeater.php';
}, 10);