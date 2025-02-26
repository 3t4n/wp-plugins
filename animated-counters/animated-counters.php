<?php
/*
Plugin Name: Animated Counters
Description: Plugin for Animated Counters shortcodes
Author: ERALION.com
Author URI: https://www.ERALION.com
Text Domain: animatedcounters
Domain Path: /languages
Version: 2.0
*/
function animatedcounter_func($atts) {
	$atts['count'] = trim($atts['count']);
	$atts['duration'] = trim($atts['duration']);
	
	if (isset($atts['count'])) { $atts['count'] = filter_var($atts['count'], FILTER_SANITIZE_STRING); }
	if (isset($atts['duration'])) { $atts['duration'] = filter_var($atts['duration'], FILTER_SANITIZE_STRING); }
	if (isset($atts['css'])) { $atts['css'] = filter_var($atts['css'], FILTER_SANITIZE_STRING); }
	if (isset($atts['id'])) { $atts['id'] = filter_var($atts['id'], FILTER_SANITIZE_STRING); }
	if (isset($atts['color'])) { $atts['color'] = filter_var($atts['color'], FILTER_SANITIZE_STRING); }
	if (isset($atts['size'])) { $atts['size'] = filter_var($atts['size'], FILTER_SANITIZE_STRING); }
	
	if (isset($atts['count']) && is_numeric($atts['count'])) { $count=$atts['count']; } else { $count=100; }
	if (isset($atts['duration']) && is_numeric($atts['duration'])) { $duration=$atts['duration']; } else { $duration=4000; }
	$css='';
	if (isset($atts['css']) && !empty($atts['css'])) { $css=' '.$atts['css']; }
	$id='';
	if (isset($atts['id']) && !empty($atts['id'])) { $id=' '.$atts['id']; }
	$style='style="';
	if (isset($atts['color']) && !empty($atts['color'])) { $style.='color:'.$atts['color'].';'; }
	if (isset($atts['size']) && !empty($atts['size'])) { $style.='font-size:'.$atts['size'].';line-height:'.$atts['size'].';'; }
	$style.='"';
	return '<span class="animatedcounters'.$css.'"'.$id.' '.$style.' counter-lim="'.$count.'" data-duration="'.$duration.'"></span>';
}
add_shortcode( 'animatedcounter', 'animatedcounter_func' );


function animatedcounters_add_scripts(){	
	wp_register_script( 'jsanimatedcounter', plugins_url( 'js/app.js', __FILE__ ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jsanimatedcounter' );
}
add_action( 'wp_enqueue_scripts', 'animatedcounters_add_scripts' );

add_action( 'init', 'animatedcounters_buttons' );
function animatedcounters_buttons() {
	add_filter("mce_external_plugins", "animatedcounters_add_buttons");
    add_filter('mce_buttons', 'animatedcounters_register_buttons');
}	
function animatedcounters_add_buttons($plugin_array) {
	$plugin_array['wptuts'] = plugins_url( 'js/animated-counters.min.js', __FILE__ );
	return $plugin_array;
}
function animatedcounters_register_buttons($buttons) {
	array_push( $buttons, 'animatedcounter');
	return $buttons;
}

function load_jquery() {
    if ( ! wp_script_is( 'jquery', 'enqueued' )) {
        wp_enqueue_script( 'jquery' );
    }
}
add_action( 'wp_enqueue_scripts', 'load_jquery' );
?>