<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;

class FormSchemaVideo extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_videos_img':
                return 'upload';
            case '_rankology_fno_rich_snippets_videos_description':
                return 'textarea';
            case '_rankology_fno_rich_snippets_videos_name':
            case '_rankology_fno_rich_snippets_videos_duration':
            case '_rankology_fno_rich_snippets_videos_url':
                return 'input';
            case '_rankology_fno_rich_snippets_videos_date_posted':
                return 'date';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_videos_name':
                return __('Video name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_videos_description':
                return __('Video description', 'wp-rankology');
            case '_rankology_fno_rich_snippets_videos_date_posted':
                return __('Uploaded date', 'wp-rankology');
            case '_rankology_fno_rich_snippets_videos_img':
                return __('Video thumbnail', 'wp-rankology');
            case '_rankology_fno_rich_snippets_videos_duration':
                return __('Duration of your video (format: hh:mm:ss)', 'wp-rankology');
            case '_rankology_fno_rich_snippets_videos_url':
                return __('Video URL', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_videos_name':
                return __('The title of your video', 'wp-rankology');
            case '_rankology_fno_rich_snippets_videos_description':
                return __('The description of the video', 'wp-rankology');
            case '_rankology_fno_rich_snippets_videos_duration':
                return __('e.g. 00:04:30 for 4 minutes and 30 seconds', 'wp-rankology');
            case '_rankology_fno_rich_snippets_videos_url':
                return __('e.g. https://example.com/video.mp4', 'wp-rankology');

        }
    }

    protected function getDescriptionByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_videos_img':
                return __('Minimum size: 160px by 90px - Max size: 1920x1080px - crawlable and indexable', 'wp-rankology');
            case '_rankology_fno_rich_snippets_videos_date_posted':
                return __('The uploaded date of your video in ISO 8601 format. For example, "2017-01-24" or "2017-01-24T19:33:17+00:00".', 'wp-rankology');
        }
    }

    protected function getDetails($postId = null) {
        return [
            [
                'key' => '_rankology_fno_rich_snippets_videos_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_videos_description',
                'class' => 'rankology-textarea-high-size'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_videos_date_posted',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_videos_img',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_videos_duration',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_videos_url',
            ],
        ];
    }
}
