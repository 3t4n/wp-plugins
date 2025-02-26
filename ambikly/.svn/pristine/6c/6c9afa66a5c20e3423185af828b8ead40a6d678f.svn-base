<?php
namespace Ambikly\Database\Tables;

class OrderItems extends BaseTable
{
    public $table_name = 'order_items';

    public function getCreateTableQuery(): string
    {
        $table_name = $this->getTableName();
        $charset_collate = $this->getCharsetCollate();

        return "CREATE TABLE $table_name (
            ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            order_id BIGINT(20) UNSIGNED NOT NULL,  
            product_id BIGINT(20) UNSIGNED NOT NULL,  
            product_name VARCHAR(255) NOT NULL,
            quantity INT(11) NOT NULL DEFAULT 1, 
            price DECIMAL(10, 2) NOT NULL, 
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (ID)
        ) $charset_collate;";
    }
}