<?php


namespace Ambikly\Database\Tables;

class Reviews extends BaseTable
{
    public $table_name = 'reviews';

    public function getCreateTableQuery(): string
    {
        $table_name = $this->getTableName();
        $charset_collate = $this->getCharsetCollate();

        return "CREATE TABLE $table_name (
            ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            product_id BIGINT(20) UNSIGNED NOT NULL,
            user_id BIGINT(20) UNSIGNED NOT NULL, 
            rating INT(1) NOT NULL CHECK (rating >= 1 AND rating <= 5), 
            comment TEXT,
            status VARCHAR(20) NOT NULL DEFAULT 'pending', 
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL, 
            PRIMARY KEY (ID)
        ) $charset_collate;";
    }
}