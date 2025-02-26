<?php
namespace Ambikly\Database\Tables;

class Orders extends BaseTable
{
    public $table_name = 'orders';

    public function getCreateTableQuery(): string
    {
        $table_name = $this->getTableName();
        $charset_collate = $this->getCharsetCollate();

        return "CREATE TABLE $table_name (
            ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            customer_id BIGINT(20) UNSIGNED NOT NULL,
            order_code VARCHAR(50) NOT NULL UNIQUE,
            total_amount DECIMAL(10, 2) NOT NULL,
            currency VARCHAR(3) NOT NULL DEFAULT 'USD',
            order_note TEXT DEFAULT NULL,
            email VARCHAR(100) NOT NULL,
            status VARCHAR(50) NOT NULL DEFAULT 'pending',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (ID)
        ) $charset_collate;";
    }
}