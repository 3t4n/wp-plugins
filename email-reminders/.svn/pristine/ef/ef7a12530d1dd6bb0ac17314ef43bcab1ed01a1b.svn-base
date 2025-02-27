var oper_rules__modify = (function ( obj, $) {

	///////////////////////////////////////////////////////////////////////
	// Secure parameters for Ajax
	///////////////////////////////////////////////////////////////////////
	var p_secure = obj.security_obj = obj.security_obj || {
															user_id: 0,
															nonce  : '',
															locale : ''
														  };

	obj.set_secure_param = function ( param_key, param_val ) {
		p_secure[ param_key ] = param_val;
	};

	obj.get_secure_param = function ( param_key ) {
		return p_secure[ param_key ];
	};

		///////////////////////////////////////////////////////////////////////
		// Define "Add New Rule" properties
		///////////////////////////////////////////////////////////////////////

		var p_params = obj.params = obj.params || [];

		obj.myrules_get_param = function ( param_id ) {
			return p_params[ param_id ];
		};

		obj.myrules_set_param = function( param_id, param_val ) {
			p_params[ param_id ] = param_val;
		}

		obj.myrules_get_all_params = function () {
			return p_params;
		};

		obj.myrules_set_all_params = function( params_val ) {
			p_params = params_val;
		}

		///////////////////////////////////////////////////////////////////////
		// Such  parameters,  its Init parameters,  after  page loading.	--	Useful for do not having "value" param during editing.
		///////////////////////////////////////////////////////////////////////

		var p_init_params = obj.init_params = obj.init_params || [];

		obj.myrules_set_init_params = function( params_init_val ) {
			p_init_params = params_init_val;
			this.myrules_reset();
		}

		obj.myrules_reset = function() {
			// Deep Clone
			p_params = JSON.parse( JSON.stringify( p_init_params ) );
		}

		obj.myrules_reset_and_get_init_params = function() {
			this.myrules_reset();
			return p_params;
		}

	return obj;
}( oper_rules__modify || {}, jQuery ));

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add New Rule section
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Show Rules  "Edit form"   and hide "Listing"
 *
 * @param json_param_obj		- JSON object
 */
function oper_rules__modify_container__show( json_param_obj ){

	//oper_rules__actual_listing__hide();

	var oper_rules__add_new__template = wp.template( 'oper_rules__add_new__template' );

	jQuery( '.oper_rules__add_new__container' ).html( oper_rules__add_new__template( json_param_obj ) );

	// Addon functionality
	if ( typeof( opera_define_ui_hooks_for_cron_rules ) == 'function' ){
		opera_define_ui_hooks_for_cron_rules( json_param_obj );
	}

	oper_scroll_to('.oper_ui__rules_modify_container');
}


		/**
		 *  Append new Conditional row to Rules section
		 *
		 * @param data
		 */
		function oper_rules__modify__append_condition( data ){

			var oper_rules__group_condition__template = wp.template( 'oper_rules__group_condition__template' );

			var rules_rows_num = jQuery( '.ui__rules__rows .ui__rules__group__conditions' ).length;

			var rules_rows_content = oper_rules__group_condition__template( {
																				"condition_field_select_arr": data.condition_field_select_arr,
																				"condition_sign_select_arr" : data.condition_sign_select_arr,
																				"index": rules_rows_num,
																				"value": []
																		} );
			if ( 0 == rules_rows_num ) {
				jQuery( '.ui__rules__rows' ).prepend( rules_rows_content );
			} else {
				jQuery( '.ui__rules__rows .ui__rules__group__conditions' ).last().after( rules_rows_content  );
			}
		}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Simple Fast functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Hide Rule "Edit Form"  and show Listing
 */
function oper_rules__modify__hide(){

	jQuery( '.oper_rules__add_new__container' ).html('');
	oper_rules__actual_listing__show();
}

/**
 * Show Rule "Edit Form"  with INIT parameters - like for creation  new rule
 */
