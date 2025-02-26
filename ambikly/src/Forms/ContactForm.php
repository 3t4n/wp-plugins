<?php

namespace Ambikly\Forms;

class ContactForm extends BaseForm
{

    protected function initialize_fields()
    {
        if (is_user_logged_in()) {

            $current_user = wp_get_current_user();

            $email = $current_user->user_email;
        } else {

            $email = '';
        }

        $this->fields = [
            'email' => [
                'label' => esc_html__('Email', 'ambikly'),
                'type' => 'email',
                'validation' => ['required', 'email'],
                'placeholder' => esc_html__('Enter your email address', 'ambikly'),
                'value' => $email
            ]
        ];

        if (!ambikly_is_guest_checkout() && !is_user_logged_in()) {
            $this->fields['password'] = [
                'label' => esc_html__('Password', 'ambikly'),
                'type' => 'password',
                'attributes' => [
                    'required' => 'required',
                ],
                'validation' => ['required'],
                'placeholder' => esc_html__('Enter your Password', 'ambikly'),
            ];
        }

    }
}