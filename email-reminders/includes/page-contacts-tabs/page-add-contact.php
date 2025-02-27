<?php /**
 * @version 1.0
 * @package 'email-reminders'
 * @category Content of Add New Contact
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-08
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/** Show Content
 *  Update Content
 *  Define Slug
 *  Define where to show
 */
class OPER_Page_ContactsAddNew extends OPER_Page_Structure {

    public function in_page() {
        return 'oper-contacts';
    }

    public function tabs() {

        $tabs = array();
        $tabs[ 'contacts-add' ] = array(
                              'title'		=> __( 'Add New', 'email-reminders' )						// Title of TAB
                            , 'hint'		=> __( 'Add New', 'email-reminders' )						// Hint
                            , 'page_title'	=> __( 'Add New', 'email-reminders' )			// Title of Page
                            , 'link'		=> ''								// Can be skiped,  then generated link based on Page and Tab tags. Or can  be extenral link
                            , 'position'	=> ''                               // 'left'  ||  'right'  ||  ''
                            , 'css_classes' => ''                               // CSS class(es)
                            , 'icon'		=> ''                               // Icon - link to the real PNG img
                            , 'font_icon'	=> 'glyphicon glyphicon-plus'			// CSS definition  of forn Icon
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

        $submit_form_name = 'oper_contact_form_add_new';                             // Define form name

		$data_after_update = false;
        if ( isset( $_POST['is_form_submitted_'. $submit_form_name ] ) ) {

            // Nonce checking    {Return false if invalid, 1 if generated between, 0-12 hours ago, 2 if generated between 12-24 hours ago. }
            $nonce_gen_time = check_admin_referer( 'oper_settings_page_' . $submit_form_name  );  // Its stop show anything on submiting, if its not refear to the original page

            // Save Changes
            $data_after_update = $this->update();
        }

        $this->show_toolbar();

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Content
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 		?><form  name="<?php echo $submit_form_name; ?>" id="<?php echo $submit_form_name; ?>" action="" method="post" ><?php

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
                ?><input type="hidden" name="is_form_submitted_<?php echo $submit_form_name; ?>" id="is_form_submitted_<?php echo $submit_form_name; ?>" value="1" />

                <div class="clear" style="margin-bottom:0px;"></div>

				<input type="hidden" name='oper_action'  id='oper_action' value="add_new_contact" />

				<?php if (		( empty( $data_after_update ) )
							||  ( true )
						) { ?>
					<?php //oper_open_meta_box_section( 'oper_xls_content', __('Add New', 'email-reminders') );  ?>
					<div style="width:100%;margin:auto;" class="oper_add_new_contact">
					<?php

						$custom_form_name = '';																			// Standard			//get_oper_option( 'oper_contacts_default_edit_form' );
						if ( function_exists( 'oper_cf__get_form_name__if_selected' ) ) {
							$custom_form_name = oper_cf__get_form_name__if_selected();							// Custom  Form  Name,  if selected $_GET['contact_form_name'] and it exist.
						}

						// Get content of Contact-Form
						$oper_contact_form_value = oper_contact_form_get_content( $custom_form_name );

						// Add hidden field with name of Custom Contact-Form
						if ( function_exists( 'oper_cf__add_hidden_field' ) ){
							$oper_contact_form_value .= oper_cf__add_hidden_field( $custom_form_name );
						}

						// Show via PHP direct echo
						$pattern     = '/(\[)([^\]]+)(\])/i';
						$replacement = '$2';
						$oper_contact_form_value_without_shortcodes = preg_replace( $pattern, $replacement, $oper_contact_form_value );
						echo( $oper_contact_form_value_without_shortcodes );

						// Show via  JavaScript, jQuery insert, like in the 		function oper_contact_fill_edit_form(  ...
						if (0){
						?>
						<script type="text/javascript">
							jQuery(document).ready(function(){

								var ajx_contact_form_html = <?php echo wp_json_encode( $oper_contact_form_value ); ?>;

								// Replace other shortcodes, like [some_name] to some_name		But this shortcode [some_name][] will be replaced to  some_name[]
								ajx_contact_form_html = ajx_contact_form_html.replace( /(\[)([^\]]+)(\])/gi, '$2' );

								jQuery('.oper_add_new_contact').html( ajx_contact_form_html )
							});
					 	</script>
						<?php
						}
					?>
					</div>
					<?php //oper_close_meta_box_section();
				}
				?>
                <div class="clear"></div>
                <input type="submit" value="<?php _e('Add New', 'email-reminders'); ?>" class="button button-primary oper_submit_button" />
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

        // xls_parse
        if (  isset( $_POST[ $post_action_key ] )  && ( $_POST[ $post_action_key ] == 'add_new_contact' )  ) {

        	/////////////////////////////////////////////////////////////////
        	// Validate POST
            $validated = array();
//	        $validated['xls_headers'] = OPER_Settings_API::validate_text_post_static( 'oper_products_xls_headers' );
//	        $validated['xls']         = OPER_Settings_API::validate_textarea_post_static( 'oper_products_xls_text' );
			////////////////////////////////////////////////////////////////////////////////////////////////////////////

	        $skip_system_fields = array(
		        '_wpnonce',
		        '_wp_http_referer',
		        'is_form_submitted_oper_contact_form_add_new',
		        'oper_action'
	        );

	        // Get all Fields for 'data'
	        $contact_data_arr = array();
	        foreach ( $_POST as $post_key => $post_value ) {

		        if ( ! in_array( $post_key, $skip_system_fields ) ) {

			        $contact_data_arr[ $post_key ] = $post_value;
		        }
			}
			// Get 'note'
			$contact_note = '';
			if ( isset( $contact_data_arr['note'] ) ) {
				$contact_note = trim( $contact_data_arr['note'] );
				unset( $contact_data_arr['note'] );
				$contact_note = ( 'null' == $contact_note ) ? '' : $contact_note;
			}
			// Get 'source'
			$contact_source = '';
			if ( isset( $contact_data_arr['source'] ) ) {
				$contact_source = trim( $contact_data_arr['source'] );
				unset( $contact_data_arr['source'] );
			}

			// Save info  about the Custom Contact-Form that was used to add this contact
	        if ( function_exists( 'oper_cf__is_exist' ) ) {
		        if ( ! empty( $_REQUEST['contact_form_name'] ) ) {

			        $custom_form_name_slug = trim( stripslashes( $_REQUEST['contact_form_name'] ) );

			        $is_exist = oper_cf__is_exist( $custom_form_name_slug );
			        if ( $is_exist ) {
				        $contact_data_arr['__custom_form__'] = $custom_form_name_slug;
			        }
		        }
	        }

			////////////////////////////////////////////////////////////////////////////////////////////////////////////

	        $sql_values_num = 0;
	        $sql_values     = array();
	        $sql_args       = array();

	        //				'  data, source, create_date, note'
			$sql_values[] = '( %s , %s, %s, %s )';
//debuge('ORIG $contact_data_arr',$contact_data_arr);
			// Escaping 'data'
			if (1) {
				// Escape string from SQL for the HTML form field
				foreach ( $contact_data_arr as $cd_key => $cd_value ) {
					// If we will  not make this clean,  then QUOTE: "-'  will be saved as	\"-\' (even after  using oper_convert_arr_to_db_datavalue(...) function)
					$contact_data_arr[ $cd_key ] = oper_clean_string_for_form( $cd_value );
				}
//debuge('ESC $contact_data_arr',$contact_data_arr);
				// Convert associated array of data to  string for saving into DB data field  - id^7~booking_type^Apartment#3~status^Approved~dates^2019-10-08 00:00:00....
				$sql_args[]   = oper_convert_arr_to_db_datavalue( $contact_data_arr );
			}
//debuge($sql_args);die;
			$sql_args[]   = ( empty( $contact_source ) ? 'admin_adding' : $contact_source );
			$sql_args[]   = date_i18n( 'Y-m-d H:i:s' );
			$sql_args[]   = $contact_note;

			$sql_values_num += oper_csv_sql_contacts_insert_rows(  $sql_values, $sql_args , 'data, source, create_date, note' );

			return $sql_values_num;

			// oper_redirect(  admin_url( 'admin.php' ) . '?page=oper-contacts&tab=contacts-csv' );
			// oper_show_message( __( 'XLS parsed successfuly', 'email-reminders' ), 3 );
        }

        return false;
    }

