<?php

// Server Analytics

function dark_visitors_send_visit_request() {
    $access_token = get_option(DARK_VISITORS_ACCESS_TOKEN);
    $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? sanitize_text_field(wp_unslash($_SERVER['HTTP_USER_AGENT'])) : false;

    $should_send_visit_request = dark_visitors_is_analytics_enabled_and_allowed();
    $should_get_user_agent_strings_list = dark_visitors_is_enforce_robots_txt_enabled_and_allowed();

    $user_agent_strings_list = $should_get_user_agent_strings_list ? dark_visitors_get_user_agent_strings_list() : array();
    $is_blocked = $user_agent && in_array($user_agent, $user_agent_strings_list);

    $request_path = isset($_SERVER['REQUEST_URI']) ? sanitize_url(wp_unslash($_SERVER['REQUEST_URI'])) : false;
    $request_method = isset($_SERVER['REQUEST_METHOD']) ? sanitize_text_field(wp_unslash($_SERVER['REQUEST_METHOD'])) : false;
    $request_headers = dark_visitors_get_request_headers();

    // Send the visit request if needed

    if ($should_send_visit_request && $access_token && $request_path && $request_method && !dark_visitors_is_system_request($request_path)) {
        $headers = array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $access_token
        );

        $body = array(
            'request_path' => $request_path,
            'request_method' => $request_method,
            'request_headers' => $request_headers,
            'is_blocked' => $is_blocked,
            'wordpress_plugin_version' => DARK_VISITORS_WORDPRESS_PLUGIN_VERSION
        );

        wp_remote_post('https://api.darkvisitors.com/visits', array(
            'headers' => $headers,
            'body' => wp_json_encode($body),
            'blocking' => false
        ));
    }

    // Block the visit if needed

    if ($is_blocked) {        
        status_header(403);
        nocache_headers();

        echo 'This visit is disallowed by robots.txt rules. Please contact the website owner if you think this is a mistake.';

        exit();
    }
}

add_action('wp_loaded', 'dark_visitors_send_visit_request');

// Client Analytics

function dark_visitors_add_analytics_script_tag() {
    $should_add_analytics_script_tag = dark_visitors_is_analytics_enabled_and_allowed();

    if ($should_add_analytics_script_tag) {
        echo "
<!-- Dark Visitors (https://darkvisitors.com/) -->
";
    
        echo dark_visitors_get_user_analytics_script_tag();

        echo "
";
    }
}

add_action('wp_head', 'dark_visitors_add_analytics_script_tag');

// Helpers

function dark_visitors_get_request_headers() {
    $header_names = [
        'User-Agent',
        'Referer',
        'From',
        'X-Country-Code',
        'Remote-Addr',
        'X-Forwarded-For',
        'X-Real-IP',
        'Client-IP',
        'CF-Connecting-IP',
        'X-Cluster-Client-IP',
        'Forwarded',
        'X-Original-Forwarded-For',
        'Fastly-Client-IP',
        'True-Client-IP',
        'X-Appengine-User-IP'
    ];

    $request_headers = [];

    foreach ($header_names as $header_name) {
        $header_value = dark_visitors_get_request_header_value($header_name);

        if ($header_value) {
            $request_headers[$header_name] = $header_value;
        }
    }
    
    return $request_headers;
}

function dark_visitors_get_request_header_value($header_name) {
    $server_key = strtoupper(str_replace('-', '_', $header_name));
    $server_key_with_http_prefix = 'HTTP_' . $server_key;

    if (isset($_SERVER[$server_key])) {
        return sanitize_text_field(wp_unslash($_SERVER[$server_key]));
    } else if (isset($_SERVER[$server_key_with_http_prefix])) {
        return sanitize_text_field(wp_unslash($_SERVER[$server_key_with_http_prefix]));
    } else if (function_exists('getallheaders')) {
        $headers_with_lowercase_keys = array_change_key_case(getallheaders(), CASE_LOWER);
        $lowercased_header_name = strtolower($header_name);

        if (isset($headers_with_lowercase_keys[$lowercased_header_name])) {
            return $headers_with_lowercase_keys[$lowercased_header_name];
        } else {
            return null;
        }
    } else {
        return null;
    }
}

function dark_visitors_is_system_request($request_path) {
    return (
        stripos($request_path, '/wp-admin') === 0 ||
        stripos($request_path, '/wp-login') === 0 ||
        stripos($request_path, '/wp-cron') === 0 ||
        stripos($request_path, '/wp-json') === 0 ||
        stripos($request_path, '/wp-includes') === 0 ||
        stripos($request_path, '/wp-content') === 0
    );
}

function dark_visitors_is_analytics_enabled_and_allowed() {
    $is_analytics_enabled = get_option(DARK_VISITORS_IS_ANALYTICS_ENABLED) === '1';
    $is_analytics_disallowed = dark_visitors_get_user_is_analytics_disallowed();
    return $is_analytics_enabled && !$is_analytics_disallowed;
}

function dark_visitors_is_enforce_robots_txt_enabled_and_allowed() {
    $is_enforce_robots_txt_enabled = get_option(DARK_VISITORS_IS_ENFORCE_ROBOTS_TXT_ENABLED) === '1';
    $is_robots_txt_enforcement_disallowed = dark_visitors_get_user_is_robots_txt_enforcement_disallowed();
    return $is_enforce_robots_txt_enabled && !$is_robots_txt_enforcement_disallowed;
}
