<?php
/*
Plugin Name: KP Fastest Tidio Chat
Description: The fastest way to implement Tidio chat in your WordPress website.
Version: 1.0.4
Contributors: kreativopro
Author: Kreativo Pro
Author URI: https://www.kreativopro.com/
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: kp-fastest-tidio-chat
Domain Path:  /languages
*/


// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}


// Define Constants
define('KPFTC_VERSION', '1.0.4');
define('KPFTC_FILE_BASENAME', basename(__FILE__) );
define( 'KPFTC_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'KPFTC_PLUGIN_BASENAME', plugin_basename(__FILE__) );


//Register Plugin Activation/Deactivation Hook
register_activation_hook( __FILE__, 'kpftc_admin_notice_transient' );
register_uninstall_hook( __FILE__, 'kpftc_delete_settings' );


//include Frontend Plugin Files
include('includes/kpftc-init-config.php');
include('includes/kpftc-frontend.php');
include('includes/kpftc-shortcuts.php');


//include Backend Plugin Files
include('includes/admin/kpftc-admin-settings-init.php');