	private function show_toolbar(){

		oper_flex_toolbar_sub_html_container_start( 'settings-contact-add-new' );                                      	// Load functionality in Addons via Hooks

			oper_flex_toolbar_group_start( array( 'class' => 'group_nowrap' ) );
			/**
			 *
				?>
				<a href="javascript:void(0)" class="button button-primary oper_contact_form_reset_button disabled"
				   title="<?php _e( 'Add New', 'email-reminders' ); ?>" >
					<span class="in-button-text"><?php _e( 'Add New', 'email-reminders' ); ?>&nbsp;</span>
					<span class="wpdevelop"><i class="glyphicon glyphicon glyphicon-plus"></i></span>
				</a>
				<?php
			*/
			oper_flex_toolbar_group_end();

		oper_flex_toolbar_sub_html_container_end( 'settings-contact-add-new' );                                        	// Load functionality in Addons via Hooks
	}

    public function js() {
        ?>
        <script type="text/javascript">

	        jQuery(document).ready(function(){

	        	// Load Specific Custom Contact-Form
				jQuery( '#oper_contact_form_custom_forms_select' ).on( 'change', function (){

						var selected_form = jQuery( '#oper_contact_form_custom_forms_select option:selected' ).val();
						if ( '' != selected_form ) {
							selected_form = '&contact_form_name=' + selected_form;
						}
						window.location.href = '<?php echo oper_get_contacts_url(); ?>&tab=contacts-add' + selected_form;
					}
				);

		 	});

			//Allow enter key on textareas and submit buttons only
			jQuery( document ).on( "keypress", ":input:not(textarea):not([type=submit])", function ( event ){
				if ( event.which == 13 ){
					if ( jQuery( '.oper_send_button' ).hasClass( 'disabled' ) ){
						return false;
					}
					jQuery( '#oper_action' ).val( 'xls_parse' );
					jQuery( '#oper_send_xls_form' ).trigger( 'submit' );
					return false;
				}
			} );
        </script>
        <?php
    }

