<?php /**
 * @version 1.0
 * @description Notices Class
 * @category Show system Notices
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com 
 * 
 * @modified 2015-11-13
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

/** Showing our system notices in admin panel */
class OPER_Notices {
    
	
    function __construct() {
    
		// Hooks for showing notices only at specific admin pages
        add_action( 'oper_hook_oper_page_header',		array( $this, 'show_system_notices' ) );
		add_action( 'oper_settings_after_header',	array( $this, 'show_system_notices' ) );
    }    
	
	
	/** Check  and show some system  messages 
	 * 
	 * @param array $page_arr					 array( 'page' => $this->in_page() ) ||  array( 'page' => $this->in_page(), 'subpage' => 'emails_settings' )
	 */
	public function show_system_notices( $page_arr ) {

		if ( ! in_array( $page_arr, array( 'oper', 'oper-settings' ) ) )
			return false;
		
				
		///////////////////////////////////////////////////////////
		$notice_id = 'oper_system_notice_free_instead_paid';
		///////////////////////////////////////////////////////////
		if (	    oper_is_updated_paid_to_free()
				&& ( ! oper_section_is_dismissed( $notice_id ) )
			// || true 
		) {

			?><div  id="<?php echo $notice_id; ?>" 
					class="oper_system_notice oper_is_dismissible oper_is_hideable updated notice-warning"
					data-nonce="<?php echo wp_create_nonce( $nonce_name = $notice_id . '_opernonce' ); ?>"
					data-user-id="<?php echo get_current_user_id(); ?>"
				><?php 
			
			oper_x_dismiss_button();
			
			echo '<strong>' . __( 'Warning!', 'email-reminders' ) . '</strong> ';
			printf( __( 'Probabaly you updated your paid version of Email Reminders by free version or update process failed. You can request the new update of your paid version at %1sthis page%2s.', 'email-reminders' )
					, '<a href="http://oplugins.com/plugins/email-reminders/request-update/" target="_blank">', '</a>' );
			
			?></div><?php
		}       
		///////////////////////////////////////////////////////////

	}
	
}
 
new OPER_Notices();																// Run