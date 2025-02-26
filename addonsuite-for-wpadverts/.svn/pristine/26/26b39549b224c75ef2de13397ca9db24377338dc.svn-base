<?php
/* 
 * AddonSuite uninstaller
 */

global $wpdb;

if(!defined("WP_UNINSTALL_PLUGIN")) {
    return;
}

// delete all options with name starting with 'adosui_'
$results = $wpdb->get_results( "SELECT option_name, option_value FROM $wpdb->options WHERE (option_name LIKE 'adosui_%') ");

foreach($results as $option) {
    delete_option($option->option_name);
}