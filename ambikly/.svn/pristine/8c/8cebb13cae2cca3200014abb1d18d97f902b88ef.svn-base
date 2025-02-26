<?php

namespace Ambikly\Options;

use Ambikly\Controllers\CategoryController;
use Ambikly\Controllers\CustomerController;

class OrderOptions extends BaseOptions
{

    public function __construct()
    {


    }

    public function getOptions()
    {
        /**
         * @var $customer CustomerController
         */
        $customer = ambikly()->getClass('Controllers.CustomerController');

        $customer_lists = $customer->getMappedCustomers();

        $currency_code_options = ambikly_currencies();
        foreach ($currency_code_options as $code => $name) {
            $currency_code_options[$code] = $name . ' (' . ambikly_currency_symbol($code) . ') — ' . esc_html($code);
        }

        return [
            'general' => [
                [
                    'type' => 'select',
                    'label' => esc_html__('Customer', 'ambikly'),
                    'name' => 'customer_id',
                    'options' => $customer_lists,
                    'placeholder' => esc_html__('Enter Customer ID here', 'ambikly'),
                    'attributes' => [
                        'required' => 'required',
                    ],
                    'validation' => ['required']
                ],
                [
                    'type' => 'text',
                    'label' => esc_html__('Order Code', 'ambikly'),
                    'name' => 'order_code',
                    'placeholder' => esc_html__('Order Code', 'ambikly'),
                    'attributes' => [
                        'required' => 'required',
                        'readonly' => 'readonly'
                    ],
                    'validation' => ['required']
                ],
                [
                    'type' => 'number',
                    'label' => esc_html__('Total Amount', 'ambikly'),
                    'name' => 'total_amount',
                    'placeholder' => esc_html__('Total Amount', 'ambikly'),

                ],
                [
                    'type' => 'select',
                    'label' => esc_html__('Currency', 'ambikly'),
                    'name' => 'currency',
                    'options' => $currency_code_options,
                    'placeholder' => esc_html__('Currency', 'ambikly'),

                ],
                [
                    'type' => 'textarea',
                    'label' => esc_html__('Order Note', 'ambikly'),
                    'name' => 'order_note',
                    'placeholder' => esc_html__('Order Note', 'ambikly'),

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