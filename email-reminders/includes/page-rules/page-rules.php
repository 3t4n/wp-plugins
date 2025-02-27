<?php
/*
* @package: Rules Page
* @category: o Email Reminders
* @description: Define Rules in admin settings page. - Sending friendly email reminders based on custom rules.
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
class OPER_Page_Rules extends OPER_Page_Structure {


    public function in_page() {
        return 'oper-rules';
    }


    public function tabs() {

        $tabs = array();
        $tabs[ 'rules' ] = array(
                              'title'		=> __( 'Rules', 'email-reminders' )						// Title of TAB
                            , 'hint'		=> __( 'Rules of reminders', 'email-reminders' )						// Hint
                            , 'page_title'	=> __( 'Rules of reminders', 'email-reminders' )			// Title of Page
                            , 'link'		=> ''								// Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            , 'position'	=> ''                               // 'left'  ||  'right'  ||  ''
                            , 'css_classes' => ''                               // CSS class(es)
                            , 'icon'		=> ''                               // Icon - link to the real PNG img
                            , 'font_icon'	=> 'glyphicon glyphicon-random'			// CSS definition  of forn Icon
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
        $submit_form_name = 'oper_rules_form';                             // Define form name

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


// Show date in WP timezone format
//debuge( get_date_from_gmt( date( 'Y-m-d H:i:s', strtotime( 'NOW' )  ), 'Y-m-d H:i:s' ) );

				oper_rules_modify_container_show();

				$this->show_rules_listing_container_ajax();

				$this->show_pagination_container();

				// $this->show_rules_listing_container();

				?><div class="clear"></div><?php

		  ?></form>
        </span>
        <?php

		oper_show_oper_footer();			// Rating

        do_action( 'oper_hook_settings_page_footer', 'oper-rules' );
    }


		private function show_toolbar(){

			oper_flex_toolbar_sub_html_container_start( 'settings-rules' );                                      	// Load functionality in Addons via Hooks
												// Elements at Several or One Line
				oper_flex_toolbar_group_start( /* array( 'class' => 'group_nowrap' ) */ );

				?>
				<a href="javascript:void(0)" class="button button-primary oper_rules_add_new"
				   onclick="javascript:oper_rules__modify__show();"
				   title="<?php _e( 'Add New Rule', 'email-reminders' ); ?>" >
					<span class="in-button-text"><?php _e( 'Add New Rule', 'email-reminders' ); ?>&nbsp;</span>
					<span class="wpdevelop"><i class="glyphicon glyphicon glyphicon-plus"></i></span>
				</a>
				<?php

				oper_flex_toolbar_group_end();

			oper_flex_toolbar_sub_html_container_end( 'settings-contact-form' );                                        	// Load functionality in Addons via Hooks
		}


		private function show_help_section(){

			if ( ! oper_section_is_dismissed( 'oper-panel-help-wizard' ) ) {
				return;
			}

			$notice_id = 'oper_rules_help_section';
			if ( ! oper_section_is_dismissed( $notice_id ) ) {

				?><div  id="<?php echo $notice_id; ?>"
						class="oper_system_notice oper_is_dismissible oper_is_hideable notice-info oper_internal_notice"
						data-nonce="<?php echo wp_create_nonce( $nonce_name = $notice_id . '_opernonce' ); ?>"
						data-user-id="<?php echo get_current_user_id(); ?>"
					><?php

				oper_x_dismiss_button();

				$field_options = array();
				$field_options[] = '<div class="oper-help-container">';

				$field_options[] = '<h3 style="margin:0;">' . __( 'How to create the rule?', 'email-reminders' ) . '</h3>';
				$field_options[] = '1. ' . sprintf( __( 'Click on %s"Add New Rule"%s button.', 'email-reminders' ), '<strong>', '</strong>' );
				$field_options[] = '2. ' . sprintf( __( 'Select email template, that you want to use for sending as reminder. You can create and configure email template(s) at %semails settings%s page.', 'email-reminders' )
													, '<strong><a href="' . esc_url( oper_get_settings_url() ) . '&tab=email">', '</a></strong>'
													, '<strong>', '</strong>'
													);
				$field_options[] = '3. ' . sprintf( __( 'Configure one or several conditions. %sNote%s. If your condition for the date field, then you can use configuration that possible to use in %sstrtotime%s function. For example: %sTODAY - 6 MONTHS - 1 DAY%s ', 'email-reminders' )
											, '<strong>', '</strong>'
											, '<strong><a href="https://www.php.net/manual/en/datetime.formats.relative.php" target="_blank">', '</a></strong>'
											, '<code>', '</code>'
											);
				$field_options[] = '4. ' . sprintf( __( 'Click on Create Rule button.', 'email-reminders' ) );

				$field_options[] = '<h3 style="margin:0;">' . __( 'How to run rule manually?', 'email-reminders' ) . '</h3>';
				$field_options[] = '1. ' . sprintf( __( 'Click on %s"Run"%s button to execute specific rule.', 'email-reminders' ), '<strong>', '</strong>' );
				$field_options[] = '2. ' . sprintf( __( 'System will run rule and create %semail reminders%s from %scontacts%s based on conditions of current rule.', 'email-reminders' )
											, '<strong><a href="' . esc_url( oper_get_reminders_url() ) . '">', '</a></strong>'
											, '<strong><a href="' . esc_url( oper_get_contacts_url() ) . '">', '</a></strong>'
											, '<strong>', '</strong>'
										);

				$field_options[] = '<div class="oper-help-columns">';
				$field_options[] = '	<div class="oper-help-col">';
				$field_options[] = '		<h3 class="oper-header-h"">' . __( 'How to set up run rule automatically to create reminders?', 'email-reminders' ) . '</h3>';
				$field_options[] = '		1. ' . sprintf( __( 'Insert into the page %sshortcode%s for creation of reminders for specific rule.', 'email-reminders' )
												, '<strong><a href="https://oplugins.com/faq/email-reminders-how-to-set-up-run-rule-automatically-to-create-reminders/">', '</a></strong>' );
				$field_options[] = '		2. ' . sprintf( __( 'When someone visit this page, shortcode will run Rule and Reminder(s) will be created.', 'email-reminders' )
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
			<div class="oper_rules_pagination"></div>
			<?php
			$oper_pagination = new OPER_Pagination();
			$oper_pagination->init( array(
											'load_on_page'  => 'oper-rules',
											'container'     => '.oper_rules_pagination',
											'on_click'	    => 'oper_rules_pagination_click'		// onclick = "javascript: oper_rules_pagination_click( page_num );"  - need to  define this function in JS file
			));
//			$oper_pagination->show( array(												        	// Its showing with  JavaScript on document ready
//											'page_active' => 3,
//											'pages_count' => 20
//			));
		}


		private function show_rules_listing_container_ajax() {

			?>
			<div class="oper_listing_container oper_selectable_table oper_rules_listing_container"></div>
			<?php

			$my_rules_listing = new OPER_Rules;

			/**
              array( 'page_num' 			=> 1
				   , 'page_items_count' 	=> 100
				   , 'sort' 				=> 'rules_id'
				   , 'sort_type' 			=> 'DESC'
				   , 'keyword' 			    => ''
				   , 'status' 				=> ''
				   , 'ru_create_date'			=> ''
			       )
			 */
 		    $escaped_request_params = $my_rules_listing->clean_request_parameters();		 // Such Empty getting, can  get  parameters from  $_GET['page_num']=2, ....

			/**
			 * $escaped_request_params = $my_rules_listing->clean_request_parameters( array(   'request_prefix' => 'search_params'   ) ); // ->  $_REQUEST[ 'search_params' ][ 'page_num' ]=2
																																		  //  if $_REQUEST[ 'search_params' ] not set, then
																																		  //     get "default" from  OPER_Rules::clean_request_parameters(
		    */

			/**
			// 1. Direct Clean Params

			$request_params_rules  = array(
									  'page_num'          => array( 'validate' => 'd', 					'default' => 1 )
									, 'page_items_count'  => array( 'validate' => 'd', 					'default' => 10 )
									, 'sort'              => array( 'validate' => array( 'rules_id' ),	'default' => 'rules_id' )
									, 'sort_type'         => array( 'validate' => array( 'ASC', 'DESC'),'default' => 'DESC' )
									, 'status'            => array( 'validate' => 's', 					'default' => '' )
									, 'keyword'           => array( 'validate' => 's', 					'default' => '' )
									, 'ru_create_date'       => array( 'validate' => 'date', 				'default' => '' )
			);
			$request_params_values = array(                                                                             // Usually 		$request_params_values 	is  $_REQUEST
									'page_num'         => 1,
									'page_items_count' => 3,
									'sort'             => 'rules_id',
									'sort_type'        => 'DESC',
									'status'           => '',
									'keyword'          => '',
									'ru_create_date'	   => ''
							);
			$request_params = oper_get_clean_params_in_arr( $request_params_values, $request_params_rules );
			 */

			?>
			<script type="text/javascript">
				jQuery( document ).ready( function (){

					// Set Security - Nonce for Ajax  - Listing
					oper_rules_listing.set_secure_param( 'nonce',   '<?php echo wp_create_nonce( 'oper_rules_listing_ajx' . '_opernonce' ) ?>' );
					oper_rules_listing.set_secure_param( 'user_id', '<?php echo get_current_user_id(); ?>' );
					oper_rules_listing.set_secure_param( 'locale',  '<?php echo get_user_locale(); ?>' );

					// Set other parameters
					oper_rules_listing.set_other_param( 'listing_container',    '.oper_rules_listing_container' );
					oper_rules_listing.set_other_param( 'pagination_container', '.oper_rules_pagination' );

					// Send Ajax request and show listing after this.
					oper_rules_send_search_request_with_params( <?php echo wp_json_encode( $escaped_request_params ); ?> );
				} );
			</script>
			<?php
		}


		private function show_rules_listing_container(){


    		//TODO: We need to  send Ajax request  and then  show the listing (its will make one same way  of showing listing and pagination)!


			$my_rules = new OPER_Rules;

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
			$request_params_rules  = array(
									  'page_num'          => array( 'validate' => 'd', 					'default' => 1 )
									, 'page_items_count'  => array( 'validate' => 'd', 					'default' => 10 )
									, 'sort'              => array( 'validate' => array( 'rules_id' ),	'default' => 'rules_id' )
									, 'sort_type'         => array( 'validate' => array( 'ASC', 'DESC'),'default' => 'DESC' )
									, 'status'            => array( 'validate' => 's', 					'default' => '' )
									, 'keyword'           => array( 'validate' => 's', 					'default' => '' )
									, 'ru_create_date'       => array( 'validate' => 'date', 				'default' => '' )
			);
			$request_params_values = array(                                                                             // Usually 		$request_params_values 	is  $_REQUEST
									'page_num'         => 1,
									'page_items_count' => 3,
									'sort'             => 'rules_id',
									'sort_type'        => 'DESC',
									'status'           => '',
									'keyword'          => '',
									'ru_create_date'	   => ''
							);
			$request_params = oper_get_clean_params_in_arr( $request_params_values, $request_params_rules );

			////////////////////////////////////
			// 2. Get items array from DB
			////////////////////////////////////
			$items_arr = $my_rules->list__get_data_arr( $request_params );


			// Show Pagination          -       $total_num_of_items_in_all_pages = $sql_res[ [ 'count' ] ];
//			$oper_pagination->show_pagination(
//												$request_params_values['page_num'],
//												ceil( $sql_res[ [ 'count' ] ] / $request_params_values['page_items_count'] )
//								);

		}
}
add_action('oper_menu_created', array( new OPER_Page_Rules() , '__construct') );    // Executed after creation of Menu