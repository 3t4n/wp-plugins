<?php

/**
 * Plugin Name: Wordpress Paybox Payment plugin
 * Description: Paybox gateway payment plugins for Paybox
 * Version: 1.0.0.1
 * Author: Paybox Verifone
 * Author URI: http://www.paybox.com
 * 
 * @package WordPress
 */
// Ensure not called directly
if (!defined('ABSPATH')) {
    exit;
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$paybox = new Paybox();

if (!defined('PAYBOX_KEY_PATH_WP'))
    define('PAYBOX_KEY_PATH_WP', ABSPATH . 'kek.php');

/**
 * Main Paybox Class
 *
 * @class Paybox
 * @version	1.0.0.0
 */
final class Paybox {

    public $version = '1.0.0.0';
    public $dismissable = false;
    public $wp_version;
    public $strings = array();
    public $plugins = array();

    /**
     * @var Paybox The single instance of the class
     * @since 1.0.0.0
     */
    protected static $_instance = null;

    /**
     * Main Paybox Instance
     *
     * Ensures only one instance of Paybox is loaded or can be loaded.
     *
     * @since 1.0.0.0
     * @static
     * @see WC()
     * @return Paybox - Main instance
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Paybox Constructor.
     */
    public function __construct() {
        load_plugin_textdomain('paybox', false, 'paybox-by-verifone-integration/lang');
        $this->includes();
        $this->init_hooks();
        $this->init_shortcodes();

        $this->plugins = Paybox_Helper::getPlugins();
        $this->strings = Paybox_Helper::getStringMessages();

        global $wp_version;
        $this->wp_version = $wp_version;

        do_action('paybox_loaded');
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes() {
        include_once( 'includes/paybox-helper.php' );
        include_once( 'includes/class-paybox-admin.php' );
        include_once( 'includes/paybox-config.php' );
        include_once( 'includes/paybox-encrypt.php' );
    }

    /**
     * Hook into actions and filters
     * @since  1.0.0.0
     */
    private function init_hooks() {
        add_action('admin_notices', array($this, 'notices'));
    }

    private function init_shortcodes() {
        add_shortcode('paybox_shortcode', array($this, 'paybox_shortcode'));
        add_shortcode('paybox_button', array($this, 'paybox_button'));
    }

    public function paybox_button($params) {
        $options = get_option('paybox_standard_settings', null);
        $config = new Paybox_Config($options, 'Paybox', 'Paybox Desc');
        $paybox = new Payboxclass($config);
        return $paybox->paybox_button($params);
    }

    public function paybox_shortcode() {
        $options = get_option('paybox_standard_settings', null);
        $config = new Paybox_Config($options, 'Paybox', 'Paybox Desc');
        $paybox = new Payboxclass($config);
        return $paybox->controller();
    }

    public function notices() {
        Paybox_Helper::notices();
    }

}

/**
 * Returns the main instance of Paybox to prevent the need to use globals.
 *
 * @since  1.0.0.0
 * @return Paybox
 */
function Paybox() {
    return Paybox::instance();
}
