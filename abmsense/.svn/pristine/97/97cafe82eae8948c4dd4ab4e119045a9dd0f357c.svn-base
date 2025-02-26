<?php

if (!defined('ABSPATH')) exit;

function abmsense_log($message, $level = 'info') {
    // Define log levels
    $valid_levels = ['error', 'warning', 'info', 'success'];
    $level = in_array(strtolower($level), $valid_levels) ? strtolower($level) : 'info';

    // Create log entry
    $log_entry = gmdate('Y-m-d') . ' ' . strtoupper($level) . ': ' . $message . PHP_EOL;

    // Use WP_Filesystem to write log
    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once (ABSPATH . '/wp-admin/includes/file.php');
        WP_Filesystem();
    }

    if ($wp_filesystem) {
        $upload_dir = wp_upload_dir();
        $log_file = $upload_dir['basedir'] . '/abmsense_log.txt';
        
        // Read existing content
        $existing_content = $wp_filesystem->get_contents($log_file);
        if ($existing_content === false) {
            $existing_content = '';
        }
        
        // Append new log entry
        $wp_filesystem->put_contents($log_file, $existing_content . $log_entry, FS_CHMOD_FILE);
    }
}

function abmsense_encrypt_data($data, $public_key_pem) {
    // Load the public key
    $public_key = openssl_pkey_get_public($public_key_pem);
    if ($public_key === false) {
        return new WP_Error('encryption_error', esc_html__('Failed to load public key', 'abmsense') . ': ' . esc_html(openssl_error_string()));
    }

    // Generate a random 256-bit AES key
    $aes_key = random_bytes(32);

    // Generate IV
    $iv = random_bytes(16);

    // JSON encode the data
    $json_data = wp_json_encode($data);
    if ($json_data === false) {
        return new WP_Error('encryption_error', esc_html__('JSON encoding failed', 'abmsense'));
    }

    // Encrypt the data with AES-256-CBC
    $encrypted_data = openssl_encrypt($json_data, 'aes-256-cbc', $aes_key, OPENSSL_RAW_DATA, $iv);
    if ($encrypted_data === false) {
        return new WP_Error('encryption_error', esc_html__('AES encryption failed', 'abmsense') . ': ' . esc_html(openssl_error_string()));
    }

    // Encrypt the AES key with RSA public key
    $encrypted_aes_key = '';
    $result = openssl_public_encrypt($aes_key, $encrypted_aes_key, $public_key, OPENSSL_PKCS1_OAEP_PADDING);
    if ($result === false) {
        return new WP_Error('encryption_error', esc_html__('RSA encryption failed', 'abmsense') . ': ' . esc_html(openssl_error_string()));
    }

    return [
        'encrypted_data' => base64_encode($encrypted_data),
        'encrypted_key' => base64_encode($encrypted_aes_key),
        'iv' => base64_encode($iv)
    ];
}

function abmsense_verify_ssl_connection($url) {
    $parsed_url = parse_url($url);
    $host = $parsed_url['host'];
    $port = isset($parsed_url['port']) ? $parsed_url['port'] : 443;

    // Try to establish a basic SSL connection
    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => true,
            'verify_peer_name' => true,
            'allow_self_signed' => false
        ]
    ]);

    $socket = @stream_socket_client(
        "ssl://{$host}:{$port}",
        $errno,
        $errstr,
        30,
        STREAM_CLIENT_CONNECT,
        $context
    );

    if (!$socket) {
        abmsense_log("SSL Connection Test Failed: {$errstr} ({$errno})", 'warning');
        return false;
    }

    fclose($socket);
    return true;
}

// Update abmsense_safe_api_request to use the new verification
function abmsense_safe_api_request($url, $args) {
    // Check if we've recently had a successful SSL connection
    $ssl_cache_key = 'abmsense_ssl_verified_' . md5($url);
    $ssl_verified = get_transient($ssl_cache_key);
    
    if ($ssl_verified === false) {
        // Test SSL connection
        $ssl_working = abmsense_verify_ssl_connection($url);
        if ($ssl_working) {
            set_transient($ssl_cache_key, true, HOUR_IN_SECONDS);
        }
    }

    // First attempt with SSL verification
    $response = wp_remote_post($url, $args);
    
    if (!is_wp_error($response)) {
        return $response;
    }

    $error_message = $response->get_error_message();
    
    // If we get an SSL error
    if (strpos($error_message, 'SSL certificate problem') !== false || 
        strpos($error_message, 'certificate has expired') !== false) {
        
        abmsense_log("Initial SSL verification failed, attempting with alternate methods", 'warning');
        
        // Try with WordPress's CA bundle first
        $wp_bundle = ABSPATH . WPINC . '/certificates/ca-bundle.crt';
        if (file_exists($wp_bundle)) {
            $args['sslcertificates'] = $wp_bundle;
            $retry_response = wp_remote_post($url, $args);
            if (!is_wp_error($retry_response)) {
                return $retry_response;
            }
        }
        
        // If still failing, temporarily disable SSL verify
        abmsense_log("SSL verification with WordPress bundle failed, temporarily disabling SSL verify", 'warning');
        $args['sslverify'] = false;
        $final_response = wp_remote_post($url, $args);
        
        if (!is_wp_error($final_response)) {
            // Cache this result to avoid repeated SSL checks
            set_transient('abmsense_ssl_disabled_' . md5($url), true, HOUR_IN_SECONDS);
            return $final_response;
        }
    }
    
    // If we get here, all attempts failed
    abmsense_log("All API request attempts failed for URL: " . $url, 'error');
    return $response;
}