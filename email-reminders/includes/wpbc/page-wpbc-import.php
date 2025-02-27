<?php /**
 * @version 1.0
 * @package Email Reminders
 * @category Content page - Import bookings from  "Booking Calendar" into  "Contacts" for "Email Reminders" plugin
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-05-04
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/** Show Content
 *  Update Content
 *  Define Slug
 *  Define where to show
 */
class OPER_Page_ContactsWPBC extends OPER_Page_Structure {

    public function in_page() {
        return 'oper-contacts';
    }

    public function tabs() {

        $tabs = array();
        $tabs[ 'contacts-wpbc' ] = array(
                              'title'		=> __( 'Booking Calendar Import', 'email-reminders' )						// Title of TAB
                            , 'hint'		=> __( 'Import bookings from Booking Calendar', 'email-reminders' )						// Hint
                            , 'page_title'	=> __( 'Import bookings from Booking Calendar', 'email-reminders' )			// Title of Page
                            , 'link'		=> ''								// Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            , 'position'	=> ''                               // 'left'  ||  'right'  ||  ''
                            , 'css_classes' => ''                               // CSS class(es)
                            , 'icon'		=> ''                               // Icon - link to the real PNG img
                            , 'font_icon'	=> 'glyphicon glyphicon-calendar'			// CSS definition  of forn Icon
                            , 'default'		=> false								// Is this tab activated by default or not: true || false.
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

        // $this->settings_api();																						// Init Settings API & Get Data from DB

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Update
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $submit_form_name = 'oper_send_links_form';                             // Define form name

		$data_after_update = false;
        if ( isset( $_POST['is_form_sbmitted_'. $submit_form_name ] ) ) {

            // Nonce checking    {Return false if invalid, 1 if generated between, 0-12 hours ago, 2 if generated between 12-24 hours ago. }
            $nonce_gen_time = check_admin_referer( 'oper_settings_page_' . $submit_form_name  );  // Its stop show anything on submiting, if its not refear to the original page

            // Save Changes
            $data_after_update = $this->update();
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Content
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 		?><form  name="<?php echo $submit_form_name; ?>" id="<?php echo $submit_form_name; ?>" action="" method="post" ><?php

        ////////////////////////////////////////////////////////////////////////
        // Toolbar
		////////////////////////////////////////////////////////////////////////
	    if ( 0 ) {
			oper_bs_toolbar_sub_html_container_start();

			?><span class="wpdevelop"><div class="visibility_container clearfix-height" style="display:block;padding:0.25em 0;" ><?php

				?><span class="oper_wpbc_toolbar_message"><?php
					_e('Import bookings from Booking Calendar', 'email-reminders');
				?></span><?php

			?></div></span><?php

			oper_bs_toolbar_sub_html_container_end();
		}
        // $oper_user_role_master   = get_oper_option( 'oper_user_role_master' );										// O L D   W A Y:   Get Fields Data

        ?><span class="wpdevelop"><?php

			oper_js_for_items_page();				//		JavaScript:		-	Tooltips, Popover, Datepick (js & css)

			// oper_items_toolbar();				//		T o o l b a r s	-	BS UI CSS Class

        ?></span><?php
        ?><div class="clear" style="height:0px;"></div><?php


        // Content  ////////////////////////////////////////////////////////////
        ?>
        <div class="clear" style="margin-bottom:10px;"></div>
        <span class="metabox-holder">
<!--            <form  name="--><?php //echo $submit_form_name; ?><!--" id="--><?php //echo $submit_form_name; ?><!--" action="" method="post" >-->
                <?php
                   // N o n c e   field, and key for checking   S u b m i t
                   wp_nonce_field( 'oper_settings_page_' . $submit_form_name );
                ?><input type="hidden" name="is_form_sbmitted_<?php echo $submit_form_name; ?>" id="is_form_sbmitted_<?php echo $submit_form_name; ?>" value="1" />

                <div class="clear" style="margin-bottom:0px;"></div>

				<input type="hidden" value='' name='oper_action'  id='oper_action' />

				<?php

				if ( empty( oper_get_wpbc_version() ) ) {

					oper_no_booking_calendar_ui();

				} else {

                	?><div class="oper_settings_row oper_settings_row_left" ><?php
						oper_wpbc_import_ui();
					?></div>
                	  <div class="oper_settings_row oper_settings_row_right"><?php

						oper_wpbc_auto_import_ui();

					?></div><?php
				}

		if ( 0 ) {
                        if (
								( empty( $data_after_update ) )
							||  ( ! empty( $data_after_update['wpbc_file_content'] ) )
						) { ?>

						<?php oper_open_meta_box_section( 'oper_wpbc_content', __('WPBC', 'email-reminders') );  ?>
						<span class="wpdevelop">
							<table class="form-table">
								<tbody>
								<?php


									$default_wpbc_separator_columns = get_oper_option( 'oper_default_wpbc_separator_columns' );
									if ( empty( $default_wpbc_separator_columns )) {
										$default_wpbc_separator_columns = ';';
									}
									if (
										    ( ! empty( $updated_data ) )
										 && ( ! empty( $updated_data['validated_data']['separator'] ) )
									) {
										update_oper_option( 'oper_default_wpbc_separator_columns' , $updated_data['validated_data']['separator'] );
									}


									$field = array(
													  'title' 		=> __('Enter WPBC separator ', 'email-reminders')
													, 'type' 		=> 'text'
													, 'value' 		=> ( ! empty( $updated_data ) ) ?  $updated_data[ 'validated_data' ]['separator'] : $default_wpbc_separator_columns
													, 'class' 		=> 'wpbc_separator_text_field'
													, 'css' 		=> ''
													, 'placeholder' => ''
													, 'description' => ''
													, 'disabled' 	=> false
													, 'only_field' 	=> false
									);
									OPER_Settings_API::field_text_row_static( 'oper_wpbc_separator_columns', $field );


								?>
									<tr class="oper_tr_oper_products_wpbc_text " valign="top">
										<td scope="row" colspan="2">
											<span class='wpdevelop' style="margin-right:15px;">
												<input type="hidden" name="oper_url_to_wpbc_file" class="oper_url_to_wpbc_file" id="oper_url_to_wpbc_file" value="1" />
												<a class="button button-secondary oper_btn_upload"
												   style="font-weight: 600;"
												   <?php echo 'data-' . esc_attr( 'modal_title' )	. '="' . esc_attr( __( 'Choose files', 'email-reminders' ) ) . '" '; ?>
												   <?php echo 'data-' . esc_attr( 'btn_title' )		. '="' . esc_attr( __( 'Select WPBC file', 'email-reminders' ) ) . '" '; ?>
												   href="javascript:void(0)"  title="<?php _e('Upload WPBC file' , 'email-reminders') ?>"
												   ><span style="oper_text_hide_mobile0"><?php echo __('Upload WPBC file' , 'email-reminders'); ?>&nbsp;&nbsp;</span><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
											</span>
											<?php
											// Get OPER_Upload obj. instance
											$oper_upload = oper_upload();

											$oper_upload->set_upload_button( '.oper_btn_upload' );

											$oper_upload->set_element_insert_url( '.oper_url_to_wpbc_file' );
											?>
										</td>
									</tr>
									<tr class="oper_tr_oper_products_wpbc_text " valign="top">
										<td scope="row" colspan="2">
											<strong><?php _e( 'OR', 'email-reminders' ) ?></strong>
										</td>
									</tr>
									<tr class="oper_tr_oper_products_wpbc_text " valign="top">
										<td scope="row" colspan="2">
											<?php

											$field_name = 'oper_products_wpbc_text';
											$field_value = get_oper_option('oper_history_validated_wpbc' );


											/////////////////////////////////////////////////////////////////////////////
											// Exception if we was forwarding from XLS to WPBC import	:				/includes/admin/page-paste-xls.php
											/////////////////////////////////////////////////////////////////////////////
											$force_xls2wpbc_import = get_oper_option( 'oper_force_xls2wpbc_import' );
											if ( ! empty( $force_xls2wpbc_import ) ) {

												$field_value = $force_xls2wpbc_import;
												update_oper_option( 'oper_force_xls2wpbc_import', '' );					// Reset Force  XLS to WPBC import
												// Submit parsing
												?>
												<script type="text/javascript">
													jQuery(document).ready(function(){
														jQuery('#oper_action').val('wpbc_parse');
														jQuery('#oper_send_links_form').trigger( 'submit' );
													});
												</script>
												<?php
											}
											/////////////////////////////////////////////////////////////////////////////


											$place_holder = str_replace( '|', get_oper_option( 'oper_wpbc_separator' ), __( 'Paste your WPBC content here...', 'email-reminders' ) );

											?><textarea rows="8" cols="20" class="input-text wide-input" autocomplete="off"
							  							id="<?php echo $field_name; ?>"  name="<?php echo $field_name; ?>"
                               							placeholder="<?php echo $place_holder; ?>"

                        					><?php
												echo ( isset( $data_after_update['wpbc_file_content'] ) && ( strlen( $data_after_update['wpbc_file_content'] ) > 0 ) ) ?  $data_after_update['wpbc_file_content'] : $field_value;
											?></textarea><?php

											$field = array(
															  'title' => ''
															, 'description' => ''
															, 'type' => 'textarea'
															, 'value' =>  ( isset( $data_after_update['wpbc_file_content'] ) && ( strlen( $data_after_update['wpbc_file_content'] ) > 0 ) ) ?  $data_after_update['wpbc_file_content'] : $field_value
															, 'class' => ''
															, 'css' => ''
															, 'placeholder' => $place_holder
															, 'disabled' => false
															, 'rows' => 8
															, 'show_in_2_cols' => true
															, 'only_field' => true
														);
											//OPER_Settings_API::field_textarea_row_static( $field_name, $field );
	
											?>
										</td>
									</tr>
									<tr class="oper_tr_oper_products_wpbc_text " valign="top">
										<td scope="row" colspan="2" style="font-style: italic;">
										<?php
											echo __( 'Paste here your WPBC content to start import.', 'email-reminders' ) . '<br/>';
										?>
										</td>
									</tr>
								</tbody>
							</table>

							<hr/>

							<a class="button button-primary oper_wpbc_import_button"
							   href="javascript:void(0)"  title="<?php _e('Start Import WPBC file' , 'email-reminders') ?>"
							><span class="oper_text_hide_mobile"><?php _e('Start Import' , 'email-reminders')
							?>&nbsp;&nbsp;</span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>

						</span>
						<?php oper_close_meta_box_section();


				} else if ( 	( ! empty( $data_after_update['parsed_data'] ) )
							 && ( ! empty( $data_after_update['parsed_data']['arr'] ) )
				          ) {


 						/////////////////////////////////////////////////////////////////
						// This is means that we was parsed WPBC and returned ARR  --  Showing WPBC HTML table
						/////////////////////////////////////////////////////////////////
						ob_start();

							oper_show_table_for_list_arr( $data_after_update['parsed_data']['arr'] );

						$wpbc_html_table = ob_get_contents();
						ob_end_clean();


						oper_open_meta_box_section(  'oper_parced_wpbc_actions', __('Actions', 'email-reminders') );

							?><a class="button button-primary oper_wpbc2list_button" style="margin:0 0 5px;" href="javascript:void(0)"
							   title="<?php _e('Save to DB', 'email-reminders') ?>"
								 ><?php _e('Save to DB' , 'email-reminders') ?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-export" aria-hidden="true"></span></a><?php

 						oper_close_meta_box_section();

						?><div class="html_table_for_parsed_wpbc" style="display:block;"><?php
							echo $wpbc_html_table;
						?></div><?php

						?><div class="textarea_for_parsed_wpbc" style="display:none;"><?php
							$field_name = 'oper_products_wpbc_text';
							$field_value = get_oper_option('oper_history_validated_wpbc' );
							//$field_value = json_encode( $field_value );										// array('a' => 1, 'b' => 2 ... ) => {"a":1,"b":2 ...}

							$place_holder = str_replace( '|', get_oper_option( 'oper_wpbc_separator' ), __( 'ID | Title | Version Number | Desciption | Path (URL)', 'email-reminders' ) );
							$field = array(
											  'title' => ''
											, 'description' => ''
											, 'type' => 'textarea'
											, 'value' => empty( $updated_data ) ? $field_value : $updated_data[ 'validated_data' ]['wpbc']
											, 'class' => ''
											, 'css' => 'width:100%;'
											, 'placeholder' => $place_holder
											, 'disabled' => false
											, 'rows' => 8
											, 'show_in_2_cols' => true
											, 'only_field' => true
										);
							OPER_Settings_API::field_textarea_row_static( $field_name, $field );
						?></div><?php
						/////////////////////////////////////////////////////////////////
				} else if ( 	( ! empty( $data_after_update['wpbc2arr'] ) )
							 && ( ! empty( $data_after_update['wpbc2arr']['arr'] ) )
				          ) {


					// Handy  save form fields names history
					if ( ! empty( $data_after_update['wpbc2arr']['arr'] ) ) {

						//$my_wpbc = new OPER_WPBC_Parser();

						$first_item = $data_after_update['wpbc2arr']['arr'][0];
						$first_item_keys = array_keys( $first_item );

						$last_imported_fields = array();
						foreach ( $first_item_keys as $field_name ) {
							$last_imported_fields[ $field_name ] = array( 'type' => 'text' );
						}
						//$first_row_wpbc = implode( $my_wpbc->get_column_separator(), $first_item_keys );

						update_oper_option(  'oper_history_wpbc_last_import_headers', $last_imported_fields );
//debuge( '$first_item, $first_item_keys, $first_row_wpbc', $first_item, $first_item_keys, $first_row_wpbc );
//debuge( get_oper_option('oper_history_wpbc_last_import_headers') );
					}

					// Saving to Database
					$inserted_rows_num = oper_wpbc_arr__save_in_db( $data_after_update['wpbc2arr']['arr'] );

					$notice_id = 'oper_wpbc_data_db_saved_message_section';
					//if ( ! oper_section_is_dismissed( $notice_id ) ) {

						?><div  id="<?php echo $notice_id; ?>"
								class="oper_system_notice oper_is_dismissible oper_is_hideable notice-info oper_internal_notice"
								data-nonce="<?php echo wp_create_nonce( $nonce_name = $notice_id . '_opernonce' ); ?>"
								data-user-id="<?php echo get_current_user_id(); ?>"
							><?php

						//oper_x_dismiss_button();

						$field_options = array();
						$field_options[] = '<span style="font-weight: 600;font-size: 1.3em;font-style: normal;">' . sprintf( __( 'Added %d rows to the database', 'email-reminders' ), $inserted_rows_num ) . '</span>';
//						$field_options[] = '1. ' . sprintf( __( 'Click on %s"Add New"%s button and upload your files', 'email-reminders' ), '<strong>', '</strong>' );

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
						?></div><?php
					//}

						$data_source = '';
						if ( isset( $_GET['from_source'] ) ) {
							$data_source = wp_kses_post( trim( stripslashes( $_GET['from_source'] ) ) );
						}
						if ( 'xls' == $data_source ) {
							// Redirect  to contacts
							?>
							<script type="text/javascript">
								setTimeout( function (){
									// Reload page
									window.location.href = '<?php echo admin_url( 'admin.php' ) . '?page=oper-contacts&tab=contacts'; ?>';
								}, 3000 );
							</script>
							<?php
						}
				}
        }
				?>

                <div class="clear"></div>
				<?php  /* ?>
                <input type="button" value="<?php _e('Send', 'email-reminders'); ?>" class="button button-primary oper_send_button" />
                <input type="submit" value="<?php _e('Submit', 'email-reminders'); ?>" class="button button-primary oper_submit_button" />
                <?php /**/ ?>
<!--            </form>-->
            <?php

            ?>
        </span>
		</form>
		<?php

		oper_show_oper_footer();			// Rating

        $this->js();
        $this->css();

        do_action( 'oper_hook_settings_page_footer', 'send_links' );
    }


    public function update() {

        $post_action_key = 'oper_action';


        if (  isset( $_POST[ $post_action_key ] )  && ( $_POST[ $post_action_key ] == 'wpbc_import' )  ) {

        	/////////////////////////////////////////////////////////////////
        	// Validate POST
			//$validated_wpbc 	  = OPER_Settings_API::validate_textarea_post_static( 'oper_products_wpbc_text' );
            $csv_separator = OPER_Settings_API::validate_text_post_static( 'oper_wpbc_separator_columns' );

            /////////////////////////////////////////////////////////////////

			oper_import_bookings_as_csv( $csv_separator );

			// oper_show_fixed_message ( __('Done', 'email-reminders'), 3  );			//, 'updated warning' );                // Show Message
            return array (   'csv_separator' => $csv_separator  );
        }

        if (  isset( $_POST[ $post_action_key ] )  && ( $_POST[ $post_action_key ] == 'auto_import' )  ) {

        	/////////////////////////////////////////////////////////////////
        	// Validate POST
			//$validated_wpbc 	  = OPER_Settings_API::validate_textarea_post_static( 'oper_products_wpbc_text' );
            $csv_separator = OPER_Settings_API::validate_checkbox_post_static( 'oper_wpbc_auto_import' );

            /////////////////////////////////////////////////////////////////

	        update_oper_option( 'oper_wpbc_auto_import', $csv_separator );

			// oper_show_fixed_message ( __('Done', 'email-reminders'), 3  );			//, 'updated warning' );                // Show Message
            return array (   'csv_separator' => $csv_separator  );
        }





		/** Buld data saving to DB from POST
        //$validated_fields = $this->settings_api()->validate_post();													// Get Validated Settings fields in $_POST request.
        //$validated_fields = apply_filters( 'oper_settings_validate_fields_before_saving', $validated_fields );		// Hook for validated fields.

        // unset($validated_fields['oper_start_day_weeek']);															// Skip saving specific option, for example in Demo mode.
        //$this->settings_api()->save_to_db( $validated_fields );														// Save fields to DB
        //oper_show_changes_saved_message();
        //oper_show_fixed_message ( __('Done', 'email-reminders'), 0 );														// Show Message
        */

        /** O L D   W A Y:   Saving Fields Data
        //      update_oper_option( 'oper_is_delete_if_deactive'
        //                       , OPER_Settings_API::validate_checkbox_post('oper_is_delete_if_deactive') );
        //      ( (isset( $_POST['oper_is_delete_if_deactive'] ))?'On':'Off') );
		*/

        return false;
    }


    public function js() {
        ?>
        <script type="text/javascript">

			// User  was selected some WPBC file
			jQuery('.oper_url_to_wpbc_file').on(  "oper_upload_url_set", function( event ) {
//console.log( jQuery( this ).val() );
                    jQuery('#oper_action').val('wpbc_upload');
                    jQuery('#oper_send_links_form<?php //echo $submit_form_name; ?>').trigger( 'submit' );
					return false;
			});


            // On click submit form
            jQuery( '.oper_wpbc_import_button' ).on( 'click', function() {
				if ( jQuery( '.oper_wpbc_import_button' ).hasClass( 'disabled' ) ) {
					return false;	// Prevent submit form, if button disabled.
				}
                    jQuery('#oper_action').val('wpbc_import');
                    jQuery('#oper_send_links_form<?php //echo $submit_form_name; ?>').trigger( 'submit' );
					return false;
            });

            // On click submit form
            jQuery( '.oper_wpbc_auto_import_button' ).on( 'click', function() {
				if ( jQuery( '.oper_wpbc_auto_import_button' ).hasClass( 'disabled' ) ) {
					return false;	// Prevent submit form, if button disabled.
				}
                    jQuery('#oper_action').val('auto_import');
                    jQuery('#oper_send_links_form<?php //echo $submit_form_name; ?>').trigger( 'submit' );
					return false;
            });




            // Catch data for summary
            jQuery('#oper_products_wpbc_text').on( "keypress", function( event ) {
                if( event.which != 13) {
                    // oper_generate_send_info();
                    //return false;
                }
            });
            jQuery('#oper_products_wpbc_text').on( 'change', function(){
                // oper_generate_send_info();
            } );
            jQuery(document).ready( function(){
                // oper_generate_send_info();
            });

            jQuery('.oper_url_to_wpbc_file').on( 'change', function(){
                console.log( jQuery( this ).val() );
            } );


            //Allow enter key on textareas and submit buttons only
            jQuery(document).on( "keypress", ":input:not(textarea):not([type=submit])", function( event ) {
                if( event.which == 13) {
					if ( jQuery( '.oper_send_button' ).hasClass( 'disabled' ) ) {
						return false; // Prevent submit form, if button disabled.
					}
                    //alert('You pressed enter!');
                    jQuery('#oper_action').val('wpbc_parse');
                    jQuery('#oper_send_links_form<?php //echo $submit_form_name; ?>').trigger( 'submit' );
                    return false;
                }
            });
        </script>
        <?php
    }


    public function css() {
        ?>
        <style type="text/css">
			.oper_page .oper_wpbc_toolbar_message {
				font-weight: 600;
				font-size: 1.2em;
				padding: 0.5em;
				line-height: 1.2em;
			}
			input[type="text"].wpbc_separator_text_field{
				font-weight: 600;
				width: 5em;
				margin-right:2em;
				border: 1px solid #bbb;
				height:28px;
			}
 			#oper_products_wpbc_text {
				width: 100%;
				font-size: 0.85em;
				font-weight: 400;
				white-space: pre;
				overflow-x: hidden;
			}
 			/* iPad mini and all iPhones  and other Mobile Devices */
			@media (max-width: 782px) {
				.oper_page .oper_send_button {
					padding: 2px;
					margin-top: 1px;
				}
			}
			#oper_list2wpbc_textdata,
 			#oper_textdata {
				width: 100%;
				font-size: 0.85em;
				font-weight: 400;
				white-space: pre;
				overflow-x: hidden;
			}
			.oper_flex_assign {
				display: -webkit-box;
				display: -moz-box;
				display: -ms-flexbox;
				display: -webkit-flex;
				display: flex;

				flex-direction: row;
				justify-content: space-around;
				align-items: center;
			}
			.oper_flex_assign .delete_oper_link {
				order: 1;
				color:#000;
				margin: 0 5px 0 10px;
				text-align: center;
				flex: 0 0 auto; /* grow shrink basis*/
			}
			.oper_flex_assign select{
				flex: 1 0 auto; /* grow shrink basis*/
			}
 			/* iPad mini and all iPhones  and other Mobile Devices */
			@media (max-width: 782px) {
				.oper_page .oper_send_button {
					padding: 2px;
					margin-top: 1px;
				}
			}

        </style>
        <?php
    }


}
add_action('oper_menu_created', array( new OPER_Page_ContactsWPBC() , '__construct') );    // Executed after creation of Menu


