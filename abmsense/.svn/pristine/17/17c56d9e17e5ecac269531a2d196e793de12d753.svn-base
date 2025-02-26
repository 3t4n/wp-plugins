<?php

if (!defined('ABSPATH')) exit;

// Function to track visitor information and update the databases
function abmsense_track_visitor() {
    global $wpdb;

    // Collect basic visitor information
    $customer_name = isset($_SERVER['SERVER_NAME']) ? sanitize_text_field(wp_unslash($_SERVER['SERVER_NAME'])) : '';
    $visitor_ip = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])) : '';
    $header_ip = abmsense_get_real_ip_from_headers();
    $page_title = html_entity_decode(wp_get_document_title(), ENT_QUOTES, 'UTF-8');

    // Get additional visitor info (city, country, company)
    $visitor_info = abmsense_get_visitor_info($visitor_ip);
    if (!$visitor_info) {
        return;
    }

    // Check cache for account_id
    $cache_key = ABMSENSE_PREFIX . 'account_id_' . md5($visitor_ip . $header_ip . $page_title);
    $account_id = wp_cache_get($cache_key);

    // If not in cache, query the database
    if (false === $account_id) {
        $account_id = $wpdb->get_var($wpdb->prepare(
            "SELECT account_id FROM {$wpdb->prefix}" . ABMSENSE_PREFIX . "temp_data 
             WHERE (visitor_ip = %s OR header_ip = %s) AND page_title = %s",
            $visitor_ip, $header_ip, $page_title
        ));

        wp_cache_set($cache_key, $account_id, '', HOUR_IN_SECONDS);
    }

    // Exit if no account_id found
    if (!$account_id) return;

    // Prepare data for API
    $query_params = [
        'customer_name'    => $customer_name,
        'visitor_ip'       => $visitor_ip,
        'header_ip'        => $header_ip,
        'account_id'       => $account_id,
        'visitor_city'     => $visitor_info['city'],
        'visitor_country'  => $visitor_info['country'],
        'visitor_company'  => $visitor_info['company'],
        'page_title'       => $page_title,
        'time_spent'       => 0,   // Initial value
        'page_view'        => 1,   // Initial page view count
        'last_update'      => current_time('mysql'),
        'is_isp_tested'    => 0
    ];

    // Get API configuration
    $api_config = include('db_config.php');
    $public_key = $api_config['public_key'];

    // Encrypt the data
    $encrypted_data = abmsense_encrypt_data($query_params, $public_key);

    // Check for encryption errors
    if (!$encrypted_data || is_wp_error($encrypted_data)) {
        abmsense_log('Encryption failed: ' . ($encrypted_data->get_error_message() ?? 'Unknown error'), 'error');
        return;
    }

    // Prepare API request
    $json_body = wp_json_encode($encrypted_data); // Direct encoding, no wrapping needed
    if (false === $json_body) {
        abmsense_log('JSON encoding failed', 'error');
        return;
    }

    // Set up API request with SSL verification
    $main_data_url = $api_config['upsert_abmsense_main_data'];
    $args = abmsense_get_api_request_args($json_body);
    
    // Make API request
    $response = wp_remote_post($main_data_url, $args);

    // Handle SSL certificate errors
    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        abmsense_log('API request failed: ' . $error_message, 'error');
        
        // Try alternate SSL certificate path if SSL verification fails
        if (strpos($error_message, 'SSL certificate problem') !== false) {
            $args['sslcertificates'] = ABSPATH . WPINC . '/certificates/ca-bundle.crt';
            $response = wp_remote_post($main_data_url, $args);
            
            if (is_wp_error($response)) {
                abmsense_log('SSL retry failed: ' . $response->get_error_message(), 'error');
                return;
            }
        } else {
            return;
        }
    }

    // Clear the cache after successful update
    wp_cache_delete($cache_key);
}

// Hook the function to run when the WordPress page loads
add_action('wp', 'abmsense_track_visitor');
