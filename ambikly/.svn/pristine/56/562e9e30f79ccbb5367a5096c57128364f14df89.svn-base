<?php

namespace Ambikly\Forms;

class CheckoutForm extends BaseForm
{
    // Initialize checkout form fields
    protected function initialize_fields()
    {
        $countries = ambikly_get_countries();

        $countries = array_merge(['' => __('-- Select Country --', 'ambikly')], $countries);

        $this->fields = [

            'billing_firstname' => [
                'label' => esc_html__('First Name', 'ambikly'),
                'type' => 'text',
                'placeholder' => esc_html__('Enter your first name', 'ambikly'),
                'class' => 'half',
                'validation' => ['required']
            ],
            'billing_lastname' => [
                'label' => esc_html__('Last Name', 'ambikly'),
                'type' => 'text',
                'placeholder' => esc_html__('Enter your last name', 'ambikly'),
                'class' => 'half',
                'attributes' => [
                    'required' => 'required',
                ],
                'validation' => ['required']
            ],
            'billing_phone' => [
                'label' => esc_html__('Phone', 'ambikly'),
                'type' => 'tel',
                'placeholder' => esc_html__('Enter your phone number', 'ambikly'),
            ],
            'billing_country' => [
                'label' => esc_html__('Country', 'ambikly'),
                'type' => 'select',
                'required' => true,
                'placeholder' => esc_html__('Enter your country', 'ambikly'),
                'options' => $countries,
                'class' => 'half',
                'attributes' => [
                    'required' => 'required',
                ],
                'validation' => ['required']
            ],

            'billing_state' => [
                'label' => esc_html__('State', 'ambikly'),
                'type' => 'text',
                'required' => true,
                'placeholder' => esc_html__('Enter your state', 'ambikly'),
                'class' => 'half',
                'attributes' => [
                    'required' => 'required',
                ],
                'validation' => ['required']
            ],
            'billing_city' => [
                'label' => esc_html__('City', 'ambikly'),
                'type' => 'text',
                'required' => true,
                'placeholder' => esc_html__('Enter your city', 'ambikly'),
            ],
            'billing_address' => [
                'label' => esc_html__('Address', 'ambikly'),
                'type' => 'text',
                'required' => true,
                'placeholder' => esc_html__('Enter your address', 'ambikly'),
                'class' => 'half'
            ],
            'billing_zip' => [
                'label' => esc_html__('Zip Code', 'ambikly'),
                'type' => 'text',
                'required' => true,
                'placeholder' => esc_html__('Enter your zip code', 'ambikly'),
                'class' => 'half',
                'attributes' => [
                    'required' => 'required',
                ],
                'validation' => ['required']
            ],

            'order_note' => [
                'label' => esc_html__('Order Note', 'ambikly'),
                'type' => 'textarea',
                'placeholder' => esc_html__('Add any notes about your order', 'ambikly'),
            ]
        ];
    }
}