<?php
/*
Plugin Name: Admin Menu on Right
Plugin URI: http://luke.gedeon.name/wordpress-admin-menu-on-right-plugin.html
Description: Moves WordPress Admin to right side of screen.
Author: Luke Gedeon
Version: 1.0
Author URI: http://luke.gedeon.name/
*/

function admin_menu_on_right_load() {
    $url = get_settings('siteurl');
    $url = $url . '/wp-content/plugins/admin-menu-on-right/admin-menu-on-right.css';
    echo '<link rel="stylesheet" type="text/css" href="' . $url . '" />';
}

add_action('admin_head', 'admin_menu_on_right_load');

function admin_menu_on_right_footer() {
   echo 'Menu moved to the right by <a href="http://luke.gedeon.name/wordpress-admin-menu-on-right-plugin.html">Admin Menu on Right Plugin</a>.';
}

add_action('admin_footer', 'admin_menu_on_right_footer');

?>