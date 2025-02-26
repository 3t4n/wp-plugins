<?php

function dtbps_insert_deltabackups_option($option_name, $option_value) {
    $options = get_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, array());

    // Upsert the data
    $options[$option_name] = $option_value;

    // Save the updated options
    update_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, $options);
}

function dtbps_delete_deltabackups_option($option_name) {
    $options = get_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, array());


    if (isset($options[$option_name])) {
        unset($options[$option_name]);
    }

    // Save the updated options
    update_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, $options);
}

function dtbps_get_username() {
    $options = get_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, array());
    return (isset($options[DTBPS_DB_SQL_TABLE_OPTIONS_USER_ID]) ? $options[DTBPS_DB_SQL_TABLE_OPTIONS_USER_ID] : '');
}

function dtbps_get_password() {
    $options = get_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, array());
    return (isset($options[DTBPS_DB_SQL_TABLE_OPTIONS_PASSWORD]) ? $options[DTBPS_DB_SQL_TABLE_OPTIONS_PASSWORD] : '');
}

function dtbps_get_client_id() {
    $options = get_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, array());
    return (isset($options[DTBPS_DB_SQL_TABLE_OPTIONS_CLIENT_ID]) ? $options[DTBPS_DB_SQL_TABLE_OPTIONS_CLIENT_ID] : '');
}

function dtbps_is_local_mode() {
    $options = get_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, array());
    return (isset($options[DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCAL_MODE]) ? $options[DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCAL_MODE] : false);
}

function dtbps_is_lock() {
    $options = get_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, array());
    return (isset($options[DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCK]) ? $options[DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCK] : false);
}

function dtbps_set_lock() {
    dtbps_insert_deltabackups_option(DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCK, true);
}
function dtbps_remove_lock() {
    dtbps_insert_deltabackups_option(DTBPS_DB_SQL_TABLE_OPTIONS_SETTINGS_LOCK, false);
}


function dtbps_sql_query_get_all_tables_for_wp_instance($wp_table_prefix){
    global $wpdb;

    $isMultisite = is_multisite();
    $currentBlogId = get_current_blog_id();

    if($isMultisite){
        if($currentBlogId > 1){
            return $wpdb->prepare("select table_name from INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = DATABASE() and (table_name like '%s%' or table_name in ('wp_usermeta', 'wp_users') or table_name not REGEXP '^wp_[A-Za-z0-9_].*');", $wp_table_prefix);
        } else{
            return $wpdb->prepare("select table_name from INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = DATABASE() and (table_name in ('wp_commentmeta', 'wp_comments', 'wp_links', 'wp_options', 'wp_postmeta', 'wp_posts', 'wp_term_relationships', 'wp_term_taxonomy', 'wp_termmeta', 'wp_terms', 'wp_usermeta', 'wp_users' ) or table_name not REGEXP '^wp_[A-Za-z0-9_].*');");
        }
    }
    else{
        return $wpdb->prepare("select table_name from INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = DATABASE();");
    }
}