<?php
/*
Plugin Name: Email Reminders - Multiple Custom Email Templates
Plugin URI: https://oplugins.com/plugins/clientsmanager/#premium
Description: Addon for "Email Reminders" plugin,  that  provide functionality of creation several custom email templates
Contributors: wpdevelop, oplugins
Author URI: https://oplugins.com/
Text Domain: email-reminders-custom-emails
Domain Path: /languages/
Version: 1.0.0
Require: Email Reminders ( update 1.0  or newer)
*/

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


/**
 * Replace ->
 *              _cf_  -> _ce_
 *              _CUSTOM_FORM_    ->  _CUSTOM_EMAIL_
 *              _email_template_   ->  _email_template_
 *              email_template     ->  email_template  
 *              _custom_email_    ->  _custom_email_
 *              custom_email      ->  custom_email   
 *
 *
 */


	/**
	 * 	Explanation  of Emails Data saving  in    get_oper_option( 'oper_email_template__custom_emails' )  &  get_oper_option( 'oper_email_' . EMAIL_NAME )
	 *
	 *  Our custom  emails have to be saved as  options:
	 * 		1. Email template   	:	get_oper_option( OPER_EMAIL_EML_RE_PREFIX . EMAIL_NAME )
	 * 		2. All custom email names: 	get_oper_option( 'oper_email_template__custom_emails' )
	 *
	 *  And relative point #1   'oper_email_' 	its 	OPER_EMAIL_EML_RE_PREFIX     which is defined in  page-emails.php as:
	 * 			if ( ! defined( 'OPER_EMAIL_EML_RE_PREFIX' ) )   define( 'OPER_EMAIL_EML_RE_PREFIX',  'oper_email_' ); 					// Its defined in api-emails.php file & its same for all emails, here its used only for easy coding...
	 *
	 *  So  basically,  here is how we can  get  email template data:
	 * 		get_oper_option( OPER_EMAIL_EML_RE_PREFIX . EMAIL_NAME )
	 *
	 */

	/**
	 * Default Email template is get_oper_option( OPER_EMAIL_EML_RE_PREFIX . 'eml_reminders' );

		Array (
				[enabled] => On
				[copy_to_admin] => On
				[from] => info@clientsmanager.com
				[from_name] => John Smith Support
				[subject] => Delivery of [product_title] [product_version]
				[content] => 		Hello.
									Thank you for requesting [product_title] [product_version]

									To download [product_description] click the link below:
									---
									[product_summary] - [product_expire_date]
									---

									Thank you, [siteurl]
									[current_date] [current_time]
				[header_content] =>
				[footer_content] =>
				[template_file] => plain
				[base_color] => #557da1
				[background_color] => #f5f5f5
				[body_color] => #fdfdfd
				[text_color] => #505050
				[email_content_type] => html
			)
	 //debuge( get_oper_option( OPER_EMAIL_EML_RE_PREFIX . 'eml_reminders' ) );

	 */

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Actions  on  Custom  Emails
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Get content of custom email
	 *
	 * @param string $custom_email_name_slug
	 * @param string $what	'enabled' | ...
											Array (
													[enabled] => On
													[copy_to_admin] => On
													[from] => info@clientsmanager.com
													[from_name] => John Smith Support
													[subject] => Delivery of [product_title] [product_version]
													[content] => 		Hello.
																		Thank you for requesting [product_title] [product_version]

																		To download [product_description] click the link below:
																		---
																		[product_summary] - [product_expire_date]
																		---

																		Thank you, [siteurl]
																		[current_date] [current_time]
													[header_content] =>
													[footer_content] =>
													[template_file] => plain
													[base_color] => #557da1
													[background_color] => #f5f5f5
													[body_color] => #fdfdfd
													[text_color] => #505050
													[email_content_type] => html
												)
	 */
	function oper_ce__get( $custom_email_name_slug, $what = 'content' ){

		$is_exist = oper_ce__is_exist( $custom_email_name_slug );

		if ( $is_exist ) {
			$custom_email_data = get_oper_option( OPER_EMAIL_EML_RE_PREFIX . $custom_email_name_slug );
			$custom_email_data = maybe_unserialize( $custom_email_data );

			return $custom_email_data[ $what ];

		} else {
			return false;
		}
	}


	/**
	 * Update content of custom email
	 *
	 * @param string $custom_email_name_slug
	 * @param string $email_data	   				array( 'email' => '', 'title' => '', 'name' => '' )
	 *
	 * Usage:
	 *       Update content of exist email:
	 *                                        oper_ce__update( 'name_of_exist_email', array( 'email' => 'update this HTML email content' ) );
	 * 									  ||  oper_ce__update( 'name_of_exist_email', array( 'title' => 'new Title' ) );
	 *       Add new email:
	 * 									  oper_ce__update( 'new_email_name', array( 'name' => 'new_email_name', 'title' => 'New Email nAme', 'email' => 'HTML email  content' ) );
	 */
	function oper_ce__update( $custom_email_name_slug, $email_data = array() ){

		$is_exist = oper_ce__is_exist( $custom_email_name_slug );

		if ( $is_exist ) {
			$default_data = get_oper_option( OPER_EMAIL_EML_RE_PREFIX . $custom_email_name_slug );
			$default_data = maybe_unserialize( $default_data );
		} else {
			$default_data = array(
//				'title' => $custom_email_name_slug,
//				'name'  => $custom_email_name_slug,
//				'email'  => ''
			);
			$custom_email_name_slug = '';	// Previously  this email was not existing,  so  we will  add it to  the 'oper_email_template__custom_emails' option.
		}

		$email_data = wp_parse_args( $email_data, $default_data );

		/**
		 * Trick  here of using $email_data['name'] instead of $custom_email_name_slug, its give ability to rename SLUG of email,  as well
		 */

		update_oper_option( OPER_EMAIL_EML_RE_PREFIX . $email_data['name'],  $email_data );					// Save Changes


		// Rename || Add New  	( above trick code		$custom_email_name_slug = ''    also    $email_data['name']	is defined  )
		if ( $custom_email_name_slug !== $email_data['name'] ) {

			// Delete Old Custom Email
			delete_oper_option( OPER_EMAIL_EML_RE_PREFIX . $custom_email_name_slug );

			$all__custom_emails = get_oper_option( 'oper_email_template__custom_emails' );

			// First Time Creation ?
			if ( false === $all__custom_emails ) {
				$all__custom_emails = array();
			} else {
				$all__custom_emails = maybe_unserialize( $all__custom_emails );
			}

			// Delete name of Old Form	-- 	R E N A M I N G  process
			foreach ( $all__custom_emails as $ce_index => $ce_form_name ) {
				if (  $custom_email_name_slug == $ce_form_name ) {
					unset( $all__custom_emails[ $ce_index ] );
				}
			}


			// Add Name of new email
			$all__custom_emails[] = $email_data['name'];

			// Save
			update_oper_option( 'oper_email_template__custom_emails', $all__custom_emails );
		}
	}


	/**
	 * Delete custom email exist with this name
	 *
	 * @param $custom_email_name_slug
	 *
	 * @return bool
	 */
	function oper_ce__delete( $custom_email_name_slug ) {

		$is_email_deleted = oper_ce__is_exist( $custom_email_name_slug );

		if ( $is_email_deleted ) {

			$is_email_deleted = delete_oper_option( OPER_EMAIL_EML_RE_PREFIX . $custom_email_name_slug );

			// Update all custom emails list
			if (1) {
				$all__custom_emails = get_oper_option( 'oper_email_template__custom_emails' );
				// First Time Creation ?
				if ( false === $all__custom_emails ) {
					$all__custom_emails = array();
				} else {
					$all__custom_emails = maybe_unserialize( $all__custom_emails );
				}

				// Delete name of Old Email	-- 	R E N A M I N G  process
				foreach ( $all__custom_emails as $ce_index => $ce_form_name ) {
					if (  $custom_email_name_slug == $ce_form_name ) {
						unset( $all__custom_emails[ $ce_index ] );
					}
				}

				// Save
				update_oper_option( 'oper_email_template__custom_emails', $all__custom_emails );
			}
		}

		if ( false === $is_email_deleted ) {
			return false;
		} else {
			return true;
		}
	}


	/**
	 * Check if custom email exist with this name
	 *
	 * @param $custom_email_name_slug
	 *
	 * @return bool
	 */
	function oper_ce__is_exist( $custom_email_name_slug ) {

		$is_custom_email = false;

		if ( '' != $custom_email_name_slug ) {

			$is_custom_email = get_oper_option( OPER_EMAIL_EML_RE_PREFIX . $custom_email_name_slug );

			$is_custom_email = ( false === $is_custom_email ) ? false : true;
		}
		return $is_custom_email;
	}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Get  Email
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Get all  available custom  Contact-Emails   and  Clean update option 'oper_email_template__custom_emails'
	 * if some emails does not exist, during each  call  of this function
	 *
	 * @return array        array( '' => 'Default', 'store' => 'Store custom  email', ... )
	 */
	function oper_ce__get_all_custom_emails_as_arr(){

		$field_options = array( '' => __( 'Default', 'email-reminders' ) );

		$all__custom_emails = get_oper_option( 'oper_email_template__custom_emails' );

		if ( false !== $all__custom_emails ) {

			$all__custom_emails = maybe_unserialize( $all__custom_emails );

			if ( ! is_array( $all__custom_emails ) ) {
				$all__custom_emails = array();
			}

			$all__custom_emails = array_unique( $all__custom_emails );

			$all__custom_emails_optimized = array();

			foreach ( $all__custom_emails as $custom_email_name ) {

				if ( ! empty( $custom_email_name ) ) {

					// in Custom Forms we was showing Titles,  but here we are showing Name Slugs from  the get_oper_option( 'oper_email_template__custom_emails' );
					$email_title = $custom_email_name;		//oper_ce__get( $custom_email_name, 'title' );

					$is_email_exist = oper_ce__is_exist( $custom_email_name );

					if ( ( false !== $email_title ) && ( $is_email_exist ) ) {
						$field_options[ $custom_email_name ] = $email_title;
						$all__custom_emails_optimized[]=$custom_email_name;
					}

				}
			}

			update_oper_option( 'oper_email_template__custom_emails', $all__custom_emails_optimized );			// Optimize - remove duplicates names and not exist email names
		}

		return $field_options;
	}


	/**
	 * Get custom email name, if email selected in URL: $_GET['email_template_name'],  otherwise return '' (for default Contact-Email)
	 */
	function oper_ce__get_email_name__if_selected() {

		if ( ! empty( $_GET['email_template_name'] ) ) {

			$email_name = trim( stripslashes( $_GET['email_template_name'] ) );

			$is_exist = oper_ce__is_exist( $email_name );

			if ( $is_exist ) {
				return $email_name;
			}
		}

		return '';
	}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Update		-		Add | Update
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	/**
	 * Add NEW Custom Email - submit action - $_POST['oper_action'] = 'add_new_custom_email'
	 *
	 * @param $page
	 */
	function oper_ce__post__add_custom_email( $page ){

		if ( 'oper_settings_email_template' == $page ) {
			if ( isset( $_POST['oper_action'] ) && (  'add_new_custom_email' == $_POST['oper_action'] ) ) {

				$email_title   = trim( stripslashes( $_POST['oper_email_template__new_name'] ) );
				// $email_content = trim( stripslashes( $_POST['oper_email_template_textarea'] ) );

				// 1. Slug /////////////////////////////////////////////////////////////////////////////////////////////

				// option_name in wp_options table size is 191. 	Maximum name of such custom email can be:  	oper_email_NAME = 191 - 11 = 180  >>  we set max length 150

				$email_title = substr( $email_title, 0, 150 );           					// Email name no longer than 30 symbols

				$new_name_slug = oper_get_slug_format( $email_title );               	// Remove all symbols, which can  generate an issues

				$new_name_slug = str_replace( '+', 'plus', $new_name_slug );			// If the Name of Custom  email contain "+" symbol, it can generate issue, of not loading custom email.

				$new_name_slug = str_replace( '-', '_', $new_name_slug );

				// 2. Errors ///////////////////////////////////////////////////////////////////////////////////////////
				if ( empty( $new_name_slug ) ) {

					oper_show_message( __( 'Error!', 'email-reminders' ) . ' ' . __( 'Empty email name.', 'email-reminders' ), 5, 'error' );
					return;
				}

				$is_exist = oper_ce__is_exist( $new_name_slug );
				if ( $is_exist ) {

					oper_show_message( __( 'Error!', 'email-reminders' ) . ' ' .   sprintf( __( 'Email %s with this name %s already exist.', 'email-reminders' )
																						   , '<strong>' . $email_title . '</strong>'
																						   , '<strong>"' . $new_name_slug . '"</strong>'
																				   )
									, 15, 'error' );
					return;
				}

//// 3. Create Email  /////////////////////////////////////////////////////////////////////////////////////
oper_ce__update( $new_name_slug
						, array(
							//'title' => $email_title,
							'name'  => $new_name_slug
							//'email'  => $email_content
						)
);

				oper_show_changes_saved_message();

				$_GET['email_template_name'] = $new_name_slug;

				// 4. Reload Page
				?><script type="text/javascript"> window.location.href = '<?php echo oper_ce__get_page_url() . '&email_template_name=' . $new_name_slug; ?>'; </script><?php
			}
		}
	}
	add_action( 'oper_settings_page_update', 'oper_ce__post__add_custom_email' );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  A J A X		-		Delete
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Ajax JavaScript functions	-	definition
	 */
	function oper_ce__ajax_js( $page ){

		if ( 'oper_settings_email_template' == $page) {
			?>
			<script type="text/javascript">
				/**
				 * Delete custom contact email with specific 'name' slug  -  Send Ajax
				 */
				function oper_email_template__custom_email__ajx_delete( email_template_name_slug ){

				//console.log( 'Delete contact: ' +  email_template_name_slug );

					var jq_el = jQuery( '.oper_email_template_custom_email_delete_button' );
					var params_obj = {};
					params_obj.user_id = jq_el.attr( 'data-user-id' );
					params_obj.nonce = jq_el.attr( 'data-nonce' );
					params_obj.locale = jq_el.attr( 'data-locale' );

					// Start Ajax
					jQuery.post( oper_global1.oper_ajaxurl,
								{
										action        : 'OPER_CUSTOM_EMAIL_DELETE',
										user_id       : params_obj.user_id,
										nonce         : params_obj.nonce,
										locale		  : params_obj.locale,

										email_template_name 	  : email_template_name_slug
								},
								/**
								 * S u c c e s s
								 *
								 * @param response_data		-	its object returned from  Ajax - class-live-searcg.php
								 * @param textStatus		-	'success'
								 * @param jqXHR				-	Object
								 */
								function ( response_data, textStatus, jqXHR ) {
									//console.log( 'Response AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

									if (  'OK' == response_data[ 'ajx_process' ] ){
										oper_admin_show_message( response_data[ 'ajx_message' ], 'warning', 3000 );

										setTimeout( function (){
											// Reload page
											window.location.href = '<?php echo oper_ce__get_page_url(); ?>';
										}, 3000 );

									} else {
										oper_admin_show_message( '<strong>' + 'Error!' + '</strong> ' + response_data['ajx_message'], 'error', 3000 );
									}

 									// jQuery( '#ajax_respond' ).html( response_data );		// For ability to show response, add such DIV element to page
								}
							  ).fail( function ( jqXHR, textStatus, errorThrown ) {    if ( window.console && window.console.log ){ console.log( 'Ajax_Error', jqXHR, textStatus, errorThrown ); }

									oper_admin_show_message(  '<strong>' + 'Error!' + '</strong> ' + errorThrown , 'error', 3000 );
							  })
							  // .done(   function ( data, textStatus, jqXHR ) {   if ( window.console && window.console.log ){ console.log( 'second success', data, textStatus, jqXHR ); }    })
							  // .always( function ( data_jqXHR, textStatus, jqXHR_errorThrown ) {   if ( window.console && window.console.log ){ console.log( 'always finished', data_jqXHR, textStatus, jqXHR_errorThrown ); }     })
							  ;  // End Ajax
				}
			</script>
			<?php
		}
	}
	add_action( 'oper_hook_settings_page_footer', 'oper_ce__ajax_js');


	/**
	 * Ajax - Delete Custom Contact Email
	 */
	function ajax_OPER_CUSTOM_EMAIL_DELETE(){

		if ( ! isset( $_POST['email_template_name'] ) || empty( $_POST['email_template_name'] ) ) { exit; }

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Security
		$action_name    = 'oper_delete_custom_email' . '_opernonce';                                                         // $_POST['element_id'] . '_opernonce';
		$nonce_post_key = 'nonce';																							// Its key  of post $_POST[ $nonce_post_key ],  where we transfer value to  check
		$result_check   = check_ajax_referer( $action_name, $nonce_post_key );


		// Clean  params
		$request_params = oper_get_clean_or_default_request_params(
			array(
					'email_template_name' => array( 'validate' => 's', 'default' => '' )
			),
			$request_prefix = false
		);

		$is_deleted = oper_ce__delete( $request_params['email_template_name'] );

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
		if ( $is_deleted ) {
			wp_send_json( array(
								'ajx_process'           => 'OK',
								'ajx_message' => sprintf( __( 'Email %s have been deleted successfully.', 'email-reminder' ), '<strong>' . $request_params['email_template_name'] . '</strong>' ),
								'ajx_email_template_name' => $request_params['email_template_name']
						) );
		} else {
			wp_send_json( array(
								'ajx_process' => 'ERROR',
								'ajx_message' => sprintf( __( 'Email %s do not exist', 'email-reminder' ), '<strong>' . $request_params['email_template_name'] . '</strong>' )
						) );
		}

	}
	add_action( 'wp_ajax_'		 	 . 'OPER_CUSTOM_EMAIL_DELETE', 'ajax_' . 'OPER_CUSTOM_EMAIL_DELETE' );					// Admin & Client (logged in usres)
	// add_action( 'wp_ajax_nopriv_' . 'OPER_CUSTOM_EMAIL_DELETE', 'ajax_' . 'OPER_CUSTOM_EMAIL_DELETE' );					// Client         (not logged in)


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Settings General
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Settings Option - Selection  of default Contact-Email
	 *
	 * @param $fields
	 * @param $default_options_values
	 */
	function oper_ce__settings_after_contacts_editing_via( $fields, $default_options_values ){

		$fields['oper_contacts_default_email_template'] = array(
								  'type'        => 'select'
								, 'group'       => 'general'
								, 'default'     => ''//$default_options_values['oper_contacts_editing_default_email']
								, 'options'     => oper_ce__get_all_custom_emails_as_arr()
								, 'title'       => __('Default email template', 'email-reminders')
								, 'description' => __('Select default email template.' , 'email-reminders')
													   .' '. sprintf(
																	__('You can  configure %sCustom Email%s %shere%s', 'email-reminders'),
																	'<strong>', '</strong>',
																	'<a href="' . oper_get_settings_url() . '&tab=email' . '">', '</a>'
																)
								, 'description_tag' => 'p'
						);

		return $fields;
	}
	//add_filter( 'oper_settings_after_contacts_editing_via', 'oper_ce__settings_after_contacts_editing_via' , 10, 2 );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  HTML UI  &&  JS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//TODO: function 'oper_ce__toolbar_select_email_only' can  be deleted,  but can  be useful,  also

	/**
	 * Show Custom Contact Emails 'Select' only,  without buttons
	 *
	 * @param string $page
	 */
	function oper_ce__toolbar_select_email_only( $page ){

		if ( '0settings-contact-add-new0' == $page ) {

			oper_flex_toolbar_group_start();

				$field_options = oper_ce__get_all_custom_emails_as_arr();

				$field_id = 'oper_email_template_custom_emails_select';
				?>
				<label  for="<?php echo $field_id; ?>" class="oper_email_template_exist" ><?php _e('Email template', 'email-reminders'); ?></label>
				<select id="<?php echo $field_id; ?>" name="<?php echo $field_id; ?>" class="oper_email_template_exist <?php echo $field_id; ?>" autocomplete="off" style="width:20em;">
					<?php
					foreach ( $field_options as $field_val => $field_title ) {

						$is_selected = '';
						if ( $field_val == $_GET['email_template_name'] ) {
							$is_selected = ' selected="selected" ';
						}

						?><option value="<?php echo $field_val; ?>" <?php echo $is_selected; ?> ><?php echo $field_title; ?></option><?php
					}
					?>
				</select>
				<?php
				if( 0 ) {
					?>
					<a href="javascript:void(0)" class="button button-secondary oper_email_template_custom_email_reload_button disabled"
						   data-nonce="<?php echo wp_create_nonce( $nonce_name = 'oper_reload_custom_email' . '_opernonce' ); ?>"
						   data-user-id="<?php echo get_current_user_id(); ?>"
						   data-locale="'<?php echo get_user_locale(); ?>'"
					   title="<?php _e( 'Load Email', 'email-reminders' ); ?>" >
						<span class="in-button-text"><?php _e( 'Load Email', 'email-reminders' ); ?>&nbsp;</span>
						<span class="wpdevelop"><i class="glyphicon glyphicon glyphicon-refresh"></i></span>
					</a>
					<?php
				}
			oper_flex_toolbar_group_end();
		}
	}
	add_action( 'oper_flex_toolbar_start', 'oper_ce__toolbar_select_email_only');


	/**
	 * Show Custom Contact Emails 'Select' | 'Del' | 'Add' buttons for toolbar
	 *
	 * @param string $page
	 */
	function oper_ce__toolbar_select_and_buttons( $page ){

		if ( 'settings-email-template' == $page ) {

			oper_flex_toolbar_group_start();

				$field_options = oper_ce__get_all_custom_emails_as_arr();

				$field_id = 'oper_email_template_custom_emails_select';
				?>
				<label  for="<?php echo $field_id; ?>" class="oper_email_template_exist" ><?php _e('Email template', 'email-reminders'); ?></label>
				<select id="<?php echo $field_id; ?>" name="<?php echo $field_id; ?>" class="oper_email_template_exist <?php echo $field_id; ?>" autocomplete="off" style="width:20em;">
					<?php
					foreach ( $field_options as $field_val => $field_title ) {

						$is_selected = '';
						if ( ( isset( $_GET['email_template_name'] ) ) && ( $field_val == $_GET['email_template_name'] ) ){
							$is_selected = ' selected="selected" ';
						}

						?><option value="<?php echo $field_val; ?>" <?php echo $is_selected; ?> ><?php echo $field_title; ?></option><?php
					}
					?>
				</select>
				<a href="javascript:void(0)" class="button button-secondary oper_email_template_exist oper_email_template_custom_email_delete_button disabled"
					   data-nonce="<?php echo wp_create_nonce( $nonce_name = 'oper_delete_custom_email' . '_opernonce' ); ?>"
					   data-user-id="<?php echo get_current_user_id(); ?>"
					   data-locale="'<?php echo get_user_locale(); ?>'"
				   title="<?php _e( 'Delete Email', 'email-reminders' ); ?>" >
					<span class="in-button-text"><?php _e( 'Delete Email', 'email-reminders' ); ?>&nbsp;</span>
					<span class="wpdevelop"><i class="glyphicon glyphicon glyphicon-trash"></i></span>
				</a>
				<a href="javascript:void(0)" class="button button-secondary oper_email_template_exist oper_email_template_custom_email_addnew_button"
				   title="<?php _e( 'Add New Email', 'email-reminders' ); ?>" >
					<span class="in-button-text"><?php _e( 'Add New Email', 'email-reminders' ); ?>&nbsp;</span>
					<span class="wpdevelop"><i class="glyphicon glyphicon glyphicon-plus"></i></span>
				</a>

				<?php $field_id = 'oper_email_template_custom_email_name_text'; ?>
				<input type="text" autocomplete="off"
					   placeholder="<?php _e( 'Enter name of new email', 'email-reminders' ); ?>"
					   id="<?php echo $field_id; ?>"
					   class="oper_email_template_will <?php echo $field_id; ?>"
					   maxlength="150"
					   data-nonce="<?php //echo wp_create_nonce( $nonce_name = $live_field_id . '_opernonce' ); ?>"
					   data-user-id="<?php //echo get_current_user_id(); ?>"
				/>
				<a href="javascript:void(0)" class="button button-primary oper_email_template_will oper_email_template_custom_email_save_button"
				   title="<?php _e( 'Create', 'email-reminders' ); ?>" >
					<span class="in-button-text"><?php _e( 'Create', 'email-reminders' ); ?>&nbsp;</span>
					<span class="wpdevelop"><i class="glyphicon glyphicon glyphicon-plus"></i></span>
				</a>
				<a href="javascript:void(0)" class="button button-secondary oper_email_template_will oper_email_template_custom_email_cancel_button"
				   title="<?php _e( 'Cancel', 'email-reminders' ); ?>" >
					<span class="in-button-text"><?php _e( 'Cancel', 'email-reminders' ); ?>&nbsp;</span>
					<span class="wpdevelop"><i class="glyphicon glyphicon glyphicon-remove"></i></span>
				</a>
				<?php

			oper_flex_toolbar_group_end();
		}
	}
	add_action( 'oper_flex_toolbar_start', 'oper_ce__toolbar_select_and_buttons');


	/**
	 *  JavaScript for actions with  Custom Contact Email buttons
	 *
	 * @param string $page
	 */
	function oper_ce__js( $page ){

		if ( 'oper_settings_email_template' == $page ) {
			?>
			<script type="text/javascript">
				jQuery(document).ready(function(){

					jQuery( '.oper_email_template_custom_email_addnew_button' ).on('click',function(){

						jQuery( '.oper_email_template_will,.oper_email_template_exist').toggle();
						jQuery( '.oper_email_template_custom_email_name_text').trigger( 'focus' );
					});

					jQuery( '.oper_email_template_custom_email_cancel_button' ).on('click',function(){

						jQuery( '.oper_email_template_will,.oper_email_template_exist').toggle();

					});

					jQuery( '.oper_email_template_custom_email_save_button' ).on('click',function(){

						jQuery( '.oper_email_template_will,.oper_email_template_exist').toggle();


						// // Reset email to standard template
						// var textarea_content = oper_get_email_template_template( 'standard' );
						// var editor_textarea_id = 'oper_email_template_textarea';
						// oper_reset_email_template( textarea_content, editor_textarea_id );

						jQuery( '#oper_action' ).val( 'add_new_custom_email' );

						jQuery( '#oper_email_template__new_name').val( jQuery( '.oper_email_template_custom_email_name_text').val() );

						//jQuery( '#oper_email__email_template' ).trigger( 'submit' );
						jQuery( '#oper_form_action' ).trigger( 'submit' );
					});

					jQuery( '#oper_email_template_custom_emails_select' ).on( 'change', function (){

							var selected_email = jQuery( '#oper_email_template_custom_emails_select option:selected' ).val();
							if ( '' != selected_email ) {
								selected_email = '&email_template_name=' + selected_email;
							}
							window.location.href = '<?php echo oper_ce__get_page_url(); ?>' + selected_email;
						}
					);

					var selected_email = jQuery( '#oper_email_template_custom_emails_select option:selected' ).val();
					if ( '' == selected_email ){
						jQuery( '.oper_email_template_custom_email_delete_button' ).addClass( 'disabled' );
					} else {
						jQuery( '.oper_email_template_custom_email_delete_button' ).removeClass( 'disabled' );
					}


					jQuery( '.oper_email_template_custom_email_delete_button' ).on( 'click', function (){
						if ( !jQuery( '.oper_email_template_custom_email_delete_button' ).hasClass( 'disabled' ) ){
							if ( oper_are_you_sure( '<?php echo esc_js( __( 'Do you really want to do this ?', 'email-reminders' ) ); ?>' ) ){

								var selected_email = jQuery( '#oper_email_template_custom_emails_select option:selected' ).val();

								oper_email_template__custom_email__ajx_delete( selected_email );
							}
						}
					} );

				});
			</script>
			<style type="text/css">
				.oper_email_template_custom_email_addnew_button .in-button-text ,
				.oper_email_template_custom_email_delete_button .in-button-text {
					display: none;
				}
				.ui_toolbar_group .oper_email_template_will {
					display: none;
				}
				.oper_ui_flex_toolbar_container .ui_toolbar_group:last-child {
					margin-left:auto;
				}

				/* Do not make right align  of last  element in toolbar at the Email Templates tab*/
				.oper_ui_flex_toolbar_container .ui_toolbar_group:last-child {
					margin:auto;
				}
				/* Hide |  - vertical divider line in Email Templates */
				.oper_ui_flex_toolbar_container .ui_toolbar_group {
					border:none;
				}
			</style>
			<?php
		}
	}
	add_action( 'oper_hook_settings_page_footer', 'oper_ce__js');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Support
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Get URL of page,  where located configuration of Contact-Email
	 *
	 * @return string
	 */
	function oper_ce__get_page_url(){

		return oper_get_settings_url() . '&tab=email';
	}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Send Emails
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// <editor-fold     defaultstate="collapsed"                        desc=" Emails Sending After New item "  >


