<?php

if (!function_exists('foxlis_geo_do_redirect')) {
    function foxlis_geo_do_redirect()
    {
        // don't redirect in admin panel or when login
        if (is_admin() || preg_match('/\bwp-login\b/ui', $_SERVER['REQUEST_URI'])) {
            return;
        }

        foxlis_geo_sevice()->doFoxlisGeoRedirect();
    }

    add_action('init', 'foxlis_geo_do_redirect');
}

if (!function_exists('foxlis_geo_settings_redirect_init')) {
    function foxlis_geo_settings_redirect_init()
    {
        // Register a new setting for "foxlis_geo_redirect" page.
        register_setting('foxlis_geo_redirect', 'foxlis_geo_options_redirect');

        // Register a new section in the "foxlis_geo_redirect" page.
        add_settings_section(
            'foxlis_geo_section_developers',
            __('Redirect visitors under certain conditions', 'foxlis_geo_redirect'), null,
            'foxlis_geo_redirect'
        );

        if (empty($options = get_option('foxlis_geo_options_redirect'))) {
            $options = [
                'foxlis_geo_field_redirect_0' => [],
            ];
        }

        $count = 0;
        foreach ($options as $key => $option) {
            $number = $count + 1;
            // Register a new field in the "foxlis_geo_section_developers" section, inside the "foxlis_geo" page.
            add_settings_field(
                $key, // As of WP 4.6 this value is used only internally.
                // Use $args' label_for to populate the id inside the callback.
                __("{$number}. Redirect if...", 'foxlis_geo_redirect'),
                'foxlis_geo_field_redirect_cb',
                'foxlis_geo_redirect',
                'foxlis_geo_section_developers',
                array(
                    'label_for' => $key,
                    'class' => 'foxlis_geo_row',
                    'foxlis_geo_custom_data' => 'custom',
                    'count' => $count,
                )
            );

            $count++;
        }
    }

    add_action('admin_init', 'foxlis_geo_settings_redirect_init');
}

