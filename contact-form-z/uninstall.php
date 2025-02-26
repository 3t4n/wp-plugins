<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

$wpdb->hide_errors();

$prefix = $wpdb->prefix;

$wpdb->query(
    "DROP TABLE IF EXISTS {$prefix}zcf_form_list, {$prefix}zcf_form_list_history, {$prefix}zcf_form_list_post, {$prefix}zcf_form_save;"
);
