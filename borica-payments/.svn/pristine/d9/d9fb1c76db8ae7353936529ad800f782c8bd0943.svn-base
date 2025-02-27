<?php
/**
 * Borica_Logger Logger Class Doc Comment
 *
 * PHP version 8
 *
 * @category Payment Logger
 * @package  Borica_Woo_Payment_Gateway
 * @author   Ilko Ivanov <ilko.iv@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.borica.bg/
 */

/**
 * Borica_Logger Class Doc Comment
 *
 * Borica_Logger Class
 *
 * @author   Ilko Ivanov <ilko.iv@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.borica.bg/
 */
class Borica_Logger {

	/**
	 * The name of the custom database table used for logging.
	 *
	 * This property stores the full name of the custom database table,
	 * including the WordPress table prefix, used to store log messages.
	 *
	 * @var string
	 */
	private $table_name;

	/**
	 * Borica_Logger constructor.
	 *
	 * Initializes the logger by setting the table name for logging messages.
	 * The table name is constructed using the WordPress table prefix combined with 'borica_logs'.
	 *
	 * @global wpdb $wpdb The WordPress database global object.
	 */
	public function __construct() {
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'borica_logs';
	}

	/**
	 * Logs a message into the borica_logs database table.
	 *
	 * This method accepts a message, which can be a string, array, or object.
	 * If the message is an array or object, it is converted to a string using print_r.
	 * The message is then encoded in base64 format before being stored in the database.
	 *
	 * @param mixed $message The message to be logged. It can be a string, array, or object.
	 *
	 * @return void
	 *
	 * @global wpdb $wpdb The WordPress database global object.
	 *
	 * @throws Exception If the database insertion fails (consider adding error handling).
	 */
	public function log( $message ): void {
		if ( is_array( $message ) || is_object( $message ) ) {
			$message = wp_json_encode( $message, JSON_UNESCAPED_UNICODE );
		}
		$message_base64 = base64_encode( $message );

		global $wpdb;
		// Using $wpdb->insert() here is necessary because we are logging to a custom table.
		// There is no higher-level WordPress API available for this operation.
		$wpdb->insert(
			$this->table_name,
			array(
				'message' => $message_base64,
			),
			array(
				'%s',
			)
		);
	}
}
