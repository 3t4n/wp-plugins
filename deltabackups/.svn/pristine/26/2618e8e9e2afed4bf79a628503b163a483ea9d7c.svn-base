<?php
/**
 * Plugin Name: DeltaBackups
 * Plugin URI: https://deltabackups.com
 * Description: DeltaBackups is plugin for content backup files and database of your WordPress instance
 * Author: DeltaBackups
 * Author URI: https://deltabackups.com/
 * Text Domain: deltabackups
 * Requires at least: 5.2
 * Version: 1.0.4
 * Requires PHP:      5.6
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Include the helper methods file
require_once plugin_dir_path(__FILE__) . 'deltabackups-files-utils.php';
require_once plugin_dir_path(__FILE__) . 'deltabackups-network-utils.php';
require_once plugin_dir_path(__FILE__) . 'deltabackups-database-utils.php';
require_once plugin_dir_path(__FILE__) . 'deltabackups-main.php';

define('DTBPS_WP_PLUGIN_NAME', 'deltabackups');

// Add a top-level "Backups" menu item in the WordPress admin dashboard
function dtbps_add_menu() {

    define('DTBPS_WP_PLUGIN_BACKUPS_LIST_SLUG', DTBPS_WP_PLUGIN_NAME . '-backups');
    define('DTBPS_WP_PLUGIN_BACKUPS_USER_SLUG', DTBPS_WP_PLUGIN_NAME . '-user');
    define('DTBPS_WP_PLUGIN_BACKUPS_CLIENT_SLUG', DTBPS_WP_PLUGIN_NAME . '-client');
    define('DTBPS_WP_PLUGIN_BACKUPS_SETTINGS_SLUG', DTBPS_WP_PLUGIN_NAME . '-settings');
    define('DTBPS_WP_PLUGIN_ACCESS_LEVEL', 'manage_options');

    add_menu_page(
        'DeltaBackups', // Page title
        'DeltaBackups', // Menu title
        DTBPS_WP_PLUGIN_ACCESS_LEVEL, // Capability required to access this menu
        DTBPS_WP_PLUGIN_BACKUPS_LIST_SLUG, // Menu slug
        'dtbps_backup_plugin_backups_page', // Callback function to display the page content
        'dashicons-shield', // Icon for the menu
        999 // Position in the admin menu (adjust as needed)
    );

    // Add a submenu item for backups settings
    add_submenu_page(
        DTBPS_WP_PLUGIN_BACKUPS_LIST_SLUG, // Parent menu slug
        'DeltaBackups - Backups', // Page title
        'Backups', // Menu title
        DTBPS_WP_PLUGIN_ACCESS_LEVEL, // Capability required to access this menu
        DTBPS_WP_PLUGIN_BACKUPS_LIST_SLUG, // Menu slug
        'dtbps_backup_plugin_backups_page' // Callback function to display the page content
    );

    // Add a submenu item for client settings
    add_submenu_page(
        DTBPS_WP_PLUGIN_BACKUPS_LIST_SLUG, // Parent menu slug
        'DeltaBackups - Clients', // Page title
        'Clients', // Menu title
        DTBPS_WP_PLUGIN_ACCESS_LEVEL, // Capability required to access this menu
        DTBPS_WP_PLUGIN_BACKUPS_CLIENT_SLUG, // Menu slug
        'dtbps_backup_plugin_client_page' // Callback function to display the page content
    );

    // Add a submenu item to create a backup
    add_submenu_page(
        DTBPS_WP_PLUGIN_BACKUPS_LIST_SLUG, // Parent menu slug
        'DeltaBackups - User', // Page title
        'User', // Menu title
        DTBPS_WP_PLUGIN_ACCESS_LEVEL, // Capability required to access this menu
        DTBPS_WP_PLUGIN_BACKUPS_USER_SLUG, // Menu slug
        'dtbps_backup_plugin_user_page' // Callback function to display the page content
    );

    // Add a submenu item to create a backup
    add_submenu_page(
        DTBPS_WP_PLUGIN_BACKUPS_LIST_SLUG, // Parent menu slug
        'DeltaBackups - Settings', // Page title
        'Settings', // Menu title
        DTBPS_WP_PLUGIN_ACCESS_LEVEL, // Capability required to access this menu
        DTBPS_WP_PLUGIN_BACKUPS_SETTINGS_SLUG, // Menu slug
        'dtbps_backup_plugin_settings_page' // Callback function to display the page content
    );
}

add_action('admin_menu', 'dtbps_add_menu');

// Hook the function to the plugin activation event to improve backup data security
register_activation_hook(__FILE__, 'dtbps_create_htaccess_in_backup_directory');


// Constants are defined using this method so they are not called on every WP request, only on this plugin pages
function dtbps_define_constants(){
    global $wpdb;

    if (!defined('DTBPS_DIR')) define('DTBPS_DIR', '/');
    if (!defined('DTBPS_CAN_ENCRYPT')) define('DTBPS_CAN_ENCRYPT', version_compare(PHP_VERSION, '7.2.0', '>='));
    if (!defined('DTBPS_CAN_DECRYPT')) define('DTBPS_CAN_DECRYPT', version_compare(PHP_VERSION, '5.6.0', '>='));
    if (!defined('DTBPS_MB_IN_BYTES_SIZE')) define('DTBPS_MB_IN_BYTES_SIZE', 1048576);
    if (!defined('DTBPS_API_TIMEOUT_SEC')) define('DTBPS_API_TIMEOUT_SEC', 120000);

    if (!defined('DTBPS_DOMAIN')) define('DTBPS_DOMAIN', 'https://api.deltabackups.com');
    if (!defined('DTBPS_ENDPOINT_SERVICE')) define('DTBPS_ENDPOINT_SERVICE', DTBPS_DOMAIN . '/v1/backupbackend');
    if (!defined('DTBPS_ENDPOINT_RESPONSE_MESSAGE_SUCCESS')) define('DTBPS_ENDPOINT_RESPONSE_MESSAGE_SUCCESS', 'OK');
    if (!defined('DTBPS_ENDPOINT_RESPONSE_MESSAGE_ERROR')) define('DTBPS_ENDPOINT_RESPONSE_MESSAGE_ERROR', 'ERROR');


    if (!defined('DTBPS_FILE_COMPRESSED_EXTENSION')) define('DTBPS_FILE_COMPRESSED_EXTENSION', '.zip');
    if (!defined('DTBPS_FILE_DB_EXTENSION')) define('DTBPS_FILE_DB_EXTENSION', '.sql');
    if (!defined('DTBPS_FILE_CSV_EXTENSION')) define('DTBPS_FILE_CSV_EXTENSION', '.csv');
    if (!defined('DTBPS_FILE_CSV_COLUMNS')) define('DTBPS_FILE_CSV_COLUMNS', 4);
    if (!defined('DTBPS_FILE_METADATA_NAME')) define('DTBPS_FILE_METADATA_NAME', 'metadata');
    if (!defined('DTBPS_FILE_DATABASE_NAME')) define('DTBPS_FILE_DATABASE_NAME', 'db');
    if (!defined('DTBPS_HASH_ALGO')) define('DTBPS_HASH_ALGO', 'sha256');
    if (!defined('DTBPS_PATH_BACKUP_FILES')) define('DTBPS_PATH_BACKUP_FILES', 'files');
    if (!defined('DTBPS_DB_SQL_TABLE_OPTIONS_KEY')) define('DTBPS_DB_SQL_TABLE_OPTIONS_KEY', '_dtbps_backups_data');
    if (!defined('DTBPS_DB_SQL_TABLE_OPTIONS_USER_ID')) define('DTBPS_DB_SQL_TABLE_OPTIONS_USER_ID', 'user_id');
    if (!defined('DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCK')) define('DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCK', 'is_lock');
    if (!defined('DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCAL_MODE')) define('DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCAL_MODE', 'is_local_mode');
    if (!defined('DTBPS_DB_SQL_TABLE_OPTIONS_PASSWORD')) define('DTBPS_DB_SQL_TABLE_OPTIONS_PASSWORD', 'password');
    if (!defined('DTBPS_DB_SQL_TABLE_OPTIONS_CLIENT_ID')) define('DTBPS_DB_SQL_TABLE_OPTIONS_CLIENT_ID', 'client_id');
    if (!defined('DTBPS_DB_SQL_TABLE_DEFAULT_PREFIX')) define('DTBPS_DB_SQL_TABLE_DEFAULT_PREFIX', 'wp_');
    if (!defined('DTBPS_DB_SQL_TABLE_BLOGS')) define('DTBPS_DB_SQL_TABLE_BLOGS', 'wp_blogs');
    if (!defined('DTBPS_RESPONSE_CLIENT_SIZE')) define('DTBPS_RESPONSE_CLIENT_SIZE', 'size');
    if (!defined('DTBPS_FILE_URLS')) define('DTBPS_FILE_URLS', 'fileUrls');

    if (!defined('DTBPS_USER_ID')) define('DTBPS_USER_ID', dtbps_get_username());
    if (!defined('DTBPS_PASSWORD')) define('DTBPS_PASSWORD', dtbps_get_password());
    if (!defined('DTBPS_CLIENT_ID')) define('DTBPS_CLIENT_ID', dtbps_get_client_id());
    if (!defined('DTBPS_LOCAL_MODE')) define('DTBPS_LOCAL_MODE', dtbps_is_local_mode());


    if (!defined('DTBPS_PATH_WP_CONTENT')) define('DTBPS_PATH_WP_CONTENT',                   dtbps_windows_to_unix_if_needed(WP_CONTENT_DIR));
    if (!defined('DTBPS_PATH_WP_CONTENT_UPLOADS')) define('DTBPS_PATH_WP_CONTENT_UPLOADS',           dtbps_windows_to_unix_if_needed(wp_upload_dir()['basedir']));
    if (!defined('DTBPS_PATH_WP_CONTENT_THEMES')) define('DTBPS_PATH_WP_CONTENT_THEMES',            dtbps_windows_to_unix_if_needed(get_theme_root()));
    if (!defined('DTBPS_PATH_WP_CONTENT_PLUGINS')) define('DTBPS_PATH_WP_CONTENT_PLUGINS',           dtbps_windows_to_unix_if_needed(WP_PLUGIN_DIR));
    if (!defined('DTBPS_PATH_WP_CONTENT_UPLOADS_SITES')) define('DTBPS_PATH_WP_CONTENT_UPLOADS_SITES',     dtbps_windows_to_unix_if_needed(DTBPS_PATH_WP_CONTENT_UPLOADS . DTBPS_DIR . 'sites'));
    if (!defined('DTBPS_PATH_WP_CONTENT_UPLOADS_SITES_ID')) define('DTBPS_PATH_WP_CONTENT_UPLOADS_SITES_ID',  dtbps_windows_to_unix_if_needed(DTBPS_PATH_WP_CONTENT_UPLOADS_SITES . DTBPS_DIR . get_current_blog_id()));
    if (!defined('DTBPS_PATH_BACKUPS_CACHE')) define('DTBPS_PATH_BACKUPS_CACHE',                dtbps_windows_to_unix_if_needed(DTBPS_PATH_WP_CONTENT . DTBPS_DIR . DTBPS_WP_PLUGIN_NAME . '_cache'));
    if (!defined('DTBPS_PATH_BACKUPS_CACHE_WP_ID')) define('DTBPS_PATH_BACKUPS_CACHE_WP_ID',          dtbps_windows_to_unix_if_needed(DTBPS_PATH_BACKUPS_CACHE . DTBPS_DIR . $wpdb->prefix . 'backups' . (DTBPS_LOCAL_MODE ? '_local' : '')));
}

?>