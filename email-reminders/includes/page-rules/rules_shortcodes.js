var oper_rules__client = (function ( obj, $) {

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

	return obj;
}( oper_rules__client || {}, jQuery ));


/**
 * Run Rule  -  Send Ajax
 *
 * @param rules_id  int
 */
function oper_rules__ajx__front_end_run_rule( rules_id ) {

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_RULES_RUN',
						user_id       : oper_rules__client.get_secure_param( 'user_id' ),
						nonce         : oper_rules__client.get_secure_param( 'nonce' ),
						locale		  : oper_rules__client.get_secure_param( 'locale' ),

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
// console.log( 'Client Response RUN EDIT AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

					if ( 'OK' == response_data[ 'ajx_process' ] ){

						console.log(  'OPER.RULES.SHORTCODE - OK - [ ID = ' + rules_id + '] : ' + response_data[ 'ajx_message' ], response_data );

						if ( parseInt( response_data[ 'ajx_max_contact_id' ] ) > parseInt( response_data[ 'ajx_last_contact_id' ] ) ){
							oper_rules__ajx__front_end_run_rule( response_data[ 'ajx_rules_id' ] );
						}

					} else if ( 'AJX_FINISHED' == response_data[ 'ajx_process' ] ){

						console.log( 'OPER.RULES.SHORTCODE - AJX_FINISHED - ' + response_data[ 'ajx_message' ] );
					} else {

						console.log( 'OPER.RULES.SHORTCODE - ERROR  - ' + response_data[ 'ajx_message' ] );
					}
					// jQuery( '#ajax_respond' ).html( response_data );		// For ability to show response, add such DIV element to page
				}
			  ).fail( function ( jqXHR, textStatus, errorThrown ) {    if ( window.console && window.console.log ){ console.log( 'Ajax_Error', jqXHR, textStatus, errorThrown ); }

						console.log( 'OPER.RULES.SHORTCODE - FAIL - ' + errorThrown );
			  })
			  // .done(   function ( data, textStatus, jqXHR ) {   if ( window.console && window.console.log ){ console.log( 'second success', data, textStatus, jqXHR ); }    })
			  // .always( function ( data_jqXHR, textStatus, jqXHR_errorThrown ) {   if ( window.console && window.console.log ){ console.log( 'always finished', data_jqXHR, textStatus, jqXHR_errorThrown ); }     })
			  ;  // End Ajax
}