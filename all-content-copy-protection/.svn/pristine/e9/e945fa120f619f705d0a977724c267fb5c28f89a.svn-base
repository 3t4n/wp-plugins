<?php
/*
 * Plugin Name: All Content Copy Protection
 * Description: Protects your website content from being copied or accessed through various browser functions.
 * Version: 1.0
 * Author: Booker K
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Enqueue JavaScript and CSS files
function accp_enqueue_scripts($hook) {
    $options = get_option('accp_settings');

    if (!is_admin() && !is_user_logged_in()) {
        wp_enqueue_script(
            'accp-script',
            plugin_dir_url(__FILE__) . 'js/accp-script.js',
            [],
            '1.0',
            true
        );
        wp_localize_script('accp-script', 'accpOptions', $options);
    }

    if ($hook === 'toplevel_page_all-content-copy-protection') {
        wp_enqueue_script(
            'accp-admin-script',
            plugin_dir_url(__FILE__) . 'js/accp-admin-script.js',
            [],
            '1.0',
            true
        );
        wp_enqueue_style(
            'accp-admin-style',
            plugin_dir_url(__FILE__) . 'css/accp-admin-style.css',
            [],
            '1.0'
        );
    }
}
add_action('admin_enqueue_scripts', 'accp_enqueue_scripts');
add_action('wp_enqueue_scripts', 'accp_enqueue_scripts');

// Add admin menu
function accp_add_admin_menu() {
    add_menu_page('Copy Protection', 'Copy Protection', 'manage_options', 'all-content-copy-protection', 'accp_settings_page');
}
add_action('admin_menu', 'accp_add_admin_menu');

// Register settings with sanitization
function accp_register_settings() {
    register_setting(
        'accp_settings_group',
        'accp_settings',
        array(
            'type'              => 'array',
            'sanitize_callback' => 'accp_sanitize_settings',
        )
    );
}
add_action('admin_init', 'accp_register_settings');

// Sanitize settings callback function
function accp_sanitize_settings($input) {
    $sanitized = array();

    // List of allowed keys and default values
    $allowed_keys = array(
        'disable_all'           => '',
        'disable_left_click'    => '',
        'disable_right_click'   => '',
        'disable_dev_tools'     => '',
        'disable_drag_drop'     => '',
        'disable_f3'            => '',
        'disable_f6'            => '',
        'disable_f9'            => '',
        'disable_f12'           => '',
        'disable_ctrl_c'        => '',
        'disable_ctrl_v'        => '',
        'disable_ctrl_x'        => '',
        'disable_ctrl_s'        => '',
        'disable_ctrl_a'        => '',
        'disable_ctrl_u'        => '',
        'disable_ctrl_f'        => '',
        'disable_ctrl_p'        => '',
        'disable_ctrl_h'        => '',
        'disable_ctrl_l'        => '',
        'disable_ctrl_k'        => '',
        'disable_ctrl_o'        => '',
        'disable_alt_d'         => '',
        'disable_text_selection'=> '',
    );

    foreach ($allowed_keys as $key => $default) {
        $sanitized[$key] = isset($input[$key]) && $input[$key] === '1' ? '1' : ''; // Only allow '1' or default ''
    }

    return $sanitized;
}

// Admin page HTML
function accp_settings_page() {
    $settings = get_option('accp_settings', []);
    $defaults = array(
        'disable_all' => '',
        'disable_left_click' => '',
        'disable_right_click' => '',
        'disable_dev_tools' => '',
        'disable_drag_drop' => '',
        'disable_f3' => '',
        'disable_f6' => '',
        'disable_f9' => '',
        'disable_f12' => '',
        'disable_ctrl_c' => '',
        'disable_ctrl_v' => '',
        'disable_ctrl_x' => '',
        'disable_ctrl_s' => '',
        'disable_ctrl_a' => '',
        'disable_ctrl_u' => '',
        'disable_ctrl_f' => '',
        'disable_ctrl_p' => '',
        'disable_ctrl_h' => '',
        'disable_ctrl_l' => '',
        'disable_ctrl_k' => '',
        'disable_ctrl_o' => '',
        'disable_alt_d' => '',
        'disable_text_selection' => '',
    );
    $settings = wp_parse_args($settings, $defaults);
    ?>
    <div class="wrap">
        <h1>All Content Copy Protection</h1>
        <p><strong>Note:</strong> Protection is applied only to guest users. For logged-in users, all protection is disabled.</p>
        <form method="post" action="options.php">
            <?php settings_fields('accp_settings_group'); ?>
            <?php do_settings_sections('accp_settings_group'); ?>
            <table class="form-table accp-two-columns">
                <tr>
                    <td colspan="2">
                        <input type="checkbox" name="accp_settings[disable_all]" value="1" <?php checked($settings['disable_all'], '1'); ?>> 
                        <strong>Enable All Protection</strong>
                    </td>
                </tr>
                <?php
                $options = array(
                    'disable_left_click' => 'Disable Left Click',
                    'disable_right_click' => 'Disable Right Click',
                    'disable_dev_tools' => 'Disable Developer Tools',
                    'disable_drag_drop' => 'Disable Drag/Drop',
                    'disable_f3' => 'Disable F3',
                    'disable_f6' => 'Disable F6',
                    'disable_f9' => 'Disable F9',
                    'disable_f12' => 'Disable F12',
                    'disable_ctrl_c' => 'Disable CTRL+C',
                    'disable_ctrl_v' => 'Disable CTRL+V',
                    'disable_ctrl_x' => 'Disable CTRL+X',
                    'disable_ctrl_s' => 'Disable CTRL+S',
                    'disable_ctrl_a' => 'Disable CTRL+A',
                    'disable_ctrl_u' => 'Disable CTRL+U',
                    'disable_ctrl_f' => 'Disable CTRL+F',
                    'disable_ctrl_p' => 'Disable CTRL+P',
                    'disable_ctrl_h' => 'Disable CTRL+H',
                    'disable_ctrl_l' => 'Disable CTRL+L',
                    'disable_ctrl_k' => 'Disable CTRL+K',
                    'disable_ctrl_o' => 'Disable CTRL+O',
                    'disable_alt_d' => 'Disable ALT+D',
                    'disable_text_selection' => 'Disable Text Selection',
                );

                $keys = array_keys($options);
                $count = count($keys);
                $half = ceil($count / 2);

                for ($i = 0; $i < $half; $i++) {
                    echo '<tr>';

                    echo '<td>';
                    if (isset($keys[$i])) {
                        $key = $keys[$i];
                        echo '<input type="checkbox" name="accp_settings[' . esc_attr($key) . ']" value="1" ' . checked($settings[$key], '1', false) . '> ';
                        echo esc_html($options[$key]);
                    }
                    echo '</td>';

                    echo '<td>';
                    if (isset($keys[$i + $half])) {
                        $key = $keys[$i + $half];
                        echo '<input type="checkbox" name="accp_settings[' . esc_attr($key) . ']" value="1" ' . checked($settings[$key], '1', false) . '> ';
                        echo esc_html($options[$key]);
                    }
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}