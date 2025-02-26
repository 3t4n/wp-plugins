<?php


namespace Ambikly\Database\Tables;

class Categories extends BaseTable
{
    public $table_name = 'categories';

    public function getCreateTableQuery(): string
    {
        $table_name = $this->getTableName();
        $charset_collate = $this->getCharsetCollate();

        return "CREATE TABLE $table_name (
            ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            category_name VARCHAR(255) NOT NULL,
            category_slug VARCHAR(255) NOT NULL UNIQUE,  
            description TEXT NOT NULL,
            image BIGINT(20) DEFAULT NULL,    
            status VARCHAR(20) NOT NULL DEFAULT 'draft', 
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (ID)
        ) $charset_collate;";
    }
}