<?php
use Evavel\Database\DB;

class SRR_DB_WorkflowStepExecutions extends DB {
	public static $table_db = '';

	public static function init() {
		global $wpdb;
		self::$table_db = $wpdb->prefix.DB::$namespace.'_workflow_step_executions';
	}

	public function __construct() {
		parent::__construct();
		$this->table_name = $this->prefix.'_workflow_step_executions';
		$this->primary_key = 'id';
		$this->version = '1.0';
	}

	public function sql_create() {
		return "CREATE TABLE {$this->table_name} (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        uuid varchar(36) NOT NULL,
        instance_id bigint(20) NOT NULL,
        step_id bigint(20) NOT NULL,
        status varchar(50) NOT NULL,
        executed_at datetime NOT NULL,
        result text DEFAULT NULL,
        error text DEFAULT NULL,
        settings longtext DEFAULT NULL,
        date_created datetime NOT NULL,
        date_modified datetime NOT NULL,
        PRIMARY KEY (id),
        KEY `workflow_step_executions_instance_id_foreign` (`instance_id`),
        CONSTRAINT `workflow_step_executions_instance_id_foreign` FOREIGN KEY (`instance_id`) REFERENCES `{$this->prefix}_workflow_instances` (`id`) ON DELETE CASCADE,
        KEY `workflow_step_executions_step_id_foreign` (`step_id`),
        CONSTRAINT `workflow_step_executions_step_id_foreign` FOREIGN KEY (`step_id`) REFERENCES `{$this->prefix}_workflow_steps` (`id`)
        )";
	}
}

SRR_DB_WorkflowStepExecutions::init();
