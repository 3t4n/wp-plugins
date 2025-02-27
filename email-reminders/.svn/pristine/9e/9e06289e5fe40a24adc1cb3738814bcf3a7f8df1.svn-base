<?php
/**
 * @version 1.0
 * @package CSV
 * @subpackage CSV to  DB
 * @category Functions
 *
 * @author wpdevelop
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2019-09-13
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

/**
 * Save to DataBase data from  CSV
 *
 * @param arr $csv_data_arr -- array  from  CSV
 *
 * @return int              -- number of fields that  was saved into the database.
 */
function oper_csv_arr__save_in_db( $csv_data_arr ){

	if ( ( ! empty( $csv_data_arr ) ) && ( is_array( $csv_data_arr ) ) && ( count( $csv_data_arr ) > 0 ) ) {

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Get SQL fields values for INSERT
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$sql_values = array();
		$sql_args   = array();
		$sql_values_num = 0;
		$sql_rows_2_insert = 100;


		// Start from index 1,  because 0 - its header fields keys
		for( $i = 1; $i < count( $csv_data_arr ); $i++ ) {

			$csv_row = $csv_data_arr[ $i ];

			$data_source = 'csv';
			if ( isset( $_GET['from_source'] ) ) {
				$data_source = wp_kses_post( trim( stripslashes( $_GET['from_source'] ) ) );
			}

			$sql_values[] = '( %s , %s, %s )';                                                                          //FixIn: 0.1.3.1
			$sql_args[]   = oper_convert_arr_to_db_datavalue( $csv_row );           // Convert to  - id^7~booking_type^Apartment#3~status^Approved~dates^2019-10-08 00:00:00....
			$sql_args[]   = $data_source;                                           // 'csv';
			$sql_args[]   = date_i18n( 'Y-m-d H:i:s' );                                                                 //FixIn: 0.1.3.1

			// Check if we need to run SQL request  for N records
			if ( 0 === $i % $sql_rows_2_insert  ) {

				$sql_values_num += oper_csv_sql_contacts_insert_rows(  $sql_values,  $sql_args );     // Run SQL
				$sql_values = array();
				$sql_args   = array();
			}
		}

		// Rest of values
		if ( ! empty( $sql_values ) ) {
				$sql_values_num += oper_csv_sql_contacts_insert_rows(  $sql_values, $sql_args );     // Run SQL
				$sql_values = array();
				$sql_args   = array();
		}

		return $sql_values_num;

	} else {
		return  0;
	}

}


/**
 * Insert into "Contacts" DB several rows
 *
 * @param $sql_values	- array of prepared values		'( %s, %s, %s, %f, %s, %s, %s )', array( %s, %s,...
 * @param $sql_args     - array of values
 * @param $sql_fields   - string                        default: 'data, source, create_date'
 * @param bool   $is_silent  [false]
 *
 * @return bool|int		false - Error | number_of_rows
 */
function oper_csv_sql_contacts_insert_rows(  $sql_values, $sql_args , $sql_fields = 'data, source, create_date' , $is_silent = false ) {

	//FixIn: 2.0.4.1
	$oper_start_add_booking = get_oper_option( 'oper_start_add_booking', '9.8' );
	if ( '9.8' == $oper_start_add_booking ) {
		$is_silent = true;
	}

	global $wpdb;

	$sql_values_num = count( $sql_values );
	$sql_values     = implode( ', ', $sql_values );

	////////////////////////////////////////////////////////////////////////////
	// Add to DB
	////////////////////////////////////////////////////////////////////////////
	$sql = "INSERT INTO {$wpdb->prefix}o_er_contacts ( {$sql_fields} )VALUES {$sql_values} " ;

	$sql_prepared = $wpdb->prepare($sql, $sql_args );

	if ( false === $wpdb->query( $sql_prepared ) ){
		debuge_error( 'Error. DB inserting ' . $sql ,__FILE__,__LINE__);
		return false;
	}
	// $contact_id = (int) $wpdb->insert_id;                                       							// Get ID of last insert
	if ( ! $is_silent ) {
		oper_show_message( sprintf( __( 'Added to DataBase %d records.', 'email-reminders' ), $sql_values_num ), 6 );   // Show Save message
	}

	return $sql_values_num;
}