if (!function_exists('foxlis_geo_field_redirect_cb')) {
    function foxlis_geo_field_redirect_cb($args)
    {
        // Get the value of the setting we've registered with register_setting()
        $options = get_option('foxlis_geo_options_redirect');
        $optionName = 'foxlis_geo_options_redirect[' . "foxlis_geo_field_redirect_{$args['count']}" . ']';
        ?>
        <div class="wrap" style="white-space: nowrap">
            <select
                    id="<?php echo esc_attr($args['label_for']); ?>"
                    data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
                    name="<?php echo $optionName . '[type]'; ?>">
                <option value="city" <?php echo isset($options[$args['label_for']]['type']) ? (selected($options[$args['label_for']]['type'], 'city', false)) : (''); ?>>
                    <?php esc_html_e('City', 'foxlis_geo'); ?>
                </option>
                <option value="country" <?php echo isset($options[$args['label_for']]['type']) ? (selected($options[$args['label_for']]['type'], 'country', false)) : (''); ?>>
                    <?php esc_html_e('Country', 'foxlis_geo'); ?>
                </option>
                <option value="subdevision" <?php echo isset($options[$args['label_for']]['type']) ? (selected($options[$args['label_for']]['type'], 'subdevision', false)) : (''); ?>>
                    <?php esc_html_e('Subdevision', 'foxlis_geo'); ?>
                </option>
                <option value="continent" <?php echo isset($options[$args['label_for']]['type']) ? (selected($options[$args['label_for']]['type'], 'continent', false)) : (''); ?>>
                    <?php esc_html_e('Continent', 'foxlis_geo'); ?>
                </option>
            </select>
            <select
                    data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
                    name="<?php echo $optionName . '[equal]'; ?>">
                <option value="equal" <?php echo isset($options[$args['label_for']]['equal']) ? (selected($options[$args['label_for']]['equal'], 'equal', false)) : (''); ?>>
                    <?php esc_html_e('equal', 'foxlis_geo'); ?>
                </option>
                <option value="not_equal" <?php echo isset($options[$args['label_for']]['equal']) ? (selected($options[$args['label_for']]['equal'], 'not_equal', false)) : (''); ?>>
                    <?php esc_html_e('not equal', 'foxlis_geo'); ?>
                </option>
            </select>
            <input type="text" placeholder="New York" style="vertical-align:middle" name="<?php echo $optionName . '[value]'; ?>"
                   value="<?php echo isset($options[$args['label_for']]['value']) ? ($options[$args['label_for']]['value']) : ('') ?>"/>
            <span>redirect to*&nbsp;</span><input type="text" placeholder="/page-URN/?query=string" style="vertical-align:middle"
                   name="<?php echo $optionName . '[redirect]'; ?>"
                   value="<?php echo isset($options[$args['label_for']]['redirect']) ? ($options[$args['label_for']]['redirect']) : ('') ?>"/>
            <span>from*&nbsp;</span><input type="text" placeholder="/page-URN/?query=string" style="vertical-align:middle" name="<?php echo $optionName . '[from]'; ?>"
                   value="<?php echo isset($options[$args['label_for']]['from']) ? ($options[$args['label_for']]['from']) : ('') ?>"/>
            <select
                    autocomplete="off"
                    class="js-foxlis-geo-redirect-status"
                    data-custom="<?php echo esc_attr($args['foxlis_geo_custom_data']); ?>"
                    name="<?php echo $optionName . '[status]'; ?>">
                <option value="enable" <?php echo isset($options[$args['label_for']]['status']) ? (selected($options[$args['label_for']]['status'], 'enable', false)) : (''); ?>>
                    <?php esc_html_e('Enable', 'foxlis_geo'); ?>
                </option>
                <option value="once" <?php echo isset($options[$args['label_for']]['status']) ? (selected($options[$args['label_for']]['status'], 'once', false)) : (''); ?>>
                    <?php esc_html_e('Once*', 'foxlis_geo'); ?>
                </option>
                <option value="ask" <?php echo isset($options[$args['label_for']]['status']) ? (selected($options[$args['label_for']]['status'], 'ask', false)) : (''); ?>>
                    <?php esc_html_e('Ask*', 'foxlis_geo'); ?>
                </option>
                <option value="disable" <?php echo isset($options[$args['label_for']]['status']) ? (selected($options[$args['label_for']]['status'], 'disable', false)) : (''); ?>>
                    <?php esc_html_e('Disable', 'foxlis_geo'); ?>
                </option>
                <option value="remove" <?php echo isset($options[$args['label_for']]['status']) ? (selected($options[$args['label_for']]['status'], 'remove', false)) : (''); ?>>
                    <?php esc_html_e('Remove', 'foxlis_geo'); ?>
                </option>
            </select>
        </div>
        <div class="wrap">
            <input name="<?php echo $optionName . '[urn]'; ?>" type="checkbox" value="1" <?php echo isset($options[$args['label_for']]['urn']) ? (checked($options[$args['label_for']]['urn'])) : (''); ?>/>
            <span>With from* page <a href="https://en.wikipedia.org/wiki/Uniform_Resource_Name" target="_blank">URN</a></span>&nbsp;
            <input name="<?php echo $optionName . '[query]'; ?>" type="checkbox" value="1" <?php echo isset($options[$args['label_for']]['query']) ? (checked($options[$args['label_for']]['query'])) : (''); ?>/>
            <span>With from* page <a href="https://en.wikipedia.org/wiki/Query_string" target="_blank">query</a></span>&nbsp;
            <input name="<?php echo $optionName . '[ignore_query]'; ?>" type="checkbox" value="1" <?php echo isset($options[$args['label_for']]['ignore_query']) ? (checked($options[$args['label_for']]['ignore_query'])) : (''); ?>/>
            <span>Ignore <a href="https://en.wikipedia.org/wiki/Query_string" target="_blank">query</a> in from* <a href="https://en.wikipedia.org/wiki/Uniform_Resource_Identifier" target="_blank">URI</a> conditions</span>&nbsp;
            <input name="<?php echo $optionName . '[from_as_regex]'; ?>" type="checkbox" value="1" <?php echo isset($options[$args['label_for']]['from_as_regex']) ? (checked($options[$args['label_for']]['from_as_regex'])) : (''); ?>/>
            <span>Use from* as <a href="https://en.wikipedia.org/wiki/Regular_expression" target="_blank">regular expression</a></span>&nbsp;
        </div>
        <div class="wrap js-ask-question<?php echo isset($options[$args['label_for']]['status']) ? (selected($options[$args['label_for']]['status'], 'ask', false) ? '' : ' hidden') : (' hidden'); ?>">
            <input
                type="text"
                name="<?php echo $optionName . '[question]'; ?>"
                placeholder="Your question to redirect"
                value="<?php echo isset($options[$args['label_for']]['question']) ? ($options[$args['label_for']]['question']) : ('') ?>"
            />
            <input
                type="text"
                name="<?php echo $optionName . '[confirm]'; ?>"
                placeholder="Your confirm button text"
                value="<?php echo isset($options[$args['label_for']]['confirm']) ? ($options[$args['label_for']]['confirm']) : ('') ?>"
            />
            <input
                type="text"
                name="<?php echo $optionName . '[cancel]'; ?>"
                placeholder="Your cancel button text"
                value="<?php echo isset($options[$args['label_for']]['cancel']) ? ($options[$args['label_for']]['cancel']) : ('') ?>"
            />
        </div>
        <?php
    }
}

if (!function_exists('foxlis_geo_options_redirect_page_html')) {
    function foxlis_geo_options_redirect_page_html()
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
            add_settings_error('foxlis_geo_messages', 'foxlis_geo_message', __('Settings Saved', 'foxlis_geo_redirect'), 'updated');
        }

        // show error/update messages
        settings_errors('foxlis_geo_messages');
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post" class="js-foxlis-geo-redirect-form">
                <?php
                // output security fields for the registered setting "foxlis_geo_redirect"
                settings_fields('foxlis_geo_redirect');
                // output setting sections and their fields
                // (sections are registered for "foxlis_geo", each field is registered to a specific section)
                do_settings_sections('foxlis_geo_redirect');
                ?>
                <button type="button" class="button js-foxlis-geo-redirect-add">Add</button>
                <p>* Redirect to should start from "http(s)" or "/".</p>
                <p>* From field can be empty for applying rule to all URNs.</p>
                <p>* Once means that user will be redirect by this rule only 1 time per session.</p>
                <p>* Ask means that you can ask a question for redirect.</p>
                <?php
                // output save settings button
                submit_button('Save Settings');
                ?>
            </form>
            <h3>Recommendations</h3>
            <ul>
                <li>Don't forget to enable redirect at the <a href="<?php menu_page_url('foxlis_geo_options') ?>">options
                        tab</a>.<br /><br />
                </li>
                <li>
                    Use "foxlis-geo-stop-redirect=1" in query string to turn off any redirects.<br />
                    You can add that query param at the "redirect to" option field to stop future redirects.<br /><br />
                </li>
                <li>You can use your language or english geo names.</li>
                <li>Get exact GEO place name and test IPs you may <a href="https://foxlis.com/geo" target="_blank">here</a>.</li>
                <li>Report about bugs <a href="https://foxlis.com/profile/contact" target="_blank">here</a>.</li>
                <li>Be careful, avoid infinity cycled redirects!</li>
            </ul>
        </div>
        <?php
    }
}

if (!function_exists('foxlis_geo_redirect_admin_js')) {
    add_action('admin_enqueue_scripts', 'foxlis_geo_redirect_admin_js');
    function foxlis_geo_redirect_admin_js()
    {
        wp_enqueue_script('foxlis-geo-redirect-admin', plugins_url('/admin/js/redirect.js?20210412', __FILE__));
    }
}
