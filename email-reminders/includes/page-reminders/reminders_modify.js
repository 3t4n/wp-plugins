var oper_reminders__modify = (function ( obj, $) {

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
		// Define "Add New Reminder" properties
		///////////////////////////////////////////////////////////////////////

		var p_params = obj.params = obj.params || [];

		obj.myreminders_get_param = function ( param_id ) {
			return p_params[ param_id ];
		};

		obj.myreminders_set_param = function( param_id, param_val ) {
			p_params[ param_id ] = param_val;
		}

		obj.myreminders_get_all_params = function () {
			return p_params;
		};

		obj.myreminders_set_all_params = function( params_val ) {
			p_params = params_val;
		}

		///////////////////////////////////////////////////////////////////////
		// Such  parameters,  its Init parameters,  after  page loading.	--	Useful for do not having "value" param during editing.
		///////////////////////////////////////////////////////////////////////

		var p_init_params = obj.init_params = obj.init_params || [];

		obj.myreminders_set_init_params = function( params_init_val ) {
			p_init_params = params_init_val;
			this.myreminders_reset();
		}

		obj.myreminders_reset = function() {
			// Deep Clone
			p_params = JSON.parse( JSON.stringify( p_init_params ) );
		}

		obj.myreminders_reset_and_get_init_params = function() {
			this.myreminders_reset();
			return p_params;
		}

	return obj;
}( oper_reminders__modify || {}, jQuery ));


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// A J A X
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * Delete Reminder  -  Send Ajax
 *
 * @param reminder_id  int
 */
function oper_reminders__modify__ajx_delete( reminder_id ) {

	if ( ! oper_are_you_sure( 'Do you really want to do this ?') ) {
		return  false;
	}

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_REMINDERS_MODIFY_DELETE',
						user_id       : oper_reminders__modify.get_secure_param( 'user_id' ),
						nonce         : oper_reminders__modify.get_secure_param( 'nonce' ),
						locale		  : oper_reminders__modify.get_secure_param( 'locale' ),

						reminder_id 	  : reminder_id
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
						oper_admin_show_message( 'Deleted Reminder ID=' + response_data[ 'ajx_item_id' ], 'warning', 3000 );
						oper_reminders__actual_listing__show();
					} else {
						oper_admin_show_message( '<strong>' + 'Error!' + '</strong> ' + response_data[ 'ajx_message' ], 'error', 3000 );
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
 * Delete selected Reminders
 */
function oper_reminders_selected_delete(){

	var selected_row_id = oper_get_selected_row_id();

	if ( 0 !== selected_row_id.length ){
		oper_reminders__modify__ajx_delete( selected_row_id );
	}
}
