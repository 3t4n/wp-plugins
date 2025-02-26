<?php
use Evavel\Database\DB;

class SRR_DB_WorkflowSteps extends DB {
	public static $table_db = '';

	public static function init() {
		global $wpdb;
		self::$table_db = $wpdb->prefix.DB::$namespace.'_workflow_steps';
	}

	public function __construct() {
		parent::__construct();
		$this->table_name = $this->prefix.'_workflow_steps';
		$this->primary_key = 'id';
		$this->version = '1.0';
	}

	public function sql_create() {
		return "CREATE TABLE {$this->table_name} (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        uuid varchar(36) NOT NULL,
        workflow_id bigint(20) NOT NULL,
        step_order int unsigned NOT NULL,
        action_type varchar(50) NOT NULL,
        action_config text DEFAULT NULL,
        settings longtext DEFAULT NULL,
        date_created datetime NOT NULL,
        date_modified datetime NOT NULL,
        PRIMARY KEY (id),
        KEY `workflow_steps_workflow_id_foreign` (`workflow_id`),
        CONSTRAINT `workflow_steps_workflow_id_foreign` FOREIGN KEY (`workflow_id`) REFERENCES `{$this->prefix}_workflows` (`id`) ON DELETE CASCADE
        )";
	}
}

SRR_DB_WorkflowSteps::init();
