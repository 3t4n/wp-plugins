<?php

namespace Ambikly\Gateways\PayPal;

use Ambikly\Settings\BaseSettings;

class Settings extends BaseSettings
{

    public function __construct()
    {
        $this->id = 'paypal';

        $this->label = esc_html__('PayPal Setting', 'ambikly');

        parent::__construct();
    }

    public function getSettings()
    {
        return [
            'general' => [

                [
                    'type' => 'text',
                    'label' => esc_html__('Gateway Title', 'ambikly'),
                    'name' => $this->id . '_title',
                    'placeholder' => esc_html__('PayPal', 'ambikly'),
                    'value' => esc_html__('Pay with PayPal', 'ambikly'),
                ],
                [
                    'type' => 'textarea',
                    'label' => esc_html__('Gateway Description', 'ambikly'),
                    'name' => $this->id . '_description',
                    'placeholder' => esc_html__('Pay with PayPal', 'ambikly'),
                    'value' => esc_html__('Pay with PayPal', 'ambikly'),
                ],
                [
                    'type' => 'text',
                    'label' => esc_html__('PayPal Email', 'ambikly'),
                    'name' => $this->id . '_email',
                    'placeholder' => esc_html__('PayPal account email address', 'ambikly'),
                ],

                [
                    'type' => 'checkbox',
                    'label' => esc_html__('Test/Sandbox mode', 'ambikly'),
                    'name' => $this->id . '_test_mode',
                    'desc' => esc_html__('Enable test mode only if you do not want to proceed with live/real payment.', 'ambikly'),
                ],
            ]
        ];
    }
}