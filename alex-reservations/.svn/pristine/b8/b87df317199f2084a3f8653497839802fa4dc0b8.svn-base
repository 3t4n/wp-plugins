<?php
use Evavel\Database\DB;

class SRR_DB_WorkflowInstances extends DB {
	public static $table_db = '';

	public static function init() {
		global $wpdb;
		self::$table_db = $wpdb->prefix.DB::$namespace.'_workflow_instances';
	}

	public function __construct() {
		parent::__construct();
		$this->table_name = $this->prefix.'_workflow_instances';
		$this->primary_key = 'id';
		$this->version = '1.0';
	}

	public function sql_create() {
		return "CREATE TABLE {$this->table_name} (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        uuid varchar(36) NOT NULL,
        workflow_id bigint(20) NOT NULL,
        target_type varchar(50) NOT NULL,
        target_id bigint(20) NOT NULL,
        status varchar(50) DEFAULT 'running',
        current_step_id bigint(20) DEFAULT NULL,
        started_at datetime NOT NULL,
        next_execution_time datetime DEFAULT NULL,
        retries int unsigned DEFAULT 0,
        max_retries int unsigned DEFAULT 3,
        last_error text DEFAULT NULL,
        retry_after datetime DEFAULT NULL,
        settings longtext DEFAULT NULL,
        date_created datetime NOT NULL,
        date_modified datetime NOT NULL,
        PRIMARY KEY (id),
        KEY `workflow_instances_workflow_id_foreign` (`workflow_id`),
        CONSTRAINT `workflow_instances_workflow_id_foreign` FOREIGN KEY (`workflow_id`) REFERENCES `{$this->prefix}_workflows` (`id`) ON DELETE CASCADE,
        KEY `workflow_instances_current_step_id_foreign` (`current_step_id`),
        CONSTRAINT `workflow_instances_current_step_id_foreign` FOREIGN KEY (`current_step_id`) REFERENCES `{$this->prefix}_workflow_steps` (`id`)
        )";
	}
}

SRR_DB_WorkflowInstances::init();

