<?php
/**
 * bLoyalLoggerService class for managing logging of bLoyal API's request and response.
 * This class handles logging of various types of messages (Info, Warning, Exception)
 * to a log file based on certain conditions.
 */
if ( ! class_exists( 'bLoyalLoggerService' ) ) {

	/**
	 * Retrieves the current setting for enabling/disabling logging.
	 *
	 * @return string|null 'true' if logging is enabled, null otherwise.
	 */
	function bloyal_log_settings() {
		$log_enable = get_option( 'bloyal_log_enable_disable' );
		return $log_enable;
	}
	#[\AllowDynamicProperties] // we have added this code avoid create dynamic property notice in php error logs
	class bLoyalLoggerService {

		/**
		 * The path to the log file.
		 *
		 * @var string
		 */
		private static $log_file_name = BLOYAL_UPLOAD_DIR_BASEPATH . '/bLoyal_log_file.txt';

		/**
		 * Log types with their corresponding labels.
		 *
		 * @var array
		 */
		private static $logtype = array(
			1 => 'Info',
			2 => 'Warning',
			3 => 'Exception',
		);

		/**
		 * Delimiter used to separate log entries in the log file.
		 *
		 * @var string
		 */
		private static $log_delimeter = '====================================';

		/**
		 * Maximum size of the log file in bytes.
		 *
		 * @var int
		 */
		private $max_size;

		/**
		 * Data read from the log file.
		 *
		 * @var array
		 */
		private $log_file_data;

		/**
		 * Domain name associated with bLoyal.
		 *
		 * @var string
		 */
		private $domain_name;

		/**
		 * Access key for bLoyal logs.
		 *
		 * @var string
		 */
		private $access_key;

		/**
		 * Indicates whether logging is enabled.
		 *
		 * @var string|null
		 */
		public static $log_enable = null;

		/**
		 * Constructor for bLoyalLoggerService class.
		 */
		public function __construct() {

			$this->max_size        = 250000;
			$this->domain_name     = get_option( 'bloyal_domain_name' );
			$this->access_key      = get_option( 'bloyal_access_key' );
			$this->logging_api_url = get_option( 'logging_api_url' );
		}

		/**
		 * Writes a custom log entry to the log file if logging is enabled.
		 *
		 * @param string $log The log message to write.
		 * @param int    $type Optional. The type of log: 1 for Info, 2 for Warning, 3 for Exception. Default is 1.
		 * @return void
		 */
		public static function write_custom_log( $log, $type = 1 ) {
			try {

				// Check if logging is enabled
				self::$log_enable = bloyal_log_settings();
				if ( 'true' === self::$log_enable ) {

					// Open log file
					$logfile = fopen( self::$log_file_name, 'a' );

					// Prepare log data
					$log_data = 'Log: 	' . self::$logtype[ $type ] . "\r\n" .
								'File: 	' . debug_backtrace()[0]['file'] . "\r\n" .
								'Line:	' . debug_backtrace()[0]['line'] . "\r\n" .
								'Class: ' . debug_backtrace()[0]['class'] . "\r\n" .
								'Function: ' . debug_backtrace()[1]['function'] . "\r\n" .
								'Date time: ' . date( 'Y-m-d H:i:s A' ) . "\r\n" .
								$log . "\r\n" . self::$log_delimeter . "\r\n";

					// Write to log file
					fwrite( $logfile, $log_data );

					// Close log file
					fclose( $logfile );
				}
			} catch ( Exception $e ) {
			}
		}

		/**
		 * Uploads the log file contents to the remote logging API.
		 *
		 * @return void
		 */
		public function uploadLog() {
			try {
				// Check if log file exists and is smaller than maxSize
				if ( file_exists( self::$log_file_name ) && filesize( self::$log_file_name ) < $this->max_size ) {
					return false;
				}

				// Read log file data
				$this->readLogFile();

				// If no log data, return false
				if ( empty( $this->log_file_data ) ) {
					return false;
				}
				// this API use for create bLoyal logs by bLoyal
				$post_url = $this->logging_api_url . "/api/v4/{$this->access_key}/Logger/Multiple";

				// Prepare arguments for post request
				$args = array(
					'headers' => array(
						'Content-Type' => 'application/json',
					),
					'body'    => wp_json_encode( $this->log_file_data ),
					'method'  => 'POST',
					'timeout' => 45,
				);

				// Send post request to logging API
				$response = wp_remote_post( $post_url, $args );

				// Retrieve response status code
				$response_status = wp_remote_retrieve_response_code( $response );

				// Retrieve response body
				$response      = wp_remote_retrieve_body( $response );
				$test_response = $response;

				// Decode response body
				$test_response = json_decode( $test_response );

				// Check if response is successful and delete temporary log file
				if ( ! empty( $response ) && $test_response !== null && $test_response->status == 'success' ) {
					unlink( BLOYAL_UPLOAD_DIR_BASEPATH . '/bloyal_temp_log.txt' );
				}
				
				// Handle any WP errors during remote request
				$result = json_decode( $response, true );
				if ( is_wp_error( $result ) ) {
					$error = $response->get_error_message();
					throw new Exception( $error, 1 );
				}
			} catch ( Exception $e ) {
				// Log any exceptions encountered during log file upload
				self::write_custom_log( $e->getMessage(), 3 );
			}
		}

		/**
		 * Reads and processes the log file to prepare data for uploading.
		 *
		 * @return void
		 */
		private function readLogFile() {
			try {
				// Check if logging is enabled
				self::$log_enable = bloyal_log_settings();
				if ( 'true' === self::$log_enable ) {

					// Set path for temporary log file
					$read_log_file = BLOYAL_UPLOAD_DIR_BASEPATH . '/bloyal_temp_log.txt';

					// Open temporary log file
					$log_temp_file = fopen( $read_log_file, 'a' );

					// Write log file contents to temporary log file
					fwrite( $log_temp_file, file_get_contents( self::$log_file_name ) );

					// Close temporary log file
					fclose( $log_temp_file );

					// Delete original log file
					unlink( self::$log_file_name );

					// Open temporary log file for reading
					$handle = fopen( BLOYAL_UPLOAD_DIR_BASEPATH . '/bloyal_temp_log.txt', 'r' );

					// Initialize variables for parsing log entries
					$this->log_file_data = array();
					$data                = $current_log_type = $file_name = $date_time = $function_name = '';

					// Read log file line by line
					while ( $line = fgets( $handle, 1000 ) ) {
						$line  = trim( $line );
						$data .= $line;

						// Parse log entry details
						if ( strpos( $line, 'Log:' ) === 0 ) {
							foreach ( self::$logtype as $key => $type ) {
								if ( strpos( $line, $type ) !== false ) {
									$current_log_type = $type;
								}
							}
						}
						if ( strpos( $line, 'File:' ) === 0 ) {
							$file_name = str_replace( 'File:', '', $line );
						}
						if ( strpos( $line, 'Date time:' ) === 0 ) {
							$date_time = str_replace( 'Date time:', '', $line );
						}
						if ( strpos( $line, 'Function:' ) === 0 ) {
							$function_name = str_replace( 'Function:', '', $line );
						}
						if ( strpos( $line, self::$log_delimeter ) !== false ) {

							// Prepare log entry data
							$message_detail        = array(
								str_replace( self::$log_delimeter, '', $data ),
							);
							$this->log_file_data[] = array(
								'ContextExternalId' => $file_name,
								'EntityTypeName'    => "Woocommerce Plugin {$current_log_type} Logs For function: {$function_name}.",
								'MessageFormat'     => 'Text',
								'MessageDetail'     => $message_detail,
								'EntityValue'       => array(),
								'EventType'         => $current_log_type,
								'Duration'          => '',
								'Message'           => "bLoyal Woocommerce Connector Logs for Client: {$this->domain_name}",
								'Created'           => $date_time,
								'Stack'             => '',
							);

							// Reset variables for next log entry
							$data = $current_log_type = $file_name = $date_time = $function_name = '';
						}
					}
				}
			} catch ( Exception $e ) {
				// Log any exceptions encountered during log file reading
				self::write_custom_log( $e->getMessage(), 3 );
			}
		}
	}
}
