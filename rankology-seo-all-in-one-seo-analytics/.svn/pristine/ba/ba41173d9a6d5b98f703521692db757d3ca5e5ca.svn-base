<?php

namespace RankologyFno\Tags\Schema\Article;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Models\GetTagValue;

class Description implements GetTagValue {
    const NAME = 'schema_article_desc';

    /**
     * 
     *
     * @param array $args
     *
     * @return string
     */
    public function getValue($args = null) {
        $context = isset($args[0]) ? $args[0] : null;

        $value      = '';

        if (rankology_get_service('CheckContextPage')->hasSchemaManualValues($context)) {
            $schema = $context['schemas_manual'][$context['key_get_json_schema']];

            if (array_key_exists('_rankology_fno_rich_snippets_article_desc', $schema)) {
                $value = $schema['_rankology_fno_rich_snippets_article_desc'];
            }
        }

        if (empty($value) && isset($context['post']->ID)) {
            $value = wp_trim_words(esc_html(get_the_excerpt($context['post']->ID)), 30);
        }

        return apply_filters('rankology_fno_get_tag_schema_article_desc', $value, $context);
    }
}
