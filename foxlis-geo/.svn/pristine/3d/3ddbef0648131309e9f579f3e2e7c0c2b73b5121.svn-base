<?php

if (!function_exists('foxlis_geo_settings_init')) {
    function foxlis_geo_settings_init()
    {
        // Register a new setting for "foxlis_geo" page.
        register_setting('foxlis_geo', 'foxlis_geo_options');

        // Register a new section in the "foxlis_geo" page.
        add_settings_section(
            'foxlis_geo_section_developers',
            __('General', 'foxlis_geo'), null,
            'foxlis_geo'
        );

        // Register a new field in the "foxlis_geo_section_developers" section, inside the "foxlis_geo" page.
        add_settings_field(
            'foxlis_geo_field_language', // As of WP 4.6 this value is used only internally.
            // Use $args' label_for to populate the id inside the callback.
            __('Language', 'foxlis_geo'),
            'foxlis_geo_field_language_cb',
            'foxlis_geo',
            'foxlis_geo_section_developers',
            array(
                'label_for' => 'foxlis_geo_field_language',
                'class' => 'foxlis_geo_row',
                'foxlis_geo_custom_data' => 'custom',
            )
        );

        // Register a new field in the "foxlis_geo_section_developers" section, inside the "foxlis_geo" page.
        add_settings_field(
            'foxlis_geo_field_protocol', // As of WP 4.6 this value is used only internally.
            // Use $args' label_for to populate the id inside the callback.
            __('Protocol', 'foxlis_geo'),
            'foxlis_geo_field_protocol_cb',
            'foxlis_geo',
            'foxlis_geo_section_developers',
            array(
                'label_for' => 'foxlis_geo_field_protocol',
                'class' => 'foxlis_geo_row',
                'foxlis_geo_custom_data' => 'custom',
            )
        );

        // Register a new field in the "foxlis_geo_section_developers" section, inside the "foxlis_geo" page.
        add_settings_field(
            'foxlis_geo_field_session', // As of WP 4.6 this value is used only internally.
            // Use $args' label_for to populate the id inside the callback.
            __('Session', 'foxlis_geo'),
            'foxlis_geo_field_session_cb',
            'foxlis_geo',
            'foxlis_geo_section_developers',
            array(
                'label_for' => 'foxlis_geo_field_session',
                'class' => 'foxlis_geo_row',
                'foxlis_geo_custom_data' => 'custom',
            )
        );

        // Register a new field in the "foxlis_geo_section_developers" section, inside the "foxlis_geo" page.
        add_settings_field(
            'foxlis_geo_field_bot_filter', // As of WP 4.6 this value is used only internally.
            // Use $args' label_for to populate the id inside the callback.
            __('Bots Filter', 'foxlis_geo'),
            'foxlis_geo_field_bot_filter_cb',
            'foxlis_geo',
            'foxlis_geo_section_developers',
            array(
                'label_for' => 'foxlis_geo_field_bot_filter',
                'class' => 'foxlis_geo_row',
                'foxlis_geo_custom_data' => 'custom',
            )
        );

        // Register a new field in the "foxlis_geo_section_developers" section, inside the "foxlis_geo" page.
        add_settings_field(
            'foxlis_geo_field_redirect_action', // As of WP 4.6 this value is used only internally.
            // Use $args' label_for to populate the id inside the callback.
            __('Redirect', 'foxlis_geo'),
            'foxlis_geo_field_redirect_action_cb',
            'foxlis_geo',
            'foxlis_geo_section_developers',
            array(
                'label_for' => 'foxlis_geo_field_redirect_action',
                'class' => 'foxlis_geo_row',
                'foxlis_geo_custom_data' => 'custom',
            )
        );

        // Register a new field in the "foxlis_geo_section_developers" section, inside the "foxlis_geo" page.
        add_settings_field(
            'foxlis_geo_field_account', // As of WP 4.6 this value is used only internally.
            // Use $args' label_for to populate the id inside the callback.
            __('Account Key', 'foxlis_geo'),
            'foxlis_geo_field_account_cb',
            'foxlis_geo',
            'foxlis_geo_section_developers',
            array(
                'label_for' => 'foxlis_geo_field_account',
                'class' => 'foxlis_geo_row',
                'foxlis_geo_custom_data' => 'custom',
            )
        );

        // Register a new field in the "foxlis_geo_section_developers" section, inside the "foxlis_geo" page.
        add_settings_field(
            'foxlis_geo_field_request_timeout', // As of WP 4.6 this value is used only internally.
            // Use $args' label_for to populate the id inside the callback.
            __('Request Timeout', 'foxlis_geo'),
            'foxlis_geo_field_request_timeout_cb',
            'foxlis_geo',
            'foxlis_geo_section_developers',
            array(
                'label_for' => 'foxlis_geo_field_request_timeout',
                'class' => 'foxlis_geo_row',
                'foxlis_geo_custom_data' => 'custom',
            )
        );
    }

    add_action('admin_init', 'foxlis_geo_settings_init');
}