/**
 * Settings section - Warning - NO "Booking Calendar" plugin
 */
function oper_no_booking_calendar_ui(){

	?>
	<div class="clear" style="height:15px;"></div>
	<div class="oper-settings-notice notice-error" style="text-align:left;font-size: 16px;padding: 5px 20px;">
		<strong><?php _e('Important!' ,'email-reminders'); ?></strong> <?php

			printf( __( 'This feature require %s plugin. You can install %s plugin from this %spage%s.', 'email-reminders' )
						, '<strong><a class="" href="'. home_url() .'/wp-admin/plugin-install.php?s=booking+calendar+by+oplugins&tab=search&type=term">'
					 // , '<strong><a class="thickbox open-plugin-details-modal" href="'. home_url() .'/wp-admin/plugin-install.php?tab=plugin-information&plugin=booking-manager&TB_iframe=true&width=772&height=741"  target="_blank">'
						  . '' . 'Booking Calendar' . '</a></strong>'
						,  '<strong>' . 'Booking Calendar' . '</strong>'
						, '<a target="_blank" href="https://wordpress.org/plugins/booking/">'
						, '</a>'
				);
		?>
	</div>
	<div class="clear" style="height:25px;"></div><?php
if (0) {
	oper_open_meta_box_section( 'oper_settings_ics_import_help_how', __('How it works', 'email-reminders') );


			?>
			<div class="oper-help-message ">
				<h4 style="margin-top:0;font-size:1.1em;">
					<?php
						$message_ics = sprintf( __( 'What does .ics feeds import/export mean?', 'email-reminders' ) );
						$message_ics = str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ), $message_ics );
						echo $message_ics;
					?>
				</h4>
				<p  class="code" >
					<?php
						$message_ics = sprintf(
								__( 'Its useful, if you need to import/export bookings from/to external websites, like %s', 'email-reminders' ),
								' <br/><em><strong><a href="https://www.airbnb.com/help/article/99/how-do-i-sync-my-airbnb-calendar-with-another-calendar" target="_blank">Airbnb</a></strong>, '
								. '<strong><a href="https://partnersupport.booking.com/hc/en-us/articles/213424709-How-do-I-export-my-calendar-" target="_blank">Booking.com</a></strong>, '
								. '<strong><a href="https://help.homeaway.com/articles/How-do-I-export-my-calendar-data-to-a-Google-calendar" target="_blank">HomeAway</a></strong>, '
								. '<strong><a href="https://rentalsupport.tripadvisor.com/articles/FAQ/noc-How-does-calendar-sync-work" target="_blank">TripAdvisor</a></strong>, '
								. '<strong><a href="https://help.vrbo.com/articles/How-do-I-export-my-calendar-data-to-a-Google-calendar" target="_blank">VRBO</a></strong>, '
								. '<strong><a href="https://helpcenter.flipkey.com/articles/FAQ/noc-How-does-calendar-sync-work" target="_blank">FlipKey</a></strong> '
								. str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ),
											 __( 'and any other calendar that uses .ics format', 'email-reminders' )
											)
								. '</em>.<br/>'
							);
						$message_ics = str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ), $message_ics );
						echo $message_ics;
					?>
				</p>
				<div class="clear" style="margin:20px 0;"></div>
				<div class="oper-settings-notice notice-info"
					 style="text-align:left;border-top:1px solid #f0f0f0;border-right:1px solid #f0f0f0; line-height: 2em;padding: 5px 20px;"
					 >
					<?php
						$message_ics = sprintf(
								__( '.ics - is a file format of iCalendar standard for exchanging calendar and scheduling information between different sources %s Using a common calendar format (.ics), you can keep all your calendars updated and synchronized.', 'email-reminders' )
								, '<br/>' /*
								'<br/><em>(<strong><a href="https://www.airbnb.com/help/article/99/how-do-i-sync-my-airbnb-calendar-with-another-calendar" target="_blank">Airbnb</a></strong>, '
								. '<strong><a href="https://partnersupport.booking.com/hc/en-us/articles/213424709-How-do-I-export-my-calendar-" target="_blank">Booking.com</a></strong>, '
								. '<strong><a href="https://help.homeaway.com/articles/How-do-I-export-my-calendar-data-to-a-Google-calendar" target="_blank">HomeAway</a></strong>, '
								. '<strong><a href="https://rentalsupport.tripadvisor.com/articles/FAQ/noc-How-does-calendar-sync-work" target="_blank">TripAdvisor</a></strong>, '
								. '<strong><a href="https://help.vrbo.com/articles/How-do-I-export-my-calendar-data-to-a-Google-calendar" target="_blank">VRBO</a></strong>, '
								. '<strong><a href="https://helpcenter.flipkey.com/articles/FAQ/noc-How-does-calendar-sync-work" target="_blank">FlipKey</a></strong> '
								. str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ),
											 __( 'and any other calendar that uses .ics format', 'email-reminders' )
											)
								. ')</em>.<br/>' */
							);
						$message_ics = str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ), $message_ics );
						echo $message_ics;
					?>
				</div>
				<?php if ( $is_import ) { ?>
				<h4 style="font-size:1.1em;">
					<?php
						// FixIn: 8.4.2.12
						$message_ics = sprintf( __( 'Is it automatic process?', 'email-reminders' ) );
						$message_ics = str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ), $message_ics );
						echo $message_ics;
					?>
				</h4>
				<div class="oper-settings-notice notice-warning"
					 style="text-align:left;border-top:1px solid #f0f0f0;border-right:1px solid #f0f0f0; line-height: 2em;padding: 5px 20px;"
					 >
					<?php
						$message_ics = sprintf(
								__( 'By default .ics import is not automatic process. You need to set up CRON script on your server to periodically access front-end page(s) with import .ics feeds shortcodes.', 'email-reminders' )
								, '<br/>' /*
								'<br/><em>(<strong><a href="https://www.airbnb.com/help/article/99/how-do-i-sync-my-airbnb-calendar-with-another-calendar" target="_blank">Airbnb</a></strong>, '
								. '<strong><a href="https://partnersupport.booking.com/hc/en-us/articles/213424709-How-do-I-export-my-calendar-" target="_blank">Booking.com</a></strong>, '
								. '<strong><a href="https://help.homeaway.com/articles/How-do-I-export-my-calendar-data-to-a-Google-calendar" target="_blank">HomeAway</a></strong>, '
								. '<strong><a href="https://rentalsupport.tripadvisor.com/articles/FAQ/noc-How-does-calendar-sync-work" target="_blank">TripAdvisor</a></strong>, '
								. '<strong><a href="https://help.vrbo.com/articles/How-do-I-export-my-calendar-data-to-a-Google-calendar" target="_blank">VRBO</a></strong>, '
								. '<strong><a href="https://helpcenter.flipkey.com/articles/FAQ/noc-How-does-calendar-sync-work" target="_blank">FlipKey</a></strong> '
								. str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ),
											 __( 'and any other calendar that uses .ics format', 'email-reminders' )
											)
								. ')</em>.<br/>' */
							);
						$message_ics = str_replace( array( '.ics', 'iCalendar' , 'CRON'), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' , '<a target="_blank" href="https://wpbookingcalendar.com/faq/cron-script/"><strong>CRON</strong></a>' ), $message_ics );
						echo $message_ics;
					?>
				</div>
				<h4 style="font-size:1.1em;">
					<?php
						$message_ics = sprintf( __( 'How to start import of .ics feeds (files)?', 'email-reminders' ) );
						$message_ics = str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ), $message_ics );
						echo $message_ics;
					?>
				</h4>
				<ol style="list-style-type: decimal !important;list-style-position: inside;margin-left: 15px;">
					<li><?php
						printf( __( 'Install %s plugin.', 'email-reminders' )
						, '<a target="_blank" href="https://wordpress.org/plugins/booking-manager/"><strong>Booking Manager</strong></a>' );
					?></li>
					<li><?php
						printf( __( 'Insert %s shortcode into  some post(s) or page(s). Check more info about this %sshortcode configuration%s', 'email-reminders' )
						, '<code>[booking-manager-import ...]</code>'
						, '<a target="_blank" href="https://wpbookingcalendar.com/faq/booking-manager/">'
						, '</a>'
						);
					?>.
						<div class="oper-settings-notice notice-info"
							 style='margin-left:25px;text-align:left;border-top:1px solid #f0f0f0;border-right:1px solid #f0f0f0;'><?php

							$message_ics = sprintf( __( 'Using such shortcodes in pages give a great flexibility to import from  different .ics feeds (sources) into the same resource.%sAlso  its possible to define different CRON parameters for accessing such different pages with  different time intervals.', 'email-reminders' )
													, '<br/>'
													);
							$message_ics = str_replace( array( '.ics', 'CRON' ), array( '<strong>.ics</strong>', '<a target="_blank" href="https://wpbookingcalendar.com/faq/cron-script/"><strong>CRON</strong></a>' ), $message_ics );
							echo $message_ics;
						?>
						</div>
						<span style="padding:0 15px;">
						<?php
							$message_ics = sprintf( __( 'Or you can import .ics feed or file directly at current page.', 'email-reminders' ) );
							$message_ics = str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ), $message_ics );
							echo $message_ics;
						?>
						</span>
					</li>
					<li>				<?php
							$message_ics = sprintf( __( 'If you have inserted import shortcodes from %s, then  you can configure your CRON for periodically access these pages and import .ics feeds.', 'email-reminders' )
													, '<a target="_blank" href="https://wordpress.org/plugins/booking-manager/"><strong>Booking Manager</strong></a> <code>[booking-manager-import ...]</code>'
												);
							$message_ics = str_replace( array( '.ics', 'CRON' ), array( '<strong>.ics</strong>', '<a target="_blank" href="https://wpbookingcalendar.com/faq/cron-script/"><strong>CRON</strong></a>' ), $message_ics );
							echo $message_ics;
						?>
					</li>
				</ol>
				<?php } else { ?>
				<h4 style="font-size:1.1em;">
					<?php
						$message_ics = sprintf( __( 'How to start export of .ics feeds (files)?', 'email-reminders' ) );
						$message_ics = str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ), $message_ics );
						echo $message_ics;
					?>
				</h4>
				<ol style="list-style-type: decimal !important;list-style-position: inside;margin-left: 15px;">
					<li><?php
						printf( __( 'Install %s plugin.', 'email-reminders' )
						, '<a target="_blank" href="https://wordpress.org/plugins/booking-manager/"><strong>Booking Manager</strong></a>' );
					?></li>
					<li>
						<?php _e( 'Configure ULR feed(s) at this settings page.', 'email-reminders' );  ?>
						<div class="oper-settings-notice notice-info"
							 style='margin-left:25px;text-align:left;border-top:1px solid #f0f0f0;border-right:1px solid #f0f0f0;'>
						<?php
							$message_ics = sprintf(
												__( 'Using such URL(s) you can import .ics feeds, from  interface of other websites. %sCheck  more info  about how to import .ics feeds into other websites at the support pages of sepcific website.',  'email-reminders' )
												, '<br/>');
							$message_ics = str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ), $message_ics );
							echo $message_ics;
						?>
						</div>
					</li>
					<li>
					<?php
						$message_ics = sprintf( __( 'Visit these (previously configured URL feeds) pages for downloading .ics files.', 'email-reminders' ) );
						$message_ics = str_replace( array( '.ics', 'iCalendar' ), array( '<strong>.ics</strong>', '<strong>iCalendar</strong>' ), $message_ics );
						echo $message_ics;
					?>
					</li>
				</ol>
				<?php } ?>
			</div>
			<?php


	oper_close_meta_box_section();
}
}


