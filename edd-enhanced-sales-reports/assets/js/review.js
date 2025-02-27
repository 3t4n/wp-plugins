jQuery( document ).on( 'click', '#edd-enhanced-sales-reports-review .notice-dismiss', function() {
	
	var edd_enhanced_sales_reports_review_data = {
		action: 'edd_enhanced_sales_reports_review_notice',
	};
	
	jQuery.post( ajaxurl, edd_enhanced_sales_reports_review_data, function( response ) {
	} );
} );