<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//OpenAI API key
function rankology_ai_openai_api_key_callback() {

    $options = get_option('rankology_fno_option_name');
    $check = isset($options['rankology_ai_openai_api_key']) ? 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' : null;

    printf('<input type="password" name="rankology_fno_option_name[rankology_ai_openai_api_key]" autocomplete="off" spellcheck="false" autocorrect="off" autocapitalize="off" value="%s" aria-label="' . __('OpenAI API key', 'wp-rankology') . '"/>', esc_html($check));
    ?>
        <p class="description">
            <?php printf(__('Sign up to <a href="%s" target="_blank">OpenAI</a> to generate your API key.', 'wp-rankology'), esc_url( 'https://beta.openai.com/account/api-keys' )); ?>
        </p>
    <?php
}

//Open AI model
function rankology_ai_openai_model_callback() {
    $options = get_option('rankology_fno_option_name');

    $selected = isset($options['rankology_ai_openai_model']) ? $options['rankology_ai_openai_model'] : null; ?>

<select id="rankology_ai_openai_model" name="rankology_fno_option_name[rankology_ai_openai_model]">
    <?php
        $models = [
            'gpt-3.5-turbo'      => __('GPT-3.5 Turbo (Most efficient)','wp-rankology'),
            'text-davinci-003'   => __('Davinci','wp-rankology'),
            'text-curie-001'     => __('Curie','wp-rankology'),
            'text-babbage-001'   => __('Babbage','wp-rankology'),
            'text-ada-001'       => __('Ada (Fastest, less expensive)','wp-rankology'),
        ];
        if ( ! empty($models)) {
            foreach ($models as $key => $model) { ?>
    <option <?php if (esc_attr($key) == $selected) { ?>
        selected="selected"
        <?php } ?>
        value="<?php esc_attr_e($key); ?>"><?php esc_html_e($model); ?>
    </option>
    <?php }
        }
    ?>
</select>

<p class="description">
    <?php esc_html_e('Select your OpenAI model.', 'wp-rankology'); ?>
</p>

<?php if (isset($options['rankology_ai_openai_model'])) {
        esc_attr($options['rankology_ai_openai_model']);
    }
}
