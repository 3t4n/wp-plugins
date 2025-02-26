<?php

if (!function_exists('foxlis_geo_settings_filter_init')) {
    function foxlis_geo_settings_filter_init()
    {
        // Register a new setting for "foxlis_geo" page.
        register_setting('foxlis_geo_filter', 'foxlis_geo_options_filter');

        // Register a new section in the "foxlis_geo" page.
        add_settings_section(
            'foxlis_geo_section_developers',
            __('Filter', 'foxlis_geo_filter'), null,
            'foxlis_geo_filter'
        );

        // Register a new field in the "foxlis_geo_section_developers" section, inside the "foxlis_geo" page.
        add_settings_field(
            'foxlis_geo_field_filter_ips', // As of WP 4.6 this value is used only internally.
            // Use $args' label_for to populate the id inside the callback.
            __('Ignoring By Ip-Address', 'foxlis_geo'),
            'foxlis_geo_field_filter_ips_cb',
            'foxlis_geo_filter',
            'foxlis_geo_section_developers',
            array(
                'label_for' => 'foxlis_geo_field_filter_ips',
                'class' => 'foxlis_geo_row',
                'foxlis_geo_custom_data' => 'custom',
            )
        );

        // Register a new field in the "foxlis_geo_section_developers" section, inside the "foxlis_geo" page.
        add_settings_field(
            'foxlis_geo_field_filter_agents', // As of WP 4.6 this value is used only internally.
            // Use $args' label_for to populate the id inside the callback.
            __('Ignoring By User-Agent', 'foxlis_geo'),
            'foxlis_geo_field_filter_agents_cb',
            'foxlis_geo_filter',
            'foxlis_geo_section_developers',
            array(
                'label_for' => 'foxlis_geo_field_filter_agents',
                'class' => 'foxlis_geo_row',
                'foxlis_geo_custom_data' => 'custom',
            )
        );
    }

    add_action('admin_init', 'foxlis_geo_settings_filter_init');
}

if (!function_exists('foxlis_geo_field_filter_ips_cb')) {
    function foxlis_geo_field_filter_ips_cb($args)
    {
        // Get the value of the setting we've registered with register_setting()
        $options = get_option('foxlis_geo_options_filter');
        ?>
        <textarea
            id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
            name="foxlis_geo_options_filter[<?php echo esc_attr($args['label_for']); ?>]"
        ><?php echo isset($options[$args['label_for']]) ? (esc_attr($options[$args['label_for']])) : (''); ?></textarea>
        <p>Insert each ip-address for ignoring at the new line.</p>
        <?php
    }
}

if (!function_exists('foxlis_geo_field_filter_agents_cb')) {
    function foxlis_geo_field_filter_agents_cb($args)
    {
        // Get the value of the setting we've registered with register_setting()
        $options = get_option('foxlis_geo_options_filter');
        ?>
        <textarea
            id="<?php echo esc_attr($args['label_for']); ?>"
            data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
            name="foxlis_geo_options_filter[<?php echo esc_attr($args['label_for']); ?>]"
            type="text"
        ><?php echo isset($options[$args['label_for']]) ? (esc_attr($options[$args['label_for']])) : (''); ?></textarea>
        <p>Insert each substring that User-Agent contains for ignoring at the new line.</p>
        <?php
    }
}

if (!function_exists('foxlis_geo_options_filter_page_html')) {
    function foxlis_geo_options_filter_page_html()
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
            add_settings_error(
                'foxlis_geo_messages', 'foxlis_geo_message', __('Settings Saved', 'foxlis_geo_filter'), 'updated'
            );
        }

        // show error/update messages
        settings_errors('foxlis_geo_messages');
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                <?php
                // output security fields for the registered setting "foxlis_geo_development"
                settings_fields('foxlis_geo_filter');

                // output setting sections and their fields
                // (sections are registered for "foxlis_geo", each field is registered to a specific section)
                do_settings_sections('foxlis_geo_filter');
                ?>
                <p>Don't forget to enable bots filter at the <a href="<?php menu_page_url('foxlis_geo_options') ?>">options
                        tab</a>.</p>
                <?php
                // output save settings button
                submit_button('Save Settings');
                ?>
            </form>
        </div>
        <?php
    }
}
