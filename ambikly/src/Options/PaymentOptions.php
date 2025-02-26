<?php

namespace Ambikly\Options;
class PaymentOptions extends BaseOptions
{

    public function __construct()
    {

    }

    public function getOptions()
    {
        return [
            'general' => [
                [
                    'type' => 'text',
                    'label' => esc_html__('Order', 'ambikly'),
                    'name' => 'order_id',
                    'placeholder' => esc_html__('Enter Order ID here', 'ambikly'),
                    'attributes' => [
                        'required' => 'required',
                    ],
                    'validation' => ['required']
                ],
                [
                    'type' => 'text',
                    'label' => esc_html__('Payment Gateway', 'ambikly'),
                    'name' => 'payment_method',
                    'placeholder' => esc_html__('Payment Gateway', 'ambikly'),
                    'attributes' => [
                        'required' => 'required',
                    ],
                    'validation' => ['required'],
                    'sanitize' => function ($text) {
                        // Convert to lowercase
                        $slug = strtolower($text);

                        // Remove invalid characters
                        $slug = preg_replace('/[^a-z0-9 -]/', '', $slug);

                        // Trim whitespace
                        $slug = trim($slug);

                        // Replace spaces with hyphens
                        $slug = str_replace(' ', '-', $slug);

                        // Replace multiple hyphens with a single one
                        $slug = preg_replace('/--+/', '-', $slug);

                        return $slug;
                    }
                ],
                [
                    'type' => 'text',
                    'label' => esc_html__('Transaction ID', 'ambikly'),
                    'name' => 'transaction_id',
                    'placeholder' => esc_html__('Transaction ID', 'ambikly'),

                ],
                [
                    'type' => 'number',
                    'label' => esc_html__('Total Amount', 'ambikly'),
                    'name' => 'amount',
                    'placeholder' => esc_html__('Amount', 'ambikly'),

                ],
                [
                    'type' => 'textarea',
                    'label' => esc_html__('Payment Note', 'ambikly'),
                    'name' => 'payment_note',
                    'placeholder' => esc_html__('Payment Note', 'ambikly'),

                ]
            ],
            'status' => [
                [
                    'type' => 'select',
                    'label' => esc_html__('Status', 'ambikly'),
                    'name' => 'status',
                    'placeholder' => esc_html__('Status', 'ambikly'),
                    'options' => ambikly_get_payment_statuses(),
                ],
            ],
        ];
    }
}