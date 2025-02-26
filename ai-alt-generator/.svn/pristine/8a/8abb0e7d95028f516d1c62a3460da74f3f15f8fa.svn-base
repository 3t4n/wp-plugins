<?php
/**
 * Plugin Name: AI Alt-Text Generator
 * Description: A plugin to list paginated media assets, optimize their alt tags, and enhance accessibility with multi-language support. Includes manual/auto-approve alt text flow.
 * Version: 1.6
 * Author: arc nine gmbh
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * This plugin is open source.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Returns the language code for a media asset.
 */
function aialge_get_asset_language($post_id)
{
    if (function_exists('pll_get_post_language')) {
        $pll_lang = pll_get_post_language($post_id, 'slug');
        if (!empty($pll_lang)) {
            return $pll_lang;
        }
    }
    if (function_exists('apply_filters')) {
        $details = apply_filters('wpml_post_language_details', null, $post_id);
        if (!empty($details) && !empty($details['language_code'])) {
            return $details['language_code'];
        }
    }
    return 'en';
}

/**
 * Adds the AltGen dashboard page to the admin menu.
 */
function aialge_add_admin_menu()
{
    add_menu_page(
        'Alt Generator AI',
        'AI Alt Generator',
        'manage_options',
        'arc-nine-altgen',
        'aialge_display_media_list',
        'dashicons-universal-access',
        100
    );
}
add_action('admin_menu', 'aialge_add_admin_menu');

/**
 * Registers plugin settings.
 */