if (!function_exists('foxlis_geo_field_language_cb')) {
    function foxlis_geo_field_language_cb($args)
    {
        // Get the value of the setting we've registered with register_setting()
        $options = get_option('foxlis_geo_options');
        ?>
        <select
                id="<?php echo esc_attr($args['label_for']); ?>"
                data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
                name="foxlis_geo_options[<?php echo esc_attr($args['label_for']); ?>]">
            <option value="en" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'en', false)) : (''); ?>>
                <?php esc_html_e('English', 'foxlis_geo'); ?>
            </option>
            <option value="zh-CN" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'zh-CN', false)) : (''); ?>>
                <?php esc_html_e('Chinese', 'foxlis_geo'); ?>
            </option>
            <option value="fr" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'fr', false)) : (''); ?>>
                <?php esc_html_e('French', 'foxlis_geo'); ?>
            </option>
            <option value="ru" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'ru', false)) : (''); ?>>
                <?php esc_html_e('Russian', 'foxlis_geo'); ?>
            </option>
            <option value="de" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'de', false)) : (''); ?>>
                <?php esc_html_e('German', 'foxlis_geo'); ?>
            </option>
            <option value="es" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'es', false)) : (''); ?>>
                <?php esc_html_e('Spanish', 'foxlis_geo'); ?>
            </option>
            <option value="ja" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'ja', false)) : (''); ?>>
                <?php esc_html_e('Japanese', 'foxlis_geo'); ?>
            </option>
            <option value="pt-BR" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'pt-BR', false)) : (''); ?>>
                <?php esc_html_e('Portuguese', 'foxlis_geo'); ?>
            </option>
        </select>
        <p>Choose language for geo-location entities: city, country, continent names, etc.</p>
        <?php
    }
}

if (!function_exists('foxlis_geo_field_protocol_cb')) {
    function foxlis_geo_field_protocol_cb($args)
    {
        // Get the value of the setting we've registered with register_setting()
        $options = get_option('foxlis_geo_options');
        ?>
        <select
            id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
            name="foxlis_geo_options[<?php echo esc_attr($args['label_for']); ?>]">
            <option value="http" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'http', false)) : (''); ?>>
                <?php esc_html_e('HTTP', 'foxlis_geo'); ?>
            </option>
            <option value="https" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'https', false)) : (''); ?>>
                <?php esc_html_e('HTTPS', 'foxlis_geo'); ?>
            </option>
        </select>
        <p>Secure protocol "HTTPS" can be used only for <a href="https://foxlis.com/geo/prices" target="_blank">payed
                account</a>.</p>
        <?php
    }
}

if (!function_exists('foxlis_geo_field_redirect_action_cb')) {
    function foxlis_geo_field_redirect_action_cb($args)
    {
        // Get the value of the setting we've registered with register_setting()
        $options = get_option('foxlis_geo_options');
        ?>
        <select
            id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
            name="foxlis_geo_options[<?php echo esc_attr($args['label_for']); ?>]">
            <option value="disable" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'disable', false)) : (''); ?>>
                <?php esc_html_e('Disable', 'foxlis_geo'); ?>
            </option>
            <option value="frontend" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'frontend', false)) : (''); ?>>
                <?php esc_html_e('Frontend (recommended)', 'foxlis_geo'); ?>
            </option>
            <option value="backend" <?php echo isset($options[$args['label_for']]) ? (selected($options[$args['label_for']], 'backend', false)) : (''); ?>>
                <?php esc_html_e('Backend (risky)', 'foxlis_geo'); ?>
            </option>
        </select>
        <p>Frontend is an async redirect method. Redirect will be apply after page loading. This doesn't affect on page load speed. Visitor will see redirect from page.</p>
        <p>Backend is a sync redirect method. Redirect will be apply before page loading. This affect on page load speed. Visitor will not see redirect from page.</p>
        <p>You can configure redirect options <a href="<?php menu_page_url('foxlis_geo_options_redirect') ?>">here</a>.</p>
        <?php
    }
}

