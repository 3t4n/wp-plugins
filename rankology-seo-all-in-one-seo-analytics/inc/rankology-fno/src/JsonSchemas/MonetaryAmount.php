<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class MonetaryAmount extends JsonSchemaValue implements GetJsonData {
    const NAME = 'monetary-amount';

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
        $variables  = [];
        switch ($typeSchema) {
            case RichSnippetType::SUB_TYPE:
                $variables = isset($context['variables']) ? $context['variables'] : [];
                break;
        }

        $data = rankology_get_service('VariablesToString')->replaceDataToString($data, $variables);

        return apply_filters('rankology_fno_get_json_data_monetary_amount', $data, $context);
    }
}
