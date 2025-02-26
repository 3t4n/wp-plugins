<?php


namespace Ambikly\Database\Tables;

class ProductCategories extends BaseTable {
	public $table_name = 'product_categories';

	public function getCreateTableQuery(): string {
		$table_name      = $this->getTableName();
		$charset_collate = $this->getCharsetCollate();

		return "CREATE TABLE $table_name (
        
		    ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		    product_id BIGINT(20) UNSIGNED NOT NULL,
		    category_id BIGINT(20) UNSIGNED NOT NULL,
		    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
		    PRIMARY KEY (ID),
		    UNIQUE KEY product_category_unique (product_id, category_id)
        ) $charset_collate;";
	}
}