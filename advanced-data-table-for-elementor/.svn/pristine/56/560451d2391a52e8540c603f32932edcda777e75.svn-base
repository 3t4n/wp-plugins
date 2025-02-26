<?php

/**
 * Plugin Name: Advanced Data Table for Elementor
 * Plugin URI: https://pluginscafe.com/plugin/advanced-data-table-for-elementor
 * Author: Pluginscafe
 * Author URI: https://pluginscafe.com
 * Version: 1.0.1
 * Description: Advanced Data Table for Elementor
 * Text Domain: advanced-data-table-for-elementor
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * if accessed directly, exit.
 */
if (! defined('ABSPATH')) {
    exit;
}


final class ADTE_Plugin {
    public static $_instance = null;

    const version = '1.0.1';

    public function __construct() {
        $this->define();

        add_action('elementor/widgets/register', [$this, 'register_widget']);
    }


    /**
     * Define variables and constants
     */
    public function define() {
        define('ADTE_VERSION', self::version);
        define('ADTE_FILE', __FILE__);
        define('ADTE_DIR', __DIR__);
        define('ADTE_URL', plugins_url('', ADTE_FILE));
        define('ADTE_AEESTS', ADTE_URL . '/assets');
    }


    public function register_widget($widgets_manager) {
        $file = __DIR__ . "/widgets/advanced-data-table-widget.php";

        require_once($file);
        $widgets_manager->register(new ADTE());
    }


    /**
     * Instantiate the plugin
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}

ADTE_Plugin::instance();
