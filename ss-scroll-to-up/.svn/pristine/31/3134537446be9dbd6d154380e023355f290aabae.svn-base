<?php
/**
 * @package SS_SROLL_TO_UP
 * @version 2.1.1
 */
/*
Plugin Name: SS SCROLL TO UP
Plugin URI: http://sobshomoy.com/plugins/ss-scroll-to-up
Description: This plugin will use sroll up your pages.
Author: Shiful Islam
Version: 2.1.1
Author URI: http://bn.hs-bd.com
*/

//fix up path
define('ss_scroll_to_up_path', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );

// load wordpress default icons

function ss_load_dashicons() {
             wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'ss_load_dashicons' );

// load jquery and styles
function ss_scroll_to_up_script(){
              wp_enqueue_script('jquery');//Default Jquery
              wp_enqueue_script('easing_f_', ss_scroll_to_up_path.'js/easing.js',array('jquery'), '1.0', true);
              wp_enqueue_script('ss-scrol_to_up', ss_scroll_to_up_path.'js/jquery.ui.totop.js', array('jquery'), '1.0', true);
              wp_enqueue_script('ss-scrol_up-active', ss_scroll_to_up_path.'js/activate.js', array('jquery'), '1.0', true);
              wp_enqueue_style('ss_style_up', ss_scroll_to_up_path.'css/style.css', array('dashicons'));
			  }

add_action('init', 'ss_scroll_to_up_script');


?>