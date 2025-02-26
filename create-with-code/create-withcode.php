<?php
/*
Plugin Name: Create with code
Plugin URI: https://github.com/pddring/create-withcode
Description: Share and run python code from create.withcode.uk with a shortcode
Version: 1.4
Author: Pete Dring
Author URI: http://blog.withcode.uk
License: GPL2
*/
if ( !function_exists( 'add_action' ) ) {
	exit;
}

function withcode_sc($atts){
    $a = shortcode_atts( array(
        'id' => 'T',
        'mode' => 'embed',
        'width' => '100%',
        'height' => '400px',
        'grey' => '0',
        'hue' => '0'
    ), $atts );

    $height = '400px';

    if($a['grey'] != '0') {
        $a['id'] .= '/grey';
    }
    if($a['hue'] != '0') {
        $a['id'] .= '/hue/' . $a['hue'];
    }
    
    $mode = 'embed';
    switch($a['mode']) {
        case 'run':
           $mode = 'run';
           break;
        case 'kpride':
            $mode = 'kpride';
            $height = '800px';
            break;
    }
    
    $html = '<iframe frameborder="0" width="' . esc_attr($a['width']) . '" height="' . 
        esc_attr($height) . '" src="https://create.withcode.uk/' . esc_attr($mode) . '/' . 
        esc_attr($a['id']) . '"><a target="_blank" href="https://create.withcode.uk/python/' . 
        esc_attr($a['id']) . '">create.withcode.uk</a></iframe>';
    return $html;
}

add_shortcode("withcode", 'withcode_sc');

