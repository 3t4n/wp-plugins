<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Create a custom database table on plugin activation
function emplibot_hashes_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'emplibot_hashes';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        post_hash VARCHAR(64) NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}


// Function to insert a hash into the database
function emplibot_insert_hash($hash_value) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'emplibot_hashes';

    $hash_value = esc_sql($hash_value);

    $wpdb->insert(
        $table_name,
        array('post_hash' => $hash_value),
        array('%s')
    );
}

// Function to check if a hash already exists in the database
function emplibot_hash_exists($hash_value) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'emplibot_hashes';

    // WPCS: unprepared SQL OK.
    $table_name = esc_sql( $table_name ); // Sanitize the table name
    $hash_value = esc_sql( $hash_value ); // Sanitize the hash_value
    // WPCS: unprepared SQL OK.
    $sql = $wpdb->prepare("SELECT COUNT(id) FROM $table_name WHERE post_hash = %s", $hash_value);
    // WPCS: unprepared SQL OK.
    $result = $wpdb->get_var( $sql );

    return $result > 0;
}
