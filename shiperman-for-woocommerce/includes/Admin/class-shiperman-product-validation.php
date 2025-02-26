<?php

namespace SMFWC\Shiperman\Product_Validation;

if (!defined('ABSPATH')) exit;

class SMFWC_Shiperman_Product_Validation
{
    public function __construct()
    {
        add_action('woocommerce_process_product_meta', [$this, 'validate_product_dimensions'], 10);
    }


    public function validate_product_dimensions($post_id)
    {

        if (!isset($_POST['woocommerce_meta_nonce']) || !check_admin_referer('woocommerce_process_product_meta', 'woocommerce_meta_nonce')) {
            wp_die(esc_html__('Invalid nonce verification.', 'shiperman-for-woocommerce'));
        }

        if (!$this->is_shiperman_enabled()) {
            return;
        }

        $product = wc_get_product($post_id);
        if (!$product) {
            return;
        }

        $weight = isset($_POST['_weight']) ? sanitize_text_field(wp_unslash($_POST['_weight'])) : '';
        $length = isset($_POST['_length']) ? sanitize_text_field(wp_unslash($_POST['_length'])) : '';
        $width = isset($_POST['_width']) ? sanitize_text_field(wp_unslash($_POST['_width'])) : '';
        $height = isset($_POST['_height']) ? sanitize_text_field(wp_unslash($_POST['_height'])) : '';

        if (empty($weight) || empty($length) || empty($width) || empty($height)) {
            $this->add_admin_notice();

            // Prevent saving by triggering an error
            //remove_action('save_post_product', [$this, 'validate_product_dimensions'], 10);
            wp_die(esc_html__('Please ensure weight, length, width, and height are set for this product when Shiperman shipping is enabled.', 'shiperman-for-woocommerce'));
        }
    }

    private function is_shiperman_enabled()
    {
        $shiperman_settings = get_option('woocommerce_shiperman_shipping_method_settings');
        return isset($shiperman_settings['enabled']) && $shiperman_settings['enabled'] === 'yes';
    }

    private function add_admin_notice()
    {
        add_action('admin_notices', function () {
            echo '<div class="notice notice-error"><p>';
            echo esc_html__('Shiperman requires that weight, length, width, and height are set for this product.', 'shiperman-for-woocommerce');
            echo '</p></div>';
        });
    }
}
