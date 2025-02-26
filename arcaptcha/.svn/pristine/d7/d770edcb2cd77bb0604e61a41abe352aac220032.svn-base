<?php

/**
 * Request file.
 *
 * @package arcaptcha-wp
 */

if (!function_exists('arcaptcha_request_verify')) {
    /**
     * Verify arcaptcha response.
     *
     * @param string $arcaptcha_response arcaptcha response.
     *
     * @return string fail|success
     */
    function arcaptcha_request_verify($arcaptcha_response)
    {
        // Sanitize the response
        $arcaptcha_response_sanitized = htmlspecialchars(
            sanitize_text_field($arcaptcha_response)
        );

        // Prepare the API request
        $response = wp_remote_post(
            'https://api.arcaptcha.ir/arcaptcha/api/verify',
            [
                'headers'     => ['Content-Type' => 'application/json; charset=utf-8'],
                'body'        => json_encode([
                    'challenge_id' => $arcaptcha_response_sanitized,
                    'site_key'     => get_option('arcaptcha_api_key'),
                    'secret_key'   => get_option('arcaptcha_secret_key')
                ]),
                'method'      => 'POST',
                'data_format' => 'body'
            ]
        );

        // Enable debug mode
        $debug = defined('WP_DEBUG') && WP_DEBUG;

        // Check for errors in the remote request
        if (is_wp_error($response)) {
            if ($debug) {
                echo 'Error: ' . $response->get_error_message();
            }
            return 'fail';
        }

        // Retrieve the body and status code
        $raw_body = wp_remote_retrieve_body($response);
        $status = wp_remote_retrieve_response_code($response);

        // Check if the body is empty
        if (empty($raw_body)) {
            if ($debug) {
                echo 'Error: No response body received';
            }
            return 'fail';
        }

        // Decode the body and check if it is valid JSON
        $body = json_decode($raw_body, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            if ($debug) {
                echo 'Error: Invalid JSON response';
            }
            return 'fail';
        }

        // Check for a successful status code and response success
        if ($status !== 200 || !isset($body['success']) || true !== (bool) $body['success']) {
            if ($debug) {
                echo 'Error: Verification failed or unsuccessful response';
            }
            return 'fail';
        }

        return 'success';
    }
}

if (!function_exists('arcaptcha_verify_POST')) {
    // phpcs:disable WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid

    /**
     * Verify POST.
     *
     * @param string $nonce_field_name  Nonce field name.
     * @param string $nonce_action_name Nonce action name.
     *
     * @return string fail|success|empty
     */
    function arcaptcha_verify_POST($nonce_field_name, $nonce_action_name)
    {
        // phpcs:enable WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid

        if (
            !isset($_POST[$nonce_field_name], $_POST['arcaptcha-token']) ||
            empty($_POST['arcaptcha-token']) ||
            !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[$nonce_field_name])), $nonce_action_name)
        ) {
            return 'empty';
        }

        return arcaptcha_request_verify(
            sanitize_text_field(wp_unslash($_POST['arcaptcha-token']))
        );
    }
}

if (!function_exists('arcaptcha_get_verify_output')) {
    /**
     * Get verify output.
     *
     * @param string $empty_message     Empty message.
     * @param string $fail_message      Fail message.
     * @param string $nonce_field_name  Nonce field name.
     * @param string $nonce_action_name Nonce action name.
     *
     * @return null|string
     */
    function arcaptcha_get_verify_output($empty_message, $fail_message, $nonce_field_name, $nonce_action_name)
    {
        $result = arcaptcha_verify_POST($nonce_field_name, $nonce_action_name);

        switch ($result) {
            case 'empty':
                return $empty_message;
            case 'fail':
                return $fail_message;
            default:
                return null;
        }
    }
}

if (!function_exists('arcaptcha_get_verify_message')) {
    /**
     * Get verify message.
     *
     * @param string $nonce_field_name  Nonce field name.
     * @param string $nonce_action_name Nonce action name.
     *
     * @return null|string
     */
    function arcaptcha_get_verify_message($nonce_field_name, $nonce_action_name)
    {
        return arcaptcha_get_verify_output(
            __('Please complete the captcha.', 'arcaptcha-plugin'),
            __('The Captcha is invalid.', 'arcaptcha-plugin'),
            $nonce_field_name,
            $nonce_action_name
        );
    }
}

if (!function_exists('arcaptcha_get_verify_message_html')) {
    /**
     * Get verify message html.
     *
     * @param string $nonce_field_name  Nonce field name.
     * @param string $nonce_action_name Nonce action name.
     *
     * @return null|string
     */
    function arcaptcha_get_verify_message_html($nonce_field_name, $nonce_action_name)
    {
        return arcaptcha_get_verify_output(
            __('<strong>Error</strong>: Please complete the captcha.', 'arcaptcha-plugin'),
            __('<strong>Error</strong>: The Captcha is invalid.', 'arcaptcha-plugin'),
            $nonce_field_name,
            $nonce_action_name
        );
    }
}