/**
 * Settings Section - Run Import  in  Booking Calendar
 */
function oper_wpbc_import_ui(){

	oper_open_meta_box_section( 'oper_wpbc_content', __('Import Bookings', 'email-reminders') );  ?>
	<span class="wpdevelop">
		<table class="form-table">
			<tbody>
			<?php

				$default_csv_separator_columns = get_oper_option( 'oper_default_csv_separator_columns' );
				if ( empty( $default_csv_separator_columns )) {
					$default_csv_separator_columns = ';';
				}
				if (
						( ! empty( $updated_data ) )
					 && ( ! empty( $updated_data['validated_data']['separator'] ) )
				) {
					update_oper_option( 'oper_default_csv_separator_columns' , $updated_data['validated_data']['separator'] );
				}

				$field = array(
								  'title' 		=> __('Enter CSV separator ', 'email-reminders')
								, 'type' 		=> 'text'
								, 'value' 		=> ( ! empty( $updated_data ) ) ?  $updated_data[ 'validated_data' ]['separator'] : $default_csv_separator_columns
								, 'class' 		=> 'wpbc_separator_text_field'
								, 'css' 		=> ''
								, 'placeholder' => ''
								, 'description' => ''
								, 'disabled' 	=> false
								, 'only_field' 	=> false
				);
				OPER_Settings_API::field_text_row_static( 'oper_wpbc_separator_columns', $field );


			?>
			</tbody>
		</table>

		<hr/>

		<a class="button button-primary oper_wpbc_import_button"
		   href="javascript:void(0)"  title="<?php _e('Start Import' , 'email-reminders') ?>"
		><span class="oper_text_hide_mobile"><?php _e('Start Import' , 'email-reminders')
		?>&nbsp;&nbsp;</span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>

	</span>
	<?php oper_close_meta_box_section();

}


