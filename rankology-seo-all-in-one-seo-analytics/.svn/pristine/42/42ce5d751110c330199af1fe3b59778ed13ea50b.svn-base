<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\JsonSchemas\Image;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class HowToStep extends JsonSchemaValue implements GetJsonData {
    const NAME = 'how-to-step';

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

        $typeSchema = isset($context['type']) ? $context['type'] : RichSnippetType::MANUAL;

        $variables = $this->getVariablesByType($typeSchema, $context);

        if (isset($variables['image_url']) && ! empty($variables['image_url'])) {
            $variablesContext = [
                'url' => $variables['image_url'],
                'width' => isset($variables['image_width']) ? $variables['image_width'] : '',
                'height' => isset($variables['image_height']) ? $variables['image_height'] : '',
            ];

            $contextWithVariables = $context;
            $contextWithVariables['variables'] = $variablesContext;
            $contextWithVariables['type'] = RichSnippetType::SUB_TYPE;
            $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Image::NAME, $contextWithVariables, ['remove_empty' => true]);

            if (count($schema) > 1) {
                $data['image'] = $schema;
            }
        }

        return apply_filters('rankology_fno_get_json_data_how_to_step', $data, $context);
    }
}
