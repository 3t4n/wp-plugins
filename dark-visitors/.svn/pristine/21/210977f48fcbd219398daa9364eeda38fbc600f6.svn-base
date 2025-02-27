<?php

// User Agent Strings List

function dark_visitors_get_user_agent_strings_list() {
    $cached_user_agent_strings_list = get_option(DARK_VISITORS_USER_AGENT_STRINGS_LIST);

    if ($cached_user_agent_strings_list === false) {
        return dark_visitors_refresh_and_return_user_agent_strings_list();
    } else {
        return $cached_user_agent_strings_list;
    }
}

function dark_visitors_refresh_and_return_user_agent_strings_list() {
    $access_token = get_option(DARK_VISITORS_ACCESS_TOKEN);

    if ($access_token) {
        $headers = array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token
        );

        $body = array(
            'agent_types' => dark_visitors_get_agent_types_array(),
            'wordpress_plugin_version' => DARK_VISITORS_WORDPRESS_PLUGIN_VERSION
        );

        $response = wp_remote_post('https://api.darkvisitors.com/user-agent-strings-lists', array(
            'headers' => $headers,
            'body' => wp_json_encode($body),
            'blocking' => true
        ));

        if (dark_visitors_is_network_response_code_successful($response)) {
            $user_agent_strings_list = json_decode(wp_remote_retrieve_body($response), true);

            update_option(DARK_VISITORS_USER_AGENT_STRINGS_LIST, $user_agent_strings_list);

            return $user_agent_strings_list;
        } else {
            $user_agent_strings_list = array();

            update_option(DARK_VISITORS_USER_AGENT_STRINGS_LIST, $user_agent_strings_list);

            return $user_agent_strings_list;
        }
    } else {
        return array();
    }
}

// Robots.txt

function dark_visitors_get_robots_txt() {
    $cached_robots_txt = get_option(DARK_VISITORS_ROBOTS_TXT);

    if ($cached_robots_txt === false) {
        return dark_visitors_refresh_and_return_robots_txt();
    } else {
        return $cached_robots_txt;
    }
}

function dark_visitors_refresh_and_return_robots_txt() {
    $access_token = get_option(DARK_VISITORS_ACCESS_TOKEN);

    if ($access_token) {
        $headers = array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token
        );

        $body = array(
            'disallow' => '/',
            'agent_types' => dark_visitors_get_agent_types_array(),
            'wordpress_plugin_version' => DARK_VISITORS_WORDPRESS_PLUGIN_VERSION
        );

        $response = wp_remote_post('https://api.darkvisitors.com/robots-txts', array(
            'headers' => $headers,
            'body' => wp_json_encode($body),
            'blocking' => true
        ));

        if (dark_visitors_is_network_response_code_successful($response)) {
            $robots_txt = wp_remote_retrieve_body($response);

            update_option(DARK_VISITORS_ROBOTS_TXT, $robots_txt);

            return $robots_txt;
        } else {
            $robots_txt = '';

            update_option(DARK_VISITORS_ROBOTS_TXT, $robots_txt);

            return $robots_txt;
        }
    } else {
        return '';
    }
}

// User

function dark_visitors_get_user() {
    $cached_user = get_option(DARK_VISITORS_USER);

    if ($cached_user === false) {
        return dark_visitors_refresh_and_return_user();
    } else {
        return $cached_user;
    }
}

function dark_visitors_refresh_and_return_user() {
    $access_token = get_option(DARK_VISITORS_ACCESS_TOKEN);

    if ($access_token) {
        $headers = array(
            'Authorization' => 'Bearer ' . $access_token
        );

        $response = wp_remote_get('https://api.darkvisitors.com/user', array(
            'headers' => $headers,
            'blocking' => true
        ));

        if (dark_visitors_is_network_response_code_successful($response)) {
            $user = json_decode(wp_remote_retrieve_body($response), true);

            update_option(DARK_VISITORS_USER, $user);

            return $user;
        } else {
            $user = array();

            update_option(DARK_VISITORS_USER, $user);

            return $user;
        }
    } else {
        return array();
    }
}