/** Send overridden Custom  Email
 *
 * @param array $replace					- Array  with  replace parameters for email.
 * @param string $email_to					- Email address
 * @param string $send_copy_to_admin		- On|Off
 * @param array $other_params				- Optional. Array  of validated parameters from  submit form  at Send page
 * @return OPER_Emails_API_EML_RE|boolean
*/
function oper_ce_send_email_to_user_custom(  $replace = array(), $email_to = '', $send_copy_to_admin = 'Off', $other_params = array() ) {

	$custom_to_user_email_id = 'eml_reminders';		// 'standard';

	if ( isset($other_params['custom_email_name'] ) )
		$custom_to_user_email_id = $other_params['custom_email_name'];

	// return $is_continue = true -  SEND  "standard" email - in function oper_send_email_to_user_notification()
	//if ( 'eml_reminders' == $custom_to_user_email_id ) return $is_continue;


    ////////////////////////////////////////////////////////////////////////
    // Load Data
    ////////////////////////////////////////////////////////////////////////

    /* Check if New Email Template   Exist or NOT
     * Exist     -  return  empty array in format: array( OPTION_NAME => array() )
     *              Its will  load DATA from DB,  during creattion mail_api CLASS
     *              during initial activation  of the API  its try  to get option  from DB
     *              We need to define this API before checking POST, to know all available fields
     *              Define Email Name & define field values from DB, if not exist, then default values.
     * Not Exist -  import Old Data from DB
     *              or get "default" data from settings and return array with  this data
     *              This data its initial  parameters for definition fields in mail_api CLASS
     *
     */

    $init_fields_values = array();	//oper_import6_email__link_user__get_fields_array_for_activation();

    // Get Value of first element - array of default or imported OLD data,  because need only  array  of values without key - name of options for wp_options table
    //$init_fields_values = array_shift( array_values( $init_fields_values ) );

    $mail_api = new OPER_Emails_API_EML_RE( $custom_to_user_email_id, $init_fields_values );

    ////////////////////////////////////////////////////////////////////////////

    if ( $mail_api->fields_values['enabled'] == 'Off' ){
    	// return false;       // Email  template deactivated - exit.
    	return new WP_Error( 'email_not_send', __( "Email template have note been enabled", "email-reminders" ) );
	}

	add_filter( 'oper_email_api_is_allow_send_copy' , 'oper_ce_email_api_is_allow_send_copy_block' , 10, 3);

	if ( ! empty( $replace['to'] ) ) {
		$valid_email = sanitize_email( $replace['to'] );
	}
	if ( ! empty( $email_to ) ) {
		$valid_email = sanitize_email( $email_to );
	}
	if ( empty( $valid_email ) ) {
		// return false;
		return new WP_Error( 'email_not_send', sprintf( __( "Email %s is not valid", "email-reminders" ), $valid_email ) );
	}

	if ( ! empty( $replace['to_name'] ) ) {
		$email_to_name = trim( wp_specialchars_decode( esc_html( stripslashes( $replace['to_name'] ) ), ENT_QUOTES ) );
	} else {
		$email_to_name = '';
	}

    $to = $email_to_name . ' <' .  $valid_email . '> ';

    $email_result = $mail_api->send( $to , $replace );

    // Send copy  of email  to  admin  also to  "From" email address
    if ( $send_copy_to_admin == 'On') {
        $subject = $mail_api->get_field_value('subject');
        $mail_api->set_field_value('subject', __('Email copy to', 'secure-downloads') . ': ' . $valid_email . ' ' . $subject );
        $email_result = $mail_api->send( $mail_api->get_from__email_address() , $replace );
        $mail_api->set_field_value('subject', $subject );
    }

//debuge( (int) $email_result, $to , $replace);
    return $mail_api;

}
add_filter( 'oper_send_email_to_user_notification_filter', 'oper_ce_send_email_to_user_custom', 10, 5 );   // Hook for validated fields.


/** Block  Sending copy of email to  Admin,  based on OPER_Emails_API interface,  instead of that  we will sent it manually  from oper_send_email_to_user_notification function
 *
 * @param boolean $is_send_email
 * @param type $id
 * @param type $fields_values
 * @return boolean
 */
function oper_ce_email_api_is_allow_send_copy_block( $is_send_email, $id, $fields_values ) {
	$is_send_email = false;
	return $is_send_email;
}


/** Check  Email  subject  about Language sections
 *
 * @param string $subject
 * @param string $email_id
 * @return string
 */
function oper_ce_email_api_get_subject_after( $subject, $email_id ) {

    //$subject =  apply_oper_filter('oper_check_for_active_language', $subject );
	// Replace all shortcodes that  was not replaced early.
	$subject = preg_replace ('/[\[\{][a-zA-Z0-9.,_-]{0,}[\]\}]/', '', $subject);

    return  $subject;
}
add_filter( 'oper_email_api_get_subject_after', 'oper_ce_email_api_get_subject_after', 10, 2 );    // Hook fire in api-email.php

// </editor-fold>