<?php /**
 * @version 1.0
 * @description Rules
 * @category  Rules Shortcodes
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


if (0){
	// <editor-fold     defaultstate="collapsed"                        desc=" == JS | CSS == "  >

	function oper_reminders_register_scripts(){
		wp_register_script( 'oper-reminders-shortcodes', 		plugins_url( 'reminders_shortcodes.js',  __FILE__ ), array(), 0.1, true );
		wp_register_style(  'oper-reminders-shortcodes-client', plugins_url( 'reminders_shortcodes.css', __FILE__ ), array(), 0.1, 'all' );
	}

	function oper_reminders_enqueue_scripts(){

		wp_enqueue_script(  'oper-reminders-shortcodes' );
		wp_localize_script( 'oper-reminders-shortcodes', 'oper_ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );		// Add ajax URL  to  the front-end side

		wp_enqueue_style(   'oper-reminders-shortcodes-client' );
	}
	add_action( 'wp_enqueue_scripts', 'oper_reminders_register_scripts' );
	add_action( 'wp_enqueue_scripts', 'oper_reminders_enqueue_scripts' );

	// </editor-fold>
}


/**
 * Shortcode - Send Reminder emails
 * Example 1: [email-reminders-send status='init' max_count=20 keyword='United States|Canada|Mexico']
 * Example 2: [email-reminders-send status='init' max_count=20 not_keyword='United States|Canada|Mexico']
 *
 * @param $attr         = array(
								  'is_silent' 	=> false        // Is show any  text  in page,  after  shortcode execution
								, 'status'      => 'init'       // 'init'   |   'sent'      <=  Status of Reminders
								, 'max_count'   => 50           // Max number of reminders to  send, during execution  of shortcode
								, 'start_num'   => 0            // Start from N reminders to  send - shift
								, 'keyword'     => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico'           <=  |   Work  as OR     - Find all  variants, like USA and Canada
								, 'not_keyword' => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico'           <=  |   Work  as AND    - Find variants,  that does not contain  USA and Canada
							)
 *
 * @return string
 */