// User Helpers

function dark_visitors_get_user_is_analytics_disallowed() {
    $access_token = get_option(DARK_VISITORS_ACCESS_TOKEN);

    if ($access_token) {
        $user = dark_visitors_get_user();

        if (isset($user['is_analytics_allowed'])) {
            return !$user['is_analytics_allowed'];
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function dark_visitors_get_user_is_robots_txt_enforcement_disallowed() {
    $access_token = get_option(DARK_VISITORS_ACCESS_TOKEN);

    if ($access_token) {
        $user = dark_visitors_get_user();

        if (isset($user['is_robots_txt_enforcement_allowed'])) {
            return !$user['is_robots_txt_enforcement_allowed'];
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function dark_visitors_get_user_analytics_script_tag() {
    $user = dark_visitors_get_user();
    return $user['analytics_script_tag'] ?? "";
}

// Caching

function dark_visitors_clear_caches($option_name) {
    $cache_clearing_option_names = array(
        DARK_VISITORS_ACCESS_TOKEN,
        DARK_VISITORS_IS_ANALYTICS_ENABLED,
        DARK_VISITORS_IS_ENFORCE_ROBOTS_TXT_ENABLED,
        DARK_VISITORS_IS_BLOCK_AI_ASSISTANTS_ENABLED,
        DARK_VISITORS_IS_BLOCK_AI_DATA_SCRAPERS_ENABLED,
        DARK_VISITORS_IS_BLOCK_AI_SEARCH_CRAWLERS_ENABLED,
        DARK_VISITORS_IS_BLOCK_UNDOCUMENTED_AI_AGENTS_ENABLED,
    );

    if (in_array($option_name, $cache_clearing_option_names)) {
        delete_option(DARK_VISITORS_USER_AGENT_STRINGS_LIST);
        delete_option(DARK_VISITORS_ROBOTS_TXT);
        delete_option(DARK_VISITORS_USER);
    }
}

add_action('update_option', 'dark_visitors_clear_caches');

// Cron Jobs

add_action(DARK_VISITORS_DAILY_CRON_EVENT, 'dark_visitors_refresh_and_return_user_agent_strings_list');
add_action(DARK_VISITORS_DAILY_CRON_EVENT, 'dark_visitors_refresh_and_return_robots_txt');
add_action(DARK_VISITORS_EVERY_FIVE_MINUTES_CRON_EVENT, 'dark_visitors_refresh_and_return_user');

// Helpers

function dark_visitors_get_agent_types_array() {
    $is_block_ai_assistants_enabled = get_option(DARK_VISITORS_IS_BLOCK_AI_ASSISTANTS_ENABLED, '0') === '1';
    $is_block_ai_data_scrapers_enabled = get_option(DARK_VISITORS_IS_BLOCK_AI_DATA_SCRAPERS_ENABLED, '0') === '1';
    $is_block_ai_search_crawlers_enabled = get_option(DARK_VISITORS_IS_BLOCK_AI_SEARCH_CRAWLERS_ENABLED, '0') === '1';
    $is_block_undocumented_ai_agents_enabled = get_option(DARK_VISITORS_IS_BLOCK_UNDOCUMENTED_AI_AGENTS_ENABLED, '0') === '1';

    $agent_types = array();

    if ($is_block_ai_assistants_enabled) {
        array_push($agent_types, 'AI Assistant');
    }

    if ($is_block_ai_data_scrapers_enabled) {
        array_push($agent_types, 'AI Data Scraper');
    }

    if ($is_block_ai_search_crawlers_enabled) {
        array_push($agent_types, 'AI Search Crawler');
    }

    if ($is_block_undocumented_ai_agents_enabled) {
        array_push($agent_types, 'Undocumented AI Agent');
    }

    return $agent_types;
}

function dark_visitors_is_network_response_code_successful($response) {
    return !is_wp_error($response) && wp_remote_retrieve_response_code($response) >= 200 && wp_remote_retrieve_response_code($response) < 300;
}
