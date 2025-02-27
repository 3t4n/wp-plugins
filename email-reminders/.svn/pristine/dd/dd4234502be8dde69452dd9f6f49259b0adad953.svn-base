<?php
/*
* @package: Reminders Page
* @category: o Email Reminders
* @description: Define Reminders in admin settings page. - Sending friendly email reminders based on custom reminders.
* Plugin URI: https://oplugins.com/plugins/email-reminders/#premium
* Author URI: https://oplugins.com
* Author: wpdevelop, oplugins
* Version: 0.0.1
* @modified 2020-01-15
*/

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/** Show Content
 *  Update Content
 *  Define Slug
 *  Define where to show
 */
class OPER_Page_Reminders extends OPER_Page_Structure {


    public function in_page() {
        return 'oper-reminders';
    }


    public function tabs() {

        $tabs = array();
        $tabs[ 'reminders' ] = array(
                              'title'		=> __( 'Reminders', 'email-reminders' )						// Title of TAB
                            , 'hint'		=> __( 'Email Reminders', 'email-reminders' )						// Hint
                            , 'page_title'	=> __( 'Email Reminders', 'email-reminders' )			// Title of Page
                            , 'link'		=> ''								// Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            , 'position'	=> ''                               // 'left'  ||  'right'  ||  ''
                            , 'css_classes' => ''                               // CSS class(es)
                            , 'icon'		=> ''                               // Icon - link to the real PNG img
                            , 'font_icon'	=> 'glyphicon glyphicon-send'			// CSS definition  of forn Icon
                            , 'default'		=> true								// Is this tab activated by default or not: true || false.
                            , 'disabled'	=> false                            // Is this tab disbaled: true || false.
                            , 'hided'		=> !true                             // Is this tab hided: true || false.
                            , 'subtabs'		=> array()

        );
        // $subtabs = array();
        // $tabs[ 'items' ][ 'subtabs' ] = $subtabs;
        return $tabs;
    }


    public function content() {

        // Checking ////////////////////////////////////////////////////////////
        do_action( 'oper_hook_settings_page_header', array( 'page' => $this->in_page() ) );								// Define Notices Section and show some static messages, if needed.

        // Submit  /////////////////////////////////////////////////////////////
        $submit_form_name = 'oper_reminders_form';                             // Define form name

		$this->show_toolbar();

		$this->show_help_section();

		?><div id="oper_log_screen" class="oper_log_screen"></div><?php

        // Content  ////////////////////////////////////////////////////////////
        ?>
        <div class="clear" style="margin-bottom:10px;"></div>
        <span class="metabox-holder">
            <form  name="<?php echo $submit_form_name; ?>" id="<?php echo $submit_form_name; ?>" action="" method="post" >
                <?php
                   // N o n c e   field, and key for checking   S u b m i t
                   wp_nonce_field( 'oper_settings_page_' . $submit_form_name );
                ?><input type="hidden" name="is_form_sbmitted_<?php echo $submit_form_name; ?>" id="is_form_sbmitted_<?php echo $submit_form_name; ?>" value="1" /><?php

				oper_reminders_modify_container_init();

				?>
				<div class="oper_reminders_pagination"></div>
				<?php

				$this->show_reminders_listing_container_ajax();

				$this->show_pagination_container();

				?><div class="clear"></div><?php

		  ?></form>
        </span>
        <?php

		oper_show_oper_footer();			// Rating

        do_action( 'oper_hook_settings_page_footer', 'oper-reminders' );
    }