/**
 * Settings Section - Saving Auto Import
 */
function oper_wpbc_auto_import_ui(){

	oper_open_meta_box_section( 'oper_wpbc_auto_import', __('Bookings Auto Import', 'email-reminders') );  ?>
		<table class="form-table">
			<tbody>
			<?php
				$wpbc_auto_import = get_oper_option( 'oper_wpbc_auto_import' );

				$field = array(
								  'title' 		=> __('Auto import', 'email-reminders')
								, 'label'       => __('Check this box to enable auto import of bookings.' , 'email-reminders')
								, 'type' 		=> 'checkbox'
								, 'value' 		=> ( ! empty( $wpbc_auto_import ) ) ?  $wpbc_auto_import : 'Off'
								, 'class' 		=> ''
								, 'css' 		=> ''
								, 'placeholder' => ''
								, 'description' => ''
								, 'disabled' 	=> false
								, 'only_field' 	=> false
				);
				OPER_Settings_API::field_checkbox_row_static( 'oper_wpbc_auto_import', $field );
			?>
			</tbody>
		</table>
		<a class="button button-primary oper_wpbc_auto_import_button"
		   href="javascript:void(0)"  title="<?php _e('Save changes' , 'email-reminders') ?>"
		><span class="oper_text_hide_mobile"><?php _e('Save changes' , 'email-reminders')
		?>&nbsp;&nbsp;</span><span class="glyphicon glyphicon-chevron-" aria-hidden="true"></span></a>
	<?php oper_close_meta_box_section();

}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Support Functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Check  if "Booking Calendar" installed/activated and return version number
 *
 * @return string - 0 if not installed,  otherwise version num
 */
