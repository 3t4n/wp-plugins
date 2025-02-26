const shipicker = new easepick.create({
    element: document.getElementById('shipping-datepicker'),
    css: [
        profitblue.assetsUrl + "assets/css/easepick.css?ver=" + profitblue.version,
    ],
    RangePlugin: {
        repick: true,
        tooltip: false
    },
	PresetPlugin: {
		customLabels: [],
		customPreset: {
			'Today': [new Date(profitblue.TodayStart), new Date(profitblue.TodayStart)],
			'Yesterday': [new Date(profitblue.YesterdayStart), new Date(profitblue.YesterdayStart)],
			'This Week': [new Date(profitblue.ThisWeekStart), new Date(profitblue.ThisWeekEnd)],
			'This Month': [new Date(profitblue.ThisMonthStart), new Date(profitblue.ThisMonthEnd)]
		},
		position: 'left'
	},
    plugins: [
        "RangePlugin",
		"PresetPlugin"
    ],
	zIndex: 10,
})

document.addEventListener( 'click', function( event ) {
	
	if ( event.target.classList.contains( 'save-form' ) ) {
		event.preventDefault();
		let modalcontent = document.getElementById( 'modal-content' );
		modalcontent.innerHTML = '';
		modalcontent.innerHTML = '<p class="are-you-sure">Are you sure you want to save new data?</p><div class="modal-save-button"><a href="#" class="btn modal-save-form">SAVE</a></div>';
		
		MicroModal.show( 'modal-quickview' );

	}

	if ( event.target.classList.contains( 'modal-save-form' ) ) {
		event.preventDefault();
		let type = null;
		let radioInputs = document.getElementsByClassName( 'shipping-costs' );
		let costYear = document.getElementById( 'cost-years' ).value;
		if ( radioInputs.length > 0 ) {
			for (var i = 0; i < radioInputs.length; i++) {
				if ( radioInputs[i].checked ==  true ) {
					type = radioInputs[i].value;
				}		
			}
		}

		var actionUrlBase = 'action=save_shipping_costs';

		let periodId = document.getElementById( 'shipping-list' ).getAttribute( 'data-period' );
		if ( periodId ) {
			actionUrlBase = actionUrlBase + '&periodid=' + periodId;		
		}

		//Save empty
		var actionUrl = actionUrlBase + '&type=' + type + '&period=' + costYear;
		let dateRange = document.getElementsByClassName( 'shipping-datepicker-datepicker' );
		console.log( dateRange[0].value );
		if ( dateRange[0].value ) {
			actionUrl += '&daterange=' + dateRange[0].value;
		}
		var codPayment = document.getElementById( 'cod-payment' );
		console.log( codPayment.value );
		if ( codPayment != '---' ) {
			actionUrl += '&codpayment=' + codPayment.value;
		}
		sendRequest( actionUrl );		

	}

	if ( event.target.classList.contains( 'save-shipping-custom' ) ) {

		event.preventDefault();
		let customPeriod = document.getElementById( 'shipping-datepicker' ).value;
		console.log( customPeriod );
		if ( customPeriod ) {

			var actionUrlBase = 'action=save_shipping_custom_period';
			var actionUrl = actionUrlBase + '&period=' + customPeriod;
			sendRequest( actionUrl, 'shipping-overwiev-periods-custom' );

		} 

	}

	if ( event.target.classList.contains( 'data-item-delete' ) ) {

		event.preventDefault();

		let actionUrlBase = 'action=delete_shipping_data';
		let targetId = event.target.getAttribute( 'data-id' );
		var actionUrl = actionUrlBase + '&periodid=' + targetId;

		document.getElementById( 'data-item-date-' + targetId ).remove();
		
		
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
				var modalcontent = document.getElementById( 'modal-content' );
				var value = JSON.parse( this.response );				
				modalcontent.innerHTML = value.html;
				MicroModal.show( 'modal-quickview' );
				
			} else {
				// If fail
				console.log(this.response);
			}
		};
		request.onerror = function() {
			// Connection error
		};
		request.send( actionUrl + '&nonce=' + profitblue.nonce );

	}

});


function sendRequest( actionUrl, target = 'modal' ) {

	console.log( actionUrl );

	var modalcontent = document.getElementById( 'modal-content' );
	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {
			
			console.log( this.response );
			// If successful
			var value = JSON.parse( this.response );
			if ( value.status == 'debug' ) {
				modalcontent.innerHTML = this.response;
			}
			if ( value.status == 'buffer' ) {
				modalcontent.innerHTML = this.response;
				MicroModal.show( 'modal-quickview' );			
				handle_buffer();
			}
			if ( value.status == 'error' ) {
				modalcontent.innerHTML = value.html;
				MicroModal.show( 'modal-quickview' );
			} else {
				if ( target == 'modal' ) {
					modalcontent.innerHTML = value.html;
					MicroModal.show( 'modal-quickview' );
				} else {
					document.getElementById( target ).innerHTML = value.html;
				}
			}					

		} else {
			// If fail
			console.log(this.response);
		}
	};
	request.onerror = function() {
		// Connection error
	};
	request.send( actionUrl + '&nonce=' + profitblue.nonce );

	
}

function handle_buffer(){

	let actionUrl = 'action=update_order_shipping_payment&type=shipping';
		
	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {
		
			// If successful
			var modalcontent = document.getElementById( 'modal-content' );
			var value = JSON.parse( this.response );
			modalcontent.innerHTML = value.html;
			MicroModal.show( 'modal-quickview' );

			if ( value.status == 'buffer' ) {
				handle_buffer();
			}					

		} else {
			// If fail
			console.log(this.response);
		}
	};
	request.onerror = function() {
		// Connection error
	};
	request.send( actionUrl + '&nonce=' + profitblue.nonce );

}