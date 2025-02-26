<?php
/*
   Plugin Name: Buttonify-Dropshipping
   Plugin URI: https://buttonify.net/home
   Version: 1.0.2
   Author: buttonify.net
   Description: Buttonify Dropshipping allows you to easily import Aliexpress, Alibaba best-selling products and automate your entire dropshipping process
   Text Domain: Buttonify-dropshipping
   Author URI: https://www.buttonify.net/home
   License: GPL v2 or later
   License URI: http://www.gnu.org/licenses/gpl-2.0.html
   Requires Plugins: woocommerce
  */

if ( ! defined( 'ABSPATH' ) ) exit;

//PHP minimum required version
$buttonify_minimalRequiredPhpVersion = '5.6';

/**
 * Prompt after PHP version error
 */
function buttonify_noticePhpVersionWrong()
{
    global $buttonify_minimalRequiredPhpVersion;
    echo '<div class="updated fade">Buttonify requires a newer version of PHP to be running </div>';
}

/**
 * Check version
 */
function buttonify_PhpVersionCheck()
{
    global $buttonify_minimalRequiredPhpVersion;
	$minimalRequiredPhpVersion = '5.6';
	if ($buttonify_minimalRequiredPhpVersion != null) {
		$minimalRequiredPhpVersion = $buttonify_minimalRequiredPhpVersion;
	}
    if (version_compare(phpversion(), $minimalRequiredPhpVersion) < 0) {
        add_action('admin_notices', 'buttonify_noticePhpVersionWrong');
        return false;
    }
    return true;
}

/**
 *  Initialize the internationalization of this plugin (i18n). Different voices, none, default English
 *
 * @return void
 */
function buttonify_i18n_init()
{
    $pluginDir = dirname(plugin_basename(__FILE__));
    load_plugin_textdomain('buttonify', false, $pluginDir . '/languages/');
}


// Adding method
add_action('plugins_loadedi', 'buttonify_i18n_init');


//Check PHP version
if (!buttonify_PhpVersionCheck()) {
    // Only load and run the init function if we know PHP version can parse it
    return;
}

include_once 'Buttonify_init.php';
buttonify_init(__FILE__);

//Define external AJAX interface
require_once 'Buttonify_AJAX.php';
function buttonify_disconnect_init()
{
    $aPlugin = new Buttonify_AJAX();
    $aPlugin->buttonify_disconnect();
}

function buttonify_connect_key_init()
{
    $aPlugin = new Buttonify_AJAX();
    $aPlugin->buttonify_connect_key();
}

function buttonify_refresh_init()
{
    $aPlugin = new Buttonify_AJAX();
    $aPlugin->buttonify_refresh();
}

// Interface Join Action
add_action('wp_ajax_buttonify_disconnect', 'buttonify_disconnect_init');
add_action('wp_ajax_buttonify_connect_key', 'buttonify_connect_key_init');
add_action('wp_ajax_buttonify_refresh', 'buttonify_refresh_init');

