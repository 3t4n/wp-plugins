<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class Geo extends JsonSchemaValue implements GetJsonData {
    const NAME = 'geo';

    protected function getName() {
        return self::NAME;
    }

    /**
     * 
     *
     * @return array
     */
    protected function getVariablesForOptionLocalBusiness() {
        return [
            'latitude'  => '%%local_business_latitude%%',
            'longitude' => '%%local_business_longitude%%',
        ];
    }

    /**
     * 
     *
     * @return array
     *
     * @param array $schemaManual
     */
    protected function getVariablesForManualSnippet($schemaManual) {
        $variables = [];
        if (isset($schemaManual['_rankology_fno_rich_snippets_lb_lat'],
        $schemaManual['_rankology_fno_rich_snippets_lb_lon'])) {
            $variables = [
                'latitude'   => $schemaManual['_rankology_fno_rich_snippets_lb_lat'],
                'longitude'  => $schemaManual['_rankology_fno_rich_snippets_lb_lon'],
            ];
        }

        return $variables;
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

        $typeSchema = isset($context['type']) ? $context['type'] : RichSnippetType::OPTION_LOCAL_BUSINESS;

        switch ($typeSchema) {
            case RichSnippetType::OPTION_LOCAL_BUSINESS:
            default:
                $variables = $this->getVariablesForOptionLocalBusiness();
                break;
            case RichSnippetType::MANUAL:
                $schemaManual = $this->getCurrentSchemaManual($context);

                if (null === $schemaManual) {
                    return $data;
                }

                $variables = $this->getVariablesForManualSnippet($schemaManual);
                break;
            case RichSnippetType::SUB_TYPE:
                $variables = isset($context['variables']) ? $context['variables'] : [];
                break;
        }

        $data = rankology_get_service('VariablesToString')->replaceDataToString($data, $variables);

        return apply_filters('rankology_fno_get_json_data_geo', $data, $context);
    }
}
