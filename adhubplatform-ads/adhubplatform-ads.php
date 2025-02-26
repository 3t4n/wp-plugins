<?php
/**
 * Plugin Name: Adhub Platform ADS
 * Plugin URI: https://www.adhubplatform.com
 * Description: Inserisce automaticamente spazi pubblicitari in diverse posizioni del sito con supporto per InMobi CMP.
 * Version: 1.0.0
 * Author: Adhub Media
 * Author URI: https://www.adhubmedia.com
 * Text Domain: adhubplatformads
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.2
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package AdhubPlatform
 * @category Advertising
 * @author AdhubMedia
 */

if (!defined('ABSPATH')) {
    exit;
}

// Definizione costanti del plugin
define('ADHUB_PLATFORM_VERSION', '1.0.0');
define('ADHUB_PLATFORM_PATH', plugin_dir_path(__FILE__));
define('ADHUB_PLATFORM_URL', plugin_dir_url(__FILE__));
define('ADHUB_PLATFORM_BASENAME', plugin_basename(__FILE__));

// Autoloader delle classi
spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'AdhubPlatform_') !== false) {
        $classes_dir = realpath(plugin_dir_path(__FILE__)) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR;
        $class_file = str_replace('_', '-', strtolower($class_name));
        $class_file = str_replace('adhubplatform-', 'class-adhub-', $class_file);
        require_once $classes_dir . $class_file . '.php';
    }
});

// Inizializza il plugin
function adhub_platform_init() {
    load_plugin_textdomain('adhubplatformads', false, dirname(ADHUB_PLATFORM_BASENAME) . '/languages/');
    $loader = new AdhubPlatform_Loader();
    $loader->run();
}
add_action('plugins_loaded', 'adhub_platform_init');