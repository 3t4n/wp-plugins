<?php
/*
Plugin Name: Easy restaurant menu manager
Description: Manage your food menus online in minutes. Very employee friendly. With a user role for only uploading the restaurant menu as pdf or any other file type. It lets you or every eligible employee upload and manage your food and drink menus on your site. The links to the food menus are embedded with a shortcode or gutenberg block, see "Installation" tab.
Author:            Beautiful WP | made in Germany
Author URI:        https://beautiful-wp.com/
Version: 1.9.1
Text Domain: easy-pdf-restaurant-menu
License: GPL3

easy pdf restaurant menu is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

easy pdf restaurant menu is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with easy pdf restaurant menu. If not, see {License URI}.
 */

if (!defined('ABSPATH')) {
    exit;
}

define('PLUGIN_PATH_nsc_eprm', plugin_dir_path(__FILE__));
define('PLUGIN_CONFIGS_PATH_nsc_eprm', PLUGIN_PATH_nsc_eprm . "plugin-config.json");
define('PLUGIN_URL_nsc_eprm', plugin_dir_url(__FILE__));

require dirname(__FILE__) . "/class/class-plugin-configs-nsc_eprm.php";
require dirname(__FILE__) . "/class/class-input-validation-nsc_eprm.php";
require dirname(__FILE__) . "/class/class-admin-html-formfields-nsc_eprm.php";
require dirname(__FILE__) . "/class/class_admin_easy_pdf_restaurant_menu.php";
require dirname(__FILE__) . "/class/class-admin-settings-nsc_eprm.php";
require dirname(__FILE__) . "/class/class-api-nsc_eprm.php";
require dirname(__FILE__) . "/class/class-gutenberg-blocks-nsc_eprm.php";
require dirname(__FILE__) . "/class/class-download-file-nsc_eprm.php";

$nsc_admin_easy_pdf_restaurant_menu = new nsc_easy_pdf_restaurant_menu();

register_activation_hook(__FILE__, array($nsc_admin_easy_pdf_restaurant_menu, 'nsc_eprm_user_role'));
register_deactivation_hook(__FILE__, array($nsc_admin_easy_pdf_restaurant_menu, 'nsc_eprm_deactivate'));

add_action('plugins_loaded', array($nsc_admin_easy_pdf_restaurant_menu, 'nsc_eprm_add_redirect_filter'));

//creates admin page
if (is_admin()) {
    $backendpage_nsc_eprm = new admin_settings_nsc_eprm;
    add_action('plugins_loaded', array($backendpage_nsc_eprm, 'execute_wordpress_actions_nsc_eprm'));
    add_filter("plugin_action_links_" . plugin_basename(__FILE__), array($backendpage_nsc_eprm, 'add_settings_link_nsc_eprm'));
}
add_shortcode('nsc_eprm_menu_link', array($nsc_admin_easy_pdf_restaurant_menu, 'nsc_eprm_shortcode_processor'));
add_shortcode('nsc_eprm_menu_file_url', array($nsc_admin_easy_pdf_restaurant_menu, 'nsc_eprm_shortcode_file_url'));

$gutenberg_nsc_eprm = new gutenberg_nsc_eprm;
add_action('init', array($gutenberg_nsc_eprm, "register_blocks_nsc_eprm"));

if (version_compare(get_bloginfo('version'), "3.8", "<")) {
    add_filter('block_categories', array($gutenberg_nsc_eprm, 'add_block_category_nsc_eprm'), 10, 2);
} else {
    add_filter('block_categories_all', array($gutenberg_nsc_eprm, 'add_block_category_nsc_eprm'), 10, 2);
}

$api_nsc_eprm = new api_nsc_eprm;
add_action('rest_api_init', array($api_nsc_eprm, 'rest_api_init_nsc_eprm'), 10, 1);


$nsceprm_download = new downloadFile_nsc_eprm;
add_action('init', array($nsceprm_download, 'custom_rewrite_rules_nsc_eprm'));
add_action('query_vars', array($nsceprm_download, 'custom_query_vars_nsc_eprm'));
add_action('template_redirect', array($nsceprm_download, 'handle_custom_file_request_nsc_eprm'));
