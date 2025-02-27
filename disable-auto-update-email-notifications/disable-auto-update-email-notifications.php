<?php
/**
* Plugin Name: Disable auto-update Email Notifications 
* Plugin URI: https://gutoz.com
* Description: This plugin performs a simple task of disabling email notifications that are sent by WordPress when a plugin or theme auto-updates.
* Version: 1.5.0
* Author: Gutoz
* Author URI: https://gutoz.com
**/

// Disable plugins auto-update email notifications .
add_filter( 'auto_plugin_update_send_email', '__return_false' );
 
// Disable themes auto-update email notifications.
add_filter( 'auto_theme_update_send_email', '__return_false' );