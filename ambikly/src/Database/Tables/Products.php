<?php


namespace Ambikly\Database\Tables;

class Products extends BaseTable
{
    public $table_name = 'products';

    public function getCreateTableQuery(): string
    {
        $table_name = $this->getTableName();

        $charset_collate = $this->getCharsetCollate();

        return "CREATE TABLE $table_name (
            ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            product_name VARCHAR(255) NOT NULL,
            product_slug VARCHAR(255) NOT NULL UNIQUE,
            description TEXT NOT NULL,
            regular_price DECIMAL(10, 2) NOT NULL,
            discounted_price DECIMAL(10, 2) DEFAULT NULL,
            stock_quantity INT(11) DEFAULT 0 NOT NULL,
            status VARCHAR(20) NOT NULL DEFAULT 'draft', 
            image VARCHAR(255) DEFAULT NULL, 
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (ID)
        ) $charset_collate;";
    }
}