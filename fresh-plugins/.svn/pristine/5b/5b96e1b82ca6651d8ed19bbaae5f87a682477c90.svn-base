<?php
/**
 * Plugin Name: Fresh Plugins - WP Fix It
 * Plugin URI: https://www.wpfixit.com
 * Description: Fresh Plugins is a simple plugin to allow plugins re-installation of plugins.  Use this plugin to install a fresh copy of any plugins that are on your site from the WordPress.org plugin repo.  The plugin installed will be the newest version of the plugin and will delete and replace your current version.
 * Author: WP Fix It
 * Author URI: https://www.wpfixit.com
 * Version: 3.2
 * License: GPL3+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
// Include the settings page and bulk action handler
require_once plugin_dir_path(__FILE__) . 'admin/admin-settings-page.php';
require_once plugin_dir_path(__FILE__) . 'admin/bulk-action-handler.php';
require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
// Ensure necessary files are included
function rfc_include_plugin_api() {
    if (!function_exists('plugins_api')) {
        require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
    }
    if (!class_exists('Plugin_Upgrader')) {
        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    }
}
add_action('admin_init', 'rfc_include_plugin_api');
// Add the "Install Fresh" link to individual plugin actions
function rfc_add_reinstall_link($actions, $plugin_file, $plugin_data, $context) {
    if (rfc_is_plugin_from_wporg($plugin_file)) {
        $plugin = sanitize_text_field(wp_unslash($plugin_file));
        $reinstall_url = wp_nonce_url(
            admin_url('plugins.php?action=rfc_reinstall_plugin&plugin=' . urlencode($plugin)),
            'rfc_reinstall_plugin_' . $plugin
        );
        // Create a unique id for the link
        $unique_id = 'reinstall-' . esc_attr(dirname($plugin));
        // Add the "Install Fresh" link with a unique ID
        $actions['rfc_reinstall_fresh_copy'] = '<a href="' . esc_url($reinstall_url) . '" id="' . esc_attr($unique_id) . '">Install Fresh</a>';
    }
    return $actions;
}
add_filter('plugin_action_links', 'rfc_add_reinstall_link', 10, 4);
// Add the "Bulk Refresh" link only for the fresh-plugins plugin
function rfc_add_bulk_refresh_link($actions) {
    // Add the "Bulk Refresh" link with custom styling (bold and color)
    $bulk_refresh_link = '<a href="' . esc_url(admin_url('plugins.php?page=fresh-plugins')) . '" style="font-weight: 500; color: #f99568;">Bulk Refresh</a>';
    
    // Place the Bulk Refresh link first by merging it before the existing actions
    $actions = array_merge(['rfc_bulk_refresh' => $bulk_refresh_link], $actions);
    return $actions;
}
add_filter('plugin_action_links_fresh-plugins/fresh-plugins.php', 'rfc_add_bulk_refresh_link');
// Handle the reinstall plugin action for individual plugins
function rfc_handle_reinstall_plugin() {
    global $pagenow;
    if ($pagenow === 'plugins.php') {
        if (isset($_GET['action']) && $_GET['action'] === 'rfc_reinstall_plugin' && !empty($_GET['plugin'])) {
            // Use wp_unslash() and sanitize_text_field() to handle the plugin parameter
            $plugin = sanitize_text_field(wp_unslash($_GET['plugin']));
            check_admin_referer('rfc_reinstall_plugin_' . $plugin);
            // Include necessary files
            include_once ABSPATH . 'wp-admin/includes/plugin.php';
            $plugin_slug = dirname($plugin);
            $plugin_file = WP_PLUGIN_DIR . '/' . $plugin;
            // Get the plugin's current name
            $plugin_data = get_plugin_data($plugin_file);
            $plugin_name = sanitize_text_field($plugin_data['Name']);
            // Turn off output buffering to prevent any headers already sent issues
            ob_start();
            
            // Delete the plugin
            delete_plugins([$plugin]);
            // Get plugin info from WordPress.org
            $api = plugins_api('plugin_information', [
                'slug' => $plugin_slug,
                'fields' => [
                    'sections' => false,
                ],
            ]);
            if (is_wp_error($api)) {
                ob_end_clean(); // Clean buffer and end
                wp_die(esc_html($api->get_error_message()));
            }
            // Install the fresh copy
            $upgrader = new Plugin_Upgrader(new WP_Ajax_Upgrader_Skin());
            $result = $upgrader->install($api->download_link);
            ob_end_clean(); // Clean buffer and end
            if (is_wp_error($result)) {
                wp_die(esc_html__('Failed to reinstall the plugin: ', 'textdomain') . esc_html($result->get_error_message()));
            }
            // Redirect back to the settings page after completion
            wp_safe_redirect(add_query_arg('reinstalled_name', urlencode($plugin_name), wp_get_referer()));
            exit;
        }
    }
}
add_action('admin_init', 'rfc_handle_reinstall_plugin');
// Add bulk "Install Fresh" option to plugins bulk actions dropdown
function rfc_bulk_actions_plugins($bulk_actions) {
    $bulk_actions['rfc_bulk_install_fresh'] = 'Install Fresh Copy';
    return $bulk_actions;
}
add_filter('bulk_actions-plugins', 'rfc_bulk_actions_plugins');
// Handle the bulk "Install Fresh" action with batch processing
function rfc_handle_bulk_install_fresh($redirect_url, $action, $plugin_files) {
    if ($action !== 'rfc_bulk_install_fresh') {
        return $redirect_url;
    }
    // Include necessary files
    rfc_include_plugin_api();
    // Define the batch size (e.g., 5 plugins per batch)
    $batch_size = 5;
    foreach (array_chunk($plugin_files, $batch_size) as $plugin_batch) {
        foreach ($plugin_batch as $plugin_file) {
            $plugin = sanitize_text_field(wp_unslash($plugin_file)); // Sanitize plugin file
            if (rfc_is_plugin_from_wporg($plugin)) {
                $plugin_slug = dirname($plugin);
                $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/' . $plugin);
                $plugin_name = sanitize_text_field($plugin_data['Name']);
                // Delete the plugin
                delete_plugins([$plugin]);
                // Get plugin info from WordPress.org
                $api = plugins_api('plugin_information', [
                    'slug' => $plugin_slug,
                    'fields' => ['sections' => false],
                ]);
                if (!is_wp_error($api)) {
                    // Install the fresh copy
                    $upgrader = new Plugin_Upgrader(new WP_Ajax_Upgrader_Skin());
                    $upgrader->install($api->download_link);
                }
            }
        }
        // Pause briefly between batches to prevent server overload
        sleep(1); // 1-second delay between batches (adjust as needed)
    }
    // Show the overlay when the bulk action starts
    echo '<script>document.getElementById("fresh-install-overlay").style.display = "flex";</script>';
    // Redirect back with a success message after all batches are processed
    return add_query_arg('bulk_reinstalled', '1', $redirect_url);
}
add_filter('handle_bulk_actions-plugins', 'rfc_handle_bulk_install_fresh', 10, 3);
// Show success message after reinstall
function rfc_show_reinstall_message() {
    if (isset($_GET['reinstalled_name'])) {
        echo '<div class="updated"><p style="font-size: 16px;"><span class="dashicons dashicons-plugins-checked"></span> The plugin <strong>' . esc_html(sanitize_text_field(wp_unslash($_GET['reinstalled_name']))) . '</strong> has been freshly installed successfully.</p></div>';
    }
}
add_action('admin_notices', 'rfc_show_reinstall_message');
// Show success message after bulk reinstall
function rfc_bulk_reinstall_notice() {
    if (isset($_GET['bulk_reinstalled']) && sanitize_text_field(wp_unslash($_GET['bulk_reinstalled'])) == '1') {
        echo '<div class="updated"><p style="font-size: 16px;"><span class="dashicons dashicons-plugins-checked"></span> The selected plugins have been freshly installed successfully.</p></div>';
    }
}
add_action('admin_notices', 'rfc_bulk_reinstall_notice');
// Check if a plugin is from WordPress.org, excluding specific plugins by folder name
function rfc_is_plugin_from_wporg($plugin_file) {
    $plugin_slug = dirname(sanitize_text_field($plugin_file));
    
    // Exclude specific plugins
    if ($plugin_slug === 'support-wpfi' || $plugin_slug === 'fresh-plugins' || $plugin_slug === 'guard-dog-security') {
        return false;
    }
    $api = plugins_api('plugin_information', [
        'slug' => $plugin_slug,
        'fields' => [
            'sections' => false,
        ],
    ]);
    return !is_wp_error($api);
}
/* Load CSS and JavaScript only on the plugins admin page */
function rfc_enqueue_loader_assets($hook_suffix) {
    if ($hook_suffix === 'plugins.php') {
        // Include CSS and JS only on the plugins admin page
        ?>
        <style>
        #fresh-install-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(59, 101, 125, 0.7);
            display: none;
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
        #fresh-install-loader {
            text-align: center;
            color: white;
            position: relative;
        }
        #fresh-install-loader .loader-circle {
            border: 16px solid #f99568;
            border-radius: 50%;
            border-top: 16px solid #00D78B;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            position: relative;
            z-index: 1;
        }
        #fresh-install-loader .loader-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            color: white;
            font-size: 14px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        </style>
        <!-- HTML for the loader overlay -->
        <div id="fresh-install-overlay">
            <div id="fresh-install-loader">
                <div class="loader-circle"></div>
                <div class="loader-text">Fresh Installing...</div>
            </div>
        </div>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select all elements with IDs that start with "reinstall-"
            const reinstallLinks = document.querySelectorAll('[id^="reinstall-"]');
            
            reinstallLinks.forEach(link => {
                link.addEventListener("click", function(e) {
                    // Show the overlay when the link is clicked
                    document.getElementById("fresh-install-overlay").style.display = "flex";
                });
            });
        });
        </script>
        <?php
    }
}
add_action('admin_enqueue_scripts', 'rfc_enqueue_loader_assets');
/* Redirect on activation only for the specific plugin. */
function rfc_redirect_on_activation() {
    if (is_admin() && isset($_GET['activate']) && $_GET['activate'] === 'true') {
        // Check if the plugin was just activated
        wp_safe_redirect(admin_url('plugins.php?page=fresh-plugins'));
        exit;
    }
}

// Hook into the plugin activation hook for the specific plugin
register_activation_hook(__FILE__, 'rfc_plugin_activation');

// Set a transient to detect activation
function rfc_plugin_activation() {
    set_transient('rfc_plugin_activated', true, 30); // Set for 30 seconds
}

// Redirect after plugin activation
function rfc_maybe_redirect_after_activation() {
    if (get_transient('rfc_plugin_activated')) {
        delete_transient('rfc_plugin_activated'); // Clean up the transient
        wp_safe_redirect(admin_url('plugins.php?page=fresh-plugins'));
        exit;
    }
}
add_action('admin_init', 'rfc_maybe_redirect_after_activation');
