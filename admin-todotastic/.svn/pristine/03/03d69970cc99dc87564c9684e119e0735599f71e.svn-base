<?php
/**
 * Main file for WordPress.
 *
 * @wordpress-plugin
 * Plugin Name: 	Admin Todotastic
 * Plugin URI:	    https://wordpress.org/plugins/admin-todotastic
 * Description: 	Assign todo to internal users by mentioning them
 * Author:          Brickdots
 * Author URI:		https://brickdots.com
 * Version: 		1.0
 * Text Domain:		admin-todotastic
 * Domain Path:		/languages
 */

defined('ABSPATH') or die('No script kiddies please!'); // Avoid direct file request

/**
 * Plugin constants. This file is procedural coding style for initialization of
 * the plugin core and definition of plugin configuration.
 */
if (defined('BDOTSTD_PATH')) {
    return;
}
define('BDOTSTD_FILE', __FILE__);
define('BDOTSTD_PATH', dirname(BDOTSTD_FILE));
define('BDOTSTD_ROOT_SLUG', 'wpnotes');
define('BDOTSTD_SLUG', basename(BDOTSTD_PATH));
define('BDOTSTD_INC', trailingslashit(path_join(BDOTSTD_PATH, 'inc')));
define('BDOTSTD_MIN_PHP', '7.2.5'); // Minimum of PHP 5.3 required for autoloading and namespacing
define('BDOTSTD_MIN_WP', '5.0.0'); // Minimum of WordPress 5.0 required
define('BDOTSTD_NS', 'Brickdots\\AdminTodotastic');
define('BDOTSTD_DB_PREFIX', 'bdotstd'); // The table name prefix wp_{prefix}
define('BDOTSTD_OPT_PREFIX', 'bdotstd'); // The option name prefix in wp_options
define('BDOTSTD_SLUG_CAMELCASE', lcfirst(str_replace('-', '', ucwords(BDOTSTD_SLUG, '-'))));
//define('BDOTSTD_TD', ''); This constant is defined in the core class. Use this constant in all your __() methods
//define('BDOTSTD_VERSION', ''); This constant is defined in the core class
//define('BDOTSTD_DEBUG', true); This constant should be defined in wp-config.php to enable the Base#debug() method

// Check PHP Version and print notice if minimum not reached, otherwise start the plugin core
require_once BDOTSTD_INC .
    'base/others/' .
    (version_compare(phpversion(), BDOTSTD_MIN_PHP, '>=') ? 'start.php' : 'fallback-php-version.php');
