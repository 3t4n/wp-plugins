<?php

namespace Ambikly\Gateways\CashOnDelivery;

use Ambikly\Settings\BaseSettings;

class Settings extends BaseSettings
{

    public function __construct()
    {
        $this->id = 'cash_on_delivery';
        $this->label = esc_html__('Cash On Delivery Setting', 'ambikly');
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
                    'placeholder' => esc_html__('Cash On Delivery', 'ambikly'),
                    'value' => esc_html__('Cash On Delivery', 'ambikly'),
                ],
                [
                    'type' => 'textarea',
                    'label' => esc_html__('Gateway Description', 'ambikly'),
                    'name' => $this->id . '_description',
                    'placeholder' => esc_html__('Cash On Delivery', 'ambikly'),
                    'value' => esc_html__('Pay with cash upon delivery.', 'ambikly'),
                ],
                [
                    'type' => 'textarea',
                    'label' => esc_html__('Instructions', 'ambikly'),
                    'name' => $this->id . '_instructions',
                    'placeholder' => esc_html__('Pay with cash upon delivery.', 'ambikly'),
                    'value' => esc_html__('Cash on delivery payment instructions.', 'ambikly'),
                ],
            ]
        ];
    }
}