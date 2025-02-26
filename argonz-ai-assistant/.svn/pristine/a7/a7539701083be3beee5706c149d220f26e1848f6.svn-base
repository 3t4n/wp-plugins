<?php
/*
Plugin Name: Argonz AI Text Assistant
Description: خلاصه سازی متن پست، متن اصلاح شده جهت سئو بهتر و کلمات کلیدی مرتبط با آن را ارائه می دهد.
Version: 1.0
Author: Arman Daneshdoost
Author URI: https://github.com/ArgonzCompany
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Register activation and deactivation hooks
register_activation_hook(__FILE__, 'argonz_activate_plugin');

// Activation function
function argonz_activate_plugin() {
    // Optional: Set default options if needed
    if (!get_option('argonz_groq_api_key')) {
        add_option('argonz_groq_api_key', '');
    }
    if (!get_option('argonz_aiml_api_key')) {
        add_option('argonz_aiml_api_key', '');
    }
    if (!get_option('argonz_api_service')) {
        add_option('argonz_api_service', 'groq');
    }
    if (!get_option('argonz_api_models')) {
        add_option('argonz_api_models', 'gemma2-9b-it');
    }
}

// Enqueue admin styles
function argonz_enqueue_admin_styles() {
    wp_enqueue_style('argonz-admin-styles', esc_url(plugins_url('css/styles-admin.css', __FILE__)));
}
add_action('admin_enqueue_scripts', 'argonz_enqueue_admin_styles');

// Add admin menu and settings page
function argonz_add_admin_menu() {
    add_options_page(
        'Argonz AI Assistant Settings',
        'تنظیمات دستیار متون آرگونز',
        'manage_options',
        'argonz-summarizer',
        'argonz_settings_page'
    );
}
add_action('admin_menu', 'argonz_add_admin_menu');

// Settings page
function argonz_settings_page() {
    ?>
    <div class="wrap">
        <h1>تنظیمات دستیار متون آرگونز</h1>
        <?php
        $logo_id = attachment_url_to_postid(plugins_url('images/argonz_logo_new.png', __FILE__));
        if ($logo_id) {
            echo wp_get_attachment_image($logo_id, 'medium', false, ['style' => 'width: 150px; height: auto; margin-bottom: 20px;']);
        } else {
            echo '<img src="' . esc_url(plugins_url('images/argonz_logo_new.png', __FILE__)) . '" alt="Plugin Logo" style="width: 150px; height: auto; margin-bottom: 20px;">';
        }
        ?>
        <form method="post" action="options.php">
            <?php
            settings_fields('argonz_settings');
            do_settings_sections('argonz-summarizer');
            submit_button('ذخیره تنظیمات', '', 'submit', true, ['id' => 'argonz_groq_btn']);
            ?>
        </form>
    </div>
    <?php
}

// Register settings
function argonz_register_settings() {
    register_setting('argonz_settings', 'argonz_groq_api_key', 'sanitize_text_field');
    register_setting('argonz_settings', 'argonz_aiml_api_key', 'sanitize_text_field');
    register_setting('argonz_settings', 'argonz_api_service', 'sanitize_text_field');
    register_setting('argonz_settings', 'argonz_api_models', 'sanitize_text_field');

    add_settings_section(
        'argonz_settings_section',
        'تنظیمات API',
        null,
        'argonz-summarizer'
    );

    add_settings_field(
        'argonz_groq_api_key',
        'کلید API Groq',
        'argonz_groq_api_key_field',
        'argonz-summarizer',
        'argonz_settings_section'
    );

    add_settings_field(
        'argonz_aiml_api_key',
        'کلید API AI/ML',
        'argonz_aiml_api_key_field',
        'argonz-summarizer',
        'argonz_settings_section'
    );

    add_settings_field(
        'argonz_api_service',
        'انتخاب سرویس API',
        'argonz_api_service_field',
        'argonz-summarizer',
        'argonz_settings_section'
    );

    add_settings_field(
        'argonz_api_models',
        'مدلها',
        'argonz_models_field',
        'argonz-summarizer',
        'argonz_settings_section'
    );
}
add_action('admin_init', 'argonz_register_settings');

// API key input fields
function argonz_groq_api_key_field() {
    $api_key = get_option('argonz_groq_api_key', '');
    echo '<input type="text" name="argonz_groq_api_key" id="argonz_groq_input" value="' . esc_attr($api_key) . '" class="regular-text" />';
}

function argonz_aiml_api_key_field() {
    $api_key = get_option('argonz_aiml_api_key', '');
    echo '<input type="text" name="argonz_aiml_api_key" id="argonz_aiml_input" value="' . esc_attr($api_key) . '" class="regular-text" />';
}

// Radio button for selecting API service
function argonz_api_service_field() {
    $selected_service = get_option('argonz_api_service', 'groq');
    ?>
    <label>
        <input type="radio" name="argonz_api_service" value="groq" <?php checked($selected_service, 'groq'); ?> />
        Groq
    </label><br>
    <label>
        <input type="radio" name="argonz_api_service" value="aiml" <?php checked($selected_service, 'aiml'); ?> />
        AI/ML
    </label>
    <?php
}

// Dynamic model field with Groq models
function argonz_models_field() {
    $selected_service = get_option('argonz_api_service', 'groq');

    if ($selected_service === 'groq') {
        $available_models = [
            "llama3-groq-70b-8192-tool-use-preview",
            "gemma2-9b-it",
            "mixtral-8x7b-32768",
            "llama-3.3-70b-specdec",
            "llama3-groq-8b-8192-tool-use-preview",
            "llama3-70b-8192",
            "llama-3.1-70b-versatile",
            "llama-3.1-8b-instant"
        ];

        $api_key = get_option('argonz_groq_api_key');
        if (!$api_key) {
            echo 'َGroq API تنظیم شود.';
            return;
        }

        $api_models = argonz_get_available_models($api_key, 'groq');
        $filtered_models = array_filter($api_models, function ($model) use ($available_models) {
            return in_array($model['id'], $available_models, true);
        });

        $selected_model = get_option('argonz_api_models', 'gemma2-9b-it');

        if (!empty($filtered_models)) {
            echo '<select name="argonz_api_models" id="argonz_model_selector">';
            foreach ($filtered_models as $model) {
                $selected = selected($selected_model, $model['id'], false);
                echo "<option value=\"" . esc_attr($model['id']) . "\" " . esc_attr($selected) . ">" . esc_html($model['id']) . "</option>";
            }
            echo '</select>';
        } else {
            echo 'هیچ مدلی برای نمایش در دسترس نیست.';
        }
    } else {
        $api_key = get_option('argonz_aiml_api_key');
        if (!$api_key) {
            echo 'َAI/ML API تنظیم شود.';
            return;
        }

        $api_models = argonz_get_available_models($api_key, 'aiml');
        $filtered_models = array_filter($api_models, function ($model) {
            return $model["type"] === "chat-completion";
        });

        $selected_model = get_option('argonz_api_models', 'gpt-4o');

        if (!empty($filtered_models)) {
            echo '<select name="argonz_api_models">';
            foreach ($filtered_models as $model) {
                $selected = selected($selected_model, $model["id"], false);
                echo "<option value=\"" . esc_attr($model["id"]) . "\" " . esc_attr($selected) . ">" . esc_html($model["id"]) . "</option>";
            }
            echo '</select>';
        } else {
            echo 'قادر به نشان دادن مدل ها نیست.';
        }
    }
}

// Function to fetch available models from the Groq or AI/ML API
function argonz_get_available_models($api_key, $service = 'aiml') {
    $api_url = $service === 'groq' ?
        'https://api.groq.com/openai/v1/models' :
        'https://api.aimlapi.com/v1/models';

    $args = [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $api_key
        ],
        'sslverify' => false, // Disable SSL verification (use with caution)
    ];

    $response = wp_remote_get($api_url, $args);

    if (is_wp_error($response)) {
        error_log('WP_Error: ' . $response->get_error_message());
        return [];
    }

    $http_code = wp_remote_retrieve_response_code($response);
    if ($http_code !== 200) {
        error_log('HTTP Error: ' . $http_code . ' Response: ' . wp_remote_retrieve_body($response));
        return [];
    }

    $response_data = json_decode(wp_remote_retrieve_body($response), true);
    return $response_data['data'] ?? [];
}

// Fetch summary from Groq API
function argonz_api_get_summary($content) {
    $selected_service = get_option('argonz_api_service', 'groq');

    if ($selected_service === 'groq') {
        $api_key = get_option('argonz_groq_api_key');
        $model = get_option('argonz_api_models', 'gemma2-9b-it');
    } else {
        $api_key = get_option('argonz_aiml_api_key');
        $model = get_option('argonz_api_models', 'gpt-4o');
    }

    if (!$api_key) {
        return 'کلید API تنظیم نشده است.';
    }

    $api_url = $selected_service === 'groq' ?
        'https://api.groq.com/openai/v1/chat/completions' :
        'https://api.aimlapi.com/messages';

    $chat_role = $selected_service === 'groq' ? 'system' : 'assistant';

    $data = [
        'model' => $model,
        'messages' => [
            ['role' => $chat_role, 'content' => 'متن مورد نظر را گرفته و در کمتر از 50 کلمه آن را خلاصه سازی کن. از تولید کلمات اضافه و خلاصه سازی جلوگیری کن. تمام کلمات فارسی باشند.'],
            ['role' => 'user', 'content' => $content],
        ],
    ];

    $args = [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $api_key,
        ],
        'body' => wp_json_encode($data),
        'sslverify' => false, // Disable SSL verification (use with caution)
    ];

    $response = wp_remote_post($api_url, $args);

    if (is_wp_error($response)) {
        error_log('WP_Error: ' . $response->get_error_message());
        return 'در ارتباط با API دچار مشکل شده است.';
    }

    $http_code = wp_remote_retrieve_response_code($response);
    if ($http_code !== 200) {
        error_log('HTTP Error: ' . $http_code . ' Response: ' . wp_remote_retrieve_body($response));
        return 'API یک خطا برگردانده است:' . $http_code;
    }

    $response_data = json_decode(wp_remote_retrieve_body($response), true);
    if (isset($response_data['choices'][0]['message']['content'])) {
        return $response_data['choices'][0]['message']['content'];
    }

    error_log('خطای API غیر منتظره:' . wp_remote_retrieve_body($response));
    return 'خلاصه موجود نیست.';
}

function argonz_enqueue_styles() {
    wp_enqueue_style('argonz-post-summary-styles', esc_url(plugins_url('css/styles-summary.css', __FILE__)));
}
add_action('wp_enqueue_scripts', 'argonz_enqueue_styles');

function argonz_append_summary_to_post($content) {
    if (is_singular('post') && in_the_loop() && is_main_query()) {
        $summary = argonz_api_get_summary($content);

        if ($summary) {
            $content .= '<hr><h3 class="summary-title">خلاصه متن:</h3><p class="summary-text">' . esc_html($summary) . '</p>';
        } else {
            $content .= '<hr><p class="summary-error"><em>خلاصه توسط مدل تولید نشده است.</em></p>';
        }
    }

    return $content;
}
add_filter('the_content', 'argonz_append_summary_to_post');

// Add the metabox
function argonz_add_metabox() {
    add_meta_box(
        'argonz_post_summary_metabox',
        'دستیار آرگونز',
        'argonz_render_metabox',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'argonz_add_metabox');

// Render the metabox
function argonz_render_metabox($post) {
    ?>
    <div id="argonz-metabox-tabs">
        <ul class="argonz-tabs">
            <li><a href="#tab-revised-text">متن بازبینی‌شده</a></li>
            <li><a href="#tab-keywords">کلمات کلیدی</a></li>
        </ul>
        <div id="tab-revised-text" class="argonz-tab-content">
            <p>در حال بارگذاری...</p>
        </div>
        <div id="tab-keywords" class="argonz-tab-content">
            <p>در حال بارگذاری...</p>
        </div>
    </div>
    <?php
}

// Enqueue styles and scripts for the metabox
function argonz_enqueue_metabox_assets($hook) {
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        wp_enqueue_style('argonz-metabox-styles', esc_url(plugins_url('css/styles-metabox.css', __FILE__)));
        wp_enqueue_script('argonz-metabox-scripts', esc_url(plugins_url('js/scripts-metabox.js', __FILE__)), ['jquery'], null, true);
        wp_localize_script('argonz-metabox-scripts', 'argonzMetabox', [
            'ajax_url' => esc_url(admin_url('admin-ajax.php')),
            'post_id' => get_the_ID()
        ]);
    }
}
add_action('admin_enqueue_scripts', 'argonz_enqueue_metabox_assets');

// AJAX handler for fetching Groq data
function argonz_fetch_api_data() {
    // Check if 'post_id' is set in the $_POST array
    if (!isset($_POST['post_id'])) {
        wp_send_json_error('پست ID وجود ندارد.');
    }

    // Sanitize and validate the post_id
    $post_id = intval($_POST['post_id']);
    if ($post_id <= 0) {
        wp_send_json_error('پست ID نامعتبر است.');
    }

    // Fetch the post content
    $post_content = get_post_field('post_content', $post_id);
    if (empty($post_content)) {
        wp_send_json_error('محتوای پست خالی است.');
    }

    // Determine the selected API service
    $selected_service = get_option('argonz_api_service', 'groq');

    // Fetch API key and model based on the selected service
    if ($selected_service === 'groq') {
        $api_key = get_option('argonz_groq_api_key');
        $model = get_option('argonz_api_models', 'gemma2-9b-it');
    } else {
        $api_key = get_option('argonz_aiml_api_key');
        $model = get_option('argonz_api_models', 'gpt-4o');
    }

    // Check if the API key is set
    if (empty($api_key)) {
        wp_send_json_error('کلید API تنظیم نشده است.');
    }

    // Set the API URL based on the selected service
    $api_url = $selected_service === 'groq' ?
        'https://api.groq.com/openai/v1/chat/completions' :
        'https://api.aimlapi.com/messages';

    // Set the chat role based on the selected service
    $chat_role = $selected_service === 'groq' ? 'system' : 'assistant';

    // Prepare data for revised text
    $system_content = "You are a highly skilled Persian SEO expert. Given a Persian language webpage or a piece of content, you will provide a comprehensive SEO analysis.";

    $revised_data = [
        'model' => $model,
        'messages' => [
            ['role' => $chat_role, 'content' => $system_content],
            ['role' => 'user', 'content' => "Please analyze the following Persian text for SEO: $post_content
            Provide only the revised Persian version of the text that is optimized for Google search and user engagement. *Note: All the words must be Persian."],
        ]
    ];

    // Prepare data for keywords
    $keywords_data = [
        'model' => $model,
        'messages' => [
            ['role' => $chat_role, 'content' => $system_content],
            ['role' => 'user', 'content' => "Analyze the Persian text, $post_content, and identify the top 50 most Persian relevant keywords. Consider a combination of factors, including search volume, keyword difficulty, user intent, and semantic relevance.
                Output the keywords in a simple list format, without any additional explanation or analysis.
                *Example Output:
                1.کلیدواژه مرتبط اول (Search Volume: 1000, Difficulty: Medium)
                2.کلیدواژه مرتبط دوم (Search Volume: 800, Difficulty: Low)
                ...
                10.کلیدواژه مرتبط دهم (Search Volume: 200, Difficulty: High)
                
                *Note: All the keywords must be Persian.
            "],
        ]
    ];

    // Fetch revised text
    $revised_text = argonz_fetch_service_api($api_url, $api_key, wp_json_encode($revised_data));

    // Fetch keywords
    $keywords = argonz_fetch_service_api($api_url, $api_key, wp_json_encode($keywords_data));

    // Send JSON response
    wp_send_json_success([
        'revised_text' => esc_html($revised_text),
        'keywords' => esc_html($keywords)
    ]);
}
add_action('wp_ajax_argonz_fetch_api_data', 'argonz_fetch_api_data');

// Function to fetch data from APIs
function argonz_fetch_service_api($api_url, $api_key, $data) {
    $args = [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $api_key,
        ],
        'body' => $data,
        'sslverify' => false, // Disable SSL verification (use with caution)
    ];

    $response = wp_remote_post($api_url, $args);

    if (is_wp_error($response)) {
        return 'Error: ' . esc_html($response->get_error_message());
    }

    $http_code = wp_remote_retrieve_response_code($response);
    if ($http_code === 200) {
        $response_data = json_decode(wp_remote_retrieve_body($response), true);
        return esc_html($response_data['choices'][0]['message']['content'] ?? 'No response.');
    }

    return 'Error: HTTP ' . esc_html($http_code);
}