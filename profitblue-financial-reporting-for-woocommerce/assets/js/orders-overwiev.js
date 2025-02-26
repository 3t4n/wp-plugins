const shipicker = new easepick.create({
    element: ".product-datepicker-datepicker",
    css: [
        profitblue.assetsUrl + "assets/css/easepick.css?ver=" + profitblue.version,
    ],
    RangePlugin: {
        repick: true,
        tooltip: false
    },
	LockPlugin: {
		minDate: new Date(profitblue.ThisMonthStart),
		maxDate: new Date(profitblue.ThisMonthEnd)
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
        "LockPlugin",
		"PresetPlugin"
    ],
	zIndex: 10,
	setup(shipicker) {
		shipicker.on('select', (e) => {
		   
			var targetUrl = document.getElementById( 'orders-overwiev' ).getAttribute( 'data-url' );
			let selectedValue = document.getElementById('orders-datepicker').value;
			window.location.replace( targetUrl + '&period=' + selectedValue );

		});
	}
})

document.addEventListener( 'click', function( event ) {

	console.log( event.target );

	//Load more button
	if ( event.target.classList.contains( 'show-more' ) ) {

		event.preventDefault();

		let actionUrlBase = 'action=load_more_orders';

		let offset = event.target.getAttribute( 'data-current' );
		actionUrlBase += '&offset='  + offset;
		let start = event.target.getAttribute( 'data-start' );		
		if ( event.target.getAttribute( 'data-start' ) ) {
			actionUrlBase += '&start=' + start;
		}
		let end = event.target.getAttribute( 'data-end' );
		if ( event.target.getAttribute( 'data-end' ) ) {
			actionUrlBase += '&end=' + end;
		}
		if ( event.target.getAttribute( 'data-url' ) ) {
			actionUrlBase += '&urlstring='  + event.target.getAttribute( 'data-url' );
		}
		
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
			
				//console.log( this.response );	
				var value = JSON.parse( this.response );
				if ( value.orders == 'empty' ) {
					var paginationTarget = document.getElementById( 'order-pagination-container' );
					paginationTarget.innerHTML = '';
					var orderListContent = document.getElementById( 'orders-overwiev' ).innerHTML;
					document.getElementById( 'orders-overwiev' ).innerHTML = orderListContent + value.html;
				} else {
					var paginationTarget = document.getElementById( 'order-pagination-container' );
					paginationTarget.innerHTML = value.pagination;
					var orderListContent = document.getElementById( 'orders-overwiev' ).innerHTML;
					document.getElementById( 'orders-overwiev' ).innerHTML = orderListContent + value.html;
				}			

			} else {
				// If fail
				console.log(this.response);
			}
		};
		request.onerror = function() {
			// Connection error
		};
		request.send( actionUrlBase + '&nonce=' + profitblue.nonce );

		
	}

	if ( event.target.classList.contains( 'orders-overwiev-icon' ) ) {

		console.log( event.target );

		let orderId = event.target.getAttribute( 'data-id' );
		let orderLines = document.getElementsByClassName( 'item-details-' + orderId );

		if ( event.target.classList.contains( 'open' ) ) {
			event.target.classList.remove( 'open' );
			if ( orderLines.length > 0 ) {
				for (var i = 0; i < orderLines.length; i++) {
					orderLines[i].classList.remove( 'open' );
				}
			}
		} else {
			event.target.classList.add( 'open' );
			if ( orderLines.length > 0 ) {
				for (var i = 0; i < orderLines.length; i++) {
					orderLines[i].classList.add( 'open' );
				}
			}
		}						

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

		console.log( type );
		console.log( costYear );

		var actionUrlBase = 'action=save_shipping_costs';

		if ( type == 'no-costs' ) {

			//Save empty
			var actionUrl = actionUrlBase + '&type=' + type + '&period=' + costYear;
			let dateRange = document.getElementsByClassName( 'shipping-datepicker' );
			console.log( dateRange[0].value );
			if ( dateRange[0].value ) {
				actionUrl += '&daterange=' + dateRange[0].value;
			}
			sendRequest( actionUrl );


		} else if ( type == 'same-costs' ) {

			//Save empty
			var actionUrl = actionUrlBase + '&type=' + type + '&period=' + costYear;
			let dateRange = document.getElementsByClassName( 'shipping-datepicker' );
			console.log( dateRange[0].value );
			if ( dateRange[0].value ) {
				actionUrl += '&daterange=' + dateRange[0].value;
			}
			sendRequest( actionUrl );

		} else if ( type == 'custom-costs' ) {

			let zoneString = '';
			let zones = document.getElementsByClassName( 'zone-form-line' );
			if ( zones.length > 0 ) {
				for (var i = 0; i < zones.length; i++) {
					var currentZone = zones[i];
					var shippingId = currentZone.querySelector( 'input[name="shipping-id"]' );
					var shippingValue = shippingId.value;
					var amount = currentZone.querySelector( 'input[name="amount"]' ).value;
					var cod = currentZone.querySelector( 'input[name="cod"]' ).value;
					zoneString += '&zone' + i + '=' + shippingValue;
					if ( amount ) {
						zoneString += '+amount+' +amount;
					}
					if ( cod ) {
						zoneString += '+cod+' +cod;
					}
				}
			}
			
			//Save custom
			var actionUrl = actionUrlBase + '&type=' + type + '&period=' + costYear + zoneString;
			let dateRange = document.getElementsByClassName( 'shipping-datepicker' );
			if ( dateRange[0].value ) {
				actionUrl += '&daterange=' + dateRange[0].value;
			}
			sendRequest( actionUrl );
			
		} else if ( type == 'variable-costs' ) {

			let label = document.getElementById( 'variable-label' ).value;
			let amounttype = document.getElementById( 'variable-amounttype' ).value;
			let amount = document.getElementById( 'variable-amount' ).value;
			
			//Save variable
			var actionUrl = actionUrlBase + '&type=' + type + '&period=' + costYear;
			if ( label ) {
				actionUrl += '&label=' + label
			}
			if ( amounttype ) {
				actionUrl += '&amounttype=' + amounttype
			}
			if ( amount ) {
				actionUrl += '&amount=' + amount
			}
			console.log(actionUrl);
			let dateRange = document.getElementsByClassName( 'shipping-datepicker' );
			if ( dateRange[0].value ) {
				actionUrl += '&daterange=' + dateRange[0].value;
			}
			sendRequest( actionUrl );

		}


	}

});

