<?php
/*
Plugin Name: AI Widget
Plugin URI: https://chatbotkit.com/wordpress
Description: Enhance your website with the AI Widget plugin by ChatBotKit. Easily integrate advanced AI capabilities across all your pages with customizable settings to fit your needs. 
Version: 1.0
Author: ChatBotKit
Author URI: https://chatbotkit.com
License: GPL2
*/

function chatbotkit_ai_widget_menu() {
    add_options_page(
        'AI Widget Options',                // Page title
        'AI Widget',                        // Menu title
        'manage_options',                   // Capability
        'ai-widget',                        // Menu slug
        'chatbotkit_ai_widget_options_page' // Callback function
    );
}

add_action('admin_menu', 'chatbotkit_ai_widget_menu');

function chatbotkit_ai_widget_settings_init() {
    register_setting('aiWidgetOptions', 'chatbotkit_ai_widget_setting', [
        'sanitize_callback' => 'sanitize_text_field'
    ]);

    add_settings_section(
        'chatbotkit_ai_widget_section',
        'General Settings',
        'chatbotkit_ai_widget_section_callback',
        'ai-widget'
    );

    add_settings_field(
        'chatbotkit_ai_widget_field',
        'Widget Id',
        'chatbotkit_ai_widget_field_callback',
        'ai-widget',
        'chatbotkit_ai_widget_section'
    );
}

add_action('admin_init', 'chatbotkit_ai_widget_settings_init');

function chatbotkit_ai_widget_section_callback() {
    echo '<p>Enter the Id of AI widget to load. You can obtain your AI Widget AI <a href="https://chatbotkit.com/new" target="_blank">here</a>.</p>';
}

function chatbotkit_ai_widget_field_callback() {
    $setting = get_option('chatbotkit_ai_widget_setting');

    echo "<input type='text' name='chatbotkit_ai_widget_setting' value='" . esc_attr($setting) . "' />";
}

function chatbotkit_ai_widget_options_page() {
    ?>
    <div class="wrap">
        <h1>AI Widget Settings</h1>
        <form action="options.php" method="post">
            <?php
                settings_fields('aiWidgetOptions');
                do_settings_sections('ai-widget');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

function chatbotkit_ai_widget_enqueue_script() {
    wp_enqueue_script(
        'ai-widget-script',
        'https://static.chatbotkit.com/integrations/widget/v2.js',
        [],
        null, // Optional: Version number for cache busting
        true  // Load script in footer
    );
}

add_action('wp_enqueue_scripts', 'chatbotkit_ai_widget_enqueue_script');

function chatbotkit_ai_widget_add_element() {
    $widget_type = get_option('chatbotkit_ai_widget_setting', '');

    if (!empty($widget_type)) {
        echo '<chatbotkit-widget widget="' . esc_attr($widget_type) . '" layout="popover" style="position:fixed;z-index:999999999;bottom:0px;right:0px;"/>';
    }
}

add_action('wp_footer', 'chatbotkit_ai_widget_add_element');
