<?php
if (!defined('ABSPATH')) {
    exit;
}

class ALERTIFY_Database {
    public static function create_tables() {
        global $wpdb;
        
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}alertify_subscriptions (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            product_id bigint(20) NOT NULL,
            variation_id bigint(20) DEFAULT NULL,
            email varchar(100) NOT NULL,
            name varchar(100) DEFAULT NULL,
            phone varchar(20) DEFAULT NULL,
            status varchar(20) DEFAULT 'pending',
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            notified_at datetime DEFAULT NULL,
            PRIMARY KEY  (id),
            KEY product_id (product_id),
            KEY email (email),
            KEY status (status)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
} 