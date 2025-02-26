<?php
defined('ABSPATH') or die("No script kiddies please!");

/*
* Plugin Name: Bleep Testimonials
* Description: Testimonial plugin for Wordpress
* Version: 1.0
* Author: Bleep Web
* Author URI: http://www.bleepweb.co.uk
*/

function add_css(){
        wp_enqueue_style( 'test_styles', plugins_url('/style.css', __FILE__), false, '1.0.0', 'all');
    }
add_action('wp_enqueue_scripts', "add_css");


function testimonial($atts, $content = null){

	$a = shortcode_atts( array(
    	'author' => '',
    	'authorimage' => '',
    ), $atts );


	if ($a['authorimage'] == '') {
		
		$html = "<blockquote class='testimonial'>" . $content . "</blockquote><div class='arrow-down'></div><p class='testimonial-author'>{$a['author']}</p>";

	} else {

		$html = "<blockquote class='testimonial'>" . $content . "</blockquote><div class='arrow-down'></div><p class='testimonial-author'><img width='75' height='37' src='{$a['authorimage']}'></p>";

	}

	return $html;

}

add_shortcode('testimonial', 'testimonial');
?>