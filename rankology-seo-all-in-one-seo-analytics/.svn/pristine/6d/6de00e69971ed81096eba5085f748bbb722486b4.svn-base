<?php

// Register the settings section
add_settings_section(
    'rankology_settings_general', // Section ID
    'Pages and Posts',            // Section Title
    '__return_false',             // Callback function (no additional content)
    'rankology-settings-general'  // Page slug
);

// Define all fields in an array
$general = [
    [
        'id' => 'pages',
        'title' => __('Pages', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'pages',
            'name' => 'pages',
            'description' => __('Enable this option to count the Pages visits', 'wp-rankology'),
            'checked' => true,
        ],
    ],
    [
        'id' => 'track_all_pages',
        'title' => __('Track All Pages', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'all_pages',
            'name' => 'track_all_pages',
            'description' => __('Enable or disable this feature. Track all WordPress pages, contains Category, Post Tags, Author, Custom Taxonomy, etc.', 'wp-rankology'),
            'checked' => true,
        ],
    ],
    [
        'id' => 'strip_uri_parameters',
        'title' => __('Strip URL Parameters', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'strip_uri_parameters',
            'name' => 'strip_uri_parameters',
            'description' => __('Enable this option to remove everything after the “?” in a URL', 'wp-rankology'),
            'checked' => true,
        ],
    ],
    [
        'id' => 'disable_editor',
        'title' => __('Traffic Chart Metabox', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable-editor',
            'name' => 'disable_editor',
            'description' => __('Disable showing the hits chart metabox in the edit pages.', 'wp-rankology'),
            'checked' => true,
        ],
    ],
    [
        'id' => 'disable_column',
        'title' => __('Traffic Column', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable_column',
            'name' => 'disable_column',
            'description' => __('Disable showing the hits column in list pages.', 'wp-rankology'),
            'checked' => true,
        ],
    ],
    [
        'id' => 'hit_post_metabox',
        'title' => __('Traffic in Publish Metabox', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'hit_post_metabox',
            'name' => 'hit_post_metabox',
            'description' => __('Enable this option to show hits on the edit page » Publish meta box of all post types', 'wp-rankology'),
            'checked' => true,
        ],
    ],
    [
        'id' => 'show_hits',
        'title' => __('Traffic in Single Pages', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'show_hits',
            'name' => 'show_hits',
            'description' => __('Enable this option to show the hits in post content', 'wp-rankology'),
            'checked' => true,
            'onclick' => 'ToggleShowTrafficOptions();',
        ],
    ],
    [
        'id' => 'display_hits_position',
        'title' => __('Display position', 'wp-rankology'),
        'callback' => 'rankology_render_select',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'display_hits_position',
            'name' => 'display_hits_position',
            'description' => __('Choose the position to show Hits.', 'wp-rankology'),
            'options' => [
                '0' => __('Please select', 'wp-rankology'),
                'before_content' => __('Before Content', 'wp-rankology'),
                'after_content' => __('After Content', 'wp-rankology'),
            ],
            'selected' => '0',
        ],
    ],
    [
        'id' => 'useronline',
        'title' => __('Active/Online User', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'useronline',
            'name' => 'useronline',
            'description' => __('Enable this feature to show actively website using users', 'wp-rankology'),
            'checked' => false, // Default value, can be dynamically set
            'onclick' => '', // Add JavaScript if needed
        ],
    ],
    [
        'id' => 'check_online',
        'title' => __('Check for Active Users Every', 'wp-rankology'),
        'callback' => 'rankology_render_text',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'check_online',
            'name' => 'check_online',
            'description' => __('Time for checking out accurate actively website using users on the site. Now: Seconds', 'wp-rankology'),
            'value' => '120', // Default value, can be dynamically set
        ],
    ],
    [
        'id' => 'allonline',
        'title' => __('Record All Users', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'allonline',
            'name' => 'all_online',
            'description' => __('Enable this option to ignore the exclusion settings and record all actively website using users (including self referrals and robots). Should only be used for troubleshooting.', 'wp-rankology'),
            'checked' => false, // Default value, can be dynamically set
            'onclick' => '', // Add JavaScript if needed
        ],
    ],
    [
        'id' => 'use_cache_plugin',
        'title' => __('Cache Status:', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'use_cache_plugin',
            'name' => 'use_cache_plugin',
            'description' => __('Enable this option if the Cache is enabled in your WordPress', 'wp-rankology'),
            'checked' => true, // Default value, can be dynamically set
        ],
    ],
    [
        'id' => 'visits',
        'title' => __('Visits Status:', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'visits',
            'name' => 'visits',
            'description' => __('Enable this option to show the number of Page Views', 'wp-rankology'),
            'checked' => true, // Default value, can be dynamically set
        ],
    ],
    [
        'id' => 'visitors',
        'title' => __('Visitors Status:', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'visitors',
            'name' => 'visitors',
            'description' => __('Enable this option to show the number of Unique Users who have visited your website', 'wp-rankology'),
            'checked' => true, // Default value, can be dynamically set
        ],
    ],
    [
        'id' => 'visitors_log',
        'title' => __('Log Visitors Pages:', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'visitors_log',
            'name' => 'visitors_log',
            'description' => __('Enable this option to receive a report of each user’s visits to the pages', 'wp-rankology'),
            'checked' => true, // Default value, can be dynamically set
        ],
    ],
    [
        'id' => 'enable_user_column',
        'title' => __('User Visits Column:', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'enable_user_column',
            'name' => 'enable_user_column',
            'description' => __('Enable this option to show the list of user visits, link in the WordPress admin user list page.', 'wp-rankology'),
            'checked' => true, // Default value, can be dynamically set
        ],
    ],
    [
        'id' => 'menu_bar',
        'title' => __('Show Stats in Menu Bar', 'wp-rankology'),
        'callback' => 'rankology_render_select',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'menu-bar',
            'name' => 'menu_bar',
            'description' => __('Select Yes to show stats in the admin menu bar', 'wp-rankology'),
            'options' => [
                '1' => __('Yes', 'wp-rankology'),
                '0' => __('No', 'wp-rankology'),
            ],
            'selected' => '1', // Default value (Yes is selected)
        ],
    ],
    [
        'id' => 'hide_notices',
        'title' => __('Hide Admin Notices About Non-active Features', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'hide_notices',
            'name' => 'hide_notices',
            'description' => __('Rankology Stats displays an alert if any of the core features are disabled. To hide these notices, enable this option.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'chart-totals',
        'title' => __('Charts Included', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'chart-totals',
            'name' => 'chart-totals',
            'description' => __('Add a total line to charts with multiple values, like the search engine referrals.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'addsearchwords',
        'title' => __('Add Page Title to Empty Search Words', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'addsearchwords',
            'name' => 'addsearchwords',
            'description' => __('If a search engine is identified as the referrer but it does not include the search query this option will substitute the page title in quotes preceded by "~:" as the search query to help identify what the user may have been searching for.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'disable_se_ask',
        'title' => __('Ask.com', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable_se_ask',
            'name' => 'disable_se_ask',
            'description' => __('Disable Ask.com from data collection and reporting.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'disable_se_baidu',
        'title' => __('Baidu', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable_se_baidu',
            'name' => 'disable_se_baidu',
            'description' => __('Disable Baidu from data collection and reporting.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'disable_se_bing',
        'title' => __('Bing', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable_se_bing',
            'name' => 'disable_se_bing',
            'description' => __('Disable Bing from data collection and reporting.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'disable_se_clearch',
        'title' => __('clearch.org', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable_se_clearch',
            'name' => 'disable_se_clearch',
            'description' => __('Disable clearch.org from data collection and reporting.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'disable_se_duckduckgo',
        'title' => __('DuckDuckGo', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable_se_duckduckgo',
            'name' => 'disable_se_duckduckgo',
            'description' => __('Disable DuckDuckGo from data collection and reporting.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'disable_se_google',
        'title' => __('Google', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable_se_google',
            'name' => 'disable_se_google',
            'description' => __('Disable Google from data collection and reporting.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'disable_se_yahoo',
        'title' => __('Yahoo!', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable_se_yahoo',
            'name' => 'disable_se_yahoo',
            'description' => __('Disable Yahoo! from data collection and reporting.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'disable_se_yandex',
        'title' => __('Yandex', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable_se_yandex',
            'name' => 'disable_se_yandex',
            'description' => __('Disable Yandex from data collection and reporting.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'disable_se_qwant',
        'title' => __('Qwant', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'disable_se_qwant',
            'name' => 'disable_se_qwant',
            'description' => __('Disable Qwant from data collection and reporting.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
];

// Loop through the fields and add them
foreach ($general as $field) {
    add_settings_field(
        $field['id'],                  // Field ID
        $field['title'],               // Field Title
        $field['callback'],            // Callback function to render the field
        $field['page'],                // Page slug
        $field['section'],             // Section ID
        $field['args']                 // Arguments for the callback
    );

// Register each setting
    // register_setting($field['page'], $field['args']['name']);
}

add_settings_section(
    'rankology_settings_privacy', // Section ID
    'Privacy and Data Protection',            // Section Title
    '__return_false',             // Callback function (no additional content)
    'rankology-settings-privacy'  // Page slug
);

// Define all fields in an array
$privacy = [
    [
        'id' => 'hash_ips',
        'title' => __('Hash IP Addresses:', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-privacy',
        'section' => 'rankology_settings_privacy',
        'args' => [
            'label_for' => 'hash_ips',
            'name' => 'hash_ips',
            'description' => __('By enabling this option, you cannot recover the IP addresses in the future to find out location information.', 'wp-rankology'),
            'checked' => true,
        ],
    ],
    [
        'id' => 'anonymize_ips',
        'title' => __('Anonymize IP Addresses:', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-privacy',
        'section' => 'rankology_settings_privacy',
        'args' => [
            'label_for' => 'anonymize_ips',
            'name' => 'anonymize_ips',
            'description' => __('This option anonymize the user IP address because of the data privacy & GDPR.', 'wp-rankology'),
            'checked' => true,
        ],
    ],
    [
        'id' => 'do_not_track',
        'title' => __('Do Not Track:', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-privacy',
        'section' => 'rankology_settings_privacy',
        'args' => [
            'label_for' => 'do_not_track',
            'name' => 'do_not_track',
            'description' => __('Enabling this means that the plugin will not collect or store any data about the users visits to your website.', 'wp-rankology'),
            'checked' => true,
        ],
    ],
    [
        'id' => 'store_ua',
        'title' => __('Store Entire User Agent String:', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-privacy',
        'section' => 'rankology_settings_privacy',
        'args' => [
            'label_for' => 'store_ua',
            'name' => 'store_ua',
            'description' => __('Only enable it for debugging. If the IP hashes are enabled, this option will be disabled automatically.', 'wp-rankology'),
            'checked' => true,
        ],
    ],
];

// Loop through the fields and add them
foreach ($privacy as $field) {
    add_settings_field(
        $field['id'],                  // Field ID
        $field['title'],               // Field Title
        $field['callback'],            // Callback function to render the field
        $field['page'],                // Page slug
        $field['section'],             // Section ID
        $field['args']                 // Arguments for the callback
    );

// Register each setting
    // register_setting($field['page'], $field['args']['name']);
}


add_settings_section(
    'rankology_settings_stats', // Section ID
    'GeoIP Settings',            // Section Title
    '__return_false',             // Callback function (no additional content)
    'rankology-settings-stats'  // Page slug
);

// Define all fields in an array
$stats = [
    [
        'id' => 'geoip_license_type',
        'title' => __('GeoIP Server Type', 'wp-rankology'),
        'callback' => 'rankology_render_select',
        'page' => 'rankology-settings-stats',
        'section' => 'rankology_settings_stats',
        'args' => [
            'label_for' => 'geoip_license_type',
            'name' => 'geoip_license_type',
            'description' => __('IP location services are provided by data created by <a href="http://www.maxmind.com" target="_blank">MaxMind</a>.', 'wp-rankology'),
            'options' => [
                'js-deliver' => __('Use the JsDelivr', 'wp-rankology'),
                'user-license' => __('Use the MaxMind server with your own license key', 'wp-rankology'),
            ],
            'selected' => 'js-deliver', // Default value
        ],
    ],
    [
        'id' => 'geoip_license_key',
        'title' => __('GeoIP License Key', 'wp-rankology'),
        'callback' => 'rankology_render_text',
        'page' => 'rankology-settings-stats',
        'section' => 'rankology_settings_stats',
        'args' => [
            'label_for' => 'geoip_license_key',
            'name' => 'geoip_license_key',
            'description' => __('Put your license key here and save settings to apply it.', 'wp-rankology'),
            'value' => '', // Default value (empty)
        ],
    ],
    [
        'id' => 'geoip',
        'title' => __('GeoIP Collection', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-stats',
        'section' => 'rankology_settings_stats',
        'args' => [
            'label_for' => 'geoip',
            'name' => 'geoip',
            'description' => __('Enable this option to get more information and location (country) from a visitor.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'geoip_city',
        'title' => __('GeoIP City', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'geoip_city',
            'name' => 'geoip_city',
            'description' => __('Enable this option to see visitors\' city name.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'geoip_schedule',
        'title' => __('Schedule Monthly Update of GeoIP DB', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-stats',
        'section' => 'rankology_settings_stats',
        'args' => [
            'label_for' => 'geoip-schedule',
            'name' => 'schedule_geoip',
            'description' => __(
                'Download of the GeoIP database will be scheduled for 2 days after the first Tuesday of the month.' .
                ' This option will also download the database if the local filesize is less than 1k (which usually means the stub that comes with the plugin is still in place).',
                'wp-rankology'
            ),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'geoip_auto_pop',
        'title' => __('Populate Missing GeoIP After Updating GeoIP DB', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-stats',
        'section' => 'rankology_settings_stats',
        'args' => [
            'label_for' => 'geoip-auto-pop',
            'name' => 'auto_pop',
            'description' => __('Enable this option to update any missing GeoIP data after downloading a new database.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'geoip_private_country_code',
        'title' => __('Country Code for Private IP Addresses', 'wp-rankology'),
        'callback' => 'rankology_render_text',
        'page' => 'rankology-settings-stats',
        'section' => 'rankology_settings_stats',
        'args' => [
            'label_for' => 'geoip-private-country-code',
            'name' => 'private_country_code',
            'description' => __(
                'The international standard two-letter country code (e.g., US = United States, CA = Canada, etc.) for private (non-routable) IP addresses (e.g., 10.0.0.1, 192.158.1.1, 127.0.0.1, etc.). Use "000" (three zeros) to use "Unknown" as the country code.',
                'wp-rankology'
            ),
            'value' => '000', // Default value
        ],
    ],
];

// Loop through the fields and add them
foreach ($stats as $field) {
    add_settings_field(
        $field['id'],                  // Field ID
        $field['title'],               // Field Title
        $field['callback'],            // Callback function to render the field
        $field['page'],                // Page slug
        $field['section'],             // Section ID
        $field['args']                 // Arguments for the callback
    );

// Register each setting
    // register_setting($field['page'], $field['args']['name']);
}

add_settings_section(
    'rankology_settings_email', // Section ID
    'Email Options',            // Section Title
    '__return_false',             // Callback function (no additional content)
    'rankology-settings-email'  // Page slug
);

$emails = [
    [
        'id' => 'email_list',
        'title' => __('Email Addresses', 'wp-rankology'),
        'callback' => 'rankology_render_text',
        'page' => 'rankology-settings-email',
        'section' => 'rankology_settings_email',
        'args' => [
            'label_for' => 'email_list',
            'name' => 'email_list',
            'description' => __('Add email addresses you want to receive reports and separate them with a comma.', 'wp-rankology'),
            'value' => '', // Default value (empty)
        ],
    ],
    [
        'id' => 'stats_report',
        'title' => __('Enable Stats Report', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-email',
        'section' => 'rankology_settings_email',
        'args' => [
            'label_for' => 'stats_report',
            'name' => 'stats_report',
            'description' => __('Enable this option to activate stats reporting.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'time_report',
        'title' => __('Schedule', 'wp-rankology'),
        'callback' => 'rankology_render_select',
        'page' => 'rankology-settings-email',
        'section' => 'rankology_settings_email',
        'args' => [
            'label_for' => 'time_report',
            'name' => 'time_report',
            'description' => __('Select how often to receive statistical report.', 'wp-rankology'),
            'options' => [
                '0' => __('Please select', 'wp-rankology'),
                'hourly' => __('Once Hourly', 'wp-rankology'),
                'twicedaily' => __('Twice Daily', 'wp-rankology'),
                'daily' => __('Once Daily', 'wp-rankology'),
                'weekly' => __('Once Weekly', 'wp-rankology'),
            ],
            'selected' => '0', // Default value (Please select)
        ],
    ],
    [
        'id' => 'content_report',
        'title' => __('Content Report', 'wp-rankology'),
        'callback' => 'rankology_render_textarea',
        'page' => 'rankology-settings-email',
        'section' => 'rankology_settings_email',
        'args' => [
            'label_for' => 'content_report',
            'name' => 'content_report',
            'description' => __('Specify the content to include in the report.', 'wp-rankology'),
            'value' => '', // Default value (empty)
            'conditional' => [
                'parent_id' => 'stats_report_enable',
                'condition' => true, // Show only if stats_report_enable is checked
            ],
        ],
    ],

];

foreach ($emails as $field) {
    add_settings_field(
        $field['id'],                  // Field ID
        $field['title'],               // Field Title
        $field['callback'],            // Callback function to render the field
        $field['page'],                // Page slug
        $field['section'],             // Section ID
        $field['args']                 // Arguments for the callback
    );

// Register each setting
    // register_setting($field['page'], $field['args']['name']);
}

add_settings_section(
    'rankology_settings_exclude', // Section ID
    'Exclude User Roles',            // Section Title
    '__return_false',             // Callback function (no additional content)
    'rankology-settings-exclude'  // Page slug
);

$exclude = [
    [
        'id' => 'exclude_administrator',
        'title' => __('Administrator', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'exclude_administrator',
            'name' => 'exclude_administrator',
            'description' => __('Exclude Administrator role from data collection.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'exclude_editor',
        'title' => __('Editor', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'exclude_editor',
            'name' => 'exclude_editor',
            'description' => __('Exclude Editor role from data collection.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'exclude_author',
        'title' => __('Author', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'exclude_author',
            'name' => 'exclude_author',
            'description' => __('Exclude Author role from data collection.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'exclude_contributor',
        'title' => __('Contributor:', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'exclude_contributor',
            'name' => 'exclude_contributor',
            'description' => __('Exclude Contributor role from data collection.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'exclude_contributor',
        'title' => __('Contributor', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-general',
        'section' => 'rankology_settings_general',
        'args' => [
            'label_for' => 'exclude_contributor',
            'name' => 'exclude_contributor',
            'description' => __('Exclude Contributor role from data collection.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'exclude_subscriber',
        'title' => __('Subscriber', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'exclude_subscriber',
            'name' => 'exclude_subscriber',
            'description' => __('Exclude Subscriber role from data collection.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'robot_list',
        'title' => __('Robot List', 'wp-rankology'),
        'callback' => 'rankology_render_textarea',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'robotlist',
            'name' => 'robotlist',
            'description' => __('It is a list of words - one per line.', 'wp-rankology'),
            'value' => "007ac9\n5bot\nA6-Indexer\nAbachoBOT\naccoona\nAcoiRobot\nAddThis.com\nADmantX\nAdsBot-Google\nadvbot\nAhrefsBot\naiHitBot\nalexa\nalphabot\nAltaVista\nAntivirusPro\nanyevent\nappie\nApplebot\narchive.org_bot\nAsk Jeeves\nASPSeek\nBaiduspider\nBenjojo\nBeetleBot\nbingbot\nBlekkobot\nblexbot\nBOT for JCE\nbubing\nButterfly\ncbot\nclamantivirus\ncliqzbot\nclumboot\ncoccoc\ncrawler\nCrocCrawler\ncrowsnest.tv\ndbot\ndl2bot\ndotbot\ndownloadbot\nduckduckgo\nDumbot\nEasouSpider\neStyle\nEveryoneSocialBot\nExabot\nezooms\nfacebook.com\nfacebookgeoipsethit\nFAST\nFeedfetcher-Google\nfeedzirra\nfindxbot\nFirfly\nFriendFeedBot\nfroogle\nGeonaBot\nGigabot\ngirafabot\ngimme60bot\nglbot\nGooglebot\nGroupHigh\nia_archiver\nIDBot\nInfoSeek\ninktomi\nIstellaBot\njetmon\nKraken\nLeikibot\nlinkapediabot\nlinkdexbot\nLinkpadBot\nLoadTimeBot\nlooksmart\nltx71\nLycos\nMail.RU_Bot\nMe.dium\nmeanpathbot\nmediabot\nmedialbot\nMediapartners-Google\nMJ12bot\nmsnbot\nMojeekBot\nmonobot\nmoreover\nMRBOT\nNationalDirectory\nNerdyBot\nNetcraftSurveyAgent\nniki-bot\nnutch\nOpenbot\nOrangeBot\nowler\np4Bot\nPaperLiBot\npageanalyzer\nPagesInventory\nPimonster\nporkbun\npr-cy\nproximic\npwbot\nr4bot\nrabaz\nRambler\nRankivabot\nrevip\nriddler\nrogerbot\nScooter\nScrubby\nscrapy.org\nSearchmetricsBot\nsees.co\nSemanticBot\nSemrushBot\nSeznamBot\nsfFeedReader\nshareaholic-bot\nsistrix\nSiteExplorer\nSlurp\nSocialradarbot\nSocialSearch\nSogou web spider\nSpade\nspbot\nSpiderLing\nSputnikBot\nSuperfeedr\nSurveyBot\nTechnoratiSnoop\nTECNOSEEK\nTeoma\ntrendictionbot\nTweetmemeBot\nTwiceler\nTwitterbot\nTwitturls\nu2bot\nuMBot-LN\nuni5download\nunrulymedia\nUptimeRobot\nURL_Spider_SQL\nVagabondo\nvBSEO\nWASALive-Bot\nWebAlta Crawler\nWebBug\nWebFindBot\nWebMasterAid\nWeSEE\nWotbox\nwsowner\nwsr-agent\nwww.galaxy.com\nx100bot\nXoviBot\nxzybot\nyandex\nYahoo\nYammybot\nYoudaoBot\nZyBorg\nZemlyaCrawl",
            'reset_button' => true, // Indicates whether to include a reset button
        ],
    ],
    [
        'id' => 'force_robot_update',
        'title' => __('Force Robot List Update After Upgrades', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'force_robot_update',
            'name' => 'force_robot_update',
            'description' => __('Force the robot list to reset itself to the default after Rankology Stats updated. Note that any custom robots added to the list will be lost if this option is enabled.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'robot_threshold',
        'title' => __('Robot Visit Threshold', 'wp-rankology'),
        'callback' => 'rankology_render_text',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'robot_threshold',
            'name' => 'robot_threshold',
            'description' => __('Treat visitors with more than this number of visits per day as robots. 0 = disabled.', 'wp-rankology'),
            'value' => '', // Default value (empty)
        ],
    ],
    [
        'id' => 'exclude_ip_list',
        'title' => __('Excluded IP Address List', 'wp-rankology'),
        'callback' => 'rankology_render_textarea',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'exclude_ip',
            'name' => 'exclude_ip',
            'description' => __('You can add a list of IP addresses (one per line) to exclude from the data collection.', 'wp-rankology'),
            'value' => '', // Default value (empty)
            'buttons' => [
                ['label' => 'Add 10.0.0.0/8', 'value' => "10.0.0.0/8"],
                ['label' => 'Add 172.16.0.0/12', 'value' => "172.16.0.0/12"],
                ['label' => 'Add 192.168.0.0/16', 'value' => "192.168.0.0/16"],
                ['label' => 'Add 127.0.0.1/24', 'value' => "127.0.0.1/24"],
                ['label' => 'Add fc00::/7', 'value' => "fc00::/7"],
            ],
        ],
    ],
    [
        'id' => 'use_honeypot',
        'title' => __('Use Honey Pot', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'use_honeypot',
            'name' => 'use_honeypot',
            'description' => __('Enable this option for identifying robots by the Honey Pot page.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'honeypot_postid',
        'title' => __('Honey Pot Page', 'wp-rankology'),
        'callback' => 'rankology_render_select',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'honeypot_postid',
            'name' => 'honeypot_postid',
            'description' => __('Select the page for the Honey Pot page or create a new one and then select here.', 'wp-rankology'),
            'options' => [
                '' => __('Please select', 'wp-rankology'), // Default option
                '2' => __('Sample Page', 'wp-rankology'),   // Example page option
            ],
            'selected' => '', // Default value (no selection)
        ],
    ],
    [
        'id' => 'honeypot_page',
        'title' => __('Honey Pot Page', 'wp-rankology'),
        'callback' => 'rankology_render_select',
        'page' => 'rankology-settings-gexclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'honeypot_postid',
            'name' => 'honeypot_postid',
            'description' => __('Select the page for the Honey Pot page or create a new one and then select here.', 'wp-rankology'),
            'options' => [
                '' => __('Please select', 'wp-rankology'),
                '2' => __('Sample Page', 'wp-rankology'),
            ],
            'selected' => '', // Default value (no selection)
        ],
    ],
    [
        'id' => 'corrupt_browser_info',
        'title' => __('Treat Corrupt Browser Info as a Bot', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'corrupt_browser_info',
            'name' => 'corrupt_browser_info',
            'description' => __('Treat any visitor with corrupt browser info (missing IP address or empty user agent string) as a robot.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'excluded_countries',
        'title' => __('Excluded Countries', 'wp-rankology'),
        'callback' => 'rankology_render_textarea',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'excluded_countries',
            'name' => 'excluded_countries',
            'description' => __(
                'Add the country codes (one per line, two letters each) to exclude them from data collection. Use "000" (three zeros) to exclude unknown countries. (<a href="https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes" target="_blank">List of Country Codes</a>)',
                'wp-rankology'
            ),
            'value' => '', // Default value (empty)
        ],
    ],
    [
        'id' => 'included_countries',
        'title' => __('Included Countries', 'wp-rankology'),
        'callback' => 'rankology_render_textarea',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'included_countries',
            'name' => 'included_countries',
            'description' => __(
                'Add the country codes (one per line, two letters each) to include them in data collection. Use "000" (three zeros) to exclude unknown countries. (<a href="https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes" target="_blank">List of Country Codes</a>)',
                'wp-rankology'
            ),
            'value' => '', // Default value (empty)
        ],
    ],
    [
        'id' => 'excluded_hosts',
        'title' => __('Excluded Hosts:', 'wp-rankology'),
        'callback' => 'rankology_render_textarea',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'excluded_hosts',
            'name' => 'excluded_hosts',
            'description' => __(
                'Add the country codes (one per line, two letters each) to include them in data collection. Use "000" (three zeros) to exclude unknown countries. (<a href="https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes" target="_blank">List of Country Codes</a>)',
                'wp-rankology'
            ),
            'value' => '', // Default value (empty)
        ],
    ],
    [
        'id' => 'exclude_loginpage',
        'title' => __('Excluded Login Page', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'rkns-exclude-loginpage',
            'name' => 'exclude_loginpage',
            'description' => __('Exclude the login page for registering as a hit.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'exclude_feeds',
        'title' => __('Excluded RSS Feeds', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'rkns-exclude-feeds',
            'name' => 'exclude_feeds',
            'description' => __('Exclude the RSS feeds for registering as a hit.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'exclude_404s',
        'title' => __('Excluded 404 Pages', 'wp-rankology'),
        'callback' => 'rankology_render_checkbox',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'rkns-exclude-404s',
            'name' => 'exclude_404s',
            'description' => __('Exclude any URL that returns a "404 - Not Found" message.', 'wp-rankology'),
            'checked' => false, // Default value (unchecked)
        ],
    ],
    [
        'id' => 'excluded_urls',
        'title' => __('Excluded URLs', 'wp-rankology'),
        'callback' => 'rankology_render_textarea',
        'page' => 'rankology-settings-exclude',
        'section' => 'rankology_settings_exclude',
        'args' => [
            'label_for' => 'excluded_urls',
            'name' => 'excluded_urls',
            'description' => __('You can add a list of local URLs (i.e. /wordpress/about), one per line to exclude from collection.', 'wp-rankology'),
            'value' => '', // Default value (empty)
        ],
    ],
];

foreach ($exclude as $field) {
    add_settings_field(
        $field['id'],                  // Field ID
        $field['title'],               // Field Title
        $field['callback'],            // Callback function to render the field
        $field['page'],                // Page slug
        $field['section'],             // Section ID
        $field['args']                 // Arguments for the callback
    );

// Register each setting
    // register_setting($field['page'], $field['args']['name']);
}
