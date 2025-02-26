<?php

namespace Ambikly\Gateways;
class PaymentGateways
{
    public function __construct()
    {
        add_filter('ambikly_global_settings', [$this, 'gateways_settings']);

        $this->register();

    }

    public function gateways_settings($settings)
    {
        $settings['payments']['subtabs']['cash_on_delivery'] =
            ['title' => esc_html__('Cash On Delivery', 'ambikly'),
                'icon' => '💸',
                'class' => \Ambikly\Gateways\CashOnDelivery\Settings::class
            ];
        $settings['payments']['subtabs']['paypal'] =
            ['title' => esc_html__('PayPal', 'ambikly'),
                'icon' => '💸',
                'class' => \Ambikly\Gateways\PayPal\Settings::class
            ];
        return $settings;
    }

    public function register()
    {
        foreach (ambikly_get_available_payment_gateways() as $gateway) {

            if (class_exists($gateway)) {

                $gateway::getInstance();
            }
        }
    }

}