/**
 * Update "Contacts" row in DB
 *
 * @param $contact_id
 * @param $contact_data_arr     - associated array of values
 *
 * @return bool|int		false - Error | number_of_rows
 */
function oper_sql_contacts_update(  $contact_id, $contact_data_arr ) {

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Get Note
	$is_note_exist = false;
	if ( isset( $contact_data_arr['note'] ) ) {
		$is_note_exist = true;
		$contact_note = trim( $contact_data_arr['note'] );
		unset( $contact_data_arr['note'] );
		$contact_note = ( 'null' == $contact_note ) ? '' : $contact_note;
	}

	// Get Source
	$is_source_exist = false;
	if ( isset( $contact_data_arr['source'] ) ) {
		$is_source_exist = true;
		$contact_source = trim( $contact_data_arr['source'] );
		unset( $contact_data_arr['source'] );
	}

	// Convert to  - id^7~booking_type^Apartment#3~status^Approved~dates^2019-10-08 00:00:00....
	$contact_data_row = oper_convert_arr_to_db_datavalue( $contact_data_arr );

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	global $wpdb;
	////////////////////////////////////////////////////////////////////////////
	// Update to DB
	////////////////////////////////////////////////////////////////////////////

	$data_s_fields = 'data = %s';
	$data_s_values = array( $contact_data_row );

		if ( $is_source_exist ){
			$data_s_fields .= ', source = %s';
			$contact_source  = htmlspecialchars_decode( $contact_source, ENT_QUOTES );          // Escape any HTML symbols,  like &quot; and &#039; to " and '      The converted entities are: &amp;, &quot; (when ENT_NOQUOTES is not set), &#039; (when ENT_QUOTES is set), &lt; and &gt;.
			$data_s_values[] = $contact_source;
		}
		if ( $is_note_exist ){
			$data_s_fields .= ', note = %s';
			$contact_note    = htmlspecialchars_decode( $contact_note, ENT_QUOTES );            // Escape any HTML symbols,  like &quot; and &#039; to " and '      The converted entities are: &amp;, &quot; (when ENT_NOQUOTES is not set), &#039; (when ENT_QUOTES is set), &lt; and &gt;.
			$data_s_values[] = $contact_note;
		}

	$data_s_values[] = $contact_id;

													//$data_s_fields = 'data = %s, source = %s, note = %s'
	$sql = "UPDATE {$wpdb->prefix}o_er_contacts SET " . $data_s_fields . " WHERE contact_id = %d";

	                                    //$data_s_values = array( $contact_data_row, $contact_source, $contact_note, $contact_id )
	$sql_prepared = $wpdb->prepare( $sql, $data_s_values );

	if ( false === $wpdb->query( $sql_prepared ) ){
		return false;
	}

	return true;
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// SUPPORT
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Convert associated array of data to  string for saving into DB data field
 * e.g.  array( 'id'=> 7, ...)  TO  id^7~booking_type^Apartment#3~status^Approved~dates^2019-10-08 00:00:00....
 *
 * @param        $contact_data_arr
 * @param string $f_separator
 * @param string $r_separator
 *
 * @return string
 */
function oper_convert_arr_to_db_datavalue( $contact_data_arr, $f_separator = '^', $r_separator = '~' ){


	$contact_data = array();

	foreach ( $contact_data_arr as $field_name => $field_value ) {

		// Replace fields seperators,  if they exist  in names or values
		$field_name  = str_replace( array( $f_separator, $r_separator ), '#', $field_name );
		$field_value = str_replace( array( $f_separator, $r_separator ), '#', $field_value );

		// Escape any HTML symbols,  like &quot; and &#039; to " and '
		//      The converted entities are: &amp;, &quot; (when ENT_NOQUOTES is not set), &#039; (when ENT_QUOTES is set), &lt; and &gt;.
		$field_name  = htmlspecialchars_decode( $field_name, ENT_QUOTES );
		$field_value = htmlspecialchars_decode( $field_value, ENT_QUOTES );

		$contact_data[] = $field_name . $f_separator . $field_value;
	}
	$contact_data = implode( $r_separator, $contact_data );                                                             // id^7~booking_type^Apartment#3~status^Approved~dates^2019-10-08 00:00:00....

	return $contact_data;
}
