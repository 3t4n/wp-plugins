<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

class Moyasar_Payment_Block extends AbstractPaymentMethodType
{

    /**
     * Plugin name
     *
     * @var string
     */
    protected $name = 'moyasar';

    /**
     * Payment methods (Gateway)
     *
     * @var string
     */
    public $gateways = [];

    public function initialize()
    {
        $this->gateways = $this->get_gateways();
    }

    /**
     * Returns an array of key=>value pairs of data made available to the payment methods script.
     *
     * @return array
     */
    public function get_gateways()
    {
        $gateways = WC()->payment_gateways->payment_gateways();
        $moyasar_methods = [];

        foreach ($gateways as $gateway) {
            if (str_starts_with($gateway->id, $this->name)) {
                $moyasar_methods[$gateway->id] = $gateway;
            }
        }
        return $moyasar_methods;
    }

    /**
     * Returns an array of scripts/handles to be registered for this payment method.
     *
     * @return array
     */
    public function get_payment_method_script_handles() {
        $version = MOYASAR_PAYMENT_VERSION; // Dev: rand(1, 1000000);
        $dependencies = ['react', 'wc-blocks-registry', 'wc-settings', 'wp-html-entities'];

        wp_localize_script( 'wc-payment-method-moyasar', 'moyasar_notice', [
            'value' => wp_create_nonce('moyasar-form')
        ] );

        wp_register_script(
            'wc-payment-method-moyasar',
            MOYASAR_PAYMENT_URL . '/assets/blocks/dist/index.js',
            $dependencies,
            $version,
            true
        );

        return ['wc-payment-method-moyasar'];
    }


    /**
     * Returns an array of key=>value pairs of data made available to the payment methods script.
     *
     * @return array
     */
    public function get_payment_method_data()
    {
        $data = [];
        $country_code = WC()->countries->get_base_country() ?? 'SA';
        $store_name = moyasar_get_store_name();
        foreach ($this->gateways as $gateway) {
            $gateWayData = [
                'id' => $gateway->id,
                'enabled' => $gateway->enabled == 'yes',
                'name' => $gateway->id,
                'title' => $gateway->title ?? '',
                'supports' => array_filter($gateway->supports, [$gateway, 'supports']),
                'icon' => moyasar_get_method_icon($gateway),
                'description' => $gateway->description,
                'supportedNetworks' => $gateway->settings['schemas'] ?? [],
                'supportedCountries' => $gateway->settings['supportedCountries'] ?? ['SA'],
                'countryCode' => $country_code,
                'storeName' => $store_name,
                'baseUrl' => MOYASAR_API_BASE_URL,
                'publishableKey' => $gateway->settings['api_pb']
            ];

            $data[$gateway->id] = $gateWayData;
        }
        return $data;
    }




}
