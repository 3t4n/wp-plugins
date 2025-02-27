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

class OPER_Reminders_Send {

	// <editor-fold     defaultstate="collapsed"                        desc=" ///  JS | CSS files | Tpl loading  /// "  >

		// JS | CSS  ===================================================================================================

		/**
		 * Define HOOKs for loading CSS and  JavaScript files
		 */
		public function init_load_css_js_tpl() {
			// JS & CSS

			// Load only  at  Rules Settings Page
			if  ( strpos( $_SERVER['REQUEST_URI'], 'page=oper-reminders' ) !== false ) {

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
				wp_enqueue_script( 'oper-send_reminders'
					, trailingslashit( plugins_url( '', __FILE__ ) ) . 'reminders_send.js'         /* oper_plugin_url( '/_out/js/codemirror.js' ) */
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

				//wp_enqueue_style( 'oper-contacts-send', oper_plugin_url( '/includes/send_contacts/o-contacts-send.css' ), array(), OPER_VERSION_NUM );

				// wp_enqueue_style( 'oper-send_reminders', trailingslashit( plugins_url( '', __FILE__ ) ) . 'reminders_send.css'
				// 		, array(), OPER_VERSION_NUM );

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
			add_action( 'wp_ajax_'		     . 'OPER_REMINDERS_SEND', array( $this, 'ajax_' . 'OPER_REMINDERS_SEND' ) );	    // Admin & Client (logged in usres)

			// Cron  from shortcode  - Client side
			// add_action( 'wp_ajax_nopriv_' . 'OPER_REMINDERS_SEND', array( $this, 'ajax_' . 'OPER_REMINDERS_SEND' ) );	        // Client         (not logged in)
		}


		/**
		 * Ajax - Get Listing Data and Response to JS script
		 */
		public function ajax_OPER_REMINDERS_SEND() {

			if ( ! isset( $_POST['reminders_id'] ) || empty( $_POST['reminders_id'] ) ) { exit; }

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Security
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$action_name    = 'oper_reminders_ajx' . '_opernonce';                                                      // $_POST['element_id'] . '_opernonce';
			$nonce_post_key = 'nonce';																					// Its key  of post $_POST[ $nonce_post_key ],  where we transfer value to  check
			$result_check = check_ajax_referer( $action_name, $nonce_post_key );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// ESCAPING  Params
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$escaped_params = oper_get_clean_or_default_request_params(
				array(
						'reminders_id' => array( 'validate' => 'digit_or_csd', 'default' => '' )
				),
				$request_prefix = false
			);

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Get Reminder Data Array
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			/**
			 * Array (
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
			$reminders_arr = oper_get_reminders_data_arr( $escaped_params['reminders_id']  );                           // Array of Reminders ID or simply ID of one reminder
			/**
				$reminders_arr = [0] => Array (
							                    [reminder_id] => 13
							                    [status] => init
							                    [run_date] =>
							                    [advanced] => Array
							                        (
							                            [time_from] => 00:00
							                            [time_to] => 24:00
							                            [send_week0] => On
							                            [send_week1] => On
							                            [send_week2] => On
							                            [send_week3] => On
							                            [send_week4] => On
							                            [send_week5] => On
							                            [send_week6] => On
							                        )

							                    [action] => none
							                    [email_template] => super_new
			 */

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Get Email field name                              ,  where to  send  Reminder
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$email_field_name = oper_get_reminder_email_field_name();

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Send emails                                      == array( 'sent' => array(), 'not_sent' => array() )
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$sent_reminders_arr = oper_send_reminder_emails(   $reminders_arr                                           // Reminders Data Array
														, array( 'email_field_name' => $email_field_name )              // Name  of field from  Contacts Array
								                    );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			/// Message
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$message = '';
			if ( ! empty( $sent_reminders_arr['sent'] ) ) {
				$message.= sprintf(   __( 'Reminder(s) have been sent', 'email-reminders' )
									. ' [' . __('count = %d', 'email-reminders'), count( $sent_reminders_arr['sent'] ) ) . ']';
			}
			if ( ! empty( $sent_reminders_arr['not_sent'] ) ) {
				$message .= '<br/>' . __( 'Error!', 'email-reminders' ) . ' '
				                . sprintf(   __( 'Reminder(s) have not been sent', 'email-reminders' )
				                           . ' [' . __('count = %d', 'email-reminders'), count( $sent_reminders_arr['not_sent'] ) ) . ']';
			}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			wp_send_json( array(
				'ajx_reminders_id'  => $escaped_params['reminders_id'],
				'ajx_data_arr'      => $reminders_arr,
				'ajx_data_count'    => count( $reminders_arr ),
				'ajx_process'       => 'OK',

				'ajx_message'         => $message,
				'ajx_emails_sent'     => $sent_reminders_arr['sent'],
				'ajx_emails_not_sent' => $sent_reminders_arr['not_sent']

			) );

		}

	// </editor-fold>

}

/**
 * Just for loading CSS and  JavaScript files
 */
if ( true ) {
	$reminders_loading = new OPER_Reminders_Send();
	$reminders_loading->init_load_css_js_tpl();
	$reminders_loading->init_ajax();
}


/**
 * Usage: of Sending emails Remiders
 *
 *          $reminders_arr = oper_get_reminders_data_arr( $escaped_params['reminders_id'] );                            // Array of Reminders ID or simply ID of one reminder
 *
 *          // array( 'sent' => array(), 'not_sent' => array() )
			$sent_reminders_arr = oper_send_reminder_emails(
										$reminders_arr
										, array( 'email_field_name' => '_c_email' )                                     // Name  of field from  Contacts Array
									 );

 *
 */


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Get Email field name                              ,  where to  send  Reminder
 *
 * @return string
 */
function oper_get_reminder_email_field_name(){

	// Email Field name from  Activation script
	$default_email_field_name = oper_get_default_options();
	$default_email_field_name = $default_email_field_name['oper_reminders_email_field_name'];                           // '_c_email'

	// From Settings menu
	$email_field_name = get_oper_option( 'oper_reminders_email_field_name' );

	$email_field_name = empty( $email_field_name ) ? $default_email_field_name : $email_field_name;

	return $email_field_name;
}


/**
 * Get Reminder Data Array
 *
 * @param array $reminder_id_arr        array( 1, 10, 19 )      -   its must  be already  escaped array with INT ID  of specific Reminders
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
function oper_get_reminders_data_arr( $reminder_id_arr ){

	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Its must be already Escaped
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ( ! is_array( $reminder_id_arr ) ) {
		$reminder_id_arr = array( $reminder_id_arr );
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Get  Reminder and Contact  data for specific Reminders
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	global $wpdb;
	$db_names = oper_get_db_names();

	$escaped_id = oper_clean_digit_or_csd( implode( ',', $reminder_id_arr ) );

	$sql =  "SELECT * FROM  {$wpdb->prefix}{$db_names['reminders']} as reminders "
         . " INNER JOIN {$wpdb->prefix}{$db_names['contacts']} as contacts "
         . " ON    contacts.contact_id = reminders.contact_id "
		 . " WHERE reminder_id IN ( ".$escaped_id." ) ";

	$sending_reminders_arr = $wpdb->get_results( $sql );

	////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Parse Contacts and reminder data into the Array
	////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $reminders_listing = new OPER_Reminders;
    $reminders_arr = $reminders_listing->list__get_arr_from_sql_results( $sending_reminders_arr );

    return $reminders_arr;
}


/**
 * Send Reminder Email(s)
 *
 * @param array $reminders_arr          Array of Reminders data
 * @param array $params                 Default = array( 'email_field_name' => '_c_email' )
 *
 * @return array                     -  Reminders Array with all data
 */
function oper_send_reminder_emails( $reminders_arr, $params ){

	$defaults = array(
	                  'email_field_name' => '_c_email'
				);
	$params   = wp_parse_args( $params, $defaults );

	$sent_reminders_id_arr = array( 'sent' => array(), 'not_sent' => array() );

	foreach ( $reminders_arr as $rem_arr ) {

		//FixIn: 1.0.2.1
		if (empty($rem_arr[ $params['email_field_name'] ])) {
			continue;
		}

		// Get Email
		$send_to_email      = $rem_arr[ $params['email_field_name'] ];                                                  // Default  ::  $params['email_field_name'] ==  '_c_email'

		$send_copy_to_admin = 'On';

		if ( empty( $rem_arr['email_template'] ) ) {                                                                    // Send    D e f a u l t  Email

			$is_send = oper_send_email_to_user_standard( $rem_arr, $send_to_email, $send_copy_to_admin );

		} else {                                                                                                        // Send    C u s t o m    Email

			$other_params = array( 'custom_email_name' => $rem_arr['email_template'] );
			$is_send = oper_ce_send_email_to_user_custom( $rem_arr, $send_to_email, $send_copy_to_admin, $other_params );
		}

		if ( is_wp_error( $is_send ) ) {
			$sent_reminders_id_arr['not_sent'][] = array(
														  'id'    => $rem_arr['reminder_id']
														, 'error' => $is_send->get_error_message()
													);
		} else {
			oper_reminder_update_status_in_db( $rem_arr['reminder_id'], 'sent' );
			$sent_reminders_id_arr['sent'][] = $rem_arr['reminder_id'];
		}

		/*
		if ( ! empty( $is_send ) ) {
			oper_reminder_update_status_in_db( $rem_arr['reminder_id'], 'sent' );
			$sent_reminders_id_arr['sent'][] = $rem_arr['reminder_id'];
		} else {
			$sent_reminders_id_arr['not_sent'][] = $rem_arr['reminder_id'];
		}
		*/
	}
	return $sent_reminders_id_arr;
}


// E D I T  -  Update Status of reminder in DB  ========================================================================
//
/**
 * Edit record in  Database
 *
 * @param int $reminder_id				  ID of reminder
 * @param string $status                  'Pending', 'Sent', ...
 *
 * @return int $reminder_id | false on error
 */
function oper_reminder_update_status_in_db( $reminder_id, $status ) {

	global $wpdb;

	$data_s_fields = 'status = %s, run_date = %s';

	$data_s_values      = array();
	$data_s_values[]    = $status;
	$data_s_values[]    = date_i18n( 'Y-m-d H:i:s' );
	$data_s_values[]    = $reminder_id;

													//$data_s_fields = 'data = %s, source = %s, note = %s'
	$sql = "UPDATE {$wpdb->prefix}o_er_reminders SET " . $data_s_fields . " WHERE reminder_id = %d";

										//$data_s_values = array( $contact_data_row, $contact_source, $contact_note, $contact_id )
	$sql_prepared = $wpdb->prepare( $sql, $data_s_values );

	if ( false === $wpdb->query( $sql_prepared ) ){
		return false;
	}

	return $reminder_id;
}