function oper_get_wpbc_version() {

	if ( ! defined( 'WP_BK_VERSION_NUM' ) )
		return 0;
	else
		return WP_BK_VERSION_NUM;
}

/**
 * Get all bookings from  Booking Calendar plugin
 * @return array
 */
function oper_get_bookings(){

	/**
	 *  // Start Date of getting bookings
	$real_date = strtotime( 'now' );
	$wh_booking_date = date_i18n( "Y-m-d", $real_date );							// '2012-12-01';
		// End date of getting bookings
	$real_date = strtotime( '+1 year' );
	$wh_booking_date2 = date_i18n( "Y-m-d", $real_date );							// '2013-02-31';
	*/

	// For all  bookings:
	$wh_booking_date = '3';
	$wh_booking_date2 = '';

	$default_params = array(
			  'wh_booking_type' => ''   // '1'
			, 'wh_approved' => ''
			, 'wh_booking_id' => ''		// '>10'	// TODO: get latest  saved booking_id,  and then  get all  new bookings starting from  this ID
			, 'wh_is_new' => ''
			, 'wh_pay_status' => 'all'
			, 'wh_keyword' => ''
			, 'wh_booking_date'     => $wh_booking_date
			, 'wh_booking_date2'    => $wh_booking_date2
			, 'wh_modification_date' => '3'
			, 'wh_modification_date2' => ''
			, 'wh_cost' => ''
			, 'wh_cost2' => ''
			, 'or_sort' => 'booking_id_asc'	//get_bk_option( 'booking_sort_order' )
			, 'page_num' => '1'
			, 'wh_trash' => ''                                                          // '' | trash | any
			, 'limit_hours' => '0,24'
			, 'only_booked_resources' => 0
			, 'page_items_count' => '100000'
		);

	// Get array of bookings.

	$bookings_arr = wpbc_api_get_bookings_arr( $default_params );

	return $bookings_arr;
}


/**
 * Generate CSV content -- 01.Import bookings   02.Create CSV   03.Save to option   04.Redirect to Import CSV page
 * @param $line__separator
 */
