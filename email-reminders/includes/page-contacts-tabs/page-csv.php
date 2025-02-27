<?php /**
 * @version 1.0
 * @package Email Reminders
 * @category Content of item Listing page
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2015-11-13
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/** Show Content
 *  Update Content
 *  Define Slug
 *  Define where to show
 */
class OPER_Page_ContactsCSV extends OPER_Page_Structure {

    public function in_page() {
        return 'oper-contacts';
    }

    public function tabs() {

        $tabs = array();
        $tabs[ 'contacts-csv' ] = array(
                              'title'		=> __( 'Import CSV', 'email-reminders' )						// Title of TAB
                            , 'hint'		=> __( 'Import contacts from CSV', 'email-reminders' )						// Hint
                            , 'page_title'	=> __( 'Import contacts from CSV', 'email-reminders' )			// Title of Page
                            , 'link'		=> ''								// Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            , 'position'	=> ''                               // 'left'  ||  'right'  ||  ''
                            , 'css_classes' => ''                               // CSS class(es)
                            , 'icon'		=> ''                               // Icon - link to the real PNG img
                            , 'font_icon'	=> 'glyphicon glyphicon-import'			// CSS definition  of forn Icon
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
        oper_bs_toolbar_sub_html_container_start();

		?><span class="wpdevelop"><div class="visibility_container clearfix-height" style="display:block;padding:0.25em 0;" ><?php


			if ( empty( $data_after_update ) ) {
			// Initial  Page Load
				?><span class="oper_csv_toolbar_message"><?php
					_e('01. Start import of CSV', 'email-reminders');
				?></span><?php

			} else if (    ( ! empty( $data_after_update['parsed_data'] ) )
						&& ( ! empty( $data_after_update['parsed_data']['arr'] ) )
		 	) {
			// Show HTML CSV Table
				?><span class="oper_csv_toolbar_message"><?php
					_e('02. Assign and manage fields', 'email-reminders');
				?></span><?php
			} else if (    ( ! empty( $data_after_update['csv2arr'] ) )
						 && ( ! empty( $data_after_update['csv2arr']['arr'] ) )
		 	) {
			// Saving to DB
				?><span class="oper_csv_toolbar_message"><?php
					_e('03. Saved', 'email-reminders');
				?></span><?php
			}




        ?></div></span><?php

        oper_bs_toolbar_sub_html_container_end();

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

				<?php if (
								( empty( $data_after_update ) )
							||  ( ! empty( $data_after_update['csv_file_content'] ) )
						) { ?>

						<?php oper_open_meta_box_section( 'oper_csv_content', __('CSV', 'email-reminders') );  ?>
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
													, 'class' 		=> 'csv_separator_text_field'
													, 'css' 		=> ''
													, 'placeholder' => ''
													, 'description' => ''
													, 'disabled' 	=> false
													, 'only_field' 	=> false
									);
									OPER_Settings_API::field_text_row_static( 'oper_csv_separator_columns', $field );


								?>
									<tr class="oper_tr_oper_products_csv_text " valign="top">
										<td scope="row" colspan="2">
											<span class='wpdevelop' style="margin-right:15px;">
												<input type="hidden" name="oper_url_to_csv_file" class="oper_url_to_csv_file" id="oper_url_to_csv_file" value="1" />
												<a class="button button-secondary oper_btn_upload"
												   style="font-weight: 600;"
												   <?php echo 'data-' . esc_attr( 'modal_title' )	. '="' . esc_attr( __( 'Choose files', 'email-reminders' ) ) . '" '; ?>
												   <?php echo 'data-' . esc_attr( 'btn_title' )		. '="' . esc_attr( __( 'Select CSV file', 'email-reminders' ) ) . '" '; ?>
												   href="javascript:void(0)"  title="<?php _e('Upload CSV file' , 'email-reminders') ?>"
												   ><span style="oper_text_hide_mobile0"><?php echo __('Upload CSV file' , 'email-reminders'); ?>&nbsp;&nbsp;</span><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
											</span>
											<?php
											// Get OPER_Upload obj. instance
											$oper_upload = oper_upload();

											$oper_upload->set_upload_button( '.oper_btn_upload' );

											$oper_upload->set_element_insert_url( '.oper_url_to_csv_file' );
											?>
										</td>
									</tr>
									<tr class="oper_tr_oper_products_csv_text " valign="top">
										<td scope="row" colspan="2">
											<strong><?php _e( 'OR', 'email-reminders' ) ?></strong>
										</td>
									</tr>
									<tr class="oper_tr_oper_products_csv_text " valign="top">
										<td scope="row" colspan="2">
											<?php

											$field_name = 'oper_products_csv_text';
											$field_value = get_oper_option('oper_history_validated_csv' );


											/////////////////////////////////////////////////////////////////////////////
											// Exception if we was forwarding from XLS to CSV import	:				/includes/admin/page-paste-xls.php
											/////////////////////////////////////////////////////////////////////////////
											$force_xls2csv_import = get_oper_option( 'oper_force_xls2csv_import' );
											if ( ! empty( $force_xls2csv_import ) ) {

												$field_value = $force_xls2csv_import;
												update_oper_option( 'oper_force_xls2csv_import', '' );					// Reset Force  XLS to CSV import
												// Submit parsing
												?>
												<script type="text/javascript">
													jQuery(document).ready(function(){
														jQuery('#oper_action').val('csv_parse');
														jQuery('#oper_send_links_form').trigger( 'submit' );
													});
												</script>
												<?php
											}
											/////////////////////////////////////////////////////////////////////////////


											$place_holder = str_replace( '|', get_oper_option( 'oper_csv_separator' ), __( 'Paste your CSV content here...', 'email-reminders' ) );

											?><textarea rows="8" cols="20" class="input-text wide-input" autocomplete="off"
							  							id="<?php echo $field_name; ?>"  name="<?php echo $field_name; ?>"
                               							placeholder="<?php echo $place_holder; ?>"

                        					><?php
												echo ( isset( $data_after_update['csv_file_content'] ) && ( strlen( $data_after_update['csv_file_content'] ) > 0 ) ) ?  $data_after_update['csv_file_content'] : $field_value;
											?></textarea><?php

											$field = array(
															  'title' => ''
															, 'description' => ''
															, 'type' => 'textarea'
															, 'value' =>  ( isset( $data_after_update['csv_file_content'] ) && ( strlen( $data_after_update['csv_file_content'] ) > 0 ) ) ?  $data_after_update['csv_file_content'] : $field_value
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
									<tr class="oper_tr_oper_products_csv_text " valign="top">
										<td scope="row" colspan="2" style="font-style: italic;">
										<?php
											echo __( 'Paste here your CSV content to start import.', 'email-reminders' ) . '<br/>';
										?>
										</td>
									</tr>
								</tbody>
							</table>

							<hr/>

							<a class="button button-primary oper_csv_import_button"
							   href="javascript:void(0)"  title="<?php _e('Start Import CSV file' , 'email-reminders') ?>"
							><span class="oper_text_hide_mobile"><?php _e('Start Import' , 'email-reminders')
							?>&nbsp;&nbsp;</span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>

						</span>
						<?php oper_close_meta_box_section();


				} else if ( 	( ! empty( $data_after_update['parsed_data'] ) )
							 && ( ! empty( $data_after_update['parsed_data']['arr'] ) )
				          ) {


 						/////////////////////////////////////////////////////////////////
						// This is means that we was parsed CSV and returned ARR  --  Showing CSV HTML table
						/////////////////////////////////////////////////////////////////
						ob_start();

							oper_show_table_for_list_arr( $data_after_update['parsed_data']['arr'] );

						$csv_html_table = ob_get_contents();
						ob_end_clean();


						oper_open_meta_box_section(  'oper_parced_csv_actions', __('Actions', 'email-reminders') );

							?><a class="button button-primary oper_csv2list_button" style="margin:0 0 5px;" href="javascript:void(0)"
							   title="<?php _e('Save to DB', 'email-reminders') ?>"
								 ><?php _e('Save to DB' , 'email-reminders') ?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-export" aria-hidden="true"></span></a><?php

 						oper_close_meta_box_section();

						?><div class="html_table_for_parsed_csv" style="display:block;"><?php
							echo $csv_html_table;
						?></div><?php

						?><div class="textarea_for_parsed_csv" style="display:none;"><?php
							$field_name = 'oper_products_csv_text';
							$field_value = get_oper_option('oper_history_validated_csv' );
							//$field_value = json_encode( $field_value );										// array('a' => 1, 'b' => 2 ... ) => {"a":1,"b":2 ...}

							$place_holder = str_replace( '|', get_oper_option( 'oper_csv_separator' ), __( 'ID | Title | Version Number | Desciption | Path (URL)', 'email-reminders' ) );
							$field = array(
											  'title' => ''
											, 'description' => ''
											, 'type' => 'textarea'
											, 'value' => empty( $updated_data ) ? $field_value : $updated_data[ 'validated_data' ]['csv']
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
				} else if ( 	( ! empty( $data_after_update['csv2arr'] ) )
							 && ( ! empty( $data_after_update['csv2arr']['arr'] ) )
				          ) {


					// Handy  save form fields names history
					if ( ! empty( $data_after_update['csv2arr']['arr'] ) ) {

						//$my_csv = new OPER_CSV_Parser();

						$first_item = $data_after_update['csv2arr']['arr'][0];
						$first_item_keys = array_keys( $first_item );

						$last_imported_fields = array();
						foreach ( $first_item_keys as $field_name ) {
							$last_imported_fields[ $field_name ] = array( 'type' => 'text' );
						}
						//$first_row_csv = implode( $my_csv->get_column_separator(), $first_item_keys );

						update_oper_option(  'oper_history_csv_last_import_headers', $last_imported_fields );
//debuge( '$first_item, $first_item_keys, $first_row_csv', $first_item, $first_item_keys, $first_row_csv );
//debuge( get_oper_option('oper_history_csv_last_import_headers') );
					}

					// Saving to Database
					$inserted_rows_num = oper_csv_arr__save_in_db( $data_after_update['csv2arr']['arr'] );

					$notice_id = 'oper_csv_data_db_saved_message_section';
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

		// Get content of uploaded CSV file
        if (  isset( $_POST[ $post_action_key ] )  && ( $_POST[ $post_action_key ] == 'csv_upload' )  ) {
        	$validated_url = OPER_Settings_API::validate_textarea_post_static( 'oper_url_to_csv_file' );

        	$file_content = oper_download_content_of_csv_file( $validated_url );

        	if ( ( ! empty( $file_content ) ) && ( ! is_wp_error($file_content) ) ){

				oper_show_message( __( 'Content of CSV file inserted.' . $validated_url , 'email-reminders' ), 3 );


//				global $wpdb;
//$maxp = $wpdb->query( 'SELECT @@global.max_allowed_packet as max_size' );
//debuge($maxp, 'tada');die();
//// to set the max_allowed_packet to 500MB
//$db->query( 'SET @@global.max_allowed_packet = ' . 500 * 1024 * 1024 );
// strlen($file_content) == 2 212 479
		        if ( strlen( $file_content ) < ( 1024 * 1024 ) ) {
			        $res = update_oper_option( 'oper_history_validated_csv', $file_content );
		        }

				// Its will  return  false as initial loading
				return array (   'csv_file_url' => $validated_url  ,  'csv_file_content' => $file_content );
			}
        }

        // FROM CSV
        if (  isset( $_POST[ $post_action_key ] )  && ( $_POST[ $post_action_key ] == 'csv_parse' )  ) {

        	/////////////////////////////////////////////////////////////////
        	// Validate POST
            $validated = array();
			$validated[ 'csv' ] 	  = OPER_Settings_API::validate_textarea_post_static( 'oper_products_csv_text' );
            $validated[ 'separator' ] = OPER_Settings_API::validate_text_post_static( 'oper_csv_separator_columns' );

            /////////////////////////////////////////////////////////////////
            // Parse CSV
	        $my_csv = new OPER_CSV_Parser();
	        $my_csv->set_csv_settings( $validated );
	        $data_arr = $my_csv->get_arr_from_csv( $validated['csv'] );

			oper_show_message( __( 'CSV parsed successfuly', 'email-reminders' ), 3 );
			if ( strlen( $validated['csv'] ) < ( 1024 * 1024 ) ) {
				update_oper_option( 'oper_history_validated_csv', $validated['csv'] );        // Save validated CSV - for auto inserting
			}
			// oper_show_fixed_message ( __('Done', 'email-reminders'), 3  );			//, 'updated warning' );                // Show Message
            return array (   'validated_data' => $validated  ,  'parsed_data' => $data_arr );
        }

        // From HTML CSV table
        if (  isset( $_POST[ $post_action_key ] )  && ( $_POST[ $post_action_key ] == 'csv2list' )  ) {

	        $validated              = array();
	        $validated['separator'] = ';';
	        $validated['csv']       = OPER_Settings_API::validate_textarea_post_static( 'oper_products_csv_text' );

            /////////////////////////////////////////////////////////////////
            // Parse CSV
	        $my_csv = new OPER_CSV_Parser();
	        $my_csv->set_csv_settings( $validated );
	        $data_arr = $my_csv->get_arr_from_csv( $validated['csv'] );

			return array (   'validated_data' => $validated  ,  'csv2arr' => $data_arr );

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

			// User  was selected some CSV file
			jQuery('.oper_url_to_csv_file').on(  "oper_upload_url_set", function( event ) {
//console.log( jQuery( this ).val() );
                    jQuery('#oper_action').val('csv_upload');
                    jQuery('#oper_send_links_form<?php //echo $submit_form_name; ?>').trigger( 'submit' );
					return false;
			});


            // On click submit form
            jQuery( '.oper_csv_import_button' ).on( 'click', function() {
				if ( jQuery( '.oper_csv_import_button' ).hasClass( 'disabled' ) ) {
					return false;	// Prevent submit form, if button disabled.
				}
                    jQuery('#oper_action').val('csv_parse');
                    jQuery('#oper_send_links_form<?php //echo $submit_form_name; ?>').trigger( 'submit' );
					return false;
            });

            // On click submit form
            jQuery( '.oper_csv2list_button' ).on( 'click', function() {
				if ( jQuery( '.oper_csv2list_button' ).hasClass( 'disabled' ) ){
					return false;	// Prevent submit form, if button disabled.
				}

				jQuery( '#oper_products_csv_text' ).val( oper_convert_table_to_csv( '#oper_list_table' ) );

				//jQuery( '.html_table_for_parsed_csv' ).hide();
				//jQuery( '.textarea_for_parsed_csv' ).show();
				jQuery( '#oper_action' ).val( 'csv2list' );
				jQuery( '#oper_send_links_form<?php //echo $submit_form_name; ?>' ).trigger( 'submit' );
				return false;

            });



            // Catch data for summary
            jQuery('#oper_products_csv_text').on( "keypress", function( event ) {
                if( event.which != 13) {
                    // oper_generate_send_info();
                    //return false;
                }
            });
            jQuery('#oper_products_csv_text').on( 'change', function(){
                // oper_generate_send_info();
            } );
            jQuery(document).ready( function(){
                // oper_generate_send_info();
            });

            jQuery('.oper_url_to_csv_file').on( 'change', function(){
                console.log( jQuery( this ).val() );
            } );






            //Allow enter key on textareas and submit buttons only
            jQuery(document).on( "keypress", ":input:not(textarea):not([type=submit])", function( event ) {
                if( event.which == 13) {
					if ( jQuery( '.oper_send_button' ).hasClass( 'disabled' ) ) {
						return false; // Prevent submit form, if button disabled.
					}
                    //alert('You pressed enter!');
                    jQuery('#oper_action').val('csv_parse');
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
			.oper_page .oper_csv_toolbar_message {
				font-weight: 600;
				font-size: 1.2em;
				padding: 0.5em;
				line-height: 1.2em;
			}
			input[type="text"].csv_separator_text_field{
				font-weight: 600;
				width: 5em;
				margin-right:2em;
				border: 1px solid #bbb;
				height:28px;
			}
 			#oper_products_csv_text {
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
			#oper_list2csv_textdata,
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
add_action('oper_menu_created', array( new OPER_Page_ContactsCSV() , '__construct') );    // Executed after creation of Menu