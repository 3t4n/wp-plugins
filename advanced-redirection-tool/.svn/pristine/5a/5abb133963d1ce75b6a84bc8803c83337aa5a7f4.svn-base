<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
Plugin Name: Advanced Redirection Tool
Plugin URI: https://wordpress.org/plugins/advanced-redirection-tool
Description: A WordPress plugin to manage URL redirections with advanced features.
Version: 1.0
Author: Tayyab Hassan
Author URI: https://tayyabhassan.com/
License: GPL2
Text Domain: advanced-redirection-tool
*/

// Activation hook to create the database table
register_activation_hook(__FILE__, 'advred_tool_create_table');

function advred_tool_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'advred_tool_redirections';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id MEDIUMINT NOT NULL AUTO_INCREMENT,
        url_from VARCHAR(255) NOT NULL,
        url_to VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Add admin menu
add_action('admin_menu', 'advred_tool_register_menu');

function advred_tool_register_menu() {
    add_menu_page(
        __('Advanced Redirection Tool', 'advanced-redirection-tool'),
        __('Redirection Tool', 'advanced-redirection-tool'),
        'manage_options',
        'advred-tool',
        'advred_tool_redirection_page',
        'dashicons-randomize',
        20
    );
}

// Admin page content
function advred_tool_redirection_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'advred_tool_redirections';

    // Handle Add Request
    if (isset($_POST['advred_tool_add_redirection']) && check_admin_referer('advred_tool_add_redirection_nonce')) {
        if (!empty($_POST['url_from']) && !empty($_POST['url_to'])) {
            $url_from = trailingslashit(sanitize_text_field(wp_unslash($_POST['url_from'])));
            $url_to = trailingslashit(sanitize_text_field(wp_unslash($_POST['url_to'])));

            if (filter_var($url_from, FILTER_VALIDATE_URL) && filter_var($url_to, FILTER_VALIDATE_URL)) {
                $wpdb->insert(
                    $table_name,
                    [
                        'url_from' => $url_from,
                        'url_to' => $url_to
                    ],
                    ['%s', '%s']
                );
                wp_cache_delete('advred_tool_redirections');
                echo '<div class="updated"><p>' . esc_html__('Redirection added successfully!', 'advanced-redirection-tool') . '</p></div>';
            } else {
                echo '<div class="error"><p>' . esc_html__('Invalid URL format. Please try again.', 'advanced-redirection-tool') . '</p></div>';
            }
        }
    }

    // Handle Delete Request
    if (isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['_wpnonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'advred_tool_delete_redirection_nonce')) {
        $delete_id = intval($_GET['delete']);
        $wpdb->delete(
            $table_name,
            ['id' => $delete_id],
            ['%d']
        );
        wp_cache_delete('advred_tool_redirections');
        echo '<div class="updated"><p>' . esc_html__('Redirection deleted successfully!', 'advanced-redirection-tool') . '</p></div>';
    }

    // Handle Edit Request
    if (isset($_POST['advred_tool_edit_redirection']) && check_admin_referer('advred_tool_edit_redirection_nonce')) {
        if (!empty($_POST['id']) && !empty($_POST['url_from']) && !empty($_POST['url_to'])) {
            $id = intval($_POST['id']);
            $url_from = trailingslashit(sanitize_text_field(wp_unslash($_POST['url_from'])));
            $url_to = trailingslashit(sanitize_text_field(wp_unslash($_POST['url_to'])));

            $wpdb->update(
                $table_name,
                ['url_from' => $url_from, 'url_to' => $url_to],
                ['id' => $id],
                ['%s', '%s'],
                ['%d']
            );
            wp_cache_delete('advred_tool_redirections');
            echo '<div class="updated"><p>' . esc_html__('Redirection updated successfully!', 'advanced-redirection-tool') . '</p></div>';
        }
    }

    ?>
    <div class="wrap">
        <h1><?php echo esc_html__('Advanced Redirection Tool', 'advanced-redirection-tool'); ?></h1>

        <!-- Add Redirection Form -->
        <form method="POST">
            <?php wp_nonce_field('advred_tool_add_redirection_nonce'); ?>
            <h2><?php echo esc_html__('Add New Redirection', 'advanced-redirection-tool'); ?></h2>
            <table class="form-table">
                <tr>
                    <th><label for="url_from"><?php echo esc_html__('Old URL', 'advanced-redirection-tool'); ?></label></th>
                    <td><input type="url" id="url_from" name="url_from" class="regular-text" required></td>
                </tr>
                <tr>
                    <th><label for="url_to"><?php echo esc_html__('New URL', 'advanced-redirection-tool'); ?></label></th>
                    <td><input type="url" id="url_to" name="url_to" class="regular-text" required></td>
                </tr>
            </table>
            <p><button type="submit" name="advred_tool_add_redirection" class="button button-primary"><?php echo esc_html__('Add Redirection', 'advanced-redirection-tool'); ?></button></p>
        </form>

        <hr>

        <!-- Existing Redirections Table -->
        <h2><?php echo esc_html__('Existing Redirections', 'advanced-redirection-tool'); ?></h2>
        <table class="widefat">
            <thead>
                <tr>
                    <th><?php echo esc_html__('ID', 'advanced-redirection-tool'); ?></th>
                    <th><?php echo esc_html__('Old URL', 'advanced-redirection-tool'); ?></th>
                    <th><?php echo esc_html__('New URL', 'advanced-redirection-tool'); ?></th>
                    <th><?php echo esc_html__('Action', 'advanced-redirection-tool'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cache_key = 'advred_tool_redirections';
                $redirections = wp_cache_get($cache_key);

                if ($redirections === false) {
                    $redirections = $wpdb->get_results("SELECT id, url_from, url_to FROM {$wpdb->prefix}advred_tool_redirections");
                    wp_cache_set($cache_key, $redirections);
                }

                if ($wpdb->last_error) {
                    echo '<tr><td colspan="4">' . esc_html__('Database error:', 'advanced-redirection-tool') . ' ' . esc_html($wpdb->last_error) . '</td></tr>';
                } elseif (!empty($redirections)) {
                    foreach ($redirections as $redirect) {
                        ?>
                        <tr>
                            <td><?php echo esc_html($redirect->id); ?></td>
                            <td><?php echo esc_url($redirect->url_from); ?></td>
                            <td><?php echo esc_url($redirect->url_to); ?></td>
                            <td>
                                <a href="<?php echo esc_url(add_query_arg(['edit' => $redirect->id], admin_url('admin.php?page=advred-tool'))); ?>" class="button"><?php echo esc_html__('Edit', 'advanced-redirection-tool'); ?></a>
                                <a href="<?php echo esc_url(add_query_arg(['delete' => $redirect->id, '_wpnonce' => wp_create_nonce('advred_tool_delete_redirection_nonce')], admin_url('admin.php?page=advred-tool'))); ?>" class="button" onclick="return confirm('<?php echo esc_js(__('Are you sure you want to delete this?', 'advanced-redirection-tool')); ?>');"><?php echo esc_html__('Delete', 'advanced-redirection-tool'); ?></a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4"><?php echo esc_html__('No redirections found.', 'advanced-redirection-tool'); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        // Handle Edit Form
        if (isset($_GET['edit']) && !empty($_GET['edit'])) {
            $edit_id = intval($_GET['edit']);
            $cache_key_edit = "advred_tool_edit_{$edit_id}";
            $edit_redirection = wp_cache_get($cache_key_edit);

            if ($edit_redirection === false) {
                $edit_redirection = $wpdb->get_row(
                    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}advred_tool_redirections WHERE id = %d", $edit_id)
                );
                wp_cache_set($cache_key_edit, $edit_redirection);
            }

            if ($edit_redirection) {
                ?>
                <hr>
                <h2><?php echo esc_html__('Edit Redirection', 'advanced-redirection-tool'); ?></h2>
                <form method="POST">
                    <?php wp_nonce_field('advred_tool_edit_redirection_nonce'); ?>
                    <input type="hidden" name="id" value="<?php echo esc_attr($edit_redirection->id); ?>">
                    <table class="form-table">
                        <tr>
                            <th><label for="url_from"><?php echo esc_html__('Old URL', 'advanced-redirection-tool'); ?></label></th>
                            <td><input type="url" id="url_from" name="url_from" value="<?php echo esc_attr($edit_redirection->url_from); ?>" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="url_to"><?php echo esc_html__('New URL', 'advanced-redirection-tool'); ?></label></th>
                            <td><input type="url" id="url_to" name="url_to" value="<?php echo esc_attr($edit_redirection->url_to); ?>" class="regular-text" required></td>
                        </tr>
                    </table>
                    <p><button type="submit" name="advred_tool_edit_redirection" class="button button-primary"><?php echo esc_html__('Update Redirection', 'advanced-redirection-tool'); ?></button></p>
                </form>
                <?php
            }
        }
        ?>
    </div>
    <?php
}

// Handle Redirection
function advred_tool_handle_redirection() {
    if (is_admin()) {
        return;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'advred_tool_redirections';

    if (!isset($_SERVER['REQUEST_URI']) || empty($_SERVER['REQUEST_URI'])) {
        return;
    }

    $current_path = trailingslashit(sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])));
    $cache_key_redirect = "advred_tool_redirect_{$current_path}";
    $redirect = wp_cache_get($cache_key_redirect);

    if ($redirect === false) {
        $redirect = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}advred_tool_redirections WHERE url_from = %s",
                $current_path
            )
        );
        wp_cache_set($cache_key_redirect, $redirect);
    }

    if ($redirect) {
        wp_redirect($redirect->url_to, 301);
        exit;
    }
}
add_action('template_redirect', 'advred_tool_handle_redirection');
