<?php
/**
 * Plugin Name: Awesome Emoji Reactions
 * Plugin URI: 
 * Description: Add emoji reactions to your posts and pages.
 * Version: 1.0
 * Author: Peak Plugins
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: awesome-emoji-reactions
 * Domain Path: /languages
 */

// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('aerppk_VERSION', '1.0.0');
define('aerppk_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('aerppk_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include main classes
require_once aerppk_PLUGIN_DIR . 'includes/class-aer-loader.php';
require_once aerppk_PLUGIN_DIR . 'includes/class-aer-reactions.php';
require_once aerppk_PLUGIN_DIR . 'includes/class-aer-admin.php';

// Initialize plugin
function awesome_emoji_reactions_init() {
    $plugin = new aerppk_Loader();
    $plugin->run();
}

// Start plugin
awesome_emoji_reactions_init();

// Activation hook
register_activation_hook(__FILE__, 'aerppk_activate');
function aerppk_activate() {
    // Create tables in database
    global $wpdb;
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}aerppk_reactions (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        post_id bigint(20) NOT NULL,
        user_id bigint(20) NOT NULL,
        emoji varchar(50) NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id),
        UNIQUE KEY user_post (user_id, post_id),
        KEY post_id (post_id),
        KEY user_id (user_id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Deactivation hook
register_deactivation_hook(__FILE__, 'aerppk_deactivate');
function aerppk_deactivate() {
}

