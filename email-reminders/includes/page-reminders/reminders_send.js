////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Send selected
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Send selected Reminders from  Reminders menu page in admin panel
 */
function oper_reminders_selected_send(){

	var selected_row_id = oper_get_selected_row_id();

	if ( 0 !== selected_row_id.length ){
		oper_reminders__ajx__send( selected_row_id );
	}
}


/**
 * Run Rule  -  Send Ajax
 *
 * @param reminders_id  int
 */
function oper_reminders__ajx__send( reminders_id ) {

	// Show Terminal  //////////////////////////////////////////////
	if ( '' == jQuery( '.oper_log_screen' ).html() ) {
		jQuery( '.oper_log_screen' ).show();
		jQuery( '.oper_log_screen' ).append( '<div>' + 'Start processing reminder ID=' + '<strong>' + reminders_id + '</strong> ' + '</div>');
		oper_scroll_to( '.oper_log_screen' );
	}
	////////////////////////////////////////////////////////////////

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
			{
					action        : 'OPER_REMINDERS_SEND',
					user_id       : oper_reminders__modify.get_secure_param( 'user_id' ),
					nonce         : oper_reminders__modify.get_secure_param( 'nonce' ),
					locale		  : oper_reminders__modify.get_secure_param( 'locale' ),

					reminders_id 	  : reminders_id
			},
			/**
			 * S u c c e s s
			 *
			 * @param response_data		-	its object returned from  Ajax - class-live-searcg.php
			 * @param textStatus		-	'success'
			 * @param jqXHR				-	Object
			 */
			function ( response_data, textStatus, jqXHR ) {
//console.log( 'Response Reminder Send - AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

				if ( 'OK' == response_data[ 'ajx_process' ] ){

					// Echo 2 Terminal  ////////////////////////////////////////////
					jQuery( '.oper_log_screen' ).show();
					if ( response_data [ 'ajx_emails_sent' ].length > 0 ){
						jQuery( '.oper_log_screen' ).append( '<div>' +
								'<strong style="color:#8dff64;font-weight: 600;">[ ' + 'Ok' + ' ]</strong> '
								+ 'Reminder(s) have been sent ' + '<strong>' + JSON.stringify( response_data [ 'ajx_emails_sent' ] ) + '</strong>' + '</div>' );
					}
					if ( response_data [ 'ajx_emails_not_sent' ].length > 0 ) {
						jQuery( '.oper_log_screen' ).append( '<div>' +
							  	'<strong style="color:#ffa564;font-weight: 600;">[ ' + 'Error' + ' ]</strong> '
								+ 'Reminder(s) have not been sent ' + '<strong>' + JSON.stringify( response_data [ 'ajx_emails_not_sent' ] )+ '</strong>' + '</div>' );
					}
					////////////////////////////////////////////////////////////////

					oper_reminders__actual_listing__show();

					oper_admin_show_message( '<strong>' + 'Done!' + '</strong> ' + response_data[ 'ajx_message' ], 'info', 3000 );

					// Hide  Terminal  ////////////////////////////////////////////
					setTimeout( function (){
						jQuery( '.oper_log_screen' ).html( '' );
						jQuery( '.oper_log_screen' ).hide();
					}, 5000 );
					////////////////////////////////////////////////////////////////

				} else  {
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