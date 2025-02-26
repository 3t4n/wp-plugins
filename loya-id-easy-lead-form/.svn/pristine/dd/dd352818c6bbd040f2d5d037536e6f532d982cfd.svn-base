<?php
/**
 * Plugin Name: LOYA.ID Easy Lead Form
 * Plugin URI: https://loya.id/cms/api/v2/lead-receiver
 * Description: A plugin to create a lead form using shortcode [loya_id_easy_lead_form]. The form submits data to a Strapi endpoint.
 * Version: 1.0.3
 * Author: Your Name
 * Author URI: https://loya.id
 * License: GPL v2 or later
 * Text Domain: loya-id-easy-lead-form
 */

defined('ABSPATH') || exit;

// Define constants
define('LOYA_ID_ELF_VERSION', '1.0.3');
define('LOYA_ID_ELF_PATH', plugin_dir_path(__FILE__));
define('LOYA_ID_ELF_URL', plugin_dir_url(__FILE__));

// Include necessary files
require_once LOYA_ID_ELF_PATH . 'includes/class-loya-id-easy-lead-form.php';
require_once LOYA_ID_ELF_PATH . 'admin/class-admin-settings.php';
require_once LOYA_ID_ELF_PATH . 'public/class-lead-form.php';
require_once LOYA_ID_ELF_PATH . 'config.php';

// Initialize the plugin
function loya_id_easy_lead_form_init() {
    $plugin = new Loya_ID_Easy_Lead_Form();
    $plugin->run();
}
add_action('plugins_loaded', 'loya_id_easy_lead_form_init');
