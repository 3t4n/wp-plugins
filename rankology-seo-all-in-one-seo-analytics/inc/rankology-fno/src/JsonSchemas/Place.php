<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class Place extends JsonSchemaValue implements GetJsonData {
    const NAME = 'place';

    protected function getName() {
        return self::NAME;
    }

    /**
     * 
     *
     * @param array $context
     *
     * @return array
     */
    public function getJsonData($context = null) {
        $data = $this->getArrayJson();

        $typeSchema = isset($context['type']) ? $context['type'] : RichSnippetType::DEFAULT_SNIPPET;

        $schema  = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(PostalAddress::NAME, $context, ['remove_empty'=> true]);
        if (count($schema) > 1) {
            $data['address'] = $schema;
        }

        return apply_filters('rankology_fno_get_json_data_place', $data, $context);
    }
}
