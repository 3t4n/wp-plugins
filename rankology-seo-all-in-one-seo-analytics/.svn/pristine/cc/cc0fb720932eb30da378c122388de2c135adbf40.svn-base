<?php

namespace RankologyFno\Tags\Schema\Article;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Models\GetTagValue;

class Canonical implements GetTagValue {
    const NAME = 'schema_article_canonical';

    /**
     * 
     *
     * @param array $args
     *
     * @return string
     */
    public function getValue($args = null) {
        $context = isset($args[0]) ? $args[0] : null;

        global $wp;
        $value = '';

        if (isset($context['post']->ID)) {
            $value = get_post_meta($context['post']->ID, '_rankology_robots_canonical', true);
        }

        if (empty($value)) {
            $value      = home_url(add_query_arg([], $wp->request));
        }

        return apply_filters('rankology_fno_get_tag_schema_article_canonical', $value, $context);
    }
}
