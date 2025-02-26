<?php

/**
 * @package HelloPrint
 */

namespace HelloPrint\Inc\Base;

class Deactivate
{
    public static function deactivate()
    {
        //self::helloprint_remove_translation_db();
        flush_rewrite_rules();
    }

    public function helloprint_remove_translation_db()
    {
        global $wpdb;

        $translationsTable = $wpdb->prefix . 'helloprint_translations';
        $show_sql = $wpdb->prepare("SHOW TABLES LIKE %s", $translationsTable);

        if (
            $wpdb->get_var(
            // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
            $show_sql) == $translationsTable) {
            $sql = "DROP TABLE IF EXISTS $translationsTable";
            $prepared_sql = $wpdb->prepare(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $sql
            );
            $wpdb->query(
                // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
                $prepared_sql
            );
        }
    }
}
