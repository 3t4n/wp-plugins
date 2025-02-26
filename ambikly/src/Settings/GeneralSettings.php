<?php

namespace Ambikly\Settings;

class GeneralSettings extends BaseSettings
{

    public function __construct()
    {

        $this->id = 'general';
        $this->label = esc_html__('General Settings', 'ambikly');
        parent::__construct();
    }

    public function getSettings()
    {
        $currency_code_options = ambikly_currencies();
        foreach ($currency_code_options as $code => $name) {
            $currency_code_options[$code] = $name . ' (' . ambikly_currency_symbol($code) . ') — ' . esc_html($code);
        }

        $filter_id = sanitize_text_field('ambikly_' . $this->id . '_settings');

        return apply_filters($filter_id, [
            'general' => [
                [
                    'type' => 'select',
                    'label' => esc_html__('Store Currency', 'ambikly'),
                    'name' => 'currency',
                    'placeholder' => esc_html__('Store Currency', 'ambikly'),
                    'options' => $currency_code_options,
                    'value' => 'USD',
                ],
                [
                    'type' => 'select',
                    'label' => esc_html__('Currency Position', 'ambikly'),
                    'name' => 'currency_position',
                    'placeholder' => esc_html__('Currency Position', 'ambikly'),
                    'options' => array(
                        'left' => esc_html__('Left', 'ambikly'),
                        'right' => esc_html__('Right', 'ambikly'),
                        'left_space' => esc_html__('Left with space', 'ambikly'),
                        'right_space' => esc_html__('Right with space', 'ambikly'),
                    ),
                    'value' => 'left',
                    'wrapper_class' => 'width-45 left'
                ],

                [
                    'type' => 'text',
                    'label' => esc_html__('Thousand separator', 'ambikly'),
                    'name' => 'thousand_separator',
                    'placeholder' => esc_html__('Thousand separator', 'ambikly'),
                    'value' => ',',
                    'wrapper_class' => 'width-45 right clear-div'
                ],

                [
                    'type' => 'text',
                    'label' => esc_html__('Decimal separator', 'ambikly'),
                    'name' => 'decimal_separator',
                    'placeholder' => esc_html__('Decimal separator', 'ambikly'),
                    'value' => '.',
                    'wrapper_class' => 'width-45 left',
                ],
                [
                    'type' => 'number',
                    'label' => esc_html__('Number of decimals', 'ambikly'),
                    'name' => 'number_of_decimals',
                    'placeholder' => esc_html__('Number of decimals', 'ambikly'),
                    'value' => 2,
                    'wrapper_class' => 'width-45 right clear-div'
                ],
            ],
            'pages' => [
                [
                    'type' => 'dropdown_pages',
                    'label' => esc_html__('Cart Page', 'ambikly'),
                    'name' => 'cart_page',
                    'placeholder' => esc_html__('-- Select Cart Page --', 'ambikly'),
                    'wrapper_class' => 'width-45 left'
                ],

                [
                    'type' => 'dropdown_pages',
                    'label' => esc_html__('Checkout Page', 'ambikly'),
                    'name' => 'checkout_page',
                    'placeholder' => esc_html__('-- Select Checkout Page --', 'ambikly'),
                    'wrapper_class' => 'width-45 right clear-div'
                ],

                [
                    'type' => 'dropdown_pages',
                    'label' => esc_html__('Account Page', 'ambikly'),
                    'name' => 'account_page',
                    'placeholder' => esc_html__('-- Select Account Page --', 'ambikly'),
                    'wrapper_class' => 'width-45 left'
                ],
                [
                    'type' => 'dropdown_pages',
                    'label' => esc_html__('Thank you page', 'ambikly'),
                    'name' => 'thank_you_page',
                    'placeholder' => esc_html__('-- Select Thank You Page --', 'ambikly'),
                    'wrapper_class' => 'width-45 right'

                ],
                [
                    'type' => 'dropdown_pages',
                    'label' => esc_html__('Shop page', 'ambikly'),
                    'name' => 'shop_page',
                    'placeholder' => esc_html__('-- Select Shop Page --', 'ambikly'),
                    'wrapper_class' => 'width-45 left'

                ],
            ]

        ]);
    }
}