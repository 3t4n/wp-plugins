jQuery( function( $ ) {
	
	// Refund charge
	$( document.body ).on( 'change', 'select[name=edd-payment-status]', function () {
		if ( 'refunded' === $( this ).val() ) {
			display_mollie_refund_input( $( this ), 'append' );
		} else {
			$( '#edd_refund_in_mollie' ).remove();
			$( 'label[for="edd_refund_in_mollie"]' ).remove();
		}
	} );

	$( document.body ).on( 'change', '.edd-order-item-refund-checkbox', function () {
		let bottom_nav = $( this ).closest( 'form' ).find( '#edd-submit-refund-submit' );
		display_mollie_refund_input( bottom_nav, 'prepend' );
	} );

	function display_mollie_refund_input( elem, position ) {
		if ( elem.parent().parent().find( '#edd_refund_in_mollie' ).length < 1 ) {
			let label = '<label for="edd_refund_in_mollie" style="margin-bottom:0; display:inline-block;">' + edd_mollie_refund.refund_charge_label + '</label>';
			let input = '<input type="checkbox" id="edd_refund_in_mollie" name="edd_refund_in_mollie" value="1" style="margin-top: 0;" />';

			if ( position == 'append' ) {
				elem.parent().parent()[position]( input );
				elem.parent().parent()[position]( label );
			} else if ( position == 'prepend' ) {
				elem.parent().parent()[position]( label );
				elem.parent().parent()[position]( input );
			}
		}
	}
	
} );