<?php

namespace Ambikly\Settings;

class CheckoutSettings extends BaseSettings
{

    public function __construct()
    {
        $this->id = 'general';
        $this->label = esc_html__('General Settings', 'ambikly');
        parent::__construct();
    }

    public function getSettings()
    {
        return [
            'general' => [
                [
                    'type' => 'text',
                    'label' => esc_html__('General Name', 'ambikly'),
                    'name' => 'category_name',
                    'placeholder' => esc_html__('Enter category name', 'ambikly'),
                    'attributes' => [
                        'required' => 'required',
                    ],
                    'validation' => ['required']
                ],
                [
                    'type' => 'text',
                    'label' => esc_html__('Category Slug', 'ambikly'),
                    'name' => 'category_slug',
                    'placeholder' => esc_html__('Enter category slug', 'ambikly'),
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
                    'type' => 'textarea',
                    'label' => esc_html__('Description', 'ambikly'),
                    'name' => 'description',
                    'placeholder' => esc_html__('Enter category description', 'ambikly'),

                ],
                [
                    'type' => 'image',
                    'label' => esc_html__('Featured Image', 'ambikly'),
                    'name' => 'image',
                    'placeholder' => esc_html__('Accepts images', 'ambikly'),
                    'desc' => 'Accepts images',

                ]
            ]
        ];
    }
}