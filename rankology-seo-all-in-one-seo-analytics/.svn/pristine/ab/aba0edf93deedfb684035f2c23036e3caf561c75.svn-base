<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;

class FormSchemaHowTo extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_how_to_name':
            case '_rankology_fno_rich_snippets_how_to_desc':
            case '_rankology_fno_rich_snippets_how_to_currency':
            case '_rankology_fno_rich_snippets_how_to_cost':
            case '_rankology_fno_rich_snippets_how_to_total_time':
                return 'input';
            case '_rankology_fno_rich_snippets_how_to_img':
                return 'upload';
            case '_rankology_fno_rich_snippets_how_to':
                return 'repeater_how_to';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_how_to_name':
                return __('Title of the how-to', 'wp-rankology');
            case '_rankology_fno_rich_snippets_how_to_desc':
                return __('How-to description (default excerpt, or beginning of the content)', 'wp-rankology');
            case '_rankology_fno_rich_snippets_how_to_currency':
                return __('Currency', 'wp-rankology');
            case '_rankology_fno_rich_snippets_how_to_cost':
                return __('Estimated cost', 'wp-rankology');
            case '_rankology_fno_rich_snippets_how_to_total_time':
                return __('Total time needed', 'wp-rankology');
            case '_rankology_fno_rich_snippets_how_to_img':
                return __('Image thumbnail', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_how_to_name':
                return __('The name of your how-to', 'wp-rankology');
            case '_rankology_fno_rich_snippets_how_to_desc':
                return __('Enter your how-to description', 'wp-rankology');
            case '_rankology_fno_rich_snippets_how_to_currency':
                return __('The currency of the estimated cost', 'wp-rankology');
            case '_rankology_fno_rich_snippets_how_to_cost':
                return __('The estimated cost', 'wp-rankology');
            case '_rankology_fno_rich_snippets_how_to_total_time':
                return __('e.g. HH:MM:SS', 'wp-rankology');
            case '_rankology_fno_rich_snippets_how_to_img':
                return __('Select your image', 'wp-rankology');
            default:
                return '';
        }
    }

    protected function getDescriptionByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_how_to_img':
                return __('Minimum width: 720px - Recommended size: 1920px -  .jpg, .png, or. gif format - crawlable and indexable', 'wp-rankology');
        }
    }

    protected function getDetails($postId = null) {
        return [
            [
                'key' => '_rankology_fno_rich_snippets_how_to_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_how_to_desc',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_how_to_img',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_how_to_cost',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_how_to_currency',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_how_to_total_time',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_how_to',
            ],
        ];
    }
}
