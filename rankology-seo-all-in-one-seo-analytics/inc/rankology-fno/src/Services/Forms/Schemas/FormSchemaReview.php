<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;

class FormSchemaReview extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_review_item_type':
                return 'select';
            case '_rankology_fno_rich_snippets_review_img':
                return 'upload';
            case '_rankology_fno_rich_snippets_review_rating':
            case '_rankology_fno_rich_snippets_review_max_rating':
                return 'number';
            case '_rankology_fno_rich_snippets_review_body':
                return 'textarea';
            case '_rankology_fno_rich_snippets_review_item':
                return 'input';

        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_review_item':
                return __('Review item name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_review_item_type':
                return __('Review item type', 'wp-rankology');
            case '_rankology_fno_rich_snippets_review_img':
                return __('Review item image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_review_rating':
                return __('Your rating', 'wp-rankology');
            case '_rankology_fno_rich_snippets_review_max_rating':
                return __('Max best rating', 'wp-rankology');
            case '_rankology_fno_rich_snippets_review_body':
                return __('Review body', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_review_item':
                return __('The item name reviewed', 'wp-rankology');
            case '_rankology_fno_rich_snippets_review_img':
                return __('Select your image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_review_rating':
                return __('The item rating', 'wp-rankology');
            case '_rankology_fno_rich_snippets_review_max_rating':
                return __('Max best rating', 'wp-rankology');
            case '_rankology_fno_rich_snippets_review_body':
                return __('Enter your review body', 'wp-rankology');
        }
    }

    protected function getDescriptionByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_review_rating':
                return __('Your rating: scale from 1 to 5.', 'wp-rankology');
            case '_rankology_fno_rich_snippets_review_max_rating':
                return __('Only required if your scale is different from 1 to 5.', 'wp-rankology');
        }
    }

    protected function getOptions($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_review_item_type':
                return [
                    ['value' => 'CreativeWorkSeason', 'label' => __('CreativeWorkSeason', 'wp-rankology')],
                    ['value' => 'CreativeWorkSeries', 'label' => __('CreativeWorkSeries', 'wp-rankology')],
                    ['value' => 'Episode', 'label' => __('Episode', 'wp-rankology')],
                    ['value' => 'Game', 'label' => __('Game', 'wp-rankology')],
                    ['value' => 'MediaObject', 'label' => __('MediaObject', 'wp-rankology')],
                    ['value' => 'MusicPlaylist', 'label' => __('MusicPlaylist', 'wp-rankology')],
                    ['value' => 'MusicRecording', 'label' => __('MusicRecording', 'wp-rankology')],
                    ['value' => 'Organization', 'label' => __('Organization', 'wp-rankology')],
                ];
        }
    }

    protected function getDetails($postId = null) {
        return [
            [
                'key' => '_rankology_fno_rich_snippets_review_item',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_review_item_type',
                'value' => 'CreativeWorkSeason'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_review_img',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_review_rating',
                'min' => 1,
            ],
            [
                'key' => '_rankology_fno_rich_snippets_review_max_rating',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_review_body',
                'class' => 'rankology-textarea-high-size'
            ],
        ];
    }
}
