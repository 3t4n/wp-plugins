<?php
/**
 * Plugin Name: Login Links
 * Description: A plugin to create login links for users.
 * Version: 1.0.1
 * Author: Denis Alemán
 * Author URI: https://wordpress.org/plugins/login-links/
 * License: GPLv3
 */

if (!defined('ABSPATH')) {
    exit;
}

define('LL_PLUGIN_DIR', plugin_dir_url(__FILE__));
define('LL_PLUGIN_VERSION', '1.0.1');

require_once plugin_dir_path(__FILE__) . 'migrations/create_login_links_table.php';
require_once plugin_dir_path(__FILE__) . 'models/LLLoginLink.php';
require_once plugin_dir_path(__FILE__) . 'admin/admin-page.php';
require_once plugin_dir_path(__FILE__) . 'admin/api.php';
require_once plugin_dir_path(__FILE__) . 'services/LLLinkAutoLogin.php';
require_once plugin_dir_path(__FILE__) . 'services/LLUserTransientCleaner.php';

// Bootstrap
register_activation_hook(__FILE__, 'll_create_database_table');
register_deactivation_hook(__FILE__, 'll_delete_database_table');
LLLinkAutoLogin::listenLoginAttempts();
LLUserTransientCleaner::init();

