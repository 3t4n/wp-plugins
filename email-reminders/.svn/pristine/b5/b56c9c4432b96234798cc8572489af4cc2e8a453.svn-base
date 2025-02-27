/**
 * @version 1.0
 * @package Clients Manager
 * @subpackage CSV operations
 * @category Scripts
 *
 * @author wpdevelop
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2018-11-10
 */


	/**
	 * Parse HTML table and return aggregated CSV
	 *
	 * Get all  data from  TABLE  and insert this data into the Array,
	 * Parse and aggregate Array - (Columns with  the same name become one column !!! )
	 * Skip not assigned columns
	 *
	 * Convert array to  CSV
	 *
	 * @param table_id 		 - string HTML ID of table at the page
	 * @returns {string | *} - CSV
	 */
	function oper_convert_table_to_csv( table_id ){

		var o_table = jQuery( table_id );

		var o_csv = '';
		var o_csv_separator = ';';
		var o_csv_lines_separator = "\n";

		if ( o_table.length != 0 ){

/**
			// Header with assignment columns names
			jQuery( '.oper_fields_keys_select' ).each(function( ind,  elm ) {

				o_csv += jQuery( elm ).val() + o_csv_separator;
			});
			if (o_csv.length > 0 ){
				o_csv = o_csv.substr( 0, (o_csv.length - o_csv_separator.length) );
				o_csv += o_csv_lines_separator;
			}

			// Data
			var o_rows = o_table.find( '> tbody > tr' );

			o_rows.each(function( row_ind,  some_row ) {

				var single_row = jQuery( some_row ).find( '> td.csv_data' );
				single_row.each(function( col_ind,  o_cols ) {

					o_csv += jQuery( o_cols ).text() + o_csv_separator;
				});

				if (o_csv.length > 0 ){
					o_csv = o_csv.substr( 0, (o_csv.length - o_csv_separator.length) );

					if ( row_ind < ( o_rows.length - 1 ) ){
						o_csv += o_csv_lines_separator;
					}
				}
			});
*/

			var o_csv_arr_header = [];
			var o_csv_arr_data = [];
			var o_csv_arr_row = [];
			// Header with assignment columns names
			jQuery( '.oper_fields_keys_select' ).each(function( ind,  elm ) {

				o_csv_arr_header.push( jQuery( elm ).val() );
			});

			// Data
			var o_rows = o_table.find( '> tbody > tr' );

			o_rows.each(function( row_ind,  some_row ) {

				var single_row = jQuery( some_row ).find( '> td.csv_data' );
				o_csv_arr_row = [];
				var field_val = '';
				single_row.each(function( col_ind,  o_cols ) {

					field_val = oper_trim_quotes(  jQuery( o_cols ).text() );
					o_csv_arr_row.push( field_val );
				});

				o_csv_arr_data.push( o_csv_arr_row )

			});
		}
		jQuery( '#oper_list2csv_textdata' ).val( o_csv );

		/**
		 *  MAP of aggregate columns
		 *
		 * o_csv_arr_header:
		 * [ 	0: "order_key"
				1: "p_title"
				2: "order_labels"
				3: "details"
				4: "details"
				5: "total"
				6: "payment_status"
				7: ""
				8: ""
				9: ""
				10: ""
				11: ""
			12: "c_name"
			13: "c_email"
			14: "c_phone"
			15: ""
			16: "tax"
			17: ""
				18: "order_labels"
			19: "note"
		  ]
		 *
		 * * Remove not assigned fields, e.g. ""
		 * * and find duplicates like [ 2: "order_labels", ... 18: "order_labels" ]
		 * * set  it like             [ 2: [ 18 ] ]
		 *
		 * aggregate_table:
		 *
		  [ 0: []
			1: []
			2: [ 18 ]
			3: [ 4 ]
			4: []
			5: []
			6: []
			12: []
			13: []
			14: []
			16: []
		    18: []
			19: []
		  ]

		 columns_to_skip =			// [ 18, 4, 7, 8, 9, 10, 11, 15, 17 ]
		 */

		var aggregate_table = [];
		var columns_to_skip = [];

	for ( var i = 0; i < ( o_csv_arr_header.length - 1); i++ ){

		// Check if  o_csv_arr_header[ i ] exist and not empry
		if ( 	( undefined != o_csv_arr_header[ i ] )
			 && ( '' != o_csv_arr_header[ i ] )
		   ){

			var checking_value = o_csv_arr_header[ i ];

			aggregate_table[ i ] = [];

			for ( var j = (i + 1); j < (o_csv_arr_header.length); j++ ){

				if ( checking_value === o_csv_arr_header[ j ] ){
					aggregate_table[ i ].push( j );

					columns_to_skip.push( j );
				}
			}
		} else {
			columns_to_skip.push( i );
		}
	}

	return oper_arr_to_csv( o_csv_arr_header, aggregate_table, columns_to_skip, o_csv_arr_data );
	/*
// console.log( o_csv_arr_data );
// console.log( 'Headers', o_csv_arr_header );		    // [ "order_key", "p_title", "order_labels", "details", "details", "total", "payment_status", "", "", "", "", "", "c_name", "c_email", "c_phone", "", "tax", "", "order_labels", "note"]
// console.log( 'Aggregate Arr:', aggregate_table );	// [ [], [], [ 18 ], [ 4 ], [], [], [], null, null, null, null, null, [], [], [], null, [], null, [] ]
// console.log( 'Skip ', columns_to_skip );			// [ 18, 4, 7, 8, 9, 10, 11, 15, 17 ]
	*/
	}


		/**
		 * Trim "quotes" and whte spaces at  the begining and end of string
		 * @param field_val - string
		 * @returns string
		 */
		function oper_trim_quotes( field_val ) {

			// Trim quotes from the string
			if ( field_val.charAt( 0 ) === '"' && field_val.charAt( field_val.length - 1 ) === '"' ){
				field_val = field_val.substr( 1, field_val.length - 2 );
			}

			// Trim  whitespace
			field_val = field_val.replace(/^\s+|\s+$/gm,'');

			return field_val;
		}



	/**
	 * Aggregate arrays with  same fields details and convert it to CSV file
	 *
	 * @param o_csv_arr_header
	 * @param aggregate_table
	 * @param columns_to_skip
	 * @param o_csv_arr_data
	 *
	 * return string - CSV file
	 *
	 * ============================
	 *  MAP of aggregate columns
		 *
		 * o_csv_arr_header:
		 * [ 	0: "order_key"
				1: "p_title"
				2: "order_labels"
				3: "details"
				4: "details"
				5: "total"
				6: "payment_status"
				7: ""
				8: ""
				9: ""
				10: ""
				11: ""
			12: "c_name"
			13: "c_email"
			14: "c_phone"
			15: ""
			16: "tax"
			17: ""
				18: "order_labels"
			19: "note"
		  ]
		 *
		 * * Remove not assigned fields, e.g. ""
		 * * and find duplicates like [ 2: "order_labels", ... 18: "order_labels" ]
		 * * set  it like             [ 2: [ 18 ] ]
		 *
		 * aggregate_table:
		 *
		  [ 0: []
			1: []
			2: [ 18 ]
			3: [ 4 ]
			4: []
			5: []
			6: []
			12: []
			13: []
			14: []
			16: []
		    18: []
			19: []
		  ]

		 columns_to_skip =			// [ 18, 4, 7, 8, 9, 10, 11, 15, 17 ]
	 *
	 */
	function oper_arr_to_csv( o_csv_arr_header, aggregate_table, columns_to_skip, o_csv_arr_data ){

		var o_csv = '';
		var o_csv_separator = ';';
		var o_csv_lines_separator = "\n";

		var o_csv_aggregate_fields_separator = ' | ';

		////////////////////////////////////////////////////////
		// Header
		////////////////////////////////////////////////////////

		for ( var i = 0; i < o_csv_arr_header.length ; i++ ){

			if ( columns_to_skip.indexOf( i ) < 0 ) {

				o_csv += o_csv_arr_header[ i ] + o_csv_separator;
			}
		}

		if ( o_csv.length > 0 ){
			o_csv = o_csv.substr( 0, ( o_csv.length - o_csv_separator.length) );
			o_csv += o_csv_lines_separator;
		}

		////////////////////////////////////////////////////////
		// Data
		////////////////////////////////////////////////////////
		for ( var j = 0; j < o_csv_arr_data.length ; j++ ){

			// Rows
			var o_row = o_csv_arr_data[ j ];

			for ( var i = 0; i < o_row.length; i++ ){

				// Columns
				if ( columns_to_skip.indexOf( i ) < 0 ){

					o_csv += o_row[ i ];

					// Aggregated Fields
					if ( undefined != aggregate_table[ i ] ){

						for ( var a = 0; a < aggregate_table[ i ].length; a++ ){
							var agg_inx = aggregate_table[ i ][ a ];

							o_csv += o_csv_aggregate_fields_separator + o_row[ agg_inx ];
						}
					}
					o_csv += o_csv_separator;
				}
			}

			// Continue rows
			if ( o_csv.length > 0 ){
				o_csv = o_csv.substr( 0, ( o_csv.length - o_csv_separator.length) );
				o_csv += o_csv_lines_separator;
			}
		}

		// Remove last Enter (new line symbol)
		if (o_csv.length > 0 ){
			o_csv = o_csv.substr( 0, (o_csv.length - o_csv_lines_separator.length) );
		}
		return o_csv;
	}