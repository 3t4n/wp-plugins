<?php
/**
 * bLoyalSnipetsLoggerService class for managing logging of bLoyal snippets.
 * This class handles logging of various types of messages (Info, Warning, Exception)
 * to a log file based on certain conditions.
 */
if ( ! class_exists( 'bLoyalSnipetsLoggerService' ) ) {

	/**
	 * Retrieves the current setting for enabling/disabling snippet logging.
	 *
	 * @return string|null 'true' if logging is enabled, null otherwise.
	 */
	function bloyal_snippet_log_settings() {
		$snippet_log_enable = get_option( 'bloyal_log_enable_disable' );
		return $snippet_log_enable;
	}
	class bLoyalSnipetsLoggerService {

		/**
		 * The path to the log file.
		 *
		 * @var string
		 */
		private static $logFileName = BLOYAL_UPLOAD_DIR_BASEPATH . '/bLoyal_snippets_log_file.txt';

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
		private static $logDelimeter = '====================================';

		/**
		 * Maximum size of the log file in bytes.
		 *
		 * @var int
		 */
		private $maxSize;

		/**
		 * Data read from the log file.
		 *
		 * @var array
		 */
		private $logFileData;

		/**
		 * Domain name associated with bLoyal.
		 *
		 * @var string
		 */
		private $domainName;

		/**
		 * Access key for bLoyal snippets.
		 *
		 * @var string
		 */
		private $accessKey;

		/**
		 * Indicates whether snippet logging is enabled.
		 *
		 * @var string|null
		 */
		public static $snippet_log_enable = null;

		/**
		 * Constructor for bLoyalSnipetsLoggerService class.
		 */
		public function __construct() {
			$this->maxSize       = 1;
			$this->domainName    = get_option( 'bloyal_domain_name' );
			$this->accessKey     = get_option( 'bloyal_snippets_access_key' );
			$this->loggingApiUrl = get_option( 'logging_api_url_snippet' );
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
				self::$snippet_log_enable = bloyal_snippet_log_settings();
				if ( 'true' === self::$snippet_log_enable ) {

					// Open log file
					$logfile = fopen( self::$logFileName, 'a' );

					// Prepare log data
					$logData = 'Log: 	' . self::$logtype[ $type ] . "\r\n" .
								'File: 	' . debug_backtrace()[0]['file'] . "\r\n" .
								'Line:	' . debug_backtrace()[0]['line'] . "\r\n" .
								'Class: ' . debug_backtrace()[0]['class'] . "\r\n" .
								'Function: ' . debug_backtrace()[1]['function'] . "\r\n" .
								'Date time: ' . date( 'Y-m-d H:i:s A' ) . "\r\n" .
								$log . "\r\n" . self::$logDelimeter . "\r\n";

					// Write to log file
					fwrite( $logfile, $logData );

					// Close log file
					fclose( $logfile );
				}
			} catch ( Exception $e ) {

				// Log any exceptions encountered during logging
				self::write_custom_log( $e->getMessage(), 3 );
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
				if ( file_exists( self::$logFileName ) && filesize( self::$logFileName ) < $this->maxSize ) {
					return false;
				}

				// Read log file data
				$this->readLogFile();

				// If no log data, return false
				if ( empty( $this->logFileData ) ) {
					return false;
				}
				// this API user for bLoyal Logger service by bLoyal
				$post_url = $this->loggingApiUrl . "/api/v4/{$this->accessKey}/Logger/Multiple";

				// Prepare arguments for post request
				$args = array(
					'headers' => array(
						'Content-Type' => 'application/json',
					),
					'body'    => wp_json_encode( $this->logFileData ),
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
				if ( ! empty( $response ) && $test_response->status == 'success' ) {
					unlink( BLOYAL_UPLOAD_DIR_BASEPATH . '/bloyal_temp_log_snippet.txt' );
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
				self::$snippet_log_enable = bloyal_snippet_log_settings();
				if ( 'true' === self::$snippet_log_enable ) {

					// Set path for temporary log file
					$read_snippet_log_file = BLOYAL_UPLOAD_DIR_BASEPATH . '/bloyal_temp_log_snippet.txt';

					// Open temporary log file
					$logTempFile = fopen( $read_snippet_log_file, 'a' );

					// Write log file contents to temporary log file
					fwrite( $logTempFile, file_get_contents( self::$logFileName ) );

					// Close temporary log file
					fclose( $logTempFile );

					// Delete original log file
					unlink( self::$logFileName );

					// Open temporary log file for reading
					$handle = fopen( BLOYAL_UPLOAD_DIR_BASEPATH . '/bloyal_temp_log_snippet.txt', 'r' );

					// Initialize variables for parsing log entries
					$this->logFileData = array();
					$data              = $currentLogType = $fileName = $dateTime = $functionName = '';

					// Read log file line by line
					while ( $line = fgets( $handle, 1000 ) ) {
						$line  = trim( $line );
						$data .= $line;

						// Parse log entry details
						if ( strpos( $line, 'Log:' ) === 0 ) {
							foreach ( self::$logtype as $key => $type ) {
								if ( strpos( $line, $type ) !== false ) {
									$currentLogType = $type;
								}
							}
						}
						if ( strpos( $line, 'File:' ) === 0 ) {
							$fileName = str_replace( 'File:', '', $line );
						}
						if ( strpos( $line, 'Date time:' ) === 0 ) {
							$dateTime = str_replace( 'Date time:', '', $line );
						}
						if ( strpos( $line, 'Function:' ) === 0 ) {
							$functionName = str_replace( 'Function:', '', $line );
						}
						if ( strpos( $line, self::$logDelimeter ) !== false ) {

							// Prepare log entry data
							$message_details     = array(
								str_replace( self::$logDelimeter, '', $data ),
							);
							$this->logFileData[] =
							array(
								'ContextExternalId' => $fileName,
								'EntityTypeName'    => "Woocommerce Plugin {$currentLogType} Logs For function: {$functionName}.",
								'MessageFormat'     => 'Text',
								'MessageDetail'     => $message_details,
								'EntityValue'       => array(),
								'EventType'         => $currentLogType,
								'Duration'          => '',
								'Message'           => "bLoyal Woocommerce Connector Logs for Client: {$this->domainName}",
								'Created'           => $dateTime,
								'Stack'             => '',
							);

							// Reset variables for next log entry
							$data = $currentLogType = $fileName = $dateTime = $functionName = '';
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
