<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb;
$sql = "DELETE FROM {$wpdb->prefix}options WHERE option_name LIKE \"age_gator%\"";
$wpdb->query($sql);
