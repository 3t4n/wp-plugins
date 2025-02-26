<?php
/*
Plugin Name: Easy Admin Menu By Corpsoft Solutions
Plugin URI: https://corpsoftsolutions.com/easy-admin-menu-wordpress-plugin/
Description: Hide elements in admin menu
Version: 1.0
Author: Corpsoft Solutions
Author URI: https://corpsoftsolutions.com
License: GNU
*/


function easy_admin_menu_by_corpsoft_solutions() {
    ?>
        <style>
            li#menu-plugins {
    display: none;
}
li#menu-appearance {
    display: none;
}
li#menu-settings {
    display: none;
}
li#menu-users {
    display: none;
}
li#menu-tools {
    display: none;
}
li#toplevel_page_wpseo_dashboard {
    display: none;
}
li#wp-admin-bar-updates {
    display: none;
}
li#wp-admin-bar-edit-profile {
    display: none;
}
ul#wp-admin-bar-user-actions {
    display: none;
}
.update-nag {
    display: none;
}
div#screen-options-link-wrap {
    display: none;
}
div#contextual-help-link-wrap {
    display: none;
}
div#dashboard_site_health {
    display: none;
}
li#wp-admin-bar-comments {
    display: none;
}
li#wp-admin-bar-new-content {
    display: none;
}
li#wp-admin-bar-wp-logo {
    display: none;
}
div#dashboard_right_now {
    display: none;
}
p#footer-upgrade {
    display: none;
}
span#footer-thankyou {
    display: none;
}
li#wp-admin-bar-customize {
    display: none;
}
ul#wp-admin-bar-appearance {
    display: none;
}
        </style>
    <?php
}
add_action('admin_head', 'easy_admin_menu_by_corpsoft_solutions');
add_action('wp_head', 'easy_admin_menu_by_corpsoft_solutions');
?>