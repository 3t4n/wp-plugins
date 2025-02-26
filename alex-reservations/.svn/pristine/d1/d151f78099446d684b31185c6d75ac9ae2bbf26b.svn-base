<?php
use Evavel\Database\DB;

class SRR_DB_Workflows extends DB {
	public static $table_db = '';

	public static function init() {
		global $wpdb;
		self::$table_db = $wpdb->prefix.DB::$namespace.'_workflows';
	}

	public function __construct() {
		parent::__construct();
		$this->table_name = $this->prefix.'_workflows';
		$this->primary_key = 'id';
		$this->version = '1.0';
	}

	public function sql_create() {
		return "CREATE TABLE {$this->table_name} (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        uuid varchar(36) NOT NULL,
        restaurant_id bigint(20) NOT NULL,
        name varchar(200) NOT NULL,
        trigger_type varchar(50) NOT NULL,
        trigger_config text DEFAULT NULL,
        active tinyint(1) DEFAULT 1,
        settings longtext DEFAULT NULL,
        date_created datetime NOT NULL,
        date_modified datetime NOT NULL,
        PRIMARY KEY (id),
        KEY `workflows_restaurant_id_foreign` (`restaurant_id`),
        CONSTRAINT `workflows_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `{$this->prefix}_restaurants` (`id`) ON DELETE CASCADE
        )";
	}
}

SRR_DB_Workflows::init();



