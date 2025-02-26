<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class Faq extends JsonSchemaValue implements GetJsonData {
    const NAME = 'faq';

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

        $questions    = [];
        switch ($typeSchema) {
            case RichSnippetType::MANUAL:
                $schemaManual = $this->getCurrentSchemaManual($context);

                if (null === $schemaManual) {
                    return $data;
                }

                if (isset($schemaManual['_rankology_fno_rich_snippets_faq'])) {
                    $questions = $schemaManual['_rankology_fno_rich_snippets_faq'];
                }
                break;
        }

        if ( ! empty($questions)) {
            foreach ($questions as $key => $question) {
                $variables = [
                    'name'        => $question['question'],
                    'text'        => $question['answer'],
                    'answerCount' => 1,
                ];

                $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(MainEntity::NAME, ['variables' => $variables], ['remove_empty'=> true]);

                if (count($schema) > 1 && isset($schema['name']) && ! empty($schema['name'])) {
                    $data['mainEntity'][] = $schema;
                }
            }
        }

        return apply_filters('rankology_fno_get_json_data_faq', $data, $context);
    }
}
