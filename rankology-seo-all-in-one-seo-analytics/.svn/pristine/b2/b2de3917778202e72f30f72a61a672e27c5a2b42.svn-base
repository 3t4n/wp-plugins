<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;

class FormSchemaService extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_service_description':
                return 'textarea';
            case '_rankology_fno_rich_snippets_service_img':
            case '_rankology_fno_rich_snippets_service_lb_img':
                return 'upload';
            case '_rankology_fno_rich_snippets_service_name':
            case '_rankology_fno_rich_snippets_service_type':
            case '_rankology_fno_rich_snippets_service_area':
            case '_rankology_fno_rich_snippets_service_provider_name':
            case '_rankology_fno_rich_snippets_service_provider_mobility':
            case '_rankology_fno_rich_snippets_service_slogan':
            case '_rankology_fno_rich_snippets_service_street_addr':
            case '_rankology_fno_rich_snippets_service_city':
            case '_rankology_fno_rich_snippets_service_state':
            case '_rankology_fno_rich_snippets_service_pc':
            case '_rankology_fno_rich_snippets_service_country':
            case '_rankology_fno_rich_snippets_service_lat':
            case '_rankology_fno_rich_snippets_service_lon':
            case '_rankology_fno_rich_snippets_service_tel':
            case '_rankology_fno_rich_snippets_service_price':
                return 'input';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_service_name':
                return __('Service name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_type':
                return __('Service type', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_description':
                return __('Service description', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_img':
                return __('Thumbnail', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_area':
                return __('Area served', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_provider_name':
                return __('Provider name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_lb_img':
                return __('Location image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_provider_mobility':
                return __('Provider mobility (static or dynamic)', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_slogan':
                return __('Slogan', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_street_addr':
                return __('Street Address', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_city':
                return __('City', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_state':
                return __('State', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_pc':
                return __('Postal code', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_country':
                return __('Country', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_lat':
                return __('Latitude', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_lon':
                return __('Longitude', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_tel':
                return __('Telephone', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_price':
                return __('Price range', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_service_name':
                return __('The name of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_type':
                return __('The type of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_description':
                return __('The description of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_img':
                return __('Select your image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_area':
                return __('The area served by your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_provider_name':
                return __('The provider name of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_lb_img':
                return __('Select your location image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_provider_mobility':
                return __('The provider mobility of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_slogan':
                return __('The slogan of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_street_addr':
                return __('The street address of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_city':
                return __('The city of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_state':
                return __('The state of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_pc':
                return __('The postal code of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_country':
                return __('The country of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_lat':
                return __('The latitude of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_lon':
                return __('The longitude of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_tel':
                return __('The telephone of your service', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_price':
                return __('The price range of your service', 'wp-rankology');
        }
    }

    protected function getDescriptionByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_service_name':
                return __('Default: post title', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_description':
                return __('Default: post excerpt', 'wp-rankology');
            case '_rankology_fno_rich_snippets_service_img':
                return __('Default: post thumbnail', 'wp-rankology');
        }
    }

    protected function getDetails($postId = null) {
        return [
            [
                'key' => '_rankology_fno_rich_snippets_service_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_type',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_description',
                'class' => 'rankology-textarea-high-size'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_img',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_area',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_provider_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_lb_img',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_provider_mobility',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_slogan',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_street_addr',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_city',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_state',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_pc',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_country',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_lat',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_lon',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_tel',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_service_price',
            ],
        ];
    }
}