document.addEventListener( 'change', function( event ) {
	if ( event.target.classList.contains( 'cost-years' ) ) {
		event.preventDefault();

		let selectedValue = event.target.value;
		console.log( selectedValue );
		let pick = document.getElementsByClassName( 'cogs-datepicker' );
		pick[0].style.display = 'none';
		if ( selectedValue == 'custom-range' ) {			
			pick[0].style.display = 'block';
		}

		let wrap = document.getElementsByClassName( 'shipping-costs-wrap' );

		var actionUrl = 'action=render_shipping_costs&period=' + selectedValue;
		var request = new XMLHttpRequest();
		request.open('POST', profitblue.ajaxurl, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
		request.onload = function () {
			if (this.status >= 200 && this.status < 400) {
			
				console.log( this.response );
				// If successful
				var value = JSON.parse( this.response );
				if ( value.status == 'error' ) {
					wrap[0].innerHTML = value.html;
				} else {
					wrap[0].innerHTML = value.html;
				}
				if ( value.range ) {
					pick[0].value = value.range;
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
});

function sendRequest( actionUrl ) {

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
			if ( value.status == 'error' ) {
				modalcontent.innerHTML = value.html;
			} else {
				modalcontent.innerHTML = value.html;
				if ( value.target == 'modal' ) {
					MicroModal.show( 'modal-quickview' );
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

// Listen for the scroll event on the window
window.addEventListener('scroll', function() {
	// Get the element you want to fix
	var divToFix = document.getElementById('orders-overwiev-header');
  
	// Get the target element after which you want to fix the div
	var triggerElement = document.getElementById('orders-overwiev');
  
	// Calculate the distance of the triggerElement from the top of the page
	var triggerTop = triggerElement.getBoundingClientRect().top + window.scrollY;
  
	// Check if the triggerElement is at the top of the page
	if (window.scrollY >= triggerTop) {
	  // Fix the div by setting it to position absolute and moving it with the scroll
	  divToFix.style.position = 'fixed';
	  divToFix.style.top = '32px';
	  var width = triggerElement.clientWidth;
	  divToFix.style.width = width + 'px';
	  divToFix.classList.add( 'fixed' );
	} else {
	  // Reset if we're not at the trigger point
	  divToFix.style.position = 'relative';
	  divToFix.style.top = '';
	  divToFix.style.width = 'auto';
	  divToFix.classList.remove( 'fixed' );
	}
});