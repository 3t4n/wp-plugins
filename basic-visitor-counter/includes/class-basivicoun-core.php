<?php

class Basivicoun_Core {
    private $table_name;

    public function __construct() {
        global $wpdb;
        $this->table_name = $wpdb->prefix . 'basivicoun_visitors';
    }

    public function initialize() {
        $this->register_hooks();
    }

    private function register_hooks() {

        // Initialize Admin and Tracker
        new Basivicoun_Admin($this->table_name);
        new Basivicoun_Tracker($this->table_name);
    }

    public static function activate() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'basivicoun_visitors'; // FIX: Define table name within method

        // Prepare the CREATE TABLE query using sprintf() for the table name and charset collate.
        $query_template = "CREATE TABLE `%s` (
            id BIGINT(20) NOT NULL AUTO_INCREMENT,
            ip_address VARCHAR(100) NOT NULL,
            visit_time DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (id)
        ) %s;";
        
        // Use sprintf() to safely inject the table name and charset collate.
        $query = sprintf( $query_template, esc_sql( $table_name ), $charset_collate );

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        // Use dbDelta() to create or update the table.
        dbDelta( $query );

        // error_log("BASIVICOUN table creation attempted: " . $query);
        // Default admin setting
        add_option('basivicoun_enable_tracking', '1'); // Enable tracking by default
    }

    public static function deactivate() { // FIX: Make static
        delete_option('basivicoun_enable_tracking');
    }
}
