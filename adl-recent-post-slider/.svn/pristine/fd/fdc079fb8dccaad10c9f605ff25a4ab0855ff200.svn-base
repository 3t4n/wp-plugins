<?php

/**
 * Enables shortcode for Widget
 */
add_filter('widget_text', 'do_shortcode');

/*
 * Load Text domain after plugin has been loaded
 * */
add_action('plugins_loaded', 'adl_rec_post_load_textdomain');
function adl_rec_post_load_textdomain(){
    load_plugin_textdomain(A_RCP_TEXTDOMAIN, false, plugin_basename( dirname( __FILE__ ) ) . '/languages/');
}

/**
 * Pro Version link
 */

function aps_pro_version_link( $links ) {
    $links[] = '<a href="http://adlplugins.com/plugin/adl-recent-post-slider-pro" title="Upgrade to PRO version for Priority SUPPORT and Many Amazing Features." target="_blank">Get Pro Version</a>';
    return $links;
}
add_filter( 'plugin_action_links_' . A_RCP_BASENAME, 'aps_pro_version_link' );


/**
 * Upgrade & Support submenu pages
 */
function adl_rec_post_upgrade_support_submenu_pages() {
    add_submenu_page( 'edit.php?post_type=adl_rec_post', __('Upgrade to Pro', A_RCP_TEXTDOMAIN), __('<span style="color:#eaff1a;">Unlock More</span>', A_RCP_TEXTDOMAIN), 'manage_options', 'upgrade', 'adl_rec_post_upgrade_callback' );

}
add_action('admin_menu', 'adl_rec_post_upgrade_support_submenu_pages');


function adl_rec_post_upgrade_callback( ){
    include('a-rcp-upgrade.php');
}



