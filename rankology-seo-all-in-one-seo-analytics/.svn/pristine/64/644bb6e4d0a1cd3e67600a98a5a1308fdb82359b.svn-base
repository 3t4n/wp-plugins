<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_fno_sanitize_options_fields($input){
    $rankology_fno_sanitize_fields = [
        'rankology_404_redirect_custom_url',
        'rankology_404_enable_mails_from',
        'rankology_news_name',
        'rankology_htaccess_file',
        'rankology_google_analytics_auth_secret_id',
        'rankology_google_analytics_auth_client_id',
        'rankology_bot_scan_settings_timeout',
        'rankology_bot_scan_settings_number',
        'rankology_local_business_street_address',
        'rankology_local_business_address_locality',
        'rankology_local_business_address_region',
        //'rankology_local_business_postal_code',
        'rankology_local_business_address_country',
        'rankology_local_business_lat',
        'rankology_local_business_lon',
        'rankology_local_business_place_id',
        'rankology_local_business_url',
        'rankology_local_business_phone',
        'rankology_local_business_email',
        'rankology_local_business_price_range',
        'rankology_local_business_cuisine',
        'rankology_local_business_accepts_reservations',
        // 'rankology_local_business_opening_hours',
        'rankology_robots_file',
        'rankology_mu_robots_file',
        'rankology_rss_before_html',
        'rankology_rss_after_html',
        'rankology_rewrite_search',
        //'rankology_breadcrumbs_i18n_home',
        //rankology_breadcrumbs_i18n_here,
        'rankology_breadcrumbs_i18n_author',
        'rankology_breadcrumbs_i18n_404',
        'rankology_breadcrumbs_i18n_search',
        'rankology_breadcrumbs_i18n_no_results',
        'rankology_breadcrumbs_i18n_attachments',
        'rankology_breadcrumbs_i18n_paged',
        'rankology_white_label_admin_menu',
        // 'rankology_white_label_admin_bar_icon',
        'rankology_white_label_plugin_list_title',
        'rankology_white_label_plugin_list_title_pro',
        'rankology_white_label_plugin_list_desc',
        'rankology_white_label_plugin_list_desc_pro',
        'rankology_white_label_plugin_list_author',
        'rankology_white_label_plugin_list_website',
        'rankology_mu_white_label_admin_menu',
        'rankology_mu_white_label_admin_bar_icon',
        'rankology_mu_white_label_admin_bar_logo',
        'rankology_mu_white_label_plugin_list_title',
        'rankology_mu_white_label_plugin_list_title_pro',
        'rankology_mu_white_label_plugin_list_desc',
        'rankology_mu_white_label_plugin_list_desc_pro',
        'rankology_mu_white_label_plugin_list_author',
        'rankology_mu_white_label_plugin_list_website',
        'rankology_ps_api_key',
        'rankology_ps_url',
        'rankology_ai_openai_api_key'
    ];

    foreach ($rankology_fno_sanitize_fields as $key => $value) {
        if (isset($input[$value])) {
            if ('rankology_robots_file' == $value) {
                $input[$value] = sanitize_textarea_field($input[$value]);
            } elseif ('rankology_mu_robots_file' == $value && is_multisite()) {
                $input[$value] = sanitize_textarea_field($input[$value]);
            } elseif ('rankology_rss_after_html' == $value || 'rankology_rss_before_html' == $value) {
                $args = [
                    'strong' => [],
                    'em' => [],
                    'br' => [],
                    'a' => ['href' => [], 'rel' => []],
                ];
                $input[$value] = wp_kses($input[$value], $args);
            } elseif ('rankology_ai_openai_api_key' == $value) {
                $options = get_option('rankology_fno_option_name');
                $old = isset($options['rankology_ai_openai_api_key']) ? $options['rankology_ai_openai_api_key'] : null;

                if ('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' == $input[$value]) {
                    $input[$value] = $old;
                } else {
                    $input[$value] = sanitize_textarea_field($input[$value]);
                }
            } elseif ('rankology_local_business_opening_hours' == $value) {
                continue;
            } elseif ( ! empty($input[$value])) {
                $input[$value] = sanitize_text_field($input[$value]);
            }
        } else {
            if ('rankology_local_business_opening_hours' == $value) {
                $input['rankology_local_business_opening_hours'] = (isset($_POST['rankology_local_business_opening_hours'])) ? $_POST['rankology_local_business_opening_hours'] : null;
            }
            if ('rankology_local_business_postal_code' === $value) {
                $input['rankology_local_business_postal_code'] = (isset($_POST['rankology_local_business_postal_code'])) ? sanitize_text_field($_POST['rankology_local_business_postal_code']) : null;
            }
        }
    }

    return $input;
}
