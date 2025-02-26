<?php 
/*
Plugin Name: Ask Global Scroll Up Plugin
Description: This plugin will add scroll to top option in your wordpress site.
Plugin URI: http://ask-global.com
Author:Ask-Global
Author URI: http://shakilchowdhury.com
Version:1.1
*/


/* latest wordpress jquery*/

function ask_global_scroll_up(){
	wp_enqueue_script('jquery');
}
add_action('init', 'ask_global_scroll_up');

/* setup*/
define('ASK_GLOBAL_SCROLL_URL', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');

wp_enqueue_script('ask_global_easing', ASK_GLOBAL_SCROLL_URL.'js/jquery.easing.min.js', array('jquery'));
wp_enqueue_script('ask_global_scrollup', ASK_GLOBAL_SCROLL_URL.'js/jquery.scrollUp.min.js', array('jquery'));
wp_enqueue_script('ask_global_main_js', ASK_GLOBAL_SCROLL_URL.'js/main.js', array('jquery'));

wp_enqueue_style('ask_global_style', ASK_GLOBAL_SCROLL_URL.'css/style.css');

 ?>