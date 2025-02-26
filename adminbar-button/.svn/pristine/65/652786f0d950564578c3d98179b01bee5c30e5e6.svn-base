<?php

/*
Plugin Name: Hide Adminbar Button
Plugin URI: http://autoloadmanager.shawnsandy.com
Description: AdminbarButton is a very simple plugin that hides the bar and adds a small button @ bottom of the site that allows you to show/hide it if it gets in your way as it sometimes can! ***Warning this plugin is wrapped with option(s) free packaging***
Author URI: http://shawnsandy.com
Version: 0.2 Beta
*/

function adminbar_button_scripts(){

    wp_register_script('adminbar-button', plugins_url("adminbar-btn.js",__FILE__), array('jquery'), NULL, TRUE);
    wp_register_style('adminbar-button-style', plugins_url('/adminbar-button.css',__FILE__));
    wp_enqueue_script('adminbar-button');
    wp_enqueue_style('adminbar-button-style');

}

if(is_user_logged_in())
add_action('wp_enqueue_scripts', 'adminbar_button_scripts',1);