<?php 
/*
Plugin Name:Bootstrap 4 Progress Bar
Plugin URI: http://infinityflamesoft.com
Version: 1.0.1
Author: Abdullah Nahian
Author URI: https://www.anahian.com/about-us
Donate link: https://www.anahian.com/donate
Tags: elementor, elementor addon
Requires at least: 5.8
Tested up to: 6.4.1
Stable tag: 1.0.1
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

/*Seting Up*/
define('NAHIAN_PROGRESS_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );


/* Adding Latest jQuery from Wordpress */
function nahian_progressbar_latest_jquery_wp() {
	wp_enqueue_script('jquery');
}
add_action('init', 'nahian_progressbar_latest_jquery_wp');

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');




/* Adding Plugin custm CSS file */
function nahian_stylesheet_to_admin() {
wp_enqueue_style('nahian-progressbar-bootstrap-style', NAHIAN_PROGRESS_PLUGIN_PATH.'css/bootstrap.min.css');
}
add_action ('init', 'nahian_stylesheet_to_admin');






function progressbar_basic_shortcode( $atts, $content = null  ) {

	extract( shortcode_atts( array(
		'width' => '40',
		'height' => '',
		'bg_color' => 'blue',
		'text' => '',
		'heading' => '',
		'font_size' => ''
		
	), $atts ) );

	return '
		 <div class="progress" style="margin-bottom:20px;height:'.$height.'px">
		  <div class="progress-bar" role="progressbar" style="width: '.$width.'%;background-color:'.$bg_color.';font-size:'.$font_size.'px" aria-valuenow="'.$width.'" aria-valuemin="0" aria-valuemax="100">'.$text.'</div>
		</div>
	';
}	
add_shortcode('progressbar_basic', 'progressbar_basic_shortcode');


function progressbar_stripped_shortcode( $atts, $content = null  ) {

	extract( shortcode_atts( array(
		'width' => '40',
		'height' => '',
		'bg_color' => 'blue',
		'text' => '',
		'heading' => '',
		'font_size' => ''
	), $atts ) );

	return '
		 <div class="progress" style="margin-bottom:20px;height:'.$height.'px">
		  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: '.$width.'%;background-color:'.$bg_color.';font-size:'.$font_size.'px" aria-valuenow="'.$width.'" aria-valuemin="0" aria-valuemax="100">'.$text.'</div>
		</div>
	';
}	
add_shortcode('progressbar_stripped', 'progressbar_stripped_shortcode');


function progressbar_animated_shortcode( $atts, $content = null  ) {

	extract( shortcode_atts( array(
		'width' => '40',
		'height' => '',
		'bg_color' => 'blue',
		'text' => '',
		'heading' => '',
		'font_size' => ''
	), $atts ) );

	return '
		 <div class="progress" style="margin-bottom:20px;height:'.$height.'px">
		  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: '.$width.'%;background-color:'.$bg_color.';font-size:'.$font_size.'px" aria-valuenow="'.$width.'" aria-valuemin="0" aria-valuemax="100">'.$text.'</div>
		</div>
	';
}	
add_shortcode('progressbar_animated', 'progressbar_animated_shortcode');