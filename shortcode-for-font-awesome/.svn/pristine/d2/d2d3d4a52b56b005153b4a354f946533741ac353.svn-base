<?php

/*
Plugin Name: Shortcode for Font Awesome
Description: Insert Shortcode for Font Awesome in Editor. Here the pure Shortcode is generated. No Font Awesome Files are included. These must already be loaded in WordPress. Use: [fa set="fas" icon="check" size="2x" color="#000000"] anywhere in WordPress
Version: 1.4.6
Author: SMG-Webdesign
Author URI: http://www.smg-webdesign.de
License: GPLv2
*/

// Check if plugin is loaded via WordPress
if (!defined('ABSPATH')) {exit;}

// Filter to use Shortcode in Text Widgets
add_filter('widget_text', 'do_shortcode');

// Filter to use Shortcode in Navigation Menus
add_filter('wp_nav_menu', 'do_shortcode', 11);

// [fa set="fas" icon="wordpress"]
function faicon_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'set' => 'fas',
		'icon' => 'check',
        'size' => '',
        'color' => '',
	), $atts );
    
    // Check if Icon Size is Set
    if (isset($a['size']) && $a['size'] !== ''){
        $icon_size = ' fa-' . $a['size'];
    } else {
        $icon_size = '';
    }

    // Check if Icon Color is Set
    if (isset($a['color']) && $a['color'] !== ''){
        $icon_color = 'color:'.$a['color'].';';
    } else {
        $icon_color = '';
    }
   
    // Generate Code to insert
	return '<i class="'.esc_attr($a['set']).' fa-'.esc_attr($a['icon']).esc_attr($icon_size).'" style="'.esc_attr($icon_color).'"></i>';
}

// Insert shortcode
add_shortcode( 'fa', 'faicon_shortcode' );

?>