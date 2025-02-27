<?php
/**
 * @version 1.0
 * @package CSV
 * @subpackage CSV HTML Table
 * @category Functions
 *
 * @author wpdevelop
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2019-06-10
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/**
 *  Show TABLE for list Array
 *
 * @param $data_arr	- array( [0] => array(  'field_name' => 'Some value, 'field_other_name' => 'Some Other value, ... ),
							 [0] => Array																			- HEADER BY DEFAULT - FIRST ROW,  but can  be skipped
								(
									[order_type] => order_type
									[p_title] => p_title
									[total] => total
									[date] => date
									[payment_type] => payment_type
									[c_country] => c_country
									[c_adress] => c_adress
									[order_key] => order_key
									[c_email] => c_email
									[c_name] => c_name
									[licence_to] => licence_to
									[licence_key] => licence_key
									[p_description] => p_description
								)
							 [1] => Array																			- CSV Data ...
								(
									[order_type] => A
									[p_title] => Product Name
									[total] => $149,00
									[date] => 16.03.2018
									[payment_type] => creditcard
									[c_country] => Denmark,
									[c_adress] => Some adress
									[order_key] => ORDER-KEY
									[c_email] => email@gmail.com
									[c_name] => Jo Smith
									[licence_to] => JohnS
									[licence_key] => 7dgfgfdg06
									[p_description] => Product Description
								), ....
 *                  		)
 */
function oper_show_table_for_list_arr( $data_arr ){

	if ( empty( $data_arr ) ) {
		return;
	}

	oper_open_meta_box_section(  'oper_parced_csv', __('Parsed CSV content', 'email-reminders') );

		?><span class="wpdevelop">
			<div class="table-responsive">
				<table id="oper_list_table" cellpading="0" cellspacing="0" class="table table-striped table-bordered table-condensed"><tbody><?php

				foreach ( $data_arr as $key => $value ) {

					// For the first  row we are getting all Fields Keys, and show Table Header and set selectboxes for assigning Fields into the DB
					if ( $key == 0 ) {
						echo '<tr class="oper_row_num_0">';
						echo '<th>#</th>';
						$col = 0;
						foreach ( $value as $field_key => $field_value) {
						  $col++;
						  echo '<th class="oper_col_num_' . $col . '" >';

							?><div class="oper_flex_assign"><?php
								echo oper_get_assigning_header_textfield(
																	  array( 'name' => 'oper_fields_keys[]', 'class' => 'oper_fields_keys_select' )
																	, array(
																		  'col_num' => $col
																		, 'possible_key' => $field_key
																		//, 'assigned_selectbox' => $assigned_selectbox
																	  )
																);
							?></div><?php

						  echo '</th>';
						}
						echo '</tr>';

					} else {

						echo '<tr class="oper_row_num_' . ( $key + 1 ) . '" >';
						?>
						<td><?php
							?><div style="display:flex"><?php

							echo '<div style="padding: 4px 8px 0 4px;">' , ( $key  ) , '</div>';

							?><a href="javascript:void(0)"
										onclick="javascript: jQuery( '.oper_row_num_<?php echo ($key + 1); ?>' ).remove() ;"
										class="tooltip_top button-secondary button delete_oper_link"
										title="<?php _e('Delete Row' , 'email-reminders'); ?>"
									><i class="glyphicon glyphicon-remove"></i></a><?php

							?></div><?php
						?></td><?php

						$col = 0;
						foreach ( $value as $field_key => $field_value) {
							$col++;
							echo '<td class="csv_data oper_col_num_' . $col . '">', $field_value, '</td>';
						}
						echo '</tr>';
					}
				}

			?></tbody></table>
			</div>
		</span><?php

	oper_close_meta_box_section();
}


/**
 *  Get text field for header - for entering name of field
 *
 * @param $attr   = array
 * @param $params = array ( 'col_num' => $col
							, 'possible_key' => $field_key
							, 'assigned_selectbox' => $assigned_selectbox
						   )
 *
 * @return false|string
 */
function oper_get_assigning_header_textfield( $attr, $params ){

	ob_start();

	$select_attr = '';
	foreach ( $attr as $attr_name => $attr_value ) {
		$attr_value = str_replace( '"', "'", $attr_value );
		$select_attr .= ' ' . $attr_name . '="' . $attr_value . '"';
	}

	?><input type="text" <?php echo $select_attr; ?> value="<?php echo $params['possible_key']; ?>" /><?php

	// Delete
   ?><a href="javascript:void(0)"
		onclick="javascript: jQuery( '.oper_col_num_<?php echo $params['col_num']; ?>' ).remove() ;"
		class="tooltip_top button-secondary0 button0 delete_oper_link"
		title="<?php _e('Delete Column' , 'email-reminders'); ?>"
	><i class="glyphicon glyphicon-remove"></i></a><?php

	return ob_get_clean();
}


/**
 * Download CSV file content
 *
 * @param string $file_url
 *
 * @return bool|string|WP_Error
 */
function oper_download_content_of_csv_file( $file_url ) {

	$file_content = oper_get_ssl_page_content( $file_url );

	if ( false === $file_content )
		return new WP_Error( 'oper_ics_url_error', '<strong>[Re. Error]</strong> ' . __( 'Could not download URL' ) . ' ' . $file_url , 'wrong_url' );
//debuge(get_option( 'blog_charset' ), $file_content);
	// Sometimes during saving to  Databse, with  incorrect  text  in file,  possible issue of not saving this data,  so  need to  convert CSV doata to website charset
	if ( function_exists( 'mb_convert_encoding' ) ) {
		$file_content = mb_convert_encoding( $file_content, get_option( 'blog_charset' ) );
	}
//debuge($file_content);
	return $file_content;
}