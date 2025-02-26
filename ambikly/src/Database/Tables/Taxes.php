<?php

namespace Ambikly\Database\Tables;

use Ambikly\Admin\AdminConstants;

class Taxes
{
    public $table_name = 'taxes';

    public function query()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . AdminConstants::TABLE_PREFIX . $this->table_name;

        $charset_collate = $wpdb->get_charset_collate();

        return "CREATE TABLE $table_name (
        ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        order_id BIGINT(20) UNSIGNED NOT NULL,
        tax_rate DECIMAL(5, 2) NOT NULL,
        tax_amount DECIMAL(10, 2) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (order_id) REFERENCES {$wpdb->prefix}ambikly_orders(id) ON DELETE CASCADE
    ) $charset_collate;";


    }

}