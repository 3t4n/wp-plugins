<?php
/*
* @package: Contacts Page
* @category: o Email Reminders
* @description: Define Contacts in admin settings page. - Sending friendly email reminders based on custom contacts.
* Plugin URI: https://oplugins.com/plugins/email-reminders/#premium
* Author URI: https://oplugins.com
* Author: wpdevelop, oplugins
* Version: 0.0.1
* @modified 2020-05-11
*/

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/** Show Content
 *  Update Content
 *  Define Slug
 *  Define where to show
 */
class OPER_Page_Contacts extends OPER_Page_Structure {


    public function in_page() {
        return 'oper-contacts';
    }


    public function tabs() {

        $tabs = array();
        $tabs[ 'contacts' ] = array(
                              'title'		=> __( 'Contacts', 'email-reminders' )						// Title of TAB
                            , 'hint'		=> __( 'List of contacts', 'email-reminders' )						// Hint
                            , 'page_title'	=> __( 'Contacts list', 'email-reminders' )			// Title of Page
                            , 'link'		=> ''								// Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            , 'position'	=> ''                               // 'left'  ||  'right'  ||  ''
                            , 'css_classes' => ''                               // CSS class(es)
                            , 'icon'		=> ''                               // Icon - link to the real PNG img
                            , 'font_icon'	=> 'glyphicon glyphicon-user'			// CSS definition  of forn Icon
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
        $submit_form_name = 'oper_contacts_form';                             // Define form name

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

				oper_contacts_modify_container_show();					// Container for showing Edit contacts and define Edit and Delete contacts JavaScript vars.

				?><div class="oper_contacts_pagination"></div><?php		// Pagination  container at  head

				$this->show_contacts_listing_container_ajax();

				$this->show_pagination_container();

				// $this->show_contacts_listing_container_directly();			// Useful  for direct  showing of listing wthout the ajax request,  its require  JavaScript to  show data in template!!

				?><div class="clear"></div><?php

		  ?></form>
        </span>
        <?php

		oper_show_oper_footer();			// Rating

        do_action( 'oper_hook_settings_page_footer', 'oper-contacts' );
    }


		private function show_toolbar(){

			oper_flex_toolbar_sub_html_container_start( 'settings-contact-listing', array( 'class' => 'ui_search_container' ) );                                      	// Load functionality in Addons via Hooks
												// Elements at Several or One Line
				oper_flex_toolbar_group_start( array( 'class' => 'ui_search_fields_group_1' ) /* array( 'class' => 'group_nowrap' ) */ );

					$live_field_id = 'oper_search_field';
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

												// Elements at Several or One Line
				oper_flex_toolbar_group_start(  array( 'class' => 'ui_search_fields_group_2' ) /* array( 'class' => 'group_nowrap' ) */ );
					?>
					<!--select id="oper_items_sort_type" name="oper_items_sort_type" class="oper_items_sort_type" autocomplete="off">
						<option value="ASC"><?php _e( 'ASC', 'email-reminders' ); ?></option>
						<option value="DESC" selected="selected"><?php _e( 'DESC', 'email-reminders' ); ?></option>
					</select-->

					<select id="oper_items_source" name="oper_items_source" class="oper_items_source" autocomplete="off">
						<option value="" selected="selected"><?php _e( 'All', 'email-reminders' ); ?></option>
						<option value="csv"><?php _e( 'CSV', 'email-reminders' ); ?></option>
						<option value="admin_adding"><?php _e( 'Manually Added', 'email-reminders' ); ?></option>
						<?php if ( class_exists( 'OPER_Page_ContactsXLS' ) ) { ?>
							<option value="xls"><?php _e( 'XLS', 'email-reminders' ); ?></option>
						<?php } ?>
					</select>
					<?php
				oper_flex_toolbar_group_end();

			oper_flex_toolbar_sub_html_container_end( 'settings-contact-listing' );                                        // Load functionality in Addons via Hooks


			oper_flex_toolbar_sub_html_container_start( 'settings-contact-actions' );                                      	// Load functionality in Addons via Hooks
												// Elements at Several or One Line
				oper_flex_toolbar_group_start( /* array( 'class' => 'group_nowrap' ) */ );

				?>
				<a href="javascript:void(0)" class="button button-secondary oper_reminders_delete"
				   onclick="javascript:oper_contacts_selected_delete();"
				   title="<?php _e( 'Delete Selected Contact(s)', 'email-reminders' ); ?>" >
					<span class="in-button-text"><?php _e( 'Delete', 'email-reminders' ); ?>&nbsp;</span>
					<span class="wpdevelop"><i class="glyphicon glyphicon-trash"></i></span>
				</a>
				<?php

				do_action( 'oper_contacts_listing_container_start' );		// For addon  functionality

				oper_flex_toolbar_group_end();

			oper_flex_toolbar_sub_html_container_end( 'settings-contact-actions' );                                        	// Load functionality in Addons via Hooks


		}


		// TODO: create some help  text  here
		private function show_help_section(){

			if ( ! oper_section_is_dismissed( 'oper-panel-help-wizard' ) ) {
				return;
			}

			$notice_id = 'oper_contacts_help_section';
			if ( ! oper_section_is_dismissed( $notice_id ) ) {

				?><div  id="<?php echo $notice_id; ?>"
						class="oper_system_notice oper_is_dismissible oper_is_hideable notice-info oper_internal_notice"
						data-nonce="<?php echo wp_create_nonce( $nonce_name = $notice_id . '_opernonce' ); ?>"
						data-user-id="<?php echo get_current_user_id(); ?>"
					><?php

				oper_x_dismiss_button();

				$field_options = array();
				$field_options[] = '<div class="oper-help-container">';

				$field_options[] = '<h3 style="margin:0;">' . __( 'How to create the contact?', 'email-reminders' ) . '</h3>';
				$field_options[] = '1. ' . sprintf( __( 'Click on %s"Add New Contact"%s button.', 'email-reminders' ), '<strong>', '</strong>' );
				$field_options[] = '2. ' . sprintf( __( 'Select email template, that you want to use for sending as reminder. You can create and configure email template(s) at %semails settings%s page.', 'email-reminders' )
													, '<strong><a href="' . esc_url( oper_get_settings_url() ) . '&tab=email">', '</a></strong>'
													, '<strong>', '</strong>'
													);
				$field_options[] = '3. ' . sprintf( __( 'Configure one or several conditions. %sNote%s. If your condition for the date field, then you can use configuration that possible to use in %sstrtotime%s function. For example: %sTODAY - 6 MONTHS - 1 DAY%s ', 'email-reminders' )
											, '<strong>', '</strong>'
											, '<strong><a href="https://www.php.net/manual/en/datetime.formats.relative.php" target="_blank">', '</a></strong>'
											, '<code>', '</code>'
											);
				$field_options[] = '4. ' . sprintf( __( 'Click on Create Contact button.', 'email-reminders' ) );

				$field_options[] = '<h3 style="margin:0;">' . __( 'How to run contact manually?', 'email-reminders' ) . '</h3>';
				$field_options[] = '1. ' . sprintf( __( 'Click on %s"Run"%s button to execute specific contact.', 'email-reminders' ), '<strong>', '</strong>' );
				$field_options[] = '2. ' . sprintf( __( 'System will run contact and create %semail reminders%s from %scontacts%s based on conditions of current contact.', 'email-reminders' )
											, '<strong><a href="' . esc_url( oper_get_reminders_url() ) . '">', '</a></strong>'
											, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '">', '</a></strong>'
											, '<strong>', '</strong>'
										);

				$field_options[] = '<div class="oper-help-columns">';
				$field_options[] = '	<div class="oper-help-col">';
				$field_options[] = '		<h3 class="oper-header-h"">' . __( 'How to set up automatic creation of reminders?', 'email-reminders' ) . '</h3>';
				$field_options[] = '		1. ' . sprintf( __( 'Insert into the page %sshortcode%s for creation of reminders for specific contact.', 'email-reminders' )
												, '<strong><a href="https://oplugins.com/faq/email-reminders-how-to-set-up-run-rule-automatically-to-create-reminders/">', '</a></strong>' );
				$field_options[] = '		2. ' . sprintf( __( 'When someone visit this page, shortcode will run Contact and Reminder(s) will be created.', 'email-reminders' )
												, '<strong>', '</strong>' );
				$field_options[] = '	</div>';
				$field_options[] = '	<div class="oper-help-col">';
				$field_options[] = '		<h3 class="oper-header-h oper-header-h-premium">' . __( 'Advanced automatic creation of reminders in premium versions.', 'email-reminders' ) . '</h3>';
				$field_options[] = '		1. ' . sprintf( __( 'Configure %sCRON script%s at your server for creation of reminders periodically in automatic mode. ', 'email-reminders' )
												, '<strong><a href="https://oplugins.com/plugins/email-reminders-automate/">', '</a></strong>' );
				$field_options[] = '		2. ' . sprintf( __( 'Its can be useful, for every day automatic creation of email reminders, that different from today date on X days, relative to specific field. For example, its can be friendly notification of upcoming in 1 day booking, or follow-up email after event.', 'email-reminders' )
												, '<strong><a href="https://oplugins.com/plugins/email-reminders-automate/">', '</a></strong>' );
				$field_options[] = '	</div>';
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
			<div class="oper_contacts_pagination"></div>
			<?php
			$oper_pagination = new OPER_Pagination();
			$oper_pagination->init( array(
											'load_on_page'  => 'oper-contacts',
											'container'     => '.oper_contacts_pagination',
											'on_click'	    => 'oper_contacts_pagination_click'		// onclick = "javascript: oper_contacts_pagination_click( page_num );"  - need to  define this function in JS file
			));

			/**
			$oper_pagination->show( array(												        	// Its showing with  JavaScript on document ready
											'page_active' => 3,
											'pages_count' => 20
			));
			 */
		}


		private function show_contacts_listing_container_ajax() {

			?>
			<div class="oper_listing_container oper_selectable_table oper_contacts_listing_container"></div>
			<?php

			$my_contacts_listing = new OPER_Contacts;

			/**
              array( 'page_num' 			=> 1
				   , 'page_items_count' 	=> 100
				   , 'sort' 				=> 'contacts_id'
				   , 'sort_type' 			=> 'DESC'
				   , 'keyword' 			    => ''
				   , 'status' 				=> ''
				   , 'ru_create_date'			=> ''
			       )
			 */
 		    $escaped_request_params = $my_contacts_listing->clean_request_parameters();		 // Such Empty getting, can  get  parameters from  $_GET['page_num']=2, ....

			/**
			 * $escaped_request_params = $my_contacts_listing->clean_request_parameters( array(   'request_prefix' => 'search_params'   ) ); // ->  $_REQUEST[ 'search_params' ][ 'page_num' ]=2
																																		  //  if $_REQUEST[ 'search_params' ] not set, then
																																		  //     get "default" from  OPER_Contacts::clean_request_parameters(
		    */

			/**
			// 1. Direct Clean Params

			$request_params_contacts  = array(
									  'page_num'          => array( 'validate' => 'd', 					'default' => 1 )
									, 'page_items_count'  => array( 'validate' => 'd', 					'default' => 10 )
									, 'sort'              => array( 'validate' => array( 'contacts_id' ),	'default' => 'contacts_id' )
									, 'sort_type'         => array( 'validate' => array( 'ASC', 'DESC'),'default' => 'DESC' )
									, 'status'            => array( 'validate' => 's', 					'default' => '' )
									, 'keyword'           => array( 'validate' => 's', 					'default' => '' )
									, 'ru_create_date'       => array( 'validate' => 'date', 				'default' => '' )
			);
			$request_params_values = array(                                                                             // Usually 		$request_params_values 	is  $_REQUEST
									'page_num'         => 1,
									'page_items_count' => 3,
									'sort'             => 'contacts_id',
									'sort_type'        => 'DESC',
									'status'           => '',
									'keyword'          => '',
									'ru_create_date'	   => ''
							);
			$request_params = oper_get_clean_params_in_arr( $request_params_values, $request_params_contacts );
			 */

			?>
			<script type="text/javascript">
				jQuery( document ).ready( function (){

					// Set Security - Nonce for Ajax  - Listing
					oper_contacts_listing.set_secure_param( 'nonce',   '<?php echo wp_create_nonce( 'oper_contacts_listing_ajx' . '_opernonce' ) ?>' );
					oper_contacts_listing.set_secure_param( 'user_id', '<?php echo get_current_user_id(); ?>' );
					oper_contacts_listing.set_secure_param( 'locale',  '<?php echo get_user_locale(); ?>' );

					// Set other parameters
					oper_contacts_listing.set_other_param( 'listing_container',    '.oper_contacts_listing_container' );
					oper_contacts_listing.set_other_param( 'pagination_container', '.oper_contacts_pagination' );

					// Send Ajax request and show listing after this.
					oper_contacts_send_search_request_with_params( <?php echo wp_json_encode( $escaped_request_params ); ?> );
				} );
			</script>
			<?php
		}


		private function show_contacts_listing_container_directly(){


    		//TODO: We need to  send Ajax request  and then  show the listing (its will make one same way  of showing listing and pagination)!


			$my_contacts = new OPER_Contacts;

			////////////////////////////////////
			// 0. Check Nonce if Ajax ( ! used now )
			////////////////////////////////////
			if ( 0 ){
				$action_name    = 'oper_search_field' . '_opernonce';                                                           //   $_POST['element_id'] . '_opernonce';
				$nonce_post_key = 'nonce';
				$result_check   = check_ajax_referer( $action_name, $nonce_post_key );
			}

			////////////////////////////////////
			// 1. Direct Clean Params
			////////////////////////////////////
			$request_params_contacts  = array(
									  'page_num'          => array( 'validate' => 'd', 					'default' => 1 )
									, 'page_items_count'  => array( 'validate' => 'd', 					'default' => 10 )
									, 'sort'              => array( 'validate' => array( 'contacts_id' ),	'default' => 'contacts_id' )
									, 'sort_type'         => array( 'validate' => array( 'ASC', 'DESC'),'default' => 'DESC' )
									, 'status'            => array( 'validate' => 's', 					'default' => '' )
									, 'keyword'           => array( 'validate' => 's', 					'default' => '' )
									, 'ru_create_date'       => array( 'validate' => 'date', 				'default' => '' )
			);
			$request_params_values = array(                                                                             // Usually 		$request_params_values 	is  $_REQUEST
									'page_num'         => 1,
									'page_items_count' => 3,
									'sort'             => 'contacts_id',
									'sort_type'        => 'DESC',
									'status'           => '',
									'keyword'          => '',
									'ru_create_date'	   => ''
							);
			$request_params = oper_get_clean_params_in_arr( $request_params_values, $request_params_contacts );

			////////////////////////////////////
			// 2. Get items array from DB
			////////////////////////////////////
			$items_arr = $my_contacts->list__get_data_arr( $request_params );


			// Show Pagination          -       $total_num_of_items_in_all_pages = $sql_res[ [ 'count' ] ];
//			$oper_pagination->show_pagination(
//												$request_params_values['page_num'],
//												ceil( $sql_res[ [ 'count' ] ] / $request_params_values['page_items_count'] )
//								);

		}

}
add_action('oper_menu_created', array( new OPER_Page_Contacts() , '__construct') );    // Executed after creation of Menu