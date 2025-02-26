jQuery( function( $ ) {
	if ( typeof edd_mollie_receipt !== 'undefined' ) {
		eddMollieReceiptStatusUpdate();
		setTimeout(eddMollieReceiptStatusUpdate, 1000);   // 1  second
		setTimeout(eddMollieReceiptStatusUpdate, 5000);   // 5  seconds
		setTimeout(eddMollieReceiptStatusUpdate, 10000);  // 10 seconds
		setTimeout(eddMollieReceiptStatusUpdate, 30000);  // 30 seconds
		setTimeout(eddMollieReceiptStatusUpdate, 60000);  // 60 seconds
		setTimeout(eddMollieReceiptStatusUpdate, 300000); // 5  minutes
	}

	function eddMollieReceiptStatusUpdate() {
		var data = {
			action:   'edd_mollie_receipt_ajax_status',
			security: edd_mollie_receipt.nonce,
			order_id: edd_mollie_receipt.order_id
		};

		$.ajax( {
			url:      edd_mollie_receipt.ajax_url,
			data:     data,
			dataType : 'json',
			type     : 'POST',
			success:  function( response ) {
				if ( response.success ) {
					$('#edd_purchase_receipt td.edd_receipt_payment_status:last').text(response.data);
					if ( response.data !== edd_mollie_receipt.status ) {
						location.reload(); // reload page when status was updated
					}
				}
			}
		} );
	}

});