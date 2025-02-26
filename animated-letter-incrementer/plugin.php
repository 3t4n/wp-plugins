<?php

/*
Plugin Name: Animated Letter Incrementer
Version: 0.1
Description: Turn any word into an animation that increments each letter of the word starting from A until it reaches the destination letter.
Author: Chase Cattaneo
Author URI: http://www.activetechnologies.com
Plugin URI: http://activetechnologies.com/animated-letter-incrementer/
*/

/* Version check */
global $wp_version;
$exit_msg='Animated Letter Incrementer requires WordPress 2.5 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';
if (version_compare($wp_version,"2.5","<"))
{
exit ($exit_msg);
}

wp_enqueue_style('letter_incrementer_styles', plugin_dir_url(__FILE__) . 'css/style.css');
wp_enqueue_script('jquery_core_script', 'https://code.jquery.com/jquery-3.0.0.js', array('jquery'));
wp_enqueue_script('letter_incrementer_script', plugin_dir_url(__FILE__). 'js/animated-letter-incrementer.js', array('jquery'));

?>