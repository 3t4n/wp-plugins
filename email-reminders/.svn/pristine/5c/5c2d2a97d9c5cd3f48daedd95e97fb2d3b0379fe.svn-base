<?php
/**
 * @version 1.0
 * @package CSV Parser
 * @subpackage Parse CSV
 * @category Functions
 *
 * @author wpdevelop
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2019-06-10
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


// CSV Class
class OPER_CSV_Parser {

/*	static private $instance = null;                                            // Define only one instance of this class
*/
	private $csv_settings = array(
										'is_silent'     => true
									,	'row_delimiter' => "\n"
									,	'separator'     => ';'
							);

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->set_csv_settings();
	}

	/**
	 * Get current separator of columns in CSV
	 * @return string
	 */
	public function get_column_separator(){
	    return $this->csv_settings['separator'];
	}


	/**
	 * Get current separator of rows in CSV
	 * @return string
	 */
	public function get_row_separator(){
	    return $this->csv_settings['row_delimiter'];
	}


	/**
	 * Define CSV parameters for working with
	 *
	 * @param array $params = array( 	  'is_silent' => false
										, 'row_delimiter' => "\n"
										, 'separator' => ';'
									)
	 */
	public function set_csv_settings( $params = array() ){

		$this->csv_settings = wp_parse_args( $params, $this->csv_settings );
	}


	/**
	 * Parse CSV to Array   -   get 1st row in CSV as keys for array, include into array all rows, (1st row also from  where was getting keys).
	 *
	 * Trick: if in first row,  some field is this shortcode [delete], then delete from new generated CSV and array entire column.
	 *
	 * @param string $csv
	 *
	 * @return array =  array( 'arr' => $data_arr, 'csv' => $new_csv_file );
	                           * 'arr' => Array(
	 								 * [0] => Array																			- HEADER BY DEFAULT - FIRST ROW,  but can  be skipped
										* ( 	[order_type] => order_type
											* [p_title] => p_title
											* [total] => total
											* [date] => date
											* [payment_type] => payment_type
											* [c_country] => c_country
											* [c_adress] => c_adress
											* [order_key] => order_key
											* [c_email] => c_email
											* [c_name] => c_name
											* [licence_to] => licence_to
											* [licence_key] => licence_key
											* [p_description] => p_description
										* )
									 * [1] => Array																			- CSV Data ...
										* (   [order_type] => A
											* [p_title] => Product Name
											* [total] => $149,00
											* [date] => 16.03.2018
											* [payment_type] => creditcard
											* [c_country] => Denmark,
											* [c_adress] => Some address
											* [order_key] => ORDER-KEY
											* [c_email] => email@gmail.com
											* [c_name] => Jo Smith
											* [licence_to] => JohnS
											* [licence_key] => 7dgfgfdg06
											* [p_description] => Product Description
										* ), ....
	                 		    * [csv] => order_type;p_title;total;date;payment_type;c_country;c_adress;order_key;c_email;c_name;licence_to;licence_key;p_description
							  		     * A;Product Name;$149,00;16.03.2018;creditcard;Denmark,;Some address;ORDER-KEY;email@gmail.com;Jo Smith;JohnS;7dgfgfdg06;Product Description
	                                     * ....
	 */
	function get_arr_from_csv( $csv ){


		$rows_delimiter  = $this->csv_settings['row_delimiter'];                 // Set Row delimiter
		$colls_delimiter = $this->csv_settings['separator'];                     // Separator delimeter from Submited form
		$csv_validated   = $csv;                                                 // Validated CSV from textarea

		$data_arr = array();
		$new_csv_file = '';

		if ( ! empty( $csv_validated ) ) {

			// Get array of CSV rows
			$csv_array = explode( $rows_delimiter, $csv_validated );

			$table_keys   = array();

			$keys_of_column_to_delete = array();

			foreach ( $csv_array as $row_key => $row_value ) {

				$row_value = str_replace( array( "\n", "\r" ), '', $row_value );

				//////////////////////////////////////////////////////////////////
				// Get csv KEYs from  - 1st row
				/////////////////////////////////////////////////////////////////
				if ( $row_key == 0 ) {

					// Check Keys
					$table_keys = explode( $colls_delimiter, $row_value );

					foreach ( $table_keys as $key => $value ) {

						$value = strtolower( trim( $value ) );

						$value = trim( $value , "\"");				// Trim "

						$value = str_replace( array(' ', '-'), '_', $value);
						$value = oper_get_slug_format( $value );

						// Check  if we need to  delete from  CSV some column. Header,  must be declared as [delete]	// Trick.
						if ( $value == '[delete]' ) {
							$keys_of_column_to_delete[] = $key;
							continue;
						}

						if ( empty( $value ) ) {
							$table_keys[ $key ] = 'field' . $key;
						} else {
							$table_keys[ $key ] = $value;
						}
					}

					// Delete from row some columns,  if we require this
					foreach ( $keys_of_column_to_delete as $field_key_to_delete ) {
						unset( $table_keys[ $field_key_to_delete ] );
					}
					//Reindex array
					$table_keys = array_values( $table_keys );

					$table_keys   = array_map( 'trim', $table_keys );            // Trim  each element in array
					$new_csv_file .= implode( $colls_delimiter, $table_keys ) . $rows_delimiter;
					$table_keys   = array_map( 'strtolower', $table_keys );      // Make lowercase each element in array

				}

				//else

				{
					if ( ! empty( $row_value ) ) {

						// Fill values
						$table_collumns = explode( $colls_delimiter, htmlspecialchars_decode( $row_value ) );

						// Trim  from  white spaces and "               //FixIn: 2.0.2.3
						foreach ( $table_collumns as $tbl_k => $table_col ) {
							if ( isset( $table_collumns[ $tbl_k ] ) ) {
								$table_collumns[ $tbl_k ] = trim( $table_collumns[ $tbl_k ], "\"" );
							}
						}

						// Delete from row some columns,  if we require this
						foreach ( $keys_of_column_to_delete as $field_key_to_delete ) {
							unset( $table_collumns[ $field_key_to_delete ] );
						}

						//Reindex array
						$table_collumns = array_values( $table_collumns );

						if ( count( $table_keys ) != count( $table_collumns ) ) {

							if ( ! $this->csv_settings[ 'is_silent' ] ) {
								oper_show_fixed_message( sprintf( __( '%sWarning! Row #%d skipped.%s Row contain %d fields, that different than number of columns %d. %sDetails: %s', 'email-reminders' )
										, '<strong>', $row_key, '</strong><br/>'
										, count( $table_collumns ), count( $table_keys ), '<br>', implode( $colls_delimiter, $table_collumns ) )
									, 100, 'notice notice-warning' );            // Show Save message
							}
							continue;
						}
						$data_arr[] = array_combine( $table_keys, $table_collumns );
						$new_csv_file   .= implode( $colls_delimiter, $table_collumns ) . $rows_delimiter;
					}
				}
			}
//debuge($new_csv_file);
			if ( ! $this->csv_settings['is_silent'] ) {
				oper_show_message( __( 'CSV parsed successfuly', 'email-reminders' ), 3 );
			}

		} else {
			if ( ! $this->csv_settings['is_silent'] ) {
				oper_show_message( __( 'CSV is empty', 'email-reminders' ), 5 );
			}
		}

		return array( 'arr' => $data_arr, 'csv' => $new_csv_file );
	}

}