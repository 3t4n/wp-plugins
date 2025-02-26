<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;
use RankologyFno\Helpers\Schemas\Currencies;

class FormSchemaProduct extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_product_description':
                return 'textarea';
            case '_rankology_fno_rich_snippets_product_img':
                return 'upload';
            case '_rankology_fno_rich_snippets_product_price_valid_date':
                return 'date';
            case '_rankology_fno_rich_snippets_product_global_ids':
            case '_rankology_fno_rich_snippets_product_brand':
            case '_rankology_fno_rich_snippets_product_price_currency':
            case '_rankology_fno_rich_snippets_product_condition':
            case '_rankology_fno_rich_snippets_product_availability':
            case '_rankology_fno_rich_snippets_product_energy_consumption':
                return 'select';
            case '_rankology_fno_rich_snippets_product_name':
            case '_rankology_fno_rich_snippets_product_price':
            case '_rankology_fno_rich_snippets_product_sku':
            case '_rankology_fno_rich_snippets_product_global_ids_value':
                return 'input';
            case '_rankology_fno_rich_snippets_product_positive_notes':
                return 'repeater_positive_notes';
            case '_rankology_fno_rich_snippets_product_negative_notes':
                return 'repeater_negative_notes';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_product_name':
                return __('Product name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_description':
                return __('Product description', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_img':
                return __('Thumbnail', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_price':
                return __('Product price', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_price_valid_date':
                return __('Product price valid until', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_sku':
                return __('Product SKU', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_brand':
                return __('Product Brand', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_global_ids':
                return __('Product Global Identifiers type', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_global_ids_value':
                return __('Product Global Identifier value', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_price_currency':
                return __('Product currency', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_condition':
                return __('Product Condition', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_availability':
                return __('Product Availability', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_positive_notes':
                return  __('Positive notes', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_negative_notes':
                return  __('Negative notes', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_energy_consumption':
                return  __('Energy consumption', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_product_name':
                return __('The name of your product', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_description':
                return __('The description of the product', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_price':
                return __('e.g. 30', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_price_valid_date':
                return __('e.g. YYYY-MM-DD', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_sku':
                return __('e.g. 0446310786', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_global_ids_value':
                return __('e.g. 925872', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_positive_notes':
                return __('Enter your positive notes', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_negative_notes':
                return __('Enter your negative notes', 'wp-rankology');

        }
    }

    protected function getDescriptionByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_product_name':
                return __('Default: product title', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_description':
                return __('Default: product excerpt', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_img':
                return __('Pictures clearly showing the product, e.g. against a white background, are preferred', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_price':
                return __('Default: active product price', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_price_valid_date':
                return __('Default: sale price dates To field', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_sku':
                return __('Default: product SKU', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_condition':
                return __('Default: new', 'wp-rankology');
            case '_rankology_fno_rich_snippets_product_availability':
                return '';
        }
    }

    protected function getOptions($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_product_global_ids':
                return [
                    ['value' => 'none', 'label' => __('Select a global identifier', 'wp-rankology')],
                    ['value' => 'gtin8', 'label' => __('gtin8 (ean8)', 'wp-rankology')],
                    ['value' => 'gtin12', 'label' => __('gtin12 (ean12)', 'wp-rankology')],
                    ['value' => 'gtin13', 'label' => __('gtin13 (ean13)', 'wp-rankology')],
                    ['value' => 'gtin14', 'label' => __('gtin14 (ean14)', 'wp-rankology')],
                    ['value' => 'mpn', 'label' => __('mpn', 'wp-rankology')],
                    ['value' => 'isbn', 'label' => __('isbn', 'wp-rankology')],
                ];
            case '_rankology_fno_rich_snippets_product_brand':
                $data = [['value' => 'none', 'label' => __('Select a taxonomy', 'wp-rankology')]];

                $serviceWpData = rankology_get_service('WordPressData');
                if ( ! $serviceWpData || ! \method_exists($serviceWpData, 'getTaxonomies')) {
                    return $data;
                }

                $taxonomies = $serviceWpData->getTaxonomies();
                if (empty($taxonomies)) {
                    return $data;
                }
                foreach ($taxonomies as $key => $value) {
                    $data[] = ['value' => $key, 'label' => $key];
                }

                return $data;
            case '_rankology_fno_rich_snippets_product_price_currency':
                return Currencies::getOptions();
            case '_rankology_fno_rich_snippets_product_condition':
                return [
                    ['value' => 'NewCondition', 'label' => __('New', 'wp-rankology')],
                    ['value' => 'UsedCondition', 'label' => __('Used', 'wp-rankology')],
                    ['value' => 'DamagedCondition', 'label' => __('Damaged', 'wp-rankology')],
                    ['value' => 'RefurbishedCondition', 'label' => __('Refurbished', 'wp-rankology')],
                ];
            case '_rankology_fno_rich_snippets_product_availability':
                return [
                    ['value' => 'InStock', 'label' => __('In Stock', 'wp-rankology')],
                    ['value' => 'InStoreOnly', 'label' => __('In Store Only', 'wp-rankology')],
                    ['value' => 'OnlineOnly', 'label' => __('Online Only', 'wp-rankology')],
                    ['value' => 'LimitedAvailability', 'label' => __('Limited Availability', 'wp-rankology')],
                    ['value' => 'SoldOut', 'label' => __('Sold Out', 'wp-rankology')],
                    ['value' => 'OutOfStock', 'label' => __('Out Of Stock', 'wp-rankology')],
                    ['value' => 'Discontinued', 'label' => __('Discontinued', 'wp-rankology')],
                    ['value' => 'PreOrder', 'label' => __('Pre Order', 'wp-rankology')],
                    ['value' => 'PreSale', 'label' => __('Pre Sale', 'wp-rankology')],
                ];
            case '_rankology_fno_rich_snippets_product_energy_consumption':
                return [
                    ['value' => 'none', 'label' => __('Select an Energy Consumption','wp-rankology')],
                    ['value' => 'https://schema.org/EUEnergyEfficiencyCategoryA', 'label' => __('A', 'wp-rankology')],
                    ['value' => 'https://schema.org/EUEnergyEfficiencyCategoryA1Plus', 'label' => __('A+', 'wp-rankology')],
                    ['value' => 'https://schema.org/EUEnergyEfficiencyCategoryA2Plus', 'label' => __('A++', 'wp-rankology')],
                    ['value' => 'https://schema.org/EUEnergyEfficiencyCategoryA3Plus', 'label' => __('A+++', 'wp-rankology')],
                    ['value' => 'https://schema.org/EUEnergyEfficiencyCategoryB', 'label' => __('B', 'wp-rankology')],
                    ['value' => 'https://schema.org/EUEnergyEfficiencyCategoryC', 'label' => __('C', 'wp-rankology')],
                    ['value' => 'https://schema.org/EUEnergyEfficiencyCategoryD', 'label' => __('D', 'wp-rankology')],
                    ['value' => 'https://schema.org/EUEnergyEfficiencyCategoryE', 'label' => __('E', 'wp-rankology')],
                    ['value' => 'https://schema.org/EUEnergyEfficiencyCategoryF', 'label' => __('F', 'wp-rankology')],
                    ['value' => 'https://schema.org/EUEnergyEfficiencyCategoryG', 'label' => __('G', 'wp-rankology')],
                ];
        }
    }

    protected function getDetails($postId = null) {
        $details = [
            [
                'key' => '_rankology_fno_rich_snippets_product_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_description',
                'class' => 'rankology-textarea-high-size'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_img',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_price',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_price_valid_date',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_sku',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_global_ids',
                'value' => 'none',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_global_ids_value',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_brand',
                'value' => 'none',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_price_currency',
                'value' => 'none',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_condition',
                'value' => 'NewCondition'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_availability',
                'value' => 'InStock'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_product_energy_consumption',
                'value' => 'none'
            ]

        ];

        //if($postId && get_post_type( $postId) !== 'product' && is_plugin_active('woocommerce/woocommerce.php') ) {
            $details[] =  [
                'key' => '_rankology_fno_rich_snippets_product_positive_notes',
            ];
            $details[] =  [
                'key' => '_rankology_fno_rich_snippets_product_negative_notes',
            ];
        //}

        return $details;
    }
}
