<?php /**
 * @version 1.0
 * @description Dismiss Class
 * @category Dismiss panels Class
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com 
 * 
 * @modified 2015-11-13
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

/** Dismiss Class
 * @usage:  
 * 
 * Inline Setting Notice Dismiss'
 * 
		$notice_id = 'oper_upload_help_section';
		if ( ! oper_section_is_dismissed( $notice_id ) ) {

			?><div  id="<?php echo $notice_id; ?>" 
					class="oper_system_notice oper_is_dismissible oper_is_hideable notice-warning oper_internal_notice"
					data-nonce="<?php echo wp_create_nonce( $nonce_name = $notice_id . '_opernonce' ); ?>"
					data-user-id="<?php echo get_current_user_id(); ?>"
				><?php 
			oper_x_dismiss_button();
			....
		?></div><?php	
 *
 *		System Notice
 *
 		$notice_id = 'oper_system_notice_free_instead_paid';
		if ( ! oper_section_is_dismissed( $notice_id ) ) {
			?><div  id="<?php echo $notice_id; ?>" 
					class="oper_system_notice oper_is_dismissible oper_is_hideable updated notice-warning"
					data-nonce="<?php echo wp_create_nonce( $nonce_name = $notice_id . '_opernonce' ); ?>"
					data-user-id="<?php echo get_current_user_id(); ?>"
				><?php 			
			oper_x_dismiss_button();
			...	
			?></div><?php
 * 
 */
final class OPER_Dismiss {
	
    static private $instance = NULL;											// Define only one instance of this class
	
	/** Get only one instance of this class
	 * 
	 * @return class OPER_Dismiss
	 */
	public static function init() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof OPER_Dismiss ) ) {
			
			self::$instance = new OPER_Dismiss;
									
			// JS & CSS
			add_action( 'oper_enqueue_js_files',  array( self::$instance, 'oper_js_load_files' ),     50  );
			add_action( 'oper_enqueue_css_files', array( self::$instance, 'oper_enqueue_css_files' ), 50  );
			
			// Ajax Handlers.		Note. "locale_for_ajax" recehcked in oper-ajax.php
			add_action( 'wp_ajax_'		    . 'OPER_DISMISS', array( self::$instance, 'oper_ajax_' . 'OPER_DISMISS' ) );	// Admin & Client (logged in usres)
			//add_action( 'wp_ajax_nopriv_' . 'OPER_DISMISS', array( self::$instance, 'oper_ajax_' . 'OPER_DISMISS' ) );	// Client         (not logged in)
		}
		
		return self::$instance;        			
	}

	
	/** Ajax Handler 
	 * for request like: 
	 *                  action:     'OPER_DISMISS',
                        user_id:    panel_obj.user_id ,
                        nonce:      panel_obj.nonce,
                        element_id: panel_obj.id,
						is_closed:  1
	 * 
	 */
	public function oper_ajax_OPER_DISMISS() {
		
		if ( ! isset( $_POST['element_id'] ) || empty( $_POST['element_id'] ) ) {
			exit;
		}
		
		$action_name = sanitize_text_field( $_POST['element_id']  ) . '_opernonce';
		$nonce_post_key = 'nonce';

		// Check Security
		$result = check_ajax_referer( $action_name, $nonce_post_key );

		// Save status
		update_user_option(  (int) $_POST[ 'user_id' ], 'oper_win_' . sanitize_text_field( $_POST[ 'element_id' ] ), (int) $_POST[ 'is_closed' ]  );

		// send JSON 	
		wp_send_json( array( 'response' => 'success' ) );																// Return JS OBJ: response_data = { response: "success" } in "dismiss.js"
																														// This function call wp_die( '', '', array( 'response' => null, ) )		
	}

	
	/** JSS */
	public function oper_js_load_files( $where_to_load ) {
		
		$in_footer = true;
		
		if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {
			
			wp_enqueue_script( 'oper-dismiss', oper_plugin_url( '/_out/js/dismiss.js' ), array( 'oper-global-vars' ), '1.1', $in_footer );
		}
	}

	
	/** CSS */
	public function oper_enqueue_css_files( $where_to_load ) {

		if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

			wp_enqueue_style( 'oper-dismiss', oper_plugin_url( '/_out/css/dismiss.css' ), array(), OPER_VERSION_NUM );
		}
	}


	/** Check if this section dismissed or not.
	 * 
	 * @param string $section_html_id
	 * @return boolean
	 */
	public function is_dismissed( $section_html_id ) {
        
        if ( '1' == get_user_option( 'oper_win_' . $section_html_id ) )
			return true;                                                       
		else 
			return false;
	}
		 	
 }

 
function oper_dismiss() {
    return OPER_Dismiss::init();
}
oper_dismiss();																	// Run


/** Check  if specific section dismissed or not
 * 
 * @param type $section_html_id
 * @return boolean
 */
function oper_section_is_dismissed( $section_html_id ) {
	
	$oper_dismiss = oper_dismiss();
	
	return $oper_dismiss->is_dismissed( $section_html_id );
}


/** Show dismiss X button 
 * 
 * @param string $title
 * @param array $attributes_arr - array of attributes, like: array( 'class' => 'oper_dismiss' )
 * @param bool $echo
 * @return string of dismiss button
 */
function oper_x_dismiss_button( $title = '&times;', $attributes_arr = array(), $echo = true ) {

	$defaults = array(
		  'style' => ''
		, 'class' => 'oper_dismiss'
		, 'title' => esc_js( __( 'Close', 'email-reminders' ) )
	);
	$attributes_arr = wp_parse_args( $attributes_arr, $defaults );
	
	$attr_echo = array();
	foreach ( $attributes_arr as $attr_name => $attr_value ) {
		$attr_echo[] = esc_attr( $attr_name ) . '="' . esc_attr( $attr_value ) . '"';
	}
	$attr_echo = implode( ' ', $attr_echo );	
	
	if ( ! $echo ) { ob_start(); }	
	
	?><a href="javascript:void(0)" <?php echo $attr_echo; ?> ><?php  echo $title;  ?></a><?php 
			
	if ( ! $echo ) { return ob_get_clean(); }
}