<?php

namespace Rankology\Helpers;

if ( ! defined('ABSPATH')) {
    exit;
}

abstract class ContentAnalysis {
    public static function getData() {
        $data = [
            'all_canonical'=> [
                'title'  => __('Canonical URL', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
            'schemas'=> [
                'title'  => __('Structured data types', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
            'old_post'=> [
                'title'  => __('Last modified date', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
            'words_counter'=> [
                'title'  => __('Words counter', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
            'keywords_density'=> [
                'title'  => __('Keywords density', 'wp-rankology'),
                'impact' => null,
                'desc'   => null,
            ],
            'keywords_permalink'=> [
                'title'  => __('Keywords in permalink', 'wp-rankology'),
                'impact' => null,
                'desc'   => null,
            ],
            'headings'=> [
                'title'  => __('Headings', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
            'meta_title'=> [
                'title'  => __('Meta title', 'wp-rankology'),
                'impact' => null,
                'desc'   => null,
            ],
            'meta_desc'=> [
                'title'  => __('Meta description', 'wp-rankology'),
                'impact' => null,
                'desc'   => null,
            ],
            'social'=> [
                'title'  => __('Social meta tags', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
            'robots'=> [
                'title'  => __('Meta robots', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
            'img_alt'=> [
                'title'  => __('Alternative texts of images', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
            'nofollow_links'=> [
                'title'  => __('NoFollow Links', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
            'outbound_links'=> [
                'title'  => __('Outbound Links', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
            'internal_links'=> [
                'title'  => __('Internal Links', 'wp-rankology'),
                'impact' => 'good',
                'desc'   => null,
            ],
        ];

        return apply_filters('rankology_get_content_analysis_data', $data);
    }
}
