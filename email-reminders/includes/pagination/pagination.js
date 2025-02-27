////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  Views
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Show Pagination
 *
 * @param pagination_container		- '.oper_rules_pagination'
 * @param params_obj				- JSON object	~	{ 'page_active': $page_active, 'pages_count': $pages_count }
 */
function oper_pagination_echo( pagination_container, params_obj ){

	var pagination = wp.template( 'oper_pagination' );
	jQuery( pagination_container ).html( '<div class="oper-bottom-pagination"></div>' );

	// Pagination
	jQuery( pagination_container + ' .oper-bottom-pagination').append(  pagination( params_obj ) ) ;


	// Number of items per page
	var pagination_items_per_page = wp.template( 'oper_pagination_items_per_page' );
	jQuery( pagination_container + ' .oper-bottom-pagination').append(  pagination_items_per_page( params_obj ) ) ;

	jQuery( pagination_container ).show();
}


/**
 * Blank function.  -- Redefine this function in specific page-XXXX.php  file for specific actions
 *
 * @param page_number	int
 */
function oper_pagination_click_page( page_number ){
	console.log( 'oper_pagination_click_page', page_number );
}