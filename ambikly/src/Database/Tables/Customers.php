<?php
namespace Ambikly\Database\Tables;

class Customers extends BaseTable
{
    public $table_name = 'customers';

    /**
     * Returns the SQL query to create the 'customers' table.
     *
     * @return string
     */
    public function getCreateTableQuery(): string
    {
        $table_name = $this->getTableName();

        $charset_collate = $this->getCharsetCollate();

        return "CREATE TABLE $table_name (
            ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            user_id BIGINT(20) UNSIGNED DEFAULT NULL,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            email VARCHAR(100) DEFAULT NULL UNIQUE,
            country CHAR(5) DEFAULT NULL,
            postcode VARCHAR(20) DEFAULT NULL,
            city VARCHAR(100) DEFAULT NULL,
            state VARCHAR(100) DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (ID),
            KEY user_id (user_id)
        ) $charset_collate;";
    }
}