function oper_shortcode_reminders( $attr ){

	$defaults = array(
		  'is_silent' 	=> false        // Is show any  text  in page,  after  shortcode execution
		, 'status'      => 'init'       // 'init'   |   'sent'      <=  Status of Reminders
		, 'max_count'   => 50           // Max number of reminders to  send, during execution  of shortcode
		, 'start_num'   => 0            // Start from N reminders to  send - shift
		, 'keyword'     => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico|Brazil'           <=  |   Work  as OR     - Find all  variants, like USA and Canada
		, 'not_keyword' => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico|Brazil'           <=  |   Work  as AND    - Find variants,  that does not contain  USA and Canada
	);
	$params   = wp_parse_args( $attr, $defaults );

	ob_start();

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Get   D a t a   Array
	$reminders_arr = oper_get_reminders_with_status__data_arr( $params );

//debuge('BEFORE',count($reminders_arr));
//
	$reminders_arr = apply_filters( 'opera_get_reminders_fit_to_send_time', $reminders_arr );

//debuge('AFTER',count($reminders_arr));
//debuge( $reminders_arr );
//$return_content = ob_get_contents();ob_end_clean();return $return_content;


	// Get Email field name                              ,  where to  send  Reminder
	$email_field_name = oper_get_reminder_email_field_name();

	// Send emails                                      == array( 'sent' => array(), 'not_sent' => array() )
	$sent_reminders_arr = oper_send_reminder_emails(   $reminders_arr                                                   // Reminders Data Array
												, array( 'email_field_name' => $email_field_name )                      // Name  of field from  Contacts Array
						                    );

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// E c h o
	if ( ! $params['is_silent'] ) {
		if ( ! empty( $sent_reminders_arr['sent'] ) ) {
			printf( __( 'Sent %d emails', 'email-reminders' ), count( $sent_reminders_arr['sent'] ) );
		}
		if ( ! empty( $sent_reminders_arr['not_sent'] ) > 0 ) {
			printf( __( 'Not sent %d emails', 'email-reminders' ), count( $sent_reminders_arr['not_sent'] ) );
		}
		if ( (  empty( $sent_reminders_arr['sent'] ) ) && (  empty( $sent_reminders_arr['not_sent'] ) ) ) {
			printf( __( 'Sent %d emails', 'email-reminders' ), 0 );
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$return_content = ob_get_contents();
	ob_end_clean();
	return $return_content;
}
add_shortcode( 'email-reminders-send', 'oper_shortcode_reminders' );



/**
 * Get Reminders with specific status,  like 'init' | 'sent' -- Data Array
 *
 * @param array $params             - array(
											  'status'      => 'init'       // 'init'   |   'sent'      <=  Status of Reminders
											, 'max_count'   => 50           // Max number of reminders to  send, during execution  of shortcode
											, 'start_num'   => 0            // Start from N reminders to  send - shift
											, 'keyword'     => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico'           <=  |   Work  as OR     - Find all  variants, like USA and Canada
											, 'not_keyword' => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico'           <=  |   Work  as AND    - Find variants,  that does not contain  USA and Canada
										)
 *
 * @return array                     -  Reminders Array with all data
					                    Array (
					                        [0] => Array
								                (
								                    [reminder_id] => 10
								                    [status] => init
								                    [run_date] => 2020-03-13 00:00:00
								                    [action] => none
								                    [email_template] =>
								                    [contact_id] => 12736
								                    [rules_id] => 47
								                    [create_date] => 2020-02-20 15:14:53
								                    [edit_date] => 2020-02-20 15:14:53
								                    [_store] => O
								                    [_purchase_product] => MultiUser
								                    [_paid] => $324,50
								                    [_subscription_date] =>
								                    [_subscription_cost] =>
								                    [_subscription_check] =>
								                    [_date] => 13.03.2019
								                    [_payment_type] => creditcard
								                    [_country_city] => Italy, Latina
								                    ....
								                    [_product_name] => MU (single)
								                    [note] =>
								                    [source] => csv
								                )

								            ), ...
 */
function oper_get_reminders_with_status__data_arr( $params ){


	$defaults = array(
		  'status'      => 'init'       // 'init'   |   'sent'      <=  Status of Reminders
		, 'max_count'   => 50           // Max number of reminders to  send, during execution  of shortcode
		, 'start_num'   => 0            // Start from N reminders to  send - shift
		, 'keyword'     => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico'           <=  |   Work  as OR     - Find all  variants, like USA and Canada
		, 'not_keyword' => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico'           <=  |   Work  as AND    - Find variants,  that does not contain  USA and Canada
	);
	$params   = wp_parse_args( $params, $defaults );


	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// 1. Direct Clean Params
	////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//  K e y w o r d   ===============================================================================
	/*
	 *  $params['keyword'] => ' United States|Canada '
	 *
	 *  $keyword_arr => Array ( [0] => 'United States',  [1] => 'Canada' )
	 */
	$keyword_arr     = oper_get_escaped_string_keyword__as_arr( $params['keyword'] , '|' );

	//  N o t     K e y w o r d   =====================================================================
	/*
	 *  $params['not_keyword'] => ' United States '
	 *
	 *  $not_keyword_arr => Array ( [0] => 'United States'  )
	 */
	$not_keyword_arr = oper_get_escaped_string_keyword__as_arr( $params['not_keyword'] , '|' );


	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// S Q L   ::    Get  Reminder and Contact  data for specific Reminders
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	global $wpdb;
	$db_names = oper_get_db_names();

	$sql =  "SELECT * FROM  {$wpdb->prefix}{$db_names['reminders']} as reminders "
         . " INNER JOIN {$wpdb->prefix}{$db_names['contacts']} as contacts "
         . " ON    contacts.contact_id = reminders.contact_id "
		 . " WHERE status = %s ";

	//  K e y w o r d   ===============================================================================
		$sql__like_keyword = array();
		foreach ( $keyword_arr as $sql_keyword ) {
			if ( ! empty( $sql_keyword ) ) {
				$sql__like_keyword[]= " ( contacts.data LIKE %s ) ";
			}
		}
		$sql__like_keyword = implode( ' OR ' , $sql__like_keyword );                                                    // OR   ->    Work  as OR     - Find all  variants, like USA and Canada
		if ( ! empty( $sql__like_keyword ) ) {
			$sql .= ' AND ( ' . $sql__like_keyword . ') ';
		}
	//=================================================================================================

	//  N o t     K e y w o r d   =====================================================================
		$sql__like_not_keyword = array();
		foreach ( $not_keyword_arr as $sql_not_keyword ) {
			if ( ! empty( $sql_not_keyword ) ) {
				$sql__like_not_keyword[]= " ( contacts.data NOT LIKE %s ) ";
			}
		}
		$sql__like_not_keyword = implode( ' AND ' , $sql__like_not_keyword );                                           // AND   ->   Work  as AND    - Find variants,  that does not contain  USA and Canada
		if ( ! empty( $sql__like_not_keyword ) ) {
			$sql .= ' AND ( ' . $sql__like_not_keyword . ') ';
		}
	//=================================================================================================

	$sql .= " ORDER BY reminder_id DESC ";      // DESC: from  9 to 1
    $sql .= " LIMIT %d, %d ";

    // Argument Values
    $sql_args = array();
    $sql_args[] = oper_esc_like( trim( stripslashes( $params['status']) ) );           // oper_clean_like_string_for_db( $params['status'] );  //  Commented because here was used  $wpdb->prepare(...

	//  K e y w o r d   ===============================================================================
	foreach ( $keyword_arr as $sql_keyword ) {
		if ( ! empty( $sql_keyword ) ) {
			$sql_args[] = '%' . $wpdb->esc_like( $sql_keyword ) . '%';
		}
	}
	//=================================================================================================

	//  N o t     K e y w o r d   =====================================================================
	foreach ( $not_keyword_arr as $sql_not_keyword ) {
		if ( ! empty( $sql_not_keyword ) ) {
			$sql_args[] = '%' . $wpdb->esc_like( $sql_not_keyword ) . '%';
		}
	}
	//=================================================================================================


    $sql_args[] = $params['start_num'];
	$sql_args[] = $params['max_count'];

	$sql_prepared = $wpdb->prepare( $sql, $sql_args );

	$sending_reminders_arr = $wpdb->get_results( $sql_prepared );

	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Parse Contacts and reminder data into the Array
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $reminders_listing = new OPER_Reminders;
    $reminders_arr = $reminders_listing->list__get_arr_from_sql_results( $sending_reminders_arr );

    return $reminders_arr;
}



/**
 *  Get Escaped array of keyword strings  -- Input string can be defined with  separators for having several values
 *
 * @param        $param_keyword     ' United States|United Kingdom  '
 * @param string $separator         default = '|'       For example its can be  ||  or &&
 *
 * @return array                    array( 'United States', 'United Kingdom' )
 */
function oper_get_escaped_string_keyword__as_arr( $param_keyword, $separator = '|' ) {

	/**
	$request_params_rules  = array(
							'keyword'       => array( 'validate' => 's', 'default' => '' ),
							'not_keyword'   => array( 'validate' => 's', 'default' => '' )
							//	, 'page_num'       => array( 'validate' => 'd', 				   'default' => 1 )
							//	, 'sort_type'      => array( 'validate' => array( 'ASC', 'DESC'),'default' => 'DESC' )
							//	, 'ru_create_date' => array( 'validate' => 'date', 			   'default' => '' )
	);
	$request_params_values = array(
							'keyword'       => $params['keyword'],
							'not_keyword'   => $params['not_keyword']
							//	'page_num'       => 1,
							//	'sort_type'      => 'DESC',
							//	'ru_create_date' => ''
					);
	$request_params = oper_get_clean_params_in_arr( $request_params_values, $request_params_rules );
	//		Array ( [0] => Array
	//		        (
	//		            [keyword] => United States|United Kingdom
	//		            [not_keyword] =>
	//		        )
	//		)
	*/

    $keyword_arr = explode( $separator, $param_keyword );

	foreach ( $keyword_arr as $k_ind => $k_value ) {

		$escaped_param = oper_get_clean_params_in_arr(
														  array( 'keyword' => $k_value )
														, array(
															     'keyword' => array(
																					'validate' => 's',
																					'default'  => ''
																					)
																)
													);
		$keyword_arr[ $k_ind ] = $escaped_param['keyword'];
	}

	return $keyword_arr;
}