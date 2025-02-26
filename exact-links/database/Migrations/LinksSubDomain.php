<?php

namespace ExactLinks\Framework\Database\Migrations;

use ExactLinks\App\App;

class LinksSubDomain
{
    static $tableName = 'exactlinks_sub_domain';

    public static function migrate()
    {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();
        $table = $wpdb->prefix . static::$tableName;

        if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
            $sql = "CREATE TABLE $table (
                `id` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `subdomain_name` VARCHAR(50) NULL,
                `subdomain_slug` VARCHAR(50) NULL,
                `created_at` TIMESTAMP NULL,
                `updated_at` TIMESTAMP NULL
            ) $charsetCollate;";
            dbDelta($sql);
        }
    }
}