function oper_import_bookings_as_csv( $line__separator ) {

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Get all bookings
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$bk_listing = oper_get_bookings();
	$bookings = $bk_listing['bookings'];

	$bookings_arr = oper_get_bookings__fields_rows_arr( $bookings );


	$export_collumn_titles = $bookings_arr['titles'];
	$export_bookings       = $bookings_arr['rows'];

	$csv__separator = get_bk_option( 'oper_default_csv_separator_columns' );
	if ( $csv__separator != $line__separator ) {
		update_bk_option( 'oper_default_csv_separator_columns', $line__separator );
	}

	$csv_file_content = '';
	$write_line       = '';

	// Write Titles
	foreach ( $export_collumn_titles as $line ) {
		$write_line .= "\"" . $line . "\"" . $line__separator;
	}
	$write_line       = substr_replace( $write_line, "", - 1 );    // replace last charcater "," in EOL
	$write_line       .= "\r\n";
	$csv_file_content .= $write_line;

	// Write Values
	foreach ( $export_bookings as $line ) {
		$write_line = '';

		foreach ( $export_collumn_titles as $key ) {    // Because titles have all keys, we loop keys from titles and then get and write values

			if ( isset( $line[ $key ] ) ) {
				$line[ $key ] = html_entity_decode( $line[ $key ], ENT_QUOTES, 'UTF-8' );        //FixIn: 1.0.1.2
				$write_line .= "\"" . $line[ $key ] . "\"" . $line__separator;
			} else {
				$write_line .= "\"" . "\"" . $line__separator;
			}
		}

		$write_line       = substr_replace( $write_line, "", - 1 );    // replace last charcater "," in EOL
		$write_line       .= "\r\n";
		$csv_file_content .= $write_line;
	}

	update_oper_option( 'oper_force_xls2csv_import' , $csv_file_content );

	oper_redirect(  admin_url( 'admin.php' ) . '?page=oper-contacts&tab=contacts-csv&from_source=xls' );
}


		function oper_get_bookings__fields_rows_arr(  $bookings  ){

			//FixIn: 1.0.1.1
			if ( function_exists( 'wpdebk_get_keyed_all_bk_resources' ) ) {
				$all_booking_types = wpdebk_get_keyed_all_bk_resources( array() );
			} else {
				$all_booking_types           = array();
				$all_booking_types[1]        = new StdClass();
				$all_booking_types[1]->title = __( 'Standard', 'booking' );
			}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Get all titles
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			$export_collumn_titles = array();

			foreach ( $bookings as $key => $value ) {

				$fields = $bookings[ $key ]->form_data['_all_'];


				// Set resources for the dates of reservation, which in different sub resources
				for ( $ibt = 0; $ibt < count( $bookings[ $key ]->dates_short_id ); $ibt ++ ) {
					if ( ! empty( $bookings[ $key ]->dates_short_id[ $ibt ] ) ) {
						$bookings[ $key ]->dates_short[ $ibt ] .= ' (' . $all_booking_types[ $bookings[ $key ]->dates_short_id[ $ibt ] ]->title . ') ';
					}
				}
				$bookings[ $key ]->check_in  = $bookings[ $key ]->dates_short[0];
				$bookings[ $key ]->check_out = $bookings[ $key ]->dates_short[ ( count( $bookings[ $key ]->dates_short ) - 1 ) ];
				$bookings[ $key ]->dates_show = implode( ' ', $bookings[ $key ]->dates_short );

				// Get  the owner of this resource
				if ( class_exists( 'wpdev_bk_multiuser' ) ) {
					$user_bk_id = apply_bk_filter( 'get_user_of_this_bk_resource', false, $bookings[ $key ]->booking_type );
					$user_data  = get_userdata( $user_bk_id );
					if ( ( ! isset( $fields[ 'user' . $bookings[ $key ]->booking_type ] ) ) && ( isset( $user_data->data ) ) && ( isset( $user_data->data->display_name ) ) ) {
						$fields[ 'user' . $bookings[ $key ]->booking_type ] = $user_data->data->display_name;
					}
					if ( ( isset( $user_data->data ) ) && ( isset( $user_data->data->display_name ) ) ) {
						$bookings[ $key ]->form_data['_all_'][ 'user' . $bookings[ $key ]->booking_type ] = $user_data->data->display_name;
					}
				}

				// Get Field Titles
				foreach ( $fields as $field_key => $field_value ) {

					$field_key = str_replace( '[', '', $field_key );
					$field_key = str_replace( ']', '', $field_key );
					if ( substr( $field_key, - 1 * ( strlen( $bookings[ $key ]->booking_type ) ) ) == $bookings[ $key ]->booking_type ) {
						$field_key = substr( $field_key, 0, - 1 * ( strlen( $bookings[ $key ]->booking_type ) ) );
					}
					if ( ! in_array( $field_key, $export_collumn_titles ) ) {
						$export_collumn_titles[] = $field_key;
					}
				}
			}

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// R O W s
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			foreach ( $bookings as $key => $value ) {

				$export_bk_row                      = array();
				$export_bk_row['check_in']          = $value->check_in;
				$export_bk_row['check_out']         = $value->check_out;
				$export_bk_row['dates']             = $value->dates_show;
				$export_bk_row['booking_id']        = $value->booking_id;
				$export_bk_row['modification_date'] = $value->modification_date;
				$export_bk_row['booking_resource']  = $all_booking_types[ $value->booking_type ]->title;
				//FixIn: 1.0.1.2
				if ( isset( $value->remark ) ) {
					$export_bk_row['remark'] = $value->remark;
				} else {
					$export_bk_row['remark'] = '';
				}

				if ( isset( $value->cost ) ) {
					$export_bk_row['cost']       = $value->cost;
					$export_bk_row['pay_status'] = $value->pay_status;
				}
				$export_bk_row['trash'] = ( $value->trash == 1 ) ? '+' : '';

				$is_approved = 0;
				if ( count( $value->dates ) > 0 ) {
					$is_approved = $value->dates[0]->approved;
				}
				if ( $is_approved ) {
					$bk_print_status = __( 'Approved', 'email-reminders' );
				} else {
					$bk_print_status = __( 'Pending', 'email-reminders' );
				}
				$export_bk_row['status'] = $bk_print_status;

				foreach ( $export_collumn_titles as $field_key => $field_value ) {
					if ( isset( $value->form_data['_all_'][ $field_value . $value->booking_type ] ) ) {
						$export_bk_row[ $field_value ] = html_entity_decode( $value->form_data['_all_'][ $field_value . $value->booking_type ] );
					} else {
						$export_bk_row[ $field_value ] = '';
					}
				}

				$export_bk_row     = str_replace( array( "\n\r", "\r", "\n" ), ' ', $export_bk_row );
				$export_bookings[] = $export_bk_row;
			}

			// Write this columns to the beginning
			array_unshift( $export_collumn_titles, 'booking_id', 'booking_resource', 'status', 'check_in', 'check_out', 'dates', 'modification_date', 'cost', 'pay_status' );
			$export_collumn_titles[] = 'trash';
			$export_collumn_titles[] = 'remark';

			return array( 'titles' => $export_collumn_titles, 'rows' => $export_bookings );
		}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Auto  adding contacts  at  new bookings:
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Hook action after creation  new booking  for Booking Calendar 9.7.7 or older.
 *
 * @param int $booking_id
 * @param int $resource_id
 * @param string $str_dates__dd_mm_yyyy    - "30.02.2014, 31.02.2014, 01.03.2014"
 * @param array  $times_array              - array($start_time, $end_time )
 * @param string $booking_form
 *
 *                            Example:
										[1] => 27
										[2] => 16
										[3] => 25.05.2020, 26.05.2020, 27.05.2020
										[4] => Array (
												[0] => Array (
														[0] => 00
														[1] => 00
														[2] => 00
													)
												[1] => Array (
														[0] => 00
														[1] => 00
														[2] => 00
													)
											)
										[5] => text^selected_short_timedates_hint16^25/05/2020 - 27/05/2020~text^cost_hint16^&#36;150.00~text^name16^Jo~text^secondname16^Smith~email^email16^smith@server.com~text^phone16^738759384~text^address16^Baker street~text^city16^London~text^postcode16^89~select-one^country16^GB~select-one^visitors16^1~textarea^details16^test  booking ~coupon^coupon16^coup~checkbox^term_and_condition16[]^I Accept term and conditions

 */
