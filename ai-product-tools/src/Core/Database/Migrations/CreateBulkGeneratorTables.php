<?php

namespace AIPT\Core\Database\Migrations;

class CreateBulkGeneratorTables {
    private $history_table;

    public function __construct() {
        global $wpdb;
        $this->history_table = $wpdb->prefix . 'aipt_bulk_generator_history';
    }

    public function up() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $current_version = get_option('aipt_db_version', '0');
        if (version_compare($current_version, AIPT_VERSION, '>=')) {
            return;
        }

        $sql1 = "CREATE TABLE IF NOT EXISTS {$this->history_table} (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            product_id bigint(20) NOT NULL,
            description_type varchar(10) NOT NULL,
            generated_text longtext NOT NULL,
            status varchar(20) NOT NULL DEFAULT 'pending',
            error_message text DEFAULT NULL,
            updated_at datetime NULL DEFAULT NULL,
            created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (id),
            KEY product_id (product_id),
            KEY status (status)
        ) {$charset_collate};";

        try {

            $result1 = dbDelta($sql1);

            $this->validate_table_structure();

            update_option('aipt_db_version', AIPT_VERSION);

        } catch (\Exception $e) {
            

            set_transient('aipt_database_error', 
                sprintf(
                    /* translators: %1$s: current version, %2$s: target version, %3$s: error message */
                    esc_html__('Database upgrade from version %1$s to %2$s failed. Please deactivate and reactivate the plugin. Error: %3$s', 'ai-product-tools'),
                    esc_html($current_version),
                    esc_html(AIPT_VERSION),
                    esc_html($e->getMessage())
                ),
                60 
            );
            
            throw $e; 
        }
    }

    private function validate_table_structure() {
        global $wpdb;

        $history_exists = $wpdb->get_var(
            $wpdb->prepare(
                "SHOW TABLES LIKE %s",
                $this->history_table
            )
        ) === $this->history_table;

        if (!$history_exists) {
            return;
        }

        $history_columns = $wpdb->get_col(
            $wpdb->prepare(
                "SHOW COLUMNS FROM %i",
                $this->history_table
            )
        );
        $required_history_columns = ['id', 'product_id', 'description_type', 'generated_text', 'status', 'error_message', 'updated_at', 'created_at'];
        
        foreach ($required_history_columns as $column) {
            if (!in_array($column, $history_columns)) {
                throw new \Exception(sprintf(
                    /* translators: %1$s: column name, %2$s: table name */
                    esc_html__('Required column "%1$s" is missing in %2$s table', 'ai-product-tools'),
                    esc_html($column),
                    'history'
                ));
            }
        }

        $this->add_updated_at_column();

    }

    private function add_updated_at_column() {
        global $wpdb;

        $column_exists = $wpdb->get_results(
            $wpdb->prepare(
                "SHOW COLUMNS FROM %i LIKE %s",
                $this->history_table,
                'updated_at'
            )
        );

        if (empty($column_exists)) {
            $wpdb->query(
                $wpdb->prepare(
                    "ALTER TABLE %i ADD COLUMN updated_at datetime NULL DEFAULT NULL AFTER error_message",
                    $this->history_table
                )
            );
        }
    }

    public function down() {
        global $wpdb;
        
        
        try {

            $wpdb->query(
                $wpdb->prepare(
                    "DROP TABLE IF EXISTS %i",
                    $this->history_table
                )
            );
            

            delete_option('aipt_db_version');
            
        } catch (\Exception $e) {
        }
    }
} 