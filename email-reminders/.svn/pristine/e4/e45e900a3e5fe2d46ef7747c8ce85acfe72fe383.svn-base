/**
 * Request Object
 * Here we can  define Ajax parameters and Update it later,  when  some parameter was changed
 *
 */
var oper_help_wiz = (function ( obj, $) {

	// Secure parameters for Ajax	------------------------------------------------------------------------------------
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

	// Other parameters 			------------------------------------------------------------------------------------
	var p_other = obj.other_obj = obj.other_obj || { };
	obj.set_other_param = function ( param_key, param_val ) {
		p_other[ param_key ] = param_val;
	};
	obj.get_other_param = function ( param_key ) {
		return p_other[ param_key ];
	};

	return obj;
}( oper_help_wiz || {}, jQuery ));


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Ajax
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Send Ajax  request
 */
function oper_help_wiz_request( step ){

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_HELP_WIZ',
						user_id       : oper_help_wiz.get_secure_param( 'user_id' ),
						nonce         : oper_help_wiz.get_secure_param( 'nonce' ),
						locale		  : oper_help_wiz.get_secure_param( 'locale' ),

						wizard_step : step
				},
				/**
				 * S u c c e s s
				 *
				 * @param response_data		-	its object returned from  Ajax - class-live-searcg.php
				 * @param textStatus		-	'success'
				 * @param jqXHR				-	Object
				 */
				function ( response_data, textStatus, jqXHR ) {

console.log( 'Response OPER_HELP_WIZ  AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

					var step_arr = response_data[ 'ajx_step' ].split('|');
					var is_page_reload = false;

					if ( ( step_arr.length > 1 ) && ( 'contacts' == step_arr[0] ) && ( '' == step_arr[1] ) ){
						window.location.href = oper_global1.oper_admin_url + '?page=oper-contacts&tab=contacts';
						is_page_reload = true;
					}
					if ( ( step_arr.length > 1 ) && ( 'contacts' == step_arr[0] ) && ( 'create' == step_arr[1] ) ){
						window.location.href = oper_global1.oper_admin_url + '?page=oper-contacts&tab=contacts-add';
						is_page_reload = true;
					}
					if ( ( step_arr.length > 1 ) && ( 'contacts' == step_arr[0] ) && ( 'csv' == step_arr[1] ) ){
						window.location.href = oper_global1.oper_admin_url + '?page=oper-contacts&tab=contacts-csv';
						is_page_reload = true;
					}
					if ( ( step_arr.length > 1 ) && ( 'contacts' == step_arr[0] ) && ( 'wpbc' == step_arr[1] ) ){
						window.location.href = oper_global1.oper_admin_url + '?page=oper-contacts&tab=contacts-wpbc';
						is_page_reload = true;
					}
					////////////////////////////////////////////////////////////////////////////////////////////////////
					if (
						   ( ( step_arr.length > 1 ) && ( 'rules' == step_arr[0] ) && ( '' == step_arr[1] ) )
						|| ( ( step_arr.length > 1 ) && ( 'rules' == step_arr[0] ) && ( 'create' == step_arr[1] ) )
						|| ( ( step_arr.length > 1 ) && ( 'rules' == step_arr[0] ) && ( 'run' == step_arr[1] ) )
						|| ( ( step_arr.length > 1 ) && ( 'rules' == step_arr[0] ) && ( 'shortcode' == step_arr[1] ) )
					){
						window.location.href = oper_global1.oper_admin_url + '?page=oper-rules';
						is_page_reload = true;
					}
					////////////////////////////////////////////////////////////////////////////////////////////////////
					if (
						   ( ( step_arr.length > 1 ) && ( 'reminders' == step_arr[0] ) && ( '' == step_arr[1] ) )
						|| ( ( step_arr.length > 1 ) && ( 'reminders' == step_arr[0] ) && ( 'send' == step_arr[1] ) )
						|| ( ( step_arr.length > 1 ) && ( 'reminders' == step_arr[0] ) && ( 'shortcode' == step_arr[1] ) )
					){
						window.location.href = oper_global1.oper_admin_url + '?page=oper-reminders';
						is_page_reload = true;
					}
					////////////////////////////////////////////////////////////////////////////////////////////////////
					if ( !is_page_reload ){
						oper_help_wiz_show( response_data[ 'ajx_step' ] );
					}

   				    jQuery( '#ajax_respond' ).html( response_data );		// For ability to show response, add such DIV element to page
				}
			  ).fail( function ( jqXHR, textStatus, errorThrown ) {    if ( window.console && window.console.log ){ console.log( 'Ajax_Error', jqXHR, textStatus, errorThrown ); }

					console.log( '<strong>' + 'Error!' + '</strong> ' + errorThrown );
			  })
	          // .done(   function ( data, textStatus, jqXHR ) {   if ( window.console && window.console.log ){ console.log( 'second success', data, textStatus, jqXHR ); }    })
			  // .always( function ( data_jqXHR, textStatus, jqXHR_errorThrown ) {   if ( window.console && window.console.log ){ console.log( 'always finished', data_jqXHR, textStatus, jqXHR_errorThrown ); }     })
			  ;  // End Ajax
}



function oper_help_wiz_show( steps_str ) {
console.log( 'oper_help_wizard_ :: ' + steps_str );

	if ( undefined != steps_str) {

		var step_arr = steps_str.split('|');
		var main_step = step_arr[0];
		var sub_step = '';
		if ( ( step_arr.length > 1 ) ){
			sub_step = step_arr[1];
			if ( '' == sub_step ){
				sub_step = ' ';
			}
		}

		// Content
		var content_template_name = 'oper_help_wizard_' + main_step;
		if ( ('' != sub_step) && (' ' != sub_step) ){
			content_template_name += '_' + sub_step;
		}
		var my_tpl = wp.template( content_template_name.trim() );
		jQuery( '.oper-welcome-panel-content').html( my_tpl() );

		// Navigation
		var nav_tpl = wp.template( 'oper_help_wizard_nav_bar' );
		jQuery( '.oper-top_hint_lines').html( nav_tpl( { step: main_step } ) );
console.log( {step: main_step, sub_step: sub_step } );
		// Sub navigation
		if ( '' != sub_step ){
			var nav_tpl = wp.template( 'oper_help_wizard_sub_nav_bar' );
			jQuery( '.oper-top_sub_hint_lines' ).html( nav_tpl( {step: main_step, sub_step: sub_step } ) );
		} else {
			jQuery( '.oper-top_sub_hint_lines' ).html( '' );
		}
	}
}