function oper_add_new_booking( $booking_id, $resource_id, $str_dates__dd_mm_yyyy, $times_array , $booking_form  ) {

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/// Get booking details
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$default_params = array( 'wh_booking_id' => $booking_id );
	$bk_listing     = wpbc_api_get_bookings_arr( $default_params );
	/**
	 * wpbc_api_get_bookings_arr =>
	 * Array (
            [bookings] => Array (
                    [28] => stdClass Object(
                            [booking_id] => 28
                            [trash] => 0
                            [sync_gid] =>
                            [is_new] => 1
                            [status] =>
                            [sort_date] => 2020-05-29 00:00:00
                            [modification_date] => 2020-05-06 11:38:21
                            [form] => text^selected_short_timedates_hint16^29/05/2020 - 30/05/2020~text^cost_hint16^&#36;100.00~text^name16^Jo~text^secondname16^Smith~email^email16^smith@server.com~text^phone16^738759384~text^address16^Baker street~text^city16^London~text^postcode16^89~select-one^country16^GB~select-one^visitors16^1~textarea^details16^test  booking ~coupon^coupon16^coup~checkbox^term_and_condition16[]^I Accept term and conditions
                            [hash] => 4e49c4371d8e22f65601b16106d63a21
                            [booking_type] => 16
                            [remark] =>
                            [cost] => 100.00
                            [pay_status] => 158876510245.42
                            [pay_request] => 0
                            [dates] => Array (
                                    [0] => stdClass Object (
                                            [booking_id] => 28
                                            [booking_date] => 2020-05-29 00:00:00
                                            [approved] => 0
                                            [type_id] =>
                                        )
                                    [1] => stdClass Object (
                                            [booking_id] => 28
                                            [booking_date] => 2020-05-30 00:00:00
                                            [approved] => 0
                                            [type_id] =>
                                        )
                                )
                            [dates_short] => Array (
                                    [0] => 2020-05-29 00:00:00
                                    [1] => -
                                    [2] => 2020-05-30 00:00:00
                                )
                            [form_show] =>
                            [form_data] => Array (
                                    [email] => smith@server.com
                                    [name] => Jo
                                    [secondname] => Smith
                                    [visitors] => 1
                                    [coupon] => coup
                                    [_all_] => Array (
                                            [selected_short_timedates_hint16] => 29/05/2020 - 30/05/2020
                                            [cost_hint16] => &#36;100.00
                                            [name16] => Jo
                                            [secondname16] => Smith
                                            [email16] => smith@server.com
                                            [phone16] => 738759384
                                            [address16] => Baker street
                                            [city16] => London
                                            [postcode16] => 89
                                            [country16] => GB
                                            [visitors16] => 1
                                            [details16] => test  booking
                                            [coupon16] => coup
                                            [term_and_condition16] => I Accept term and conditions
                                        )
                                    [_all_fields_] => Array
                                        (
                                            [selected_short_timedates_hint] => 29/05/2020 - 30/05/2020
                                            [cost_hint] => $100.00
                                            [name] => Jo
                                            [secondname] => Smith
                                            [email] => smith@server.com
                                            [phone] => 738759384
                                            [address] => Baker street
                                            [city] => London
                                            [postcode] => 89
                                            [country] => GB
                                            [visitors] => 1
                                            [details] => test  booking
                                            [coupon] => coup
                                            [term_and_condition] => I Accept term and conditions
                                            [booking_resource_id] => 16
                                            [resource_id] => 16
                                            [type_id] => 16
                                            [type] => 16
                                            [resource] => 16
                                            [booking_id] => 28
                                            [resource_title] => stdClass Object
                                                (
                                                    [booking_type_id] => 16
                                                    [title] => Apartment#1
                                                    [users] => 5
                                                    [import] =>
                                                    [export] =>
                                                    [cost] => 50
                                                    [default_form] => standard
                                                    [prioritet] => 0
                                                    [parent] => 0
                                                    [visitors] => 2
                                                    [id] => 16
                                                    [count] => 1
                                                    [ID] => 16
                                                )

                                        )
                                    [country] => GB
                                    [term_and_condition] => I Accept term and conditions
                                )
                            [dates_short_id] => Array (
                                    [0] =>
                                    [1] =>
                                    [2] =>
                                )
                        )
			)
            [resources] => Array (
									[17] => stdClass Object (
											[booking_type_id] => 17
											[title] => Apartment#2
											[users] => 5
											[import] =>
											[export] =>
											[cost] => 75
											[default_form] => standard
											[prioritet] => 0
											[parent] => 0
											[visitors] => 2
											[id] => 17
											[count] => 1
											[ID] => 17
										), ....
			)
            [bookings_count] => 1
            [page_num] => 1
            [count_per_page] => 100000
        )
	 */


	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/// Transform  booking view
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$bookings     = $bk_listing['bookings'];
	$bookings_arr = oper_get_bookings__fields_rows_arr( $bookings );
	/**
	 * oper_get_bookings__fields_rows_arr =>
	 *	Array (
            [titles] => Array (
                    [0] => id
                    [1] => booking_type
                    [2] => status
                    [3] => check_in
                    [4] => check_out
                    [5] => dates
                    [6] => modification_date
                    [7] => cost
                    [8] => pay_status
                    [9] => selected_short_timedates_hint
                    [10] => cost_hint
                    [11] => name
                    [12] => secondname
                    [13] => email
                    [14] => phone
                    [15] => address
                    [16] => city
                    [17] => postcode
                    [18] => country
                    [19] => visitors
                    [20] => details
                    [21] => coupon
                    [22] => term_and_condition
                    [23] => trash
                    [24] => remark
                )
            [rows] => Array (
                    [0] => Array (
                            [check_in] => 2020-05-16 00:00:00
                            [check_out] => 2020-05-16 00:00:00
                            [dates] => 2020-05-16 00:00:00
                            [id] => 29
                            [modification_date] => 2020-05-06 11:44:56
                            [booking_type] => Apartment#1
                            [remark] =>
                            [cost] => 50.00
                            [pay_status] => 158876549777.56
                            [trash] =>
                            [status] => Pending
                            [selected_short_timedates_hint] => 16/05/2020
                            [cost_hint] => $50.00
                            [name] => Jo
                            [secondname] => Smith
                            [email] => smith@server.com
                            [phone] => 738759384
                            [address] => Baker street
                            [city] => London
                            [postcode] => 89
                            [country] => GB
                            [visitors] => 1
                            [details] => test  booking
                            [coupon] => coup
                            [term_and_condition] => I Accept term and conditions
                        )
                )
        )
	 */


	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Create mini CSV  for one booking
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if ( 1 ) {


		$export_collumn_titles = $bookings_arr['titles'];
		$export_bookings       = $bookings_arr['rows'];

		$line__separator = get_bk_option( 'oper_default_csv_separator_columns' );

		$csv_file_content = '';
		$write_line       = '';

		// Write Titles
		foreach ( $export_collumn_titles as $line ) {
			$write_line .= "\"" . $line . "\"" . $line__separator;
		}
		$write_line       = substr_replace( $write_line, "", - 1 );    // replace last charcater "," in EOL
		$write_line       .= "\r\n";
		$csv_file_content .= $write_line;

		// Write Values
		foreach ( $export_bookings as $line ) {
			$write_line = '';

			foreach ( $export_collumn_titles as $key ) {    // Because titles have all keys, we loop keys from titles and then get and write values

				$line[ $key ] = html_entity_decode( $line[ $key ], ENT_QUOTES, 'UTF-8' );

				if ( isset( $line[ $key ] ) ) {
					$write_line .= "\"" . $line[ $key ] . "\"" . $line__separator;
				} else {
					$write_line .= "\"" . "\"" . $line__separator;
				}
			}

			$write_line       = substr_replace( $write_line, "", - 1 );    // replace last charcater "," in EOL
			$write_line       .= "\r\n";
			$csv_file_content .= $write_line;
		}
	}


	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/// Validate
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$validated              = array();
	$validated['separator'] = ';';
	$validated['csv']  		= wp_kses(   trim( stripslashes(  $csv_file_content  ) ),
										array_merge(
														array(
																'iframe' => array( 'src' => true, 'style' => true, 'id' => true, 'class' => true )
														),
														wp_kses_allowed_html( 'post' )
										)
							);

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Parse CSV
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$my_csv = new OPER_CSV_Parser();
	$my_csv->set_csv_settings( $validated );
	$csv_data_arr = $my_csv->get_arr_from_csv( $validated['csv'] );

	/**
	 * $csv_data_arr =  Array (
            [arr] => Array (
                    [0] => Array (
                            [id] => id
                            [booking_type] => booking_type
                            [status] => status
                            [check_in] => check_in
                            [check_out] => check_out
                            [dates] => dates
                            [modification_date] => modification_date
                            [cost] => cost
                            [pay_status] => pay_status
                            [selected_short_timedates_hint] => selected_short_timedates_hint
                            [cost_hint] => cost_hint
                            [name] => name
                            [secondname] => secondname
                            [email] => email
                            [phone] => phone
                            [address] => address
                            [city] => city
                            [postcode] => postcode
                            [country] => country
                            [visitors] => visitors
                            [details] => details
                            [coupon] => coupon
                            [term_and_condition] => term_and_condition
                            [trash] => trash
                            [remark] => "remark"
                        )
                    [1] => Array (
                            [id] => 30
                            [booking_type] => Apartment#1
                            [status] => Pending
                            [check_in] => 2020-05-14 00:00:00
                            [check_out] => 2020-05-15 00:00:00
                            [dates] => 2020-05-14 00:00:00 - 2020-05-15 00:00:00
                            [modification_date] => 2020-05-06 11:59:10
                            [cost] => 100.00
                            [pay_status] => 158876635228.82
                            [selected_short_timedates_hint] => 14/05/2020 - 15/05/2020
                            [cost_hint] => $100.00
                            [name] => Jo
                            [secondname] => Smith
                            [email] => smith@server.com
                            [phone] => 738759384
                            [address] => Baker street
                            [city] => London
                            [postcode] => 89
                            [country] => GB
                            [visitors] => 1
                            [details] => test  booking
                            [coupon] => coup
                            [term_and_condition] => I Accept term and conditions
                            [trash] =>
                            [remark] => ""
                        )
                )
            [csv] => id;booking_type;status;check_in;check_out;dates;modification_date;cost;pay_status;selected_short_timedates_hint;cost_hint;name;secondname;email;phone;address;city;postcode;country;visitors;details;coupon;term_and_condition;trash;remark
id;booking_type;status;check_in;check_out;dates;modification_date;cost;pay_status;selected_short_timedates_hint;cost_hint;name;secondname;email;phone;address;city;postcode;country;visitors;details;coupon;term_and_condition;trash;"remark"
30;Apartment#1;Pending;2020-05-14 00:00:00;2020-05-15 00:00:00;2020-05-14 00:00:00 - 2020-05-15 00:00:00;2020-05-06 11:59:10;100.00;158876635228.82;14/05/2020 - 15/05/2020;$100.00;Jo;Smith;smith@server.com;738759384;Baker street;London;89;GB;1;test  booking ;coup;I Accept term and conditions;;""
        )

	 */

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Add new contact
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	oper_csv_arr__save_in_db( $csv_data_arr['arr'] );

	/*
	oper_csv_arr__save_in_db( $data_arr )
    [1] => Array
        (
            [0] => Array
                (
                    [id] => id
                    [booking_type] => booking_type
                    [status] => status
                    [check_in] => check_in
                    [check_out] => check_out
                    [dates] => dates
                    [modification_date] => modification_date
                    [cost] => cost
                    [pay_status] => pay_status
                    [name] => name
                    [secondname] => secondname
                    [email] => email
                    [address] => address
                    [city] => city
                    [postcode] => postcode
                    [country] => country
                    [phone] => phone
                    [visitors] => visitors
                    [details] => details
                    [coupon] => coupon
                    [user] => user
                    [children] => children
                    [term_and_condition] => term_and_condition
                    [trash] => trash
                    [remark] => remark
                )

            [1] => Array
                (
                    [id] => 26
                    [booking_type] => Apartment#2
                    [status] => Pending
                    [check_in] => 2020-05-31 00:00:00
                    [check_out] => 2020-06-01 00:00:00
                    [dates] => 2020-05-31 00:00:00 - 2020-06-01 00:00:00
                    [modification_date] => 2020-05-04 11:03:53
                    [cost] => 506.00
                    [pay_status] =>
                    [name] => Sophia
                    [secondname] => Widams
                    [email] => Widams.example@wpbookingcalendar.com
                    [address] => 15 East St
                    [city] => Liverpool
                    [postcode] => 04029
                    [country] => UK
                    [phone] => 058-92-77
                    [visitors] => 1
                    [details] =>
                    [coupon] =>
                    [user] =>
                    [children] =>
                    [term_and_condition] =>
                    [trash] =>
                    [remark] =>
                )
		*/
}
add_action( 'wpdev_new_booking', 'oper_add_new_booking', 100, 5 );



