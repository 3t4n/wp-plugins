<?php
/**
 * @file
 * Configuration constants and setup. Change at your own risk.
 */

define('PAAM_VERSION', '1.0');
define('PAAM_DEBUG', 1);
define('PAAM_PLUGINURL', get_bloginfo('wpurl') . '/wp-content/plugins/asset-manager');
define('PAAM_PLUGINDIR', dirname(__FILE__) . '/');
define('PAAM_IMAGEUPLOADPATH', ABSPATH. 'wp-content/uploads/assets/');
define('PAAM_IMAGEUPLOADURL', get_bloginfo('wpurl') . '/wp-content/uploads/assets');
define('PAAM_TEMPPATH', PAAM_IMAGEUPLOADPATH . 'temp/');
define('PAAM_TEMPURL', PAAM_IMAGEUPLOADURL . '/temp');
define('PAAM_NUMTEXTFIELDS', 3); // don't change this! not implemented yet
define('PAAM_NUMIMAGEFIELDS', 3); // don't change this! not implemented yet
//define('PAAM_OPTIONSPAGEURL', 'options-general.php?page=asset-manager/admin/admin.php');

require_once('classes/assetsfactory.class.php');
require_once('classes/sku.class.php');
require_once('classes/asset.class.php');

global $wpdb;
define('PAAM_DB_SKUS', $wpdb->prefix . 'paam_skus');
define('PAAM_DB_ASSETS', $wpdb->prefix . 'paam_assets');
	   
if (PAAM_DEBUG) {
	$wpdb->show_errors();
}