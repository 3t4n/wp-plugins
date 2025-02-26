<?php
namespace GSBEH;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Represents as a database utilites.
 * 
 * @since 2.0.12
 */
class Database {

    /**
     * Returns the plugin database behance data table name.
     * 
     * @since  2.0.12
     * @return string Database table name.
     */
    public function getDataTable() {
        global $wpdb;
        return $wpdb->prefix . 'gsbehance';
    }

    /**
     * Returns the plugin database shortcodes table name.
     * 
     * @since  2.0.12
     * @return string Database table name.
     */
    public function getShortcodesTable() {
        global $wpdb;
        return $wpdb->prefix . 'gsbeh_shortcodes';
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
        gsbeh()->db->createDataTable();
        gsbeh()->db->createShortcodesTable();
    }

    /**
     * Creates a database table for storing behance data.
     * 
     * @since  2.0.12
     * @return void
     */
    public function createDataTable() {
        global $wpdb;
        $tableName = gsbeh()->db->getDataTable();
        $charset   = gsbeh()->db->getCharset();

        $sql = "CREATE TABLE " . $tableName . " (
            id int(9) NOT NULL AUTO_INCREMENT,
            beid int(20) NOT NULL UNIQUE ,
            beusername tinytext,
            name tinytext NOT NULL,
            url varchar(100) DEFAULT '' NOT NULL,
            big_img varchar(255) DEFAULT '',
            thum_image varchar(255) DEFAULT '',
            blike int(9),
            bview int(9),
            bcomment int(9),
            bfields longtext,
            time datetime NOT NULL,
            PRIMARY KEY  (id)
        ) $charset;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    /**
     * Creates a database table for storing shortcodes data.
     * 
     * @since  2.0.12
     * @return void
     */
    public function createShortcodesTable() {
        global $wpdb;
        $tableName = gsbeh()->db->getShortcodesTable();
        $charset    = gsbeh()->db->getCharset();

        $sql = "CREATE TABLE IF NOT EXISTS {$tableName} (
            id BIGINT(20) unsigned NOT NULL AUTO_INCREMENT,
            shortcode_name TEXT NOT NULL,
            shortcode_settings LONGTEXT NOT NULL,
            userid TEXT DEFAULT NULL,
            count INT DEFAULT 6,
            field TEXT DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        )".$charset.";";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
}