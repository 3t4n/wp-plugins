<?php

/*
Plugin Name: Animated Number Counter
Version: 0.1
Description: Turn any number into an animated number counter! The number will count starting from 1 until reaching whatever number you set.
Author: Chase Cattaneo
Author URI: http://www.activetechnologies.com
Plugin URI: http://activetechnologies.com/animated-number-counter/
*/

/* Version check */
global $wp_version;
$exit_msg='Animated Number Counter requires WordPress 2.5 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';
if (version_compare($wp_version,"2.5","<"))
{
exit ($exit_msg);
}

wp_enqueue_style('number_counter_styles', plugin_dir_url(__FILE__) . 'css/style.css');
wp_enqueue_script('jquery_core_script', 'https://code.jquery.com/jquery-3.0.0.js', array('jquery'));
wp_enqueue_script('number_counter_script', plugin_dir_url(__FILE__). 'js/animated-number-counter.js', array('jquery'));

?>