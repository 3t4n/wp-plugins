<?php
    global $wpdb;
    if (!defined('WPLANG') || WPLANG == '') {
        define('GDPRSUP_WPLANG', 'en_GB');
    } else {
        define('GDPRSUP_WPLANG', WPLANG);
    }
    if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

    define('GDPRSUP_PLUG_NAME', basename(dirname(__FILE__)));
    define('GDPRSUP_DIR', WP_PLUGIN_DIR. DS. GDPRSUP_PLUG_NAME. DS);
    define('GDPRSUP_TPL_DIR', GDPRSUP_DIR. 'tpl'. DS);
    define('GDPRSUP_CLASSES_DIR', GDPRSUP_DIR. 'classes'. DS);
    define('GDPRSUP_TABLES_DIR', GDPRSUP_CLASSES_DIR. 'tables'. DS);
	define('GDPRSUP_HELPERS_DIR', GDPRSUP_CLASSES_DIR. 'helpers'. DS);
    define('GDPRSUP_LANG_DIR', GDPRSUP_DIR. 'lang'. DS);
    define('GDPRSUP_IMG_DIR', GDPRSUP_DIR. 'img'. DS);
    define('GDPRSUP_TEMPLATES_DIR', GDPRSUP_DIR. 'templates'. DS);
    define('GDPRSUP_MODULES_DIR', GDPRSUP_DIR. 'modules'. DS);
    define('GDPRSUP_FILES_DIR', GDPRSUP_DIR. 'files'. DS);
    define('GDPRSUP_ADMIN_DIR', ABSPATH. 'wp-admin'. DS);

	define('GDPRSUP_PLUGINS_URL', plugins_url());
    define('GDPRSUP_SITE_URL', get_bloginfo('wpurl'). '/');
    define('GDPRSUP_JS_PATH', GDPRSUP_PLUGINS_URL. '/'. GDPRSUP_PLUG_NAME. '/js/');
    define('GDPRSUP_CSS_PATH', GDPRSUP_PLUGINS_URL. '/'. GDPRSUP_PLUG_NAME. '/css/');
    define('GDPRSUP_IMG_PATH', GDPRSUP_PLUGINS_URL. '/'. GDPRSUP_PLUG_NAME. '/img/');
    define('GDPRSUP_MODULES_PATH', GDPRSUP_PLUGINS_URL. '/'. GDPRSUP_PLUG_NAME. '/modules/');
    define('GDPRSUP_TEMPLATES_PATH', GDPRSUP_PLUGINS_URL. '/'. GDPRSUP_PLUG_NAME. '/templates/');
    define('GDPRSUP_JS_DIR', GDPRSUP_DIR. 'js/');

    define('GDPRSUP_URL', GDPRSUP_SITE_URL);

    define('GDPRSUP_LOADER_IMG', GDPRSUP_IMG_PATH. 'loading.gif');
	define('GDPRSUP_TIME_FORMAT', 'H:i:s');
    define('GDPRSUP_DATE_DL', '/');
    define('GDPRSUP_DATE_FORMAT', 'm/d/Y');
    define('GDPRSUP_DATE_FORMAT_HIS', 'm/d/Y ('. GDPRSUP_TIME_FORMAT. ')');
    define('GDPRSUP_DATE_FORMAT_JS', 'mm/dd/yy');
    define('GDPRSUP_DATE_FORMAT_CONVERT', '%m/%d/%Y');
    define('GDPRSUP_WPDB_PREF', $wpdb->prefix);
    define('GDPRSUP_DB_PREF', 'gdprsup_');
    define('GDPRSUP_MAIN_FILE', 'gdprsup.php');

    define('GDPRSUP_DEFAULT', 'default');
    define('GDPRSUP_CURRENT', 'current');

	define('GDPRSUP_EOL', "\n");

    define('GDPRSUP_PLUGIN_INSTALLED', true);
    define('GDPRSUP_VERSION', '2.1.2');
    define('GDPRSUP_USER', 'user');

    define('GDPRSUP_CLASS_PREFIX', 'gdprsupc');
    define('GDPRSUP_FREE_VERSION', false);
	define('GDPRSUP_TEST_MODE', true);

    define('GDPRSUP_SUCCESS', 'Success');
    define('GDPRSUP_FAILED', 'Failed');
	define('GDPRSUP_ERRORS', 'gdprsupErrors');

	define('GDPRSUP_ADMIN',	'admin');
	define('GDPRSUP_LOGGED','logged');
	define('GDPRSUP_GUEST',	'guest');

	define('GDPRSUP_ALL',		'all');

	define('GDPRSUP_METHODS',		'methods');
	define('GDPRSUP_USERLEVELS',	'userlevels');
	/**
	 * Framework instance code
	 */
	define('GDPRSUP_CODE', 'gdprsup');

	define('GDPRSUP_LANG_CODE', 'gdprsup_lng');
	/**
	 * Plugin name
	 */
	define('GDPRSUP_WP_PLUGIN_NAME', 'GDPR Compliance by Supsystic');
	/**
	 * Plugin admin area slug
	 */
	define('GDPRSUP_ADMIN_AREA_SLUG', 'gdpr-compliance-by-supsystic');
	/**
	 * Dash icon for WP admin area menu
	 */
	define('GDPRSUP_ADMIN_MENU_ICON', 'dashicons-admin-appearance');
	/**
	 * Allow minification
	 */
	define('GDPRSUP_MINIFY_ASSETS', false);
	/**
	 * Load plugin core only in admin area - leave frontend lighter
	 */
	define('GDPRSUP_ADMIN_USAGE_ONLY', false);
	/**
	 * Open this tab by default in admin area
	 */
	define('GDPRSUP_DEF_ADMIN_TAB', 'gdpr-settings');
	/**
	 * Custom defined for plugin
	 */
	define('GDPRSUP_HOME_PAGE_ID', 0);
