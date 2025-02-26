<?php

namespace ExactLinks\Framework\Database\Migrations;

use ExactLinks\App\App;

class LinksUTMTemplateMigrator
{
    static $tableName = 'exactlinks_utm_template';

    public static function migrate()
    {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();
        $table = $wpdb->prefix . static::$tableName;

        if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
            $sql = "CREATE TABLE $table (
                `id` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `template_title` VARCHAR(255) NULL,
                `template_slug` VARCHAR(255) NULL,
                `utm_source` VARCHAR(255) NULL,
                `utm_medium` VARCHAR(255) NULL,
                `utm_campaign` VARCHAR(255) NULL,
                `utm_term` VARCHAR(255) NULL,
                `utm_content` VARCHAR(255) NULL,
                `created_at` TIMESTAMP NULL,
                `updated_at` TIMESTAMP NULL
            ) $charsetCollate;";
            dbDelta($sql);
        } 
    }
}

   
