<?php /**
 * @version 1.0
 * @description Rules
 * @category  Rules Add New
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


class OPER_Rules_Modify {

	// <editor-fold     defaultstate="collapsed"                        desc=" ///  JS | CSS  /// "  >

	/**
	 * Define HOOKs for loading CSS and  JavaScript files
	 */
	public function init_load_css_js_tpl() {
		// JS & CSS

		// Load only  at  Rules Settings Page
		if  ( strpos( $_SERVER['REQUEST_URI'], 'page=oper-rules' ) !== false ) {										// Load only  at  Rules Settings Page
			add_action( 'oper_enqueue_js_files',  array( $this, 'js_load_files' ), 50 );
			add_action( 'oper_enqueue_css_files', array( $this, 'enqueue_css_files' ), 50 );

			add_action( 'oper_hook_settings_page_footer', array( $this, 'oper_rules__add_new__in_page_templates' ), 50 );
		}
	}

	/** JSS */
	public function js_load_files( $where_to_load ) {

		$in_footer = true;
		if (
			   ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) )  // || ( 'client' == $where_to_load )
		){
			// wp_enqueue_script ( 'oper-script-name-id', oper_plugin_url( '/_out/js/live_search.js' ), array( 'oper-global-vars' ), '1.1', $in_footer );
			// wp_localize_script( 'oper-script-name-id', 'oper_global_obj' , array( 'contacts'  => '', 'reminders' => '' ) );			// Usage: 		oper_global_obj.contacts

			wp_enqueue_script( 'oper-rules_modify' , trailingslashit( plugins_url( '', __FILE__ ) ) . 'rules_modify.js'
							, array( 'oper-global-vars' ), '1.0', $in_footer );

			do_action( 'opera_js_load_files_rules' );
		}
	}

	/** CSS */
	public function enqueue_css_files( $where_to_load ) {

		if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

			wp_enqueue_style( 'oper-rules_modify', trailingslashit( plugins_url( '', __FILE__ ) ) . 'rules_modify.css'
							, array(), OPER_VERSION_NUM );

			do_action( 'opera_enqueue_css_files_rules' );
		}
	}

	// </editor-fold>


	// <editor-fold     defaultstate="collapsed"                        desc=" =  T E M P L A T E S  = "  >

	/**
	 * Template 					--  Add New Rule section  --
	 * inserted at footer of page
	 *
	 * @param $page string
	 */
	function oper_rules__add_new__in_page_templates( $page ) {

		if ( 'oper-rules' === $page ) {

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Emails Selection
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			?><script type="text/html" id="tmpl-oper_rules__email_select__template">
				<?php
				// Template - Email - Select Box
				?>
				<div class="ui__rules__group ui__rules__group__emailtemplate">
					<label  for="{{data.field_id}}" class="oper_rules_email_template_label" ><?php _e('Send email', 'email-reminders'); ?></label>
					<select id="{{data.field_id}}" name="{{data.field_id}}" class="{{data.field_id}}" autocomplete="off">
						<# _.each( data.field_options, function ( field_title, field_val, f_data ) { #>
							<#
								var is_selected = '';
								if ( field_val == data.value ) {
									is_selected = ' selected="selected" ';
								}
							#>
							<option value="{{field_val}}" {{is_selected}}>{{field_title}}</option>
						<# }); #>
					</select>
				</div>
			</script><?php


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Conditions Row
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			?><script type="text/html" id="tmpl-oper_rules__group_condition__template">
				<?php
				// Template - Conditions
				?>
				<div class="ui__rules__group ui__rules__group__conditions">
					<?php
					//  - Conditions    -   Fields Conditional   -   Select
					?>
					<#
						var field_id     = 'oper_rules_condition_field_select';
						var field_id_rnd = field_id + ( new Date().getTime() );
					#>
					<label  for="{{field_id_rnd}}" class="oper_rules_condition_field_label" ><#
						if ( ( undefined != data.index ) && ( 0 == data.index ) ){
							#><?php _e( 'if', 'email-reminders' ); ?><#
						} else {
							#><?php _e( 'and if', 'email-reminders' ); ?><#
						}
					#></label>
					<select id="{{field_id_rnd}}" name="{{field_id}}[]" class="{{field_id}}" autocomplete="off" style="width:10em;">
						<# _.each( data.condition_field_select_arr, function ( fields_arr, form_name, form_data ) { #>
							<optgroup label="{{form_name}}">
							<# _.each( fields_arr, function ( field_title, field_val, f_data ) { #>
								<#
									var is_selected = '';
									if ( ( undefined !== data.value['if'] ) && ( field_val == data.value['if'] ) ) {
										is_selected = ' selected="selected" ';
									}
								#>
								<option value="{{field_val}}" {{is_selected}}>{{field_title}}</option>
							<# }); #>
							</optgroup>
						<# }); #>
					</select>
					<?php
					//  - Conditions    -   Sign   -   Select
					?>
					<#
						field_id = 'oper_rules_condition_sign_select';
					#>
					<select name="{{field_id}}[]" class="oper_contact_form_exist {{field_id}}" autocomplete="off" style="width:10em;">
						<# _.each( data.condition_sign_select_arr, function ( field_title, field_val, f_data ) { #>
							<#
								is_selected = '';
								if ( ( undefined !== data.value['sign'] ) && ( field_val == data.value['sign'] ) ) {
									is_selected = ' selected="selected" ';
								}
							#>
							<option value="{{field_val}}" {{is_selected}} >{{field_title}}</option>
						<# }); #>
					</select>
					<?php
					//  - Conditions    -   Value   -   Text
					?>
					<#
						field_id = 'oper_rules_condition_value_text';
					#>
					<#
						is_value = '';
						if ( undefined !== data.value['value'] ) {
							//data.value['value'] = data.value['value'].replace(/['\\]/g, '\\$&');				// Escape ' and \ symbols
							is_value =  data.value['value'];
						}
					#>
					<input type="text" autocomplete="off"
						   placeholder="<?php _e( 'Condition', 'email-reminders' ); ?>"
						   class="{{field_id}}"
						   value="{{is_value}}"
					/>
					<?php
					//  - Conditions    -   Remove   -   Button
					?>
					<a href="javascript:void(0)" class="button button-secondary oper_email_template_will oper_email_template_custom_email_cancel_button" title="<?php _e( 'Remove', 'email-reminders' ); ?>"
					onclick="jQuery( this ).parent(':not(.rule_condition_0)').remove();"
					>
						<span class="wpdevelop"><i class="glyphicon glyphicon glyphicon-remove"></i></span>
					</a>
				</div>
			</script><?php


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Rules Section - Full
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			?><script type="text/html" id="tmpl-oper_rules__add_new__template">

				<div id="oper_ui__rules_modify_container" class="oper_ui__rules_modify_container"  >
					<div class="ui__rules__header" style="margin-bottom:3px;">
						<?php _e('Rule', 'email-reminders'); ?>
					</div>
					<#
						var oper_rules__email_select__template = wp.template( 'oper_rules__email_select__template' );
					#>
					{{{
						oper_rules__email_select__template( {
																"field_id": "oper_rules_email_template_select",
																"field_options": data.email_select_arr,
																"value": ( ( undefined == data.value ) ? '' : data.value["email_template"] )
														} )
					}}}
					<div class="ui__rules__rows">
						<#
							var oper_rules__group_condition__template = wp.template( 'oper_rules__group_condition__template' );

							if ( 	undefined == data.value ) {                                                             // If no values - Start New - its not editing - empty one condition: [ {} ]
								data.value = { 'conditions': [ {} ] };
							}
							_.each( data.value['conditions'], function ( c_condition, c_key, c_data ) {					    // conditions with  values - useful  for editing conditions
								#>
									{{{ oper_rules__group_condition__template( {
																		"condition_field_select_arr": data.condition_field_select_arr,
																		"condition_sign_select_arr" : data.condition_sign_select_arr,
																		"index": c_key,
																		"value": c_condition
									} ) }}}
								<#
							});
						#>
						<div class="ui__rules__group ui__rules__group__append">
							<a href="javascript:void(0)" class="button button-secondary oper_email_template_will oper_email_template_custom_email_cancel_button" title="<?php _e( 'Add', 'email-reminders' ); ?>"
							onclick="javascript:oper_rules__modify__append_condition( {{JSON.stringify(data)}} );"
							>
								<span class="wpdevelop"><i class="glyphicon glyphicon glyphicon-plus"></i></span>
							</a>
						</div>

					</div>

					<#
						var oper_rules__other_params__template = wp.template( 'oper_rules__other_params__template' );
					#>
					{{{ oper_rules__other_params__template( data ) }}}

					<div class="clear"></div>
					<div class="ui__rules__save">
						<#
						if ( undefined != data.rules_id ) {
							#>
								<a href="javascript:void(0)" class="button button-primary" title="<?php _e( 'Save Changes', 'email-reminders' ); ?>"
								onclick="javascript:oper_rules__modify__ajx_create_edit({{data.rules_id}});"
								>
									<?php _e( 'Save Changes', 'email-reminders' ); ?>
								</a>
							<#
						} else {
							#>
								<a href="javascript:void(0)" class="button button-primary" title="<?php _e( 'Create Rule', 'email-reminders' ); ?>"
								onclick="javascript:oper_rules__modify__ajx_create_edit( 0 );"
								>
									<?php _e( 'Create Rule', 'email-reminders' ); ?>
								</a>
							<#
						}
						#>
						<a href="javascript:void(0)" class="button button-secondary" title="<?php _e( 'Cancel', 'email-reminders' ); ?>"
						   onclick="javascript:oper_rules__modify__hide();"
						>
							<?php _e( 'Cancel', 'email-reminders' ); ?>
						</a>
					</div>
				</div>
			</script><?php


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Rules Section - Other Parameters: 	'Run starting with contact id',  'C R O N  parameters' ...
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			?><script type="text/html" id="tmpl-oper_rules__other_params__template">

				<div class="clear"></div>
				<div class="ui__rules__other_params">
					<?php
					//	data.last_check_contact_id
					//	data.expire_after
					//	data.last_run_date
					//	data.status
if ( ! function_exists( 'opera_cron__rule_reset_execute' ) ) {		//FixIn: 1.0.2.2
					?>
					<div class="ui__rules__group ui__rules__group__expire_after">
						<?php
						if ( 1 ) {
							$extra_time    = array();
							$extra_time[0] = __( 'Never Expire', 'email-reminders' );
							// Each 5 minutes
							foreach ( range( 5, 55, 5 ) as $extra_num ) {
								$extra_time[ $extra_num * 60 ] = $extra_num . ' ' . __( 'minutes', 'email-reminders' );
							}
							$extra_time[ 60 * 60 ] = '1 ' . __( 'hour', 'email-reminders' );
							// 1 hour + Each 5 minutes
							foreach ( range( 65, 115, 5 ) as $extra_num ) {
								$extra_time[ $extra_num * 60 ] = '1 ' . __( 'hour', 'email-reminders' ) . ' ' . ( $extra_num - 60 ) . ' ' . __( 'minutes', 'email-reminders' );
							}
							// Each Hour based on minutes
							foreach ( range( 120, 1380, 60 ) as $extra_num ) {
								$extra_time[ $extra_num * 60 ] = ( $extra_num / 60 ) . ' ' . __( 'hours', 'email-reminders' );
							}
							// Each Day
							foreach ( range( 1, 30, 1 ) as $extra_num ) {
								$extra_time[ $extra_num * 24 * 60 * 60 ] = $extra_num . ' ' . __( 'day(s)', 'email-reminders' );
							}
						}
						?>
						<label  for="expire_after" class="oper_rules_email_template_label" ><?php _e('Expire in', 'email-reminders'); ?></label>
						<select id="expire_after" name="expire_after" class="expire_after" autocomplete="off">
							<#
							  var expire_options = {}
							  <?php
							  foreach ( $extra_time as $extra_time_value => $extra_time_title ) {
								?>
								  expire_options['<?php echo $extra_time_value; ?>'] = '<?php echo $extra_time_title; ?>';
								<?php
							  }
							  ?>
							  _.each( expire_options, function ( field_title, field_val, f_data ) { #>
								<#
									var is_selected = '';
									if ( field_val == data.expire_after ) {
										is_selected = ' selected="selected" ';
									}
								#>
								<option value="{{field_val}}" {{is_selected}}>{{field_title}}</option>
							<# }); #>
						</select>
					</div>

					<div class="ui__rules__group ui__rules__group__last_run_date">
						<label  for="last_run_date" class="oper_rules_email_template_label" ><?php _e('after', 'email-reminders'); ?></label>
						<input type="text" autocomplete="off" style="width:11em;"
							   placeholder="<?php _e( 'Last run date', 'email-reminders' ); ?>"
							   class="last_run_date"
							   value="{{data.last_run_date}}"
						/>
					</div>
<?php } ?>
					<div class="ui__rules__group ui__rules__group__last_check_contact_id">
						<label  for="last_check_contact_id" class="oper_rules_email_template_label" ><?php _e('Rule run starting with contact id', 'email-reminders'); ?></label>
						<input type="text" autocomplete="off" style="width:7em;"
							   placeholder="<?php _e( 'Last checked Contact ID', 'email-reminders' ); ?>"
							   class="last_check_contact_id"
							   value="{{(undefined != data.last_check_contact_id)?data.last_check_contact_id:0}}"
						/>
					</div>

				</div>
				<?php
						do_action( 'opera_show_cron_data_in_rules_editing' ); 											// Addon  for showing CRON params
				?>
			</script><?php
		}
	}

	// </editor-fold>


	// <editor-fold     defaultstate="collapsed"                        desc=" ///  A J A X  /// "  >

		// A J A X =====================================================================================================

		/**
		 * Define HOOKs for start  loading Ajax
		 */
		public function init_ajax(){

			// Ajax Handlers.		Note. "locale_for_ajax" rechecked in oper-ajax.php
			add_action( 'wp_ajax_'		 	 . 'OPER_RULES_MODIFY_ADD_EDIT', array( $this, 'ajax_' . 'OPER_RULES_MODIFY_ADD_EDIT' ) );	    // Admin & Client (logged in usres)
			// add_action( 'wp_ajax_nopriv_' . 'OPER_RULES_MODIFY_ADD_EDIT', array( $this, 'ajax_' . 'OPER_RULES_MODIFY_ADD_EDIT' ) );		// Client         (not logged in)

			add_action( 'wp_ajax_'		 	 . 'OPER_RULES_MODIFY_EDIT_SHOW', array( $this, 'ajax_' . 'OPER_RULES_MODIFY_EDIT_SHOW' ) );	    // Admin & Client (logged in usres)
			add_action( 'wp_ajax_'		 	 . 'OPER_RULES_MODIFY_DELETE'   , array( $this, 'ajax_' . 'OPER_RULES_MODIFY_DELETE' ) );	        // Admin & Client (logged in usres)
			add_action( 'wp_ajax_'		 	 . 'OPER_RULES_MODIFY_RESET'   , array( $this, 'ajax_' . 'OPER_RULES_MODIFY_RESET' ) );	        // Admin & Client (logged in usres)
		}


		// A J A X	////////////////////////////////////////////////////////////////////////////////////////////////////

		/**
		 * Ajax - Add New Rule
		 */
		function ajax_OPER_RULES_MODIFY_ADD_EDIT(){

			if ( ! isset( $_POST['oper_rules'] ) || empty( $_POST['oper_rules'] ) ) { exit; }

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Security
			$action_name    = 'oper_rules_ajx' . '_opernonce';                                                         		    // $_POST['element_id'] . '_opernonce';
			$nonce_post_key = 'nonce';																						    // Its key  of post $_POST[ $nonce_post_key ],  where we transfer value to  check
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// ESCAPING
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			// Escape ID of rule: 0 | 99
			$escaped_rules_other = oper_get_clean_or_default_request_params(
				array(
						'rules_id' => array( 'validate' => 'd', 'default' => 0 ),
						'expire_after'        => array( 'validate' => 'd', 'default' => '0' ),
						'last_run_date'       => array( 'validate' => 's', 'default' => '' ),
						'last_check_contact_id' => array( 'validate' => 'd', 'default' => '0' )
				),
				$request_prefix = false
			);
			$escaped_rules_id = $escaped_rules_other['rules_id'];

			// Cron parameters
			$escaped_rules_other['advanced'] = array();
			$escaped_rules_other = apply_filters( 'opera_escape_cron_parameters_for_rules_edit', $escaped_rules_other );   // Addon functionality

			// Escape rule Email
			$escaped_params = oper_get_clean_or_default_request_params(
				array(
						'email_template' => array( 'validate' => 's', 'default' => '' ),
				),
				$request_prefix = 'oper_rules'
			);

			// Escape rule conditions
			$conditions = array();                      // $_POST['oper_rules']['conditions'][...]['if' | 'sign' | 'value']

			if ( ( isset( $_POST['oper_rules']['conditions'] ) ) && ( is_array( $_POST['oper_rules']['conditions'] ) ) ) {
				foreach ( $_POST['oper_rules']['conditions'] as $condition_post ) {

					$conditions[] = array(
						'if'    => oper_clean_string_for_form( $condition_post['if'] ),
						'sign'  => oper_clean_string_for_form( $condition_post['sign'] ),
						'value' => oper_clean_string_for_form( $condition_post['value'] )
					);
				}
			}
			$escaped_params['conditions'] = $conditions;

			/**
				$escaped_params == Array (
						[email_template] => super_new
						[conditions]     => Array (
												[0] => Array(
														[if] => __system__|source
														[sign] => >=
														[value] => 1"0'0\0
													)
												[1] => Array(
														[if] => __default__|_date
														[sign] => =
														[value] => TODAY
													)
							)
					)
			 */


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// SQL Saving
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//debuge( '$escaped_params, $escaped_rules_other', $escaped_params, $escaped_rules_other ); die;

			// Check do we need to  create new booking $escaped_rules_id = 0 	OR	 we need to  update changes in record 	$escaped_rules_id = 99
			if ( empty( $escaped_rules_id ) ) {
				$my_rules_id = $this->oper_rules_insert_to_db( $escaped_params, $escaped_rules_other  );
			} else {
				$my_rules_id = $this->oper_rules_edit_in_db( $escaped_rules_id, $escaped_params, $escaped_rules_other );
			}

			do_action( 'opera_reschedule_cron__after_rule_save' , $my_rules_id );		// Addon  functionality


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Ajax Response
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			if ( ! empty( $my_rules_id ) ) {
				wp_send_json( array(
									'ajx_process' => 'OK',
									'ajx_message' => sprintf( __( 'Successfully saved rule [ ID=%s ]', 'email-reminder' ), '<strong>' . $my_rules_id . '</strong>' ),
									'ajx_rules'   => $escaped_params,
									'ajx_rules_id' => $my_rules_id
							) );
			} else {
				wp_send_json( array(
									'ajx_process' => 'ERROR',
									'ajx_message' => __( 'Failed saving to database', 'email-reminder' )
							) );
			}

		}


		/**
		 * Ajax - Add New Rule
		 */
		function ajax_OPER_RULES_MODIFY_EDIT_SHOW(){

			if ( ! isset( $_POST['rules_id'] ) || empty( $_POST['rules_id'] ) ) { exit; }

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Security
			$action_name    = 'oper_rules_ajx' . '_opernonce';                                                         		    // $_POST['element_id'] . '_opernonce';
			$nonce_post_key = 'nonce';																						    // Its key  of post $_POST[ $nonce_post_key ],  where we transfer value to  check
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// ESCAPING
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$escaped_params = oper_get_clean_or_default_request_params(
				array(
						'rules_id' => array( 'validate' => 'd', 'default' => '' )
				),
				$request_prefix = false
			);


			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// SQL Get
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			global $wpdb;
			$db_names = oper_get_db_names();

			$sql          = "SELECT *  FROM {$wpdb->prefix}{$db_names['rules']}  as rules WHERE ( rules_id = %d )";
			$sql_prepared = $wpdb->prepare( $sql, $escaped_params['rules_id'] );
		    $rule_result = $wpdb->get_results( $sql_prepared );

		    $rule_arr = false;
		    if ( ! empty( $rule_result ) ) {
			    $rules_listing = new OPER_Rules;
			    $rule_arr = $rules_listing->list__get_arr_from_sql_results( $rule_result );

			    // Escaping 	&quot;A&#039;B\C  to "A'B\C
			    if ( ! empty( $rule_arr ) ) {
			    	$rule_arr = $rule_arr[0];
			    	$rule_arr['rule']['email_template'] = html_entity_decode( $rule_arr['rule']['email_template'], ENT_QUOTES  );
				    foreach ( $rule_arr['rule']['conditions'] as $ci => $condition ) {
				    	$rule_arr['rule']['conditions'][$ci]['if'] = html_entity_decode( $condition['if'], ENT_QUOTES  );
				    	$rule_arr['rule']['conditions'][$ci]['sign'] = html_entity_decode( $condition['sign'], ENT_QUOTES  );
				    	$rule_arr['rule']['conditions'][$ci]['value'] = html_entity_decode( $condition['value'], ENT_QUOTES  );
			    	}
			    }
		    }
//debuge($rule_arr);die;
		    // Note!	$rule_arr['advanced']  exist  by  default,  and its was 	unserialized 	in 		list__get_arr_from_sql_results

//			$cron_parameters = array();
//			$cron_parameters = apply_filters( 'opera_get_cron_parameters_for_rules_edit', $cron_parameters, $rule_arr );                                        // Addon functionality

//debuge('$rule_arr', $rule_arr);
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Ajax Response
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			if ( ! empty( $rule_arr ) ) {


				wp_send_json( array(
									'ajx_process' => 'OK',
									'ajx_message' => sprintf( __( 'Success of getting rule with [ ID=%s ]', 'email-reminder' ), '<strong>' . $escaped_params['rules_id'] . '</strong>' ),
									'ajx_rule'    => $rule_arr
							) );
			} else {
				wp_send_json( array(
									'ajx_process' => 'ERROR',
									'ajx_message' => sprintf( __( 'Failed getting item ID=%d database', 'email-reminder' ), $escaped_params['rules_id'] )
							) );
			}

		}


		/**
		 * Ajax - Delete Rule
		 */
		function ajax_OPER_RULES_MODIFY_DELETE(){

			if ( ! isset( $_POST['rules_id'] ) || empty( $_POST['rules_id'] ) ) { exit; }

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Security
			$action_name    = 'oper_rules_ajx' . '_opernonce';                                                         		    // $_POST['element_id'] . '_opernonce';
			$nonce_post_key = 'nonce';																						    // Its key  of post $_POST[ $nonce_post_key ],  where we transfer value to  check
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// ESCAPING
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$escaped_params = oper_get_clean_or_default_request_params(
				array(
						'rules_id' => array( 'validate' => 'd', 'default' => '' )
				),
				$request_prefix = false
			);

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// SQL
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			global $wpdb;
			$db_names = oper_get_db_names();

			$sql= $wpdb->prepare( "DELETE FROM  {$wpdb->prefix}{$db_names['rules']} WHERE rules_id = %d ", $escaped_params['rules_id'] );

			do_action( 'opera_remove_cron_rule' ,   $escaped_params['rules_id'] );										// Addon  functionality


			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Ajax Response
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			if ( false === $wpdb->query( $sql ) ){

				// ERROR
				wp_send_json( array(
					'ajx_item_id' => $escaped_params['rules_id'],
					'ajx_process' => 'FAILED',
					'ajx_message' => 'Failed delete rule ID=' . $escaped_params['rules_id']
				) );

			} else {

				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
				wp_send_json( array(
					'ajx_item_id' => $escaped_params['rules_id'],
					'ajx_process' => 'OK'
				) );
			}

		}


		/**
		 * Ajax - Reset Rule
		 */
		function ajax_OPER_RULES_MODIFY_RESET(){

			if ( ! isset( $_POST['rules_id'] ) || empty( $_POST['rules_id'] ) ) { exit; }

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Security
			$action_name    = 'oper_rules_ajx' . '_opernonce';                                                         		    // $_POST['element_id'] . '_opernonce';
			$nonce_post_key = 'nonce';																						    // Its key  of post $_POST[ $nonce_post_key ],  where we transfer value to  check
			$result_check   = check_ajax_referer( $action_name, $nonce_post_key );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// ESCAPING
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$escaped_params = oper_get_clean_or_default_request_params(
				array(
						'rules_id' => array( 'validate' => 'd', 'default' => '' )
				),
				$request_prefix = false
			);

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// SQL
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			global $wpdb;
			$db_names = oper_get_db_names();

			$data_s_fields = 'last_check_contact_id = %d';
			$data_s_values      = array();
			$data_s_values[]    = 0;
			$data_s_values[]    = $escaped_params['rules_id'];
															//$data_s_fields = 'data = %s, source = %s, note = %s'
			$sql = "UPDATE {$wpdb->prefix}{$db_names['rules']} SET " . $data_s_fields . " WHERE rules_id = %d";

			$sql_prepared = $wpdb->prepare( $sql, $data_s_values );

			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Ajax Response
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
			if ( false === $wpdb->query( $sql_prepared ) ){

				// ERROR
				wp_send_json( array(
					'ajx_item_id' => $escaped_params['rules_id'],
					'ajx_process' => 'FAILED',
					'ajx_message' => 'Failed reset rule ID=' . $escaped_params['rules_id']
				) );

			} else {

				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// Send JSON. This function  will  make "wp_json_encode" so pass only array, and This function call wp_die( '', '', array( 'response' => null, ) )		Pass JS OBJ: response_data in "jQuery.post( " function on success.
				wp_send_json( array(
					'ajx_item_id' => $escaped_params['rules_id'],
					'ajx_process' => 'OK'
				) );
			}

		}


	// </editor-fold>


	// <editor-fold     defaultstate="collapsed"                        desc=" ///  S Q L  /// "  >

		// I N S E R T  ================================================================================================
		//
		/**
		 * Add record to  Database
		 *
		 * @param array $escaped_params_arr = Array (
												[email_template] => super_new
												[conditions] => Array (
																		[0] => Array(
																				[if] => __system__|source
																				[sign] => >=
																				[value] => 1"0'0\0
																			)
																		[1] => Array(
																				[if] => __default__|_date
																				[sign] => =
																				[value] => TODAY
																			)
																	)
											)
		 * @return int
		 */
		function oper_rules_insert_to_db( $escaped_params_arr , $escaped_params_other ){

			global $wpdb;

			$sql_fields = 'rule, ru_create_date, expire_after, last_run_date, last_check_contact_id, advanced';
			$sql_values = array();
			$sql_args   = array();

			for( $i = 0; $i < 1; $i++) {        // Template for adding several rows to  the Database

				$sql_values[] = '( %s, %s, %d, %s, %d, %s )';
				$sql_args[]   = maybe_serialize( $escaped_params_arr );
				$sql_args[]   = date_i18n( 'Y-m-d H:i:s' );

				$sql_args[] = $escaped_params_other['expire_after'];
				$sql_args[] = $escaped_params_other['last_run_date'];
				$sql_args[] = $escaped_params_other['last_check_contact_id'];
				$sql_args[] = maybe_serialize( $escaped_params_other['advanced'] );		// Advanced
			}

			$sql_values     = implode( ', ', $sql_values );

			////////////////////////////////////////////////////////////////////////////
			// Add to DB
			////////////////////////////////////////////////////////////////////////////
			$sql = "INSERT INTO {$wpdb->prefix}o_er_rules ( {$sql_fields} )VALUES {$sql_values} " ;

			$sql_prepared = $wpdb->prepare($sql, $sql_args );

			if ( false === $wpdb->query( $sql_prepared ) ){
				return false;                                   // debuge_error( 'Error. DB inserting ' . $sql ,__FILE__,__LINE__);
			} else {

				do_action( 'opera_remove_cron_rule' ,   (int) $wpdb->insert_id );										// Addon  functionality

				return (int) $wpdb->insert_id;                  // Get ID of last insert
			}
		}


		// E D I T  ====================================================================================================
		//
		/**
		 * Add record to  Database
		 *
		 * @param int $rules_id				  ID of rule
		 * @param array $escaped_params_arr = Array (
												[email_template] => super_new
												[conditions] => Array (
																		[0] => Array(
																				[if] => __system__|source
																				[sign] => >=
																				[value] => 1"0'0\0
																			)
																		[1] => Array(
																				[if] => __default__|_date
																				[sign] => =
																				[value] => TODAY
																			)
																	)
											)
		 * @return int
		 */
		function oper_rules_edit_in_db( $rules_id, $escaped_params_arr, $escaped_params_other ) {

			global $wpdb;

			$data_s_fields = 'rule = %s, expire_after = %d, last_run_date = %s, last_check_contact_id = %d, advanced = %s';
			$data_s_values      = array();
			$data_s_values[]    = maybe_serialize( $escaped_params_arr );

			$data_s_values[]    = $escaped_params_other['expire_after'];
			$data_s_values[]    = $escaped_params_other['last_run_date'];
			$data_s_values[]    = $escaped_params_other['last_check_contact_id'];
			$data_s_values[]    = maybe_serialize( $escaped_params_other['advanced'] );

			$data_s_values[]    = $rules_id;

															//$data_s_fields = 'data = %s, source = %s, note = %s'
			$sql = "UPDATE {$wpdb->prefix}o_er_rules SET " . $data_s_fields . " WHERE rules_id = %d";

			do_action( 'opera_remove_cron_rule' ,   $rules_id );										// Addon  functionality

												//$data_s_values = array( $contact_data_row, $contact_source, $contact_note, $contact_id )
			$sql_prepared = $wpdb->prepare( $sql, $data_s_values );

			if ( false === $wpdb->query( $sql_prepared ) ){
				return false;
			}

			return $rules_id;
		}

	// </editor-fold>
}


/**
 * Just for loading CSS and  JavaScript files
 */
 if ( true ) {
	$rules_modify = new OPER_Rules_Modify;
	$rules_modify->init_load_css_js_tpl();
	$rules_modify->init_ajax();
 }



function oper_rules_modify_container_show(){
	?>
	<div class="oper_rules__add_new__container"></div>
	<script type="text/javascript">
		jQuery( document ).ready( function (){

			// Set Nonce for Ajax
			oper_rules__modify.set_secure_param( 'nonce',   '<?php echo wp_create_nonce( 'oper_rules_ajx' . '_opernonce' ) ?>' );
			oper_rules__modify.set_secure_param( 'user_id', '<?php echo get_current_user_id(); ?>' );
			oper_rules__modify.set_secure_param( 'locale',  '<?php echo get_user_locale(); ?>' );

			// Set init parameters
			oper_rules__modify.myrules_set_init_params( <?php echo wp_json_encode(
												array(
														'email_select_arr'           => oper_ce__get_all_custom_emails_as_arr(),
														'condition_field_select_arr' => oper_contact_form_get_shortcodes_as_arr(),
														'condition_sign_select_arr'  => array(
																							'='        => __( 'Equals', 'email-reminders' ),
																							'!='       => __( 'Not Equals', 'email-reminders' ),
																							'>='       => __( 'Higher or Equals', 'email-reminders' ),
																							'>'        => __( 'Higher', 'email-reminders' ),
																							'<='       => __( 'Less or Equals', 'email-reminders' ),
																							'<'        => __( 'Less', 'email-reminders' ),
																							'contain'  => __( 'Contain', 'email-reminders' ),
																							'!contain' => __( 'Not Contain', 'email-reminders' )
																						)
												) );
									?> );
			if ( 0 ) {
					// its for editing !!!!!,
					// If we add new then  we are using reset and get  new params
					// Set parameter for Editing
					oper_rules__modify.myrules_set_param( 'value', <?php echo wp_json_encode( array(
																					'email_template' => 'super_new',
																					'conditions'	 => array(
																												array(
																													'if'    => '__system__|source',
																													'sign'  => '>=',
																													'value' => '1"0\'0\0'
																												),
																												array(
																													'if'    => '__default__|_date',
																													'sign'  => '=',
																													'value' => 'TODAY'
																												)
																										)
															) ) ?>
												);
					//oper_rules__modify.myrules_reset();
					oper_rules__modify_container__show( oper_rules__modify.myrules_get_all_params() );
			}
		} );
	</script>
	<?php
}