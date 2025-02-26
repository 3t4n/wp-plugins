<?php

namespace Ambikly\Database\Tables;

class Payments extends BaseTable
{
    public $table_name = 'payments';

    public function getCreateTableQuery(): string
    {
        $table_name = $this->getTableName();
        $charset_collate = $this->getCharsetCollate();

        return "CREATE TABLE $table_name (
            ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            order_id BIGINT(20) UNSIGNED NOT NULL,  
            payment_method VARCHAR(50) NOT NULL,  
            transaction_id VARCHAR(255) UNIQUE DEFAULT NULL, 
            amount DECIMAL(10, 2) NOT NULL,  
            status VARCHAR(50) NOT NULL DEFAULT 'pending',
            payment_note TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (ID)
        ) $charset_collate;";
    }
}