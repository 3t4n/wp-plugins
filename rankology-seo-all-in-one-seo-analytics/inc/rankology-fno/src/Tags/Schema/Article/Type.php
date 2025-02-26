<?php

namespace RankologyFno\Tags\Schema\Article;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Models\GetTagValue;

class Type implements GetTagValue {
    const NAME = 'schema_article_type';

    /**
     * 
     *
     * @param array $args
     *
     * @return string
     */
    public function getValue($args = null) {
        $context = isset($args[0]) ? $args[0] : null;

        $value      = 'NewsArticle';
        $nameFilter = 'rankology_fno_get_tag_schema_article_type';

        if ( ! rankology_get_service('CheckContextPage')->hasSchemaManualValues($context)) {
            return apply_filters($nameFilter, $value, $context);
        }

        $schema = $context['schemas_manual'][$context['key_get_json_schema']];

        if (array_key_exists('_rankology_fno_rich_snippets_article_type', $schema)) {
            $value = $schema['_rankology_fno_rich_snippets_article_type'];
        }

        if (empty($value)) {
            $value = 'NewsArticle';
        }

        return apply_filters($nameFilter, $value, $context);
    }
}
