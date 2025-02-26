<?php

/**
 * @wordpress-plugin
 * Plugin Name: Fresh Fast Website Security Plugin
 * Plugin URI: http://www.freshfastwebsite.com/wordpress-security-plugin
 * Description: Fresh Fast Website Security Plugin checks and adds additional security to WordPress (for example removes wp_generator meta tag etc.)
 * Version: 0.0.5
 * Author: Ondrej7
 * Author URI: http://www.freshfastwebsite.com/
 * Text Domain: ffw_security
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC'))
{
	die();
}

/*----------------------------------------------------------------------------*
 * All needed classes
 *----------------------------------------------------------------------------*/
require_once (plugin_dir_path(__FILE__) . 'includes/ffw-security-options.php');
require_once (plugin_dir_path(__FILE__) . 'includes/ffw-security-hardening.php');
require_once (plugin_dir_path(__FILE__) . 'admin/includes/ffw-security-tools.php');
require_once (plugin_dir_path(__FILE__) . 'admin/includes/ffw-security-widget.php');

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once (plugin_dir_path(__FILE__) . 'public/ffw-security.php');

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook(__FILE__, array(
	'FFWSecurityPlugin',
	'activate' 
));
register_deactivation_hook(__FILE__, array(
	'FFWSecurityPlugin',
	'deactivate' 
));

add_action('plugins_loaded', array(
	'FFWSecurityPlugin',
	'getInstance' 
));

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX))
{
	
	require_once (plugin_dir_path(__FILE__) . 'admin/ffw-security-admin.php');
	add_action('plugins_loaded', array(
		'FFWSecurityPluginAdmin',
		'getInstance' 
	));
}
