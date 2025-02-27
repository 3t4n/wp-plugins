<?php
if (!defined('ABSPATH')) { exit; }

class CHATBOTCOM_Utils {
    public static function validateId ($input) {
        return (bool) preg_match('/^[0-9a-fA-F]{24}$/', $input);
    }
    public static function sanitizeEmail ($input) {
        return sanitize_email($input);
    }
    public static function sanitizeString ($input) {
        return esc_html($input);
    }
    public static function getDisconnectActionUrl () {
        return CHATBOTCOM_ADMIN_PAGE_URL.'&nonce='.wp_create_nonce(CHATBOTCOM_NONCE).'&action=disconnect';
    }
    public static function getUpdateActionUrl () {
        return CHATBOTCOM_ADMIN_PAGE_URL.'&nonce='.wp_create_nonce(CHATBOTCOM_NONCE).'&action=update';
    }
    public static function getSetUpActionUrl () {
        return CHATBOTCOM_ADMIN_PAGE_URL.'&nonce='.wp_create_nonce(CHATBOTCOM_NONCE).'&action=set-up';
    }
}
