const shipicker = new easepick.create({
    element: document.getElementById('cogs-datepicker'),
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
});

document.addEventListener( 'click', function( event ) {

	if ( event.target.classList.contains( 'checkbox-list-item-radio' ) ) {
		event.preventDefault();
		let targetCheckbox = document.getElementById( 'use-this-period' );
		console.log( targetCheckbox );
		if ( event.target.classList.contains( 'active' ) ) {
			event.target.classList.remove( 'active' );			
		} else {
			event.target.classList.add( 'active' );
		}
		
	}

	if ( event.target.classList.contains( 'save-form' ) ) {

		event.preventDefault();
		let modalcontent = document.getElementById( 'modal-content' );
		let period = event.target.getAttribute( 'data-period' );
		let dates = '';
		let dateStart = event.target.getAttribute( 'data-start' );
		let dateEnd = event.target.getAttribute( 'data-end' );
		if ( dateStart ) {
			dates += ' data-start="' + dateStart + '"';
		}
		if ( dateEnd ) {
			dates += ' data-end="' + dateEnd + '"';
		}
		modalcontent.innerHTML = '';
		modalcontent.innerHTML = '<p class="are-you-sure">Are you sure you want to save new data?</p><div class="modal-save-button"><a href="#" class="btn modal-save-form" data-period="' + period + '" ' + dates + '>SAVE</a></div>';
		
		MicroModal.show( 'modal-quickview' );

	}

	if ( event.target.classList.contains( 'modal-save-form' ) ) {

		event.preventDefault();

		let actionUrlBase = 'action=save_payments_data';
		let period = event.target.getAttribute( 'data-period' );
		let formdata = [];
		let targetCheckbox = document.getElementById( 'use-this-period-wrap' );
		if ( targetCheckbox ) {			
			if ( targetCheckbox.classList.contains( 'active' ) ) {
				actionUrlBase = actionUrlBase + '&use-this-period=yes';
			} else {
				actionUrlBase = actionUrlBase + '&use-this-period=no';
			}
		}		

		let lines = document.getElementsByClassName( 'payment-line' );
		if ( lines.length > 0 ) {
			for (var i = 0; i < lines.length; i++) {
				var inputs = lines[i].getElementsByTagName( 'input' );
				
				if ( inputs.length > 0 ) {
					for (var iterator = 0; iterator < inputs.length; iterator++) {
						var inputName = inputs[iterator].getAttribute( 'name' );
						
						if ( 'amount' == inputName ) {
							if ( inputs[iterator].value > 0 ) {
								var amount = inputs[iterator].value;
							}
						}
						if ( 'percent' == inputName ) {
							if ( inputs[iterator].value > 0 ) {
								var percent = inputs[iterator].value;
							}
						}
						if ( 'paymentid' == inputName ) {
							var paymentId = inputs[iterator].value;							
						}
						if ( 'label' == inputName ) {
							var label = inputs[iterator].value;							
						}
					}
				}
				formdata.push({ 
					'paymentid' : paymentId,
					'percent' : percent,
					'amount' : amount,
					'label' : label
				});
				amount = 0;
				percent = 0;
				paymentId = 0;
				label = 0;
			}
		}
		if ( formdata.length > 0 ) {

			var modalcontent = document.getElementById( 'modal-content' );
			var data = JSON.stringify( formdata );
			var actionUrl = actionUrlBase + '&period=' + period + '&data=' + data;
			if ( period == 'custom' ) {
				let dateStart = event.target.getAttribute( 'data-start' );
				let dateEnd = event.target.getAttribute( 'data-end' );
				actionUrl += '&start=' + dateStart + '&end=' + dateEnd;
			}

			var request = new XMLHttpRequest();
			request.open('POST', profitblue.ajaxurl, true);
			request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
			request.onload = function () {
				if (this.status >= 200 && this.status < 400) {
				
					console.log( this.response );
					// If successful
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
		
	}

	if ( event.target.classList.contains( 'data-item-delete' ) ) {

		event.preventDefault();

		let actionUrlBase = 'action=delete_payments_data';
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

	if ( event.target.classList.contains( 'save-product-custom' ) ) {

		event.preventDefault();
		let customPeriod = document.getElementById( 'cogs-datepicker' ).value;
		console.log( customPeriod );
		if ( customPeriod ) {

			var actionUrlBase = 'action=save_payments_custom_period';
			var actionUrl = actionUrlBase + '&period=' + customPeriod;
			sendRequest( actionUrl, 'product-overwiev-periods-custom' );

		} 

	}

});

function handle_buffer(){

	let actionUrl = 'action=update_order_shipping_payment&type=payment';
		
	var request = new XMLHttpRequest();
	request.open('POST', profitblue.ajaxurl, true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
	request.onload = function () {
		if (this.status >= 200 && this.status < 400) {
		
			console.log( this.response );
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


function sendRequest( actionUrl, target ) {

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
