<?php

namespace ExactLinks\Framework\Database\Migrations;

use ExactLinks\App\Traits\Settings;

class LinksMigrator
{
    static $tableName = 'exactlinks_links';

    public static function migrate()
    {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();
        $table = $wpdb->prefix . static::$tableName;

        if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
            $sql = "CREATE TABLE $table (
                `id` BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `type` VARCHAR(50) NULL,
                `slug` VARCHAR(255) NULL,
                `target_url` TEXT NULL,
                `target_domain` VARCHAR(255) NULL,
                `title` VARCHAR(255) NULL,
                `meta_title` VARCHAR (255) NULL,
                `meta_description` TEXT NULL,
                `featured_image` VARCHAR(255) NULL,
                `button_text` VARCHAR(30) NULL,
                `badge_text` VARCHAR(30) NULL,
                `disclosure` TEXT NULL,
                `price` VARCHAR(11) NULL,
                `tags` TEXT NULL,
                `settings` TEXT NULL,
                `utm_template_id` INT(11) NULL,
                `utm_source` VARCHAR(255) NULL,
                `utm_medium` VARCHAR(255) NULL,
                `utm_campaign` VARCHAR(255) NULL,
                `utm_term` VARCHAR(255) NULL,
                `utm_content` VARCHAR(255) NULL,
                `subdomain_id` INT(11) NULL,
                `subdomain_name` VARCHAR(50) NULL,
                `status` VARCHAR(255) DEFAULT 'active',
                `source` VARCHAR(255) DEFAULT 'manual',
                `source_id` VARCHAR(255) NULL,
                `link_status` VARCHAR (30) DEFAULT 'valid',
                `last_link_check` TIMESTAMP NULL,
                `redirect_type` INT(3) DEFAULT 307,
                `category_id` INT(11) NULL,
                `note` TEXT NULL,
                `has_condition` tinyint(1) default 0,
                `author_id` BIGINT(20) NULL,
                `total_click` BIGINT(20) DEFAULT 0,
                `total_unique_click` BIGINT(20) DEFAULT 0,
                `conversion_rate` BIGINT(20) DEFAULT 0,
                `priority` INT(2) DEFAULT 0,
                `parent_id` BIGINT(20) NULL,
                `created_at` TIMESTAMP NULL,
                `updated_at` TIMESTAMP NULL
            ) $charsetCollate;";
            dbDelta($sql);
        } else {
            static::alterTable($table);
        }

        if (!get_option('exactlinks_db_active')) {
            update_option('exactlinks_db_active', true);
        }

        if (!get_option('exactlinks_settings')) {
            update_option(
                'exactlinks_settings',
                Settings::globalSettings()
            );
        }
    }


    public static function alterTable($table)
    {
        global $wpdb;

        $existing_columns = $wpdb->get_col("DESC {$table}", 0);

        if (!in_array('utm_template_id', $existing_columns)) {
            $sql  =  "ALTER TABLE $table ADD utm_template_id INT(11) NULL AFTER settings";
            $wpdb->query($sql);
        }

        if (!in_array('subdomain_id', $existing_columns)) {
            $sql  =  "ALTER TABLE $table ADD subdomain_id INT(11) NULL AFTER utm_content";
            $wpdb->query($sql);
        }

        if (!in_array('subdomain_name', $existing_columns)) {
            $sql  =  "ALTER TABLE $table ADD subdomain_name VARCHAR(50) NULL AFTER subdomain_id";
            $wpdb->query($sql);
        }
    }
}
