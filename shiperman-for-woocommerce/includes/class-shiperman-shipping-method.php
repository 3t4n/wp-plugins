<?php


namespace SMFWC\Shiperman\Shipping_Method;

if (!defined('ABSPATH')) exit;

use SMFWC\Shiperman\API\SMFWC_Shiperman_API;
use WC_Shipping_Method;

class SMFWC_Shiperman_Shipping_Method extends WC_Shipping_Method
{
    public function __construct()
    {
        $this->id = 'shiperman_shipping_method';
        $this->method_title = __('Shiperman Shipping', 'shiperman-for-woocommerce');
        $this->method_description = __('Shiperman API-driven shipping method', 'shiperman-for-woocommerce');
        $this->enabled = "yes";
        $this->title = "Shiperman Shipping";
        $this->init();
    }

    public function init()
    {
        $this->init_form_fields();
        $this->init_settings();
        add_action('woocommerce_update_options_shipping_' . $this->id, [$this, 'process_admin_options']);
    }

    public static function register()
    {
        add_filter('woocommerce_shipping_methods', function ($methods) {
            $methods['shiperman_shipping_method'] = self::class;
            return $methods;
        });
    }

    public function init_form_fields()
    {
        $this->form_fields = [
            'enabled' => [
                'title' => __('Enable', 'shiperman-for-woocommerce'),
                'type' => 'checkbox',
                'description' => __('Enable Shiperman shipping method.', 'shiperman-for-woocommerce'),
                'default' => 'yes',
            ],
            'title' => [
                'title' => __('Method Title', 'shiperman-for-woocommerce'),
                'type' => 'text',
                'description' => __('This controls the title displayed to customers at checkout.', 'shiperman-for-woocommerce'),
                'default' => __('Shiperman Shipping', 'shiperman-for-woocommerce'),
                'desc_tip' => true,
            ],
            'pricing_type' => [
                'title' => __('Pricing Type', 'shiperman-for-woocommerce'),
                'type' => 'select',
                'description' => __('Choose between Flat Rate or Margin Rate pricing.', 'shiperman-for-woocommerce'),
                'default' => 'flat_rate',
                'options' => [
                    'flat_rate' => __('Flat Rate', 'shiperman-for-woocommerce'),
                    'margin_rate' => __('Margin Rate', 'shiperman-for-woocommerce'),
                ],
            ],
            'flat_rate_cost' => [
                'title' => __('Flat Rate Cost', 'shiperman-for-woocommerce'),
                'type' => 'price',
                'description' => __('Enter the flat rate for shipping.', 'shiperman-for-woocommerce'),
                'default' => '5.00',
                'desc_tip' => true,
            ],
            'margin_rate' => [
                'title' => __('Margin Rate Multiplier', 'shiperman-for-woocommerce'),
                'type' => 'number',
                'description' => __('Enter the margin multiplier for Shiperman API rates.', 'shiperman-for-woocommerce'),
                'default' => '1.0',
                'desc_tip' => true,
                'custom_attributes' => ['step' => '0.01'],
            ],
            'free_shipping_threshold' => [
                'title' => __('Free Shipping Threshold', 'shiperman-for-woocommerce'),
                'type' => 'price',
                'description' => __('Enter the order amount above which free shipping applies.', 'shiperman-for-woocommerce'),
                'default' => '100.00',
                'desc_tip' => true,
            ],
        ];
    }

    public function calculate_shipping($package = [])
    {
        $pricing_type = $this->get_option('pricing_type');
        $cost = ($pricing_type === 'flat_rate') ? (float) $this->get_option('flat_rate_cost') : $this->get_dynamic_shipping_rate($package);

        if (WC()->cart->get_cart_contents_total() >= $this->get_option('free_shipping_threshold')) {
            $cost = 0;
        }

        $this->add_rate([
            'id' => $this->id,
            'label' => $this->title,
            'cost' => $cost,
            'calc_tax' => 'per_order',
        ]);
    }

    private function get_dynamic_shipping_rate($package)
    {
        $destination_country = $package['destination']['country'];
        $items = array_map(fn($item) => [
            'id' => $item['data']->get_id(),
            'weight' => (float) $item['data']->get_weight(),
            'name' => $item['data']->get_name(),
            'price' => (float) $item['data']->get_price(),
        ], $package['contents']);

        $body = [
            'items' => $items,
            'recipient' => ['countryCode' => $destination_country],
            'currency' => get_woocommerce_currency(),
        ];

        $response = SMFWC_Shiperman_API::get_instance()->make_authenticated_request('plugin/orders/check-price', 'POST', $body);
        return (!empty($response['status']) && $response['status'] === 'success' && !empty($response['data']['cost'])) ? $response['data']['cost'] : false;
    }
}
