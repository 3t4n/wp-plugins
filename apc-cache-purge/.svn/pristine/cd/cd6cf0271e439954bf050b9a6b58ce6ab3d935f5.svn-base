<?php
/**
 * @package APC Cache Purge
 */
/*
Plugin Name: APC Cache Purge
Plugin URI: http://www.2020media.com/
Description: This is a simple, single purpose plugin to completely flush the APC cache. To use, go to Tools and click Purge APC.
Version: 1.0
Author: 2020Media
Author URI: http://wordpress.org/plugins
License: GPLv2 or later
Text Domain: APC Cache Purge
*/

function apc_purge() {
if (function_exists('apc_clear_cache')) {
    return apc_clear_cache('opcode');
    } else {
    return false;
    }
}
// Add Purge APC menu under Tools menu
add_action('admin_menu', 'php_apc_info');

function php_apc_info() {
    add_submenu_page('tools.php', 'Purge APC', 'Purge APC', 'activate_plugins', 'flush_php_apc', 'php_apc_options');
}

function php_apc_options() {
    if (apc_purge() && apc_purge('user'))
        print '<p>Success!</p>';
    else {
        print '<p>Clearing Failed!</p>';
        if (function_exists('apc_clear_cache')) {
    		print '<pre>'; print_r(apc_cache_info()); print '</pre>';
    		 		} else {
			         print 'APC not installed on this system';
                }
    	}
}
// Add Purge APC in the favorite actions dropdown
add_filter('favorite_actions', 'clear_apc_link');

function clear_apc_link($actions) {
    $actions['tools.php?page=flush_php_apc'] = array('Purge APC', 'edit_posts');
    return $actions;
}
?>
