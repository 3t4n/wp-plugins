<?php
/**
 * This file is responsible for mananing the error logs.
 *
 * @package Webdigit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to log errors.
 */
class WDGPT_Error_Logs {
	/**
	 * The error logs instance.
	 *
	 * @var $instance
	 */
	private static $instance = null;

	/**
	 * The wpdb instance.
	 *
	 * @var $wpdb
	 */
	private $wpdb;

	/**
	 * The table name.
	 *
	 * @var $table_name
	 */
	private $table_name;

	/**
	 * Initialize class.
	 */
	private function __construct() {
		global $wpdb;
		$this->wpdb       = $wpdb;
		$this->table_name = $wpdb->prefix . 'wd_error_logs';
	}

	/**
	 * Get the error logs instance.
	 *
	 * @return WDGPT_Error_Logs
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new WDGPT_Error_Logs();
		}
		return self::$instance;
	}

	/**
	 * Create the error logs table.
	 *
	 * @return void
	 */
	public function create_table() {
		$charset_collate = $this->wpdb->get_charset_collate();
		$sql             = "CREATE TABLE $this->table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            question text NOT NULL,
            error_type text NOT NULL,
            error_code text NOT NULL,
            error text NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}

	/**
	 * Delete all error logs.
	 *
	 * @return void
	 */
	public function purge_logs() {
		$sql = "DELETE FROM $this->table_name";
		$this->wpdb->query( $this->wpdb->prepare( $sql ) );
	}
	/**
	 * Get the logs.
	 *
	 * @param int $days The days.
	 * @return void
	 */
	public function purge_logs_older_than( $days ) {
		$sql = $this->wpdb->prepare(
			"DELETE FROM $this->table_name WHERE created_at > DATE_SUB(NOW(), INTERVAL %d DAY)",
			$days
		);
		$this->wpdb->query( $sql );
	}

    /**
     * Insert an error log message.
     *
     * @param string $message The message.
     * @param string $type The type.
     * @param int $code The code.
     * @return void
     */
    public function insert_error_log($message, $code = 0, $type = 'general_error') {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wd_error_logs';

        $wpdb->insert(
            $table_name,
            [
                'error'      => sanitize_text_field($message),
                'error_code' => intval($code),
                'error_type' => sanitize_text_field($type),
                'created_at' => current_time('mysql'),
            ],
            ['%s', '%d', '%s', '%s']
        );
    }
    /**
     * Log an error message into the database if debug mode is enabled.
     *
     * @param string $message The error message.
     * @param int    $code    The error code (default: 0).
     * @param string $type    The error type (default: 'general_error').
     */
    public static function wdgpt_log_error($message, $code = 0, $type = 'debug_log') {
        // Vérifier si le mode debug est activé
        if ( WDGPT_DEBUG_MODE ) {
            // Insérer le log dans la base de données
            self::get_instance()->insert_error_log('DEBUG LOG -- '.$message, $code, $type);
        }
    }
}
