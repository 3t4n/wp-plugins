<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_Duplicate_History {

    public function __construct() {
        add_action('DCPDUP_after_post_duplicate', array($this, 'log_duplicate_action'), 10, 2);
    }

    // Log each duplication event
    public function log_duplicate_action($old_post_id, $new_post_id) {
        $log_file = DCPDUP_PLUGIN_DIR . 'logs/duplication-log.txt';
        $old_post_title = get_the_title($old_post_id);
        $new_post_title = get_the_title($new_post_id);
        $current_user = wp_get_current_user();
        $timestamp = current_time('mysql');

        $log_entry = sprintf(
            "[%s] Post '%s' (ID: %d) duplicated as '%s' (ID: %d) by user '%s' (ID: %d)\n",
            $timestamp,
            $old_post_title,
            $old_post_id,
            $new_post_title,
            $new_post_id,
            $current_user->user_login,
            $current_user->ID
        );

        error_log($log_entry, 3, $log_file);
    }
}

new DCPDUP_Duplicate_History();
