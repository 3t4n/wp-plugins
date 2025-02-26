<?php

/**
 * Exit if plugin file is accessed directly
 */
if (!defined('ABSPATH')) exit;

/**
 * If uninstall file is not called from WordPress, exit
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

/**
 * Unregister settings and delete options
 */
unregister_setting('address-bar-colorizer-settings-group', 'address-bar-colorizer-default-color');
unregister_setting('address-bar-colorizer-settings-group', 'address-bar-colorizer-sitewide-enabled');
delete_option('address-bar-colorizer-sitewide-enabled');
delete_option('address-bar-colorizer-default-color');

/**
 * Deletes all colors associated with individual posts
 */
delete_post_meta_by_key('address-bar-colorizer');