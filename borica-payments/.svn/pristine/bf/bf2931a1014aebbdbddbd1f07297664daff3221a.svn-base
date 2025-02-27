jQuery(document).ready(function($) {
		const formBorica = document.getElementById('borica_payment_form');
		formBorica.addEventListener('submit', function(event) {
			event.preventDefault();
			$.ajax({
				url: borica_pay_js.ajax_url + '?action=borica_send',
				type: 'post',
				dataType: 'json',
				data: {
					"TERMINAL": $( '#TERMINAL' ).val(),
					"TRTYPE": $( '#TRTYPE' ).val(),
					"AMOUNT": $( '#AMOUNT' ).val(),
					"CURRENCY": $( '#CURRENCY' ).val(),
					"ORDER": $( '#ORDER' ).val(),
					"DESC": $( '#DESC' ).val(),
					"MERCHANT": $( '#MERCHANT' ).val(),
					"MERCH_NAME": $( '#MERCH_NAME' ).val(),
					"MERCH_URL": $( '#MERCH_URL' ).val(),
					"EMAIL": $( '#EMAIL' ).val(),
					"COUNTRY": $( '#COUNTRY' ).val(),
					"MERCH_GMT": $( '#MERCH_GMT' ).val(),
					"ADDENDUM": $( '#ADDENDUM' ).val(),
					"AD_CUST_BOR_ORDER_ID": document.getElementById( 'AD.CUST_BOR_ORDER_ID' ).value,
					"NONCE": $( '#NONCE' ).val(),
					"LANG": $( '#LANG' ).val(),
					"BROWSER_SCREEN_HEIGHT": window.innerHeight,
					"BROWSER_SCREEN_WIDTH": window.innerWidth,
					"CARDHOLDER_EMAIL_ADDRESS": $( '#CARDHOLDER_EMAIL_ADDRESS' ).val(),
					"CARDHOLDER_HOME_PHONE": $( '#CARDHOLDER_HOME_PHONE' ).val(),
					"CARDHOLDER_NAME": $( '#CARDHOLDER_NAME' ).val(),
					"ORDER_ID": $( '#ORDER_ID' ).val(),
					security: borica_pay_js.nonce
				},
				success: function ( json ) {
					var boricaTimestamp   = document.getElementById( 'TIMESTAMP' );
					boricaTimestamp.value = json.boricaTimestamp;
					var boricaPSign       = document.getElementById( 'P_SIGN' );
					boricaPSign.value     = json.boricaPSign;
					var boricaMInfo       = document.getElementById( 'M_INFO' );
					boricaMInfo.value     = json.boricaMInfo;
					formBorica.submit();
				},
			});
		});

		if ( $( '#borica_direct' ).length > 0 && $( '#borica_direct' ).val() == 1 ) {
			$( '#borica_overlay' ).addClass( 'show' );
			$( '#submit_borica_payment_form' ).trigger( 'click' );
		}
});
