<?php /**
 * @version 1.0
 * @description Rules
 * @category  Rules Class
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

class OPER_Rules_Run {


//DONE

	// <editor-fold     defaultstate="collapsed"                        desc=" ///  JS | CSS files | Tpl loading  /// "  >

		// JS | CSS  ===================================================================================================

		/**
		 * Define HOOKs for loading CSS and  JavaScript files
		 */
		public function init_load_css_js_tpl() {
			// JS & CSS

			// Load only  at  Rules Settings Page
			if  ( strpos( $_SERVER['REQUEST_URI'], 'page=oper-rules' ) !== false ) {

				add_action( 'oper_enqueue_js_files', array( $this, 'js_load_files' ), 50 );
				add_action( 'oper_enqueue_css_files', array( $this, 'enqueue_css_files' ), 50 );

				//add_action( 'oper_hook_settings_page_footer', array( $this, 'hook__page_footer_tmpl' ) );
			}
		}

		/** JSS */
		public function js_load_files( $where_to_load ) {

			$in_footer = true;

			if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

				//wp_enqueue_script( 'oper-live_search', oper_plugin_url( '/_out/js/live_search.js' ), array( 'oper-global-vars' ), '1.1', $in_footer );
				wp_enqueue_script( 'oper-run_rules'
					, trailingslashit( plugins_url( '', __FILE__ ) ) . 'rules_run.js'         /* oper_plugin_url( '/_out/js/codemirror.js' ) */
					, array( 'oper-global-vars' ), '1.1', $in_footer );

				/**
				wp_localize_script( 'oper-global-vars', 'oper_live_request_obj'
									, array(
											'contacts'  => '',
											'reminders' => ''
										)
				);
			    */
			}
		}

		/** CSS */
		public function enqueue_css_files( $where_to_load ) {

			if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

				//wp_enqueue_style( 'oper-contacts-run', oper_plugin_url( '/includes/run_contacts/o-contacts-run.css' ), array(), OPER_VERSION_NUM );

				//wp_enqueue_style( 'oper-run_rules', trailingslashit( plugins_url( '', __FILE__ ) ) . 'rules_run.css', array(), OPER_VERSION_NUM );
			}
		}

	// </editor-fold>


	// <editor-fold     defaultstate="collapsed"                        desc=" ///  A J A X  /// "  >

		// A J A X =====================================================================================================

		/**
		 * Define HOOKs for start  loading Ajax
		 */
		public function init_ajax(){

			// Ajax Handlers.		Note. "locale_for_ajax" rechecked in oper-ajax.php
			add_action( 'wp_ajax_'		     . 'OPER_RULES_RUN', array( $this, 'ajax_' . 'OPER_RULES_RUN' ) );	    // Admin & Client (logged in usres)

			// Cron  from shortcode  - Client side
			add_action( 'wp_ajax_nopriv_' . 'OPER_RULES_RUN', array( $this, 'ajax_' . 'OPER_RULES_RUN' ) );	        // Client         (not logged in)
		}


		/**
		 * Ajax - Get Listing Data and Response to JS script
		 */
		public function ajax_OPER_RULES_RUN() {

			if ( ! isset( $_POST['rules_id'] ) || empty( $_POST['rules_id'] ) ) { exit; }

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Security
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$action_name    = 'oper_rules_ajx' . '_opernonce';                                                         		    // $_POST['element_id'] . '_opernonce';
			$nonce_post_key = 'nonce';																						    // Its key  of post $_POST[ $nonce_post_key ],  where we transfer value to  check

			if ( ( isset( $_POST['is_cron'] ) ) && ( 1 == $_POST['is_cron'] ) ) {

				// C R O N
				$result_check = wp_verify_nonce( $_POST[ $nonce_post_key ], $action_name );
				if ( empty( $result_check ) ) {
					echo '<div><strong>' . __( 'Error!','email-reminders') . '</strong> ' . __( 'Failed checking nonce.', 'email-reminders' ) . '</div>';
					return  false;
				}
				$_REQUEST['rules_id'] = intval( $_POST['rules_id'] );

				// Get 1000 contacts starting at $last_contact_id and check, if FIT to  Conditions, and get only  fitted contacts
				if ( empty( $_POST['max_count'] ) ) {
					$max_rows_to_process = 1000;
				} else{
					$max_rows_to_process = intval( $_POST['max_count'] );
				}
			} else {

				// A J A X
				$result_check = check_ajax_referer( $action_name, $nonce_post_key );
				$max_rows_to_process = 1000;        // Get 1000 contacts starting at $last_contact_id and check, if FIT to  Conditions, and get only  fitted contacts
			}


			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// ESCAPING  Params
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$escaped_params = oper_get_clean_or_default_request_params(
				array(
						'rules_id' => array( 'validate' => 'd', 'default' => '' )
				),
				$request_prefix = false
			);


			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Rule  -  S Q L  -  Get data
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			/*
					global $wpdb;
					$db_names = oper_get_db_names();

					$sql = $wpdb->prepare( "SELECT * FROM  {$wpdb->prefix}{$db_names['rules']} WHERE rules_id = %d ", $escaped_params['rules_id'] );

					$listing_res = $wpdb->get_results( $sql );

					$my_rules = new OPER_Rules();
					$data_arr = $my_rules->list__get_arr_from_sql_results( $listing_res );
			*/
			$data_arr = oper_rule_get_data_arr( $escaped_params['rules_id'] );

			/**
			 *

			    Array ( [rules_id] => 40
	                    [last_check_contact_id] => 0
	                    [status] =>
	                    [last_run_date] =>
	                    [rule] => Array (
	                            [email_template] => updates_expired_6_months
	                            [conditions] => Array (
	                                    [0] => Array (
	                                            [if] => __default__|_date
	                                            [sign] => <
	                                            [value] => TODAY - 6 MONTHS
	                                        )
	                                )
	                        )
	                    [create_date] => 2020-02-17 09:15:20
	                    [edit_date] => 2020-02-17 09:15:20
	                )
			 */

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Get   Contacts   that's    fit   to   Rule
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$added_reminders_count = $last_contact_id = $max_contact_id = 0;
			$contacts_arr = array();
			if ( ! empty( $data_arr ) ) {

				////////////////////////////////////////////////////////////////////////////////////////////////////////
				$advanced = array();
				if (
					   ( isset( $data_arr[0]['advanced'] ) )
					&& ( isset( $data_arr[0]['advanced']['rule_run'] ) )
				) {

					$keys_array = array( 'time_from', 'time_to', 'send_week0', 'send_week1', 'send_week2', 'send_week3', 'send_week4', 'send_week5', 'send_week6' );

					foreach ( $keys_array as $key ) {
						if ( isset( $data_arr[0]['advanced']['rule_run'][ $key ] ) ) {
							$advanced[ $key ] = oper_clean_string_for_form( $data_arr[0]['advanced']['rule_run'][ $key ] );
						}
					}
				}
				////////////////////////////////////////////////////////////////////////////////////////////////////////

				// Check here if we need to  reset Rule,  because of expire
				if ( ! function_exists( 'opera_cron__rule_reset_execute' ) ) {                                          //FixIn: 1.0.2.2
					$this->reset_rule_if_expired( $escaped_params['rules_id'], $data_arr[0]['last_run_date'],  $data_arr[0]['expire_after'] );
				}

				$last_contact_id = $this->get__last_processed_contact_id__in_rules( $escaped_params['rules_id'] );

				$max_contact_id = $this->get__max_contact_id();

				if ( $last_contact_id < $max_contact_id ) {

					$contacts_arr = $this->get_contacts_fit_to_conditions( $data_arr[0]['rule']['conditions'], $last_contact_id, $max_rows_to_process );

					if ( ! empty( $contacts_arr ) ) {

						////////////////////////////////////////////////////////////////////////////////////////////////////
						// ESCAPING   Params
						////////////////////////////////////////////////////////////////////////////////////////////////////
						$request_params_arr = array();
						foreach ( $contacts_arr as $contact_id => $contact_details_arr ) {

							// 1. Direct Clean Params
							$request_params_rules  = array(
								'rules_id'       => array( 'validate' => 'd', 'default' => 0 ),
								'contact_id'     => array( 'validate' => 'd', 'default' => 0 ),
								'email_template' => array( 'validate' => 's', 'default' => '' ),
								'status'         => array( 'validate' => 's', 'default' => '' ),
								//'run_date'     => array( 'validate' => 'date', 'default' => '' ),    // 2020-02-18
								'action'         => array( 'validate' => 's', 'default' => '' )
							);
							$request_params_values = array(                                                             // Usually 		$request_params_values 	is  $_REQUEST
								'rules_id'       => $data_arr[0]['rules_id'],
								'contact_id'     => $contact_id,
								'email_template' => $data_arr[0]['rule']['email_template'],
								'status'         => 'init',
								//'run_date'     => date( 'Y-m-d' ),      // date_i18n( 'Y-m-d H:i:s' )
								'action'         => 'none'
							);

							$clean_params = oper_get_clean_params_in_arr( $request_params_values, $request_params_rules );
							$clean_params['advanced'] = maybe_serialize( $advanced );

							$request_params_arr[] = $clean_params;
						}

						////////////////////////////////////////////////////////////////////////////////////////////////////
						// Add  Reminder  to  Database
						////////////////////////////////////////////////////////////////////////////////////////////////////

						$added_reminders_count = oper_reminder_insert_to_db( $request_params_arr );                         // false on Error of adding reminders
					}

					if ( false !== $added_reminders_count ) {       // If there is no errors,  during saving to  DB contacts to Reminders
						// Update Last processed Contact after execution  Rule  - Update last_check_contact_id &  last_run_date
						$this->update__last_processed_contact_id__in_rule( $escaped_params['rules_id'], intval( $last_contact_id + $max_rows_to_process ) );
					}

				}

				$max_contact_id    = $this->get__max_contact_id();
				$last_contact_id = $this->get__last_processed_contact_id__in_rules( $escaped_params['rules_id'] );
			}


			if ( ( isset( $_POST['is_cron'] ) ) && ( 1 == $_POST['is_cron'] ) ) {
				// C R O N
				return array(
								'data_arr'        => $data_arr,
								'last_contact_id' => $this->get__last_processed_contact_id__in_rules( $escaped_params['rules_id'] ),
								'max_contact_id'  => $this->get__max_contact_id()
				);
			}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// A J A X
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			if (
					( ! empty( $data_arr ) )
			     && ( $max_contact_id > $last_contact_id )
			) {

				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
				wp_send_json( array(
					'ajx_rules_id'   => $escaped_params['rules_id'],
					'ajx_data_arr'   => $contacts_arr,
					'ajx_data_count' => count( $contacts_arr ),
					'ajx_process'    => 'OK',

					'ajx_max_contact_id'  => $max_contact_id,
					'ajx_last_contact_id' => $last_contact_id,

					'ajx_message' => sprintf( __( 'Processed %d / %d contacts and created %s reminders', 'email-reminders' ), $last_contact_id, $max_contact_id, '<strong>' . $added_reminders_count . '</strong>' )
				) );

			} else {

				wp_send_json( array(
					'ajx_rules_id' => $escaped_params['rules_id'],
					'ajx_process'  => 'AJX_FINISHED',
					'ajx_message'  => sprintf( __( 'Processed %d / %d contacts and created %s reminders', 'email-reminders' ), $last_contact_id, $max_contact_id, '<strong>'.$added_reminders_count.'</strong>' )
				) );
			}

		}

	// </editor-fold>



	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///  S u p p o r t
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	public function reset_rule_if_expired( $rules_id, $last_run_date,  $expire_after_seconds ) {

		if ( $expire_after_seconds > 0 ) {

			$expire_at = ( strtotime( $last_run_date ) + $expire_after_seconds );

			$is_expired = $expire_at - strtotime( current_time('Y-m-d H:i:s') );        //current_time('Y-m-d H:i:s') - Ruturn Mysql in LOCALIZED tiem format (its means with specific defined timezone),  as its was set for $last_run_date

			$days_count    = floor( ( $is_expired ) / ( 24 * 60 * 60 ) );
			$hours_count   = floor( ( $is_expired - ( $days_count * 24 * 60 * 60 ) ) / ( 60 * 60 ) );
			$minutes_count = floor( ( $is_expired - ( $days_count * 24 * 60 * 60 ) - ( $hours_count * 60 * 60 ) ) / ( 60 ) );
			$seconds_count = floor( ( $is_expired - ( $days_count * 24 * 60 * 60 ) - ( $hours_count * 60 * 60 ) - ( $minutes_count * 60 ) )  );

			// Reset
			if ( $is_expired < 0 ) {
				$contact_id = 0;
				$this->update__last_processed_contact_id__in_rule( $rules_id, $contact_id );
			}
		}
	}


	/**
	 * Get array of all contacts that fit to rule Conditions
	 *
	 * @param array $conditions     array (
									            [0] => array (
									                    [if] => __default__|_date
									                    [sign] => <
									                    [value] => TODAY - 6 MONTHS
								                )
	 *                                          , ...
	                                )
	 * @param int $contacts_start_id            230
	 * @param int $contacts_count_to_process    1000
	 *
	 * @return array $contacts_arr  array (  [contact_id] => array ( ... ),  )
	 */
	public function get_contacts_fit_to_conditions( $conditions, $contacts_start_id, $contacts_count_to_process = 1000 ){

		$contacts_arr = array();

		////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// SQL
		////////////////////////////////////////////////////////////////////////////////////////////////////////////
		global $wpdb;
		$db_names = oper_get_db_names();

		$sql      = array();
		$sql_args = array();

		// Problem, if we have several millions records. Need to have some Stack for executing from - to records...
		$sql['select'] = " SELECT * ";
		$sql['from']   = " FROM {$wpdb->prefix}{$db_names['contacts']}  as contacts";
		$sql['where']  = " WHERE ( 1 = 1 )";

		$sql['order'] = " ORDER BY contact_id ASC ";

	    $sql['limit'] = " LIMIT %d, %d ";
		$sql_args[] = $contacts_start_id;
		$sql_args[] = $contacts_count_to_process;


	    $sql_prepared = $wpdb->prepare(
										  $sql['select'] . $sql['from'] . $sql['where'] . $sql['order'] . $sql['limit']
										, $sql_args
	                        );
		$sql_result = $wpdb->get_results( $sql_prepared );


		////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Parse
		////////////////////////////////////////////////////////////////////////////////////////////////////////////

		/**
		 * Contacts Array:  array (  [11726] => Array (
											            [contact_id] => 10
											            [_store] =>
											            [_purchase_product] => Pro
											            [_paid] => $99,00
											            [_subscription_date] =>
											            [_subscription_cost] =>
											            [_subscription_check] =>
											            [_date] => 23.10.2009
											            [_payment_type] => 1
											            [_country_city] => Oyrane 3A
											            [_address] => Forde
														...
													), ...
		 */
//		$parse_contacts = new OPER_Contacts_Listing;
//		$contacts_arr = $parse_contacts->contacts_get_arr_from_sql_results( $sql_result );

		$parse_contacts = new OPER_Contacts;
		$contacts_arr = $parse_contacts->list__get_arr_from_sql_results( $sql_result );


		$contacts_arr_good = array();

		foreach ( $contacts_arr as $contact_details_arr ) {

			$is_all_conditions_ok = true;

			foreach ( $conditions as $cond ) {

				$is_ok = $this->is_condition_ok_for_contact( $contact_details_arr, $cond );

				if ( ! $is_ok ) {
					$is_all_conditions_ok = false;
					continue;
				}
			}

			if( $is_all_conditions_ok ) {
				$contacts_arr_good[ $contact_details_arr['contact_id'] ] = $contact_details_arr;
			}
		}

		return $contacts_arr_good;
	}


		/**
		 * Is Rule Condition Ok relative to specific Contact
		 *
		 * @param $contact_details_arr      =   Array (
											            [contact_id] => 10
											            [_store] =>
											            [_purchase_product] => Pro
											            [_paid] => $99,00
											            [_subscription_date] =>
											            [_subscription_cost] =>
											            [_subscription_check] =>
											            [_date] => 23.10.2009
											            [_payment_type] => 1
											            [_country_city] => Oyrane 3A
											            [_address] => Forde
											            [_order_num] => XXXX
											            [_c_email] => mail@server.com
											            [_c_name] => John Smith
											            [_license_to] => John
											            [_license_key] => AAAA
											            [_product_name] => PS (single)
											            [note] =>
											            [source] => csv
											            [create_date] => 2019-11-22 11:32:32
											            [edit_date] => 2019-11-22 11:32:32
											        )
		 * @param $condition                = Array (
											            [if] => __default__|_date
											            [sign] => =
											            [value] => TODAY - 6 MONTHS + 0 DAY
											        )
		 *
		 * @return bool
		 */
		private function is_condition_ok_for_contact( $contact_details_arr, $condition ){

			$condition['if'] = explode( '|', $condition['if'] );
			$cond_if         = $condition['if'][ ( count( $condition['if'] ) - 1 ) ];           // Name of field

			if ( isset( $contact_details_arr[ $cond_if ] ) ) {
//} if (1) {    // TODO: If some field does not exist in the contatc at all,  and we need to apply  this condition - for future implementation in settings of email-reminders

				// Check  if condition  is Time
				if ( false !== strtotime( $condition['value'] ) ) {
					$condition_value = strtotime( $condition['value'] );
					$contact_value   = strtotime( $contact_details_arr[ $cond_if ] );
				} else {
					$condition_value = $condition['value'];
					$contact_value   = $contact_details_arr[ $cond_if ];
				}

				$condition['sign'] = htmlspecialchars_decode( $condition['sign'] );             // = , > , < , ...

				switch ( $condition['sign'] ) {
					case '=':
						if ( $contact_value == $condition_value ) {
							return true;
						}
						break;

					case '!=':
						if ( $contact_value != $condition_value ) {
							return true;
						}
						break;

					case '>=':
						if ( $contact_value >= $condition_value ) {
							return true;
						}
						break;

					case '>':
						if ( $contact_value > $condition_value ) {
							return true;
						}
						break;

					case '<=':

						if ( $contact_value <=  $condition_value ) {
							return true;
						}
						break;

					case '<':
						if ( $contact_value < $condition_value ) {
							return true;
						}
						break;

					case 'contain':
						$is_contain = $this->is_contain_string( $contact_value, $condition_value );
						if ( false !== $is_contain ) {
							return true;
						}
						break;

					case '!contain':
						$is_contain = $this->is_contain_string( $contact_value, $condition_value );
						if ( false === $is_contain ) {
							return true;
						}
						break;

					default:
						break;
				}
			}
			return  false;
		}


		/**
		 * Check  if string contain specific items. Can search for several  items divided by | symbol
		 *
		 * Example:  $this->is_contain_string( 'Canada, British Columbia', 'Canada' )   ->  true
		 * Example:  $this->is_contain_string( 'United States, California', 'Canada|United States|Mexico|Brazil' )   ->  true
		 * Example:  $this->is_contain_string( 'United Kingdom, DORSET', 'Canada|United States|Mexico|Brazil' )   ->  false
		 *
		 *
		 * @param $subject_str  - string where to search in
		 * @param $search_str   - string what  we are searching. Note,  its possible to  search  for several items divided by  | symbol
		 *
		 * @return bool
		 */
		public function is_contain_string( $subject_str, $search_str ){

			$search_arr = explode( '|', $search_str );

			foreach ( $search_arr as $search_item ) {

				$is_contain = strpos( $subject_str, $search_item );

				if ( false !== $is_contain ) {

					return true;
				}
			}

			return false;
		}


	/**
	 * Get Last processed Contact ID  in Rules table  (based on saved option last_check_contact_id in Rules)
	 *
	 * @param (int) $rule_id
	 *
	 * @return int  $contact_id
	 */
	public function get__last_processed_contact_id__in_rules( $rule_id ){

		global $wpdb;
		$db_names = oper_get_db_names();

		$last_check_contact_id = 0;

		// Rules (saved option) ////////////////////////////////////////////////////////////////////////////////////////////
		$sql = "SELECT * FROM {$wpdb->prefix}{$db_names['rules']} WHERE rules_id = %d ORDER BY rules_id DESC LIMIT 1";
		$sql_prepared = $wpdb->prepare( $sql, intval( $rule_id ) );
		$rules_res    = $wpdb->get_results( $sql_prepared );

		if (    ( ! empty( $rules_res ) )
		     && ( ! empty( $rules_res[0]->last_check_contact_id ) ) ) {
			$last_check_contact_id = $rules_res[0]->last_check_contact_id;
		}
		return $last_check_contact_id;
	}

		/**
		 * Get Last processed Contact ID  in Reminders table  (based on created reminder for specific Rule and Contact)
		 *
		 * @param (int) $rule_id
		 *
		 * @return int  $contact_id
		 */
		public function get__last_processed_contact_id__in_reminders( $rule_id ){

			global $wpdb;
			$db_names = oper_get_db_names();

		    $last_reminder_contact_id = 0;

			// Reminders ( last procesed option) ///////////////////////////////////////////////////////////////////////////////
			$sql           = "SELECT * FROM {$wpdb->prefix}{$db_names['reminders']} WHERE rules_id = %d ORDER BY reminder_id DESC LIMIT 1";
			$sql_prepared  = $wpdb->prepare( $sql, intval( $rule_id ) );
			$reminders_res = $wpdb->get_results( $sql_prepared );

			if ( ( ! empty( $reminders_res ) )
			     && ( ! empty( $reminders_res[0]->contact_id ) ) ) {
				$last_reminder_contact_id = $reminders_res[0]->contact_id;
			}

			return $last_reminder_contact_id;
		}


	/**
	 * Update Last processed Contact after execution  Rule  - Update last_check_contact_id &  last_run_date
	 *
	 * @param $rule_id
	 * @param $contact_id
	 *
	 * @return array|int|object|null
	 */
	public function update__last_processed_contact_id__in_rule( $rule_id, $contact_id ){

		global $wpdb;
		$db_names = oper_get_db_names();

		$max_contact_id = $this->get__max_contact_id();		    // Check if we do not overcome maximum  number of Customers

		if ( $max_contact_id < $contact_id ) {
			$contact_id = $max_contact_id;                      // Update exact max number.
		}

		$data_s_fields = 'last_check_contact_id = %d, last_run_date = %s';
		$data_s_values      = array();
		$data_s_values[]    = intval( $contact_id );
		$data_s_values[]    = date_i18n( 'Y-m-d H:i:s' );                                                                 //FixIn: 0.1.3.1

		$data_s_values[]    = $rule_id;
														//$data_s_fields = 'data = %s, source = %s, note = %s'
		$sql = "UPDATE {$wpdb->prefix}{$db_names['rules']} SET " . $data_s_fields . " WHERE rules_id = %d";

											//$data_s_values = array( $contact_data_row, $contact_source, $contact_note, $contact_id )
		$sql_prepared = $wpdb->prepare( $sql, $data_s_values );

		if ( false === $wpdb->query( $sql_prepared ) ){
			return 0;
		}

		return $contact_id;
	}


	/**
	 * Get get__max_contact_id
	 *
	 * @return int
	 */
	public function get__max_contact_id() {

		global $wpdb;
		$db_names = oper_get_db_names();

		//Check if we do not overcome maximum  number of Customers
		$max_contact_id = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}{$db_names['contacts']} ORDER BY contact_id DESC LIMIT 1" );
		if (    ( ! empty( $max_contact_id ) )
		     && ( ! empty( $max_contact_id[0]->contact_id ) ) ) {
			$max_contact_id = $max_contact_id[0]->contact_id;
		} else {
			$max_contact_id = 0;
		}

		return $max_contact_id;
	}

}


