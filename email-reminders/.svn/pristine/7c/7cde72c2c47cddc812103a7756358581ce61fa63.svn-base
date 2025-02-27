<?php /**
 * @version 1.0
 * @description Contacts
 * @category  Contacts Add New
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


class OPER_Contacts_Modify {

	// <editor-fold     defaultstate="collapsed"                        desc=" ///  JS | CSS  /// "  >

		/**
		 * Define HOOKs for loading CSS and  JavaScript files
		 */
		public function init_load_css_js() {

			// Load only  at  Contacts Settings Page
			if  ( strpos( $_SERVER['REQUEST_URI'], 'page=oper-contacts' ) !== false ) {										// Load only  at  Contacts Settings Page
				add_action( 'oper_enqueue_js_files',  array( $this, 'js_load_files' ), 50 );
				add_action( 'oper_enqueue_css_files', array( $this, 'enqueue_css_files' ), 50 );

				// add_action( 'oper_hook_settings_page_footer', array( $this, 'oper_contacts__add_new__in_page_templates' ), 50 );
			}
		}

		/** JSS */
		public function js_load_files( $where_to_load ) {

			$in_footer = true;
			if (
				   ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) )  // || ( 'client' == $where_to_load )
			){
				// wp_enqueue_script ( 'oper-script-name-id', oper_plugin_url( '/_out/js/live_search.js' ), array( 'oper-global-vars' ), '1.1', $in_footer );
				// wp_localize_script( 'oper-script-name-id', 'oper_global_obj' , array( 'contacts'  => '', 'reminders' => '' ) );			// Usage: 		oper_global_obj.contacts

				wp_enqueue_script( 'oper-contacts_modify' , trailingslashit( plugins_url( '', __FILE__ ) ) . 'contacts_modify.js', array( 'oper-global-vars' ), '1.0', $in_footer );

				do_action( 'opera_js_load_files_contacts' );
			}
		}

		/** CSS */
		public function enqueue_css_files( $where_to_load ) {

			if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

				wp_enqueue_style( 'oper-contacts_modify', trailingslashit( plugins_url( '', __FILE__ ) ) . 'contacts_modify.css', array(), OPER_VERSION_NUM );

				do_action( 'opera_enqueue_css_files_contacts' );
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
			add_action( 'wp_ajax_'		 	 . 'OPER_CONTACTS_MODIFY_EDIT_SHOW', array( $this, 'ajax_' . 'OPER_CONTACTS_MODIFY_EDIT_SHOW' ) );	    // Admin & Client (logged in usres)
			add_action( 'wp_ajax_'		 	 . 'OPER_CONTACT_EDIT_SAVE_CHANGES', array( $this, 'ajax_' . 'OPER_CONTACT_EDIT_SAVE_CHANGES' ) );	    // Admin & Client (logged in usres)
			// add_action( 'wp_ajax_nopriv_' . 'OPER_CONTACTS_MODIFY_ADD_EDIT', array( $this, 'ajax_' . 'OPER_CONTACTS_MODIFY_ADD_EDIT' ) );		// Client         (not logged in)


			add_action( 'wp_ajax_'		 	 . 'OPER_CONTACTS_MODIFY_DELETE'   , array( $this, 'ajax_' . 'OPER_CONTACTS_MODIFY_DELETE' ) );	        // Admin & Client (logged in usres)

		}


		/**
		 * Ajax - Add New Contact
		 */
		function ajax_OPER_CONTACTS_MODIFY_EDIT_SHOW(){

			if ( ! isset( $_POST['contact_id'] ) || empty( $_POST['contact_id'] ) ) { exit; }

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Security
			$action_name    = 'oper_contacts_ajx' . '_opernonce';                                                         		    // $_POST['element_id'] . '_opernonce';
			$nonce_post_key = 'nonce';																						    // Its key  of post $_POST[ $nonce_post_key ],  where we transfer value to  check
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// SQL
			$request_prefix = false;
			$request_params = oper_get_clean_or_default_request_params(
				array(
						'contact_id'    =>  array( 'validate' => 'd', 'default' => 1 )
				), $request_prefix
			);

			global $wpdb;

			$sql= $wpdb->prepare( "SELECT * FROM  {$wpdb->prefix}o_er_contacts WHERE contact_id = %d ", $request_params['contact_id'] );

			$sql_result = $wpdb->get_results( $sql );

			if ( ! empty( $sql_result ) ){

				$parse_contacts = new OPER_Contacts;

				/**
				 * Get array of contacts
						array (
								[0] => Array (
										[contact_id] => 11726
										[id] => 2
										[booking_type] => Standard
										[status] => Approved
										...
									), ...
				 */
				$items_arr = $parse_contacts->list__get_arr_from_sql_results( $sql_result );

				$oper_contacts_editing_via = get_oper_option('oper_contacts_editing_via');


				////////////////////////////////////////////////////////////////////////////////////////////////////////////
				/// Contact Form HTML
				////////////////////////////////////////////////////////////////////////////////////////////////////////////

				// This contact  must  to be edited in the custom form
				if (
					   ( ! empty( $items_arr ) )
					&& ( ! empty( $items_arr[0]['__custom_form__'] ) )
					&& ( function_exists( 'oper_cf__is_exist' ) )
					&& ( oper_cf__is_exist( $items_arr[0]['__custom_form__'] ) )
				) {

					$custom_form_name = $items_arr[0]['__custom_form__'];                           // Custom - "from Form Data"

				} else {

					$custom_form_name = get_oper_option( 'oper_contacts_default_edit_form' );       // Custom - "Default from Settings"

					$custom_form_name = ( empty( $custom_form_name ) ) ? '' : $custom_form_name;    // Default ?
				}

				$contact_form_html = oper_contact_form_get_content( $custom_form_name );

				// Add hidden field with name of Custom Contact-Form
				if ( function_exists( 'oper_cf__add_hidden_field' ) ){
					$contact_form_html .= oper_cf__add_hidden_field( $custom_form_name );
				}
				////////////////////////////////////////////////////////////////////////////////////////////////////////////


				////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
				wp_send_json( array(
					'ajx_contact_id'           => $request_params['contact_id'],
					'ajx_contact_arr'          => $items_arr,
					'ajx_process'              => 'OK',
					'ajx_contact_form_html'    => $contact_form_html,
					'ajx_contacts_editing_via' => $oper_contacts_editing_via
				) );

			} else {

				// ERROR
				wp_send_json( array(
					'ajx_contact_id' 	=> $request_params['contact_id'],
					'ajx_process' 		=> 'FAILED',
					'ajx_message' 		=> 'No contact with ID=' . $request_params['contact_id']
				) );

			}

		}


		/**
		 * Ajax Handler or request like:        action:     'OPER_CONTACT_EDIT_SAVE_CHANGES',
		 * user_id:    panel_obj.user_id ,
		 * nonce:      panel_obj.nonce,
		 * contact_id: 	  ID of contact
		 * contact_data:  data to save
		 *
		 */
		public function ajax_OPER_CONTACT_EDIT_SAVE_CHANGES() {

			if ( ! isset( $_POST['contact_id'] ) || empty( $_POST['contact_id'] ) ) {
				exit;
			}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Security
			// Its defined in ../email-reminders/includes/listing_contacts/actions_contacts_edit.php
			$action_name    = 'oper_contacts_ajx' . '_opernonce';                                                       //   $_POST['element_id'] . '_opernonce';
			$nonce_post_key = 'nonce';
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Get clean Parameters for SQL
			$request_prefix = false;
			$request_params = oper_get_clean_or_default_request_params(
				array(
						'contact_id'    =>  array( 'validate' => 'd', 'default' => 1 ),
						'contact_data'  =>  array( 'validate' => 's' )
				), $request_prefix
			);


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Get submitted $_POST data as associated array
			//TODO: Fix here from  one textarea to  multiple text fields,  if template was changed ??
			$contact_data = array();
			$request_params['contact_data'] = explode( "\n", $request_params['contact_data'] );

			foreach ( $request_params['contact_data'] as $cd_row => $cd_value ) {

				// Because we are having in explode, last  parameter as ... , 2),  so  system  will  return array  with maximum 2 elements
				// Its means that  we can  use = symbol in values (exploding starting only  one time,  just after name of fiel,  and its means that  name of field must  not contain =
				list( $row_key, $row_value ) = explode( '=', $cd_value , 2 );

				// Replace {{newline}} to  New Line,  because of replacement in: oper_contact_ajx_edit_save( ajx_contact_id )
				$row_value = str_replace( '{{newline}}', "\n", $row_value );

				$contact_data[ trim( $row_key ) ] = trim( $row_value );
			}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Save to DB
			$sql_result = oper_sql_contacts_update( $request_params['contact_id'] , $contact_data );

			if ( true === $sql_result ) {

				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
				wp_send_json( array(
						'ajx_contact_id' 	=> $request_params['contact_id'],
						'ajx_contact_arr' 	=> $contact_data,
						'ajx_process' 		=> 'OK'
					) );
			} else {

				// ERROR
				wp_send_json( array(
					'ajx_contact_id' 	=> $request_params['contact_id'],
					'ajx_message' 		=> 'Failed update contact with ID=' . $request_params['contact_id'],
					'ajx_process' 		=> 'FAILED'
				) );
			}
		}


		/**
		 * Ajax - Delete Contact
		 */
		function ajax_OPER_CONTACTS_MODIFY_DELETE(){

			if ( ! isset( $_POST['contacts_id'] ) || empty( $_POST['contacts_id'] ) ) { exit; }

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Security
			$action_name    = 'oper_contacts_ajx' . '_opernonce';                                                       //   $_POST['element_id'] . '_opernonce';
			$nonce_post_key = 'nonce';
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// ESCAPING
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$escaped_params = oper_get_clean_or_default_request_params(
				array(
						'contacts_id' => array( 'validate' => 'digit_or_csd', 'default' => '' )
				),
				$request_prefix = false
			);

			if ( ! is_array( $escaped_params['contacts_id'] ) ) {
				$escaped_params['contacts_id'] = array( $escaped_params['contacts_id'] );
			}

			$escaped_params['contacts_id'] = implode( ',', $escaped_params['contacts_id'] );


			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// SQL
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			global $wpdb;
			$db_names = oper_get_db_names();

			$sql= "DELETE FROM  {$wpdb->prefix}{$db_names['contacts']} WHERE contact_id IN ( {$escaped_params['contacts_id']} ) ";
			//$sql= $wpdb->prepare( "DELETE FROM  {$wpdb->prefix}{$db_names['contacts']} WHERE contact_id = %d ", $escaped_params['contacts_id'] );

			do_action( 'opera_remove_contact' ,   $escaped_params['contacts_id'] );										// Addon  functionality

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Ajax Response
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			if ( false === $wpdb->query( $sql ) ){

				// ERROR
				wp_send_json( array(
					'ajx_item_id' => $escaped_params['contacts_id'],
					'ajx_process' => 'FAILED',
					'ajx_message' => 'Failed delete contact ID=' . $escaped_params['contacts_id']
				) );

			} else {

				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
				wp_send_json( array(
					'ajx_item_id' => $escaped_params['contacts_id'],
					'ajx_process' => 'OK'
				) );
			}

		}

	// </editor-fold>

}


/**
 * Just for loading CSS and  JavaScript files
 */
 if ( true ) {
	$contacts_modify = new OPER_Contacts_Modify;
	$contacts_modify->init_load_css_js();
	$contacts_modify->init_ajax();
 }



function oper_contacts_modify_container_show(){
	?>
	<div class="oper_contacts__modify__container"></div>
	<script type="text/javascript">
		jQuery( document ).ready( function (){
			// Set Nonce for Ajax
			oper_contacts__modify.set_secure_param( 'nonce',   '<?php echo wp_create_nonce( 'oper_contacts_ajx' . '_opernonce' ) ?>' );
			oper_contacts__modify.set_secure_param( 'user_id', '<?php echo get_current_user_id(); ?>' );
			oper_contacts__modify.set_secure_param( 'locale',  '<?php echo get_user_locale(); ?>' );
		} );
	</script>
	<?php
}