function oper_rules__modify__show(){

	oper_rules__modify_container__show( oper_rules__modify.myrules_reset_and_get_init_params() );
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// A J A X
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Add New  | 	Edit	 Rule  -  Send Ajax
 *
 * @param rules_id  0 | int
 */
function oper_rules__modify__ajx_create_edit( rules_id ){

	// Get conditions from UI into Obj: ajx_value, because we have configured several conditions
	if (1){
		var jq_container = jQuery( '.oper_rules__add_new__container' );

		var ajx_value = {};

		ajx_value['email_template'] = jq_container.find('.oper_rules_email_template_select option:selected').val();

		// Get all condition values
		ajx_value['conditions'] = [];
		var condition = {};
		jq_container.find( '.ui__rules__group__conditions' ).each( function ( index, element ){							// Get all  parameters from  the Rules section

			condition[ 'if' ]    = jQuery( this ).find( '.oper_rules_condition_field_select option:selected' ).val();
			condition[ 'sign' ]  = jQuery( this ).find( '.oper_rules_condition_sign_select option:selected' ).val();
			condition[ 'value' ] = jQuery( this ).find( '.oper_rules_condition_value_text' ).val();

			ajx_value['conditions'].push( condition );
			condition = {};
		} );

	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Check if we are having some conditions
	if ( 0 == ajx_value[ 'conditions' ].length ){
		oper_admin_show_message( '<strong>' + 'Error!' + '</strong> ' + 'No conditions created', 'warning', 3000 );
		return;
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Other parameters - CRON
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if (1){
			var ajx_advanced = {};

			ajx_advanced[ 'rule_run' ] = {};
			if ( jq_container.find( '.cron_rule_run__enable' ).is( ":checked" ) ){ 	ajx_advanced[ 'rule_run' ][ 'enable' ] = 'On';  }
			else {	   															    ajx_advanced[ 'rule_run' ][ 'enable' ] = 'Off';	}
			ajx_advanced[ 'rule_run' ][ 'next_time' ]    = jq_container.find( '.cron_rule_run__next_time' ).val();
			ajx_advanced[ 'rule_run' ][ 'recurrence' ]   = jq_container.find( '.cron_rule_run__recurrence' ).val();
			//ajx_advanced[ 'rule_run' ][ 'recurrence' ]   = jq_container.find( '.cron_rule_run__recurrence option:selected' ).val();
			ajx_advanced[ 'rule_run' ][ 'max_contacts' ] = jq_container.find( '.cron_rule_run__max_contacts' ).val();

			ajx_advanced[ 'rule_run' ][ 'time_from' ]  = jq_container.find( '.cron_rule_run__send_time_from' ).val();
			ajx_advanced[ 'rule_run' ][ 'time_to' ]    = jq_container.find( '.cron_rule_run__send_time_to' ).val();
			ajx_advanced[ 'rule_run' ][ 'send_week0' ] = jq_container.find( '.cron_rule_run__send_week0' ).is( ':checked' ) ? 'On' : 'Off';
			ajx_advanced[ 'rule_run' ][ 'send_week1' ] = jq_container.find( '.cron_rule_run__send_week1' ).is( ':checked' ) ? 'On' : 'Off';
			ajx_advanced[ 'rule_run' ][ 'send_week2' ] = jq_container.find( '.cron_rule_run__send_week2' ).is( ':checked' ) ? 'On' : 'Off';
			ajx_advanced[ 'rule_run' ][ 'send_week3' ] = jq_container.find( '.cron_rule_run__send_week3' ).is( ':checked' ) ? 'On' : 'Off';
			ajx_advanced[ 'rule_run' ][ 'send_week4' ] = jq_container.find( '.cron_rule_run__send_week4' ).is( ':checked' ) ? 'On' : 'Off';
			ajx_advanced[ 'rule_run' ][ 'send_week5' ] = jq_container.find( '.cron_rule_run__send_week5' ).is( ':checked' ) ? 'On' : 'Off';
			ajx_advanced[ 'rule_run' ][ 'send_week6' ] = jq_container.find( '.cron_rule_run__send_week6' ).is( ':checked' ) ? 'On' : 'Off';


			ajx_advanced[ 'rule_reset' ] = {};
			if ( jq_container.find( '.cron_rule_reset__enable' ).is( ":checked" ) ){ ajx_advanced[ 'rule_reset' ][ 'enable' ] = 'On';  }
			else {	   															     ajx_advanced[ 'rule_reset' ][ 'enable' ] = 'Off';	}
			ajx_advanced[ 'rule_reset' ][ 'next_time' ]    = jq_container.find( '.cron_rule_reset__next_time' ).val();
			ajx_advanced[ 'rule_reset' ][ 'recurrence' ]   = jq_container.find( '.cron_rule_reset__recurrence' ).val();
			//ajx_advanced[ 'rule_reset' ][ 'recurrence' ]   = jq_container.find( '.cron_rule_reset__recurrence option:selected' ).val();
			ajx_advanced[ 'rule_reset' ][ 'contact_id' ] = jq_container.find( '.cron_rule_reset__contact_id' ).val();
	}


	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_RULES_MODIFY_ADD_EDIT',
						user_id       : oper_rules__modify.get_secure_param( 'user_id' ),
						nonce         : oper_rules__modify.get_secure_param( 'nonce' ),
						locale		  : oper_rules__modify.get_secure_param( 'locale' ),

						rules_id	  : rules_id,
						oper_rules 	  : ajx_value,

						advanced 	  : ajx_advanced,

						expire_after         : jq_container.find( '.expire_after option:selected' ).val(),
						last_run_date        : jq_container.find( '.last_run_date' ).val(),
						last_check_contact_id: jq_container.find( '.last_check_contact_id' ).val()
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

						oper_admin_show_message( response_data[ 'ajx_message' ], 'info', 3000 );
						oper_rules__modify__hide();
						oper_scroll_to('#row_id_' + response_data[ 'ajx_rules_id' ] );

						//console.log( 'RULES - AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );
					} else {
						oper_admin_show_message( '<strong>' + 'Error!' + '</strong> ' + response_data['ajx_message'], 'error', 3000 );
					}

					 jQuery( '#ajax_respond' ).html( response_data );		// For ability to show response, add such DIV element to page
				}
			  ).fail( function ( jqXHR, textStatus, errorThrown ) {    if ( window.console && window.console.log ){ console.log( 'Ajax_Error', jqXHR, textStatus, errorThrown ); }

					oper_admin_show_message(  '<strong>' + 'Error!' + '</strong> ' + errorThrown , 'error', 3000 );
			  })
			  // .done(   function ( data, textStatus, jqXHR ) {   if ( window.console && window.console.log ){ console.log( 'second success', data, textStatus, jqXHR ); }    })
			  // .always( function ( data_jqXHR, textStatus, jqXHR_errorThrown ) {   if ( window.console && window.console.log ){ console.log( 'always finished', data_jqXHR, textStatus, jqXHR_errorThrown ); }     })
			  ;  // End Ajax
}