/**
 * Just for loading CSS and  JavaScript files
 */
if ( true ) {
	$rules_loading = new OPER_Rules_Run();
	$rules_loading->init_load_css_js_tpl();
	$rules_loading->init_ajax();
}



/**
 * Add Reminder record to  Database
 *
 * @param array $escaped_params_arr = Array ()
 *
 * @return false | int  Number of added reminders           (false on error)
 */
function oper_reminder_insert_to_db( $escaped_params_arr ){

	global $wpdb;
	$db_names = oper_get_db_names();

	$sql_fields = 'status, './*run_date,*/ 'action, email_template, contact_id, rules_id, re_create_date, advanced';
	$sql_values = array();
	$sql_args   = array();

	// Template for adding several rows to  the Database

	foreach ( $escaped_params_arr as $escaped_params ) {

		$sql_values[] = '( %s, './*%s,*/ '%s, %s, %d, %d, %s, %s )';
		$sql_args[]   = $escaped_params['status'];
		//$sql_args[]   = $escaped_params['run_date'];            // date_i18n( 'Y-m-d H:i:s' )
		$sql_args[]   = $escaped_params['action'];
		$sql_args[]   = $escaped_params['email_template'];
		$sql_args[]   = $escaped_params['contact_id'];
		$sql_args[]   = $escaped_params['rules_id'];
		$sql_args[]   = date_i18n( 'Y-m-d H:i:s' );
		$sql_args[]   = $escaped_params['advanced'];
	}

	$sql_values     = implode( ', ', $sql_values );

	////////////////////////////////////////////////////////////////////////////
	// Add to DB
	////////////////////////////////////////////////////////////////////////////
	$sql = "INSERT INTO {$wpdb->prefix}{$db_names['reminders']} ( {$sql_fields} )VALUES {$sql_values} " ;

	$sql_prepared = $wpdb->prepare($sql, $sql_args );

	if ( false === $wpdb->query( $sql_prepared ) ){
		return false;                                     // debuge_error( 'Error. DB inserting ' . $sql ,__FILE__,__LINE__);
	} else {
		//return (int) $wpdb->insert_id;                  // Get ID of last insert

		return count( $escaped_params_arr );
	}
}


