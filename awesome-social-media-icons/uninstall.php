<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb;
$get_table = $wpdb->prefix . "s_icon";
$wpdb->query("DROP TABLE IF EXISTS {$get_table}");