// FixIn: Support Booking Calendar 9.8 or newer - auto import		2.0.4.1


/**
 * Track adding new booking
 *
 * @param $params            = array (
 *                           'str_dates__dd_mm_yyyy'   => '08.10.2023,09.10.2023,10.10.2023,11.10.2023',
 *                           'booking_id'              => 254,
 *                           'resource_id'             => 11,                      // child or parent or single
 *                           'initial_resource_id'     => 2,                       //          parent or single
 *                           'form_data'               => 'text^selected_short_dates_hint11^Sun...',
 *                           'times_array'             => array ( array ( '14', '00', '01' ), array( '12', '00', '02' ) ),
 *                           'is_edit_booking'         => 0,
 *                           'custom_form'             => '',
 *                           'is_duplicate_booking'    => 0,
 *                           'is_from_admin_panel'     => false,
 *                           'is_show_payment_form'    => 1
 *                           )
 */
function oper_add_new_booking_9_8( $params ) {

	update_oper_option( 'oper_start_add_booking' , '9.8' );
	$booking_id            = $params['booking_id'];
	$resource_id           = $params['resource_id'];
	$str_dates__dd_mm_yyyy = $params['str_dates__dd_mm_yyyy'];
	$times_array           = $params['times_array'];
	$booking_form          = $params['form_data'];
	oper_add_new_booking( $booking_id, $resource_id, $str_dates__dd_mm_yyyy, $times_array, $booking_form );
	update_oper_option( 'oper_start_add_booking' , '' );
}
add_action( 'wpbc_track_new_booking', 'oper_add_new_booking_9_8' );


/**
 * Hook action after approving of booking:  do_action( 'wpbc_booking_approved' , $booking_id , $is_approved_dates );
 * @param int/string $booking_id            - can be '1' or 99  or comma separated ID of bookings: '10,22,45'
 * @param int/string $is_approved_dates     - '1' | '0' | 1 | 0      1 -approved, 0 - pending
function your_cust_func_wpbc_booking_approved( $booking_id, $is_approved_dates  ) {

}
add_action( 'wpbc_booking_approved', 'your_cust_func_wpbc_booking_approved', 100, 2 );                                  //FixIn: 8.7.6.1
 */

/**
 * Hook action after trash of booking:
 * do_action( 'wpbc_booking_trash', $booking_id, $is_trash );                                						    //FixIn: 8.7.6.2
 */

/**
 * Hook action after delete of booking:
 * do_action( 'wpbc_booking_delete', $approved_id_str );															    //FixIn: 8.7.6.3
 */