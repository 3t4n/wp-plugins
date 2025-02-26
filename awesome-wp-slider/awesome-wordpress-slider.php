<?php
/*==========================================================
 * @package awesome_wordpress_slider
 * @version 1.0.0
 */
/*
Plugin Name: Awesome Wordpress Slider
Plugin URI: http://jalil.thenextlevel.com.au/
Description: Awesome Wordpress Slider is the most powerful and intuitive WordPress plugin to create sliders which was never possible before. Fully responsive, SEO optimized and works with any WordPress theme. Create beautiful sliders and tell stories without any code..
Author: jewel1994
Version: 1.0.0
Author URI: http://fiverr.com/jewelnasir
============================================================*/

// Exit if accessed directly 
if (! defined('ABSPATH')){
    exit;
}

// Define
define('JAL_AWS_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/');
define('JAL_AWS_PATH', plugin_dir_path( __FILE__ ));

// Print Shortcode in widget
add_filter( 'widget_text', 'do_shortcode' );

// Theme Shortcode
require_once(JAL_AWS_PATH . 'theme-shortcodes/theme-slide.php');
//Loading custom post type file
require_once(JAL_AWS_PATH . 'inc/slider-toolkit-post-type.php');

// Metabox Options 
require_once(JAL_AWS_PATH . 'inc/cs-framework/cs-framework.php'); 
require_once(JAL_AWS_PATH . 'inc/metabox-and-option.php'); 



// Load plugin textdomain.
function aws_textdomain(){
  load_plugin_textdomain( 'aws-toolkit', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action('plugin_loaded' , 'aws_textdomain');

//Register Toolkit Files
function aws_toolkit_files(){
    wp_enqueue_style( 'animate', plugin_dir_url( __FILE__ ) .'assets/css/animate.min.css' );
    wp_enqueue_style( 'owl-theme-default', plugin_dir_url( __FILE__ ) .'assets/css/owl.theme.default.css' );
    wp_enqueue_style( 'owl-carouel', plugin_dir_url( __FILE__ ) .'assets/css/owl.carousel.css' );
    wp_enqueue_style( 'slider-toolkit', plugin_dir_url( __FILE__ ) .'assets/css/slider-toolkit.css' );
    wp_enqueue_script('owl-carousel', plugin_dir_url( __FILE__ ) .'assets/js/owl.carousel.min.js', array('jquery'), '3.0.4', true);
    wp_enqueue_script('wow', plugin_dir_url( __FILE__ ) .'assets/js/wow.min.js', array('jquery'), '3.0.4', true);
    wp_enqueue_script('slider-active', plugin_dir_url( __FILE__ ) .'assets/js/active.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'aws_toolkit_files');