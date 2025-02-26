<?php

/*
Plugin Name: Auto-slug
Plugin URI: http://num8er.me/wordpress-plugins/auto-slug.zip
Description: Generate the post permalink while typing the title
Author: num8er
Author URI: https://www.linkedin.com/in/num8er
Version: 1.0
*/

function autoslug_enqueueJS($hook) {
    if( 'post.php' != $hook && 'post-new.php' != $hook )
        return;
    wp_enqueue_script('autoslug', plugin_dir_url(__FILE__) . '/auto-slug.js');
}
add_action('admin_enqueue_scripts', 'autoslug_enqueueJS');