		private function show_toolbar(){

			oper_flex_toolbar_sub_html_container_start( 'settings-reminders-search', array( 'class' => 'ui_search_container' ) );		// Load functionality in Addons via Hooks because 	$page = 'settings-reminders-search'

				oper_flex_toolbar_group_start( array( 'class' => 'ui_search_fields_group_1' ) );						// Elements at Several or One Line -- array( 'class' => 'group_nowrap' )

					$live_field_id = 'oper_reminder_search_field';
					?>
					<input type="text" autocomplete="off"
						   placeholder="<?php _e( 'Enter keyword to  search...', 'email-reminders' ); ?>"
						   id="<?php echo $live_field_id; ?>"
						   class="<?php echo $live_field_id; ?> oper_livesearch"
						   data-nonce="<?php //echo wp_create_nonce( $nonce_name = $live_field_id . '_opernonce' ); ?>"
						   data-user-id="<?php //echo get_current_user_id(); ?>"
					/>
					<?php

				oper_flex_toolbar_group_end();

				oper_flex_toolbar_group_start( array( 'class' => 'ui_search_fields_group_2' ) );						// Elements at Several or One Line -- array( 'class' => 'group_nowrap' )
					?>
					<select id="oper_reminders_status" name="oper_reminders_status" class="oper_reminders_status" autocomplete="off">
						<option value="" selected="selected"><?php _e( 'All Reminders', 'email-reminders' ); ?></option>
						<option value="sent"><?php _e( 'Sent Reminders', 'email-reminders' ); ?></option>
						<option value="init" selected="selected"><?php _e( 'Not Sent Reminders', 'email-reminders' ); ?></option>
					</select>
            		<?php
				oper_flex_toolbar_group_end();

			oper_flex_toolbar_sub_html_container_end( 'settings-reminders-search' );                                    // Load functionality in Addons via Hooks

			////////////////////////////////////////////////////////////////////////////////////////////////////////////

			oper_flex_toolbar_sub_html_container_start( 'settings-reminders' );                                      	// Load functionality in Addons via Hooks
												// Elements at Several or One Line
				oper_flex_toolbar_group_start( /* array( 'class' => 'group_nowrap' ) */ );

				?>
				<a href="javascript:void(0)" class="button button-primary oper_reminders_send"
				   onclick="javascript:oper_reminders_selected_send();"
				   title="<?php _e( 'Send Selected Reminder(s)', 'email-reminders' ); ?>" >
					<span class="in-button-text"><?php _e( 'Send', 'email-reminders' ); ?>&nbsp;</span>
					<span class="wpdevelop"><i class="glyphicon glyphicon-send"></i></span>
				</a>
				<?php

				?>
				<a href="javascript:void(0)" class="button button-secondary oper_reminders_delete"
				   onclick="javascript:oper_reminders_selected_delete();"
				   title="<?php _e( 'Delete Selected Reminder(s)', 'email-reminders' ); ?>" >
					<span class="in-button-text"><?php _e( 'Delete', 'email-reminders' ); ?>&nbsp;</span>
					<span class="wpdevelop"><i class="glyphicon glyphicon-trash"></i></span>
				</a>
				<?php

				do_action( 'oper_reminders_listing_container_start' );		// For addon  functionality

				oper_flex_toolbar_group_end();

			oper_flex_toolbar_sub_html_container_end( 'settings-contact-form' );                                        	// Load functionality in Addons via Hooks
		}


