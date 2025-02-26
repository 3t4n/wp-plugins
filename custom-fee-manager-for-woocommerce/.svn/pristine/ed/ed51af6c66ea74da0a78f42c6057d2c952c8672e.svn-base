<?php
/*
Plugin Name: Custom Fee Manager for WooCommerce
Plugin URI: https://graphixlab.ch/plugins/
Description: Adds custom fees to WooCommerce checkout based on user settings.
Version: 1.0
Author: Bogdan Anton
Author URI: https://graphixlab.ch
Copyright: © 2024 GraphixLAB. All rights reserved.
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires Plugins: woocommerce
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Check if WooCommerce is active
function cfmfwc_check_woocommerce_dependency() {
    if (!class_exists('WooCommerce')) {
        add_action('admin_notices', 'cfmfwc_woocommerce_notice');
        deactivate_plugins(plugin_basename(__FILE__));
    }
}
add_action('admin_init', 'cfmfwc_check_woocommerce_dependency');

// Notice for the admin if WooCommerce is not active
function cfmfwc_woocommerce_notice() {
    ?>
    <div class="notice notice-error">
        <p>
            <?php 
            printf(
				// translators: %s is the link to the WooCommerce plugin installation page.
                esc_html__('Custom Fee Manager for WooCommerce requires WooCommerce to be installed and activated. Please install WooCommerce %s.', 'custom-fee-manager-for-woocommerce'),
                '<a href="https://wordpress.org/plugins/woocommerce/" target="_blank">' . esc_html__('here', 'custom-fee-manager-for-woocommerce') . '</a>'
            );
            ?>
        </p>
    </div>
    <?php
}

// Add settings page under WooCommerce menu
add_action('admin_menu', 'cfmfwc_plugin_menu');

function cfmfwc_plugin_menu() {
    add_submenu_page(
        'woocommerce',                         // Parent slug
        'Custom Fee Manager',                  // Page title
        'Custom Fee Manager',                  // Menu title
        'manage_options',                      // Capability
        'custom-fee-manager-for-woocommerce',  // Menu slug
        'cfmfwc_plugin_settings_page'          // Function that displays the settings page
    );
}

// Function for the settings page
function cfmfwc_plugin_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('WooCommerce Custom Fee Manager', 'custom-fee-manager-for-woocommerce'); ?></h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('cfmfwc_settings_group');
            do_settings_sections('custom-fee-manager-for-woocommerce');
            submit_button(esc_html__('Save Settings', 'custom-fee-manager-for-woocommerce'));
            ?>
        </form>

        <p style="color: red; font-style: italic;"><?php esc_html_e('INFO: To remove custom fees, delete the name and price, and then click "Save Settings".', 'custom-fee-manager-for-woocommerce'); ?></p>

        <div class="donation-section">
            <p><?php esc_html_e('If you find this plugin useful, please consider donating:', 'custom-fee-manager-for-woocommerce'); ?></p>
            <a href="https://paypal.me/BogdanIonutAnton" target="_blank" class="button button-primary">
                <?php esc_html_e('Donate via PayPal', 'custom-fee-manager-for-woocommerce'); ?>
            </a>
        </div>
    </div>
    <?php
}

// Register settings and sections for the settings page
add_action('admin_init', 'cfmfwc_register_settings');

function cfmfwc_register_settings() {
    register_setting('cfmfwc_settings_group', 'cfmfwc_enable', 'sanitize_text_field'); // Sanitize enable/disable option
    register_setting('cfmfwc_settings_group', 'cfmfwc_fees', 'cfmfwc_sanitize_fees');   // Sanitize custom fees array

    add_settings_section('cfmfwc_settings_section', '', null, 'custom-fee-manager-for-woocommerce');

    // Add fields
    add_settings_field('cfmfwc_enable', esc_html__('Enable/Disable Custom Fee', 'custom-fee-manager-for-woocommerce'), 'cfmfwc_enable_field', 'custom-fee-manager-for-woocommerce', 'cfmfwc_settings_section');
    add_settings_field('cfmfwc_fees', esc_html__('Custom Fees', 'custom-fee-manager-for-woocommerce'), 'cfmfwc_fees_field', 'custom-fee-manager-for-woocommerce', 'cfmfwc_settings_section');
}

// Function to sanitize custom fees
function cfmfwc_sanitize_fees($fees) {
    if (is_array($fees)) {
        foreach ($fees as $index => $fee) {
            $fees[$index]['name'] = sanitize_text_field($fee['name']);
            $fees[$index]['price'] = floatval($fee['price']);
        }
    }
    return $fees;
}

// Field for enabling/disabling the custom fee
function cfmfwc_enable_field() {
    $enable = get_option('cfmfwc_enable', 'no');
    ?>
    <input type="checkbox" name="cfmfwc_enable" value="yes" <?php checked($enable, 'yes'); ?>> 
    <?php esc_html_e('Enable Custom Fees', 'custom-fee-manager-for-woocommerce'); ?>
    <?php
}

// Field for custom fees (with two default rows)
function cfmfwc_fees_field() {
    $custom_fees = get_option('cfmfwc_fees', []);

    if (empty($custom_fees)) {
        $custom_fees = [
            ['name' => '', 'price' => ''],
            ['name' => '', 'price' => ''],
        ];
    }

    ?>
    <div id="cfmfwc-fee-fields">
        <?php foreach ($custom_fees as $index => $fee) { ?>
            <div class="cfmfwc-fee-field">
                <label>
                    <?php 
					// translators: %d is the fee index number.
                    printf(esc_html__('Fee %d:', 'custom-fee-manager-for-woocommerce'), intval($index + 1)); 
                    ?>
                </label>

                <input type="text" name="cfmfwc_fees[<?php echo esc_attr($index); ?>][name]" value="<?php echo esc_attr($fee['name']); ?>" placeholder="<?php esc_attr_e('Enter Fee Name', 'custom-fee-manager-for-woocommerce'); ?>">
                <input type="number" name="cfmfwc_fees[<?php echo esc_attr($index); ?>][price]" value="<?php echo esc_attr($fee['price']); ?>" placeholder="<?php esc_attr_e('Enter Price', 'custom-fee-manager-for-woocommerce'); ?>">
            </div>
        <?php } ?>
    </div>
    <?php
}

// Enqueue the CSS and JavaScript for the settings page
function cfmfwc_enqueue_assets($hook) {
    if ($hook != 'woocommerce_page_custom-fee-manager-for-woocommerce') {
        return;
    }

    // Enqueue CSS
    wp_enqueue_style('cfmfwc-styles', plugin_dir_url(__FILE__) . 'assets/css/styles.css', [], '1.0');

    // Enqueue JavaScript
    wp_enqueue_script('cfmfwc-scripts', plugin_dir_url(__FILE__) . 'assets/js/custom-fee.js', ['jquery'], '1.0', true);
}
add_action('admin_enqueue_scripts', 'cfmfwc_enqueue_assets');

// Add custom fees to WooCommerce checkout
add_action('woocommerce_cart_calculate_fees', 'cfmfwc_apply_fees');

function cfmfwc_apply_fees() {
    if ('yes' !== get_option('cfmfwc_enable', 'no')) {
        return;
    }

    $custom_fees = get_option('cfmfwc_fees', []);
    if (!empty($custom_fees)) {
        foreach ($custom_fees as $fee) {
            if (!empty($fee['name']) && isset($fee['price'])) {
                WC()->cart->add_fee(esc_html($fee['name']), floatval($fee['price']), true, '');
            }
        }
    }
}

// Clear options from the database upon plugin deactivation
function cfmfwc_deactivation() {
    delete_option('cfmfwc_enable');
    delete_option('cfmfwc_fees');
}
register_deactivation_hook(__FILE__, 'cfmfwc_deactivation');
