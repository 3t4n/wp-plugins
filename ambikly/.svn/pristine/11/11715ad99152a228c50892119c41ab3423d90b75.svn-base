<?php

namespace Ambikly\Options;

use Ambikly\Controllers\CategoryController;

class ProductOptions extends BaseOptions
{

    public function __construct()
    {

    }

    public function getOptions()
    {
        /**
         * @var $category CategoryController
         */
        $category = ambikly()->getClass('Controllers.CategoryController');
        
        return [
            'general' => [
                [
                    'type' => 'text',
                    'label' => esc_html__('Product Name', 'ambikly'),
                    'name' => 'product_name',
                    'placeholder' => esc_html__('Enter product name', 'ambikly'),

                    'validation' => ['required']
                ],
                [
                    'type' => 'text',
                    'label' => esc_html__('Product Slug', 'ambikly'),
                    'name' => 'product_slug',
                    'placeholder' => esc_html__('Enter product slug', 'ambikly'),

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
                    'placeholder' => esc_html__('Enter product description', 'ambikly'),

                ],
                [
                    'type' => 'image',
                    'label' => esc_html__('Featured Image', 'ambikly'),
                    'name' => 'image',
                    'placeholder' => esc_html__('Accepts images', 'ambikly'),
                    'desc' => esc_html__('Accepts images', 'ambikly'),

                ],
                [
                    'type' => 'multiselect',
                    'label' => esc_html__('Categories', 'ambikly'),
                    'name' => 'category_ids',
                    'placeholder' => esc_html__('Select Category', 'ambikly'),
                    'options' => $category->getPublishCategoryLists(),
                ],
            ],
            'pricing' => [
                [
                    'type' => 'number',
                    'label' => sprintf(esc_html__('Regular Price [%s]', 'ambikly'), ambikly_currency_symbol()),
                    'name' => 'regular_price',
                    'placeholder' => esc_html__('Enter regular price', 'ambikly'),
                    'step' => '0.01', // Allows decimals
                ],
                [
                    'type' => 'number',
                    'label' => sprintf(esc_html__('Discounted Price [%s]', 'ambikly'), ambikly_currency_symbol()),
                    'name' => 'discounted_price',
                    'placeholder' => esc_html__('Enter discounted price', 'ambikly'),
                    'step' => '0.01',
                ],
            ],
            'stock' => [
                [
                    'type' => 'number',
                    'label' => esc_html__('Stock Quantity', 'ambikly'),
                    'name' => 'stock_quantity',
                    'placeholder' => esc_html__('Enter stock quantity', 'ambikly'),
                    'min' => '0', // Set minimum value to 0
                ],
            ],

            'status' => [
                [
                    'type' => 'select',
                    'label' => esc_html__('Status', 'ambikly'),
                    'name' => 'status',
                    'placeholder' => esc_html__('Status', 'ambikly'),
                    'options' => ambikly_product_statuses(),
                    'desc' => esc_html__('The status determines the visibility of the product.', 'ambikly')
                ],
            ],
        ];
    }
}