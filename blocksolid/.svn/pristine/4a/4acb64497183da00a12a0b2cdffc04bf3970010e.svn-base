<?php
/*
Plugin Name: Blocksolid
Plugin URI: https://www.peripatus.uk/blocksolid
Description: An overlay for the block editor to make it easier to use.
Version: 2.1.1
Author: Peripatus Web Design
Author URI: https://www.peripatus.uk
License: GPLv2 or later
Text Domain: blocksolid
*/

include_once( plugin_dir_path(__FILE__).'blocksolid-core.php');

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'blocksolid_add_plugin_page_settings_link');
function blocksolid_add_plugin_page_settings_link( $links ) {
    $links[] = '<a href="' .
        admin_url( 'options-general.php?page=blocksolid.php' ) .
        '">' . __('Settings') . '</a>';
    return $links;
}

?>