<?php
/*
Plugin Name:  MiMap - Pick My Location For WooCommerce
Text Domain:  mymap-pick-my-location-for-woocommerce
Plugin URI:   https://marketplace.czargroup.net
Description:  MiMap is a powerful WordPress plugin that streamlines the checkout process by automatically filling in the current address for your customers.
Version:      2.1
Author:       Czargroup Technologies
Author URI:   https://czargroup.net
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// Retrieve options with proper defaults
$api_key = get_option('mymap_api_key', '');
$enable_billing = get_option('mymap_checkbox_billing', '1');
$enable_shipping = get_option('mymap_checkbox_shipping', '1');
$enable_location_url = get_option('mymap_location_url', '1');

if (!empty($api_key)) {
    if ($enable_billing === '1') {
        add_action('woocommerce_checkout_billing', 'mymap_checkout_billing_button');
        add_shortcode('pickmylocation_billing', 'mymap_shortcode_pick_billing');
    }

    if ($enable_shipping === '1') {
        add_action('woocommerce_checkout_shipping', 'mymap_checkout_shipping_button');
        add_shortcode('pickmylocation_shipping', 'mymap_shortcode_pick_shipping');
    }
}

// Billing button output
function mymap_checkout_billing_button() {
    echo '<a class="button mymap_pick_location_billing"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120.87 122.88" style="enable-background:new 0 0 120.87 122.88" xml:space="preserve"><g><path d="M79.21,70.64c11.61,1.57,21.65,4.57,28.79,8.49c8.11,4.45,12.88,10.3,12.88,17c0,8.29-7.44,15.35-19.46,20.05 c-10.58,4.14-25.07,6.69-40.98,6.69c-15.9,0-30.4-2.56-40.98-6.69C7.44,111.49,0,104.43,0,96.14c0-6.8,4.91-12.71,13.23-17.19 c7.32-3.94,17.6-6.93,29.47-8.44l1.28,10.11c-10.6,1.34-19.64,3.94-25.92,7.32c-4.93,2.65-7.83,5.51-7.83,8.2 c0,3.65,4.95,7.41,12.95,10.53c9.44,3.69,22.61,5.97,37.26,5.97c14.65,0,27.82-2.28,37.26-5.97c8-3.13,12.95-6.89,12.95-10.53 c0-2.63-2.8-5.44-7.57-8.05c-6.09-3.34-14.88-5.94-25.23-7.34L79.21,70.64L79.21,70.64z M65.33,44.36v50.87H55.1V44.36 c-9.95-2.32-17.36-11.24-17.36-21.89C37.74,10.06,47.8,0,60.22,0c12.41,0,22.47,10.06,22.47,22.47 C82.69,33.13,75.28,42.05,65.33,44.36L65.33,44.36z"/></g></svg>' . esc_html__('Pick my location (Billing Address)', 'mymap-pick-my-location-for-woocommerce') . '</a><div id="mymap_map_canvas" style="display:none;"></div>';
}

// Billing shortcode
function mymap_shortcode_pick_billing() {
    return '<button class="button mymap_pick_location_billing"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120.87 122.88" style="enable-background:new 0 0 120.87 122.88" xml:space="preserve"><g><path d="M79.21,70.64c11.61,1.57,21.65,4.57,28.79,8.49c8.11,4.45,12.88,10.3,12.88,17c0,8.29-7.44,15.35-19.46,20.05 c-10.58,4.14-25.07,6.69-40.98,6.69c-15.9,0-30.4-2.56-40.98-6.69C7.44,111.49,0,104.43,0,96.14c0-6.8,4.91-12.71,13.23-17.19 c7.32-3.94,17.6-6.93,29.47-8.44l1.28,10.11c-10.6,1.34-19.64,3.94-25.92,7.32c-4.93,2.65-7.83,5.51-7.83,8.2 c0,3.65,4.95,7.41,12.95,10.53c9.44,3.69,22.61,5.97,37.26,5.97c14.65,0,27.82-2.28,37.26-5.97c8-3.13,12.95-6.89,12.95-10.53 c0-2.63-2.8-5.44-7.57-8.05c-6.09-3.34-14.88-5.94-25.23-7.34L79.21,70.64L79.21,70.64z M65.33,44.36v50.87H55.1V44.36 c-9.95-2.32-17.36-11.24-17.36-21.89C37.74,10.06,47.8,0,60.22,0c12.41,0,22.47,10.06,22.47,22.47 C82.69,33.13,75.28,42.05,65.33,44.36L65.33,44.36z"/></g></svg>' . esc_html__('Pick my location (Billing Address)', 'mymap-pick-my-location-for-woocommerce') . '</button><div id="mymap_map_canvas" style="display:none;"></div>';
}

// Shipping button output
function mymap_checkout_shipping_button() {
    echo '<a class="button mymap_pick_location_shipping"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120.87 122.88" style="enable-background:new 0 0 120.87 122.88" xml:space="preserve"><g><path d="M79.21,70.64c11.61,1.57,21.65,4.57,28.79,8.49c8.11,4.45,12.88,10.3,12.88,17c0,8.29-7.44,15.35-19.46,20.05 c-10.58,4.14-25.07,6.69-40.98,6.69c-15.9,0-30.4-2.56-40.98-6.69C7.44,111.49,0,104.43,0,96.14c0-6.8,4.91-12.71,13.23-17.19 c7.32-3.94,17.6-6.93,29.47-8.44l1.28,10.11c-10.6,1.34-19.64,3.94-25.92,7.32c-4.93,2.65-7.83,5.51-7.83,8.2 c0,3.65,4.95,7.41,12.95,10.53c9.44,3.69,22.61,5.97,37.26,5.97c14.65,0,27.82-2.28,37.26-5.97c8-3.13,12.95-6.89,12.95-10.53 c0-2.63-2.8-5.44-7.57-8.05c-6.09-3.34-14.88-5.94-25.23-7.34L79.21,70.64L79.21,70.64z M65.33,44.36v50.87H55.1V44.36 c-9.95-2.32-17.36-11.24-17.36-21.89C37.74,10.06,47.8,0,60.22,0c12.41,0,22.47,10.06,22.47,22.47 C82.69,33.13,75.28,42.05,65.33,44.36L65.33,44.36z"/></g></svg>' . esc_html__('Pick my location (Shipping Address)', 'mymap-pick-my-location-for-woocommerce') . '</a><div id="mymap_map_canvas" style="display:none;"></div>';
}

// Shipping shortcode
function mymap_shortcode_pick_shipping() {
    return '<button class="button mymap_pick_location_shipping"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120.87 122.88" style="enable-background:new 0 0 120.87 122.88" xml:space="preserve"><g><path d="M79.21,70.64c11.61,1.57,21.65,4.57,28.79,8.49c8.11,4.45,12.88,10.3,12.88,17c0,8.29-7.44,15.35-19.46,20.05 c-10.58,4.14-25.07,6.69-40.98,6.69c-15.9,0-30.4-2.56-40.98-6.69C7.44,111.49,0,104.43,0,96.14c0-6.8,4.91-12.71,13.23-17.19 c7.32-3.94,17.6-6.93,29.47-8.44l1.28,10.11c-10.6,1.34-19.64,3.94-25.92,7.32c-4.93,2.65-7.83,5.51-7.83,8.2 c0,3.65,4.95,7.41,12.95,10.53c9.44,3.69,22.61,5.97,37.26,5.97c14.65,0,27.82-2.28,37.26-5.97c8-3.13,12.95-6.89,12.95-10.53 c0-2.63-2.8-5.44-7.57-8.05c-6.09-3.34-14.88-5.94-25.23-7.34L79.21,70.64L79.21,70.64z M65.33,44.36v50.87H55.1V44.36 c-9.95-2.32-17.36-11.24-17.36-21.89C37.74,10.06,47.8,0,60.22,0c12.41,0,22.47,10.06,22.47,22.47 C82.69,33.13,75.28,42.05,65.33,44.36L65.33,44.36z"/></g></svg>' . esc_html__('Pick my location (Shipping Address)', 'mymap-pick-my-location-for-woocommerce') . '</button><div id="mymap_map_canvas" style="display:none;"></div>';
}

// Enqueue scripts and styles
function mymap_enqueue_scripts_and_styles() {
    if (is_checkout()) {
        $api_key = get_option('mymap_api_key', '');
        wp_enqueue_script('mymap-pick-location-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), '1.0.1', true);
        wp_enqueue_style('mymap-pick-location-style', plugin_dir_url(__FILE__) . 'assets/css/style.css', array(), '1.0.1');

        if (!empty(get_option('mymap_api_key'))) {
            wp_enqueue_script('mymap-google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . esc_attr($api_key) . '&libraries=places', null, 1, false);
        }
    }
}
add_action('wp_enqueue_scripts', 'mymap_enqueue_scripts_and_styles');

// Include admin settings
include plugin_dir_path(__FILE__) . 'admin/settings.php';

// Add custom checkout field for location URL
if ($enable_location_url == '1' || $enable_location_url == 1) {
    add_action('woocommerce_after_order_notes', 'mymap_custom_checkout_field');
    add_action('woocommerce_checkout_update_order_meta', 'mymap_update_order_meta');
    add_action('woocommerce_admin_order_data_after_billing_address', 'mymap_display_location_url_admin_order_meta');
    add_filter('woocommerce_email_order_meta_keys', 'mymap_add_location_url_email_meta');
}

function mymap_custom_checkout_field($checkout) {
    woocommerce_form_field('mymap_location_url', array(
        'type' => 'hidden',
        'required' => false,
        'label' => __('Location URL', 'mymap-pick-my-location-for-woocommerce')
    ), $checkout->get_value('mymap_location_url'));
}

add_action('woocommerce_after_checkout_billing_form', function() {
    wp_nonce_field('mymap_checkout_nonce', 'mymap_nonce');
});
function mymap_update_order_meta($order_id) {
    if (isset($_POST['mymap_nonce'])) {
        // Unslash and sanitize the nonce
        $nonce = sanitize_text_field(wp_unslash($_POST['mymap_nonce'])); 

        if (wp_verify_nonce($nonce, 'mymap_checkout_nonce')) {
            // Process location URL if nonce is valid
            if (!empty($_POST['mymap_location_url'])) {
                $location_url = sanitize_text_field(wp_unslash($_POST['mymap_location_url'])); // Unslash and sanitize
                update_post_meta($order_id, 'mymap_location_url', $location_url);
            }
        }
    }
}

function mymap_display_location_url_admin_order_meta($order) {
    $location_url = get_post_meta($order->get_id(), 'mymap_location_url', true);
    if ($location_url) {
        echo '<p><strong>' . esc_html__('Location URL', 'mymap-pick-my-location-for-woocommerce') . ':</strong> <a href="' . esc_url($location_url) . '" target="_blank">' . esc_html($location_url) . '</a></p>';
    }
}

function mymap_add_location_url_email_meta($keys) {
    $keys[] = 'mymap_location_url';
    return $keys;
}

// Add plugin settings link
function mymap_add_settings_link($links, $file) {
    if ($file == plugin_basename(__FILE__)) {
        $links[] = '<a href="admin.php?page=mymap_plugin_settings">' . __('Settings', 'mymap-pick-my-location-for-woocommerce') . '</a>';
    }
    return $links;
}
add_filter('plugin_action_links', 'mymap_add_settings_link', 10, 2);

// Enqueue admin color picker
function mymap_enqueue_color_picker($hook_suffix) {
    if ('toplevel_page_mymap_plugin_settings' !== $hook_suffix) {
        return;
    }
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('mymap-admin-script', plugins_url('assets/js/admin.js', __FILE__), array('wp-color-picker'), '1.0.1', true);
}
add_action('admin_enqueue_scripts', 'mymap_enqueue_color_picker');

// Apply custom button color
function mymap_apply_button_color() {
    wp_register_style( 'mymap-pick-location-style-inline', false, null, 1.0 );
    wp_enqueue_style( 'mymap-pick-location-style-inline' );
    $button_color = get_option('mymap_color_picker', '#0073aa');
    if ($button_color) {
        wp_add_inline_style('mymap-pick-location-style-inline', ".mymap_pick_location_billing, .mymap_pick_location_shipping { background-color: ".$button_color." !important; border-color: ".$button_color." !important }");
    }
}
add_action('wp_footer', 'mymap_apply_button_color');