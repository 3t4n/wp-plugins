<?php
/**
 * Plugin Name: Parallaxer for Elementor
 * Description: Add smooth parallax effects to any Elementor widget using Rellax.js and smooth scroll by using lenis.js. A mini fluid typography and spacing system included!
 * Version: 1.0.2
 * Author: OoohBoi
 * Author URI: https://ooohboi.space
 * Text Domain: parallaxer-for-elementor
 * License:     GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0
 * Requires Plugins: elementor
 * Elementor tested up to: 3.26
 * Elementor Pro tested up to: 3.26
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Currently plugin version.
 */
define('PARALLAXER_VERSION', '1.0.2');
define('PARALLAXER_FILE', __FILE__);
define('PARALLAXER_PATH', plugin_dir_path(PARALLAXER_FILE));
define('PARALLAXER_URL', plugin_dir_url(PARALLAXER_FILE));

/**
 * Check if Elementor is installed and activated
 */
function parallaxer_elementor_required_notice() {
    $message = sprintf(
        /* translators: %s: Link to Elementor plugin */
        esc_html__('Parallaxer requires %s to be installed and activated.', 'parallaxer-for-elementor'),
        '<a href="' . esc_url(admin_url('plugin-install.php?s=Elementor&tab=search&type=term')) . '">Elementor</a>'
    );
    
    echo '<div class="notice notice-error"><p>' . wp_kses_post($message) . '</p></div>';
}

/**
 * Load plugin class
 */
function parallaxer_load_plugin() {
    require_once PARALLAXER_PATH . 'includes/class-parallaxer.php';
}

/**
 * Initialize plugin
 */
function parallaxer_init() {
    // Check if Elementor installed and activated
    if (!did_action('elementor/loaded')) {
        add_action('admin_notices', 'parallaxer_elementor_required_notice');
        return;
    }

    // Load plugin
    parallaxer_load_plugin();
}

add_action('plugins_loaded', 'parallaxer_init');
