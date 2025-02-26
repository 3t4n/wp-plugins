<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class Oceanalipay_Gateway_Blocks extends AbstractPaymentMethodType {

    private $gateway;
    protected $name = 'oceanalipay';
    public function initialize() {
        $this->settings = get_option( 'woocommerce_oceanalipay_settings', [] );
        $this->gateway = new WC_Gateway_Oceanalipay();
    }

    public function is_active() {
        return $this->gateway->is_available();
    }

    public function get_payment_method_script_handles() {

        wp_register_script(
            'oceanalipay-blocks-integration',
            plugin_dir_url(__FILE__) . 'js/oceanalipay-block.js',
            [
                'wc-blocks-registry',
                'wc-settings',
                'wp-element',
                'wp-html-entities',
                'wp-i18n',
            ],
            null,
            true
        );
        if( function_exists( 'wp_set_script_translations' ) ) {            
            wp_set_script_translations( 'oceanalipay-blocks-integration');
            
        }


        return [ 'oceanalipay-blocks-integration' ];
    }


    public function get_payment_method_data() {
        $icons[] = array(
            'id'  => 'alipay_icon',
            'alt' => 'AliPay',
            'src' => WC_HTTPS::force_https_url( plugins_url('images/op_Alipay.png' , __FILE__ ) )
        );
        return [
            'title' => $this->gateway->title,
            'description' => $this->gateway->description,
            'icons'=>$icons
        ];
    }

}
?>