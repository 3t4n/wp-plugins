<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class Recipe extends JsonSchemaValue implements GetJsonData {
    const NAME = 'recipe';

    const ALIAS = ['recipes'];

    protected function getName() {
        return self::NAME;
    }

    /**
     * 
     *
     * @return array
     *
     * @param array $schemaManual
     */
    protected function getVariablesForManualSnippet($schemaManual) {
        $total = '';
        if (isset($schemaManual['_rankology_fno_rich_snippets_recipes_prep_time'],$schemaManual['_rankology_fno_rich_snippets_recipes_cook_time'])) {
            $total = (int) $schemaManual['_rankology_fno_rich_snippets_recipes_prep_time'] + (int) $schemaManual['_rankology_fno_rich_snippets_recipes_cook_time'];
        }

        $variables = [
            'type' => isset($schemaManual['_rankology_fno_rich_snippets_type']) ? $schemaManual['_rankology_fno_rich_snippets_type'] : '',
            'name' => isset($schemaManual['_rankology_fno_rich_snippets_recipes_name']) ? $schemaManual['_rankology_fno_rich_snippets_recipes_name'] : '',
            'description' => isset($schemaManual['_rankology_fno_rich_snippets_recipes_desc']) ? $schemaManual['_rankology_fno_rich_snippets_recipes_desc'] : '',
            'recipeCategory' => isset($schemaManual['_rankology_fno_rich_snippets_recipes_cat']) ? $schemaManual['_rankology_fno_rich_snippets_recipes_cat'] : '',
            'image' => isset($schemaManual['_rankology_fno_rich_snippets_recipes_img']) ? $schemaManual['_rankology_fno_rich_snippets_recipes_img'] : '',
            'video' => isset($schemaManual['_rankology_fno_rich_snippets_recipes_video']) ? $schemaManual['_rankology_fno_rich_snippets_recipes_video'] : '',
            'prepTime' => isset($schemaManual['_rankology_fno_rich_snippets_recipes_prep_time']) ? sprintf('PT%sM', $schemaManual['_rankology_fno_rich_snippets_recipes_prep_time']) : '',
            'totalTime' => ! empty($total) ? sprintf('PT%sM', $total) : '',
            'recipeYield' => isset($schemaManual['_rankology_fno_rich_snippets_recipes_yield']) ? $schemaManual['_rankology_fno_rich_snippets_recipes_yield'] : '',
            'keywords' => isset($schemaManual['_rankology_fno_rich_snippets_recipes_keywords']) ? $schemaManual['_rankology_fno_rich_snippets_recipes_keywords'] : '',
            'recipeCuisine' => isset($schemaManual['_rankology_fno_rich_snippets_recipes_cuisine']) ? $schemaManual['_rankology_fno_rich_snippets_recipes_cuisine'] : '',
        ];

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

        $typeSchema = isset($context['type']) ? $context['type'] : RichSnippetType::MANUAL;

        $variables = [];
        $schemaManual = [];
        switch ($typeSchema) {
            case RichSnippetType::MANUAL:
                $schemaManual = $this->getCurrentSchemaManual($context);

                if (null === $schemaManual) {
                    return $data;
                }

                $variables = $this->getVariablesForManualSnippet($schemaManual);
                break;
        }

        if (isset($context['post']->ID)) {
            $variables['datePublished'] = get_the_date('Y-m-j', $context['post']->ID);
        }

        $data = rankology_get_service('VariablesToString')->replaceDataToString($data, $variables);

        $contextWithVariables = $context;
        $contextWithVariables['variables'] = [
            'name' => '%%post_author%%',
        ];
        $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Author::NAME, $contextWithVariables, ['remove_empty' => true]);

        if (count($schema) > 1) {
            $data['author'] = $schema;
        }

        if (isset($schemaManual['_rankology_fno_rich_snippets_recipes_ingredient'])) {
            $ingredients = preg_split('/\r\n|[\r\n]/', $schemaManual['_rankology_fno_rich_snippets_recipes_ingredient']);

            $data['recipeIngredient'] = $ingredients;
        }

        if (isset($schemaManual['_rankology_fno_rich_snippets_recipes_instructions'])) {
            $instructions = preg_split('/\r\n|[\r\n]/', $schemaManual['_rankology_fno_rich_snippets_recipes_instructions']);

            foreach ($instructions as $key => $value) {
                $variablesHowTo['text'] = $value;
                $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(HowToStep::NAME, ['variables' => $variablesHowTo], ['remove_empty' => true]);

                if (count($schema) > 1) {
                    $data['recipeInstructions'][] = $schema;
                }
            }
        }

        if (isset($schemaManual['_rankology_fno_rich_snippets_recipes_calories'])) {
            $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(NutritionInformation::NAME, ['variables' => [
                'calories' => $schemaManual['_rankology_fno_rich_snippets_recipes_calories'],
            ]], ['remove_empty' => true]);

            $data['nutrition'] = $schema;
        }

        return apply_filters('rankology_fno_get_json_data_recipe', $data, $context);
    }
}