if (!function_exists('foxlis_geo_field_account_cb')) {
    function foxlis_geo_field_account_cb($args)
    {
        // Get the value of the setting we've registered with register_setting()
        $options = get_option('foxlis_geo_options');
        ?>
        <input
            id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
            name="foxlis_geo_options[<?php echo esc_attr($args['label_for']); ?>]"
            type="text"
            value="<?php echo isset($options[$args['label_for']]) ? (esc_attr($options[$args['label_for']])) : (''); ?>"
        />
        <p>Use account key for personal API link and more accurate requests points usage.</p>
        <p>Also you can control <a href="<?php menu_page_url('foxlis_geo_options_account') ?>">account data</a>
            and history. Get <a href="https://foxlis.com/geo/activation" target="_blank">more details</a>.</p>
        <?php
    }
}

if (!function_exists('foxlis_geo_field_timeout_cb')) {
    function foxlis_geo_field_request_timeout_cb($args)
    {
        // Get the value of the setting we've registered with register_setting()
        $options = get_option('foxlis_geo_options');
        ?>
        <input
            id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
            name="foxlis_geo_options[<?php echo esc_attr($args['label_for']); ?>]"
            type="text"
            value="<?php echo isset($options[$args['label_for']]) ? (esc_attr($options[$args['label_for']])) : (''); ?>"
        />
        <p>Define, how many seconds you ready to wait visitor's GEO data by request.</p>
        <p>This is the maximum delay value when your website loading if you use backend redirect type.</p>
        <?php
    }
}

if (!function_exists('foxlis_geo_field_session_cb')) {
    function foxlis_geo_field_session_cb($args)
    {
        // Get the value of the setting we've registered with register_setting()
        $options = get_option('foxlis_geo_options');
        ?>
        <input
                id="<?php echo esc_attr($args['label_for']); ?>"
                data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
                name="foxlis_geo_options[<?php echo esc_attr($args['label_for']); ?>]"
                type="checkbox"
                value="1"
            <?php echo isset($options[$args['label_for']]) ? (checked($options[$args['label_for']])) : (''); ?>
        />
        <p>Save result to session. This option reduce API requests and speed up website loading.</p>
        <?php
    }
}

if (!function_exists('foxlis_geo_field_bot_filter_cb')) {
    function foxlis_geo_field_bot_filter_cb($args)
    {
        // Get the value of the setting we've registered with register_setting()
        $options = get_option('foxlis_geo_options');
        ?>
        <input
                id="<?php echo esc_attr($args['label_for']); ?>"
                data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
                name="foxlis_geo_options[<?php echo esc_attr($args['label_for']); ?>]"
                type="checkbox"
                value="1"
            <?php echo isset($options[$args['label_for']]) ? (checked($options[$args['label_for']])) : (''); ?>
        />
        <p>Don't detect geo-location for bots. This option reduce API requests.</p>
        <p>You can configure filter options <a href="<?php menu_page_url('foxlis_geo_options_filter') ?>">here</a>.</p>
        <?php
    }
}

if (!function_exists('foxlis_geo_options_page_html')) {
    function foxlis_geo_options_page_html()
    {
        // check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }

        // add error/update messages

        // check if the user have submitted the settings
        // WordPress will add the "settings-updated" $_GET parameter to the url
        if (isset($_GET['settings-updated'])) {
            // add settings saved message with the class of "updated"
            add_settings_error('foxlis_geo_messages', 'foxlis_geo_message', __('Settings Saved', 'foxlis_geo'), 'updated');
        }

        // show error/update messages
        settings_errors('foxlis_geo_messages');
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                <?php
                // output security fields for the registered setting "foxlis_geo"
                settings_fields('foxlis_geo');
                // output setting sections and their fields
                // (sections are registered for "foxlis_geo", each field is registered to a specific section)
                do_settings_sections('foxlis_geo');
                // output save settings button
                submit_button('Save Settings');
                ?>
            </form>
        </div>
        <?php
    }
}
