<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function acpgc_plugin_url( $path = '' ) {
    $url = plugins_url( $path, ACPGC_PLUGIN );
    if ( is_ssl() && 'http:' == substr( $url, 0, 5 ) ) {
        $url = 'https:' . substr( $url, 5 );
    }
    return $url;
}

function acpgc_template_with_vars($template_path, $vars = []) {
    extract($vars);  // Make variables available to the template
    ob_start();
    include($template_path);
    return ob_get_clean();
}

add_action('wp_ajax_send_league_invite', 'acpgc_send_league_invite');
add_action('wp_ajax_nopriv_send_league_invite', 'acpgc_send_league_invite');

function acpgc_send_league_invite() {

    // Check for nonce first
    if (!isset($_POST['send_invite_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['send_invite_nonce'])), 'acpgc_send_invite_action')) {
        wp_die('Nonce verification failed, action not allowed', 'Security Error', 403);
    }

    global $wpdb;
    $league_invites_table = $wpdb->prefix . ACPGC_PREFIX . 'league_invites';

    // Sanitize and validate the email
    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : null;
    if (!is_email($email)) {
        wp_die('Invalid email address.', 'Error', 400);
    }

    // Sanitize and validate the league_id
    $league_id = isset($_POST['league_id']) ? intval($_POST['league_id']) : null;
    if (!$league_id || $league_id <= 0) {
        wp_die('Invalid league ID.', 'Error', 400);
    }

    // Sanitize the league_url
    $league_url = isset($_POST['league_url']) ? esc_url_raw(wp_unslash($_POST['league_url'])) : null;
    if (!$league_url) {
        wp_die('Invalid league URL.', 'Error', 400);
    }

    // Generate a unique token and attach it to your link
    $token = wp_generate_password(20, false);

    // Insert into database
    $wpdb->insert(
        $league_invites_table,
        [
            'league_id'    => $league_id,
            'invite_token' => $token,
            'email'        => $email,
            'created_at'   => current_time('mysql'),
            'updated_at'   => current_time('mysql')
        ],
        [ '%d', '%s', '%s', '%s', '%s' ]
    );

// Include only the token and league_id in the URL (no nonce)
    $invite_url = add_query_arg([
        'league_id'    => $league_id,
        'invite_token' => $token,
    ], $league_url);


// Send email
    wp_mail($email, 'You are invited to join a league!', 'Click this link to join: ' . esc_url_raw($invite_url));
}

/**
 * Recursively sanitize an array using sanitize_text_field().
 *
 * @param array|string $input Array or string to be sanitized.
 * @return array|string Sanitized array or string.
 */
function acpgc_sanitize_array( $input ) {
    if ( is_array( $input ) ) {
        foreach ( $input as $key => $value ) {
            // Recursively sanitize each array element
            $input[ $key ] = acpgc_sanitize_array( $value );
        }
    } else {
        // Sanitize text fields for string values
        $input = sanitize_text_field( $input );
    }
    return $input;
}


