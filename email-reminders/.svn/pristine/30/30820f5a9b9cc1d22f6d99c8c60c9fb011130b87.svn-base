/**
 * Request Object
 * Here we can  define Search parameters and Update it later,  when  some parameter was changed
 *
 */
var oper_contacts_listing = (function ( obj, $) {

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
																		sort            : "contact_id",
																		sort_type       : "DESC",
																		page_num        : 1,
																		page_items_count: 10,
																		create_date     : "",
																		keyword         : "",
																		source          : ""
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
}( oper_contacts_listing || {}, jQuery ));


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Ajax 	-	Search
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Send Ajax search  request  for searching specific Keyword and other params
 */
function oper_contacts_ajax_search_request(){

	/**
	 *  // Show Loading Spin
	jQuery( oper_contacts_listing.get_other_param( 'listing_container' ) ).html('<div class="wpdevelop" style="text-align: center;"><span class="glyphicon glyphicon-refresh oper_spin"></span> &nbsp Loading...</div>');
	jQuery( '.oper-bottom-pagination,.oper_listing_pagination' ).html('');
	*/

//console.log( 'Send Ajax:: (all_search_params) ', oper_request_contacts.get_all_search_params() );

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_CONTACTS_LISTING',
						user_id       : oper_contacts_listing.get_secure_param( 'user_id' ),
						nonce         : oper_contacts_listing.get_secure_param( 'nonce' ),
						locale		  : oper_contacts_listing.get_secure_param( 'locale' ),

						search_params : oper_contacts_listing.search_get_all_params()
				},
				/**
				 * S u c c e s s
				 *
				 * @param response_data		-	its object returned from  Ajax - class-live-searcg.php
				 * @param textStatus		-	'success'
				 * @param jqXHR				-	Object
				 */
				function ( response_data, textStatus, jqXHR ) {

console.log( 'Response CONTACTS AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

					if ( response_data[ 'ajx_count' ] > 0 ){

						oper_contacts_show_listing( response_data[ 'ajx_items' ], response_data[ 'ajx_search_params' ] );

						oper_pagination_echo(
												oper_contacts_listing.get_other_param( 'pagination_container' ),
												{
													'page_active': response_data[ 'ajx_search_params' ][ 'page_num' ],
													'pages_count': Math.ceil( response_data[ 'ajx_count' ] / response_data[ 'ajx_search_params' ][ 'page_items_count' ] ),

													'page_items_count': response_data[ 'ajx_search_params' ][ 'page_items_count' ],
													'sort_type'       : response_data[ 'ajx_search_params' ][ 'sort_type' ]
												}
											);
						oper_contacts_define_ui_hooks();						// Redefine Hooks, because we show new DOM elements

					} else {
						oper_contacts_show_message(  '<strong>' + 'No results' + '</strong>' );
					}
					 jQuery( '#ajax_respond' ).html( response_data );		// For ability to show response, add such DIV element to page
				}
			  ).fail( function ( jqXHR, textStatus, errorThrown ) {    if ( window.console && window.console.log ){ console.log( 'Ajax_Error', jqXHR, textStatus, errorThrown ); }

					oper_contacts_show_message( '<strong>' + 'Error!' + '</strong> ' + errorThrown );
			  })
	          // .done(   function ( data, textStatus, jqXHR ) {   if ( window.console && window.console.log ){ console.log( 'second success', data, textStatus, jqXHR ); }    })
			  // .always( function ( data_jqXHR, textStatus, jqXHR_errorThrown ) {   if ( window.console && window.console.log ){ console.log( 'always finished', data_jqXHR, textStatus, jqXHR_errorThrown ); }     })
			  ;  // End Ajax
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Views
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Show Listing Table 		and define gMail checkbox hooks
 *
 * @param json_items_arr		- JSON object with Items
 * @param json_search_params	- JSON object with Search
 */
function oper_contacts_show_listing( json_items_arr, json_search_params ){

//console.log( 'json_items_arr' , json_items_arr, json_search_params );

	var list_header_tpl = wp.template( 'oper_contacts_list_header' );
	var list_row_tpl    = wp.template( 'oper_contacts_list_row' );

	// Header
	jQuery( oper_contacts_listing.get_other_param( 'listing_container' ) ).html( list_header_tpl() );

	// Body
	jQuery( oper_contacts_listing.get_other_param( 'listing_container' ) ).append( '<div class="oper_selectable_body"></div>' );

	// R o w s
	_.each( json_items_arr, function ( p_val, p_key, p_data ){
		if ( 'undefined' !== typeof json_search_params[ 'keyword' ] ){													// Parameter for marking keyword with different color in a list
			p_val[ '__search_request_keyword__' ] = json_search_params[ 'keyword' ];
		} else {
			p_val[ '__search_request_keyword__' ] = '';
		}
		jQuery( oper_contacts_listing.get_other_param( 'listing_container' ) + ' .oper_selectable_body' ).append( list_row_tpl( p_val ) );
	} );

	oper_define_gmail_checkbox_selection( jQuery );						// Redefine Hooks for clicking at Checkboxes
}

