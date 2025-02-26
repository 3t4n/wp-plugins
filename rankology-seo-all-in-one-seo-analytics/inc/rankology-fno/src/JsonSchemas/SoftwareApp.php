<?php

namespace RankologyFno\JsonSchemas;

if (! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class SoftwareApp extends JsonSchemaValue implements GetJsonData
{
    const NAME = 'softwareapp';

    protected function getName()
    {
        return self::NAME;
    }

    /**
     * 
     *
     * @return array
     *
     * @param array $schemaManual
     */
    protected function getVariablesForManualSnippet($schemaManual)
    {
        $keys = [
            'type'                          => '_rankology_fno_rich_snippets_type',
            'name'                          => '_rankology_fno_rich_snippets_softwareapp_name',
            'operatingSystem'               => '_rankology_fno_rich_snippets_softwareapp_os',
            'applicationCategory'           => '_rankology_fno_rich_snippets_softwareapp_cat',
            'price'                         => '_rankology_fno_rich_snippets_softwareapp_price',
            'priceCurrency'                 => '_rankology_fno_rich_snippets_softwareapp_currency',
            'ratingValue'                   => '_rankology_fno_rich_snippets_softwareapp_rating',
            'bestRating'                    => '_rankology_fno_rich_snippets_softwareapp_max_rating',
        ];
        $variables = [];

        foreach ($keys as $key => $value) {
            $variables[$key] = isset($schemaManual[$value]) ? $schemaManual[$value] : '';
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
    public function getJsonData($context = null)
    {
        $data = $this->getArrayJson();

        $typeSchema = isset($context['type']) ? $context['type'] : RichSnippetType::MANUAL;

        $variables = [];

        switch ($typeSchema) {
            case RichSnippetType::MANUAL:
                $schemaManual = $this->getCurrentSchemaManual($context);

                if (null === $schemaManual) {
                    return $data;
                }

                $variables = $this->getVariablesForManualSnippet($schemaManual);
                break;
        }

        if (isset($variables['ratingValue'])) {
            $contextWithVariables              = $context;
            $contextWithVariables['variables'] = [
                'ratingValue'  => $variables['ratingValue'],
                'bestRating'  => $variables['bestRating'],
                'worstRating'  => empty($variables['bestRating']) ? '' : 1,
                'ratingAuthor' => '%%post_author%%',
            ];
            $contextWithVariables['type']      = RichSnippetType::SUB_TYPE;
            $schema                            = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Review::NAME, $contextWithVariables, ['remove_empty'=> true]);
            if (count($schema) > 1) {
                $data['review'] = $schema;
            }
        }

        if (isset($variables['price'], $variables['priceCurrency'])) {
            $contextWithVariables              = $context;
            $contextWithVariables['variables'] = [
                'price'          => $variables['price'],
                'priceCurrency'  => $variables['priceCurrency'],
            ];
            $contextWithVariables['type']      = RichSnippetType::SUB_TYPE;
            $schema                            = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Offer::NAME, $contextWithVariables, ['remove_empty'=> true]);
            if (count($schema) > 1) {
                $data['offers'] = $schema;
            }
        }

        $data = rankology_get_service('VariablesToString')->replaceDataToString($data, $variables);

        return apply_filters('rankology_fno_get_json_data_software_app', $data, $context);
    }

    /**
     * 
     *
     * @param  $data
     *
     * @return array
     */
    public function cleanValues($data)
    {
        if (isset($data['review']) && isset($data['review']['@context'])) {
            unset($data['review']['@context']);
        }

        return parent::cleanValues($data);
    }
}
