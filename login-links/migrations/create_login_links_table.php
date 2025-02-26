<?php

function ll_create_database_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'login_links';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) NOT NULL AUTO_INCREMENT,
        user_id BIGINT(20) NULL,
        temp_user_id BIGINT(20) NULL, 
        token VARCHAR(63) NOT NULL,
        expiration_time DATETIME NULL,
        max_logins INT(11) DEFAULT 1,
        logins_used INT(11) DEFAULT 0,
        is_temporary_user TINYINT(1) DEFAULT 0,
        role VARCHAR(100) DEFAULT 'subscriber',
        used TINYINT(1) DEFAULT 0,
        PRIMARY KEY (id),
        KEY user_id (user_id),
        KEY temp_user_id (temp_user_id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function ll_delete_database_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'login_links';
    
    $wpdb->query("DROP TABLE IF EXISTS {$table_name}");
}