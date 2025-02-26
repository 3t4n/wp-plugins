<?php

namespace RankologyFno\Tags\Schema\Article;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Models\GetTagValue;

class Image implements GetTagValue {
    const NAME = 'schema_article_image';

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
        $nameFilter = 'rankology_fno_get_tag_schema_article_image';

        if ( ! rankology_get_service('CheckContextPage')->hasSchemaManualValues($context)) {
            return apply_filters($nameFilter, $value, $context);
        }

        $schema = $context['schemas_manual'][$context['key_get_json_schema']];

        if (array_key_exists('_rankology_fno_rich_snippets_article_img', $schema)) {
            $value = $schema['_rankology_fno_rich_snippets_article_img'];
        }

        return apply_filters($nameFilter, $value, $context);
    }
}