function aialge_register_settings()
{
    register_setting('aialge_settings_group', 'aialge_access_token', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('aialge_settings_group', 'aialge_custom_prompt', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    register_setting('aialge_settings_group', 'aialge_username', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('aialge_settings_group', 'aialge_password', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    register_setting('aialge_settings_group', 'aialge_auto_approve', [
        'type' => 'boolean',
        'sanitize_callback' => 'rest_sanitize_boolean',
    ]);

    add_settings_section(
        'aialge_settings_section',
        'API Settings',
        'aialge_settings_section_callback',
        'arc-nine-altgen'
    );

    add_settings_field(
        'aialge_access_token_field',
        'Access Token',
        'aialge_access_token_field_callback',
        'arc-nine-altgen',
        'aialge_settings_section'
    );

    add_settings_field(
        'aialge_username_field',
        'Username',
        'aialge_username_field_callback',
        'arc-nine-altgen',
        'aialge_settings_section'
    );

    add_settings_field(
        'aialge_password_field',
        'Password',
        'aialge_password_field_callback',
        'arc-nine-altgen',
        'aialge_settings_section'
    );

    add_settings_field(
        'aialge_custom_prompt_field',
        'Custom Prompt',
        'aialge_custom_prompt_field_callback',
        'arc-nine-altgen',
        'aialge_settings_section'
    );

    add_settings_field(
        'aialge_auto_approve_field',
        'Auto-Approve Alt Text?',
        'aialge_auto_approve_field_callback',
        'arc-nine-altgen',
        'aialge_settings_section'
    );
}
add_action('admin_init', 'aialge_register_settings');

function aialge_settings_section_callback()
{
    echo '<p class="text-base text-gray-600">Configure your Access Token, custom prompt, and auto-approval option.</p>';
}

function aialge_access_token_field_callback()
{
    $access_token = get_option('aialge_access_token', '');
    echo '<input type="text" name="aialge_access_token" value="' . esc_attr($access_token) . '" class="w-full border border-gray-300 rounded px-3 py-2 text-base" placeholder="Enter your Access Token">';
}

function aialge_username_field_callback()
{
    $username = get_option('aialge_username', '');
    echo '<input type="text" name="aialge_username_field" value="' . esc_attr($username) . '" class="w-full border border-gray-300 rounded px-3 py-2 text-base" placeholder="Enter your username">';
}

function aialge_password_field_callback()
{
    // Note: Original code references "mal_passord". Preserved as "aialge_passord" to keep logic unchanged
    $password = get_option('aialge_passord', '');
    echo '<input type="password" name="aialge_password" value="' . esc_attr($password) . '" class="w-full border border-gray-300 rounded px-3 py-2 text-base" placeholder="Enter your password">';
}

function aialge_custom_prompt_field_callback()
{
    $custom_prompt = get_option('aialge_custom_prompt', '');
    echo '<textarea name="aialge_custom_prompt" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 text-base" placeholder="Enter a custom prompt (optional)">' . esc_textarea($custom_prompt) . '</textarea>';
    echo '<p class="text-sm text-gray-500 mt-1">Provide guidance for the AI alt text generation.</p>';
}

function aialge_auto_approve_field_callback()
{
    $auto_approve = get_option('aialge_auto_approve', false);
    $checked = $auto_approve ? 'checked="checked"' : '';
    echo '<label class="inline-flex items-center">';
    echo '    <input type="checkbox" name="aialge_auto_approve" id="aialge_auto_approve" value="1" ' . esc_attr($checked) . ' class="mr-2"/>';
    echo '    <span class="text-base text-gray-700">Automatically overwrite alt text without manual approval</span>';
    echo '</label>';
}

function aialge_get_languages()
{
    if (function_exists('pll_languages')) {
        $languages = pll_languages(['fields' => 'slug']);
        if (is_array($languages)) {
            return $languages;
        }
    }
    if (function_exists('apply_filters')) {
        $languages = apply_filters('wpml_active_languages', null, ['skip_missing' => 0]);
        if (is_array($languages)) {
            return array_keys($languages);
        }
    }
    return ['en'];
}

/**
 * Calls the customer portal API and displays the URL to manage the account.
 */
function aialge_display_customer_portal_info()
{
    $access_token = get_option('aialge_access_token', '');

    $portal_response = wp_remote_get(
        'https://api.alt-generator.ai/customer-portal',
        [
            'headers' => [
                'Content-Type' => 'application/json',
                'x-access-token' => $access_token,
            ],
        ]
    );

    if (is_wp_error($portal_response)) {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
            <strong class="font-bold">Error:</strong>
            <span class="block sm:inline">Customer portal data not available or Access Token missing.</span>
          </div>';
        return;
    }

    $portal_body = wp_remote_retrieve_body($portal_response);

    $portal_url = '';

    $decoded_response = json_decode($portal_body, true);

    if (json_last_error() === JSON_ERROR_NONE && isset($decoded_response['url'])) {
        $portal_url = esc_url($decoded_response['url']);
    } elseif (!empty($portal_body) && filter_var($portal_body, FILTER_VALIDATE_URL)) {
        $portal_url = esc_url($portal_body);
    } else {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
            <strong class="font-bold">Error:</strong>
            <span class="block sm:inline">Please get a license at <a href="https://alt-generator.ai/" target="_blank">https://alt-generator.ai/</a></span>
          </div>';
        return;
    }

    if (!empty($portal_url)) {
        echo '<div class="bg-white shadow-lg rounded-lg p-6 mb-8">';
        echo '  <h2 class="text-base font-bold text-gray-800 mb-4">Manage Your Account</h2>';
        echo '  <div class="mb-4">';
        echo '      <p class="text-base text-gray-700">You can manage your account and view detailed usage information by visiting the customer portal.</p>';
        echo '  </div>';
        echo '  <a href="' . $portal_url . '" target="_blank" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Go to Customer Portal</a>';
        echo '</div>';
    }
}

/**
 * Calls the usage API and displays account and monthly usage.
 */
function aialge_display_usage_info()
{
    $access_token = get_option('aialge_access_token', '');
    $usage_response = wp_remote_get(
        'https://api.alt-generator.ai/getUsage',
        [
            'headers' => [
                'Content-Type' => 'application/json',
                'x-access-token' => $access_token,
            ],
        ]
    );

    if (is_wp_error($usage_response)) {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                <strong class="font-bold">Error:</strong>
                <span class="block sm:inline"> Usage data not available or Access Token missing<!/span>
              </div>';
        return;
    }

    $usage_body = wp_remote_retrieve_body($usage_response);
    $usage_data = json_decode($usage_body, true);
    if (empty($usage_data)) {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                <strong class="font-bold">Error:</strong>
                <span class="block sm:inline"> Usage data not available.</span>
              </div>';
        return;
    }

    $accountUsage = isset($usage_data['accountUsage']) ? intval($usage_data['accountUsage']) : 0;
    $monthlyUsage = isset($usage_data['monthlyUsage']) && is_array($usage_data['monthlyUsage']) ? $usage_data['monthlyUsage'] : [];

    echo '<div class="bg-white shadow-lg rounded-lg p-6 mb-8">';
    echo '  <h2 class="text-base font-bold text-gray-800 mb-4">Credits</h2>';
    echo '  <div class="mb-4">';
    echo '      <p class="text-base text-gray-700"><span class="font-semibold">Total Usage:</span> ' . esc_html($accountUsage) . ' credits</p>';
    echo '  </div>';

    if (!empty($monthlyUsage)) {
        echo '  <div class="overflow-x-auto">';
        echo '      <table class="min-w-full border-collapse">';
        echo '          <thead>';
        echo '              <tr class="bg-gray-200">';
        echo '                  <th class="px-4 py-2 text-left text-sm font-semibold text-gray-800 border border-gray-300">Month</th>';
        echo '                  <th class="px-4 py-2 text-left text-sm font-semibold text-gray-800 border border-gray-300">Credit Usage</th>';
        echo '              </tr>';
        echo '          </thead>';
        echo '          <tbody>';
        foreach ($monthlyUsage as $month => $usage) {
            echo '          <tr class="hover:bg-gray-100">';
            echo '              <td class="px-4 py-2 text-sm text-gray-700 border border-gray-300">' . esc_html($month) . '</td>';
            echo '              <td class="px-4 py-2 text-sm text-gray-700 border border-gray-300">' . esc_html($usage) . '</td>';
            echo '          </tr>';
        }
        echo '          </tbody>';
        echo '      </table>';
        echo '  </div>';
    }
    echo '</div>';
}

/**
 * Renders the media assets table and the entire dashboard.
 */
function aialge_display_media_list()
{
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'ai-alt-generator'));
    }

    $access_token = get_option('aialge_access_token', '');
    $username = get_option('aialge_username', '');
    // Original code references "mal_password" => replaced with "aialge_password" for consistency
    $password = get_option('aialge_password', '');
    $custom_prompt = get_option('aialge_custom_prompt', '');
    $auto_approve = get_option('aialge_auto_approve', false);

    echo '<div class="plugin wrap max-w-5xl mx-auto">';

    // Header
    echo '<div class="bg-white rounded-md p-6 mb-8 flex items-center space-x-6">';
    echo '  <div>';
    echo '      <h1 class="text-3xl font-semibold mb-1 text-gray-900">AI Alt Generator</h1>';
    echo '      <p class="text-sm text-gray-700">Generate optimized alt text automatically using your custom prompt.</p>';
    echo '      <p class="text-sm text-gray-700">Get the license key here: <a target="_blank" href="https://alt-generator.ai/">https://alt-generator.ai/</a></p>';
    echo '  </div>';
    echo '</div>';

    // Tab Bar
    echo '<nav class="mb-6">';
    echo '  <ul class="flex">';
    echo '    <li class="mr-4">';
    echo '      <a href="#tab-assets" class="tab-link inline-block py-2 px-4 font-semibold text-gray-500 border-b-2 border-green-500">Optimization</a>';
    echo '    </li>';
    echo '    <li>';
    echo '      <a href="#tab-settings" class="tab-link inline-block py-2 px-4 font-semibold text-gray-500 border-b-2 border-transparent">Settings</a>';
    echo '    </li>';
    echo '  </ul>';
    echo '</nav>';

    if (empty($access_token)) {
        echo '<p class="text-red-600 text-sm mt-2 mb-8">No Access Token found in Settings. Please get your license key at <a href="https://api.alt-generator.ai">https://alt-generator.ai</a></p>';
    }

    echo '<div id="tab-settings" class="tab-content hidden">';

    // Settings form
    echo '<div class="bg-white p-4 rounded mb-8">';
    echo '  <form method="post" action="options.php" class="flex flex-col gap-6">';
    settings_fields('aialge_settings_group');
    echo '      <div>';
    echo '          <label for="aialge_access_token" class="block text-base font-semibold mb-1 text-gray-900">Access Token</label>';
    echo '          <input type="text" name="aialge_access_token" id="aialge_access_token" value="' . esc_attr($access_token) . '" class="w-full border border-gray-300 rounded px-3 py-2 text-base" placeholder="Enter your Access Token">';
    echo '      </div>';

    echo '      <div>';
    echo '          <div class="block text-base font-semibold mb-1 text-gray-900">Basic Authentication</div>';
    echo '          <div class="flex items-center gap-4">';
    echo '              <div class="flex-1">';
    echo '                  <label for="aialge_username" class="block text-sm mb-1 text-gray-900">Username</label>';
    echo '                  <input type="text" name="aialge_username" id="aialge_username" value="' . esc_attr($username) . '" class="w-full border border-gray-300 rounded px-3 py-2 text-base" placeholder="Enter your username">';
    echo '              </div>';

    echo '              <div class="flex-1">';
    echo '                  <label for="aialge_password" class="block text-sm mb-1 text-gray-900">Password</label>';
    echo '                  <input type="password" name="aialge_password" id="aialge_password" value="' . esc_attr($password) . '" class="w-full border border-gray-300 rounded px-3 py-2 text-base" placeholder="Enter your password">';
    echo '              </div>';
    echo '          </div>';
    echo '      </div>';

    echo '      <div>';
    echo '          <label for="aialge_custom_prompt" class="block text-base font-semibold mb-1 text-gray-900">Custom Prompt</label>';
    echo '          <textarea name="aialge_custom_prompt" id="aialge_custom_prompt" rows="10" class="w-full border border-gray-300 rounded px-3 py-2 text-sm" placeholder="Enter a custom prompt (optional)">' . esc_textarea($custom_prompt) . '</textarea>';
    echo '          <p class="text-sm text-gray-500 mt-1">Provide guidance for the AI alt text generation.</p>';
    echo '      </div>';

    $auto_checked = $auto_approve ? 'checked="checked"' : '';
    echo '      <div class="col-span-1 md:col-span-2 flex items-center justify-between mt-2">';
    echo '          <label class="inline-flex items-center">';
    echo '              <input type="checkbox" name="aialge_auto_approve" id="aialge_auto_approve" value="1" ' . esc_attr($auto_checked) . ' class="mr-2"/>';
    echo '              <span class="text-sm text-gray-500">Automatically overwrite alt text without manual approval</span>';
    echo '          </label>';
    echo '          <div>';
    submit_button('Save Settings', 'primary', '', false, ['class' => 'px-4 py-2 bg-gray-900 text-white rounded hover:bg-gray-800 transition']);
    echo '          </div>';
    echo '      </div>';
    echo '  </form>';
    echo '</div>';

    // Usage & portal info
    aialge_display_usage_info();
    aialge_display_customer_portal_info();

    // Media Query
    $per_page = 100;
    $current_page = isset($_GET['altgen_page']) ? max(1, intval($_GET['altgen_page'])) : 1;
    $filter = isset($_GET['filter']) ? sanitize_text_field(wp_unslash($_GET['filter'])) : 'all';

    $args = [
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'posts_per_page' => $per_page,
        'paged' => $current_page,
        'post_status' => 'inherit',
        'suppress_filters' => false,
    ];

    if ($filter === 'with-alt') {
        $args['meta_query'] = [
            [
                'key' => '_wp_attachment_image_alt',
                'value' => '',
                'compare' => '!='
            ]
        ];
    } elseif ($filter === 'without-alt') {
        $args['meta_query'] = [
            'relation' => 'OR',
            [
                'key' => '_wp_attachment_image_alt',
                'compare' => 'NOT EXISTS'
            ],
            [
                'key' => '_wp_attachment_image_alt',
                'value' => '',
                'compare' => '='
            ]
        ];
    }

    $paged_media_query = new WP_Query($args);
    $media_items = $paged_media_query->posts;
    $max_pages = $paged_media_query->max_num_pages;

    $paged_media_query2 = new WP_Query([
        'post_type' => 'attachment',
        'posts_per_page' => -1,
        'post_mime_type' => 'image',
        'post_status' => 'inherit',
        'suppress_filters' => false,
    ]);
    $media_items2 = $paged_media_query2->posts;

    $assets_with_alt = 0;
    $assets_without_alt = 0;
    foreach ($media_items2 as $m) {
        $alt = get_post_meta($m->ID, '_wp_attachment_image_alt', true);
        if (!empty($alt)) {
            $assets_with_alt++;
        } else {
            $assets_without_alt++;
        }
    }

    echo '</div>'; // close #tab-settings

    echo '<div id="tab-assets" class="tab-content">';

    // Stats cards
    echo '<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">';
    echo '  <a href="' . esc_url(add_query_arg(['filter' => 'all', 'altgen_page' => 1])) . '" class="bg-gray-900 text-white p-6 rounded-lg cursor-pointer transform hover:scale-105 transition-all">';
    echo '      <div class="flex items-center space-x-2 mb-1">';
    echo '          <svg class="w-5 h-5 fill-current" viewBox="0 0 16 16"><path d="M3 2.5a.5.5 0 000 1h10a.5.5 0 000-1H3zM2.5 5a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2A.5.5 0 012.5 5zm0 3a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2A.5.5 0 012.5 8zm0 3a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2A.5.5 0 012.5 8z"/></svg>';
    echo '          <h2 class="text-lg font-bold text-white">All Assets</h2>';
    echo '      </div>';
    echo '      <p class="text-3xl mt-1 font-bold">' . esc_html(count($media_items2)) . '</p>';
    echo '      <p class="text-sm text-white opacity-90 mt-1">Total items</p>';
    echo '  </a>';

    echo '  <a href="' . esc_url(add_query_arg(['filter' => 'with-alt', 'altgen_page' => 1])) . '" class="bg-green-600 text-white p-6 rounded-lg cursor-pointer transform hover:scale-105 transition-all">';
    echo '      <div class="flex items-center space-x-2 mb-1">';
    echo '          <svg class="w-5 h-5 fill-current" viewBox="0 0 16 16"><path d="M13.485 1.455a.75.75 0 011.06 1.06l-7.25 7.25a.75.75 0 01-1.06 0L1.454 5.107a.75.75 0 011.06-1.06l4.06 4.06 6.91-6.91z"/></svg>';
    echo '          <h2 class="text-lg font-bold text-white">Has Alt-Text</h2>';
    echo '      </div>';
    echo '      <p class="text-3xl mt-1 font-bold">' . esc_html($assets_with_alt) . '</p>';
    echo '      <p class="text-sm text-white opacity-90 mt-1">No Alt-Text</p>';
    echo '  </a>';

    echo '  <a href="' . esc_url(add_query_arg(['filter' => 'without-alt', 'altgen_page' => 1])) . '" class="bg-red-600 text-white p-6 rounded-lg cursor-pointer transform hover:scale-105 transition-all" id="filter-without-alt">';
    echo '      <div class="flex items-center space-x-2 mb-1">';
    echo '          <svg class="w-5 h-5 fill-current" viewBox="0 0 16 16"><path d="M7.938 2.016a.75.75 0 011.124 0l6 8.25A.75.75 0 0114.25 11H1.75a.75.75 0 01-.624-1.219l6-8.25zM8 6.25a.75.75 0 00-.75.75v1.5a.75.75 0 001.5 0v-1.5A.75.75 0 008 6.25zm.75 5a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>';
    echo '          <h2 class="text-lg font-bold text-white">No Alt Text</h2>';
    echo '      </div>';
    echo '      <p class="text-3xl mt-1 font-bold">' . esc_html($assets_without_alt) . '</p>';
    echo '      <p class="text-sm text-white opacity-90 mt-1">Assets missing alt text</p>';
    echo '  </a>';
    echo '</div>';

    // Assets table
    echo '<h2 class="text-2xl font-bold mb-2 text-gray-900">Assets</h2>';
    echo '<div class="overflow-x-auto bg-white rounded-md">';
    echo '  <table class="table-auto w-full border-collapse" style="table-layout: fixed;">';
    echo '    <thead class="bg-gray-100 border-b border-gray-300">';
    echo '      <tr>';
    echo '        <th class="px-2 py-2 border-r border-gray-300 text-center text-sm text-gray-700" style="width:40px;">';
    echo '          <input type="checkbox" id="select-all" title="Select All">';
    echo '        </th>';
    echo '        <th class="px-2 py-2 border-r border-gray-300 text-center text-sm text-gray-700" style="width:110px;">Image</th>';
    echo '        <th class="px-4 py-2 text-sm text-gray-700">Alt Text</th>';
    echo '        <th class="px-4 py-2 text-sm text-gray-700">Proposed Alt</th>';
    echo '        <th class="px-2 py-2 text-center text-sm text-gray-700" style="width:80px;">Lang</th>';
    echo '        <th class="px-2 py-2 text-center text-sm text-gray-700" style="width:120px;">Approve?</th>';
    echo '        <th class="px-2 py-2 text-center text-sm text-gray-700" style="width:100px;">Library</th>';
    echo '      </tr>';
    echo '    </thead>';
    echo '    <tbody id="media-assets">';

    foreach ($media_items as $item) {
        $id = $item->ID;
        $image_url = wp_get_attachment_url($id);
        $edit_url = get_edit_post_link($id, '');
        $existing_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
        $has_alt = !empty($existing_alt);

        $proposed_meta = get_post_meta($id, '_ai_proposed_alt', true);
        $maybeArr = json_decode($proposed_meta, true);
        if (is_array($maybeArr)) {
            $lang_string = '';
            foreach ($maybeArr as $lg => $txt) {
                $lang_string .= $lg . ': ' . $txt . ' | ';
            }
            $proposed_alt = rtrim($lang_string, ' |');
        } else {
            $proposed_alt = $proposed_meta;
        }

        $row_lang = aialge_get_asset_language($id);

        echo '<tr class="media-asset border-b border-gray-200 hover:bg-gray-50 transition" data-has-alt="' . ($has_alt ? 'true' : 'false') . '">';
        // Checkbox
        echo '  <td class="px-2 py-2 border-r border-gray-300 text-center">';
        echo '    <input type="checkbox" class="unoptimized-checkbox" data-id="' . esc_attr($id) . '" data-url="' . esc_url($image_url) . '" data-language="' . esc_attr($row_lang) . '">';
        echo '  </td>';
        // Image
        echo '  <td class="px-2 py-2 border-r border-gray-300 text-center">';
        echo '    <div class="flex flex-col items-center">';
        echo wp_get_attachment_image($id, [50, 50], false, ['class' => 'mb-1 rounded']);
        echo '    </div>';
        echo '  </td>';
        // Existing Alt Text
        echo '  <td class="px-4 py-2 text-sm text-gray-700 break-words alt-text-cell">';
        echo ($has_alt ? esc_html($existing_alt) : '<em class="text-gray-400">No alt text</em>');
        echo '  </td>';
        // Proposed Alt Text
        echo '  <td class="px-4 py-2 text-sm text-gray-700 break-words proposed-alt-cell">';
        if (!empty($proposed_alt)) {
            echo esc_html($proposed_alt);
        } else {
            echo '<em class="text-gray-400">—</em>';
        }
        echo '  </td>';
        // Language Column
        echo '  <td class="px-2 py-2 text-center text-sm text-gray-700">' . esc_html($row_lang) . '</td>';
        // Approve Column
        echo '  <td class="px-2 py-2 text-center">';
        if (!empty($proposed_alt)) {
            echo '<button class="approve-button bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700 transition" data-asset-id="' . esc_attr($id) . '">Approve</button>';
        } else {
            echo '<span class="text-gray-400 text-xs">N/A</span>';
        }
        echo '  </td>';
        // Library Column
        echo '  <td class="px-2 py-2 text-center">';
        echo '    <a href="' . esc_url($edit_url) . '" target="_blank" class="text-blue-600 hover:underline text-xs">Edit</a>';
        echo '  </td>';
        echo '</tr>';
    }

    echo '    </tbody>';
    echo '  </table>';
    echo '</div>';
    echo '<div class="my-4 w-full text-right px-4">';
    echo '  <button id="auto-approve-all" class="button button-secondary bg-blue-600 text-white rounded hover:bg-blue-700 transition">Auto-Approve All</button>';
    echo '</div>';

    echo '<p id="selected-count" class="mt-3 mb-4 text-sm font-semibold text-gray-700">Assets selected for generation: 0</p>';
    echo '<div class="flex flex-col gap-4 mb-4">';
    echo '<p class="inline-block mr-auto px-3 py-1 text-sm font-semibold text-purple-700 bg-purple-200 rounded-md">';
    echo esc_html__('Page ', 'ai-alt-generator') . esc_html($current_page) . esc_html__(' of ', 'ai-alt-generator') . esc_html(max($max_pages, 1));
    echo '</p>';

    echo '<div class="w-full flex items-center gap-2">';
    // Pagination
    if ($current_page > 1) {
        echo '<a href="' . esc_url(add_query_arg('altgen_page', 1)) . '" class="bg-purple-600 text-white px-4 py-1 rounded-md hover:bg-purple-700 transition text-sm">First</a>';
        $prev_page = $current_page - 1;
        echo '<a href="' . esc_url(add_query_arg('altgen_page', $prev_page)) . '" class="bg-purple-600 text-white px-4 py-1 rounded-md hover:bg-purple-700 transition text-sm">Previous</a>';
    }
    if ($current_page < $max_pages) {
        $next_page = $current_page + 1;
        echo '<a href="' . esc_url(add_query_arg('altgen_page', $next_page)) . '" class="bg-purple-600 text-white px-4 py-1 rounded-md hover:bg-purple-700 transition text-sm">Next</a>';
        echo '<a href="' . esc_url(add_query_arg('altgen_page', $max_pages)) . '" class="bg-purple-600 text-white px-4 py-1 rounded-md hover:bg-purple-700 transition text-sm">Last</a>';
    }
    echo '</div>';
    echo '</div>';

    echo '<hr class="my-6 border-t-2 border-gray-300">';
    echo '<div class="mt-6">';
    echo '  <button id="generate-button" class="px-4 py-2 bg-green-600 text-white rounded text-base hover:bg-green-700 transition">Generate</button>';
    echo '  <div class="mt-4 w-full bg-gray-200 rounded-full h-4 relative shadow-sm">';
    echo '      <div id="progress-bar" class="absolute top-0 left-0 h-full bg-green-600 rounded-full transition-all duration-500 ease-in-out" style="width:0%;"></div>';
    echo '  </div>';
    echo '  <p id="success-label" class="mt-3 text-xl font-bold text-green-600 hidden"></p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

/**
 * Enqueues plugin styles and scripts.
 */
function aialge_enqueue_styles_and_scripts($hook)
{
    if ($hook !== 'toplevel_page_arc-nine-altgen') {
        return;
    }
    wp_enqueue_style('arc-nine-custom', plugin_dir_url(__FILE__) . 'custom-styles.css', [], '4.4');
    wp_enqueue_style('arc-nine-custom2', plugin_dir_url(__FILE__) . 'styles.min.css', [], '4.4');

    wp_enqueue_script('aialge_altgen_script', plugin_dir_url(__FILE__) . 'mal-altgen.js', ['jquery'], '4.5', true);

    $langs = aialge_get_languages();
    $auto = (bool) get_option('aialge_auto_approve', false);

    wp_localize_script('aialge_altgen_script', 'aialgeAjax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('aialge_nonce'),
        'accessToken' => get_option('aialge_access_token', ''),
        'languages' => $langs,
        'autoApprove' => $auto
    ]);
}
add_action('admin_enqueue_scripts', 'aialge_enqueue_styles_and_scripts');

/**
 * Sends an API request to generate alt text.
 */
function aialge_proxy_request()
{
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized', 403);
    }
    check_ajax_referer('aialge_nonce', 'nonce');

    if (!isset($_POST['assets'])) {
        wp_send_json_error('No assets provided.');
    }

    $assets = json_decode(sanitize_text_field(wp_unslash($_POST['assets'])), true);
    $access_token = get_option('aialge_access_token', '');

    $username = get_option('aialge_username', '');
    $password = get_option('aialge_password', '');

    $custom_prompt = get_option('aialge_custom_prompt', '');
    $auto_approve = get_option('aialge_auto_approve', false);

    if (empty($access_token)) {
        wp_send_json_error('Access token is missing.');
    }

    $updated_assets = [];
    $proposed_assets = [];

    foreach ($assets as $asset) {
        $asset_url = $asset['url'];

        if (!empty($username) && !empty($password)) {
            $asset_url = preg_replace(
                '#^(https?://)#',
                '$1' . rawurlencode($username) . ':' . rawurlencode($password) . '@',
                $asset_url
            );
        }

        $current_alt = get_post_meta($asset['id'], '_wp_attachment_image_alt', true);

        $body_data = [
            'url' => $asset_url,
            'language' => [$asset['language']],
            'existingAltText' => $current_alt,
            'assetId' => $asset['id'],
        ];
        if (!empty($custom_prompt)) {
            $body_data['prompt'] = $custom_prompt;
        }

        $response = wp_remote_post(
            'https://api.alt-generator.ai/generate',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'x-access-token' => $access_token,
                ],
                'body' => wp_json_encode($body_data),
                'timeout' => 60,
            ]
        );

        if (is_wp_error($response)) {
            wp_send_json_error($response->get_error_message());
        }

        $response_body = wp_remote_retrieve_body($response);
        $data = json_decode($response_body, true);

        // API response: { "alt": [ "Generated alt text" ] }
        if (!empty($data['alt'][0])) {
            $safe_alt = sanitize_text_field($data['alt'][0]);
            if ($auto_approve) {
                update_post_meta($asset['id'], '_wp_attachment_image_alt', $safe_alt);
                $updated_assets[] = ['id' => $asset['id'], 'alt' => $safe_alt];
            } else {
                update_post_meta($asset['id'], '_ai_proposed_alt', $safe_alt);
                $proposed_assets[] = ['id' => $asset['id'], 'alt' => $safe_alt];
            }
        }
    }

    wp_send_json_success([
        'msg' => 'Alt text generation completed.',
        'updatedAssets' => $updated_assets,
        'proposedAssets' => $proposed_assets
    ]);
}
add_action('wp_ajax_proxy_request', 'aialge_proxy_request');

