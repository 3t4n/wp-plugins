<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class WC_Easytransac_Blocks extends AbstractPaymentMethodType
{

    protected $name = 'easytransac';
    private $gateway;// your payment gateway name

    public function initialize()
    {
        $this->settings = get_option('woocommerce_easytransac_settings', []);
        $this->gateway = new EasytransacGateway();
    }

    public function is_active()
    {
        return $this->gateway->is_available();
    }

    public function get_payment_method_script_handles()
    {
        wp_register_script('wc-easytransac-blocks-integration', plugin_dir_url(__FILE__) . 'block/checkout.js', ['wc-blocks-registry', 'wc-settings', 'wp-element', 'wp-html-entities', 'wp-i18n',], null, true);

        if (function_exists('wp_set_script_translations')) {
            wp_set_script_translations('wc-easytransac-blocks-integration', 'wc-easytransac', plugin_dir_url(__FILE__) . '../i18n/languages/');
        }
        return ['wc-easytransac-blocks-integration'];
    }

    public function get_payment_method_data()
    {
        return [
        'title' => $this->gateway->title,
        'description' => $this->gateway->description,
        'icon' => $this->gateway->get_icon(),
    ];
    }

    public function get_supported_features(): array {
        return  $this->gateway->supports;
    }


}

