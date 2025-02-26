<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class ASBFG_Submission_Blocker {

    public function __construct() {
        add_filter( 'gform_field_validation', [ $this, 'asbfg_validate_submission' ], 10, 4 );
    }

    public function asbfg_validate_submission( $result, $value, $form, $field ) {
        if ( ! $result['is_valid'] ) {
            return $result; // Skip further checks if already invalid.
        }

        $blocked_ips     = (array) get_option( 'asbfg_blocked_ips', [] );
        $blocked_emails  = (array) get_option( 'asbfg_blocked_emails', [] );
        $blocked_domains = (array) get_option( 'asbfg_blocked_domains', [] );

        $ip_message      = get_option( 'asbfg_custom_ip_message', 'Submissions from your IP address are not allowed.' );
        $email_message   = get_option( 'asbfg_custom_email_message', 'Submissions from this email are not allowed.' );
        $domain_message  = get_option( 'asbfg_custom_domain_message', 'Submissions from this email domain are not allowed.' );

        $user_ip = $this->asbfg_get_user_ip();
        if ( $user_ip && in_array( $user_ip, $blocked_ips, true ) ) {
            $result['is_valid'] = false;
            $result['message']  = $ip_message;
            return $result;
        }

        if ( $field->type === 'email' ) {
            $email = strtolower( $value );
            if ( in_array( $email, array_map( 'strtolower', $blocked_emails ), true ) ) {
                $result['is_valid'] = false;
                $result['message']  = $email_message;
                return $result;
            }

            $email_domain = substr( strrchr( $email, '@' ), 1 );
            if ( in_array( $email_domain, array_map( 'strtolower', $blocked_domains ), true ) ) {
                $result['is_valid'] = false;
                $result['message']  = $domain_message;
                return $result;
            }
        }

        return $result;
    }

    private function asbfg_get_user_ip() {
        // Sanitize and validate the IP address
        if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
        $user_ip = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
        return filter_var( $user_ip, FILTER_VALIDATE_IP );
        }
    }
}