<?php

namespace ExactLinks\Framework\Database\Migrations;

use ExactLinks\App\App;

class LinksAnalyticsMigrator
{
    static $tableName = 'exactlinks_analytics';

    public static function migrate()
    {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();
        $table = $wpdb->prefix . static::$tableName;

        if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
            $sql = "CREATE TABLE $table (
                `id` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `link_id` int(20),
                `ip` VARCHAR(255) NULL,
                `slug` TEXT NULL,
                `conversion_text` TEXT NULL,
                `conversion_amount` FLOAT NULL,
                `browser_name` VARCHAR(255) NULL,
                `os_name` VARCHAR(255) NULL,
                `traffic_source_name` VARCHAR(255) NULL,
                `devices_name` VARCHAR(255) NULL,
                `country_code` VARCHAR(255) NULL,
                `country_name` VARCHAR(255) NULL,
                `city_name` VARCHAR(255) NULL,
                `country_language` VARCHAR(255) NULL,
                `date` TIMESTAMP NULL
            ) $charsetCollate;";
            dbDelta($sql);
        } else {
            static::alterTable($table);
        }
    }

    public static function alterTable($table)
    {
        global $wpdb;

        $existing_columns = $wpdb->get_col("DESC {$table}", 0);

        if (!in_array('city_name', $existing_columns)) {
            $sql  =  "ALTER TABLE $table ADD city_name VARCHAR(255) NULL AFTER country_name";
            $wpdb->query($sql);
        }

        $sql =  "ALTER TABLE $table MODIFY COLUMN conversion_amount FLOAT NULL";
        $wpdb->query($sql);
       
    }

}

   
