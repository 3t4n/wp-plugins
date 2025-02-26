<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_recipe($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $rankology_fno_rich_snippets_recipes_name = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_name'] : '';
    $rankology_fno_rich_snippets_recipes_desc = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_desc']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_desc'] : '';
    $rankology_fno_rich_snippets_recipes_cat = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_cat']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_cat'] : '';
    $rankology_fno_rich_snippets_recipes_img = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_img']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_img'] : '';
    $rankology_fno_rich_snippets_recipes_video = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_video']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_video'] : '';
    $rankology_fno_rich_snippets_recipes_prep_time = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_prep_time']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_prep_time'] : '';
    $rankology_fno_rich_snippets_recipes_cook_time = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_cook_time']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_cook_time'] : '';
    $rankology_fno_rich_snippets_recipes_calories = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_calories']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_calories'] : '';
    $rankology_fno_rich_snippets_recipes_yield = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_yield']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_yield'] : '';
    $rankology_fno_rich_snippets_recipes_keywords = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_keywords']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_keywords'] : '';
    $rankology_fno_rich_snippets_recipes_cuisine = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_cuisine']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_cuisine'] : '';
    $rankology_fno_rich_snippets_recipes_ingredient = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_ingredient']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_ingredient'] : '';
    $rankology_fno_rich_snippets_recipes_instructions = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_instructions']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_recipes_instructions'] : ''; ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-recipes">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Mark up your recipe content with structured data to provide rich cards and host-specific lists for your recipes, such as cooking and preparation times, nutrition information...', 'wp-rankology'); ?>
        </p>
    </div>
    <div class="rankology-notice is-warning">
        <ul class="advice rankology-list">
            <li><?php esc_html_e('Use recipe markup for content about preparing a particular dish. For example, "facial scrub" or "party ideas" are not valid names for a dish.', 'wp-rankology'); ?>
            </li>
        </ul>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_name_meta">
            <?php esc_html_e('Recipe name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_recipes_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_name]"
            placeholder="<?php echo esc_html__('The name of your dish', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Recipe name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_recipes_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_desc_meta">
            <?php esc_html_e('Short recipe description', 'wp-rankology'); ?>
        </label>
        <textarea id="rankology_fno_rich_snippets_recipes_desc_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_desc]"
            placeholder="<?php echo esc_html__('A short summary describing the dish.', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Short recipe description', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_recipes_desc; ?></textarea>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_cat_meta">
            <?php esc_html_e('Recipe category', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_recipes_cat_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_cat]"
            placeholder="<?php echo esc_html__('e.g. appetizer, entree, or dessert', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Recipe category', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_recipes_cat; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_img_meta">
            <?php esc_html_e('Image', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('Minimum size: 185px by 185px, aspect ratio 1:1', 'wp-rankology'); ?></span>
        <input id="rankology_fno_rich_snippets_recipes_img_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_img]"
            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Image', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_recipes_img; ?>" />
        <input id="rankology_fno_rich_snippets_recipes_img"
            class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
            type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_video_meta">
            <?php esc_html_e('Video URL of the recipe', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_recipes_video_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_video]"
            placeholder=""
            aria-label="<?php esc_html_e('Video URL of the recipe', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_recipes_video; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_prep_time_meta">
            <?php esc_html_e('Preparation time (in minutes)', 'wp-rankology'); ?>
        </label>
        <input type="number" id="rankology_fno_rich_snippets_recipes_prep_time_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_prep_time]"
            placeholder="<?php echo esc_html__('e.g. 30 min', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Preparation time (in minutes)', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_recipes_prep_time; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_cook_time_meta">
            <?php esc_html_e('Cooking time (in minutes)', 'wp-rankology'); ?>
        </label>
        <input type="number" id="rankology_fno_rich_snippets_recipes_cook_time_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_cook_time]"
            placeholder="<?php echo esc_html__('e.g. 45 min', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Cooking time (in minutes)', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_recipes_cook_time; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_calories_meta">
            <?php esc_html_e('Calories', 'wp-rankology'); ?>
        </label>
        <input type="number" id="rankology_fno_rich_snippets_recipes_calories_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_calories]"
            placeholder="<?php echo esc_html__('Number of calories', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Calories', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_recipes_calories; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_yield_meta">
            <?php esc_html_e('Recipe yield', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_recipes_yield_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_yield]"
            placeholder="<?php echo esc_html__('e.g. number of people served, or number of servings', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Recipe yield', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_recipes_yield; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_keywords_meta">
            <?php esc_html_e('Keywords', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_recipes_keywords_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_keywords]"
            placeholder="<?php echo esc_html__('e.g. winter apple pie, nutmeg crust (NOT recommended: dessert, American)', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Keywords', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_recipes_keywords; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_cuisine_meta">
            <?php esc_html_e('Recipe cuisine', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_recipes_cuisine_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_cuisine]"
            placeholder="<?php echo esc_html__('The region associated with your recipe. For example, "French", Mediterranean", or "American"', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Recipe cuisine', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_recipes_cuisine; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_ingredient_meta">
            <?php esc_html_e('Recipe ingredients', 'wp-rankology'); ?>
        </label>
        <textarea rows="12" id="rankology_fno_rich_snippets_recipes_ingredient_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_ingredient]"
            placeholder="<?php echo esc_html__('Ingredients used in the recipe. One ingredient per line. Include only the ingredient text that is necessary for making the recipe. Don\'t include unnecessary information, such as a definition of the ingredient.', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Recipe ingredients', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_recipes_ingredient; ?></textarea>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_recipes_instructions_meta">
            <?php esc_html_e('Recipe instructions', 'wp-rankology'); ?>
        </label>
        <textarea rows="12" id="rankology_fno_rich_snippets_recipes_instructions_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_recipes_instructions]"
            placeholder="<?php echo esc_html__('e.g. Heat oven to 425°F. Include only text on how to make the recipe and don\'t include other text such as "Directions", "Watch the video", "Step 1".', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Recipe instructions', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_recipes_instructions; ?></textarea>
    </p>
</div>
<?php
}
