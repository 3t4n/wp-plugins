<?php


namespace Ambikly\Database\Tables;

class OrderAddresses extends BaseTable
{
    public $table_name = 'order_addresses';

	public function getCreateTableQuery(): string
	{
		$table_name = $this->getTableName();

		$charset_collate = $this->getCharsetCollate();

		return "CREATE TABLE $table_name (
            ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            order_id BIGINT(20) UNSIGNED NOT NULL,
            address_type VARCHAR(20) DEFAULT NULL,
            firstname TEXT DEFAULT NULL,
            lastname TEXT DEFAULT NULL,
            company TEXT DEFAULT NULL,
            address_1 TEXT DEFAULT NULL,
            address_2 TEXT DEFAULT NULL,
            city TEXT DEFAULT NULL,
            state TEXT DEFAULT NULL,
            postcode TEXT DEFAULT NULL,
            country TEXT DEFAULT NULL,
            email VARCHAR(320) DEFAULT NULL,
            phone VARCHAR(100) DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (ID),
            KEY order_id (order_id)
        ) $charset_collate;";
	}
}