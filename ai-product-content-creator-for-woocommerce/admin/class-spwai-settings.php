<?php

/**
 * Settings page 
 *
 * @link       https://storepro.io/
 * @since      1.0.0
 * @package    ai-product-content-creator-for-woocommerce
 */
class Spwai_Settings
{

    /**
     * Add Settings menu
     */
    public function add_admin_menu()
    {
        add_menu_page('AI Content Creator Settings', 'Proseller AI', 'manage_options', SPWAI_NAME, array($this, 'render_settings_page'), '', 56);
    }

    /**
     * Settings initiation
     */
    public function settings_init() {
        add_settings_section('spwai_api_section', 'API Settings', array($this, 'api_section_callback'), 'spwai_settings');

        add_settings_field('spwai_api_key', 'OpenAI API Key', array($this, 'api_key_callback'), 'spwai_settings', 'spwai_api_section');
        add_settings_field('spwai_model', 'Select Model', array($this, 'model_callback'), 'spwai_settings', 'spwai_api_section');

        // Add new settings fields for logging
        add_settings_field('spwai_enable_console_log', 'Enable Console Log', array($this, 'enable_console_log_callback'), 'spwai_settings', 'spwai_api_section');
        add_settings_field('spwai_enable_error_log', 'Enable Error Log', array($this, 'enable_error_log_callback'), 'spwai_settings', 'spwai_api_section');

        // Register new settings
        register_setting('spwai_settings', 'spwai_api_key', array($this, 'sanitize_api_key'));
        register_setting('spwai_settings', 'spwai_model', array($this, 'sanitize_model'));
        register_setting('spwai_settings', 'spwai_enable_console_log');
        register_setting('spwai_settings', 'spwai_enable_error_log');

        // Customization settings
        add_settings_section('spwai_customization_section', 'Customization Settings', array($this, 'customization_section_callback'), 'spwai_customization');

        add_settings_field('spwai_target_audience', 'Target Audience', array($this, 'target_audience_callback'), 'spwai_customization', 'spwai_customization_section');
        add_settings_field('spwai_tone', 'Tone', array($this, 'tone_callback'), 'spwai_customization', 'spwai_customization_section');
        add_settings_field('spwai_style', 'Style', array($this, 'style_callback'), 'spwai_customization', 'spwai_customization_section');
        add_settings_field('spwai_description_format', 'How you need description?', array($this, 'description_format_callback'), 'spwai_customization', 'spwai_customization_section');

        register_setting('spwai_customization', 'spwai_target_audience', array($this, 'sanitize_text'));
        register_setting('spwai_customization', 'spwai_tone', array($this, 'sanitize_text'));
        register_setting('spwai_customization', 'spwai_style', array($this, 'sanitize_text'));
        register_setting('spwai_customization', 'spwai_description_format', array($this, 'sanitize_text'));
    }

    public function api_section_callback() {
        echo '<p>Configure your OpenAI API settings below.</p>';
    }

    public function customization_section_callback() {
        echo '<p>Customize the content generation settings below.</p>';
    }

    public function api_key_callback() {
        $api_key = get_option('spwai_api_key');
        echo '<input type="text" name="spwai_api_key" required value="' . esc_attr($api_key) . '" />';
        echo '<a class="spwai-help-link" href="https://platform.openai.com/api-keys" target="_blank">Get Your API Key</a>';
    }