/**
 * Show Edit Form  -  Send Ajax
 *
 * @param rules_id  int
 */
function oper_rules__modify__ajx_edit_show( rules_id ){

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_RULES_MODIFY_EDIT_SHOW',
						user_id       : oper_rules__modify.get_secure_param( 'user_id' ),
						nonce         : oper_rules__modify.get_secure_param( 'nonce' ),
						locale		  : oper_rules__modify.get_secure_param( 'locale' ),

						rules_id 	  : rules_id
				},
				/**
				 * S u c c e s s
				 *
				 * @param response_data		-	its object returned from  Ajax - class-live-searcg.php
				 * @param textStatus		-	'success'
				 * @param jqXHR				-	Object
				 */
				function ( response_data, textStatus, jqXHR ) {
//console.log( 'Response MODIFY EDIT AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

					if (  'OK' == response_data[ 'ajx_process' ] ){

						// oper_admin_show_message( response_data[ 'ajx_message' ], 'info', 3000 );

						oper_rules__modify.myrules_reset();
						oper_rules__modify.myrules_set_param( 'value', 		response_data[ 'ajx_rule' ][ 'rule' ] );
						oper_rules__modify.myrules_set_param( 'rules_id', 	response_data[ 'ajx_rule' ][ 'rules_id' ] );
						oper_rules__modify.myrules_set_param( 'advanced', 	response_data[ 'ajx_rule' ][ 'advanced' ] );

						oper_rules__modify.myrules_set_param( 'expire_after', 			response_data[ 'ajx_rule' ][ 'expire_after' ] );
						oper_rules__modify.myrules_set_param( 'last_check_contact_id', 	response_data[ 'ajx_rule' ][ 'last_check_contact_id' ] );
						oper_rules__modify.myrules_set_param( 'last_run_date', 			response_data[ 'ajx_rule' ][ 'last_run_date' ] );
						oper_rules__modify.myrules_set_param( 'status', 				response_data[ 'ajx_rule' ][ 'status' ] );

						oper_rules__modify_container__show( oper_rules__modify.myrules_get_all_params() );

						//oper_rules__modify__hide();
					} else {
						oper_admin_show_message( '<strong>' + 'Error!' + '</strong> ' + response_data['ajx_message'], 'error', 3000 );
					}
					jQuery( '#ajax_respond' ).html( response_data );		// For ability to show response, add such DIV element to page
				}
			  ).fail( function ( jqXHR, textStatus, errorThrown ) {    if ( window.console && window.console.log ){ console.log( 'Ajax_Error', jqXHR, textStatus, errorThrown ); }

					oper_admin_show_message(  '<strong>' + 'Error!' + '</strong> ' + errorThrown , 'error', 3000 );
			  })
			  // .done(   function ( data, textStatus, jqXHR ) {   if ( window.console && window.console.log ){ console.log( 'second success', data, textStatus, jqXHR ); }    })
			  // .always( function ( data_jqXHR, textStatus, jqXHR_errorThrown ) {   if ( window.console && window.console.log ){ console.log( 'always finished', data_jqXHR, textStatus, jqXHR_errorThrown ); }     })
			  ;  // End Ajax
}


