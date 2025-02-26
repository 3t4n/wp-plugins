<?php

function aicg_content_generator_add_admin_menu()
{
    add_menu_page(
        'AI Content Forge Settings',
        'AI Content Forge',
        'manage_options',
        'ai-content-forge-settings',
        'aicg_content_generator_settings_page',
        'dashicons-edit-page'
    );
}
add_action('admin_menu', 'aicg_content_generator_add_admin_menu');

function aicg_content_generator_register_settings()
{
    register_setting(
        'aicg_content_generator_settings_group', 'aicg_openai_api_key', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        )
    );
    register_setting(
        'aicg_content_generator_settings_group', 'aicg_openai_model', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        )
    );

}
add_action('admin_init', 'aicg_content_generator_register_settings');

function aicg_content_generator_settings_page()
{
    ?>
    <div class="wrap">
        <h1>AI Content Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('aicg_content_generator_settings_group');
            do_settings_sections('aicg_content_generator_settings_group');
            settings_errors(); 
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">OpenAI API Key</th>
                    <td>
                        <input type="text" name="aicg_openai_api_key" value="<?php echo esc_attr(get_option('aicg_openai_api_key')); ?>" style="width: 100%;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">OpenAI Model</th>
                    <td>
                        <select name="aicg_openai_model">
                            
                            <option value="gpt-4o" <?php selected(get_option('aicg_openai_model'), 'gpt-4o'); ?>>GPT-4o</option>
                            <option value="gpt-4o-mini" <?php selected(get_option('aicg_openai_model'), 'gpt-4o-mini'); ?>>GPT-4o mini</option>
                            <option value="o1-mini" <?php selected(get_option('aicg_openai_model'), 'o1-mini'); ?>>o1-mini</option>
                            <option value="o1-preview" <?php selected(get_option('aicg_openai_model'), 'o1-preview'); ?>>o1-preview</option>
                            <option value="gpt-4-turbo" <?php selected(get_option('aicg_openai_model'), 'gpt-4-turbo'); ?>>GPT-4 Turbo</option>
                            <option value="gpt-3.5-turbo" <?php selected(get_option('aicg_openai_model'), 'gpt-3.5-turbo'); ?>>GPT-3.5-Turbo</option>
                        </select>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
