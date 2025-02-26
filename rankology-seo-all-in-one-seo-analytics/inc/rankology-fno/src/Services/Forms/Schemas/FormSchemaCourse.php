<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;

class FormSchemaCourse extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_courses_title':
            case '_rankology_fno_rich_snippets_courses_desc':
            case '_rankology_fno_rich_snippets_courses_school':
            case '_rankology_fno_rich_snippets_courses_website':
                return 'input';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_courses_title':
                return __('Title', 'wp-rankology');
            case '_rankology_fno_rich_snippets_courses_desc':
                return __('Course description', 'wp-rankology');
            case '_rankology_fno_rich_snippets_courses_school':
                return __('School/Organization', 'wp-rankology');
            case '_rankology_fno_rich_snippets_courses_website':
                return __('School/Organization Website', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_courses_title':
                return __('The title of your lesson, course...', 'wp-rankology');
            case '_rankology_fno_rich_snippets_courses_desc':
                return __('Enter your course/lesson description', 'wp-rankology');
            case '_rankology_fno_rich_snippets_courses_school':
                return __('Name of university, organization...', 'wp-rankology');
            case '_rankology_fno_rich_snippets_courses_website':
                return __('Enter the URL like https://example.com/', 'wp-rankology');
            default:
                return '';
        }
    }

    protected function getDetails($postId = null) {
        return [
            [
                'key' => '_rankology_fno_rich_snippets_courses_title',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_courses_desc',
                'recommended_limit' => 60
            ],
            [
                'key' => '_rankology_fno_rich_snippets_courses_school',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_courses_website',
            ],
        ];
    }
}
