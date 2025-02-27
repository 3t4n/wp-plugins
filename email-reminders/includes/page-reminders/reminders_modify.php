<?php /**
 * @version 1.0
 * @description Reminders
 * @category  Reminders Add New
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


class OPER_Reminders_Modify {

	// <editor-fold     defaultstate="collapsed"                        desc=" ///  JS | CSS  /// "  >

	/**
	 * Define HOOKs for loading CSS and  JavaScript files
	 */
	public function init_load_css_js_tpl() {
		// JS & CSS

		// Load only  at  Reminders Settings Page
		if  ( strpos( $_SERVER['REQUEST_URI'], 'page=oper-reminders' ) !== false ) {										// Load only  at  Reminders Settings Page
			add_action( 'oper_enqueue_js_files',  array( $this, 'js_load_files' ), 50 );
			add_action( 'oper_enqueue_css_files', array( $this, 'enqueue_css_files' ), 50 );
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

			wp_enqueue_script( 'oper-reminders_modify' , trailingslashit( plugins_url( '', __FILE__ ) ) . 'reminders_modify.js'
							, array( 'oper-global-vars' ), '1.0', $in_footer );
		}
	}

	/** CSS */
	public function enqueue_css_files( $where_to_load ) {

		if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

			wp_enqueue_style( 'oper-reminders_modify', trailingslashit( plugins_url( '', __FILE__ ) ) . 'reminders_modify.css'
							, array(), OPER_VERSION_NUM );
		}
	}

	// </editor-fold>


	// <editor-fold     defaultstate="collapsed"                        desc=" ///  A J A X  /// "  >

		// A J A X =====================================================================================================

		/**
		 * Define HOOKs for start  loading Ajax
		 */
		public function init_ajax(){
			add_action( 'wp_ajax_'		 	 . 'OPER_REMINDERS_MODIFY_DELETE'   , array( $this, 'ajax_' . 'OPER_REMINDERS_MODIFY_DELETE' ) );	        // Admin & Client (logged in usres)
		}


		// A J A X	////////////////////////////////////////////////////////////////////////////////////////////////////

		/**
		 * Ajax - Delete Reminder
		 */
		function ajax_OPER_REMINDERS_MODIFY_DELETE(){

			if ( ! isset( $_POST['reminder_id'] ) || empty( $_POST['reminder_id'] ) ) { exit; }

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Security
			$action_name    = 'oper_reminders_ajx' . '_opernonce';                                                         		    // $_POST['element_id'] . '_opernonce';
			$nonce_post_key = 'nonce';																						    // Its key  of post $_POST[ $nonce_post_key ],  where we transfer value to  check
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// ESCAPING
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$escaped_params = oper_get_clean_or_default_request_params(
				array(
						'reminder_id' => array( 'validate' => 'digit_or_csd', 'default' => '' )
				),
				$request_prefix = false
			);

			if ( ! is_array( $escaped_params['reminder_id'] ) ) {
				$escaped_params['reminder_id'] = array( $escaped_params['reminder_id'] );
			}

			$escaped_params['reminder_id'] = implode( ',', $escaped_params['reminder_id'] );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// SQL
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			global $wpdb;
			$db_names = oper_get_db_names();

			//$sql= $wpdb->prepare( "DELETE FROM  {$wpdb->prefix}{$db_names['reminders']} WHERE reminder_id = %d ", $escaped_params['reminder_id'] );
			$sql= "DELETE FROM  {$wpdb->prefix}{$db_names['reminders']} WHERE reminder_id IN ( {$escaped_params['reminder_id']} ) ";		// $escaped_params['reminder_id'] - escaped before with oper_get_clean_or_default_request_params()

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Ajax Response
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			if ( false === $wpdb->query( $sql ) ){

				// ERROR
				wp_send_json( array(
					'ajx_item_id' => $escaped_params['reminder_id'],
					'ajx_process' => 'FAILED',
					'ajx_message' => 'Failed delete reminder ID=' . $escaped_params['reminder_id']
				) );

			} else {

				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
				wp_send_json( array(
					'ajx_item_id' => $escaped_params['reminder_id'],
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
	$reminders_modify = new OPER_Reminders_Modify;
	$reminders_modify->init_load_css_js_tpl();
	$reminders_modify->init_ajax();
 }


/**
 * Define security  parameters for Ajax in Modify functionality. Function call at Reminders page.
 */
function oper_reminders_modify_container_init(){
	/*
 	?><div class="oper_reminders__add_new__container"></div><<?php
	*/
	?>
	<script type="text/javascript">
		jQuery( document ).ready( function (){
			// Set Nonce for Ajax
			oper_reminders__modify.set_secure_param( 'nonce',   '<?php echo wp_create_nonce( 'oper_reminders_ajx' . '_opernonce' ) ?>' );
			oper_reminders__modify.set_secure_param( 'user_id', '<?php echo get_current_user_id(); ?>' );
			oper_reminders__modify.set_secure_param( 'locale',  '<?php echo get_user_locale(); ?>' );
		} );
	</script>
	<?php
}