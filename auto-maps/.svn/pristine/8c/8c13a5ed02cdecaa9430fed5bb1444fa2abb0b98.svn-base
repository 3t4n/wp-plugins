<?php
/*
Plugin Name: Auto Maps
Plugin URI: http://www.idiotinside.com/automaps-wordpress-plugin/
Description: Turn <address> tag into Google map embeds automatically.
Version: 1.0.0
Author: Suresh Kumar
Author URI: http://profiles.wordpress.org/sureshdsk/
License: GPL2
*/

/* TADA */
function automap_scripts(){

    wp_enqueue_script('auto-maps',plugin_dir_url(__FILE__) . 'auto-maps.js',array( 'jquery' ));

}

add_action('wp_enqueue_scripts','automap_scripts');


