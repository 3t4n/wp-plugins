<?php 

// Add settings page to WooCommerce menu
add_action('admin_menu', 'accodps_wc_advance_payment_add_admin_menu');
function accodps_wc_advance_payment_add_admin_menu() {
    add_submenu_page('woocommerce', 'Advance Conditional COD Payment Settings', 'Advance Conditional COD Payment', 'manage_options', 'accodps_wc-advance-cod-payment-settings', 'accodps_accodps_wc_advance_payment_settings_page');
}

// Display settings page
function accodps_accodps_wc_advance_payment_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Advance Conditional COD Payment Settings', 'advanced-conditional-cod-payment-system'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('accodps_wc_advance_payment_settings');
            do_settings_sections('accodps_wc-advance-cod-payment-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register settings
add_action('admin_init', 'accodps_accodps_wc_advance_payment_settings_init');
function accodps_accodps_wc_advance_payment_settings_init() {
    register_setting('accodps_wc_advance_payment_settings', 'accodps_advance_payment_title', 'sanitize_text_field');
    register_setting('accodps_wc_advance_payment_settings', 'accodps_advance_payment_description', 'sanitize_text_field');
    register_setting('accodps_wc_advance_payment_settings', 'accodps_advance_payment_checkbox_text', 'sanitize_text_field');
    register_setting('accodps_wc_advance_payment_settings', 'accodps_wc_advance_payment_percentage', 'absint');
    register_setting('accodps_wc_advance_payment_settings', 'accodps_wc_advance_payment_min_order_total', 'absint');

    add_settings_section(
        'accodps_wc_advance_payment_settings_section',
        __('Advance Conditional COD Payment Settings', 'advanced-conditional-cod-payment-system'),
        '',
        'accodps_wc-advance-cod-payment-settings'
    );

    add_settings_field(
        'accodps_advance_payment_title',
        __('Title', 'advanced-conditional-cod-payment-system'),
        'accodps_advance_payment_title_render',
        'accodps_wc-advance-cod-payment-settings',
        'accodps_wc_advance_payment_settings_section'
    );

    add_settings_field(
        'accodps_advance_payment_description',
        __('Description', 'advanced-conditional-cod-payment-system'),
        'accodps_advance_payment_description_render',
        'accodps_wc-advance-cod-payment-settings',
        'accodps_wc_advance_payment_settings_section'
    );

    add_settings_field(
        'accodps_advance_payment_checkbox_text',
        __('Checkbox Text', 'advanced-conditional-cod-payment-system'),
        'accodps_advance_payment_checkbox_text_render',
        'accodps_wc-advance-cod-payment-settings',
        'accodps_wc_advance_payment_settings_section'
    );

    add_settings_field(
        'accodps_wc_advance_payment_percentage',
        __('Advance Payment Percentage', 'advanced-conditional-cod-payment-system'),
        'accodps_wc_advance_payment_percentage_render',
        'accodps_wc-advance-cod-payment-settings',
        'accodps_wc_advance_payment_settings_section'
    );

    add_settings_field(
        'accodps_wc_advance_payment_min_order_total',
        __('Minimum Order Total for Advance Payment', 'advanced-conditional-cod-payment-system'),
        'accodps_wc_advance_payment_min_order_total_render',
        'accodps_wc-advance-cod-payment-settings',
        'accodps_wc_advance_payment_settings_section'
    );
}

function accodps_wc_advance_payment_percentage_render() {
    global $accodps_adv_pay_per;
    echo '<input type="number" name="accodps_wc_advance_payment_percentage" value="' . esc_attr($accodps_adv_pay_per) . '" min="1" max="100" />';
}

function accodps_wc_advance_payment_min_order_total_render() {
    global $accodps_adv_min_order_total;
    echo '<input type="number" name="accodps_wc_advance_payment_min_order_total" value="' . esc_attr($accodps_adv_min_order_total) . '" min="0" />';
}

function accodps_advance_payment_title_render() {
    global $accodps_ap_title;
    echo '<textarea name="accodps_advance_payment_title" rows="5" cols="50">' . esc_textarea($accodps_ap_title) . '</textarea>';
}

function accodps_advance_payment_checkbox_text_render() {
    global $accodps_ap_checkbox_text;
    echo '<textarea name="accodps_advance_payment_checkbox_text" rows="5" cols="50">' . esc_textarea($accodps_ap_checkbox_text) . '</textarea>';
}

function accodps_advance_payment_description_render() {
    global $accodps_ap_description;
    echo '<textarea name="accodps_advance_payment_description" rows="5" cols="50">' . esc_textarea($accodps_ap_description) . '</textarea>';
}