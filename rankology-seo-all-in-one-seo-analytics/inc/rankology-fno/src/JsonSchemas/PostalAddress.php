<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class PostalAddress extends JsonSchemaValue implements GetJsonData {
    const NAME = 'postal-address';

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
           'streetAddress'   => '%%local_business_street_address%%',
           'addressLocality' => '%%local_business_address_locality%%',
           'addressRegion'   => '%%local_business_address_region%%',
           'postalCode'      => '%%local_business_address_postal_code%%',
           'addressCountry'  => '%%local_business_address_country%%',
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
        if (isset($schemaManual['_rankology_fno_rich_snippets_lb_street_addr'],
        $schemaManual['_rankology_fno_rich_snippets_lb_city'],
        $schemaManual['_rankology_fno_rich_snippets_lb_state'],
        $schemaManual['_rankology_fno_rich_snippets_lb_pc'],
        $schemaManual['_rankology_fno_rich_snippets_lb_country'])) {
            $variables = [
                'streetAddress'   => $schemaManual['_rankology_fno_rich_snippets_lb_street_addr'],
                'addressLocality' => $schemaManual['_rankology_fno_rich_snippets_lb_city'],
                'addressRegion'   => $schemaManual['_rankology_fno_rich_snippets_lb_state'],
                'postalCode'      => $schemaManual['_rankology_fno_rich_snippets_lb_pc'],
                'addressCountry'  => $schemaManual['_rankology_fno_rich_snippets_lb_country'],
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

        return apply_filters('rankology_fno_get_json_data_postal_address', $data, $context);
    }
}
