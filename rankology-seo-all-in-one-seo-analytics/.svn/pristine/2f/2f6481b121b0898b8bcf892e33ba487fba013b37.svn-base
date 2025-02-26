<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;

class FormSchemaSotfware extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_softwareapp_cat':
                return 'select';
            case '_rankology_fno_rich_snippets_softwareapp_max_rating':
            case '_rankology_fno_rich_snippets_softwareapp_rating':
                return 'number';
            case '_rankology_fno_rich_snippets_softwareapp_name':
            case '_rankology_fno_rich_snippets_softwareapp_os':
            case '_rankology_fno_rich_snippets_softwareapp_price':
            case '_rankology_fno_rich_snippets_softwareapp_currency':
                return 'input';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_softwareapp_name':
                return __('Software name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_os':
                return __('Operating system', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_cat':
                return __('Application category', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_price':
                return __('Price of your app', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_currency':
                return __('Currency', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_rating':
                return __('Your rating', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_max_rating':
                return __('Max best rating', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_softwareapp_name':
                return __('The name of your app', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_os':
                return __('The operating system(s) required to use the app', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_price':
                return __('The price of your app (set "0" if the app is free of charge)', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_currency':
                return __('Currency: USD, EUR...', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_rating':
                return __('The item rating', 'wp-rankology');
            case '_rankology_fno_rich_snippets_softwareapp_max_rating':
                return __('Max best rating', 'wp-rankology');
        }
    }

    protected function getOptions($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_softwareapp_cat':
                return [
                    ['value' => 'GameApplication', 'label' => __('GameApplication', 'wp-rankology')],
                    ['value' => 'SocialNetworkingApplication', 'label' => __('SocialNetworkingApplication', 'wp-rankology')],
                    ['value' => 'TravelApplication', 'label' => __('TravelApplication', 'wp-rankology')],
                    ['value' => 'ShoppingApplication', 'label' => __('ShoppingApplication', 'wp-rankology')],
                    ['value' => 'SportsApplication', 'label' => __('SportsApplication', 'wp-rankology')],
                    ['value' => 'LifestyleApplication', 'label' => __('LifestyleApplication', 'wp-rankology')],
                    ['value' => 'BusinessApplication', 'label' => __('BusinessApplication', 'wp-rankology')],
                    ['value' => 'DesignApplication', 'label' => __('DesignApplication', 'wp-rankology')],
                    ['value' => 'DeveloperApplication', 'label' => __('DeveloperApplication', 'wp-rankology')],
                    ['value' => 'DriverApplication', 'label' => __('DriverApplication', 'wp-rankology')],
                    ['value' => 'EducationalApplication', 'label' => __('EducationalApplication', 'wp-rankology')],
                    ['value' => 'HealthApplication', 'label' => __('HealthApplication', 'wp-rankology')],
                    ['value' => 'FinanceApplication', 'label' => __('FinanceApplication', 'wp-rankology')],
                    ['value' => 'SecurityApplication', 'label' => __('SecurityApplication', 'wp-rankology')],
                    ['value' => 'BrowserApplication', 'label' => __('BrowserApplication', 'wp-rankology')],
                    ['value' => 'CommunicationApplication', 'label' => __('CommunicationApplication', 'wp-rankology')],
                    ['value' => 'DesktopEnhancementApplication', 'label' => __('DesktopEnhancementApplication', 'wp-rankology')],
                    ['value' => 'EntertainmentApplication', 'label' => __('EntertainmentApplication', 'wp-rankology')],
                    ['value' => 'MultimediaApplication', 'label' => __('MultimediaApplication', 'wp-rankology')],
                    ['value' => 'HomeApplication', 'label' => __('HomeApplication', 'wp-rankology')],
                    ['value' => 'UtilitiesApplication', 'label' => __('UtilitiesApplication', 'wp-rankology')],
                    ['value' => 'ReferenceApplication', 'label' => __('ReferenceApplication', 'wp-rankology')],
                ];
        }
    }

    protected function getDetails($postId = null) {
        return [
            [
                'key' => '_rankology_fno_rich_snippets_softwareapp_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_softwareapp_os',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_softwareapp_cat',
                'value' => 'GameApplication'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_softwareapp_price',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_softwareapp_currency',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_softwareapp_rating',
                'min' => 1,
            ],
            [
                'key' => '_rankology_fno_rich_snippets_softwareapp_max_rating',
            ],
        ];
    }
}
