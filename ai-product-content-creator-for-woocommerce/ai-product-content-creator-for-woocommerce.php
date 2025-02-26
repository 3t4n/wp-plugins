<?php
/**
 * Plugin Name:       ProSeller AI - AI Product Content Creator and Optimizer for WooCommerce
 * Description:       Generate product descriptions, titles, and short descriptions effortlessly using OpenAI API for your WooCommerce products. Additionally, it supports variation description generation.
 * Version:           1.5.3
 * Author:            StorePro
 * Author URI:        https://storepro.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ai-product-content-creator-for-woocommerce
 * 
 * @link              https://storepro.io/
 * @since             1.1.0
 * @package           ai-product-content-creator-for-woocommerce
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

if (!defined('SPWAI_BASE')) {
    define('SPWAI_BASE', plugin_basename(__FILE__));
    define('SPWAI_NAME', 'ai-product-content-creator-for-woocommerce');
    define('SPWAI_VERSION', '1.3');
    define('SPWAI_PATH', plugin_dir_path(__FILE__));
    define('SPWAI_URL', plugin_dir_url(__FILE__));
}

function spwai_enqueue_fontawesome() {
    wp_enqueue_style('spwai-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
}
add_action('admin_enqueue_scripts', 'spwai_enqueue_fontawesome');

// Plugin activation function
register_activation_hook(__FILE__, 'spwai_activate');
function spwai_activate() {
    require_once SPWAI_PATH . 'includes/class-spwai-activator.php';
    Spwai_Activator::activate();
}

// Plugin deactivation function
register_deactivation_hook(__FILE__, 'spwai_deactivate');
function spwai_deactivate() {
    require_once SPWAI_PATH . 'includes/class-spwai-deactivator.php';
    Spwai_Deactivator::deactivate();
}

// Include required files
require_once SPWAI_PATH . 'includes/class-spwai.php';
require_once SPWAI_PATH . 'includes/logging.php'; 

require_once SPWAI_PATH . 'admin/class-spwai-admin.php'; // Include the admin class

// Instantiate the admin class
$spwai_admin = new Spwai_Admin('ai-product-content-creator-for-woocommerce', SPWAI_VERSION);

// Execute Plugin
function spwai_run_plugin() {
    $plugin = new Spwai();
    $plugin->run();
}

spwai_run_plugin();