    public function css() {
        ?>
        <style type="text/css">
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
add_action('oper_menu_created', array( new OPER_Page_ContactsAddNew() , '__construct') );    // Executed after creation of Menu


/**
 * Add new contact
 *
 * @param        $contact_data_arr	- array of contact data
 * @param string $contact_note		- just some note for the contact
 * @param bool   $is_silent			- is show messages
 *
 * @return bool|int
 *
 Example:
 *
 	$contact_data_arr = array();
	$contact_data_arr['name']       = 'John';
	$contact_data_arr['secondname'] = 'Smith';
	$contact_data_arr['check_in']   = date_i18n( 'Y-m-d 15:00', strtotime( 'TODAY + 7 DAYS' ) );
	$contact_data_arr['check_out']  = date_i18n( 'Y-m-d 09:00', strtotime( 'TODAY + 14 DAYS' ) );
	$contact_data_arr['visitors']   = '2';
	$contact_data_arr['children']   = '0';
	$contact_data_arr['email']      = 'smith.reminder@wpbookingcalendar.com';
	$contact_data_arr['phone']      = '(000) 100-20-30';
	$contact_data_arr['_country']   = 'UK';
	$contact_data_arr['_city']      = 'London';
	$contact_data_arr['details']    = 'Example. Contact for testing.';

    $how_many = oper_add_new_contact( $contact_data_arr );
 */
function oper_add_new_contact( $contact_data_arr, $contact_note = '', $is_silent = true ) {

	$sql_values_num = 0;
	$sql_values     = array();
	$sql_args       = array();

	//				'  data, source, create_date, note'
	$sql_values[] = '( %s , %s, %s, %s )';

	// Escaping 'data'
	if ( 1 ) {
		// Escape string from SQL for the HTML form field
		foreach ( $contact_data_arr as $cd_key => $cd_value ) {
			// If we will  not make this clean,  then QUOTE: "-'  will be saved as	\"-\' (even after  using oper_convert_arr_to_db_datavalue(...) function)
			$contact_data_arr[ $cd_key ] = oper_clean_string_for_form( $cd_value );
		}
		// Convert associated array of data to  string for saving into DB data field  - id^7~booking_type^Apartment#3~status^Approved~dates^2019-10-08 00:00:00....
		$sql_args[] = oper_convert_arr_to_db_datavalue( $contact_data_arr );
	}

	$sql_args[] = ( empty( $contact_source ) ? 'admin_adding' : $contact_source );
	$sql_args[] = date_i18n( 'Y-m-d H:i:s' );
	$sql_args[] = $contact_note;


	$sql_values_num += oper_csv_sql_contacts_insert_rows( $sql_values, $sql_args, 'data, source, create_date, note', $is_silent );

	return $sql_values_num;
}