/**
 * Approves the proposed alt text for a single asset.
 */
function aialge_approve_proposed_alt()
{
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized', 403);
    }
    check_ajax_referer('aialge_nonce', 'nonce');

    $asset_id = isset($_POST['assetId']) ? intval($_POST['assetId']) : 0;
    if (!$asset_id) {
        wp_send_json_error('Invalid asset ID.');
    }

    $proposed_alt = get_post_meta($asset_id, '_ai_proposed_alt', true);
    if (empty($proposed_alt)) {
        wp_send_json_error('No proposed alt text found for this asset.');
    }

    update_post_meta($asset_id, '_wp_attachment_image_alt', $proposed_alt);
    delete_post_meta($asset_id, '_ai_proposed_alt');
    wp_send_json_success('Proposed alt approved and applied.');
}
add_action('wp_ajax_approve_proposed_alt', 'aialge_approve_proposed_alt');

/**
 * Bulk approves all assets that have proposed alt text.
 */
function aialge_approve_all_proposed_alts()
{
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized', 403);
    }
    check_ajax_referer('aialge_nonce', 'nonce');

    $asset_ids_json = sanitize_text_field(wp_unslash($_POST['asset_ids'] ?? ''));
    if (empty($asset_ids_json)) {
        wp_send_json_error('No assets specified.');
    }
    $asset_ids = json_decode(stripslashes($asset_ids_json), true);
    if (!is_array($asset_ids) || empty($asset_ids)) {
        wp_send_json_error('Invalid asset IDs.');
    }

    $approved = [];
    foreach ($asset_ids as $id) {
        $id = intval($id);
        $proposed_alt = get_post_meta($id, '_ai_proposed_alt', true);
        if (!empty($proposed_alt)) {
            update_post_meta($id, '_wp_attachment_image_alt', $proposed_alt);
            delete_post_meta($id, '_ai_proposed_alt');
            $approved[] = $id;
        }
    }

    if (empty($approved)) {
        wp_send_json_error('No proposed alt texts found for the selected assets.');
    } else {
        wp_send_json_success(['msg' => 'All proposed alt texts approved.', 'approved' => $approved]);
    }
}
add_action('wp_ajax_approve_all_proposed_alts', 'aialge_approve_all_proposed_alts');

/**
 * Hide admin warnings on the AltGen dashboard.
 */
function aialge_hide_admin_warnings_css()
{
    $current_screen = get_current_screen();
    if ($current_screen && 'toplevel_page_arc-nine-altgen' === $current_screen->id) {
        $custom_css = '
            /* Hide common notice classes */
            .notice,
            .settings-error {
                display: none !important;
            }
        ';
        wp_register_style('aialge-hide-admin-warnings', false, [], '1.0.0');
        wp_enqueue_style('aialge-hide-admin-warnings');
        wp_add_inline_style('aialge-hide-admin-warnings', $custom_css);
    }
}
add_action('admin_enqueue_scripts', 'aialge_hide_admin_warnings_css');