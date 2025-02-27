var oper_contacts__modify = (function ( obj, $) {

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
}( oper_contacts__modify || {}, jQuery ));

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  A J A X
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Show Edit Form  -  Send Ajax
 *
 * @param contacts_id  int
 */
function oper_contacts__modify__ajx_edit_show( contacts_id ){

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_CONTACTS_MODIFY_EDIT_SHOW',
						user_id       : oper_contacts__modify.get_secure_param( 'user_id' ),
						nonce         : oper_contacts__modify.get_secure_param( 'nonce' ),
						locale		  : oper_contacts__modify.get_secure_param( 'locale' ),

						contact_id 	  : contacts_id
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


					/**
					 * ajx_contact_arr: array( 0: { _c_email: "..."
													_c_name: 	"..."
													_country_city: "..."
													_date: "22.11.2019"						​​​
													_license_key: "..."						​​​
													_license_to: "..."						​​​
													_order_num: "..."
													...
													create_date: "2019-11-22 11:32:33"						​​​
													edit_date: "2019-11-22 11:32:33"						​​​
													note: null						​​​
													contact_id: "14528"						​​​
													source: "csv"
												}
										  )
						ajx_contact_id: 14528​
						ajx_process: "OK"
					*/

					if (  'OK' == response_data[ 'ajx_process' ] ){
						// oper_admin_show_message( response_data[ 'ajx_message' ], 'info', 3000 );

						oper_contacts__modify_container__show( response_data );	//FixIn: 2020-01-02
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
 * Send Ajax to Save changes in Contact
 *
 *  Modified values inside of textarea for simplicity.
 *
 * @param ajx_contact_id
 */
function oper_contact_ajx_edit_save( ajx_contact_id ){

	// Its Contact-Form
	if ( 0 !== jQuery( '.oper_editing_contact_form :input' ).length ){

		var contact_data_arr = [];

		var skip_fields_names = [ 'contact_id', 'create_date', 'edit_date' ];

		jQuery( '.oper_editing_contact_form :input' ).each( function ( index ){

			if ( -1 === skip_fields_names.indexOf( jQuery( this ).attr( 'name' ) )  ){

				// We need to  remove any = symbols from  the name of field !!!
				var escaped_name = jQuery( this ).attr( 'name' );
				escaped_name = escaped_name.replace( /=/gi, '#' );

				// We need to remove new lines here
				var escaped_val = jQuery( this ).val();
				if ( null == escaped_val ){ escaped_val = ''; }

				escaped_val = escaped_val.replace( /\n/gi, '{{newline}}' );

				contact_data_arr.push(  escaped_name + '=' + escaped_val );
			}

		} );

		contact_data_arr = contact_data_arr.join( "\n" );

		jQuery( '#edit_contact_textarea' ).val( contact_data_arr );

	} else {
		// Its textarea by  default
	}

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_CONTACT_EDIT_SAVE_CHANGES',
						user_id       : oper_contacts__modify.get_secure_param( 'user_id' ),
						nonce         : oper_contacts__modify.get_secure_param( 'nonce' ),
						locale		  : oper_contacts__modify.get_secure_param( 'locale' ),

						contact_id 	  : ajx_contact_id,
						contact_data  : jQuery( '#edit_contact_textarea' ).val(),
				},
				/**
				 * S u c c e s s
				 *
				 * @param response_data		-	its object returned from  Ajax - class-live-searcg.php
				 * @param textStatus		-	'success'
				 * @param jqXHR				-	Object
				 */
				function ( response_data, textStatus, jqXHR ) {

					if (  'OK' == response_data[ 'ajx_process' ] ){

						oper_contacts__modify__hide( response_data[ 'ajx_contact_id' ] );
						oper_admin_show_message( 'Contact ID=' + response_data[ 'ajx_contact_id' ] + ' edited successfully', 'success', 3000 );

						// Scroll To
						var element_id = '#row_id_' + response_data[ 'ajx_contact_id' ];
						var closed_timer = setTimeout( oper_scroll_to.bind(  null, element_id ), 1500 );

					} else {
						oper_admin_show_message( '<strong>' + 'Error!' + '</strong> ' + response_data['ajx_message'], 'error', 3000 );
					}
					// jQuery( '#ajax_respond' ).html( response_data );		// For ability to show response, add such DIV element to page
				}
			  ).fail( function ( jqXHR, textStatus, errorThrown ) {    if ( window.console && window.console.log ){ console.log( 'Ajax_Error', jqXHR, textStatus, errorThrown ); }

					oper_admin_show_message(  '<strong>' + 'Error!' + '</strong> ' + errorThrown , 'error', 3000 );
			  });  																										// End Ajax
}


/**
 * Delete Contact  -  Send Ajax
 *
 * @param contacts_id  int
 */
