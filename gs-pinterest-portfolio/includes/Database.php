<?php
namespace GSPIN;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Represents as a database utilites.
 * 
 * @since 2.0.12
 */
class Database {

    /**
     * Returns the plugin database shortcodes table name.
     * 
     * @since  2.0.12
     * @return string Database table name.
     */
    public function getShortcodesTable() {
        global $wpdb;
        return $wpdb->prefix . 'gspin_shortcodes';
    }

    /**
     * Returns the database charset.
     * 
     * @since  2.0.12
     * @return string Database table name.
     */
    public function getCharset() {
        global $wpdb;
        return $wpdb->get_charset_collate();
    }

    /**
     * Create database tables on plugin activation.
     * 
     * @since  2.0.12
     * @return void
     */
    public function migration() {
        gspin()->db->createShortcodesTable();
    }

    /**
     * Creates a database table for storing shortcodes data.
     * 
     * @since  2.0.12
     * @return void
     */
    public function createShortcodesTable() {
        global $wpdb;
        $tableName = gspin()->db->getShortcodesTable();
        $charset   = gspin()->db->getCharset();

        $sql = "CREATE TABLE IF NOT EXISTS {$tableName} (
            id BIGINT(20) unsigned NOT NULL AUTO_INCREMENT,
            shortcode_name TEXT NOT NULL,
            shortcode_settings LONGTEXT NOT NULL,
            userid TEXT DEFAULT NULL,
            board_name TEXT DEFAULT NULL,
            count INT DEFAULT 10,
            show_pin_title BOOLEAN DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        )".$charset.";";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}