/**
 * Show just message instead of listing and hide pagination
 */
function oper_contacts_show_message( message ){
//console.log( 'oper_contacts_show_message', message );

	oper_contacts__actual_listing__hide();

	jQuery( oper_contacts_listing.get_other_param( 'listing_container' ) ).html(
												'<div class="oper-settings-notice notice-warning" style="text-align:left">' +
													message +
												'</div>'
										);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  H o o k s	-	its Action/Times when  need to re-Render Views
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Send Ajax Search Request after Updating search request parameters
 *
 * @param params_arr
 */
function oper_contacts_send_search_request_with_params ( params_arr ){

	// Define different Search  parameters for request
	_.each( params_arr, function ( p_val, p_key, p_data ) {
		//console.log( 'Request for: ', p_key, p_val );
		oper_contacts_listing.search_set_param( p_key, p_val );
	});

	// Send Ajax Request
	oper_contacts_ajax_search_request();
}

/**
 * Search request for "Page Number"
 * @param page_number	int
 */
function oper_contacts_pagination_click( page_number ){

	oper_contacts_send_search_request_with_params( {
										'page_num': page_number
									} );
}

/**
 * Search request for "Keyword", also set current page to  1
 *
 * @param element_id	-	HTML ID  of element,  where was entered keyword
 */
function oper_contacts_send_search_request_for_keyword( element_id ) {

	// We need to Reset page_num to 1 with each new search, because we can be at page #4,  but after  new search  we can  have totally  only  1 page
	oper_contacts_send_search_request_with_params( {
											'keyword'  : jQuery( element_id ).val(),
											'page_num': 1
										} );
}

	/**
	 * Send search request after few seconds (usually after 1,5 sec)
	 * Closure function. Its useful,  for do  not send too many Ajax requests, when someone make fast typing.
	 */
	var oper_contacts_searching_after_few_seconds = function (){

		var closed_timer = 0;

		return function ( element_id, timer_delay ){

			// Get default value of "timer_delay",  if parameter was not passed into the function.
			timer_delay = typeof timer_delay !== 'undefined' ? timer_delay : 1500;

			clearTimeout( closed_timer );		// Clear previous timer

			// Start new Timer
			closed_timer = setTimeout( oper_contacts_send_search_request_for_keyword.bind(  null, element_id ), timer_delay );
		}
	}();

/**
 * Define HTML ui Hooks: on KeyUp | Change | -> Sort Order & Number Items / Page
 */
function oper_contacts_define_ui_hooks(){

	// UI - live search element
	jQuery( '#oper_search_field' ).on( "keyup", function ( event ){
		if ( 13 !== event.which ){
			oper_contacts_searching_after_few_seconds( '#oper_search_field' );							// Searching after 1.5 seconds after Key Up
		} else {
			oper_contacts_searching_after_few_seconds( '#oper_search_field', 0 );						// Immediate search
		}
	} );

	// Source
	jQuery( '.oper_items_source' ).on( 'change', function( event ){

		oper_contacts_send_search_request_with_params( {
											'source'  : jQuery( this ).val(),
											'page_num': 1
										} );
	} );

	///////////////////////////////////////////////////////////////////////////////////////////////////

	// Items Per Page
	jQuery( '.oper_items_per_page' ).on( 'change', function( event ){

		oper_contacts_send_search_request_with_params( {
											'page_items_count'  : jQuery( this ).val(),
											'page_num': 1
										} );
	} );

	// Sorting
	jQuery( '.oper_items_sort_type' ).on( 'change', function( event ){

		oper_contacts_send_search_request_with_params( {'sort_type': jQuery( this ).val()} );
	} );
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Simple Fast functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 *  Show Listing Table 	- 	Sending Ajax Request	-	with parameters that  we early  defined in "oper_contacts_listing" Obj.
 */
function oper_contacts__actual_listing__show(){

	// Send Ajax Request	-	with parameters that  we early  defined in "oper_contacts_listing" Obj.
	oper_contacts_ajax_search_request();
}

/**
 * Hide Listing Table ( and Pagination )
 */
function oper_contacts__actual_listing__hide(){

	jQuery( oper_contacts_listing.get_other_param( 'listing_container' )    ).html( '' );
	jQuery( oper_contacts_listing.get_other_param( 'pagination_container' ) ).html( '' );
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Edit | Delete Clicks
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Show Edit form for Contact
 *
 * @param contact_id
 */
function oper_contacts_ajx_edit( contact_id ){

    oper_contacts__modify__ajx_edit_show( contact_id );
}

/**
 * Delete Contact
 *
 * @param contact_id
 */
function oper_contacts_ajx_delete( contact_id ){

    oper_contacts__modify__ajx_delete( contact_id );
}

/**
 * Delete selected Reminders
 */
function oper_contacts_selected_delete(){

	var selected_row_id = oper_get_selected_row_id();

	if ( 0 !== selected_row_id.length ){
		oper_contacts__modify__ajx_delete( selected_row_id );
	}
}