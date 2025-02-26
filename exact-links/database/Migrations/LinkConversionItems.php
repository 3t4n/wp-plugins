<?php

namespace ExactLinks\Framework\Database\Migrations;

use ExactLinks\App\App;

class LinkConversionItems
{
    static $tableName = 'exactlinks_conversion_items';

    public static function migrate()
    {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();
        $table = $wpdb->prefix . static::$tableName;

        if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
            $sql = "CREATE TABLE $table (
                `id` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `link_id` int(20),
                `slug` VARCHAR(50) NULL,
                `product_name` VARCHAR(255) NULL,
                `sale_quantity` int(50) NULL,
                `price` DECIMAL(13, 2) NULL,
                `created_at` TIMESTAMP NULL,
                `updated_at` TIMESTAMP NULL
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

        if (!in_array('link_id', $existing_columns)) {
            $sql  =  "ALTER TABLE $table ADD link_id INT(20) NULL AFTER id";
            $wpdb->query($sql);
        }
    }
}

   
