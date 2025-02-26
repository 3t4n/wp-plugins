<?php  
/*
Plugin Name: Atomic Penguins Shortcode on Text Widget
Description: Make your text widget accept shortcodes.
Author: Atomic Penguin
Author URL: http://atomicpenguins.com/
Version: 1.0
*/

add_filter('widget_text', 'do_shortcode');

?>