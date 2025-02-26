<?php
/*
Plugin Name: Animated Buttons with CSS3
Plugin URI: http://nexxuz.com/animated-buttons-with-css3-plugin-wordpress-para-generar-botones-animados.html
Description: Animated Buttons with CSS3 for you to use in your post, you can use them to download buttons, buttons for hyperlinks (links), or for whatever you want!
Version: 0.1
Author: Jodacame
Author URI: http://nexxuz.com
License: GPLv2 o posterior
*/

function button_jc($atts, $content = null) {
	global $post;
		
	extract(shortcode_atts(array(
		"type" => 'BBlue',		
		"size" => '3',
		"label" => ''
	), $atts));	
	
	$sizeB = array('1' => "big",'2' => "meddium", '3' => "small");
	$colorB = array("BBlue" => "blue", "BOrange" => "orange", "BGray" => "gray", "BGreen" => "green");
	
	$boton = '<a href="'.$content.'" class="button_jc '.$sizeB[$size].'  '.$colorB[$type].' '.$type.'">'.$label.'</a>';
	return $boton;
}
add_shortcode("button_jc", "button_jc");

// REGISTRAMOS LOS BOTONES
add_action('init', 'add_button');  
function add_button() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
   {
     add_filter('mce_external_plugins', 'add_plugin');
     add_filter('mce_buttons', 'register_button');
   }
}

function register_button($buttons) 
{
   array_push($buttons, "BBlue");
   array_push($buttons, "BOrange");
   array_push($buttons, "BGray");
   array_push($buttons, "BGreen");
   
   return $buttons;
}

function add_plugin($plugin_array) {
   $plugin_array['BBlue'] = WP_PLUGIN_URL.'/animated-buttons-with-css3/js/BBlue.js';
   $plugin_array['BOrange'] = WP_PLUGIN_URL.'/animated-buttons-with-css3/js/BOrange.js';
   $plugin_array['BGray'] = WP_PLUGIN_URL.'/animated-buttons-with-css3/js/BGray.js';
   $plugin_array['BGreen'] = WP_PLUGIN_URL.'/animated-buttons-with-css3/js/BGreen.js';
   return $plugin_array;
}

function theme_styles()  
{ 
  wp_register_style( 'custom-style',WP_PLUGIN_URL . '/animated-buttons-with-css3/style.css', array(), '201202082a',  'all' );
  wp_enqueue_style( 'custom-style' );
}
add_action('wp_enqueue_scripts', 'theme_styles');
