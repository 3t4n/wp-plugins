<?php

namespace Ambikly\Settings;

class GeneralPaymentSettings extends BaseSettings
{

    public function __construct()
    {
        $this->id = 'general';
        $this->label = esc_html__('General Payments', 'ambikly');
        parent::__construct();
    }

    public function getSettings()
    {
        $available_gateways_class = ambikly_get_available_payment_gateways();
        $available_gateways = [];

        foreach ($available_gateways_class as $class) {
            $available_gateways[$class::getID()] = $class::getTitle();
        }
        return [
            'general' => [
                [
                    'type' => 'multicheckbox',
                    'label' => esc_html__('Select Payment Gateways', 'ambikly'),
                    'name' => 'active_payment_gateways',
                    'placeholder' => esc_html__(' Selected Payment Gateways', 'ambikly'),
                    'options' => $available_gateways,
                ],
                [
                    'type' => 'select',
                    'label' => esc_html__('Default Payment Gateway', 'ambikly'),
                    'name' => 'default_payment_gateway',
                    'placeholder' => esc_html__('Default Payment Gateways', 'ambikly'),
                    'options' => $available_gateways,
                ]
            ],
            'account' => [
                [
                    'type' => 'checkbox',
                    'label' => esc_html__(' Enable guest checkout', 'ambikly'),
                    'name' => 'enable_guest_checkout',
                    'placeholder' => esc_html__(' Enable guest checkout', 'ambikly'),
                    'value' => 1,
                    'desc' => esc_html__('Enable guest checkout during checkout.', 'ambikly')
                ]
            ]
        ];
    }
}