<?php

/**
 * Plugin Name:       Helloprint
 * Plugin URI:        https://www.helloprint.com/api
 * Description:       The Helloprint Connect API is the world’s largest API for customised print products, it’s the perfect way to boost your business with the help of Woocommerce.
 * Version:           2.0.7
 * Author:         	  Helloprint
 * Author URI:        https://www.helloprint.com/company
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       helloprint
 * Domain Path:       /languages
 */

use HelloPrint\Inc\Base\Activate;
use HelloPrint\Inc\Base\Deactivate;


defined('WPINC') or die('No script kiddies please!');

# ADD INFO ON RUNNING SECURITY TESTS SO PLUGIN DOESN"T GET SHUTDOWN#

# TO security run testing need to download plugin check https://wordpress.org/plugins/plugin-check/ 
# after downloads , goto tools , click plugin check option
# in dropdown select Helloprint plugin and select security and then check it 
# once run if any error found which type is ERROR in type column

#BEFORE UPDATING TAG MAKE SURE SECURITY TEST IS RUN#
defined('HELLOPRINT_VERSION') or define('HELL0PRINT_WFW_VERSION', '2.0.7');

define('HELLOPRINT_API_URL', 'https://api.helloprint.com/rest/v1/');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

if (file_exists(dirname(__FILE__) . '/includes/Base/Language.php')) {
   require_once dirname(__FILE__) . '/includes/Base/Language.php';
}

if (class_exists('HelloPrint\\Inc\\Init')) {
	HelloPrint\Inc\Init::register_services();
}

/**
 * Runs during plugin activation.
 */

function activate_helloprint_plugin()
{
	Activate::activate();
}

/** 
 * Runs during plugin deactivation.
 */

function deactivate_helloprint_plugin()
{
	Deactivate::deactivate();
}

if (file_exists(dirname(__FILE__) . '/includes/Base/ShortCode.php')) {
	require_once dirname(__FILE__) . '/includes/Base/ShortCode.php';
}
if (file_exists(dirname(__FILE__) . '/includes/Base/Functions.php')) {
    require_once dirname(__FILE__) . '/includes/Base/Functions.php';
}

register_activation_hook(__FILE__, 'activate_helloprint_plugin');

register_deactivation_hook(__FILE__, 'deactivate_helloprint_plugin');
