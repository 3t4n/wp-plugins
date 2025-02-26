<?php
/**
 * Plugin Name: Alertify
 * Plugin URI: https://wpsmspro.com/alertify
 * Description: Premium back in stock notification system for WooCommerce with email alerts
 * Version: 1.0.0
 * Author: wpunicorn
 * Author URI: https://wpsmspro.com
 * Text Domain: alertify
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * WC requires at least: 5.0
 * WC tested up to: 8.0
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define plugin constants
define('ALERTIFY_VERSION', '1.0.0');
define('ALERTIFY_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ALERTIFY_PLUGIN_URL', plugin_dir_url(__FILE__));

// Declare WooCommerce feature compatibility
add_action('before_woocommerce_init', function() {
    if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('cart_checkout_blocks', __FILE__, true);
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('product_block_editor', __FILE__, true);
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('remote_logging', __FILE__, true);
    }
});

// Check if WooCommerce is active
if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    add_action('admin_notices', function() {
        ?>
        <div class="error">
            <p><?php esc_html_e('Alertify requires WooCommerce to be installed and active.', 'alertify'); ?></p>
        </div>
        <?php
    });
    return;
}

// Main plugin class
class Alertify {
    private static $instance = null;

    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        $this->init_hooks();
        $this->includes();
    }

    private function init_hooks() {
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
        
        add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'frontend_scripts'));
    }

    private function includes() {
        $required_files = array(
            'includes/class-alertify-database.php',
            'includes/class-alertify-admin.php',
            'includes/class-alertify-frontend.php',
            'includes/class-alertify-ajax.php',
            'includes/class-alertify-email.php'
        );

        foreach ($required_files as $file) {
            $file_path = ALERTIFY_PLUGIN_DIR . $file;
            if (file_exists($file_path)) {
                require_once $file_path;
            }
        }
    }

    public function activate() {
        $database_file = ALERTIFY_PLUGIN_DIR . 'includes/class-alertify-database.php';
        if (file_exists($database_file)) {
            require_once $database_file;
            if (class_exists('ALERTIFY_Database')) {
                ALERTIFY_Database::create_tables();
            }
        }
        
        // Add the endpoint first
        add_rewrite_endpoint('waitlist', EP_ROOT | EP_PAGES);
        // Then flush rewrite rules
        flush_rewrite_rules();
    }

    public function deactivate() {
        // Cleanup if needed
        wp_clear_scheduled_hook('alertify_send_notifications');
        // Flush rules on deactivation as well
        flush_rewrite_rules();
    }

    public function load_plugin_textdomain() {
        load_plugin_textdomain('alertify', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    public function admin_scripts() {
        if (file_exists(ALERTIFY_PLUGIN_DIR . 'assets/css/admin.css')) {
            wp_enqueue_style('alertify-admin-css', ALERTIFY_PLUGIN_URL . 'assets/css/admin.css', array(), ALERTIFY_VERSION);
        }
        if (file_exists(ALERTIFY_PLUGIN_DIR . 'assets/js/admin.js')) {
            wp_enqueue_script('alertify-admin-js', ALERTIFY_PLUGIN_URL . 'assets/js/admin.js', array('jquery'), ALERTIFY_VERSION, true);
        }
    }

    public function frontend_scripts() {
        if (file_exists(ALERTIFY_PLUGIN_DIR . 'assets/css/frontend.css')) {
            wp_enqueue_style('alertify-frontend-css', ALERTIFY_PLUGIN_URL . 'assets/css/frontend.css', array(), ALERTIFY_VERSION);
        }
        if (file_exists(ALERTIFY_PLUGIN_DIR . 'assets/js/frontend.js')) {
            wp_enqueue_script('alertify-frontend-js', ALERTIFY_PLUGIN_URL . 'assets/js/frontend.js', array('jquery'), ALERTIFY_VERSION, true);
            
            wp_localize_script('alertify-frontend-js', 'alertifyAjax', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('alertify-nonce')
            ));
        }
    }
}

// Initialize the plugin
function Alertify() {
    return Alertify::instance();
}

Alertify();