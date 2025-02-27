/**
 * Run Rule  -  Send Ajax
 *
 * @param rules_id  int
 */
function oper_rules__ajx__run_rule( rules_id ) {

						// Show Terminal  //////////////////////////////////////////////
						if ( '' == jQuery( '.oper_log_screen' ).html() ) {
							jQuery( '.oper_log_screen' ).show();
							oper_scroll_to( '.oper_log_screen' );
							jQuery( '.oper_log_screen' ).append( '<div>' + 'Start processing rule ID=' + '<strong>' + rules_id + '</strong> ' + '</div>');
						}
						////////////////////////////////////////////////////////////////
	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_RULES_RUN',
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
//console.log( 'Response RUN EDIT AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

					if ( 'OK' == response_data[ 'ajx_process' ] ){

						// Echo 2 Terminal  ////////////////////////////////////////////
						jQuery( '.oper_log_screen' ).show();
						jQuery( '.oper_log_screen' ).append( '<div>' +'Rule ID=' + '<strong>' + rules_id + '</strong> ' + response_data[ 'ajx_message' ]  + '</div>');
						////////////////////////////////////////////////////////////////

						// oper_admin_show_message( 'Created ' + response_data[ 'ajx_data_count' ] + ' new reminders', 'info', 3000 );
						// oper_scroll_to( '.oper_header' );

						if ( parseInt( response_data[ 'ajx_max_contact_id' ] ) > parseInt( response_data[ 'ajx_last_contact_id' ] ) ){
							oper_rules__actual_listing__show();
							oper_rules__ajx__run_rule( response_data[ 'ajx_rules_id' ] );
						}

					} else if ( 'AJX_FINISHED' == response_data[ 'ajx_process' ] ){

						// Echo 2 Terminal  and hide	////////////////////////////////
						jQuery( '.oper_log_screen' ).append( '<div>' + response_data[ 'ajx_message' ] + '</div>');
						jQuery( '.oper_log_screen' ).append( '<div>' + '<strong>' + 'Done!' + '</strong> ' + '</div>');
						setTimeout( function (){
							jQuery( '.oper_log_screen' ).html( '' );
							jQuery( '.oper_log_screen' ).hide();
						}, 30000 );
						////////////////////////////////////////////////////////////////

						oper_rules__actual_listing__show();
						oper_admin_show_message( '<strong>' + 'Done!' + '</strong> ' + response_data[ 'ajx_message' ], 'info', 3000 );
					} else {
						oper_admin_show_message( '<strong>' + 'Error!' + '</strong> ' + response_data[ 'ajx_message' ], 'error', 3000 );
					}
					 jQuery( '#ajax_respond' ).html( response_data );		// For ability to show response, add such DIV element to page
				}
			  ).fail( function ( jqXHR, textStatus, errorThrown ) {    if ( window.console && window.console.log ){ console.log( 'Ajax_Error', jqXHR, textStatus, errorThrown ); }

					oper_admin_show_message(  '<strong>' + 'Error!' + '</strong> ' + errorThrown , 'error', 10000 );
			  })
			  // .done(   function ( data, textStatus, jqXHR ) {   if ( window.console && window.console.log ){ console.log( 'second success', data, textStatus, jqXHR ); }    })
			  // .always( function ( data_jqXHR, textStatus, jqXHR_errorThrown ) {   if ( window.console && window.console.log ){ console.log( 'always finished', data_jqXHR, textStatus, jqXHR_errorThrown ); }     })
			  ;  // End Ajax
}