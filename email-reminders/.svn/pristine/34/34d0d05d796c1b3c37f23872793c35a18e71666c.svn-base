var oper_rules_listing = (function ( obj, $) {

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
																			sort            : "rules_id",
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
}( oper_rules_listing || {}, jQuery ));

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Ajax 	-	Search
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Send Ajax search  request  for searching specific Keyword and other params
 */
function oper_rules_ajax_search_request(){

//console.log( 'Send Ajax:: (all_search_params) ', oper_request_contacts.get_all_search_params() );

	// Show Loading Spin
	// jQuery( oper_rules_listing.get_other_param( 'listing_container' ) ).html('<div class="wpdevelop" style="text-align: center;"><span class="glyphicon glyphicon-refresh oper_spin"></span> &nbsp Loading...</div>');

	// Start Ajax
	jQuery.post( oper_global1.oper_ajaxurl,
				{
						action        : 'OPER_RULES_LISTING',
						user_id       : oper_rules_listing.get_secure_param( 'user_id' ),
						nonce         : oper_rules_listing.get_secure_param( 'nonce' ),
						locale		  : oper_rules_listing.get_secure_param( 'locale' ),

						search_params : oper_rules_listing.search_get_all_params()
				},
				/**
				 * S u c c e s s
				 *
				 * @param response_data		-	its object returned from  Ajax - class-live-searcg.php
				 * @param textStatus		-	'success'
				 * @param jqXHR				-	Object
				 */
				function ( response_data, textStatus, jqXHR ) {

console.log( 'Response RULES AJAX::', response_data, {'status:': textStatus, 'jqXHR:': jqXHR} );

					if ( response_data[ 'ajx_count' ] > 0 ){

						oper_rules_show_contacts_listing( response_data[ 'ajx_items' ], response_data[ 'ajx_search_params' ] );

						oper_pagination_echo(
												oper_rules_listing.get_other_param( 'pagination_container' ),
												{
													'page_active': response_data[ 'ajx_search_params' ][ 'page_num' ],
													'pages_count': Math.ceil( response_data[ 'ajx_count' ] / response_data[ 'ajx_search_params' ][ 'page_items_count' ] ),

													'page_items_count': response_data[ 'ajx_search_params' ][ 'page_items_count' ],
													'sort_type'       : response_data[ 'ajx_search_params' ][ 'sort_type' ]
												}
											);
						oper_rules_define_ui_hooks();						// Redefine Hooks, because we show new DOM elements

					} else {
						oper_rules_show_listing_message(  '<strong>' + 'No results' + '</strong>' );
					}
					 jQuery( '#ajax_respond' ).html( response_data );		// For ability to show response, add such DIV element to page
				}
			  ).fail( function ( jqXHR, textStatus, errorThrown ) {    if ( window.console && window.console.log ){ console.log( 'Ajax_Error', jqXHR, textStatus, errorThrown ); }

					oper_rules_show_listing_message( '<strong>' + 'Error!' + '</strong> ' + errorThrown );
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
function oper_rules_show_contacts_listing( json_items_arr, json_search_params ){

//console.log( 'json_items_arr' , json_items_arr, json_search_params );

	var list_header_tpl = wp.template( 'oper_rules_list_header' );
	var list_row_tpl    = wp.template( 'oper_rules_list_row' );

	// Header
	jQuery( oper_rules_listing.get_other_param( 'listing_container' ) ).html( list_header_tpl() );

	// Body
	jQuery( oper_rules_listing.get_other_param( 'listing_container' ) ).append( '<div class="oper_selectable_body"></div>' );

	// R o w s
	_.each( json_items_arr, function ( p_val, p_key, p_data ){
		if ( 'undefined' !== typeof json_search_params[ 'keyword' ] ){													// Parameter for marking keyword with different color in a list
			p_val[ '__search_request_keyword__' ] = json_search_params[ 'keyword' ];
		} else {
			p_val[ '__search_request_keyword__' ] = '';
		}
		jQuery( oper_rules_listing.get_other_param( 'listing_container' ) + ' .oper_selectable_body' ).append( list_row_tpl( p_val ) );
	} );

	oper_define_gmail_checkbox_selection( jQuery );						// Redefine Hooks for clicking at Checkboxes
}

/**
 * Show just  message instead of listing  		and hide pagination
 *
 * @param string message
 */
function oper_rules_show_listing_message( message ){
//console.log( 'oper_rules_show_listing_message', message );

	oper_rules__actual_listing__hide();

	jQuery( oper_rules_listing.get_other_param( 'listing_container' ) ).html(
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
function oper_rules_send_search_request_with_params ( params_arr ){

	// Define different Search  parameters for request
	_.each( params_arr, function ( p_val, p_key, p_data ) {
		//console.log( 'Request for: ', p_key, p_val );
		oper_rules_listing.search_set_param( p_key, p_val );
	});

	// Send Ajax Request
	oper_rules_ajax_search_request();
}

/**
 * Search request for "Page Number"
 * @param page_number	int
 */
function oper_rules_pagination_click( page_number ){

	oper_rules_send_search_request_with_params( {
										'page_num': page_number
									} );
}

/**
 * Define HTML ui Hooks: on KeyUp | Change | -> Sort Order & Number Items / Page
 */
function oper_rules_define_ui_hooks(){

	// Items Per Page
	jQuery( '.oper_items_per_page' ).on( 'change', function( event ){

		oper_rules_send_search_request_with_params( {
											'page_items_count'  : jQuery( this ).val(),
											'page_num': 1
										} );
	} );

	// Sorting
	jQuery( '.oper_items_sort_type' ).on( 'change', function( event ){

		oper_rules_send_search_request_with_params( {'sort_type': jQuery( this ).val()} );
	} );
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Simple Fast functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function oper_rules__actual_listing__show(){

	// Send Ajax Request	-	with parameters that  we early  defined in "oper_rules_listing" Obj.
	oper_rules_ajax_search_request();
}

function oper_rules__actual_listing__hide(){

	jQuery( oper_rules_listing.get_other_param( 'listing_container' )    ).html( '' );
	jQuery( oper_rules_listing.get_other_param( 'pagination_container' ) ).html( '' );
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Edit | Delete Clicks
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function oper_rules_ajx_edit( item_id ){

    oper_rules__modify__ajx_edit_show( item_id );
}

function oper_rules_ajx_delete( item_id ){

    oper_rules__modify__ajx_delete( item_id );
}

function oper_rules_ajx_run( item_id ){

	oper_rules__ajx__run_rule( item_id );
}