/**
 * Get Rule -   Data Array
 *
 * @param int $rules_id
 *
* @return array        Array (
			                    [rules_id] => 49
			                    [last_check_contact_id] => 0
			                    [status] =>
			                    [last_run_date] => 2020-04-06 11:26:27
			                    [expire_after] => 0
			                    [rule] => Array (
						                            [email_template] => updates_expired_6_months
						                            [conditions] => Array (
										                                    [0] => Array (
										                                            [if] => __default__|_date
										                                            [sign] => =
										                                            [value] => TODAY - 6 MONTHS - 1 DAY
										                                        )
																			...
					                                                )

						                        )
			                    [advanced] => Array(
							                            [rule_run] => Array(
							                                    [enable] => On
							                                    [next_time] => 2020-04-05 13:53
							                                    [recurrence] => opera_rules_operation_30sec
							                                    [max_contacts] => 20
							                                )
							                            [rule_reset] => Array(
							                                    [enable] => On
							                                    [next_time] => 2020-04-06 09:53
							                                    [recurrence] => 300
							                                    [contact_id] => 0
							                                )
			                        )
			                    [ru_create_date] => 2020-03-19 09:56:28
			                    [ru_edit_date] => 2020-04-06 11:27:11
	                )
 */
function oper_rule_get_data_arr( $rules_id ){

	global $wpdb;
	$db_names = oper_get_db_names();

	$sql = $wpdb->prepare( "SELECT * FROM  {$wpdb->prefix}{$db_names['rules']} WHERE rules_id = %d ", intval( $rules_id ) );

	$listing_res = $wpdb->get_results( $sql );

	$my_rules = new OPER_Rules();
	$data_arr = $my_rules->list__get_arr_from_sql_results( $listing_res );

	return $data_arr;
}
