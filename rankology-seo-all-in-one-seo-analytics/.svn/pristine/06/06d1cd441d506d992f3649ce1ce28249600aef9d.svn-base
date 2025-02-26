<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;

class FormSchemaRecipe extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_recipes_desc':
            case '_rankology_fno_rich_snippets_recipes_ingredient':
            case '_rankology_fno_rich_snippets_recipes_instructions':
                return 'textarea';
            case '_rankology_fno_rich_snippets_recipes_name':
            case '_rankology_fno_rich_snippets_recipes_cat':
            case '_rankology_fno_rich_snippets_recipes_video':
            case '_rankology_fno_rich_snippets_recipes_yield':
            case '_rankology_fno_rich_snippets_recipes_keywords':
            case '_rankology_fno_rich_snippets_recipes_cuisine':
                return 'input';
            case '_rankology_fno_rich_snippets_recipes_prep_time':
            case '_rankology_fno_rich_snippets_recipes_cook_time':
            case '_rankology_fno_rich_snippets_recipes_calories':
                return 'number';
            case '_rankology_fno_rich_snippets_recipes_img':
                return 'upload';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_recipes_name':
                return __('Recipe name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_desc':
                return __('Short recipe description', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_cat':
                return __('Recipe category', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_img':
                return __('Image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_video':
                return __('Video URL of the recipe', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_prep_time':
                return __('Preparation time (in minutes)', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_cook_time':
                return __('Cooking time (in minutes)', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_calories':
                return __('Calories', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_yield':
                return __('Recipe yield', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_keywords':
                return __('Keywords', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_cuisine':
                return __('Recipe cuisine', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_ingredient':
                return __('Recipe ingredients', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_instructions':
                return __('Recipe instructions', 'wp-rankology');
        }
    }

    protected function getDescriptionByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_recipes_img':
                return __('Minimum size: 185px by 185px, aspect ratio 1:1', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_recipes_name':
                return __('The name of your dish', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_desc':
                return __('A short summary describing the dish.', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_cat':
                return __('e.g. appetizer, entree, or dessert', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_img':
                return __('Select your image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_video':
                return __('e.g. https://www.youtube.com/watch?v=p6v9Jo9kRIU', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_prep_time':
                return __('e.g. 30 min', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_cook_time':
                return __('e.g. 45 min', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_calories':
                return __('Number of calories', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_yield':
                return __('e.g. number of people served, or number of servings', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_keywords':
                return __('e.g. winter apple pie, nutmeg crust (NOT recommended: dessert, American)', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_cuisine':
                return __('The region associated with your recipe. For example, "French", Mediterranean", or "American"', 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_ingredient':
                return __("Ingredients used in the recipe. One ingredient per line. Include only the ingredient text that is necessary for making the recipe. Don't include unnecessary information, such as a definition of the ingredient.", 'wp-rankology');
            case '_rankology_fno_rich_snippets_recipes_instructions':
                return __('e.g. Heat oven to 425°F. Include only text on how to make the recipe and don\'t include other text such as "Directions", "Watch the video", "Step 1".', 'wp-rankology');
            default:
                return '';
        }
    }

    protected function getDetails($postId = null) {
        return [
            [
                'key' => '_rankology_fno_rich_snippets_recipes_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_desc',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_cat',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_img',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_video',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_prep_time',
                'min' => 1,
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_cook_time',
                'min' => 1,
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_calories',
                'min' => 1,
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_yield',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_keywords',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_cuisine',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_ingredient',
                'class' => 'rankology-textarea-high-size'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_recipes_instructions',
                'class' => 'rankology-textarea-high-size'
            ],
        ];
    }
}
