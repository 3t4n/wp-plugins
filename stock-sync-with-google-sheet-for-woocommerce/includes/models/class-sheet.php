<?php
/**
 * Sheet class for Stock Sync with Google Sheet for WooCommerce.
 *
 * @package StockSyncWithGoogleSheetForWooCommerce
 * @since 1.0.0
 */

// Namespace.
namespace StockSyncWithGoogleSheetForWooCommerce;

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Use Google API.

if ( ! class_exists('\StockSyncWithGoogleSheetForWooCommerce\Sheet') ) {

	/**
	 * Sheet class for Stock Sync with Google Sheet for WooCommerce.
	 *
	 * @package StockSyncWithGoogleSheetForWooCommerce
	 * @since 1.0.0
	 */
	class Sheet extends Base {
		/**
		 * Credentials for Google API.
		 *
		 * @var array
		 */
		protected $credentials;

		/**
		 * Spreadsheet URL
		 *
		 * @var string
		 */
		protected $spreadsheet_url;

		/**
		 * Spreadsheet ID
		 *
		 * @var string
		 */
		protected $spreadsheet_id;

		/**
		 * Spreadsheet Tab ID
		 *
		 * @var string
		 */
		protected $sheet_id;

		/**
		 * Spreadsheet Tab Name
		 *
		 * @var string
		 */
		protected $sheet_tab;

		/**
		 * Constructor.
		 *
		 * @param string $sheet_id Spreadsheet ID.
		 * @param string $sheet_tab Spreadsheet Tab.
		 * @throws \Exception If plugin is not ready to use.
		 */
		public function __construct( $sheet_id = null, $sheet_tab = null ) {

			/**
			 * Check if plugin is ready to use
			 */

			if ( ssgsw()->is_plugin_ready() === false ) {
				throw new \Exception('Plugin is not ready to use.');
			}

			/**
			 * Default credentials
			 */
			$this->credentials = ssgsw_get_option('credentials');

			/**
			 * The Spreadsheet
			 */
			$this->spreadsheet_url = ssgsw_get_option('spreadsheet_url');

			$this->spreadsheet_id = $sheet_id ?? ssgsw_get_option('spreadsheet_id');

			if ( ! $this->spreadsheet_id ) {
				// Parse Spreadsheet ID from URL using regex.
				preg_match('/spreadsheets\/d\/([a-zA-Z0-9-_]+)/', $this->spreadsheet_url, $matches);
				$this->spreadsheet_id = $matches[1] ?? null;
			}

			/**
			 * Single Sheet
			 */
			$this->sheet_tab = $sheet_tab ?? ssgsw_get_option('sheet_tab');
			$this->sheet_id  = ssgsw_get_option('sheet_id', 0 );
		}

		/**
		 * Set Sheet ID.
		 *
		 * @param string $spreadsheet_id Spreadsheet ID.
		 * @return $this
		 */
		public function setID( $spreadsheet_id = null ) {
			if ( $spreadsheet_id ) {
				$this->spreadsheet_id = $spreadsheet_id;
			}

			return $this;
		}

		/**
		 * Set Sheet Tab Name.
		 *
		 * @param string $sheet_tab Spreadsheet Tab.
		 * @return $this
		 */
		public function setTab( $sheet_tab = null ) {
			if ( $sheet_tab ) {
				$this->sheet_tab = $sheet_tab;
			}

			return $this;
		}

		/**
		 * Generate access token for google sheet access.
		 *
		 * @return mixed
		 */
		protected function generate_access_token() {
			try {
				$credentials = $this->credentials;
				if ( is_array( $credentials ) ) {
					if ( ! array_key_exists( 'client_email', $credentials ) ) {
						return false;
					}
					if ( ! array_key_exists( 'private_key', $credentials ) ) {
						return false;
					}
					$client_email = $credentials['client_email'];
					$private_key = $credentials['private_key'];
					$now = time();
					$exp = $now + 3600;
					$payload = wp_json_encode(
						[
							'iss' => $client_email,
							'aud' => 'https://oauth2.googleapis.com/token',
							'iat' => $now,
							'exp' => $exp,
							'scope' => 'https://www.googleapis.com/auth/spreadsheets',
						]
					);

					$header = wp_json_encode([
						'alg' => 'RS256',
						'typ' => 'JWT',
					]);

					$base64_url_header = str_replace([ '+', '/', '=' ], [ '-', '_', '' ], base64_encode($header));
					$base64_url_payload = str_replace([ '+', '/', '=' ], [ '-', '_', '' ], base64_encode($payload));

					$signature = '';
					openssl_sign($base64_url_header . '.' . $base64_url_payload, $signature, $private_key, 'SHA256');
					$base64_url_signature = str_replace([ '+', '/', '=' ], [ '-', '_', '' ], base64_encode($signature));

					$jwt = $base64_url_header . '.' . $base64_url_payload . '.' . $base64_url_signature;

					$token_url = 'https://oauth2.googleapis.com/token';
					$body = [
						'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
						'assertion' => $jwt,
					];

					$response = wp_remote_post(
						$token_url, [
							'body' => $body,
						]
					);

					$response_body = wp_remote_retrieve_body($response);
					$token_data = json_decode($response_body, true);
					if ( is_array($token_data) ) {
						if ( array_key_exists( 'access_token', $token_data ) ) {
							$access_token = $token_data['access_token'];
							return $access_token;
						}
					}
					return false;
				} else {
					return false;
				}
			} catch ( \Exception $e ) {
				return false;
			}
		}
		/**
		 * Generate token access token.
		 *
		 * @return string
		 */
		public function get_token() {
			$new_token = $this->generate_access_token();
			if ( $new_token ) {
				return $new_token;
			} else {
				return $this->generate_access_token();
			}
		}
		/**
		 * Get values from Google Sheet by range using wp_remote_post.
		 *
		 * @param string $range Range.
		 * @param string $dimension Dimension.
		 * @param string $sheet_tab Sheet Tab.
		 * @return array|false An array of values or false if there's an error.
		 */
		public function get_values( $range = null, $dimension = 'ROWS', $sheet_tab = null ) {
			if ( ! $range ) {
				return false;
			}

			if ( ! $sheet_tab ) {
				$sheet_tab = $this->sheet_tab;
			} else {
				$this->sheet_tab = $sheet_tab;
			}

			$url = 'https://sheets.googleapis.com/v4/spreadsheets/' . $this->spreadsheet_id . '/values/' . urlencode($sheet_tab . '!' . $range);
			$args = [
				'method' => 'GET',
				'headers' => [
					'Authorization' => 'Bearer ' . $this->get_token(),
				],
				'timeout' => 300,
			];

			$response = wp_remote_request($url, $args);

			if ( is_wp_error($response) ) {
				return false;
			}
			$response_body = wp_remote_retrieve_body($response);
			$response_data = json_decode($response_body, true);
			if ( isset( $response_data['values'] ) ) {
				return $response_data['values'];
			}
			return false;
		}

		/**
		 * Get first column's value from Google Sheet using wp_remote_request.
		 *
		 * @return array|false An array of values or false if there's an error.
		 */
		public function get_first_columns() {
			$url = 'https://sheets.googleapis.com/v4/spreadsheets/' . $this->spreadsheet_id . '/values/' . urlencode($this->sheet_tab . '!A:A');
			$args = [
				'method' => 'GET',
				'headers' => [
					'Authorization' => 'Bearer ' . $this->get_token(),
				],
				'timeout' => 300,
			];
			$response = wp_remote_request($url, $args);
			if ( is_wp_error( $response ) ) {
				return [];
			}
			$response_body = wp_remote_retrieve_body($response);
			$response_data = json_decode($response_body, true);
			if ( isset( $response_data['values'] ) ) {
				return $response_data['values'];
			}
			return [];
		}
		/**
		 * Updates values in Google Sheet by range using wp_remote_post.
		 *
		 * @param string $row_number Row number.
		 * @param array  $values Values.
		 * @param string $dimension Dimension.
		 * @return bool True if the update was successful, false otherwise.
		 */
		public function update_single_row_values( $row_number = null, $values = null, $dimension = null ) {
			if ( ! $row_number || ! $values ) {
				return false;
			}
			
			
			$url = 'https://sheets.googleapis.com/v4/spreadsheets/' . $this->spreadsheet_id . '/values/' . urlencode($this->sheet_tab . '!' . $row_number . ':' . $row_number) . '?valueInputOption=USER_ENTERED';
			$args = array(
				'method' => 'PUT',
				'headers' => array(
					'Authorization' => 'Bearer ' . $this->get_token(),
					'Content-Type' => 'application/json',
				),
				'body' => wp_json_encode(array(
					'values' => [ $values ],
				)),
				'timeout' => 300,
			);

			$response = wp_remote_request($url, $args);

			if ( is_wp_error($response) ) {
				return false;
			}

			$response_body = wp_remote_retrieve_body($response);
			$response_data = json_decode($response_body, true);
			if ( isset($response_data['updatedRows']) && $response_data['updatedRows'] > 0 ) {
				return true;
			} else {
				return false;
			}
		}
		/**
		 * Inserts new rows at a specific index in a Google Sheet.
		 *
		 * @param int  $start_index Starting index to insert the rows (zero-based).
		 * @param int  $number_of_rows Number of rows to insert.
		 * @param bool $inherit_from_before Whether to inherit formatting from the row before.
		 */
		public function insert_data_into_google_sheet( $start_index, $data ) {
			
			$insert_url = 'https://sheets.googleapis.com/v4/spreadsheets/' . $this->spreadsheet_id . ':batchUpdate';
			$rows = array();
			foreach ( $data as $row ) {
				$row_data = array();
				foreach ( $row as $cell ) {
					$row_data[] = array( 'userEnteredValue' => array( 'stringValue' => (string) $cell ) );
				}
				$rows[] = array( 'values' => $row_data );
			}

			$body = array(
				'requests' => array(
					array(
						'insertDimension' => array(
							'range' => array(
								'sheetId' => $this->sheet_id,
								'dimension' => 'ROWS',
								'startIndex' => $start_index - 1,
								'endIndex' => $start_index,
							),
							'inheritFromBefore' => false,
						),
					),
					// Set values for the newly inserted rows.
					array(
						'updateCells' => array(
							'rows' => $rows,
							'range' => array(
								'sheetId' => $this->sheet_id,
								'startRowIndex' => $start_index - 1,
								'endRowIndex' => $start_index,
							),
							'fields' => 'userEnteredValue',
						),
					),
				),
			);

			// Set up the request to insert the rows and update values
			$insert_args = array(
				'method'  => 'POST',
				'headers' => array(
					'Authorization' => 'Bearer ' . $this->get_token(),
					'Content-Type'  => 'application/json',
				),
				'body'    => wp_json_encode($body),
				'timeout' => 300,
			);
			$insert_response = wp_remote_request($insert_url, $insert_args);
			if ( is_wp_error($insert_response) ) {
				return false;
			} else {
				$response_code = wp_remote_retrieve_response_code($insert_response);
				if ( $response_code === 200 || $response_code === 204 ) {
					return true;
				} else {
					return false;
				}
			}
		}

		/**
		 * Get columns letter
		 *
		 * @param string $column_number columnnumber.
		 */
		public function getColumnLetter( $column_number ) {
			$letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$column_letter = '';

			while ( $column_number > 0 ) {
				$column_number--;
				$column_letter = $letters[ $column_number % 26 ] . $column_letter;
				$column_number = intval($column_number / 26);
			}

			return $column_letter;
		}
		/**
		 * Deletes a batch of rows from a Google Sheet using the Sheets API.
		 *
		 * This function takes an array of row numbers and sends a batch request to the
		 * Google Sheets API to delete the specified rows from the sheet. The rows are
		 * deleted in descending order to avoid index shifting issues.
		 *
		 * @param array $row_numbers An array of row numbers to delete from the sheet.
		 *                           Row numbers should be positive integers, and they
		 *                           will be deleted in the order provided (from highest to lowest).
		 *                           Example: [6, 4, 12, 9]
		 *
		 * @return bool Returns `true` if the rows were successfully deleted,
		 *              `false` if there was an error or no rows were passed.
		 */
		public function delete_batch_rows( $row_numbers ) {
			if ( empty($row_numbers) ) {
				return false;  // If no rows are passed, return false.
			}

			// Sort the row numbers in descending order to avoid index shifting issues when deleting
			rsort($row_numbers);

			// Create the requests for each row to delete
			$requests = array();

			foreach ( $row_numbers as $row_number ) {
				if ( ! $row_number ) {
					continue;  // Skip invalid row numbers
				}

				// Create the delete request for the row
				$requests[] = array(
					'deleteDimension' => array(
						'range' => array(
							'sheetId' => $this->sheet_id,
							'dimension' => 'ROWS',
							'startIndex' => $row_number - 1, // Google Sheets API expects zero-based index
							'endIndex' => $row_number, // For deleting a single row
						),
					),
				);
			}

			// If there are no valid requests, return false
			if ( empty($requests) ) {
				return false;
			}

			// Prepare the API request URL
			$url = 'https://sheets.googleapis.com/v4/spreadsheets/' . $this->spreadsheet_id . ':batchUpdate';

			// Prepare the API arguments
			$args = array(
				'method' => 'POST',
				'headers' => array(
					'Authorization' => 'Bearer ' . $this->get_token(),
					'Content-Type' => 'application/json',
				),
				'body' => wp_json_encode(array(
					'requests' => $requests,
				)),
				'timeout' => 300,
			);

			// Send the request to the Google Sheets API
			$response = wp_remote_request($url, $args);

			// Check for errors in the request
			if ( is_wp_error($response) ) {
				return false;
			}

			// Get the response code
			$response_code = wp_remote_retrieve_response_code($response);

			// If the response code is 200 (OK), return true, else return false
			if ( 200 === $response_code ) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Delete single row value using wp_remote_post.
		 *
		 * @param int $row_number Row number to delete (starting from 1).
		 * @return bool
		 */
		public function delete_single_row( $row_number = 2 ) {
			if ( ! $row_number ) {
				return false;
			}

			$url = 'https://sheets.googleapis.com/v4/spreadsheets/' . $this->spreadsheet_id . ':batchUpdate';

			$request = array(
				'deleteDimension' => array(
					'range' => array(
						'sheetId' => $this->sheet_id,
						'dimension' => 'ROWS',
						'startIndex' => $row_number - 1,
						'endIndex' => $row_number,
					),
				),
			);

			$args = array(
				'method' => 'POST',
				'headers' => array(
					'Authorization' => 'Bearer ' . $this->get_token(),
					'Content-Type' => 'application/json',
				),
				'body' => wp_json_encode(array(
					'requests' => array( $request ),
				)),
				'timeout' => 300,
			);

			$response = wp_remote_request($url, $args);

			if ( is_wp_error($response) ) {
				return false;
			}

			$response_code = wp_remote_retrieve_response_code($response);

			if ( 200 === $response_code ) {
				return true;
			} else {
				return false;
			}
		}
		/**
		 * Delete single row value using wp_remote_post.
		 *
		 * @param int $row_number Row number to delete (starting from 1).
		 * @return bool
		 */
		public function delete_single_row_batch( $row_number, $end_index ) {
			if ( ! $row_number ) {
				return false;
			}
			if ( ! $end_index ) {
				$end_index = $row_number;
			}

			$url = 'https://sheets.googleapis.com/v4/spreadsheets/' . $this->spreadsheet_id . ':batchUpdate';

			$request = array(
				'deleteDimension' => array(
					'range' => array(
						'sheetId' => $this->sheet_id,
						'dimension' => 'ROWS',
						'startIndex' => $row_number - 1,
						'endIndex' => $end_index,
					),
				),
			);

			$args = array(
				'method' => 'POST',
				'headers' => array(
					'Authorization' => 'Bearer ' . $this->get_token(),
					'Content-Type' => 'application/json',
				),
				'body' => wp_json_encode(array(
					'requests' => array( $request ),
				)),
				'timeout' => 300,
			);

			$response = wp_remote_request($url, $args);

			if ( is_wp_error($response) ) {
				return false;
			}

			$response_code = wp_remote_retrieve_response_code($response);

			if ( 200 === $response_code ) {
				return true;
			} else {
				return false;
			}
		}
		/**
		 * Append new row to Google Sheets using wp_remote_post.
		 *
		 * @param array  $data Data to append as a new row.
		 * @param string $type Type of append (e.g., 'test' or 'deleted_product').
		 * @return mixed Append index if successful, false on failure.
		 */
		public function append_new_row( $data, $type = 'test' ) {
			if ( ! $data ) {
				return false;
			}
			try {
				$access_token = $this->get_token();
				$spreadsheet_id = $this->spreadsheet_id;
				$sheet_name = $this->sheet_tab;
				$api_url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}/values/{$sheet_name}:append?valueInputOption=USER_ENTERED";
				$data = array(
					'values' => [ $data ],
				);
				$request_data = array(
					'majorDimension' => 'ROWS',
					'values' => $data['values'],
				);
				$headers = array(
					'Authorization' => "Bearer {$access_token}",
					'Content-Type' => 'application/json',
				);

				// Make the API request
				$response = wp_remote_post(
					$api_url, array(
						'headers' => $headers,
						'body' => wp_json_encode($request_data),
						'timeout' => 300,
					)
				);
				$response_body = wp_remote_retrieve_body( $response );
				$response_data = json_decode( $response_body, true );
				if ( isset( $response_data['updates']['updatedRows'] ) ) {
					$updated_range = $response_data['updates']['updatedRange'];
					$row_index = ssgsw_extract_row_number($updated_range);
					if ( $row_index ) {
						return $row_index;
					}
					return $row_index;
				}
				return false;
			} catch ( \Throwable $error ) {
				return false;
			}
		}

		/**
		 * Sort Google Sheet data based on the first column using wp_remote_post.
		 *
		 * @param string $spreadsheet_id The ID of the Google Spreadsheet.
		 * @param string $access_token The access token for authorization.
		 *
		 * @return bool True if successful, false on failure.
		 */
		public function sort_google_sheet_data_wp_remote( $spreadsheet_id, $access_token ) {
			try {
				$sort_range = array(
					'sheetId' => $this->sheet_id,
					'startRowIndex' => 1,
					'endRowIndex' => 0,
					'startColumnIndex' => 0,
					'endColumnIndex' => null,
				);

				$sort_spec = array(
					'dimensionIndex' => 0,
					'sortOrder' => 'ASCENDING',
				);

				$sort_range_request = array(
					'sortRange' => array(
						'range' => $sort_range,
						'sortSpecs' => array( $sort_spec ),
					),
				);

				$batch_update_request = array(
					'requests' => array( $sort_range_request ),
				);
				$sort_range['endRowIndex'] = null;
				$sort_range_request['sortRange']['range'] = $sort_range;
				$batch_update_request['requests'] = array( $sort_range_request );
				// Build the URL for the batch update.
				$url = 'https://sheets.googleapis.com/v4/spreadsheets/' . $spreadsheet_id . ':batchUpdate';

				// Prepare the request arguments.
				$headers = array(
					'Authorization' => 'Bearer ' . $access_token,
					'Content-Type' => 'application/json',
				);

				$body = wp_json_encode($batch_update_request);

				$args = array(
					'body' => $body,
					'headers' => $headers,
					'method' => 'POST',
					'timeout' => 300,
				);
				$response = wp_remote_request($url, $args);
				if ( is_wp_error($response) ) {
					return false;
				}
				$response_code = wp_remote_retrieve_response_code($response);
				if ( 200 === $response_code ) {
					return true;
				} else {
					return false;
				}
			} catch ( \Exception $e ) {
				return false;
			}
		}
		/**
		 * Get rows from google sheet by range.
		 *
		 * @param string $range Range.
		 * @param string $sheet_tab Sheet Tab.
		 */
		public function get_rows( $range = null, $sheet_tab = null ) {
			if ( ! $range ) {
				return false;
			}
			return $this->get_values($range, 'ROWS', $sheet_tab);
		}
		/**
		 * Clear all data from all columns starting from a specific row index.
		 *
		 * @param int $start_row Starting row index (zero-based).
		 * @return bool True if successful, false on failure.
		 */
		public function clear_all_columns_from_row( $start_row, $access_token ) {
			try {
				$spreadsheet_id = $this->spreadsheet_id;
				$sheet_name     = $this->sheet_tab;
				$start_row_one_based = $start_row + 1;
				$end_index = $start_row_one_based + 100000;
				$range = "{$sheet_name}!A{$start_row_one_based}:Z{$end_index}";
				$api_url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}/values/{$range}:clear";
				if ( empty($access_token) ) {
					return false;
				}
				$headers = array(
					'Authorization' => "Bearer {$access_token}",
					'Content-Type'  => 'application/json',
				);

				// Send the clear request
				$response = wp_remote_post(
					$api_url, array(
						'headers' => $headers,
					)
				);
				$response_code = wp_remote_retrieve_response_code($response);
				if ( $response_code === 204 || $response_code === 200 ) { // 204 No Content indicates success
					return true;
				} else {
					return false;
				}
			} catch ( \Exception $e ) {
				return false;
			}
		}

		/**
		 * Get columns from google sheet by range.
		 *
		 * @param string $range Range.
		 * @param string $sheet_tab Sheet Tab.
		 * @return array|bool
		 */
		public function get_columns( $range = null, $sheet_tab = null ) {
			if ( ! $range ) {
				return false;
			}
			return $this->get_values($range, 'COLUMNS', $sheet_tab);
		}
		/**
		 * Appends data to a specified Google Sheet.
		 *
		 * @param array $values Data to append, formatted as a 2D array.
		 * @return bool True on success, false on failure.
		 */
		public function append_batch_product_to_sheet( $values, $offset = 0, $index = 1 ) {
			// Check if $values is empty.
			try {
				$access_token = $this->get_token();
				if (0 == $offset) { //phpcs:ignore
					$this->reset_all_sheet_information($access_token);
				} else {
					$this->clear_all_columns_from_row($index, $access_token);
				}
				if ( empty($values) ) {
					return false;
				}
				$spreadsheet_id = $this->spreadsheet_id;
				$sheet_name = $this->sheet_tab;

				// Google Sheets API URL for appending values
				$api_url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}/values/{$sheet_name}!A1:append?valueInputOption=USER_ENTERED";

				$data = array(
					'values' => $values,
				);

				$request_data = array(
					'majorDimension' => 'ROWS',
					'values' => $data['values'],
				);

				$headers = array(
					'Authorization' => "Bearer {$access_token}",
					'Content-Type' => 'application/json',
				);

				// Make the API request to append data
				$response = wp_remote_post(
					$api_url, array(
						'headers' => $headers,
						'body' => wp_json_encode($request_data),
						'timeout' => 300,
					)
				);

				$response_body = wp_remote_retrieve_body($response);
				$response_data = json_decode($response_body, true);
				if ( isset($response_data['updates']['updatedRows']) ) {
					return true;
				} else {
					return false;
				}
			} catch ( \Throwable $error ) {
				return false;
			}
		}
		/**
		 * Updates values in google sheet by range.
		 *
		 * @param  string $range     Range.
		 * @param  array  $values    Values.
		 * @param  string $dimension Dimension.
		 * @return mixed
		 */
		public function update_values( $range = null, $values = null, $dimension = null ) {
			if ( ! $range || ! $values ) {
				return false;
			}
			try {
				$access_token = $this->get_token();
				$this->reset_all_sheet_information($access_token);
				$spreadsheet_id     = $this->spreadsheet_id;
				$sheet_name = $this->sheet_tab;
				$api_url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}/values/{$sheet_name}!A1:append?valueInputOption=USER_ENTERED";
				$data = array(
					'values' => $values,
				);
				$request_data = array(
					'majorDimension' => 'ROWS',
					'values' => $data['values'],
				);
				$headers = array(
					'Authorization' => "Bearer {$access_token}",
					'Content-Type' => 'application/json',
				);
				$response = wp_remote_post(
					$api_url, array(
						'headers' => $headers,
						'body' => wp_json_encode($request_data),
						'timeout' => 300,
					)
				);
				$response_body = wp_remote_retrieve_body($response);
				$response_data = json_decode($response_body, true);
				if ( isset($response_data['updates']['updatedRows']) ) {
					   return true;
				} else {
					return false;
				}
			} catch ( \Throwable $error ) {
				return false;
			}
		}
		/**
		 * Updates values in Google Sheet by range using wp_remote_post.
		 *
		 * @param int   $start_row Starting row number.
		 * @param int   $end_row Ending row number.
		 * @param array $values Values to be updated.
		 * @return bool True if the update was successful, false otherwise.
		 */
		public function update_multiple_row_values( $values, $start_row, $end_row ) {
			// Ensure valid parameters
			if ( empty($values) ) {
				return false;
			}

			// Create the range string
			$range = "{$this->sheet_tab}!A{$start_row}:Z{$end_row}"; // Adjust column range if needed
			$url = 'https://sheets.googleapis.com/v4/spreadsheets/' . $this->spreadsheet_id . '/values/' . urlencode($range) . '?valueInputOption=USER_ENTERED';
			$args = array(
				'method' => 'PUT',
				'headers' => array(
					'Authorization' => 'Bearer ' . $this->get_token(),
					'Content-Type' => 'application/json',
				),
				'body' => wp_json_encode(array(
					'range' => $range,
					'values' => $values,
				)),
				'timeout' => 300,
			);

			// Make the request
			$response = wp_remote_request($url, $args);

			if ( is_wp_error($response) ) {
				return false;
			}

			$response_body = wp_remote_retrieve_body($response);
			$response_data = json_decode($response_body, true);

			if ( isset($response_data['updatedRows']) && $response_data['updatedRows'] > 0 ) {
				return true;
			} else {
				return false;
			}
		}


		/**
		 * Get Formula value from Google Sheets using start and end indices
		 *
		 * @param int $start_row The starting row (1-based index) for the data to be retrieved.
		 * @param int $end_row The ending row (1-based index) for the data to be retrieved.
		 * @return array The sliced values from the Google Sheets.
		 */
		public function get_formula_value_start_index( $start_row, $end_row ) {
			$access_token = $this->get_token();
			$spreadsheet_id = $this->spreadsheet_id;

			if ( ! $access_token || ! $spreadsheet_id ) {
				return false;
			}

			$sheet_name = $this->sheet_tab;

			// Convert row numbers to range format (e.g., A1:B2)
			$start_cell = "A{$start_row}";
			$end_cell = "Z{$end_row}"; // Assuming you want to get columns A to Z
			$range = "{$sheet_name}!{$start_cell}:{$end_cell}";

			$url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}/values/{$range}";

			$options = [
				'valueRenderOption' => 'FORMULA',
			];

			$response = wp_remote_get($url, [
				'headers' => array(
					'Authorization' => "Bearer {$access_token}",
				),
				'body' => $options,
			]);

			if ( is_wp_error($response) ) {
				return [];
			}

			$data = wp_remote_retrieve_body($response);
			$decoded_data = json_decode($data, true);

			if ( isset($decoded_data['error']) ) {
				return [];
			}

			// Check if 'values' exists
			if ( isset($decoded_data['values']) ) {
				return $decoded_data['values'];
			}

			return [];
		}

		/**
		 * Get Formula value form google Sheets
		 *
		 * @return array
		 */
		public function get_formula_value() {
			$access_token = $this->get_token();
			$spreadsheet_id = $this->spreadsheet_id;
			if ( ! $access_token || ! $spreadsheet_id ) {
				return false;
			}
			$sheet_name = $this->sheet_tab;
			$range = 'A:Z';
			$url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}/values/{$sheet_name}!{$range}";
			$options = [
				'valueRenderOption' => 'FORMULA',
			];
			$response = wp_remote_get($url, [
				'headers' => array(
					'Authorization' => "Bearer {$access_token}",
				),
				'body' => $options,
			]);
			if ( is_wp_error($response) ) {
				return [];
			}
			$data = wp_remote_retrieve_body($response);
			$decoded_data = json_decode($data, true);

			if ( isset($decoded_data['error']) ) {
				return [];
			}
			if ( isset($decoded_data['values']) ) {
				return $decoded_data['values'];
			} else {
				return [];
			}
		}
		/**
		 * Updates rows in google sheet by range.
		 *
		 * @param string $range Range.
		 * @param array  $values Values.
		 * @return mixed
		 */
		public function update_row_values( $range = null, $values = null ) {

			if ( ! $range || ! $values ) {
				return false;
			}

			return $this->update_values($range, $values, 'ROWS');
		}

		/**
		 * Updates columns in google sheet by range.
		 *
		 * @param string $range Range.
		 * @param array  $values Values.
		 * @return mixed
		 */
		public function update_row_columns( $range = null, $values = null ) {
			if ( ! $range || ! $values ) {
				return false;
			}
			return $this->update_values($range, $values, 'COLUMNS');
		}
		/**
		 * Initializes the Google Sheets API service.
		 *
		 * @throws \Exception If the API client library is not found.
		 * @return mixed
		 */
		public function initialize() {
			try {
				$sheets = $this->get_sheet_tab();
				if ( empty($sheets) ) {
					$sheets = $this->get_sheet_tab();
				}
				$sheet = array_filter(
					$sheets,
					function ( $sheet ) {
						return $sheet['properties']['title'] === $this->sheet_tab;
					}
				);

				/**
				 * Getting Sheet ID of working sheet
				 */
				if ( ! $sheet ) {
					   // if no sheet title matched, create new one with the title of the sheet.
					   $response = $this->create_sheet_tab( $this->sheet_tab );
					   $sheet = isset($response['replies'][0]['addSheet']) ? $response['replies'][0]['addSheet'] : [];
				} else {
					$sheet = array_values( $sheet )[0];
				}
				$sheet_id = isset( $sheet['properties']['sheetId']) ? $sheet['properties']['sheetId'] : 0;
				/**
				 * Save working Sheet ID to database for later use.
				 */
				ssgsw_update_option( 'sheet_id', $sheet_id );

				$updated = $this->sync_sheet_headers();

				return $updated;

			} catch ( \Exception $e ) {
				throw new \Exception( esc_html__( 'Unable to access Google Sheet. Please check required permissions.', 'stock-sync-with-google-sheet-for-woocommerce' ) );
			}
		}
		
		/**
		 * Update values in Google Sheet column C2:C with dropdown format.
		 *
		 * @param array  $dropdown_values Array of values to populate as dropdown options.
		 * @param string $last_row     The last number of the row.
		 * @return bool True if the update was successful, false otherwise.
		 */
		public function update_google_sheet_dropdowns( $sheet_id = false, $start_column = 2, $end_column = 3, $dropdownOptions = [] ) {
			$accessToken = $this->get_token();
			$spreadsheetId = $this->spreadsheet_id;
			$sheetId = $sheet_id;
			if ( ! $sheetId ) {
				$sheetId = $this->sheet_id;
			}
			$dropdownOptions = array_values($dropdownOptions);
			$dataValidationRule = [
				'setDataValidation' => [
					'range' => [
						'sheetId' => $sheetId,
						'startRowIndex' => 1,
						'startColumnIndex' => $start_column,
						'endColumnIndex' => $end_column,
					],
					'rule' => [
						'condition' => [
							'type' => 'ONE_OF_LIST',
							'values' => array_map(function ( $option ) {
								return [ 'userEnteredValue' => $option ];
							}, $dropdownOptions),
						],
						'showCustomUi' => true,
						'strict' => true,
					],
				],
			];

			// Prepare the batchUpdate request body
			$body = wp_json_encode([ 'requests' => [ $dataValidationRule ] ]);

			// Make the API call
			$response = wp_remote_post(
				"https://sheets.googleapis.com/v4/spreadsheets/$spreadsheetId:batchUpdate",
				[
					'headers' => [
						'Authorization' => 'Bearer ' . $accessToken,
						'Content-Type' => 'application/json',
					],
					'body' => $body,
				]
			);

			if ( is_wp_error($response) ) {
				return false;
			} else {
				return true;
			}
		}
		/**
		 * Reset sheet
		 *
		 * @param mixed $access_token Access Token.
		 */
		public function reset_all_sheet_information( $access_token ) {
			try {
				$spreadsheet_id = $this->spreadsheet_id;
				$api_url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}:batchUpdate";
				if ( empty($access_token) ) {
					$access_token = $this->get_token();
				}
				$headers = [
					'Authorization' => "Bearer {$access_token}",
					'Content-Type'  => 'application/json',
				];
				$body = [
					'requests' => [
						[
							'updateCells' => [
								'range' => [
									'sheetId' => $this->sheet_id,
								],
								'fields' => 'userEnteredValue,dataValidation',
							],
						],
					],
				];

				$response = wp_remote_post(
					$api_url,
					[
						'headers' => $headers,
						'body'    => wp_json_encode($body),
					]
				);

				$response_code = wp_remote_retrieve_response_code($response);
				if ( 200 === $response_code ) {
					return true;
				} else {
					return false;
				}
			} catch ( \Exception $e ) {
				return $e;
			}
		}
		/**
		 * Reset sheet but keep the first row intact.
		 *
		 * @param mixed $access_token Access Token.
		 * @return mixed
		 */
		public function reset_all_sheet_information_batch() {
			try {
				$spreadsheet_id = $this->spreadsheet_id;
				$sheet_id       = $this->sheet_id; // Assuming you have the sheet ID available.
				$api_url        = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}:batchUpdate";

			
				$access_token = $this->get_token();
				

				$headers = [
					'Authorization' => "Bearer {$access_token}",
					'Content-Type'  => 'application/json',
				];

				$body = [
					'requests' => [
						[
							'updateCells' => [
								'range' => [
									'sheetId'       => $sheet_id,
									'startRowIndex' => 1, // Start clearing from the second row (0-indexed).
									'endRowIndex'   => null, // Clear to the end of the sheet.
								],
								'fields' => 'userEnteredValue,dataValidation', // Clears only the cell content.
							],
						],
					],
				];

				$response = wp_remote_post(
					$api_url,
					[
						'headers' => $headers,
						'body'    => wp_json_encode( $body ),
					]
				);

				$response_code = wp_remote_retrieve_response_code( $response );

				if ( 200 === $response_code ) {
					return true; // Successfully cleared rows below the first one.
				} else {
					return false; // Failed to clear.
				}
			} catch ( \Exception $e ) {
				return $e; // Return the exception object for debugging.
			}
		}

		/**
		 * Creates a new sheet tab.
		 *
		 * @param string $sheet_name Sheet Name.
		 */
		public function create_sheet_tab( $sheet_name = null ) {
			if ( ! $sheet_name ) {
				$sheet_name = $this->sheet_tab;
			}
			try {
				$access_token = $this->get_token();
				$spreadsheet_id     = $this->spreadsheet_id;
				$api_url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}:batchUpdate";
				$headers = array(
					'Authorization' => "Bearer {$access_token}",
					'Content-Type' => 'application/json',
				);
				$request_body = wp_json_encode(
					array(
						'requests' => array(
							array(
								'addSheet' => array(
									'properties' => array(
										'title' => $sheet_name,
									),
								),
							),
						),
					)
				);
				$response = wp_remote_post(
					$api_url, array(
						'headers' => $headers,
						'body' => $request_body,
						'timeout' => 300,

					)
				);
				$response_body = wp_remote_retrieve_body($response);
				$response_data = json_decode($response_body, true);
				return $response_data;
			} catch ( \Exception $e ) {
				return [];
			}
		}
		/**
		 * Syncs sheet headers
		 *
		 * @return mixed
		 */
		public function sync_sheet_headers() {
			try {
				$column   = new Column();
				$keys     = $column->get_column_names();
				$response = $this->update_row_values('A1', [ $keys ]);
				return $response;
			} catch ( \Exception $e ) {
				return false;
			}
		}
		/**
		 * Resets sheet.
		 *
		 * @return mixed
		 */
		public function reset_sheet() {
			try {
				$spreadsheet_id = $this->spreadsheet_id;
				$sheet_name     = $this->sheet_tab;
				$api_url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}/values/{$sheet_name}:clear";
				if ( empty($access_token) ) {
					$access_token = $this->get_token();
				}
				$headers = array(
					'Authorization' => "Bearer {$access_token}",
				);
				$response = wp_remote_post(
					$api_url, array(
						'headers' => $headers,
					)
				);
				$response_code = wp_remote_retrieve_body($response);
				if ( 204 === $response_code ) {
					   return true;
				} else {
					return false;
				}
			} catch ( \Exception $e ) {
				return $e;
			}
		}
		/**
		 * Freeze or unfreeze headers in Google Sheets using wp_remote_post.
		 *
		 * @param bool $freeze Whether to freeze headers (true) or unfreeze (false).
		 * @return bool True if successful, false on failure.
		 */
		public function freeze_headers( $freeze = true ) {
			try {
				$frozen_row_count = $freeze ? 1 : 0;
				$frozen_column_count = $freeze ? 1 : 0;
				// Build the batch update request to freeze/unfreeze headers.
				$batch_update_request = array(
					'requests' => array(
						array(
							'updateSheetProperties' => array(
								'properties' => array(
									'sheetId' => $this->sheet_id,
									'gridProperties' => array(
										'frozenRowCount' => $frozen_row_count,
										'frozenColumnCount' => $frozen_column_count,
									),
								),
								'fields' => 'gridProperties.frozenRowCount,gridProperties.frozenColumnCount',
							),
						),
					),
				);

				// Build the URL.
				$url = 'https://sheets.googleapis.com/v4/spreadsheets/' . $this->spreadsheet_id . ':batchUpdate';

				// Prepare the request arguments.
				$args = array(
					'method' => 'POST',
					'headers' => array(
						'Authorization' => 'Bearer ' . $this->get_token(),
						'Content-Type' => 'application/json',
					),
					'body' => wp_json_encode($batch_update_request),
					'timeout' => 300,
				);

				// Send the POST request.
				$response = wp_remote_post($url, $args);

				if ( is_wp_error($response) ) {
					return false;
				}

				$response_code = wp_remote_retrieve_response_code($response);

				if ( 200 === $response_code ) {
					return true;
				} else {
					return false;
				}
			} catch ( \Exception $e ) {
				return false;
			}
		}
		/**
		 * Get sheet all tab
		 *
		 * @return array
		 */
		public function get_sheet_tab() {
			$access_token = $this->get_token();
			$spreadsheet_id = $this->spreadsheet_id;
			$api_url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}?access_token={$access_token}";
			$headers = array(
				'Authorization' => "Bearer {$access_token}",
			);
			$response = wp_remote_get($api_url, array( 'headers' => $headers ));

			if ( is_wp_error($response) ) {
				return [];
			} else {
				$response_body = wp_remote_retrieve_body($response);
				$data = json_decode($response_body, true);

				if ( isset($data['sheets']) ) {
					return $data['sheets'];
				}
				return [];
			}
		}
	}
}
