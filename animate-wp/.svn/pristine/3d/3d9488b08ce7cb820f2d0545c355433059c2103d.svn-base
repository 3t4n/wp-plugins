<?php
/*
 * Add my new menu to the Admin Control Panel
 */
 
// Add a new top level menu link to the WPA

define ("ANIMATE_WP_DIR_PATH", plugin_dir_path(__FILE__));
function animate_wp_Add_My_Admin_Link()
{
      add_menu_page(
        'Animate WP Settings', // Title of the page
        'Animate WP', // Text to show on the menu link
        'manage_options', // Capability requirement to see the link
        'animate-wp', /// The 'slug' - file to display when clicking the link
        'animate_wp_settings'
    );
}

// Hook the 'admin_menu' action hook, run the function named 'animate_wp_Add_My_Admin_Link()'
add_action( 'admin_menu', 'animate_wp_Add_My_Admin_Link' );

function animate_wp_settings() {
    include_once ANIMATE_WP_DIR_PATH . "awp-settings-page.php";
}