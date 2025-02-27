<?php
/**
 * @version 1.0
 * @package Email Reminders
 * @subpackage Ajax Responder
 * @category Items
 * 
 * @author wpdevelop
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2014.05.26
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

////////////////////////////////////////////////////////////////////////////////
//    S u p p o r t    f u n c t i o n s    f o r     A j a x    ///////////////
////////////////////////////////////////////////////////////////////////////////

// Verify the nonce.    
function oper_check_nonce_in_admin_panel( $action_check = 'oper_ajax_admin_nonce' ){
  
    $nonce = ( isset( $_REQUEST[ 'oper_nonce' ] ) ) ? $_REQUEST[ 'oper_nonce' ] : '';

	if ( '' === $nonce ) return false;											// Its was request  from  some other plugin
	
    if ( ! wp_verify_nonce( $nonce, $action_check ) ) {                         // This nonce is not valid.

    	?>
	    <script type="text/javascript">
			oper_admin_show_message( '<strong><?php echo esc_js( __( 'Error!', 'email-reminders' ) ); ?></strong> ' + '<?php
			    echo esc_js( sprintf( __( 'Request do not pass security check! Please refresh the page and try one more time.', 'email-reminders' ), '<strong>', '</strong>' ) );
			    ?>', 'error', 10000 );
	    </script>
	    <?php

    	if ( 0 ) {
    		// OLD
		    ?>
		    <script type="text/javascript">
				jQuery( "#ajax_respond" ).after( "<div class='wpdevelop'><div class='alert alert-warning alert-danger'><?php
				    printf( __( '%sError!%s Request do not pass security check! Please refresh the page and try one more time.', 'email-reminders' ), '<strong>', '</strong>' );
				    ?></div></div>" );
				if ( jQuery( "#ajax_message" ).length )
					jQuery( "#ajax_message" ).slideUp();
		    </script>
		    <?php
	    }

        die;                
    } 
	return  true;																										//FixIn: 7.2.1.10
}


// Check and (re)Load specific Locale for the Ajax request - based on "admin_init" hook
function oper_check_locale_for_ajax() {
        
    add_oper_filter( 'oper_check_for_active_language', 'oper_check_for_active_language' );   // Add Hook for ability  to check  the content for active lanaguges

	if ( isset( $_POST[ 'oper_active_locale' ] ) ) {	// Reload locale according request parameter
		global $l10n;
		if ( isset( $l10n[ 'email-reminders' ] ) )
			unset( $l10n[ 'email-reminders' ] );

		if ( ! defined( 'OPER_RELOAD' ) )
			define( 'OPER_RELOAD', esc_js( $_POST[ 'oper_active_locale' ] ) );

		// Reload locale settings, its required for the correct  dates format
		if ( isset( $l10n[ 'default' ] ) )
			unset( $l10n[ 'default' ] );			   // Unload locale     
		add_filter( 'locale', 'oper_get_locale', 999 );					   // Set filter to load the locale of the Email Reminders
		load_default_textdomain();										  // Load default locale            
		global $wp_locale;
		$wp_locale = new WP_Locale();									   // Reload class

		oper_load_locale( OPER_RELOAD );
	}
}
 

////////////////////////////////////////////////////////////////////////////////
//    A j a x    H o o k s    f o r    s p e c i f i c    A c t i o n s    /////
////////////////////////////////////////////////////////////////////////////////


function oper_ajax_USER_SAVE_WINDOW_STATE() {
        
//    if ( ! oper_check_nonce_in_admin_panel() ) return false;
//    update_user_option($_POST['user_id'],'oper_win_' . $_POST['window'] ,$_POST['is_closed']);
    
    if ( ! oper_check_nonce_in_admin_panel() ) return false;
    update_user_option( (int) $_POST['user_id'], 'oper_win_' . sanitize_text_field( $_POST['window'] ) , (int) $_POST['is_closed'] );
    
}


/** Save Custom User Data */
function oper_ajax_USER_SAVE_CUSTOM_DATA() {
            
    if ( ! oper_check_nonce_in_admin_panel() ) return false;
    /*  Exmaple of $_POST:
        [data_name] => add_oper_calendar_options
        [data_value] => calendar_months_count=1&calendar_months_num_in_1_row=1&calendar_width=500px&calendar_cell_height
     */
    $post_param = explode( '&', $_POST['data_value'] );                         // "&" was set by jQuery.param( data_params ) in client side.
    $data_to_save = array();
    foreach ( $post_param as $param ) {
        $param_data = explode( '=', $param );
                
        $data_to_save[ $param_data[0] ] = ( isset( $param_data[1] ) ) ? sanitize_text_field( $param_data[1] ) : '';
    }
    /*  Exmaple: 
        Array
        (
            [calendar_months_count] => 1
            [calendar_months_num_in_1_row] => 1
            [calendar_width] => 500px
            [calendar_cell_height] => 
        )
     */

    // Save Custom User Data
    update_user_option( (int) $_POST['user_id'], 'oper_custom_' . sanitize_text_field( $_POST['data_name'] ) ,  $data_to_save );

    ?>  <script type="text/javascript">            
            var my_message = '<?php echo html_entity_decode( esc_js( __('Saved' , 'email-reminders') ),ENT_QUOTES) ; ?>';
            oper_admin_show_message( my_message, 'success', 1000 );
            <?php if ( ! empty( $_POST['is_reload'] ) == 1 ) { ?>
            setTimeout(function ( ) {location.reload(true);} ,1500);
            <?php } ?>
        </script> <?php
    die();
    
}


////////////////////////////////////////////////////////////////////////////////
//    R u n     A j a x                       //////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
if (  is_admin() && ( defined( 'DOING_AJAX' ) ) && ( DOING_AJAX )  ) {

	
    // Reload Locale if its required
    add_action( 'admin_init', 'oper_check_locale_for_ajax' );

    // Hooks list 
    $actions_list = array(   
							 'USER_SAVE_WINDOW_STATE'       => 'admin'
                            ,'USER_SAVE_CUSTOM_DATA'        => 'admin'
                         );
    
    foreach ($actions_list as $action_name => $action_where) {
        
        if ( ( isset($_POST['action']) ) && ( $_POST['action'] == $action_name ) ){
            
            if ( ( $action_where == 'admin' ) || ( $action_where == 'both' ) ) 
                add_action( 'wp_ajax_'        . $action_name, 'oper_ajax_' . $action_name);      // Admin & Client (logged in usres)
            
            if ( ( $action_where == 'both' ) || ( $action_where == 'client' ) ) 
                add_action( 'wp_ajax_nopriv_' . $action_name, 'oper_ajax_' . $action_name);      // Client         (not logged in)
        }
    }    
} 
