<?php
/*
 * Plugin Name: Appsaur Localization
 * Plugin URI:
 * Description: Add movie from location to your page
 * Version:     1.0.0
 * Author:      Appsaur.co, K.R.M.
 * Author URI:  http://www.appsaur.co/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: appsaur-localization
 * Domain Path: /appsaur-localization
 *
 * Appsaur TWP Location is a free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Appsaur TWP Location is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WP Admin Protect. If not, see {URI to Plugin License}.
*/


if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined('APPSAUR_LOCALIZATION_PLUGIN_NAME')) {
	define('APPSAUR_LOCALIZATION_PLUGIN_NAME', 'appsaur-localization');
}

if ( ! defined('APPSAUR_LOCALIZATION_HOOK_PATH')) {
	define('APPSAUR_LOCALIZATION_HOOK_PATH', __FILE__);
}

if ( ! defined('APPSAUR_LOCALIZATION_PLUGIN_PATH')) {
	define('APPSAUR_LOCALIZATION_PLUGIN_PATH', plugins_url(APPSAUR_LOCALIZATION_PLUGIN_NAME));
}

if ( ! defined('APPSAUR_LOCALIZATION_TRANSLATION_DIR')) {
	define('APPSAUR_LOCALIZATION_TRANSLATION_DIR', dirname( plugin_basename(__FILE__) ) . '/lang/' );
}

require_once('includes/appsaur_localization_plugin.php');
require_once('includes/appsaur_localization_install.php');
require_once('includes/appsaur_localization_uninstall.php');
require_once('includes/appsaur_localization_menu.php');
require_once('includes/appsaur_localization_shortcode.php');
require_once('includes/appsaur_localization_translation.php');
require_once('includes/appsaur_localization_main_controller.php');
require_once('includes/appsaur_localization_settings_controller.php');
require_once('includes/appsaur_localization_save_settings_controller.php');
require_once('includes/appsaur_localization_add_map_controller.php');
require_once('includes/appsaur_localization_new_map_controller.php');
require_once('includes/appsaur_localization_edit_map_controller.php');
require_once('includes/appsaur_localization_save_map_controller.php');
require_once('includes/appsaur_localization_delete_map_controller.php');
require_once('includes/appsaur_localization_localizations_controller.php');
require_once('includes/appsaur_localization_add_localization_controller.php');
require_once('includes/appsaur_localization_edit_localization_controller.php');
require_once('includes/appsaur_localization_delete_localization_controller.php');
require_once('includes/appsaur_localization_save_localization_controller.php');
require_once('includes/appsaur_localization_new_localization_controller.php');