		private function show_help_section(){

			if ( ! oper_section_is_dismissed( 'oper-panel-help-wizard' ) ) {
				return;
			}

			$notice_id = 'oper_reminders_help_section';
			if ( ! oper_section_is_dismissed( $notice_id ) ) {

				?><div  id="<?php echo $notice_id; ?>"
						class="oper_system_notice oper_is_dismissible oper_is_hideable notice-info oper_internal_notice"
						data-nonce="<?php echo wp_create_nonce( $nonce_name = $notice_id . '_opernonce' ); ?>"
						data-user-id="<?php echo get_current_user_id(); ?>"
					><?php

				oper_x_dismiss_button();

				$field_options = array();
				$field_options[] = '<div class="oper-help-container">';

				$field_options[] = '<h3 class="oper-header-h">' . __( 'What is reminders?', 'email-reminders' ) . '</h3>';
				$field_options[] = '- ' . sprintf( __( 'Reminders it\'s ready to send emails, that was created based on %sRule(s)%s from specific %sContact(s)%s.', 'email-reminders' )
													, '<strong><a href="' . esc_url( oper_get_rules_url() ) . '">', '</a></strong>'
													, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '">', '</a></strong>'
											);
				$field_options[] = '- ' . sprintf( __( 'It\'s can be emails that are sending before or after specific time to the event from %sContact%s data. Like %sfollow-up emails%s or %sfriendly reminders%s about upcoming event.', 'email-reminders' )
													, '<strong>', '</strong>'
													, '<strong>', '</strong>'
													, '<strong>', '</strong>'
											);

				$field_options[] = '<h3 class="oper-header-h">' . __( 'How to create reminders manually?', 'email-reminders' ) . '</h3>';
				$field_options[] = '1. ' . sprintf( __( '%sCreate%s or %simport%s contact(s) at %scontacts menu page%s.', 'email-reminders' )
													, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '&tab=contacts-add">', '</a></strong>'
													, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '&tab=contacts-csv">', '</a></strong>'
													, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '">', '</a></strong>'
											);
				$field_options[] = '2. ' . sprintf( __( 'Create %srule%s for creation new reminders at %srules menu page%s.', 'email-reminders' )
													, '<strong>', '</strong>'
													, '<strong><a href="' . esc_url( oper_get_rules_url() ) . '">', '</a></strong>'
											);
				$field_options[] = '3. ' . sprintf( __( 'Execute rule - by  clicking on %s"Run"%s button near specific rule. After this you will have new reminders at current reminders menu page.', 'email-reminders' )
													, '<strong>', '</strong>'
												);
				$field_options[] = '4. ' . sprintf( __( 'Now you can send one or multiple email reminders at current reminders menu page.', 'email-reminders' ) );


				$field_options[] = '<div class="oper-help-columns">';
				$field_options[] = '	<div class="oper-help-col">';
				$field_options[] = '		<h3 class="oper-header-h"">' . __( 'How to set up automatic creation of reminders?', 'email-reminders' ) . '</h3>';
				$field_options[] = '		1. ' . sprintf( __( 'Insert into the page %sshortcode%s for creation of reminders for specific rule.', 'email-reminders' )
												, '<strong><a href="https://oplugins.com/faq/email-reminders-how-to-set-up-run-rule-automatically-to-create-reminders/">', '</a></strong>' );
				$field_options[] = '		2. ' . sprintf( __( 'When someone visit this page, shortcode will run Rule and Reminder(s) will be created.', 'email-reminders' )
												, '<strong>', '</strong>' );
				$field_options[] = '	</div>';
				$field_options[] = '	<div class="oper-help-col">';
				$field_options[] = '		<h3 class="oper-header-h oper-header-h-premium">' . __( 'Advanced automatic creation of reminders in premium versions.', 'email-reminders' ) . '</h3>';
				$field_options[] = '		1. ' . sprintf( __( 'Configure %sCRON script%s at your server for creation of reminders periodically in automatic mode. ', 'email-reminders' )
												, '<strong><a href="https://oplugins.com/plugins/email-reminders-automate/">', '</a></strong>' );
				$field_options[] = '	</div>';
				$field_options[] = '</div>';

				$field_options[] = '<div class="oper-help-columns">';
				$field_options[] = 		'<div class="oper-help-col">';
				$field_options[] = 			'<h3 class="oper-header-h">' . __( 'How to set up automatic sending of reminders?', 'email-reminders' ) . '</h3>';
				$field_options[] = 			'1. ' . sprintf( __( 'Insert into the page %sshortcode%s for sending email reminders.', 'email-reminders' ), '<strong><a href="https://oplugins.com/faq/email-reminders-how-to-set-up-automatic-sending-of-reminders/">', '</a></strong>' );
				$field_options[] = 			'2. ' . sprintf( __( 'When someone visit this page, shortcode will send active email reminders.', 'email-reminders' ), '<strong>', '</strong>' );
				$field_options[] = 		'</div>';
				$field_options[] = 		'<div class="oper-help-col">';
				$field_options[] = 			'<h3 class="oper-header-h oper-header-h-premium">' . __( 'Automatic sending of reminders in premium versions.', 'email-reminders' ) . '</h3>';
				$field_options[] = 			'1. ' . sprintf( __( 'Configure %sCRON script%s at your server for sending of reminders periodically in automatic mode. ', 'email-reminders' )
												, '<strong><a href="https://oplugins.com/plugins/email-reminders-automate/">', '</a></strong>' );
				$field_options[] = 		'</div>';
				$field_options[] = '</div>';


				$field_options[] = '</div>';
				OPER_Settings_API::field_help_row_static(
													'help_translation_section_after_legend_items'
													, array(
														   'type'              => 'help'
														 , 'value'             => $field_options
														 , 'class'             => ''
														 , 'css'               => 'margin:0;padding:0;border:0;'
														 , 'description'       => ''
														 , 'cols'              => 2
														 , 'group'             => 'help'
														 , 'tr_class'          => ''
														 , 'description_tag'   => 'p'
													)
												);
				?></div>
				<?php
				if ( oper_section_is_dismissed( 'oper-panel-help-wizard' ) ) {

					// Move help section  to  the top  of the page,  after Title before toolbar ?>
					<script type="text/javascript">
						jQuery(document).ready(function(){
							jQuery(document).ready(function(){
								jQuery( '.oper_admin_message' ).after( jQuery( '#<?php echo $notice_id; ?>' ) );
							});
						});
					</script>
					<?php
				}
			}

		}


