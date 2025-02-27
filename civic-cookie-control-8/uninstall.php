<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://www.civicuk.com/
 * @since      1.0.0
 *
 * @package    Civic_Cookie_Control_8
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$ccc_options_to_delete =['civic_cookie_control_version','civic_cookiecontrol_apikey_version','civic_cookiecontrol_productval','civic_cookiecontrol_settings','civic_cookiecontrol_settings_v9','cookiecontrol_settings'];

foreach ($ccc_options_to_delete as $ccc_option_to_delete) :

    if(get_option($ccc_option_to_delete)){

        delete_option($ccc_option_to_delete);

    }

endforeach;