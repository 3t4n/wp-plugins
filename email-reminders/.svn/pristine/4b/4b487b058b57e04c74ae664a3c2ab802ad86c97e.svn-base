var oper_reminders_listing = (function ( obj, $) {

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


	// Listing Search parameters	------------------------------------------------------------------------------------
	var p_listing = obj.search_request_obj = obj.search_request_obj || {
																			page_items_count: 10,
																			page_num        : 1,
																			sort            : "reminder_id",
																			sort_type       : "DESC",
																			status          : ""
																		};

	obj.search_set_all_params = function ( request_param_obj ) {
		p_listing = request_param_obj;
	};

	obj.search_get_all_params = function () {
		return p_listing;
	};

	obj.search_get_param = function ( param_key ) {
		return p_listing[ param_key ];
	};

	obj.search_set_param = function ( param_key, param_val ) {
		p_listing[ param_key ] = param_val;
	};

	obj.search_set_params_arr = function( params_arr ){
		_.each( params_arr, function ( p_val, p_key, p_data ){															// Define different Search  parameters for request
			this.search_set_param( p_key, p_val );
		} );
	}


	// Other parameters 			------------------------------------------------------------------------------------
	var p_other = obj.other_obj = obj.other_obj || { };

	obj.set_other_param = function ( param_key, param_val ) {
		p_other[ param_key ] = param_val;
	};

	obj.get_other_param = function ( param_key ) {
		return p_other[ param_key ];
	};


	return obj;
}( oper_reminders_listing || {}, jQuery ));

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Ajax 	-	Search
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Send Ajax search  request  for searching specific Keyword and other params
	 */
	function oper_reminders_ajax_search_request(){

	//console.log( 'Send Ajax:: (all_search_params) ', oper_request_contacts.get_all_search_params() );

		// Show Loading Spin
		// jQuery( oper_reminders_listing.get_other_param( 'listing_container' ) ).html('<div class="wpdevelop" style="text-align: center;"><span class="glyphicon glyphicon-refresh oper_spin"></span> &nbsp Loading...</div>');

		// Start Ajax
		jQuery.post( oper_global1.oper_ajaxurl,
					{
							action        : 'OPER_REMINDERS_LISTING',
							user_id       : oper_reminders_listing.get_secure_param( 'user_id' ),
							nonce         : oper_reminders_listing.get_secure_param( 'nonce' ),
							locale		  : oper_reminders_listing.get_secure_param( 'locale' ),

							search_params : oper_reminders_listing.search_get_all_params()
					},
					/**
					 * S u c c e s s
					 *
					 * @param response_data		-	its object returned from  Ajax - class-live-searcg.php
					 * @param textStatus		-	'success'
					 * @param jqXHR				-	Object
					 */
					function ( response_data, textStatus, jqXHR ) {
						/*
							'ajx_count'         => $data_arr['count'],
							'ajx_items'         => $data_arr['data_arr'],
							'ajx_search_params' => $_REQUEST['search_params']
						 */
	//console.log( 'Response Reminders AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

						if ( response_data[ 'ajx_count' ] > 0 ){

							oper_reminders_show_contacts_listing( response_data[ 'ajx_items' ], response_data[ 'ajx_search_params' ] );

							oper_pagination_echo(
													oper_reminders_listing.get_other_param( 'pagination_container' ),
													{
														'page_active': response_data[ 'ajx_search_params' ][ 'page_num' ],
														'pages_count': Math.ceil( response_data[ 'ajx_count' ] / response_data[ 'ajx_search_params' ][ 'page_items_count' ] ),

														'page_items_count': response_data[ 'ajx_search_params' ][ 'page_items_count' ],
														'sort_type'       : response_data[ 'ajx_search_params' ][ 'sort_type' ]
													}
												);
							oper_reminders_define_ui_hooks();						// Redefine Hooks, because we show new DOM elements

						} else {
							oper_reminders_show_listing_message(  '<strong>' + 'No results' + '</strong>' );
						}
						 jQuery( '#ajax_respond' ).html( response_data );		// For ability to show response, add such DIV element to page
					}
				  ).fail( function ( jqXHR, textStatus, errorThrown ) {    if ( window.console && window.console.log ){ console.log( 'Ajax_Error', jqXHR, textStatus, errorThrown ); }

						oper_reminders_show_listing_message( '<strong>' + 'Error!' + '</strong> ' + errorThrown );
				  })
				  // .done(   function ( data, textStatus, jqXHR ) {   if ( window.console && window.console.log ){ console.log( 'second success', data, textStatus, jqXHR ); }    })
				  // .always( function ( data_jqXHR, textStatus, jqXHR_errorThrown ) {   if ( window.console && window.console.log ){ console.log( 'always finished', data_jqXHR, textStatus, jqXHR_errorThrown ); }     })
				  ;  // End Ajax
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Views
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Show Listing Table
	 *
	 * @param json_items_arr		- JSON object with Items
	 * @param json_search_params	- JSON object with Search
	 */
	function oper_reminders_show_contacts_listing( json_items_arr, json_search_params ){

//console.log( 'json_items_arr' , json_items_arr, json_search_params );

		var list_header_tpl = wp.template( 'oper_reminders_list_header' );
		var list_row_tpl    = wp.template( 'oper_reminders_list_row' );

		// Header
		jQuery( oper_reminders_listing.get_other_param( 'listing_container' ) ).html( list_header_tpl() );

		// Body
		jQuery( oper_reminders_listing.get_other_param( 'listing_container' ) ).append( '<div class="oper_selectable_body"></div>' );

		/**
		 * json_items_arr = [	0: {										​​
										__search_request_keyword__: ""										​​
										_address: "Winnipeg street"										​​
										_c_email: "ola@server.com"
										_c_name: "Ola Johnson"
										_country_city: "Canada, Manitoba"
										_date: "24.04.2019"
										...
										advanced: {
														send_week0: "Off"
														send_week1: "On"
														send_week2: "On"
														send_week3: "On"
														send_week4: "On"
														send_week5: "On"
														send_week6: "Off"
														time_from: "11:00"
														time_to: "14:30"														​​​
										}
										contact_id: "13086"
										create_date: "2020-02-20 15:14:54"
										edit_date: "2020-02-20 15:14:54"
										email_template: "super_new"
										note: null
										re_create_date: "2020-04-23 10:01:16"
										re_edit_date: "2020-04-23 10:01:16"
										reminder_id: "160"
										rules_id: "48"
										run_date: null
										source: "csv"
										status: "init"
								}, ...
		 					]
		 */

		// R o w s
		_.each( json_items_arr, function ( p_val, p_key, p_data ){
			if ( 'undefined' !== typeof json_search_params[ 'keyword' ] ){													// Parameter for marking keyword with different color in a list
				p_val[ '__search_request_keyword__' ] = json_search_params[ 'keyword' ];
			} else {
				p_val[ '__search_request_keyword__' ] = '';
			}
			jQuery( oper_reminders_listing.get_other_param( 'listing_container' ) + ' .oper_selectable_body' ).append( list_row_tpl( p_val ) );
		} );

		oper_define_gmail_checkbox_selection( jQuery );						// Redefine Hooks for clicking at Checkboxes
	}

	/**
	 * Show just  message instead of listing  		and hide pagination
	 *
	 * @param string message
	 */
	function oper_reminders_show_listing_message( message ){
	//console.log( 'oper_reminders_show_listing_message', message );

		oper_reminders__actual_listing__hide();

		jQuery( oper_reminders_listing.get_other_param( 'listing_container' ) ).html(
													'<div class="oper-settings-notice notice-warning" style="text-align:left">' +
														message +
													'</div>'
											);
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  H o o k s	-	its Action/Times when  need to re-Render Views
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	jQuery(document).ready(function(){

		// Sorting - Toolbar
		jQuery( '.oper_toolbar_items_sort_type' ).on( 'change', function( event ){

			oper_reminders_send_search_request_with_params( {'sort_type': jQuery( this ).val()} );
		} );


		// Status - Toolbar
		jQuery( '.oper_reminders_status' ).on( 'change', function( event ){

			oper_reminders_send_search_request_with_params( {'status': jQuery( this ).val()} );
		} );

	});


	/**
	 * Define HTML ui Hooks: on KeyUp | Change | -> Sort Order & Number Items / Page
	 */
	function oper_reminders_define_ui_hooks(){

		// Items Per Page
		jQuery( '.oper_items_per_page' ).on( 'change', function( event ){

			oper_reminders_send_search_request_with_params( {
												'page_items_count'  : jQuery( this ).val(),
												'page_num': 1
											} );
		} );

		// Sorting
		jQuery( '.oper_items_sort_type' ).on( 'change', function( event ){

			/*
				// Set  the same value of sort option  in Toolbar, as its was set at pagination area --
				// TODO: test  about recursion sending Ajax requests. Its seems that  .val() does not generate on  change event, so  everything is fine
				jQuery( '.oper_toolbar_items_sort_type' ).val( jQuery( this ).val() );
			*/

			oper_reminders_send_search_request_with_params( {'sort_type': jQuery( this ).val()} );
		} );


		// UI - live search element
		jQuery( '#oper_reminder_search_field' ).on( "keyup", function ( event ){
			if ( 13 !== event.which ){
				oper_reminders_searching_after_few_seconds( '#oper_reminder_search_field' );								// Searching after 1.5 seconds after Key Up
			} else {
				oper_reminders_searching_after_few_seconds( '#oper_reminder_search_field', 0 );								// Immediate search
			}
		} );
	}


	/**
	 * Send Ajax Search Request after Updating search request parameters
	 *
	 * @param params_arr
	 */
	function oper_reminders_send_search_request_with_params ( params_arr ){

		// Define different Search  parameters for request
		_.each( params_arr, function ( p_val, p_key, p_data ) {
			//console.log( 'Request for: ', p_key, p_val );
			oper_reminders_listing.search_set_param( p_key, p_val );
		});

		// Send Ajax Request
		oper_reminders_ajax_search_request();
	}


	/**
	 * Search request for "Page Number"
	 * @param page_number	int
	 */
	function oper_reminders_pagination_click( page_number ){

		oper_reminders_send_search_request_with_params( {
											'page_num': page_number
										} );
	}


	/**
	 * Search request for "Keyword", also set current page to  1
	 *
	 * @param element_id	-	HTML ID  of element,  where was entered keyword
	 */
	function oper_reminders_send_search_request_for_keyword( element_id ) {

		// We need to Reset page_num to 1 with each new search, because we can be at page #4,  but after  new search  we can  have totally  only  1 page
		oper_reminders_send_search_request_with_params( {
												'keyword'  : jQuery( element_id ).val(),
												'page_num': 1
											} );
	}


		/**
		 * Send search request after few seconds (usually after 1,5 sec)
		 * Closure function. Its useful,  for do  not send too many Ajax requests, when someone make fast typing.
		 */
		var oper_reminders_searching_after_few_seconds = function (){

			var closed_timer = 0;

			return function ( element_id, timer_delay ){

				// Get default value of "timer_delay",  if parameter was not passed into the function.
				timer_delay = typeof timer_delay !== 'undefined' ? timer_delay : 1500;

				clearTimeout( closed_timer );		// Clear previous timer

				// Start new Timer
				closed_timer = setTimeout( oper_reminders_send_search_request_for_keyword.bind(  null, element_id ), timer_delay );
			}
		}();


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Simple Fast functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	function oper_reminders__actual_listing__show(){

		// Send Ajax Request	-	with parameters that  we early  defined in "oper_reminders_listing" Obj.
		oper_reminders_ajax_search_request();
	}

	function oper_reminders__actual_listing__hide(){

		jQuery( oper_reminders_listing.get_other_param( 'listing_container' )    ).html( '' );
		jQuery( oper_reminders_listing.get_other_param( 'pagination_container' ) ).html( '' );
	}