/**
 * Delete Rule  -  Send Ajax
 *
 * @param rules_id  int
 */
function oper_rules__modify__ajx_delete( rules_id ) {

	if ( ! oper_are_you_sure( 'Do you really want to do this ?') ) {
		return  false;
	}

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_RULES_MODIFY_DELETE',
						user_id       : oper_rules__modify.get_secure_param( 'user_id' ),
						nonce         : oper_rules__modify.get_secure_param( 'nonce' ),
						locale		  : oper_rules__modify.get_secure_param( 'locale' ),

						rules_id 	  : rules_id
				},
				/**
				 * S u c c e s s
				 *
				 * @param response_data		-	its object returned from  Ajax - class-live-searcg.php
				 * @param textStatus		-	'success'
				 * @param jqXHR				-	Object
				 */
				function ( response_data, textStatus, jqXHR ) {
//console.log( 'Response MODIFY EDIT AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

					if ( 'OK' == response_data[ 'ajx_process' ] ){
						oper_admin_show_message( 'Deleted Rule ID=' + response_data[ 'ajx_item_id' ], 'warning', 3000 );
						oper_rules__actual_listing__show();
					} else {
						oper_admin_show_message( '<strong>' + 'Error!' + '</strong> ' + response_data[ 'ajx_message' ], 'error', 3000 );
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


/**
 * Reset Start contact for specific Rule  -  Send Ajax
 *
 * @param rules_id  int
 */
function oper_rules__modify__ajx_reset( rules_id ) {

	if ( ! oper_are_you_sure( 'Do you really want to do this ?') ) {
		return  false;
	}

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_RULES_MODIFY_RESET',
						user_id       : oper_rules__modify.get_secure_param( 'user_id' ),
						nonce         : oper_rules__modify.get_secure_param( 'nonce' ),
						locale		  : oper_rules__modify.get_secure_param( 'locale' ),

						rules_id 	  : rules_id
				},
				/**
				 * S u c c e s s
				 *
				 * @param response_data		-	its object returned from  Ajax - class-live-searcg.php
				 * @param textStatus		-	'success'
				 * @param jqXHR				-	Object
				 */
				function ( response_data, textStatus, jqXHR ) {
//console.log( 'Response MODIFY EDIT AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

					if ( 'OK' == response_data[ 'ajx_process' ] ){
						oper_admin_show_message( 'Reset Rule ID=' + response_data[ 'ajx_item_id' ], 'warning', 3000 );
						oper_rules__actual_listing__show();
					} else {
						oper_admin_show_message( '<strong>' + 'Error!' + '</strong> ' + response_data[ 'ajx_message' ], 'error', 3000 );
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