		private function show_pagination_container(){
			?>
			<div class="oper_reminders_pagination"></div>
			<?php
			$oper_pagination = new OPER_Pagination();
			$oper_pagination->init( array(
											'load_on_page'  => 'oper-reminders',
											'container'     => '.oper_reminders_pagination',
											'on_click'	    => 'oper_reminders_pagination_click'		// onclick = "javascript: oper_reminders_pagination_click( page_num );"  - need to  define this function in JS file
			));

			if ( 0 ) {
				$oper_pagination->show( array(												        	// Its showing with  JavaScript on document ready
												'page_active' => 3,
												'pages_count' => 20
				));
			}

		}


		private function show_reminders_listing_container_ajax() {

			?>
			<div class="oper_listing_container oper_selectable_table oper_reminders_listing_container"></div>
			<?php

			$my_reminders_listing = new OPER_Reminders;

			/**
              array( 'page_num' 			=> 1
				   , 'page_items_count' 	=> 100
				   , 'sort' 				=> 'reminder_id'
				   , 'sort_type' 			=> 'DESC'
				   , 'keyword' 			    => ''
				   , 'status' 				=> ''
				   , 're_create_date'			=> ''
			       )
			 */
 		    $escaped_request_params = $my_reminders_listing->clean_request_parameters();		 // Such Empty getting, can  get  parameters from  $_GET['page_num']=2, ....

			/**
			 * $escaped_request_params = $my_reminders_listing->clean_request_parameters( array(   'request_prefix' => 'search_params'   ) ); // ->  $_REQUEST[ 'search_params' ][ 'page_num' ]=2
																																		  //  if $_REQUEST[ 'search_params' ] not set, then
																																		  //     get "default" from  OPER_Reminders::clean_request_parameters(
		    */

			/**
			// 1. Direct Clean Params

			$request_params_reminders  = array(
									  'page_num'          => array( 'validate' => 'd', 					'default' => 1 )
									, 'page_items_count'  => array( 'validate' => 'd', 					'default' => 10 )
									, 'sort'              => array( 'validate' => array( 'reminder_id' ),	'default' => 'reminder_id' )
									, 'sort_type'         => array( 'validate' => array( 'ASC', 'DESC'),'default' => 'DESC' )
									, 'status'            => array( 'validate' => 's', 					'default' => '' )
									, 'keyword'           => array( 'validate' => 's', 					'default' => '' )
									, 're_create_date'       => array( 'validate' => 'date', 				'default' => '' )
			);
			$request_params_values = array(                                                                             // Usually 		$request_params_values 	is  $_REQUEST
									'page_num'         => 1,
									'page_items_count' => 3,
									'sort'             => 'reminder_id',
									'sort_type'        => 'DESC',
									'status'           => '',
									'keyword'          => '',
									're_create_date'	   => ''
							);
			$request_params = oper_get_clean_params_in_arr( $request_params_values, $request_params_reminders );
			 */

			?>
			<script type="text/javascript">
				jQuery( document ).ready( function (){

					// Set Security - Nonce for Ajax  - Listing
					oper_reminders_listing.set_secure_param( 'nonce',   '<?php echo wp_create_nonce( 'oper_reminders_listing_ajx' . '_opernonce' ) ?>' );
					oper_reminders_listing.set_secure_param( 'user_id', '<?php echo get_current_user_id(); ?>' );
					oper_reminders_listing.set_secure_param( 'locale',  '<?php echo get_user_locale(); ?>' );

					// Set other parameters
					oper_reminders_listing.set_other_param( 'listing_container',    '.oper_reminders_listing_container' );
					oper_reminders_listing.set_other_param( 'pagination_container', '.oper_reminders_pagination' );

					// Send Ajax request and show listing after this.
					oper_reminders_send_search_request_with_params( <?php echo wp_json_encode( $escaped_request_params ); ?> );
				} );
			</script>
			<?php
		}

}
add_action('oper_menu_created', array( new OPER_Page_Reminders() , '__construct') );    // Executed after creation of Menu