<?php
/*
 * Plugin Name: Email Customizer and Designer For WooCommerce
 * Version: 1.0.10
 * Description: Help you to build and customize WooCommerce emails.
 * Author: Acowebs
 * Author URI: http://acowebs.com
 * Requires at least: 4.9
 * Tested up to: 6.7
 * Text Domain: email-customizer-and-designer-for-woocommerce
 * WC requires at least: 3.4.4
 * WC tested up to: 9.4
*/
define('AWECM_TOKEN', 'awecm');
define('AWECM_VERSION', '1.0.10');
define('AWECM_FILE', __FILE__);
define('AWECM_PLUGIN_NAME', 'Email Customizer and Designer For WooCommerce');
define('AWECM_WP_VERSION', get_bloginfo('version'));
define('AWECM_STORE_URL', 'https://api.acowebs.com');

// /defining template saving directory name
if ( !defined('AWECM_TEMPLATE_DIR_NAME') ){
    define('AWECM_TEMPLATE_DIR_NAME', 'awecm_templates');
}

//defining template saving directory
$upload = wp_upload_dir();
$upload_dir = $upload['basedir'];
$upload_url = $upload['baseurl'];
$upload_dir = $upload_dir.'/'.AWECM_TEMPLATE_DIR_NAME;
$upload_dir = trailingslashit( $upload_dir );
$upload_url = $upload_url.'/'.AWECM_TEMPLATE_DIR_NAME;
define('AWECM_UPLOAD_TEMPLATE_DIR', $upload_dir);
define('AWECM_UPLOAD_TEMPLATE_URL', $upload_url);

//Helpers
require_once(realpath(plugin_dir_path(__FILE__)) . DIRECTORY_SEPARATOR . 'includes/helpers.php');

//Init
add_action('plugins_loaded', 'AWECM_init');
if (!function_exists('AWECM_init')) {
    function AWECM_init()
    {
        $plugin_rel_path = basename(dirname(__FILE__)) . '/languages'; /* Relative to WP_PLUGIN_DIR */
        load_plugin_textdomain('email-customizer-and-designer-for-woocommerce', false, $plugin_rel_path);
    }

}

//Loading Classes
if (!function_exists('AWECM_autoloader')) {
    function AWECM_autoloader($class_name)
    {
        if (0 === strpos($class_name, 'AWECM')) {
            $classes_dir = realpath(plugin_dir_path(__FILE__)) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR;
            $class_file = 'class-' . str_replace('_', '-', strtolower($class_name)) . '.php';
            require_once $classes_dir . $class_file;
        }
    }

}
spl_autoload_register('AWECM_autoloader');

//Backend UI
if (!function_exists('AWECM')) {
    function AWECM()
    {
        $instance = AWECM_Backend::instance(__FILE__, AWECM_VERSION);
        return $instance;
    }

}

if (is_admin()) {
    AWECM();
}

//API
new AWECM_Api();

// Front end
new AWECM_Front_End( __FILE__, AWECM_VERSION );

add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );
