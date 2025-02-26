<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Rankology Bot
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_request_bot() {
    check_ajax_referer('rankology_request_bot_nonce');

    if (current_user_can(rankology_capability('manage_options', 'bot')) && is_admin()) {
        //Init
        $data = [];

        //Cleaning rankology_bot post type
        if ('1' === rankology_fno_get_service('OptionBot')->getBotScanSettingsCleaning() && isset($_POST['offset']) && 0 == $_POST['offset']) {
            global $wpdb;

            // delete all posts by post type.
            $sql = 'DELETE `posts`, `pm`
				FROM `' . $wpdb->prefix . 'posts` AS `posts`
				LEFT JOIN `' . $wpdb->prefix . 'postmeta` AS `pm` ON `pm`.`post_id` = `posts`.`ID`
				WHERE `posts`.`post_type` = \'rankology_bot\'';
            $wpdb->query($sql);
        }

        if (isset($_POST['offset'])) {
            $offset = absint($_POST['offset']);
        }

        if (!empty(rankology_fno_get_service('OptionBot')->getBotScanSettingsPostTypes())) {
            $rankology_bot_post_types_cpt_array = [];
            foreach (rankology_fno_get_service('OptionBot')->getBotScanSettingsPostTypes() as $cpt_key => $cpt_value) {
                foreach ($cpt_value as $_cpt_key => $_cpt_value) {
                    if ('1' == $_cpt_value) {
                        array_push($rankology_bot_post_types_cpt_array, $cpt_key);
                    }
                }
            }

            if ('' != rankology_fno_get_service('OptionBot')->getBotScanSettingsNumber() && rankology_fno_get_service('OptionBot')->getBotScanSettingsNumber() >= 10) {
                $limit = rankology_fno_get_service('OptionBot')->getBotScanSettingsNumber();
            } else {
                $limit = 100;
            }

            global $post;

            if ($offset > $limit) {
                wp_reset_query();
                //Log date
                update_option('rankology_bot_log', current_time('Y-m-d H:i'), 'yes');

                $offset = 'done';
            } else {
                $args = [
                    'posts_per_page' => 1,
                    'offset' => $offset,
                    'cache_results' => false,
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'post_type' => $rankology_bot_post_types_cpt_array,
                    'post_status' => 'publish',
                    'fields' => 'ids',
                ];
                $args = apply_filters('rankology_bot_query', $args);
                $bot_query = get_posts($args);

                if ($bot_query) {
                    //DOM
                    $dom = new DOMDocument();
                    $internalErrors = libxml_use_internal_errors(true);
                    $dom->preserveWhiteSpace = false;

                    //Get source code
                    if ('' != rankology_fno_get_service('OptionBot')->getBotScanSettingsTimeout()) {
                        $timeout = rankology_fno_get_service('OptionBot')->getBotScanSettingsTimeout();
                    } else {
                        $timeout = 5;
                    }

                    //Get cookies
                    if (isset($_COOKIE)) {
                        $cookies = [];

                        foreach ($_COOKIE as $name => $value) {
                            if ('PHPSESSID' !== $name) {
                                $cookies[] = new WP_Http_Cookie(['name' => $name, 'value' => $value]);
                            }
                        }
                    }

                    $args = [
                        'blocking' => true,
                        'timeout' => $timeout,
                        'sslverify' => false,
                        'compress' => true,
                        'redirection' => 4,
                    ];

                    if (isset($cookies) && ! empty($cookies)) {
                        $args['cookies'] = $cookies;
                    }

                    foreach ($bot_query as $post) {
                        if ('' === rankology_fno_get_service('OptionBot')->getBotScanSettingsWhere() || 'post_content' === rankology_fno_get_service('OptionBot')->getBotScanSettingsWhere()) {//post content
                            //this code will not run shortcodes
                            $response = get_post_field('post_content', $post);
                        } else { //body page
                            $response = wp_remote_get(get_permalink($post), $args);

                            //Check for error
                            if (is_wp_error($response) || '404' === wp_remote_retrieve_response_code($response)) {
                                $data['post_title'] = __('Unable to request page: ', 'wp-rankology') . get_the_title($post);
                            } else {
                                $response = wp_remote_retrieve_body($response);
                            }
                        }

                        if ( ! is_wp_error($response) || '404' !== wp_remote_retrieve_response_code($response)) {
                            if (get_the_title($post)) {
                                $data['post_title'] = get_the_title($post) . ' (' . get_permalink($post) . ')';

                                if ($dom->loadHTML('<?xml encoding="utf-8" ?>' . $response)) {
                                    $xpath = new DOMXPath($dom);

                                    //Links
                                    $links = $xpath->query('//a');

                                    if ( ! empty($links)) {
                                        foreach ($links as $key => $link) {
                                            $links2 = [];
                                            $links3 = [];

                                            $href = $link->getAttribute('href');
                                            $text = esc_attr($link->textContent);

                                            //remove anchors
                                            if ('#' != $href) {
                                                $links2[$text] = $href;
                                            }

                                            //remove duplicates
                                            $links2 = array_unique($links2);

                                            foreach ($links2 as $_key => $_value) {
                                                $args = [
                                                    'timeout' => $timeout,
                                                    'blocking' => true,
                                                    'sslverify' => false,
                                                    'compress' => true,
                                                ];

                                                $response = wp_remote_get($_value, $args);

                                                $bot_status_code = wp_remote_retrieve_response_code($response);

                                                if ( ! $bot_status_code) {
                                                    $bot_status_code = __('domain not found', 'wp-rankology');
                                                }

                                                if ('1' === rankology_fno_get_service('OptionBot')->getBotScanSettingsType()) {
                                                    $bot_status_type = wp_remote_retrieve_header($response, 'content-type');
                                                }

                                                if ('1' === rankology_fno_get_service('OptionBot')->getBotScanSettings404()) {
                                                    if ('404' == $bot_status_code || strpos(json_encode($response), 'cURL error 6')) {
                                                        $links3[] = $_value;
                                                    }
                                                } else {
                                                    $links3[] = $_value;
                                                }
                                            }

                                            foreach ($links3 as $_key => $_value) {
                                                $check_page_id = rankology_fno_get_service('Redirection')->getPageByTitle($_value, '', 'rankology_bot');

                                                if (is_bool($check_page_id)) {
                                                    wp_insert_post(
                                                        [
                                                            'post_title' => $_value,
                                                            'post_type' => 'rankology_bot',
                                                            'post_status' => 'publish',
                                                            'meta_input' => [
                                                                'rankology_bot_response' => json_encode($response),
                                                                'rankology_bot_type' => $bot_status_type,
                                                                'rankology_bot_status' => $bot_status_code,
                                                                'rankology_bot_source_url' => get_permalink($post),
                                                                'rankology_bot_source_id' => $post,
                                                                'rankology_bot_cpt' => get_post_type($post),
                                                                'rankology_bot_source_title' => get_the_title($post),
                                                                'rankology_bot_a_title' => $text,
                                                            ],
                                                        ]
                                                    );
                                                } elseif (!is_bool($check_page_id) && $check_page_id->post_title == $_value) {
                                                    $rankology_bot_count = get_post_meta($check_page_id->ID, 'rankology_bot_count', true);
                                                    update_post_meta($check_page_id->ID, 'rankology_bot_count', ++$rankology_bot_count);
                                                }

                                                $data['link'][] = $_value;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }//End foreach
                    libxml_use_internal_errors($internalErrors);
                    ++$offset;
                } else {
                    wp_reset_query();
                    //Log date
                    update_option('rankology_bot_log', current_time('Y-m-d H:i'), 'yes');

                    $offset = 'done';
                }
            }
        }
        $data['offset'] = $offset;

        //Return
        wp_send_json_success($data);
    }
}
add_action('wp_ajax_rankology_request_bot', 'rankology_request_bot');

//Admin Columns
if (is_plugin_active('admin-columns-pro/admin-columns-pro.php')) {
    add_action('ac/column_groups', 'ac_register_rankology_column_group');
    function ac_register_rankology_column_group(AC\Groups $groups) {
        $groups->register_group('rankology', 'Rankology');
    }

    add_action('ac/column_types', 'ac_register_rankology_columns');
    function ac_register_rankology_columns(AC\ListScreen $list_screen) {
        if ($list_screen instanceof ACP\ListScreen\Post) {
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_title.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_desc.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_noindex.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_nofollow.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_target_kw.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_redirect.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_redirect_url.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_canonical.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_gsc_positions.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_gsc_clicks.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_gsc_impressions.php';
            require_once plugin_dir_path(__FILE__) . 'thirds/admin-columns/acp-column-rkseo_gsc_ctr.php';

            $list_screen->register_column_type(new ACP_Column_rkseo_title());
            $list_screen->register_column_type(new ACP_Column_rkseo_desc());
            $list_screen->register_column_type(new ACP_Column_rkseo_noindex());
            $list_screen->register_column_type(new ACP_Column_rkseo_nofollow());
            $list_screen->register_column_type(new ACP_Column_rkseo_target_kw());
            $list_screen->register_column_type(new ACP_Column_rkseo_redirect());
            $list_screen->register_column_type(new ACP_Column_rkseo_redirect_url());
            $list_screen->register_column_type(new ACP_Column_rkseo_canonical());
            $list_screen->register_column_type(new ACP_Column_rkseo_gsc_positions());
            $list_screen->register_column_type(new ACP_Column_rkseo_gsc_clicks());
            $list_screen->register_column_type(new ACP_Column_rkseo_gsc_impressions());
            $list_screen->register_column_type(new ACP_Column_rkseo_gsc_ctr());
        }
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//LB Widget order
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_fno_lb_widget() {
    check_ajax_referer('rankology_fno_lb_widget_nonce');
    if (current_user_can('edit_theme_options') && is_admin()) {
        if (isset($_POST['order']) && $_POST['order'] && isset($_POST['id']) && $_POST['id']) {
            $widget_option = get_option('widget_rankology_fno_lb_widget');

            $widget_option[(int)$_POST['id']]['order'] = $_POST['order'];

            update_option('widget_rankology_fno_lb_widget', $widget_option);
        }
    }

    wp_send_json_success();
}
add_action('wp_ajax_rankology_fno_lb_widget', 'rankology_fno_lb_widget');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Clear Google Page Speed cache
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_clear_page_speed_cache() {
    check_ajax_referer('rankology_clear_page_speed_cache_nonce');

    global $wpdb;

    $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_rankology_results_page_speed' ");
    $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_rankology_results_page_speed' ");
    $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_rankology_results_page_speed_desktop' ");
    $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_timeout_rankology_results_page_speed_desktop' ");

    exit();
}
add_action('wp_ajax_rankology_clear_page_speed_cache', 'rankology_clear_page_speed_cache');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Lock Google Analytics view
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_google_analytics_lock() {
    check_ajax_referer('rankology_google_analytics_lock_nonce');

    update_option('rankology_google_analytics_lock_option_name', '1', 'yes');

    wp_send_json_success();
}
add_action('wp_ajax_rankology_google_analytics_lock', 'rankology_google_analytics_lock');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Save htaccess file
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_save_htaccess() {
    check_ajax_referer('rankology_save_htaccess_nonce');

    if (!current_user_can(rankology_capability('manage_options', 'htaccess')) && !is_admin()) {
        exit;
    }
    $filename = get_home_path() . '/.htaccess';

    if (!file_exists(get_home_path() . '/.htaccess')) {
        $msg = __('Impossible to open file: ', 'wp-rankology') . $filename;
        $class = 'is-error';
    }
    $old_htaccess = file_get_contents($filename);

    if (isset($_POST['htaccess_content'])) {
        $current_htaccess = stripslashes($_POST['htaccess_content']);
    }

    if (is_writable($filename)) {
        if ( ! $handle = fopen($filename, 'w')) {
            $msg = __('Impossible to open file: ', 'wp-rankology') . $filename;
            $class = 'is-error';
        }

        if (false === fwrite($handle, $current_htaccess)) {
            $msg = __('Impossible to write in file: ', 'wp-rankology') . $filename;
            $class = 'is-error';
        }

        fclose($handle);

        $args = [
            'blocking' => true,
            'redirection' => 0,
        ];

        $test  = wp_remote_retrieve_response_code( wp_remote_get( get_home_url(), $args ) );

        if (is_wp_error($test) || 200 !== $test) {
            $handle = fopen($filename, 'w');
            fwrite($handle, $old_htaccess);
            fclose($handle);

            $msg = __('.htaccess not updated due to a syntax error!', 'wp-rankology');
            $class = 'is-error';
        } else {
            $msg = __('.htaccess successfully updated!', 'wp-rankology');
            $class = 'is-success';
        }

    } else {
        $msg = __('Your .htaccess is not writable.', 'wp-rankology');
        $class = 'is-error';
    }

    $data = [
        'msg' => $msg,
        'class' => $class
    ];

    wp_send_json_success($data);
}
add_action('wp_ajax_rankology_save_htaccess', 'rankology_save_htaccess');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Inspect URL with Google Search Console API
///////////////////////////////////////////////////////////////////////////////////////////////////
add_action('wp_ajax_rankology_inspect_url', 'rankology_inspect_url');
function rankology_inspect_url() {
    check_ajax_referer('rankology_inspect_url_nonce');

    if ( ! current_user_can('edit_posts') && ! is_admin()) {
        return;
    }


    $data = [];

    //Get post id
    if (isset($_POST['post_id'])) {
        $id = $_POST['post_id'];
    }

    if (empty($id)) {
        return;
    }

    $data = rankology_fno_get_service('InspectUrlGoogle')->handle($id);

    wp_send_json_success($data);
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Open AI - Generate SEO metadata
///////////////////////////////////////////////////////////////////////////////////////////////////
add_action('wp_ajax_rankology_ai_generate_seo_meta', 'rankology_ai_generate_seo_meta');
function rankology_ai_generate_seo_meta() {
    check_ajax_referer('rankology_ai_generate_seo_meta_nonce');

    if ( ! current_user_can('edit_posts') && ! is_admin()) {
        return;
    }

    $data = [];

    //Get post id
    if (isset($_POST['post_id'])) {
        $post_id = (int)$_POST['post_id'];
    }

    if (empty($post_id)) {
        return;
    }

    if (isset($_POST['lang'])) {
        $language = esc_html($_POST['lang']);
    }

    $data = rankology_fno_get_service('Completions')->generateTitlesDesc($post_id, '', $language);

    wp_send_json_success($data);
}