    public function model_callback() {
        $model = get_option('spwai_model');
        $models = array(
            'gpt-3.5-turbo' => 'GPT-3.5 Turbo',
            'gpt-3.5-turbo-1106' => 'GPT-3.5 Turbo 1106',
            'gpt-4' => 'GPT-4', 
            'gpt-4o-mini' => 'GPT-4o Mini',
            'gpt-4-turbo-preview' => 'GPT-4 Turbo'
        );

        echo '<select name="spwai_model">';
        foreach ($models as $key => $option) {
            $selected = selected($model, $key, false);
            echo '<option value="' . esc_attr($key) . '" ' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        echo '</select>';
        
        echo '<p class="description">Default model set as "GPT-3.5 Turbo", which is the cost-effective choice.</p>';
    }

    public function enable_console_log_callback() {
        $enable_console_log = get_option('spwai_enable_console_log', 'yes');
        echo '<input type="checkbox" name="spwai_enable_console_log" value="yes" ' . checked($enable_console_log, 'yes', false) . ' />';
    }

    public function enable_error_log_callback() {
        $enable_error_log = get_option('spwai_enable_error_log', 'yes');
        echo '<input type="checkbox" name="spwai_enable_error_log" value="yes" ' . checked($enable_error_log, 'yes', false) . ' />';
    }

    public function target_audience_callback() {
        $target_audience = get_option('spwai_target_audience', 'general audience');
        $options = array(
            'General Public' => 'General Public – Suitable for a broad audience with simple and clear language.',
            'Professionals' => 'Professionals – Formal and detailed for industry experts.',
            'Beginners' => 'Beginners – Simple, easy-to-understand explanations.',
            'Students' => 'Students – Educational tone with structured explanations.',
            'Children' => 'Children – Simplified and engaging content.',
            'Tech Enthusiasts' => 'Tech Enthusiasts – Focus on technical details and innovation.',
            'Business Owners' => 'Business Owners – Practical and strategic content.',
            'Academics' => 'Academics – In-depth, research-oriented style.',
            'Gamers' => 'Gamers – Casual, fun, and engaging.',
            'Marketers' => 'Marketers – Sales-driven, persuasive, and conversion-focused.'
        );

        echo '<select name="spwai_target_audience">';
        foreach ($options as $key => $option) {
            $selected = selected($target_audience, $key, false);
            echo '<option value="' . esc_attr($key) . '" ' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        echo '</select>';
    }

    public function tone_callback() {
        $tone = get_option('spwai_tone', 'neutral');
        $options = array(
            'Professional' => 'Professional – Formal and authoritative.',
            'Casual' => 'Casual – Friendly and conversational.',
            'Persuasive' => 'Persuasive – Convincing and compelling.',
            'Humorous' => 'Humorous – Fun and lighthearted.',
            'Inspiring' => 'Inspiring – Motivational and uplifting.',
            'Serious' => 'Serious – Direct and factual.',
            'Empathetic' => 'Empathetic – Understanding and supportive.',
            'Optimistic' => 'Optimistic – Positive and encouraging.',
            'Witty' => 'Witty – Clever and sharp.',
            'Educational' => 'Educational – Clear and informative.'
        );

        echo '<select name="spwai_tone">';
        foreach ($options as $key => $option) {
            $selected = selected($tone, $key, false);
            echo '<option value="' . esc_attr($key) . '" ' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        echo '</select>';
    }

    public function style_callback() {
        $style = get_option('spwai_style', 'informative');
        $options = array(
            'Descriptive' => 'Descriptive – Detailed and vivid.',
            'Concise' => 'Concise – Short and to the point.',
            'Storytelling' => 'Storytelling – Narrative-driven content.',
            'Technical' => 'Technical – Fact-based and precise.',
            'Conversational' => 'Conversational – Informal and engaging.',
            'Persuasive' => 'Persuasive – Designed to influence action.',
            'Poetic' => 'Poetic – Artistic and expressive.',
            'Journalistic' => 'Journalistic – Objective and factual.',
            'Analytical' => 'Analytical – Data-driven and logical.',
            'Satirical' => 'Satirical – Sarcastic and humorous.'
        );

        echo '<select name="spwai_style">';
        foreach ($options as $key => $option) {
            $selected = selected($style, $key, false);
            echo '<option value="' . esc_attr($key) . '" ' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        echo '</select>';
    }

    public function description_format_callback() {
        $description_format = get_option('spwai_description_format', 'paragraph');
        $options = array(
            'Bullet Points' => 'Bullet Points',
            'Paragraph' => 'Paragraph',
            'Bullet Points with Paragraph' => 'Bullet Points with Paragraph'

        );

        echo '<select name="spwai_description_format">';
        foreach ($options as $key => $option) {
            $selected = selected($description_format, $key, false);
            echo '<option value="' . esc_attr($key) . '" ' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        echo '</select>';
    }

    public function sanitize_api_key($input) {
        return sanitize_text_field($input);
    }

    public function sanitize_model($input) {
        return sanitize_text_field($input);
    }

    public function sanitize_text($input) {
        return sanitize_text_field($input);
    }

    /**
     * Render the settings page
     */
    public function render_settings_page() {

        // Display any settings errors or messages
        settings_errors();
        ?>
        <div class="spwai-settings">
            <div class="wrap">
                <h2>WooCommerce AI Product Content Creator and Optimizer Settings</h2>
                <h2 class="nav-tab-wrapper">
                    <a href="#settings" class="nav-tab nav-tab-active">Settings</a>
                    <a href="#customization" class="nav-tab">Customization</a>
                </h2>
                <div id="settings" class="spwai-tab-content">
                    <form method="post" action="options.php">
                        <?php
                        settings_fields('spwai_settings');
                        do_settings_sections('spwai_settings');
                        submit_button();
                        ?>
                    </form>
                </div>
                <div id="customization" class="spwai-tab-content" style="display:none;">
                    <form method="post" action="options.php">
                        <?php
                        settings_fields('spwai_customization');
                        do_settings_sections('spwai_customization');
                        submit_button();
                        ?>
                    </form>
                </div>
            </div>
            <span class="spwai-by-text">
                <a href="http://storepro.io/" target="_blank">
                    <img src="<?php echo esc_url(SPWAI_URL . 'admin/images/storepro-logo.png'); ?>" alt="StorePro Logo">
                </a>
            </span>
        </div>
        <?php
    }
}



add_action('wp_ajax_spwai_update_customization_settings', 'spwai_update_customization_settings');
function spwai_update_customization_settings() {
    check_ajax_referer('spwai_nonce', 'nonce');

    if (isset($_POST['target_audience'])) {
        update_option('spwai_target_audience', sanitize_text_field($_POST['target_audience']));
    }
    if (isset($_POST['tone'])) {
        update_option('spwai_tone', sanitize_text_field($_POST['tone']));
    }
    if (isset($_POST['style'])) {
        update_option('spwai_style', sanitize_text_field($_POST['style']));
    }

    wp_send_json_success();
}