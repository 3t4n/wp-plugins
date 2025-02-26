<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include the supported languages file

function alt_magic_render_ai_settings_page() {

    // Enqueue the CSS file with a version number
    //altm_log('Enqueueing AI settings page CSS');
    wp_enqueue_style(
        'alt-magic-media-popup-button-css',
        plugin_dir_url(__FILE__) . '../css/altm-ai-settings-page.css',
        array(), // Dependencies
        '1.0.0'  // Version number
    );

    // Register and enqueue the JavaScript file
    wp_register_script(
        'alt-magic-ai-settings-js',
        esc_url(plugin_dir_url(__FILE__) . '../scripts/altm-ai-settings-page-script.js'),
        array('jquery'), // Dependencies
        '1.0.0', // Version number
        true // Load in footer
    );
    wp_enqueue_script('alt-magic-ai-settings-js');

    // Pass data to the JavaScript file
    wp_localize_script('alt-magic-ai-settings-js', 'altMagicSettings', array(
        'ajaxurl' => esc_url(admin_url('admin-ajax.php')),
        'nonce' => wp_create_nonce('alt_magic_save_settings')
    ));

    // Fetch each option individually
    $options = [
        'alt_magic_auto_generate' => get_option('alt_magic_auto_generate', 0),
        'alt_magic_language' => get_option('alt_magic_language', 'en'),
        'alt_magic_use_for_title' => get_option('alt_magic_use_for_title', 0),
        'alt_magic_use_for_caption' => get_option('alt_magic_use_for_caption', 0),
        'alt_magic_use_for_description' => get_option('alt_magic_use_for_description', 0),
        'alt_magic_prepend_string' => get_option('alt_magic_prepend_string', ''),
        'alt_magic_append_string' => get_option('alt_magic_append_string', ''),
        'alt_magic_use_seo_keywords' => get_option('alt_magic_use_seo_keywords', 0),
        'alt_magic_use_post_title' => get_option('alt_magic_use_post_title', 0),
        'alt_magic_refresh_alt_text' => get_option('alt_magic_refresh_alt_text', 'empty'),
        'alt_magic_private_site' => get_option('alt_magic_private_site', 0),
        'alt_magic_woocommerce_use_product_name' => get_option('alt_magic_woocommerce_use_product_name', 0)
    ];

    global $altm_supported_languages; // Make sure the $altm_supported_languages variable is accessible
    
    // For debugging purposes, you can uncomment these lines:
    // echo '<pre>';
    // print_r($options);
    // echo '</pre>';
    ?>
    <div class="wrap">
        <h1>Alt Magic AI Settings</h1>
        <div class="ai-settings-container">
            <form id="alt-magic-settings-form">
                <?php wp_nonce_field('alt_magic_save_settings', 'alt_magic_nonce'); ?>
                <table class="form-table" id="alt-magic-settings-table">
                    <tr>
                        <th scope="row">Auto-generate Alt Text</th>
                        <td>
                            <input type="checkbox" name="alt_magic_auto_generate" class="alt-magic-setting" <?php checked(!empty($options['alt_magic_auto_generate'])); ?>> Automatically generate alt text when new images are added
                            <p class="alt-magic-setting-sub-label">Note: It will automatically generate alt text for all images added to your website.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Alt Text Language</th>
                        <td>
                            <select name="alt_magic_language" class="alt-magic-setting">
                                <?php 
                                if (isset($altm_supported_languages) && is_array($altm_supported_languages)) {
                                    foreach ($altm_supported_languages as $code => $language): 
                                ?>
                                    <option value="<?php echo esc_attr($code); ?>" <?php selected($options['alt_magic_language'], $code); ?>><?php echo esc_html($language); ?></option>
                                <?php 
                                    endforeach;
                                } else {
                                    echo '<option value="">No languages available</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Use generated alt text for other fields</th>
                        <td>
                            <p class="alt-magic-setting-label"><input type="checkbox" name="alt_magic_use_for_title" class="alt-magic-setting" <?php checked(!empty($options['alt_magic_use_for_title'])); ?>> Use same alt text value for image title</p>
                            <p class="alt-magic-setting-label"><input type="checkbox" name="alt_magic_use_for_caption" class="alt-magic-setting" <?php checked(!empty($options['alt_magic_use_for_caption'])); ?>> Use same alt text value for image caption</p>
                            <p class="alt-magic-setting-label"><input type="checkbox" name="alt_magic_use_for_description" class="alt-magic-setting" <?php checked(!empty($options['alt_magic_use_for_description'])); ?>> Use same alt text value for image description</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Add hardcoded string to beginning of alt text</th>
                        <td>
                            <input type="text" name="alt_magic_prepend_string" class="alt-magic-setting" value="<?php echo esc_attr($options['alt_magic_prepend_string']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Add hardcoded string to end of alt text</th>
                        <td>
                            <input type="text" name="alt_magic_append_string" class="alt-magic-setting" value="<?php echo esc_attr($options['alt_magic_append_string']); ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">Use SEO Keywords</th>
                        <td>
                            <input type="checkbox" name="alt_magic_use_seo_keywords" class="alt-magic-setting" <?php checked(!empty($options['alt_magic_use_seo_keywords'])); ?>> Use Yoast SEO focus keyphrases for generating alt text
                            <p class="alt-magic-setting-sub-label">Note: This will be ignored if no keyphrases are found.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Use Post Title as Keywords</th>
                        <td>
                            <input type="checkbox" name="alt_magic_use_post_title" class="alt-magic-setting" <?php checked(!empty($options['alt_magic_use_post_title'])); ?>> Use post title as keywords if SEO keywords not found
                            <p class="alt-magic-setting-sub-label">Note: Image should be linked to a post for using post title as context.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Update Alt Texts in Posts</th>
                        <td>
                            <select name="alt_magic_refresh_alt_text" class="alt-magic-setting">
                                <option value="empty" <?php selected($options['alt_magic_refresh_alt_text'], 'empty'); ?>>Only in the posts where the image alt text is empty</option>
                                <option value="all" <?php selected($options['alt_magic_refresh_alt_text'], 'all'); ?>>For all posts, even if the image alt text is already filled.</option>
                            </select>
                        </td>
                    </tr>
                    
                    <?php if(is_plugin_active('woocommerce/woocommerce.php')): ?>
                    <tr>
                        <th scope="row">WooCommerce Settings</th>
                        <td>
                            <input type="checkbox" name="alt_magic_woocommerce_use_product_name" class="alt-magic-setting" <?php checked(!empty($options['alt_magic_woocommerce_use_product_name'])); ?>> Use product name for generating alt text
                            <p class="alt-magic-setting-sub-label">Note: Using product name will use the product name to generate more accurate alt text for product images.</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th scope="row">Site Visibility</th>
                        <td>
                            <input type="checkbox" name="alt_magic_private_site" class="alt-magic-setting" <?php checked(!empty($options['alt_magic_private_site'])); ?>> My site is private
                            <p class="alt-magic-setting-sub-label">Note: If your site is unreachable to public, please check this option.</p>
                        </td>
                    </tr>
                </table>
            </form>
            <div id="alt-magic-settings-message"></div>
        </div>
    </div>


    <?php
}

// Add this function to handle the AJAX request
function alt_magic_save_settings() {
    // Check nonce for security
    check_ajax_referer('alt_magic_save_settings', 'nonce');

    // Check user capabilities
    if (!current_user_can('manage_options')) {
        wp_send_json_error('You do not have permission to perform this action.');
        return;
    }

    // Check if the POST variables are set
    if (!isset($_POST['key']) || !isset($_POST['value'])) {
        wp_send_json_error('Invalid request.');
        return;
    }

    // Unslash and sanitize the POST variables
    $key = sanitize_text_field(wp_unslash($_POST['key']));
    $value = sanitize_text_field(wp_unslash($_POST['value']));


    // also send a request to /update-user-details-wordpress if the language is changed
    if ($key === 'alt_magic_language') {

        $user_id = get_option('alt_magic_user_id');
        $api_key = get_option('alt_magic_api_key');
        $url = ALT_MAGIC_API_BASE_URL . '/update-user-details-wp';
        $data = array(
            'user_id' => $user_id,
            'language' => $value
        );
        $response = wp_remote_post($url, array(
            'method' => 'POST',
            'headers' => array(
                'Content-Type' => 'application/json', 
                'Authorization' => 'Bearer ' . $api_key
            ),
                'body' => json_encode($data)
        ));
    
        if ($response['response']['code'] === 200) {
            // Update the language option
            $updated = update_option($key, $value);
            if ($updated) {
                wp_send_json_success('Setting updated successfully.');
            } else {
                wp_send_json_error('Failed to update setting');
            }
        } else if ($response['response']['code'] === 403) {
            wp_send_json_error('Invalid API key detected. Please check your API key.');
        } else {
            wp_send_json_error('Failed to update setting. Please contact support.');
        }
    }
    else {
        // Update the individual option
        $updated = update_option($key, $value);
        if ($updated) {
            wp_send_json_success('Setting updated successfully.');
        } else {
            wp_send_json_error('Failed to update setting');
        }
    }
    
}

add_action('wp_ajax_alt_magic_save_settings', 'alt_magic_save_settings');