function oper_contacts__modify__ajx_delete( contacts_id ) {

	if ( ! oper_are_you_sure( 'Do you really want to do this ?') ) {
		return  false;
	}

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_CONTACTS_MODIFY_DELETE',
						user_id       : oper_contacts__modify.get_secure_param( 'user_id' ),
						nonce         : oper_contacts__modify.get_secure_param( 'nonce' ),
						locale		  : oper_contacts__modify.get_secure_param( 'locale' ),

						contacts_id 	  : contacts_id
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

						oper_admin_show_message( 'Deleted Contact ID=' + response_data[ 'ajx_item_id' ], 'warning', 3000 );

						oper_contacts__actual_listing__show();

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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  View 	-	Edit Contact section
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Show Contacts  "Edit form"   and hide "Listing"
 *
 * @param json_param_obj		- JSON object
 */
function oper_contacts__modify_container__show( ajx_response_data ){

	oper_contacts__actual_listing__hide();		// Hide contacts listing

	var edit_form_content = '';
	if ( 'textarea' === ajx_response_data[ 'ajx_contacts_editing_via' ] ) {
		// Textarea
		edit_form_content = oper_contact_fill_edit_textarea( ajx_response_data[ 'ajx_contact_arr' ][0] );
	} else {
		// 'contact-form'
		edit_form_content = oper_contact_fill_edit_form( ajx_response_data[ 'ajx_contact_arr' ][0] , ajx_response_data[ 'ajx_contact_form_html' ] );
	}

	var save_btn = '<a href="javascript:void();" ' +
						'onclick="javascript:oper_contact_ajx_edit_save( '+ ajx_response_data[ 'ajx_contact_id' ] +' );return false;" ' +
						'class="tooltip_top button-primary button"' +
						'style="margin-right:1em;"' +
						'title="" data-original-title="' + oper_global1.message_save_changes + '" >' +
					oper_global1.message_save_changes +
					'</a>';
	var cancel_btn = '<a href="javascript:void();" ' +
						'onclick="javascript:oper_contacts__modify__hide( '+ ajx_response_data[ 'ajx_contact_id' ] +' );return false;" ' +
						'class="tooltip_top button-secondary button" ' +
						'title="" ' +
						'data-original-title="' + oper_global1.message_cancel + '" >' +
					  oper_global1.message_cancel +
					  '</a>';

	jQuery( '.oper_contacts__modify__container' ).html(
												edit_form_content +
												'<div style="margin:1em 0">' +
													save_btn +
													cancel_btn +
												'</div>'
	);

	jQuery( '.oper_contacts__modify__container' ).show();
	oper_scroll_to('.oper_contacts__modify__container');
}

	/**
	 * Fill  the Textarea, and return  ready  to  use Edit contact form
	 *
	 * @param ajx_contact_obj 				- Object  with  contact Data
	 * @returns {string}
	 */
	function oper_contact_fill_edit_textarea( ajx_contact_obj ){

		var skip_fields_names = ['contact_id', 'create_date', 'edit_date'];

		var textarea_data = [];

		_.each( ajx_contact_obj, function ( p_val, p_key, p_data ){

			if ( -1 === skip_fields_names.indexOf( p_key ) ){
				textarea_data.push( p_key + ' = ' + p_val );
			}

		} );
		var rows_number = (textarea_data.length) * 1.5;
		textarea_data = textarea_data.join( "\n" );

		return '<textarea id="edit_contact_textarea" name="edit_contact_textarea" style="width:100%;height:' + rows_number + 'em;">' + textarea_data + '</textarea>';
	}

	/**
	 * Fill  the Contact  form, and return  ready  to  use contact  form
	 *
	 * @param ajx_contact_obj 				- Object  with  contact Data
	 * @param ajx_contact_form_html 		- Contact  form in HTML format
	 * @returns {string}
	 */
	function oper_contact_fill_edit_form(   ajx_contact_obj, ajx_contact_form_html  ){

		////////////////////////////////////////////////////////////////////////////////////////////////////////
		// HTML Form
		////////////////////////////////////////////////////////////////////////////////////////////////////////

		// Replace other shortcodes, like [some_name] to some_name		But this shortcode [some_name][] will be replaced to  some_name[]
		ajx_contact_form_html = ajx_contact_form_html.replace( /(\[)([^\]]+)(\])/gi, '$2' );

		////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Form Values 		-	JavaScript replacement
		////////////////////////////////////////////////////////////////////////////////////////////////////////
		var fill_js = '';
//console.log( 'ajx_contact_obj', ajx_contact_obj );
		_.each( ajx_contact_obj, function ( p_val, p_key, p_data ){

			if ( null == p_val ){ p_val = ''; }

			var escaped_key = p_key.replace(/['\\]/g, '\\$&');				// Note: $& - inserts the matched substring.	https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/replace#Specifying_a_string_as_a_parameter
			var escaped_val = p_val.replace(/['\\]/g, '\\$&');				// Escape ' and \ symbols
				escaped_val = escaped_val.replace(/[\n\r]/g, '\\n');		// Escape New Line \n  values

			fill_js += " jQuery( '.oper_editing_contact_form :input[name=\"" + escaped_key + "\"]' ).val( '" + escaped_val + "' );";
		} );

		return  '<div class="oper_editing_contact_form">' +
					ajx_contact_form_html +
				'</div>' +
				'<script type="text/javascript">' +
					fill_js +
				'</script>' +
				'<textarea id="edit_contact_textarea" name="edit_contact_textarea" style="display:none;width:100%;height:26em;"></textarea>';
	}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Simple Fast functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Hide Edit Contact Form 	-	Cancel editing
 */
function oper_contacts__modify__hide( ajx_contact_id ){

	jQuery( '.oper_contacts__modify__container' ).html( '' );

	oper_contacts__actual_listing__show();

	// Scroll To
	var element_id = '#row_id_' + ajx_contact_id;
	var closed_timer = setTimeout( oper_scroll_to.bind(  null, element_id ), 1500 );
}