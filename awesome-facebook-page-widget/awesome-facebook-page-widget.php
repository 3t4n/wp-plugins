<?php
/**
 * Plugin Name: Awesome Facebook Page Widget
 * Plugin URI: http://www.awesomesliders.com
 * Description: Powered by Awesome Sliders - Simple yet useful Awesome Facebook Page Widget.
 * Version: 1.0
 * Author: Awesome Sliders
 * Author URI: http://www.awesomesliders.com
 * License: GPLv2 or later
 */


// include widget class

require_once('class.awesome-facebook.php');

// register the widget

function register_awesome_facebook_page_Widget(){
    register_widget('Awesome_Facebook');
}

add_action('widgets_init','register_awesome_facebook_page_Widget');