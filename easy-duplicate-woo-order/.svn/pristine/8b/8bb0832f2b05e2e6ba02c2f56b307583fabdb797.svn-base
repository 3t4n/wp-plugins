<?php
if (!defined('ABSPATH')) {
    exit;
}

// Add a new tab to WooCommerce settings
add_filter('woocommerce_settings_tabs_array', 'wizbee_add_settings_tab', 50);
function wizbee_add_settings_tab($settings_tabs) {
    $settings_tabs['wizbee_duplicate_order'] = __('Duplicate Order', 'easy-duplicate-woo-order');
    return $settings_tabs;
}

// Add settings to the new tab
add_action('woocommerce_settings_wizbee_duplicate_order', 'wizbee_add_settings_tab_settings');
function wizbee_add_settings_tab_settings() {
    woocommerce_admin_fields(wizbee_get_settings());
}

// Save the settings
add_action('woocommerce_update_options_wizbee_duplicate_order', 'wizbee_update_settings');
function wizbee_update_settings() {
    woocommerce_update_options(wizbee_get_settings());
}


function wizbee_get_settings() {
    $order_statuses = wc_get_order_statuses();
    $settings = array(
        'section_title' => array(
            'name'     => __('Duplicate Order Settings', 'easy-duplicate-woo-order'),
            'type'     => 'title',
            'desc'     => '',
            'id'       => 'wizbee_duplicate_order_section_title'
        ),
        'order_status' => array(
            'name'     => __('New Order Status', 'easy-duplicate-woo-order'),
            'type'     => 'select',
            'desc'     => __('Select the order status for the new duplicated order.', 'easy-duplicate-woo-order'),
            'id'       => 'wizbee_duplicate_order_status',
            'options'  => $order_statuses,
            'default'  => 'wc-pending',
        ),
        'copy_old_price' => array(
            'name'     => __('Copy Old Price', 'easy-duplicate-woo-order'),
            'type'     => 'checkbox',
            'desc'     => __('Enable copying of price from the original order.<br>Enable if you use multi-currency. This option will copy the currency data and the price together.', 'easy-duplicate-woo-order'),
            'id'       => 'wizbee_duplicate_order_copy_old_price',
            'default'  => 'yes',
        ),
		'apply_coupons' => array(
            'name'     => __('Apply Coupons', 'easy-duplicate-woo-order'),
            'type'     => 'checkbox',
            'desc'     => __('Enable copying and applying of coupons from the original order.', 'easy-duplicate-woo-order'),
            'id'       => 'wizbee_duplicate_order_apply_coupons',
            'default'  => 'yes',
            'class'    => 'coupons-options',
        ),
        'copy_fees' => array(
            'name'     => __('Copy Fee', 'easy-duplicate-woo-order'),
            'type'     => 'checkbox',
            'desc'     => __('Enable copying of fees from the original order.', 'easy-duplicate-woo-order'),
            'id'       => 'wizbee_duplicate_order_copy_fees',
            'default'  => 'yes',
            'class'    => 'fee-options',
        ),
        'copy_shipping' => array(
            'name'     => __('Copy Shipping', 'easy-duplicate-woo-order'),
            'type'     => 'checkbox',
            'desc'     => __('Enable copying of shipping information.', 'easy-duplicate-woo-order'),
            'id'       => 'wizbee_duplicate_order_copy_shipping',
            'default'  => 'yes',
            'class'    => 'ship-options',
        ),
        'section_end' => array(
            'type'     => 'sectionend',
            'id'       => 'wizbee_duplicate_order_section_end'
        ),
    );
    return $settings;
}
